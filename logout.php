<?php
session_start();

$_SESSION = array();

session_destroy();

?>

<script>
    alert("You have been logged out.");
    window.location.href = "Customer/php/Home1.php";
</script>
