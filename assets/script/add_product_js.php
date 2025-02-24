<script>
$(document).ready(function() {
    $('#addProductForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'components/add_product.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                window.location.href = 'index.php'; // Redirect to products list on success
            },
            error: function() {
                alert("Failed to submit form.");
            }
        });
    });
});


</script>