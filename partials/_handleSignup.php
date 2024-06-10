<?php

$showErr = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include ("./_connectdb.php");

    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];


    $user = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($conn, $user);


    if (mysqli_num_rows($result) > 0) {
        $showErr = "User Already exist.";
        header("Location: http://localhost/forum/index.php?success=false&msg=$showErr");

    } else {

        if ($password == $cpassword) {
            echo $hash = password_hash($password, PASSWORD_DEFAULT);

            echo $sql = "INSERT INTO users (`email`, `password`, `timestamp` ) 
                        VALUES('$email', '$hash', current_timestamp())";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                $showAlert = true;
                header("Location: http://localhost/forum/index.php?success=true&msg=Registration Successful");
            }


        } else {
            $showErr = "Passwords are not Matching.";
            header("Location: http://localhost/forum/index.php?success=false&msg=$showErr");

        }



    }


}
?>