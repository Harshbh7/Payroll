<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    updateForm();
});

function updateForm() {
    var searchById = document.getElementById("searchById").checked;
    var searchByMobile = document.getElementById("searchByMobile").checked;
    var searchByName = document.getElementById("searchByName").checked;
    var searchLabel = document.getElementById("searchLabel");
    var searchInput = document.getElementById("searchInput");

    // Clear previous options
    searchInput.innerHTML = '<option value="">Select User</option>';

    if (searchById) {
        searchLabel.innerText = "ID";
        searchInput.innerHTML += `<?php echo $userOptionsById; ?>`;
    } else if (searchByMobile) {
        searchLabel.innerText = "Mobile No";
        searchInput.innerHTML += `<?php echo $userOptionsByMobile; ?>`;
    } else if (searchByName) {
        searchLabel.innerText = "Name";
        searchInput.innerHTML += `<?php echo $userOptionsByName; ?>`;
    }
}

function fetchUserDetails() {
    var searchOption = document.querySelector('input[name="searchOption"]:checked').value;
    var searchInput = document.getElementById("searchInput").value.trim();

    if (searchInput) {
        $.ajax({
            url: 'components/get_user_details.php',
            type: 'GET',
            data: { searchOption: searchOption, searchInput: searchInput },
            success: function(response) {
                try {
                    var user = JSON.parse(response);
                    if (user && user.id) {
                        $('#userId').val(user.id || '');
                        $('#userName').val(user.name || '');
                        $('#userMobile').val(user.mobile_no || '');
                        $('#userAddress').val(user.address || '');
                    } else {
                        alert('User not found.');
                    }
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                    alert('Failed to parse user details.');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('Failed to fetch user details.');
            }
        });
    } else {
        alert('Please select a user.');
    }
}


function addRow() {
    var rowIndex = $('#productList .product-row').length + 1; // Incremental index for each row
    var row = `
    <div class="row product-row" data-index="${rowIndex}">
        <div class="col-md-1">
            <input type="text" class="form-control" placeholder="ID" name="product_id[]" readonly>
        </div>
        <div class="col-md-4 quantity-controls">
            <select class="form-control" name="product_name[]" onchange="fetchProductDetails(this)">
                <option value="">Please select product</option>
                <!-- Options will be populated dynamically -->
            </select>
        </div>
        <div class="col-md-2">
            <input type="number" class="form-control" placeholder="Amount" name="product_amount[]" oninput="updateTotal(this)" readonly>
        </div>
        <div class="col-md-2 quantity-controls">
            <button class="btn btn-danger" type="button" onclick="changeQuantity(this, -1)" style="width: 35px; height: 35px;">
                <i class="fa-solid fa-minus"></i>
            </button>
            <input type="number" class="form-control" value="1" name="product_quantity[]" oninput="updateTotal(this)" min="1" style="width: 70px;" readonly>
            <button class="btn btn-success" type="button" onclick="changeQuantity(this, 1)" style="width: 35px; height: 35px;">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control total-amount" readonly>
        </div>
        <div class="col-md-1">
            <button class="btn btn-danger" type="button" onclick="deleteRow(this)">
                Delete
            </button>
        </div>
    </div>`;

    $('#productList').append(row);

    // Populate the product dropdown with available products
    $.ajax({
        url: 'components/get_product_details.php',
        type: 'GET',
        data: { fetch_all: 'true' },
        success: function(response) {
            try {
                var products = JSON.parse(response);
                var options = '<option value="">Please select product</option>';
                products.forEach(product => {
                    options += `<option value="${product.id}">${product.productName}</option>`;
                });
                $('#productList .product-row:last-child select[name="product_name[]"]').html(options);
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
}

function deleteRow(button) {
    $(button).closest('.product-row').remove();
    updateAllTotalAmount(); // Update total amount after deleting a row
}

function fetchProductDetails(selectElement) {
    var productId = selectElement.value;

    if (productId) {
        $.ajax({
            url: 'components/get_product_details.php',
            type: 'GET',
            data: { id: productId },
            success: function(response) {
                try {
                    var product = JSON.parse(response);
                    if (product) {
                        var row = $(selectElement).closest('.product-row');
                        row.find('input[name="product_id[]"]').val(product.id);
                        row.find('input[name="product_amount[]"]').val(product.productAmount);
                        updateTotal(row.find('input[name="product_quantity[]"]')[0]); // Update total based on quantity
                    }
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }
}

function changeQuantity(button, change) {
    var quantityInput = $(button).siblings('input[name="product_quantity[]"]');
    var newQuantity = parseInt(quantityInput.val()) + change;
    if (newQuantity >= 1) {
        quantityInput.val(newQuantity);
        updateTotal(quantityInput[0]);
    }
}

function updateTotal(input) {
    var row = $(input).closest('.product-row');
    var amount = parseFloat(row.find('input[name="product_amount[]"]').val()) || 0;
    var quantity = parseFloat(row.find('input[name="product_quantity[]"]').val()) || 0;
    var total = amount * quantity;
    row.find('.total-amount').val(total.toFixed(2));
    updateAllTotalAmount(); // Update total amount after modifying a row
}

function updateAllTotalAmount() {
    var totalAmount = 0;
    $('#productList .product-row').each(function() {
        var rowTotal = parseFloat($(this).find('.total-amount').val()) || 0;
        totalAmount += rowTotal;
    });
    $('#allTotalAmount').val(`Rs ${totalAmount.toFixed(2)}`);
}

//Generate Bill Button
function generateBill() {
    // Collect user data
    var userId = $('#userId').val();
    var userName = $('#userName').val();
    var userMobile = $('#userMobile').val();
    var userAddress = $('#userAddress').val();

    // Collect product data
    var products = [];
    $('#productList .product-row').each(function() {
        var productId = $(this).find('input[name="product_id[]"]').val();
        var productName = $(this).find('select[name="product_name[]"] option:selected').text();
        var productAmount = $(this).find('input[name="product_amount[]"]').val();
        var productQuantity = $(this).find('input[name="product_quantity[]"]').val();
        var totalAmount = $(this).find('.total-amount').val();

        products.push({
            productId: productId,
            productName: productName,
            productAmount: productAmount,
            productQuantity: productQuantity,
            totalAmount: totalAmount
        });
    });

    // Send data to server
    $.ajax({
        url: 'components/store_bill_data.php',
        type: 'POST',
        data: {
            userId: userId,
            userName: userName,
            userMobile: userMobile,
            userAddress: userAddress,
            products: products
        },
        success: function(response) {
            // Parse response and handle redirection
            try {
                var result = JSON.parse(response);
                if (result.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Bill Generated',
                        text: 'The bill has been successfully generated!',
                        confirmButtonText: 'SEE BILL'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'Pages/billPage.php'; // Redirect to the bill page
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Failed to generate bill.',
                    });
                }
            } catch (e) {
                console.error('Error parsing JSON:', e);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please Enter User and Products. 1',
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to generate bill.',
            });
        }
    });
}

</script>