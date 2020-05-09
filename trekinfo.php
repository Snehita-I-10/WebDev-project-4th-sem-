<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<?php
require_once ('db.php');
require_once('component.php');
$con = createdb();
$trekid = $_GET['trekid'];
$sql ="select * from trek where trek_id = $trekid";
$result = mysqli_query($GLOBALS['con'],$sql);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){?>
        <form action="form.php?trekid=<?php echo $row['trek_id'];?>" method="post">

            <div id="mountain" style="background-image: url('<?php echo $row['trek_img2']?>');background-size:cover;padding:15%;width:100%;height:50%">
            <h1 class="text-white text-center"><?php echo $row['trek_name'];?></h1>
            <img src="https://www.discoveryworldtrekking.com/frontend/assets/images/banner-trekker.svg" style="padding-top: 10%;">
        </div>
<br>
            <div class="container">
                <div class=row">
                    <p class="col-lg-3"><p style="font-size: 30px;font-family: Comic Sans MS, Comic Sans, cursive"><i class="fa fa-map-marker text-info" aria-hidden="true" ></i>Destination</p><h5 ><?php echo $row['trek_place']?></h5></p>
                    <p class="col-lg-3"> <p  style="font-size: 30px;font-family: Comic Sans MS, Comic Sans, cursive""><i class="fa fa-calendar text-info" aria-hidden="true" ></i>Duration</p><h5 ><?php echo $row['trek_duration'];?></h5></p>
                    <p class="col-lg-3"><p  style="font-size: 30px;font-family: Comic Sans MS, Comic Sans, cursive""><i class="fa fa-cutlery text-info" aria-hidden="true" ></i>Meals</p><h5 > All meals during the trek/Expedition</h5></p>
                    <p class="col-lg-3"> <p  style="font-size: 30px;font-family: Comic Sans MS, Comic Sans, cursive""> <i class="fa fa-home text-info" aria-hidden="true" ></i>Accomodation</p><h5 > Hotel/lodge during the trek</h5></p>
            </div>
            </div>


<div class="row">
<div class="col-lg-8 text-align">

      <div style="font-family:American Typewriter, serif"> <?php echo $row['trek_info'];?></div>
</div>
    <?php
        $trekid = $row['trek_id'];

        ?>



       <?php
        $sql1 ="select * from price where trekid = $trekid";
        $result1 = mysqli_query($con,$sql1);
        while($row1=mysqli_fetch_assoc($result1)) {?>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $row['trek_img1'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 style="font-family: Comic Sans MS, Comic Sans, cursive">Total price(including all charges)</h5>
                        <p style="font-family: Comic Sans MS, Comic Sans, cursive" class="card-text font-family: Comic Sans MS, Comic Sans, cursive""><?php   echo $row1['amount'];?>/-<br><?php   echo $row1['restrictions'];?></p>
                        <a style="font-family: Comic Sans MS, Comic Sans, cursive" href="form.php?trekid=<?php echo $row['trek_id'] ?>" class="btn btn-info font-family: Comic Sans MS, Comic Sans, cursive"">Register Now</a>
                    </div>
                </div>

            </div>
</div>
            <?php
        }


    }
    }

    ?>
        </form>
