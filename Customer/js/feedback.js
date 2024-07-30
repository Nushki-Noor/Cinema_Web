document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('feedbackForm').addEventListener('submit', function(event) {
        var nameInput = document.getElementById('name');
        var emailInput = document.getElementById('email');
        var messageInput = document.getElementById('message');

        if (!nameInput.value || !emailInput.value || !messageInput.value) {
            alert('Please fill in all fields');
            event.preventDefault();
        }
    });
});
