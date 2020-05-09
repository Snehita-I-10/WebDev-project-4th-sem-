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
if(isset($_POST['add'])){
    additem();
}
display();


function additem()
{


    $id = $_GET['id'];
//    echo $id;
    $name = $_GET['name'];
//    echo $name;
    $price = $_GET['price'];
//    echo $price;
    $image = $_GET['image'];
//    echo $image;
    $sql1 = "select s.user_id from signup s where s.loggedin='yes'";
    $result1 = mysqli_query($GLOBALS['con'], $sql1);
    if (mysqli_num_rows($result1) > 0) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $userid = $row1['user_id'];
        }
    }


    $sql2 = "insert into mycart values('$userid','$id','$name','$price','$image') ";
    if (mysqli_query($GLOBALS['con'], $sql2)) {
        echo "inserted";
    }
}
function display()
{


    $sql11 = "select s.user_id from signup s where s.loggedin='yes'";
    $result11 = mysqli_query($GLOBALS['con'], $sql11);
    if (mysqli_num_rows($result11) > 0) {
        while ($row11 = mysqli_fetch_assoc($result11)) {
            $userid = $row11['user_id'];
        }
    }
    $sql3="select equip_name,price,count(*),image from mycart where userid='$userid'group by equip_id";
    $result3 = mysqli_query($GLOBALS['con'], $sql3);
    if (mysqli_num_rows($result3) > 0) {
        while ($row3 = mysqli_fetch_assoc($result3)) {?>

                <div class="col-lg-6 col-sm-6">
                    <div class="img-thumbnail">

                        <img src="<?php echo $row3['image']?>" style="width:300px; height:300px">
                    </div>
                    <?php
                    buttonElement('btn-info', $row3['equip_name'],'1')
                    ?>


                    <div class="caption">Price-<?php   echo $row3['price'];?></div>
                    <div class="caption">Number of <?php echo $row3['equip_name']?><?php  echo $row3['count(*)'];?></div>



                </div>


<?php


        }
    }
    $sql4="SELECT SUM(price) from mycart where userid='$userid'" ;


    $result4 = mysqli_query($GLOBALS['con'], $sql4);
    if(mysqli_num_rows($result4) > 0) {
        while ($row4 = mysqli_fetch_assoc($result4)){
                echo "Total price of equipments:";
            echo $row4['SUM(price)'];

        }
    }



}