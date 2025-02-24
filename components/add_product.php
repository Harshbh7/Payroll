<?php include '../assets/php/add_product_php.php'; ?>


<div class="container">
    <h2 class="text-center mt-5">Add Product</h2>
    <form id="addProductForm" class="row g-3 needs-validation mt-5" novalidate>
        <div class="col-md-12">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter Product Name" required>
            <div class="valid-feedback">Looks good!</div>
        </div>
        <div class="col-md-12">
            <label for="productDescription" class="form-label">Product Description</label>
            <input type="text" class="form-control" id="productDescription" name="productDescription" placeholder="Enter Product Description" required>
            <div class="valid-feedback">Looks good!</div>
        </div>
        <div class="col-md-12">
            <label for="productAmount" class="form-label">Product Amount</label>
            <div class="input-group has-validation">
                <span class="input-group-text">In Rupees</span>
                <input type="number" step="0.01" class="form-control" id="productAmount" name="productAmount" placeholder="Enter Amount" required>
                <div class="invalid-feedback">Please Enter Amount.</div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Add Product</button>
        </div>
    </form>
</div>

<?php include '../assets/script/add_product_js.php'; ?>