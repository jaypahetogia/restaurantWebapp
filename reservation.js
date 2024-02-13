document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('.book-now-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            //Get table number
            var tableNumber = this.getAttribute('data-table');
            var form = document.getElementById('reservation-form');
            var tableNumberInput = form.querySelector('[name="table_number"]');
            if (tableNumberInput) {
                tableNumberInput.value = tableNumber;
            }

            document.getElementById('booking-form').style.display = 'block';
            document.getElementById('booking-form').scrollIntoView({ behavior: 'smooth' });
        });
    });

    //Form submission
    document.getElementById('reservation-form').addEventListener('submit', function(e) {
        e.preventDefault(); 
        document.getElementById('confirmation-message').style.display = 'block';
        this.style.display = 'none'; 

        document.getElementById('confirmation-message').scrollIntoView({ behavior: 'smooth' });
    });
});