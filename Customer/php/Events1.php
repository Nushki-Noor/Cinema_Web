<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CINEPLEX Cinema - Events</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="shortcut icon" href="../../Pictures/minilogo.jpg">
<link rel="stylesheet" href="../../Customer/css/Events1.css">

<script src="../../Customer/js/Events1.js"> </script>

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
  

<!--EventPictures-->
<div style="position: absolute; top: 270px; left:600px ; width: 70px;">
<div class="img-container2">
  <img src="../../Pictures/eventpic1.jpg" >
  </div>
</div>

<div style="position: absolute; top: 760px; left:600px ; width: 70px;">
<div class="img-container2">
<img src="../../Pictures/eventpic2.jpg" >
</div>
</div>

<!--EventPictureTexts--> 
<div style="position: absolute; top: 580px; left: 760px; width: 400px;">
<h1 style="font-size:200%;">DUNE PART 1 & PART 2</h1>
</div>

<div style="position: absolute; top: 1080px; left: 680px; width: 520px;">
<h1 style="font-size:200%;">A QUIET PLACE PART 1 & PART 2</h1>
</div>


<!--moreInfoBtn-->
<div class="popup" id="popup1">
  <div class="overlay"></div>
  <div class="content">
    <div class="closebtn" onclick="togglePopup()">&times;
    </div>
    <h1>DUNE PART 1 & PART 2</h1>

    <div style="position: absolute; top: 80px; left: 260px;" class="miniHead">
      <p>About the Event</p>
    </div>
    <div style="position: absolute; top: 110px; left: 10px;">
    <p>This is a on Demanding screening option. Enjoy the movies from the comfort of your own home.</p>
    </div>

    <div style="position: absolute; top: 160px; left: 55px;">
      <div class="line1">
      </div>

      <div style="position: absolute; top: 10px; left: 205px;" class="miniHead">
        <p>About the Movie</p>
      </div>
      <div style="position: absolute; top: 40px; left: 10px;">
        <p>Paul Atreides, a brilliant and gifted young man born into a great destiny beyond his understanding,
           must travel to the most dangerous planet in the universe to ensure the future of his family and his people.
           As malevolent forces explode into conflict over the planet's exclusive supply of the most precious resource 
           in existence, only those who can conquer their own fear will survive.</p>
        </div>
        <div style="position: absolute; top: 150px; left: 100px;">
          <p>Date : 1st April</p>
          </div>
          <div style="position: absolute; top: 150px; left: 300px;">
            <p>Time : From 6pm Onwards</p>
            </div>
      </div>

    </div>
  </div>

<div style="position: absolute; top: 650px; left: 880px;">
<button onclick="togglePopup()" class="btn1">More Info</button>
</div>


<!--moreInfoBtn-->
<div class="popup" id="popup2">
  <div class="overlay"></div>
  <div class="content">
    <div class="closebtn" onclick="togglePopup1()">&times;
    </div>
    <h1>A QUIET PLACE PART 1 & PART 2</h1>

    <div style="position: absolute; top: 80px; left: 260px;" class="miniHead">
      <p>About the Event</p>
    </div>
    <div style="position: absolute; top: 110px; left: 10px;">
      <p>This is a on Demanding screening option. Enjoy the movies from the comfort of your own home.</p>
      </div>

      <div style="position: absolute; top: 160px; left: 55px;">
        <div class="line1">
        </div>

        <div style="position: absolute; top: 10px; left: 205px;" class="miniHead">
          <p>About the Movie</p>
        </div>
        <div style="position: absolute; top: 40px; left: 10px;">
          <p>If they hear you, they hunt you. A family must live in silence to avoid mysterious creatures that hunt by sound.
            Knowing that even the slightest whisper or footstep can bring death, Evelyn and Lee are determined to find a way 
            to protect their children while desperately searching for a way to fight back.</p>
          </div>
          <div style="position: absolute; top: 150px; left: 100px;">
            <p>Date : 10th March</p>
            </div>
            <div style="position: absolute; top: 150px; left: 300px;">
              <p>Time : From 6pm Onwards</p>
              </div>
        </div>
</div>

<div style="position: absolute; top: 1150px; left: 880px;">
<button onclick="togglePopup1()" class="btn1">More Info</button>
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
    <div class="line">
    </div>
  </div>
</footer>

</body>
</html>