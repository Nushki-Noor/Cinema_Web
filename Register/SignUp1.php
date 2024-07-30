<?php
session_start();

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $confirmpass = $_POST['confirmpass'];
    $usertype = "customer";

    if (!empty($username) && !empty($email) && !empty($pass1) && !empty($confirmpass)) {
        if ($pass1 !== $confirmpass) {
            echo "<script type='text/javascript'> alert('Passwords do not match!') </script>";
        } else {
            $username = mysqli_real_escape_string($conn, $username);
            $email = mysqli_real_escape_string($conn, $email);
            $pass1 = mysqli_real_escape_string($conn, $pass1); 
            $confirmpass = mysqli_real_escape_string($conn, $confirmpass);

            $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
            $result = mysqli_query($conn, $check_email);
            if (mysqli_num_rows($result) > 0) {
                echo "<script type='text/javascript'> alert('Email already exists!') </script>";
            } else {
                $query = "INSERT INTO users (username, email, pass1, confirmpass, usertype) VALUES ('$username', '$email', '$pass1', '$confirmpass', '$usertype')";
                $query = mysqli_query($conn, $query);

                if ($query) {
                    echo "<script type='text/javascript'> alert('Successfully Registered!') </script>";
                } else {
                    echo "<script type='text/javascript'> alert('Registration failed!') </script>";
                }
            }
        }
    } else {
        echo "<script type='text/javascript'> alert('Please fill in all fields!') </script>";
    }
}
?>



<html>
    <head>
        <title>CINEPLEX - Sign Up</title>

        <link rel="shortcut icon" href="minilogo.jpg">
        <link rel="stylesheet" href="SignUp1.css">

    </head>

    <body>

        <div style="position: absolute; top: 200px; left: 760px;">
            <div class="backg1"></div>
            </div>


        <form action="SignUp1.php" method="POST" novalidate>
        

            <div style="position: absolute; top: 220px; left: 780px;">
                <a href="Home1.php" class="back">Back</a>
            </div>
        
            <div style="position: absolute; top: 210px; left: 850px; width: 200px;">
                <div class="login1">
            <h1 style="font-size: 280%;">Sign Up</h1>
            </div>
            </div>

            <div style="position: absolute; top: 320px; left: 820px;">
                <div class="usernamePass">
                    <input type="text" placeholder="Name" name="username" id="username" required>
            </div>
            </div>

            <div style="position: absolute; top: 380px; left: 820px;">
                <div class="usernamePass">
                    <input type="text" placeholder="Email" name="email" id="email" required>
            </div>
            </div>

            <div style="position: absolute; top: 440px; left: 820px;">
                <div class="usernamePass">
                    <input type="password" placeholder="Password" name="pass1" id="pass1" required>
            </div>
            </div>

            <div style="position: absolute; top: 500px; left: 820px;">
                <div class="usernamePass">
                    <input type="password" placeholder="Confirm Password" name="confirmpass" id="confirmpass" required>
            </div>
            </div>

            <div style="position: absolute; top: 545px; left: 885px; width: 200px;">
                <div class="acc1"> Already Have an Account? <a href="Login1.php">Login</a>
                </div>
            </div>

            <div style="position: absolute; top: 590px; left: 840px;">
                <input type="submit" name="submit" class="signupbtn" value="Sign Up" required>
            </div>

        </form>

    </body>
</html>