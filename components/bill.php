<?php include '../assets/php/bill_php.php'; ?>


<div id="product1Details" class="product-details">
    <div class="container">
        <div class="text-center mt-2 mb-2">
            <img src="assets/Images/Payroll_bill5.png" alt="">
        </div>
        <form>
            <div class="row mt-5">
                <div class="col-4">
                    <input type="radio" id="searchById" name="searchOption" value="id" checked onchange="updateForm()">
                    <label for="searchById">Search User By ID</label>
                </div>
                <div class="col-4">
                    <input type="radio" id="searchByMobile" name="searchOption" value="mobile" onchange="updateForm()">
                    <label for="searchByMobile">Search User By Mobile Number</label>
                </div>
                <div class="col-4">
                    <input type="radio" id="searchByName" name="searchOption" value="name" onchange="updateForm()">
                    <label for="searchByName">Search User By Name</label>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <label id="searchLabel" for="searchInput">ID</label>
                    <select id="searchInput" class="form-control">
                        <option value="">Select User</option>
                    </select>
                </div>
                <div class="col-5"></div>
                <div class="col-2">
                    <button type="button" class="btn btn-primary" onclick="fetchUserDetails()">Add</button>
                </div>
                <div class="col-5"></div>
            </div>
        </form>
        <hr>
        <br>
        <div class="border border-dark p-3">
            <div class="container userform">
                <form id="userForm">

                    <!-- User Information -->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">User ID:</label>
                        <div class="col-md-10">
                            <input type="text" id="userId" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-md-2 col-form-label">Name:</label>
                        <div class="col-md-10">
                            <input type="text" id="userName" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-md-2 col-form-label">Mobile No:</label>
                        <div class="col-md-10">
                            <input type="text" id="userMobile" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-md-2 col-form-label">Address:</label>
                        <div class="col-md-10">
                            <input type="text" id="userAddress" class="form-control" readonly>
                        </div>
                    </div>

                    <hr>

                    <!-- Product List -->
                    <div class="container mt-4">
                        <div id="productList"></div>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="button" class="btn btn-primary" onclick="addRow()">Add Product</button>
                            <button type="button" class="btn btn-success" id="billGenerate" onclick="generateBill()">Bill Generate</button>
                            <input type="text" id="allTotalAmount" class="form-control w-25" value="Rs 0" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../assets/script/bill_js.php'; ?>


<?php include '../assets/style/bill_css.php'; ?>