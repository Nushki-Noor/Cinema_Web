<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEPLEX Cinema - Customer Feedback</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href="minilogo.jpg">
    <link rel="stylesheet" href="../css/custFeedback.css">

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
        <img src="../../Pictures/CineplexLogo2.jpg" alt="Cineplex Logo">
      </div>

      <!--backgroundColor-->
<div style="position: absolute; top: 120px; left: 8px;">
    <div class="backg"></div>
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

  <div style="position: absolute; top: 200px; left: 10px;">
    <h1>Feedback from Customers</h1>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "logindb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>Name:</strong> " . $row["name"]. "<br><strong>Email:</strong> " . $row["email"]. "<br><strong>Message:</strong> " . $row["message"]. "</p>";
        }
    } else {
        echo "No feedback found.";
    }

    $conn->close();
?>

    </div>
</body>
</html>
