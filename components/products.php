<!-- components/products.php -->
<?php include '../assets/php/product_php.php'; ?>

<div id="productDetails" class="product-details">
<div class="container">
    <div class="text-center mt-2 mb-2">
        <img src="assets/Images/Payroll_bill5.png" alt="">
    </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Product Amount</th>
                    <th scope="col text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../assets/php/product_table_php.php'; ?>   
            </tbody>
        </table>
    </div>
</div>

<?php include '../assets/script/product_js.php'; ?>

<?php include '../assets/style/product-details_class.php'; ?>