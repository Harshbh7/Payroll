<?php

// Pages/billPage.php

session_start();

// Retrieve user data
$user = $_SESSION['user'];

// Retrieve products data
$products = $_SESSION['products'];

// Calculate the total amount
$totalAmount = 0;
foreach ($products as $product) {
    $totalAmount += $product['totalAmount'];
}
?>

<?php include '../globals/head.php'; ?>
<link rel="icon" href="../assets/Images/Payroll_bill3.png" type="image/png" style="width: 100%; height: 100%;">


<body>

<div class="container mt-5">
    <div class="text-center mb-5 d-flex align-items-center justify-content-center">
        <img src="../assets/Images/Payroll_bill2.png" alt="" style="width:100px; height: 100px; margin-right: 10px;">
        <h1>Payroll Bill</h1>
    </div>
    <div class="mb-3">
        <div class="row mb-2">
            <div class="col-2">
                <label for="userID"><strong>ID:</strong></label>
            </div>
            <div class="col-10">
                <input type="text" id="userID" class="form-control" value="<?php echo htmlspecialchars($user['id']); ?>" readonly>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-2">
                <label for="userName"><strong>Name:</strong></label>
            </div>
            <div class="col-10">
                <input type="text" id="userName" class="form-control" value="<?php echo htmlspecialchars($user['name']); ?>" readonly>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-2">
                <label for="userMobile"><strong>Mobile:</strong></label>
            </div>
            <div class="col-10">
                <input type="text" id="userMobile" class="form-control" value="<?php echo htmlspecialchars($user['mobile']); ?>" readonly>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-2">
                <label for="userAddress"><strong>Address:</strong></label>
            </div>
            <div class="col-10">
                <input type="text" id="userAddress" class="form-control" value="<?php echo htmlspecialchars($user['address']); ?>" readonly>
            </div>
        </div>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Amount</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) { ?>
            <tr>
                <td><?php echo htmlspecialchars($product['productId']); ?></td>
                <td><?php echo htmlspecialchars($product['productName']); ?></td>
                <td><?php echo htmlspecialchars($product['productAmount']); ?></td>
                <td><?php echo htmlspecialchars($product['productQuantity']); ?></td>
                <td><?php echo htmlspecialchars($product['totalAmount']); ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"></td>
                <td><strong>Total Amount</strong></td>
                <td>
                    <strong>
                        <i class="fa-solid fa-indian-rupee-sign"></i>  
                        <?php echo htmlspecialchars($totalAmount); ?>.00
                    </strong>
                </td>
            </tr>
        </tfoot>
    </table>
</div>



<!-- print button and go back to components/bill.php -->
 <div class="row">
    <div class="col-10"></div>
    <div class="col-2">
        <button class="btn btn-primary mt-5 mb-5" onclick="printPage()">PRINT</button>
    </div>
 </div>

</body>
<?php include '../globals/script.php'; ?>

<script>
    function printPage() {
    window.print();
    setTimeout(() => {
        window.location.href = '../index.php';
    }, 1000); // Adjust delay as needed
}

</script>


