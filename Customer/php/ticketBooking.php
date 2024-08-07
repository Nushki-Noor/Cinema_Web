<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cineplex - Ticket Booking</title>
    <link rel="shortcut icon" href="minilogo.jpg">
    <link rel="stylesheet" href="../../Customer/css/ticketBooking.css" type="text/css">

</head>

<body>
    <section>
        <div class="seat-details">
            <form action="#" method="post">

                <h1>Ticket Booking</h1>

                <label>Movie:</label>
                <input type="text" name="film" value="<?php echo isset($_GET["name"]) ? $_GET["name"] : ''; ?>"
                    readonly>

                <label>Date:</label>
                <input type="text" name="date"
                    value="<?php echo isset($_GET["date"]) ? $_GET["date"] : ''; ?>" readonly>

                <label>Time:</label>
                <input type="text" name="time"
                    value="<?php echo isset($_GET["time"]) ? $_GET["time"] : ''; ?>" readonly>

                <label>Price Per Ticket:</label>
                <input type="text" name="price"
                    value="<?php echo isset($_GET["price"]) ? $_GET["price"] : ''; ?>" readonly>

                <input type="text" id="name" name="name" placeholder="Name" required>

                <input type="email" id="email" name="email" placeholder="Email" required>

                <div style="position: absolute; top: 350px; left: 820px;">
                    <div class="backg2"></div>
                </div>
                

                <?php
                session_start();
                include_once "../../connection.php";

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["seats"])) {
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $date = isset($_POST["date"]) ? $_POST["date"] : '';
                    $time = isset($_POST["time"]) ? $_POST["time"] : '';
                    $film = $_POST["film"];
                
                    $seats = isset($_POST["seats"]) ? $_POST["seats"] : array();
                
                    if ($mysqli) {
                        $stmt = $mysqli->prepare("INSERT INTO reservations(name, date, time, film, email, seats) VALUES (?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("ssssss", $name, $date, $time, $film, $email, $ids);
                
                        $ids = !empty($seats) ? implode(",", $seats) : "";
                
                        if ($stmt->execute()) {
                            echo '<script>alert("Booking Successful");</script>';
                        } else {
                            echo "Error: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        echo "Error: Database connection failed.";
                    }
                }
                


                ?>

                <input type="submit" value="Book Tickets">
           
        </div>

        <div class="seats1">

            <?php

            $moviename = isset($_GET["name"]) ? $_GET["name"] : '';

            $bookedSeats = array();
            if ($mysqli) {
                $sql = "SELECT seats FROM reservations WHERE film ='$moviename'";
                $result = $mysqli->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $bookedSeatsArray = explode(",", $row["seats"]);
                        foreach ($bookedSeatsArray as $seat) {
                            if (!in_array($seat, $bookedSeats)) {
                                $bookedSeats[] = $seat;
                            }
                        }
                    }
                }
            } else {
                echo "Error: Database connection failed.";
            }

            $seatCount = 1;
            for ($x = 0; $x < 7; $x++) {
                for ($i = 0; $i < 7; $i++) {
                    $isBooked = in_array($seatCount, $bookedSeats);
                    $disabled = $isBooked ? 'disabled' : '';
                    $seatClass = $isBooked ? 'seatbox booked' : 'seatbox';
                    echo '<input type="checkbox" id="seat' . $seatCount . '" class="' . $seatClass . '" value="' . $seatCount . '" name="seats[]" ' . $disabled . '>';
                    echo '<label for="seat' . $seatCount . '">' . $seatCount . '</label>';
                    $seatCount++;
                }
            }
            ?>
        </div>
        </form>
    </section>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var seatsContainer = document.querySelector('.seats');
            var totalPriceInput = document.getElementById('totalprice');
            var ticketPrice = parseFloat(seatsContainer.dataset.ticketPrice);

            if (isNaN(ticketPrice)) {
                console.error('Invalid ticket price');
                return;
            }

            seatsContainer.addEventListener('change', function (event) {
                if (event.target.type === 'checkbox') {
                    var selectedSeats = seatsContainer.querySelectorAll('input[type=checkbox]:checked').length;
                    var totalPrice = selectedSeats * ticketPrice;
                    totalPriceInput.value = totalPrice.toFixed(2);
                }
            });
        });
    </script>
</body>
</html>