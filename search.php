<?php
require 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$search=$_POST['search'];
    
    $sql  = "select * from user where name like '%".$search."%'";
    $op = mysqli_query($conn, $sql);
    
    if ($op) {
        $data = mysqli_fetch_assoc($op);
    }
}




?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <section class="container mt-3">
        <h2 class="m-3"> login</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">enter name</label>
                <input type="text" placeholder="enter your search" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="search">

            </div>

            <button type="submit" class="btn btn-primary con" name="login">login</button>
        </form>
    </section>
    <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>Action</th>
            </tr>

            <?php
            while ($data = mysqli_fetch_assoc($op)) {

                echo '<tr>';

                echo '<td>' . $data["id"] . '</td>';
                echo '<td>' . $data["name"] . '</td>';
                echo '<td>' . $data["email"] . '</td>';
                echo "<td>";
                echo "<a href='delete.php?id=" . $data['id'] . "' class='btn btn-danger m-r-1em'>Delete</a>";
                echo "<a href='edit.php?id=" . $data['id'] . "' class='btn btn-primary m-r-1em'>Edit</a> ";
                echo "</td>";

                echo '</tr>';
            }
            ?>
            <!-- end table -->
        </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>