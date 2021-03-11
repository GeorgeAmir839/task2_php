<?php

require 'connect.php';
if(isset($_SESSION['id'])){
$userid=$_SESSION['id'];
$sql = "select * from user";
$sqlr = "select * from posts where user_id=$userid";
$op = mysqli_query($conn, $sql); 
$opr = mysqli_query($conn, $sqlr);  // object 


?>




<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Data Of Me || <a href="add.php">add</a></h1>

        </div>
        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>phone</th>
                <th>email</th>
                <th>Action</th>
            </tr>>
            <?php
            
                echo '<tr>';

                echo '<td>' . $_SESSION["id"] . '</td>';
                echo '<td>' . $_SESSION["name"] . '</td>';
                echo '<td>' . $_SESSION["phone"] . '</td>';
                echo '<td>' . $_SESSION["email"] . '</td>';
                echo "<td>";
                echo "<a href='edit.php?id=" . $_SESSION['id'] . "' class='btn btn-primary m-r-1em'>Edit</a> ";
                echo "<a href='delete.php?id=" . $_SESSION['id'] . "' class='btn btn-danger m-r-1em'>Delete</a>";
                echo "<a href='profil.php?id=" . $_SESSION['id'] . "' class='btn btn-info m-r-1em'>New post</a> ";
                echo "</td>";
                echo '</tr>';
            ?>
        </table>
        <div class="container">
        <form method="post">
            <button type="submit" class="btn btn-primary con" name="returnregister">return to register page</button>
            <button type="submit" class="btn btn-primary con" name="returnlogin">go logout</button>
            <button type="submit" class="btn btn-primary con" name="showalluser">show all user</button>
        </form>
    </div>
        <br>
        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>User_id</th>
                <th>Action</th>
            </tr>
            <?php
            while ($data = mysqli_fetch_assoc($opr)) {
                echo '<tr>';
                echo '<td>' . $data["id"] . '</td>';
                echo '<td>' . $data["title"] . '</td>';
                echo '<td>' . $data["content"] . '</td>';
                echo '<td>' . $data["user_id"] . '</td>';
                echo "<td>";
                echo "<a href='delete.php?id=" . $data['id'] . "' class='btn btn-danger m-r-1em'>Delete</a>";
                echo "<a href='edit.php?id=" . $data['id'] . "' class='btn btn-primary m-r-1em'>Edit</a> ";
                echo "</td>";
                echo '</tr>';
            }
            ?>
        </table>

    </div>
    
    <?php
    if (isset($_POST['returnregister'])) {
        header('Location: register.php');
    }
    if (isset($_POST['returnlogin'])) {
        header('Location: login.php');
    }
    if (isset($_POST['showalluser'])) {
        header('Location: showalluser.php');
    }
    ?>


    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>
<?php 
}else{
    header("Location: login.php");
}
?>