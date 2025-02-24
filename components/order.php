<?php include '../assets/php/order_php.php'; ?>


<div id="productDetails" class="product-details">
<div class="container">
  <div class="text-center mt-2 mb-2">
    <img src="assets/Images/Payroll_bill5.png" alt="">
  </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">SN</th>
          <th scope="col">User ID</th>
          <th scope="col">User Name</th>
          <th scope="col">User Mobile</th>
          <th scope="col">Date of Purchasing</th>
          <th scope="col">Time of Purchasing</th>
          <th scope="col">Total Amount</th>
          <th scope="col" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php include '../assets/php/order_table_php.php'; ?>  
      </tbody>
    </table>
  </div>
</div>

<?php include '../assets/script/order_js.php'; ?>

<?php include '../assets/style/product-details_class.php'; ?>

