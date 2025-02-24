<!-- components/customer.php -->
<?php include '../assets/php/customer_php.php'; ?>


<div id="product1Details" class="product-details">
<div class="container">
    <div class="text-center mt-2 mb-2">
        <img src="assets/Images/Payroll_bill5.png" alt="">
    </div>
    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Pin Code</th>
                    <th scope="col text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../assets/php/customer_table_php.php'; ?>    
            </tbody>
        </table>
    </div>
</div>

<?php include '../assets/script/customer_php.php'; ?>

<?php include '../assets/style/product-details_class.php'; ?>

