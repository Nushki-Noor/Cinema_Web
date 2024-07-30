<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CINEPLEX Cinema - About Us</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="shortcut icon" href="../../Pictures/minilogo.jpg">
<link rel="stylesheet" href="../../Customer/css/About1.css">

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

  <!--AboutTexts-->
  <div style="position: absolute; top: 220px; left: 900px; width: 130px;">
    <div class="text2">
    <h1 style="font-size:160%;">About Us</h1>
    </div>
    </div>

  <div style="position: absolute; top: 270px; left: 500px; width: 1000px;">
    <div class="text3">
    <h1 style="font-size:120%;">Welcome to CINEPLEX Cinema, your destination for all films!
      Explore a curated selection of movies, reviews, trailers and insights covering classic
      masterpieces to the latest blockbusters. Join us on cinematic journey where every click 
      opens a new chapter in the endless adventure of movies.</h1>
    </div>
    </div>


<div style="position: absolute; top: 780px; left: 680px; width: 130px;">
    <div class="text2">
    <h1 style="font-size:160%;">Vision</h1>
    </div>
    </div>

  <div style="position: absolute; top: 830px; left: 470px; width: 500px;">
    <div class="text3">
    <h1 style="font-size:100%;">To be the go-to online destination for movie enthusiasts,
     providing a seamless and enriching experience that celebrates the art of cinema, 
     fosters community engagement, and inspires a lifelong love for film.</h1>
    </div>
    </div>


  <div style="position: absolute; top: 780px; left: 1260px; width: 130px;">
    <div class="text2">
    <h1 style="font-size:160%;">Mission</h1>
    </div>
    </div>    

  <div style="position: absolute; top: 830px; left: 1080px; width: 500px;">
    <div class="text3">
    <h1 style="font-size:100%;">Our mission is to curate a dynamic platform where users
      can discover, engage with, and celebrate a diverse range of films. We aim to provide
      high-quality content, insightful reviews, and interactive features that cater to
      the interests of both casual moviegoers and passionate cinephiles. Through our 
      dedication to excellence, inclusivity, and innovation, we seek to cultivate a 
      vibrant community of film lovers and contribute to the enduring legacy of cinema.</h1>
    </div>
    </div>


<!--abtImage-->
  <div style="position: absolute; top: 400px; left:630px ; width: 70px;">
    <div class="abtpic">
      <img src="../../Pictures/Aboutpic1.jpg" >
      </div>
    </div>    

<!--line-->
<div style="position: absolute; top: 370px; left: 360px;">
  <div class="line">
  </div>
  </div>

<div style="position: absolute; top: 760px; left: 360px;">
  <div class="line">
  </div>
</div>

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
    <div class="line1">
    </div>
  </div>
</footer>


</body>
</html>