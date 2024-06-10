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

$catId = $_GET["catId"];

$sql = "SELECT * FROM categories WHERE category_id = '$catId'";
$result = mysqli_query($conn, $sql);




?>


<div class="container">

    <div class="bg-light p-4 rounded my-5">
        <?php

        while ($row = mysqli_fetch_assoc($result)) {

            ?>
            <h2>Welcome to <?php echo $row['category_name']; ?> Forum</h2>
            <p><?php echo $row['category_description']; ?></p>

        <?php } ?>
    </div>

    <!-- -->
    <h2>Start a Dicussions</h2>


    <!--  -->



    <?php
    $showAlert = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $description = $_POST["description"];

        $sql2 = "INSERT INTO threads (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`,`timestamp`) VALUES ('$title', '$description', '$catId', '0', current_timestamp())";

        $result2 = mysqli_query($conn, $sql2);
        $showAlert = true;
    }

    if ($showAlert) {
        ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Thread Added Successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post" class="my-5">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Problem title</label>
            <input type="text" class="form-control form-control-sm" name="title" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <textarea name="description" id="" rows="7" class="form-control form-control-sm"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>


    <h2>Browse Questions</h2>

    <?php

    $sql1 = "SELECT * FROM threads WHERE thread_cat_id = '$catId'";

    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {

        while ($row1 = mysqli_fetch_assoc($result1)) {

            ?>

            <div class="d-flex my-6">
                <div class="flex-shrink-0">
                    <img src="./imgs/user1.png" width="50" alt="">

                </div>
                <div class="flex-grow-1 ms-3">
                    <h5><a href="thread.php?threadId=<?php echo $row1["thread_id"]; ?>" class="text-dark">
                            <?php echo $row1["thread_title"]; ?></a> <small class="text-muted font-normal"><i>Posted on
                                <?php echo $row1["timestamp"]; ?></i></small>
                    </h5>
                    <p><?php echo $row1["thread_desc"]; ?></p>


                </div>
            </div>

            <!-- <div class="d-flex mt-5">
                <div class="flex-shrink-0">
                    <img src="./imgs/user2.png" width="50" alt="">

                </div>
                <div class="flex-grow-1 ms-3 ">
                    <h5>Jhon Carter <small class="text-muted"><i>Posted on January 10, 2021</i></small></h5>
                    <p>Excellent feature! I love it. One day I'm definitely going to put this Bootstrap component into
                        use and
                        I'll let you know once I do.</p>
                </div>
            </div> -->


            <?php
        }
    } else {
        echo "<h2 class=' bg-light rounded py-4 px-4'>No Record Foun</h2>";
    } ?>

</div>



<?php include "partials/_footer.php" ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
    integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body>

</body>

</html>