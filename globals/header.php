<!-- globals/header.php -->
<div class="container-fluid">
    <div class="row">
        <div class="col-2 p-0"> 
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark bg-dark" style="height: 100vh;">
                <a href="index.php" class="d-flex align-items-center text-white text-decoration-none">
                    <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="d-flex align-items-center fs-4">
                        <img src="assets/Images/Payroll_bill1.png" style="width: 60px;">
                        <h4 class="mb-0 ml-1">Payroll App</h4>
                    </span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="#" class="nav-link text-white home active" id="dashboard-link">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white bill" id="bill-link">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                             Create Bill
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white order" id="orders-link">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white products" id="products-link">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white customer" id="customers-link">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                            Customers
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-10 p-0">
            <nav class="navbar navbar-expand-lg bg-dark" style="padding: 15px;" aria-label="Eleventh navbar example">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarsExample09">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-white btn-add-user" href="#">Add User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white btn-add-product" href="#">Add Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white about" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white contact" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div id="main-content">
                    <?php include 'components/users.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>