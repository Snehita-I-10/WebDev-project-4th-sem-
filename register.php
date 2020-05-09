<!DOCTYPE html>
<html >

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {

            background:#333 url("https://github.com/Vyshnavi2000/WebProject/blob/master/images/registerbg.jpg?raw=true") ;
            background-repeat:no-repeat;
            height: 200%;
            background-size:cover;
        <!--background-position: center;-->

            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .box {
            left:50%;
            top:50%;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 5px;
            font-family: sans-serif;
            text-align: center;
            line-height: 1;
            -webkit-backdrop-filter: blur(20px);
            backdrop-filter: blur(20px);
            max-width: 50%;
            max-height: 50%;
            padding: 20px 40px;
        }
        .container {
            position:absolute;
            align-items: center;
            display: flex;
            justify-content: center;
            left:10%;
            height: 110%;
            width: 100%;
        }
        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }


        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }
        /*.topnav .icon {
          display: none;
        }*/

        /*@media screen and (max-width: 600px) {
          .topnav a:not(:first-child) {display: none;}
          .topnav a.icon {
            float: right;
            display: block;
          }
        }*/
        /*@media screen and (max-width: 600px) {
          .topnav.responsive {position: relative;}
          .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
          }*/
        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
        }
    </style>
</head>
<body>

<!--<div class="topnav" id="myTopnav">
  <a href="index2.php" class="active">Home</a>
  <a href="register.php">Our Blog</a>
  <a href="register.php">Media</a>
  <a href="contact.html">Contact</a>
  <a href="about.html">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>-->




<!--<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>-->

</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif;	}
        .wrapper{ width: 350px; padding: 20px; background-color: white;
            width: 400px;
            height: 400px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%); }
    </style>
</head>
<body>

<!--<div class="wrapper">-->
<div class="container">
    <div class="box">
        <h1 align="center" >Sign Up</h1>
        <p align="center" style="color:white">Please fill this form to create an account.</p>
        <form name="RegForm" action="login.php" onsubmit="return validateform()" method="post">
            <div>
                <label>Username</label>

                <input type="text" name="username" class="form-control" >
                <span class="help-block"></span>



            </div>

            <div >
                <label>Password</label>

                <input type="password" placeholder="Password" id="password" name="psw" class="form-control" pattern=".{8,}"   required title="8 characters minimum" >
                <span class="help-block"></span>
            </div>


            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" id="confirm_password" required>
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <input name="addtotable" type="submit" class="btn btn-primary" value="Submit"><a href="login.php"></a>
                <!--	<a href="#" class="btn btn-primary">Submit</a>-->
                <input type="reset" class="btn btn-default" value="Reset">
            </div>

            <p>Already have an account? <a href="login.php">Login here</a>.</p>

        <?php
?>

        </form>
    </div>



    <script>






        function validateform(){
            var password = document.getElementById("password")
                , confirm_password = document.getElementById("confirm_password");
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validateform;
        confirm_password.onkeyup = validateform;
    </script>

</div>
</div>
</body>
</html>
