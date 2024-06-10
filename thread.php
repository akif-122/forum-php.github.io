<?php
include "partials/_connectdb.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php include "partials/_header.php";

$threadId = $_GET["threadId"];

 $sql = "SELECT * FROM threads WHERE thread_id = '$threadId'";
$result = mysqli_query($conn, $sql);




?>


<div class="container">





    <div class="bg-light p-4 rounded my-5">
        <?php

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <h2><?php echo $row['thread_title']; ?> Forum</h2>
            <p><?php echo $row['thread_desc']; ?></p>
            <p><strong>User name</strong></p>
        <?php } ?>
    </div>

    <div class="container">

    <?php
    $showAlert = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comment = $_POST['comment'];

        $sql2 = "INSERT INTO comment (`comment_text`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$threadId', '0', current_timestamp())";

        $result2 = mysqli_query($conn, $sql2);
        $showAlert = true;
    }

    if ($showAlert) {
        ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Comment Added Added Successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

        
        
        <h3>Post a Comment</h3>
        <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
            <div class="form-group">
                <label for="">Type Your Comment</label>
                <textarea name="comment" class="form-control mt-2 mb-3" id="" row="4"></textarea>
            </div>

            <button class="btn btn-success">Post Comment</button>

        </form>
    </div>


    <h3>Discussions</h3>

    <!--  -->
    <?php
    $id = $_GET["threadId"];

    $sql1 = "SELECT * FROM comment WHERE thread_id = '$id'";

    $reslut1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($reslut1) > 0) {

        while ($row = mysqli_fetch_assoc($reslut1)) {
            ?>

            <div class="d-flex mt-5">
                <div class="flex-shrink-0">
                    <img src="./imgs/user2.png" width="50" alt="">

                </div>
                <div class="flex-grow-1 ms-3 ">
                    <h5>Harry <small class="text-muted " style="font-size: 12px;"><i><?php echo $row['comment_time'] ?></i></small></h5>
                    <p><?php echo $row["comment_text"] ?></p>
                </div>
            </div>

        <?php
        }
    } else {
        echo "<h2 class=' bg-light rounded py-4 px-4'>No Record Foun</h2>";
    }
    ?>



</div>



<?php include "partials/_footer.php" ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
    integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body>

</body>

</html>