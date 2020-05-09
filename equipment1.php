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
displayequip();
function displayequip()
{   $sql2 = "select s.user_id from signup s where s.loggedin='yes'";
    $result2 = mysqli_query($GLOBALS['con'], $sql2);
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {

            $user_id = $row2['user_id'];

            echo $user_id
            ;                     }
    }
    $sql="select * from trekequipments";
    $result = mysqli_query($GLOBALS['con'],$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result))
            {
               $name= $row['equipment_name'];
               echo $name;?><br>
                <?php
               $eid= $row['equipment_id'];
                ?><br>
                <?php
                $image=$row['equip_image'];
                ?><br>
                <?php
              ?>
                <img src="<?php echo $row['equip_image']?>" style="width:300px; height:300px">
                <?php
                $sql1="select p.amount,p.restrictions,t.equipment_id from trekequipments t,price p where t.equipment_id='$eid' and t.pricecode=p.price_code";
                $result1 = mysqli_query($GLOBALS['con'],$sql1);
                if(mysqli_num_rows($result1)>0) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $price = $row1['amount'];
                        echo $price;
                        echo $row1['restrictions'];


                    }}?>

                      <form action="mycart.php?id=<?php echo $eid?>&name=<?php echo $name?>&price=<?php echo $price?>&image=<?php echo $image?>" method="post">
                        <button name="add" type="submit">ADD TO CART</button>
                        </form>

<?php

            }
        }
}
                   ?>
