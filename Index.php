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

<?php include "partials/_header.php" ?>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./imgs/banner-1.jpg" class="d-block  w-100" style="height: 600px; object-fit: cover;" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./imgs/banner-2.jpg" class="d-block  w-100" style="height: 600px; object-fit: cover;" alt="...">
        </div>
        <div class="carousel-item">
            <img src="./imgs/banner-3.jpg" class="d-block  w-100" style="height: 600px; object-fit: cover;" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div class="container">
    <h2>Forum - Categories</h2>

    <div class="row">
        <?php
        $sql = "SELECT * FROM categories";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="https://source.unsplash.com/300x200/?coding,<?php echo $row["category_name"] ?>" alt="">
                <div class="card-body">
                    <h5 class="card-title"><a
                            href="threadlist.php?catId=<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?></a>
                    </h5>
                    <p class="card-text"><?php echo substr($row["category_description"], 0, 80); ?>...</p>
                    <a href="threadlist.php?catId=<?php echo $row["category_id"]; ?>" class="btn btn-primary">Link</a>
                </div>
            </div>
        </div>

        <?php }
        } else { ?>


        <h2 class="text-center">Not Record Found</h2>

        <?php } ?>
    </div>

</div>

<?php include "partials/_footer.php" ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
    integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body>

</body>

</html>