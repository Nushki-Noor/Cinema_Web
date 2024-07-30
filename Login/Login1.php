<?php
session_start();

include("../connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass1'];

    if (!empty($email) && !empty($pass)) {
        $query = "SELECT * FROM users WHERE email='$email' AND pass1='$pass' limit 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['email'] == $email && $user_data['pass1'] == $pass) {
                $_SESSION['id'] = $user_data['id']; 
                $_SESSION['username'] = $user_data['username'];
                
                if ($user_data['usertype'] == 'customer') {
                    header("location: ../Customer/php/Home1.php");
                    die;
                } elseif ($user_data['usertype'] == 'admin') {
                    header("location: ../Admin/php/AddMovie.php");
                    die;
                }
            }
        } else {
            echo "<script type='text/javascript'> alert('Wrong Email or Password') </script>";
        }
    }
}
?>


<html>
    <head>
        <title>CINEPLEX - Sign In</title>

        <link rel="shortcut icon" href="../Pictures/minilogo.jpg">
        <link rel="stylesheet" href="Login.css">

    </head>

    <body>     

        <div style="position: absolute; top: 200px; left: 760px;">
            <div class="backg1"></div>
            </div>


        <form method="POST">

            <div style="position: absolute; top: 220px; left: 780px;">
                <a href="../Customer/php/Home1.php" class="back">Back</a>
            </div>
        
            <div style="position: absolute; top: 200px; left: 870px;">
                <div class="login1">
            <h1 style="font-size: 280%;">Login</h1>
            </div>
            </div>

            <div style="position: absolute; top: 320px; left: 820px;">
                <div class="usernamePass">
            <input type="text" placeholder="Email" name="email" id="email" required>
            </div>
            </div>

            <div style="position: absolute; top: 380px; left: 820px;">
                <div class="usernamePass">
            <input type="password" placeholder="Password" name="pass1" id="pass1" required>
            </div>

            <div style="position: absolute; top: 55px; left: 65px; width: 200px;">
            <div class="acc1"> Don't Have an Account? <a href="../Register/SignUp1.php">Sign Up</a>
            </div>
            </div>

            <div style="position: absolute; top: 100px; left:20px;">
                <input type="submit" name="submit" class="loginbtn" value="Login" required>
            </div>

        </form>

    </body>
</html>