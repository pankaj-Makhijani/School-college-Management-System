<?php

require_once('../include/dbcon.php');
require_once('../include/header.php');
$id=$_REQUEST['sid'];
            $sql="DELETE FROM `teacher` WHERE `id`='$id'";
            $run=mysqli_query($con,$sql);
            if($run==true)
            {
            ?>
                <script>
                    alert("Data Deleted Successfully");
                    window.open('dashboard.php', '_self');
                </script>
                <?php
            }
?>