<html>
<head>

    <link rel="stylesheet" href="search.css">

</head>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['query'])) {
    $search_query = $_GET['query'];

    $sql = "SELECT * FROM movies WHERE name LIKE '%$search_query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='movie'>";
            echo "<p class='name'> " . $row["name"]. "</p>";
            echo "<img class='image' src='" . $row["image"]. "' alt='Movie Image'>";
            echo "<p class='date'> Date : " . $row["date"]. "</p>";
            echo "<p class='time'>Time : " . $row["time"]. "</p>";
            echo "<p class='price'>Price: Rs." . $row["price"]. "</p>";
            echo "</div>";
        }
    } else {
        echo '<script>alert("No Results Found")</script>';
    }
} else {
    echo '<script>alert("No search query provided")</script>';
}

$conn->close();
?>
