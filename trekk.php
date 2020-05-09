
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="treks.php">Upcoming treks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="equipment1.php">Trek Equipments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="profile.php">My profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="mycart.php">My cart</a>
            </li>

        </ul>

    </div>
</nav>
<?php
require_once ('db.php');
require_once ('component.php');
$con = createdb();
 if(isset($_POST['ladakh'])){
        ladakh();
 };
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
#mountain{
    background-image: url("https://images.pexels.com/photos/2450296/pexels-photo-2450296.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
    background-size: cover;
}


</style>


<?php function ladakh(){?>
    <div id="mountain">


        <img src="https://www.discoveryworldtrekking.com/frontend/assets/images/banner-trekker.svg" style="padding-top: 10%">
    </div>
<h1 class="text-center">
    Trekking in Ladakh
</h1>
<p class="text-center">
    Come, be a part of these thrilling trekking adventures in Ladakh, a rich land that offers barren places, tapestry monastery, great mountain kingdoms and exotic flora and fauna in a spectacular way. Explore our tailor-made itineraries that will lead you to beautiful wonders of nature and point out interesting spots in Ladakh you don't want to miss. Book your Ladakh adventure trekking holidays at best prices and services.
</p>




<DIV id="bgcolour">
<div class="container">
    <div class="row text-center" style='display:flex'>
    <h1 class="text-info" style="font-family: CerebriSans-ExtraBold">Tough treks..</h1><br>
        <br>
        <?php
        $sql ="select * from trek";
        $result = mysqli_query($GLOBALS['con'],$sql);
        if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

    if ($row['trek_place']=='Ladakh' and $row['type_of_trek']=='tough') {?>
        <form method="post" action="trekinfo.php?trekid=<?php echo $row['trek_id'];?>">
        <div class="col-md-3 col-sm-6">
            <div class="img-thumbnail">

                <img src="<?php echo $row['trek_img1']?>" style="width:300px; height:300px">
            </div>
<?php
                 buttonElement('btn-info',$row['trek_name'],$row['trek_id']);?>

                <div class="caption"><?php echo $row['trek_duration'];?></div>



        </div>
        </form>
        <?php }
    }
    }?>
        <br><br><br>


        <br>

        <?php
        $sql ="select * from trek";
        $result = mysqli_query($GLOBALS['con'],$sql);
        if(mysqli_num_rows($result)>0){?>
            <h1>Easy treks</h1>
            <?php
            while($row=mysqli_fetch_assoc($result)){

                if ($row['trek_place']=='Ladakh' and $row['type_of_trek']=='easy') {?>
                    <form method="post" action="trekinfo.php?trekid=<?php echo $row['trek_id'];?>">
                        <div class="col-md-3 col-sm-6">
                            <div class="img-thumbnail">

                                <img src="<?php echo $row['trek_img1']?>" style="width:300px; height:300px">
                            </div>
                            <?php
                            buttonElement('btn-info',$row['trek_name'],$row['trek_id']);?>

                            <div class="caption"><?php echo $row['trek_duration'];?></div>



                        </div>
                    </form>
                <?php }
            }
        }?>


    </div>
</div>
</DIV>
    <?php
}
?>


</html>

<!--//{-->
<!--//    $sql ="select * from trek";-->
<!--//    $result = mysqli_query($con,$sql);-->
<!--//    if(mysqli_num_rows($result)>0){-->
<!--//        while($row=mysqli_fetch_assoc($result)){-->
<!--//            echo $row['trek_id'];-->
<!--//            echo $row['trek_name'];-->
<!--//            echo $row['trek_info'];-->
<!--//-->
<!--//-->
<!--//-->
<!--//           -->
<!--           <form method="POST" action="form.php?trekid=<?php ////echo $row['trek_id'];?><!--">-->-->
<!--("btn btn-success","treks","ladakh");-->
<!--////              -->
<!--          </form>-->
<!--