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
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="profileStyle.css">
    <title>User Prfiel and update</title>
</head>
<style>
    /*body{*/
    /*    background-image: url("https://images.pexels.com/photos/939729/pexels-photo-939729.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");*/
    /*    background-repeat: no-repeat;*/
    /*    background-size: cover;*/
    /*}*/


</style>
<div id="mountain" style="background-image: url('https://images.unsplash.com/photo-1477003392500-e77d85415ada?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=753&q=80');background-repeat: no-repeat;height:600px;width:100%">
    <h1 class="text-white text-center">PROFILE PAGE</h1>
    <img src="https://www.discoveryworldtrekking.com/frontend/assets/images/banner-trekker.svg" style="padding-top: 10%;">
</div>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4 form-div">
                <form action="processProfile.php" method="post" enctype="multipart/form-data">
                    <h3 class="text-center">User Profile</h3>

                    <?php if(!empty($msg)):?>
                        <div class="alert <?php echo $css_class;?>">
                            <?php echo $msg; ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <img src="images/<?php echo $profileImageName;?>" onclick="triggerClick()" id="profileDisplay" style="width:5cm;height:5cm;margin-left:23%;">
                        <label for="profileImage" style="margin-left:35%;">Profile Image</label>
                        <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" style="display:none">
                    </div>
                    <div class="form-group">
                        <label for="bio" >Bio</label>
                        <textarea name="bio" id="bio" class="form-control"><?php echo $bio;?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-primary btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function triggerClick(){
            document.querySelector('#profileImage').click();
        }
        function displayImage(e){
            if(e.files[0]){
                var reader = new FileReader();

                reader.onload = function(e){
                    document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                }
                reader.readAsDataUrl(e.files[0]);
            }
        }

    </script>
    <?php

    if(isset($_POST['loggedin'])){
        $pname=$_POST['username'];

        $sql32=   "UPDATE signup
         SET loggedin = 'yes'
        WHERE username = '$pname'" ;
        if(mysqli_query($GLOBALS['con'], $sql32)){
            echo "done";
        };

    }

createData();
    function createData(){


        $sql1 = "select s.username from signup s where s.loggedin='yes'";
        $result1 = mysqli_query($GLOBALS['con'], $sql1);
        if (mysqli_num_rows($result1) > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $username = $row1['username'];
            }







        $sql2="SELECT t_id from register r where r.p_name='$username' ";

//    $result =mysqli_query($GLOBALS['con'],$sql1);
//    while($row = mysqli_fetch_array($result)) {
//         // Print a single column data
//        echo print_r($row);       // Print the entire row data
//    }

        $result2 = $GLOBALS['con']->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row
            while ($row = $result2->fetch_assoc()) {?>
                <?php
                $a = $row["t_id"];?>


        <?php
        $sql3="SELECT trek_name,trek_place,trek_img1 from trek t  where t.trek_id= $a";
        $result3 = $GLOBALS['con']->query($sql3);
        if ($result3->num_rows > 0){
        while ($row3 = $result3->fetch_assoc()) {

    {?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
        <div class="col-md-3 col-sm-6">
            <div class="img-thumbnail">

                <img src="<?php echo $row3['trek_img1']?>" style="width:300px; height:300px">
            </div>
            <?php
             echo $row3['trek_name'];?>
        </div></div>
        </div>



        </div>
<?php
//                $sql3="SELECT trek_name,trek_place,trek_img1 from trek t  where t.trek_id= $a";
//                $result3 = $GLOBALS['con']->query($sql3);
//                if ($result3->num_rows > 0) {
//                    // output data of each row
//                    while ($row3 = $result3->fetch_assoc()) {
//                        echo $row3['trek_name'];
//                        echo $row3['trek_place'];
//                    }
//                }
            }
        }
        }
    }

            }}}
    ?>




