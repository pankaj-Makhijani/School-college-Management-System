<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <?php
    session_start();
  ?>
<?php

    require_once('include/dbcon.php');

    if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = htmlentities(mysqli_real_escape_string($con,$email));
    $password = htmlentities(mysqli_real_escape_string($con,$password));

    $query = "SELECT * FROM `admin` WHERE `email` = '$email' and `password` = '$password' ";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row < 1)
    {
        ?>
        <script>
                alert('Username or Password incorrect');
                window.open('login.php','_self');
        </script>
        <?php
    }
    else{
        $data = mysqli_fetch_assoc($run);
        $name = $data['name'];
        $uid = $data['id'];
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['uid'] = $uid;
        header("location:admin/dashboard.php");
    }
}
?>


<?php
if(isset($_SESSION['uid']))
{
header("location:admin/dashboard.php");
}

?>
  <body style="background-image:url(images/sms_bg.jpg); background-size: cover;">
  <!-- Navigation Start -->
<nav class="brown darken-4">
    <div class="container">
        <a class="brand-logo hide-on-med-and-down" href="">Future Stars</a>
    <ul class="right">
        <li class="waves-effect waves-light"><a href="">About Us</a></li>
        <li class="waves-effect waves-light"><a href="login.php">Admin Login</a></li>
        <li class="waves-effect waves-light"><a href="staffinfo.php">staff Info</a></li>
        <li class="waves-effect waves-light"><a href="index.php">Student Info</a></li>
    </ul>
</div>
</nav>
<!-- Navigation End -->
    <div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                            <div class="card-content">
                                <h5 class="<?php if(isset($login_failed)) { echo "hide";} ?>" >Login Form</h5>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    person
                                </i>
                                <input type="text" name="email" value="pankaj@gmail.com" id="email" required="required">
                                <label for="email">Enter Your Email Address</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    lock
                                </i>                    
                                <input type="password" name="password" value="1234" id="password" required="required">
                                <label for="password">Enter Your Password</label>
                            </div>
                        <br>
                            <div>
                            <button type="submit" name="login" class="btn" style="width: 100%; border-radius: 15px;">Login</button>
                        </div>
                        </div>
            </form>
        </div>
    </div>
  
                    
    <!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>