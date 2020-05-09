<?php
require_once ('db.php');

$con = createdb();
createData();
?>
<form
<?php
function createData()
{

    $name=textboxValue("username");
    $password=textboxValue("psw");
    $confirm_pass=textboxValue("confirm_password");

    $sql = "
INSERT INTO signup(username,password,confirm_pass) values('$name','$password','$confirm_pass');
";
    if(mysqli_query($GLOBALS['con'],$sql)){
        echo "inserted";
    };

    $sql1 = "
INSERT INTO userprofile(username,profile_image,bio) values('$name','profile.jpg','smart and..');
";
    if(mysqli_query($GLOBALS['con'],$sql1)){
        echo "inserted1";
    };
$sql2="SELECT t_id from register r, userprofile u  where r.p_name=u.username ";

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
                $a = $row["t_id"];


            $sql3="SELECT trek_name,trek_place from trek t  where t.trek_id= $a";
            $result3 = $GLOBALS['con']->query($sql3);
            if ($result3->num_rows > 0) {
                // output data of each row
                while ($row3 = $result3->fetch_assoc()) {
                    echo $row3['trek_name'];
                    echo $row3['trek_place'];
                }
                }
        }
    }
}
function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    return $textbox;
}


?>
<!--$name=$_POST['username'];-->
<!--$pass=$_POST['psw'];-->
<!--$confirm_pass=$_POST['confirm_password'];-->
<!---->
<!--$num = mysqli_num_rows($result);-->
<!--if($num==1){-->
<!--    echo '<script type="text/javascript">-->
<!--          window.onload = function () { alert("Username Already Taken"); }-->
<!--        </script>';-->
<!--    header('location:register.php');-->
<!--}-->
<!--else{-->
<!--    $reg = "INSERT INTO `signup` (`username`, `password`, `confirm_pass`) VALUES ('$name', '$pass', '$confirm_pass')";-->
<!--    mysqli_query($con, $reg);-->
<!--    $image = "INSERT INTO `userprofile`(`username`, `profile_image`, `bio`) VALUES ('$name', 'images/placeholder-person.jpg','bio')";-->
<!--    mysqli_query($con, $image);-->
<!---->
<!--    header('location:login.php');-->
<!--}-->
<!---->
<!--?>-->
