<script>
function scrollToElement(id) {
    var element = document.getElementById(id);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
    }
}

function deleteProduct(productId) {
    // Implement product deletion logic
    console.log("Delete product with ID:", productId);
}

function editUser(userId) {
    // Load edit form with user data
    loadContent(`components/edit_user.php?id=${userId}`);
}

function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
        $.ajax({
            url: 'components/delete_user.php',
            type: 'POST',
            data: { id: userId },
            success: function(response) {
                alert('User deleted successfully.');
                location.reload();
            },
            error: function() {
                alert('Failed to delete user.');
            }
        });
    }
}

</script>