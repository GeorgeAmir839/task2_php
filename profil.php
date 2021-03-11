<?php

require 'connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "select * from posts where id=" . $id;
    $op =  mysqli_query($conn, $sql);
    //   mysqli_num_rows($op);
    if (mysqli_num_rows($op) == 1) {
        echo "error12";
    } else {
        
        $data = mysqli_fetch_assoc($op);
    }
} else {
    header("Location: showalluser.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $post = $_POST['post'];
    $frogenkey=$_SESSION['id'];


    if (empty($post)) {
        echo "empty post";
        
    }else{
        if (isset($_POST['postes'])) {
            $sql  = "insert into posts (title,content,user_id) values ('$title','$post','$frogenkey') ";
            $op = mysqli_query($conn, $sql);
            if ($op) {
                header("Location: showsngileuser.php");
            }
        } else {
            echo 'try agien';
        }

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
        <h2 class="m-3">post</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">title</label>
                <input type="text" class="form-control" name="title" placeholder="text">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">to insert post</label>
                <textarea class="form-control" rows="3" name="post"></textarea>
            </div>

            <button type="submit" class="btn btn-primary con" name="postes">post</button>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>