<script>
function scrollToElement(id) {
  var element = document.getElementById(id);
  if (element) {
    element.scrollIntoView({ behavior: 'smooth' });
  }
}

// Fetch API
function fetchLocationData(pincode) {
    if (pincode) {
        fetch(`https://api.postalpincode.in/pincode/${pincode}`)
            .then(response => response.json())
            .then(data => {
                if (data[0].Status === "Success") {
                    const locationData = data[0].PostOffice[0];
                    document.getElementById('city').value = locationData.District;
                    document.getElementById('state').value = locationData.State;
                } else {
                    alert('Invalid Pincode');
                }
            })
            .catch(error => {
                console.error('Error fetching location data:', error);
                alert('Failed to fetch location data. Please try again later.');
            });
    }
}
$(document).ready(function() {
    $('#addUserForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'components/add_user.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'User Added Successfully',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'index.php';
                });
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed to submit form',
                    text: 'There was an issue submitting the form. Please try again.'
                });
            }
        });
    });
});



</script>