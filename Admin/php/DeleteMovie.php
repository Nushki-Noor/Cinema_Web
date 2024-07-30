<?php
require_once("../../connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_movie"])) {
    if (!empty($_POST["delete_movie"])) {
        $movie_id = mysqli_real_escape_string($conn, $_POST["delete_movie"]);

        $sql = "DELETE FROM movies WHERE id = '$movie_id'";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Movie Deleted Successfully"); console.log("Redirecting to DeleteMovie.php..."); window.location.href = "DeleteMovie.php";</script>';
            exit();
        } else {
            echo '<script>alert("Failed to delete movie"); console.log("Redirecting to DeleteMovie.php..."); window.location.href = "DeleteMovie.php";</script>';
            exit();
        }
    } else {
        echo '<script>alert("Please provide a movie ID"); console.log("Redirecting to DeleteMovie.php..."); window.location.href = "DeleteMovie.php";</script>';
        exit();
    }
}
?>

<html>
<head>
    <title>CINEPLEX Cinema - Delete Movies</title>

    <link rel="shortcut icon" href="minilogo.jpg">
<link rel="stylesheet" href="../css/DeletMovie.css">

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

<div style="position: absolute; top: 120px; left: 8px;">
    <div class="backg"></div>
    </div>


    <div style="position: absolute; top: 138px; left: 600px;">
  <a href="../../Admin/php/AddMovie.php" class="btn2">Add Movie</a>
  </div>

  <div style="position: absolute; top: 138px; left: 1100px;">
  <a href="../../Admin/php/custFeedback.php" class="btn2">Feedbacks</a>
  </div>

  <div style="position: absolute; top: 138px; left: 840px;">
  <a href="../../Admin/php/DeleteMovie.php" class="btn2">Delete Movie</a>
  </div>

    <?php
    $sql = "SELECT * FROM movies";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<img src='".$row["image"]."'>";
            echo "<h2>".$row["name"]."</h2>";
            echo "<form action='' method='POST'>";
            echo "<input type='hidden' name='delete_movie' value='".$row["id"]."'>";
            echo "<button type='submit' onclick='return confirm(\"Are you sure you want to delete this movie?\")'>Delete</button>";
            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "No Screening Movies";
    }
    ?>

</body>
</html>
