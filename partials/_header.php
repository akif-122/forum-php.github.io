<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a href="/forum" class="navbar-brand">
            <h2>iForum</h2>
        </a>

        <button class="navbar-toggler" data-bs-target="#myNav" data-bs-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a href="/Index.php" class="nav-link">Home</a>
                </li>

                <li class="nav-item">
                    <a href="about.php" class="nav-link">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle">Categories</a>

                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Home 2</a>
                    </div>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>



            </ul>

            <form class="d-flex ms-auto">
                <input type="text" class="form-control me-2" placeholder="Search">
                <button class="btn btn-success">Search</button>
            </form>

            <?php
            session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION["loggedin"] == true) {



                ?>
                <p class="text-white my-0 ms-2"><?php echo $_SESSION["user"]; ?></p>
                <a href="partials/_logout.php" class="btn btn-success ms-2">Logout</a>
                <?php
            } else {
                
                ?>
                
                <button data-bs-target="#loginModal" data-bs-toggle="modal"
                    class="btn btn-outline-success ms-2">Login</button>
                <button data-bs-target="#signupModal" data-bs-toggle="modal" class="btn btn-outline-success mx-2">Sign
                    Up</button>
            <?php } ?>
        </div>


    </div>

</nav>

<?php
include "_loginmodal.php";
include "_signupmodal.php";

if (isset($_GET["success"]) && $_GET["success"] == "true") {

    ?>
    <script>
        setTimeout(() => {
            alert('<?php echo $_GET["msg"] ?>');
        }, 200);
    </script>
<?php }

if (isset($_GET["success"]) && $_GET["success"] == "false") {

    ?>
    <script>
        setTimeout(() => {
            alert('<?php echo $_GET["msg"] ?>');
        }, 200);
    </script>
<?php }