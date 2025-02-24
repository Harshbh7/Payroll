<!-- components/add_user.php -->

<?php include '../assets/php/add_user_php.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-5">
            <img src="assets/Images/image4.svg" alt="Contact Us" class="img-fluid mt-4" style="height: 300px;" />
        </div>
        <div class="col-7">
            <div id="product1Details" class="product-details">
                <form id="addUserForm" class="d-flex flex-column" action="components/add_user.php" method="POST">
                    <h1 class="text-center" id="form-title">Add User</h1>
                        <input type="number" class="form-control mb-4" placeholder="ID" id="user-id" name="id" disabled />
                        <input type="text" class="form-control mb-4" placeholder="Name" id="user-name" name="name" required />
                        <input type="text" class="form-control mb-4" placeholder="Username" id="user-username" name="username" required />
                        <input type="text" class="form-control mb-4" placeholder="Mobile No" id="mobile-no" name="mobile-no" required />
                        <input type="email" class="form-control mb-4" placeholder="Email" id="user-email" name="email" required />
                        <input type="text" class="form-control mb-4" placeholder="Address" id="address" name="address" required />
                        <input type="text" class="form-control mb-4" placeholder="Zip Code" id="pin-code" name="pin-code" onblur="fetchLocationData(this.value)" required />
                        <input type="text" class="form-control mb-4" placeholder="City" id="city" name="city" readonly />
                        <input type="text" class="form-control mb-4" placeholder="State" id="state" name="state" readonly />
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="submit-button">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../assets/script/add_user_js.php'; ?>


<?php include '../assets/style/product-details_class.php'; ?>

