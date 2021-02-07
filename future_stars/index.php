<!-- Can include entire reusable header in another folder and include whenever requires -->
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
    ?>
  
<!-- Session Checking -->
<?php
if(isset($_SESSION['name']))
{
    header('location:admin/dashboard.php');
}
?>

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

<!-- Form Start -->
   <body style="background-image:url(images/sms_bg.jpg); background-size: cover; background-repeat: no-repeat; ">
    <div class="row">
            <div class="col l4 offset-l4 m12 s12">
                <div class="card-panel with-header" style="border-radius: 15px; opacity: 0.9; margin-top: 25%;">
                    <div class="card-header center">
                        <h5>Student information</h5>
                    </div>
                    <form action="index.php" method="POST">
                    <div class="input-field">
                       <!-- <select name="standerd" class="browser-default" > -->
                        <select name="standerd" >
                            <option value="" class="disabled">Select Standerd</option>
                            <option value="1" selected>1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                            <option value="5">5th</option>
                            <option value="6">6th</option>
                            <option value="7">7th</option>
                            <option value="8">8th</option>
                            <option value="9">9th</option>
                            <option value="10">10th</option>
                            <option value="11">11th</option>
                            <option value="12">12th</option>
                            <option value="bca">BCA</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <input type="text" name="rollno" id="rollno" autocomplete="off">
                        <label for="rollno">Enter Your Roll Number</label>
                    </div>
                    <div class="center">
                        <button class="btn waves-effect waves-light" name="submit" style="width: 100%; border-radius: 15px;">Show Information</button>
                    </div>
                </form>
                </div>
            </div>
    </div>

<!-- Form Ending -->
<!-- Student Form Processing Start-->
<?php
 if(isset($_POST['submit'])){

    $standerd = $_POST['standerd'];
    $rollno = $_POST['rollno'];

    $query = "select * from `students` where `standerd` = '$standerd' and `rollno` = '$rollno'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);

    if($row < 1)
    {
        echo "<script> alert('Please Enter Correct Information')</script>";
    }
    else{

        $data= mysqli_fetch_assoc($run);
        $image = $data['image'];
        $name = $data['name'];
        $rollno = $data['rollno'];
        $standerd = $data['standerd'];
        $gender = $data['gender'];
        $city  = $data['city'];
        $contact = $data['contact'];
?>
<!-- Student Form Processing End-->

    <!-- Table Coding-->

        <div class="row">
            <div class="col l6 offset-l3 m12 s12">
                <div class="card-panel" style="border-radius: 20px; opacity: 0.91">
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                        <img src="img/<?php echo $image; ?>" alt="" class=" responsive-img circle" >
                        <h5 style="font-family:Impact, Charcoal, sans-serif; ">
                            <?php echo $name; ?>
                        </h5>
                    </div>
                        <div class="col l8 m12 s12" >
                            <ul class="collection" style="border-radius: 25px;" >
                                <li class="collection-item" >
                                    <table class="striped" >
                                        <tr >
                                            <th>Roll No</th>
                                            <td><?php  echo $rollno; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td><?php  echo $name; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Standerd</th>
                                            <td><?php  echo $standerd; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Contact</th>
                                            <td><?php  echo $contact; ?></td>
                                        </tr>                                                              <tr>
                                            <th>City</th>
                                            <td><?php  echo $city; ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
               </div>
        </div>
    </div>
<?php
    }
}
?>

                    
    <!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<!-- Compiled and minified JavaScript --> 
<script>
 $(document).ready(function(){

$('select').formSelect();
});
</script>
</body>
</html>




                    