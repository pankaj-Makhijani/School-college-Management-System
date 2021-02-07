<?php
require_once('../include/dbcon.php');
require_once('../include/header.php');

?>

<?php
if (isset($_POST['search'])) {

    $position = $_POST['position'];
    $name = $_POST['name'];

    $query = "select * from `teacher` where `position` = '$position' and `name` LIKE '%$name%'";
    $run = mysqli_query($con, $query);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        echo "<script> alert('No staff Found')</script>";
    } else {
    }
}
?>

<!-- The Coding Has Been Started From Here -->

<nav class="teal">
    <div class="container">
        <div class="nav-wrapper">
            <a href="" class="brand-logo center">Future Stars</a>
            <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
        </div>
    </div>
</nav>


<!-- The Dashboard Coding Started From Here -->
<div class="row main">
    <div class="col l12 m12 s12">
        <form action="" method="POST">
            <div class="card-panel">
                <div class="row">
                    <div class="col l4">
                        <div class="input-field">
                            <select name="position">
                                <option value="" class="disabled">Select Position</option>
                                <option value="Administrator" selected>Administrator</option>
                                <option value="Class-teacher">class-teacher</option>
                                <option value="office-staff">Office staff</option>
                                <option value="maintainence">Maintainence</option>
                                <option value="librarian">Librarian</option>
                                <option value="food-service">Food service</option>
                                <option value="transportation">Transportation</option>
                            </select>
                        </div>
                    </div>
                    <div class="col l5">
                        <div class="input-field">
                            <input type="text" name="name" id="name">
                            <label for="name">Enter staff Name</label>
                        </div>
                    </div>
                    <div class="col l3">
                        <div class="">
                            <button class="btn" name="search">Search staff</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="row main">
    <div class="col l12">
        <div class="card">
            <ul class="collection">
                <li class="collection-item">
                    <?php
                    if (isset($_POST['search'])) {
                        $count = 0;
                        while ($data = mysqli_fetch_assoc($run)) {
                            $count++;
                            $image = $data['image'];
                            $id = $data['id'];
                            $name = $data['name'];
                            $position = $data['position'];
                            $email = $data['email'];
                            $gender = $data['gender'];
                            $city  = $data['city'];
                            $contact = $data['contact'];
                        }
                    ?>
                        <table class="striped">
                            <tr class="cyan lighten-2 z-depth-1">
                                <th>Sr. No</th>
                                <th>staff Image</th>
                                <th>Name</th>
                                <th>position</th>
                                <th>email</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>City</th>
                                <th>Delete</th>
                            </tr>
                            <tr>
                                <td> <?php echo $count; ?> </td>
                                <td> <img src="images/<?php echo $image; ?>" class="responsive-img circle" style="width: 100px;"> </td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $position; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $gender; ?></td>
                                <td><?php echo $contact; ?></td>
                                <td><?php echo $city; ?></td>
                                <td><a href="deleteteacherform.php?sid=<?php echo $id?>" style="color:blue;" align="center">DELETE</a></td>
                            </tr>
                        <?php } ?>

                        </table>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- The Navbar Menu Collection List -->
<?php
require_once('../include/sidenav.php');
?>

<?php
require_once('../include/footer.php');
?>