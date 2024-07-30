<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $seatNumbers = $_POST["seatNumbers"];
    $showTime = $_POST["showTime"];
    $weekday = $_POST["weekday"];
    $totalPrice = $_POST["totalPrice"];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO bookings (seatNumbers, showTime, weekday, totalPrice) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $seatNumbers, $showTime, $weekday, $totalPrice);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Booking saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CINEPLEX Cinema - Ticket Booking</title>


<link rel="shortcut icon" href="minilogo.jpg">
<link rel="stylesheet" href="TicketBook.css">

</head>

<body>
  

    <div style="position: absolute; top: 160px; left: 600px;">
        <div class="backg1">

            <div style="position: absolute; top: 110px; left: 95px;">
                <div class="backg2"></div>
                </div>

                <div style="position: absolute; top: 130px; left: 430px;">
                  <div class="backg3"></div>
                  </div>

            <div style="position: absolute; top: 40px; left: 40px;">
                <a href="Movies1.php" class="back">Back</a>
            </div>

            <div style="position: absolute; top: 70px; left: 220px;">
            <h4>Screen</h4>
            </div>

    <div class="container">
      
        <div class="seat-layout" id="seats">
          <!-- Seats will be dynamically generated here -->
        </div>
      
        <div style="position: absolute; top: 260px; left: 530px;">
          <label for="weekdays"></label>
          <select id="weekdays" onchange="selectWeekday(this)">
              <option value="15th Monday">15th Monday</option>
              <option value="16th Tuesday">16th Tuesday</option>
              <option value="17th Wednesday">17th Wednesday</option>
              <option value="18th Thursday">18th Thursday</option>
              <option value="19th Friday">19th Friday</option>
              <option value="20th Saturday">20th Saturday</option>
              <option value="21st Sunday">21st Sunday</option>
          </select>
      </div>
      
      <div style="position: absolute; top: 180px; left: 480px;">
          <div id="showtimes">
              <button class="showtime-button" data-time="11:00 AM">11:00 AM</button>
              <button class="showtime-button" data-time="04:30 PM">04:30 PM</button>
          </div>
          <p id="selected-time"></p>
      </div>
      
      <div class="price" id="price">Total Price: Rs. <span id="total-price">0</span></div>
      <button class="book-button" onclick="bookSeats()">Confirm Booking</button>
      
      <div class="modal" id="modal">
          <div class="modal-content">
              <span class="close-button" onclick="closeModal()">&times;</span>
              <div class="modal-header">
                  <h2>Booking Receipt</h2>
              </div>

              <div class="modal-body">

                <div style="position: absolute; top: 120px; left: 60px;">
                  <div class="backg4"></div>
                  </div>

                  <div style="position: absolute; top: 500px; left: 170px;">
                    <div class="txt">
                    <p>Thank you!</p>
                    </div>
                    </div>

                    <div style="position: absolute; top: 150px; left: 150px;">
                      <div class="txt">
                      <p>GODZILLA-KONG</p>
                      </div>
                      </div>

                  <p>Seat Numbers: <span id="modal-seats"></span></p>
                  <p>ShowTime: <span id="modal-selected-time"></span></p>
                  <p>Date: <span id="modal-selected-weekday"></span></p>
                  <p>Total Price: Rs. <span id="modal-price"></span></p>
              </div>

          </div>
      </div>
      
      <script>
          const numCols = 5;
          const numRows = 8;
          const numSeats = numRows * numCols;
          const seatsContainer = document.getElementById('seats');
          const totalPriceContainer = document.getElementById('total-price');
          const modalSeatsContainer = document.getElementById('modal-seats');
          const modalPriceContainer = document.getElementById('modal-price');
          const modal = document.getElementById('modal');
      
          let selectedSeats = [];
          let selectedTime = "";
          let selectedWeekday = "";
      
          // Generate seats
          for (let row = 1; row <= numRows; row++) {
              for (let col = 1; col <= numCols; col++) {
                  const seatNumber = (row - 1) * numCols + col;
                  const seat = document.createElement('button');
                  seat.className = 'seat';
                  seat.textContent = seatNumber;
                  seat.addEventListener('click', () => {
                      if (!seat.classList.contains('selected')) {
                          seat.classList.add('selected');
                          selectedSeats.push(seatNumber);
                      } else {
                          seat.classList.remove('selected');
                          const index = selectedSeats.indexOf(seatNumber);
                          if (index !== -1) selectedSeats.splice(index, 1);
                      }
                      updateTotalPrice();
                  });
                  seatsContainer.appendChild(seat);
              }
          }
      
          function updateTotalPrice() {
              totalPriceContainer.textContent = selectedSeats.length * 800; 
          }
      
          function bookSeats() {
              if (selectedSeats.length === 0) {
                  alert('Please select at least one seat.');
              } else if (selectedTime === "") {
                  alert('Please select a showtime.');
              } else if (selectedWeekday === "") {
                  alert('Please select a day.');
              } else {
                  modalSeatsContainer.textContent = selectedSeats.join(', ');
                  modalPriceContainer.textContent = selectedSeats.length * 800; 
                  document.getElementById("modal-selected-time").textContent = selectedTime;
                  document.getElementById("modal-selected-weekday").textContent = selectedWeekday;
                  modal.style.display = 'block';
              }
          }
      
          function closeModal() {
              modal.style.display = 'none';
              selectedSeats = [];
              const selectedSeatElements = document.querySelectorAll('.seat.selected');
              selectedSeatElements.forEach(seat => {
                  seat.classList.remove('selected');
              });
              updateTotalPrice();
          }
      
          window.onclick = function(event) {
              if (event.target === modal) {
                  closeModal();
              }
          }
      
          // Movie Times
          const showtimeButtons = document.querySelectorAll(".showtime-button");

function selectShowtime(button) {
    const isSelected = button.classList.contains("selected");
    showtimeButtons.forEach(btn => btn.classList.remove("selected"));
    if (!isSelected) {
        button.classList.add("selected");
        selectedTime = button.dataset.time;
    } else {
        selectedTime = null; // Deselect if already selected
    }
}

showtimeButtons.forEach(button => button.addEventListener("click", () => selectShowtime(button)));

          // Weekday
          function selectWeekday(select) {
              selectedWeekday = select.value;
          }

  </script>

</body>
</html>