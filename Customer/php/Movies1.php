<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CINEPLEX Cinema - Movies</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="shortcut icon" href="../../Pictures/minilogo.jpg">
<link rel="stylesheet" href="../../Customer/css/Movies1.css">

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

  <div class="search-box">
        <form action="search.php" method="GET">
            <input type="text" name="query" placeholder="Search..." class="search-input">
            <i class="fa fa-search icon-search"></i>
        </form>
</div>

  <!--backgroundColor-->
  <div style="position: absolute; top: 120px; left: 8px;">
  <div class="backg"></div>
  </div>

  <!--Options bar-->
  <div style="position: absolute; top: 138px; left: 360px;">
  <a href="../../Customer/php/Home1.php" class="btn2">Home</a>
  </div>

<div style="position: absolute; top: 138px; left: 560px;">
  <a href="../../Customer/php/Movies1.php" class="btn2">Movies</a>
  </div>
  
<div style="position: absolute; top: 138px; left: 760px;">
  <a href="../../Customer/php/Events1.php" class="btn2">Events</a>
  </div>
  
<div style="position: absolute; top: 138px; left: 960px;">
  <a href="../../Customer/php/Promotions1.php" class="btn2">Promotions</a>
  </div>

<div style="position: absolute; top: 138px; left: 1200px;">
  <a href="../../Customer/php/About1.php" class="btn2">About Us</a>
  </div>  

<div style="position: absolute; top: 138px; left: 1440px;">
  <a href="../../Customer/php/feedback.html" class="btn2">Feedback</a>
  </div>
<br>
<br>
<br>
<br>
<br>
<br>

<section class="section3">
<div style="position: absolute; top: 230px; left: 860px;">
        <h2> NOW SHOWING </h2></div>
        <br>
        <br>
        <div class="cards">
            <?php
            require_once("connection.php");

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM movies";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $name = $row['name'];
                $date =$row['date'];
                $time=$row['time'];
                $price =$row['price'];
                    echo '<div class="card">
                            <img src="'.$row["image"].'" >
                            <h2>'.$row["name"].'</h2>
                            <a href="ticketBooking.php?name='.$name.'&date='.$date.'&time='.$time.'&price='.$price.'" class="MoreInfo">More Info</a>
                          </div>';
                }
            } else {
                echo '<div class="nomv">No Screening Movies</div>';
            }

            $conn->close();
            ?>
            </div>
            </section>

<!--footer-->
<footer class="footernav">
<ul>
      <li><a href="../../Customer/php/Home1.php">Home</a></li>
      <li><a href="../../Customer/php/Movies1.php">Movies</a></li>
      <li><a href="../../Customer/php/Events1.php">Events</a></li>
      <li><a href="../../Customer/php/Promotions1.php">Promotions</a></li>
      <li><a href="../../Customer/php/About1.php">About Us</a></li>
      <li><a href="../../Customer/php/feedback.html">Feedback</a></li>
    </ul>
  <div style="position:absolute; top:80px; left:840px">
    <div class="footertxt">
  <p>2024 Cineplex Cinemas All Rights Reserved</p>
  </div>
  </div>

  <div style="position: absolute; top: 75px; left: 300px;">
    <div class="line">
    </div>
  </div>
</footer>

<script src="Movies1.js"></script>

</body>
</html>
