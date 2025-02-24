<script>
function viewProduct(productId) {
    // Load product details or implement view functionality
    console.log("View product with ID:", productId);
}

function editProduct(productId) {
    // Show loading alert while fetching data
    Swal.fire({
        title: "Loading...",
        text: "Fetching product details...",
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        url: "components/edit_product.php",
        type: "GET",
        data: { id: productId },
        success: function(response) {
            Swal.close(); // Close loading alert

            // Inject response (edit form) into a Bootstrap modal
            $("#editModal .modal-body").html(response);
            $("#editModal").modal("show");
        },
        error: function() {
            Swal.fire("Error", "Failed to load product details.", "error");
        }
    });
}


function deleteProduct(productId) {
    Swal.fire({
        title: "Are you sure?",
        text: "This product will be permanently deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deleting...",
                text: "Please wait",
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: "components/delete_product.php",
                type: "POST",
                data: { id: productId },
                dataType: "json", // Expect JSON response
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.message,
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire("Error", response.message, "error");
                    }
                },
                error: function() {
                    Swal.fire("Error", "Failed to delete product. Try again!", "error");
                }
            });
        }
    });
}

</script>