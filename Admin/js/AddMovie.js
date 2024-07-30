document.getElementById("movie-form").addEventListener("submit", function(event) {
  if (event.defaultPrevented) {
    return; // Prevent multiple submissions
  }
  event.preventDefault();
  // Your form submission logic here (using AJAX or form submission)
});
