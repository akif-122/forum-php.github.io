<?php

$showErr = false;
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    include ("./_connectdb.php");

    echo $email = $_POST["email"];
    echo $password = $_POST["password"];

    $user = "SELECT * FROM users WHERE email = '$email' ";

    $result = mysqli_query($conn, $user);

    $num = mysqli_num_rows($result);

    if ($num) {
        while ($row = mysqli_fetch_assoc($result)) {
            $verifypass = password_verify($password, $row["password"]);

            if ($verifypass) {
                $showAlert = "Login Successful";
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["user"] = $email;
                header("Location: http://localhost/forum/index.php?success=true&msg=$showAlert");
            } else {
                $showErr = "Invalid Cradentails.";
                header("Location: http://localhost/forum/index.php?success=false&msg=$showErr");
            }

        }

    } else {
        $showErr = "User Not Found.";
        header("Location: http://localhost/forum/index.php?success=false&msg=$showErr");

    }

}

?>