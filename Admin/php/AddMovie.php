<?php
@include '../../connection.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEPLEX Cinema - Admin</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="../../pictures/minilogo.jpg">  
<link rel="stylesheet" href="../css/AddMovie.css">
</head>
<body>

<?php
session_start();
if(isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
?>

<script>
        showLogout();
    </script>
<div class="profile">
Welcome <?php echo $username; ?>.. <br>
<a href="../../logout.php" class="logout-btn" id="logout">Logout</a>
</div>
<?php
}
else { 
?>

<script>
        showLogin();
    </script>
<nav class="navbar">
    <div class="login-signup">
      <a href="../../Login/Login1.php" class="login-btn" id="login">Login</a>
      <a href="../../Register/SignUp1.php" class="signup-btn" id="signup">Sign Up</a>
    </div>
</nav>

<?php
}
?>

<div class="logo">
    <img src="../../pictures/CineplexLogo2.jpg" alt="Cineplex Logo">
  </div>

<!--backgroundColor-->
<div style="position: absolute; top: 120px; left: 8px;">
<div class="backg"></div>
</div>

<div style="position: absolute; top: 100px; left: 600px;">
<div class="backg1">

<h1>Add Movie</h1>
<div class="bg">
    <form action="" method="POST">
        <input type="text" name="name" placeholder="Movie Name">
        <input type="number" name="price" placeholder="Movie Price">
        <input type="text" name="image" placeholder="Movie File Name">
    <select id="time" name="time" required>
        <option value="10:30 AM">10:30 AM</option>
    <option value="12:00 PM">12:00 PM</option>
    <option value="01:30 PM">01:30 PM</option>
    <option value="03:00 PM">03:00 PM</option>
    <option value="05:30 PM">05:30 PM</option>
    <option value="07:30 PM">07:30 PM</option>
    <option value="09:00 PM">09:00 PM</option>
      </select>
    <select id="date" name="date" required>
        <option value="2024.05.15">2024.05.15</option>
    <option value="2024.05.16">2024.05.16</option>
    <option value="2024.05.17">2024.05.17</option>
    <option value="2024.05.18">2024.05.18</option>
    <option value="2024.05.19">2024.05.19</option>
    <option value="2024.05.20">2024.05.20</option>
    <option value="2024.05.20">2024.05.20</option>
      </select>
    <br>
    <button type="submit">Add Movie</button>
    </form>
</div>

</div>
</div>

<!--Options bar-->  
<div style="position: absolute; top: 138px; left: 600px;">
  <a href="../../Admin/php/AddMovie.php" class="btn2">Add Movie</a>
  </div>

  <div style="position: absolute; top: 138px; left: 1100px;">
  <a href="../../Admin/php/custFeedback.php" class="btn2">Feedbacks</a>
  </div>

  <div style="position: absolute; top: 138px; left: 840px;">
  <a href="../../Admin/php/DeleteMovie.php" class="btn2">Delete Movie</a>
  </div>

</body>
</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../connection.php';

    if (empty($_POST["name"]) || empty($_POST["date"]) || empty($_POST["time"]) || empty($_POST["price"]) || empty($_POST["image"])) {
        echo '<script>alert("Please fill all the fields")</script>';
    } else {
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $date = mysqli_real_escape_string($conn, $_POST["date"]);
        $time = mysqli_real_escape_string($conn, $_POST["time"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        $imagename = mysqli_real_escape_string($conn, $_POST["image"]);
        $imagepath = "http://localhost/Web Development Assignment/pictures/$imagename";

        $sql = "INSERT INTO movies (name, date, time, price, image) VALUES ('$name', '$date', '$time', '$price', '$imagepath')";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo '<script>alert("Movie Inserted Successfully")</script>';
        } else {
            echo '<script>alert("Failed to insert movie")</script>';
        }
    }
}
?>

