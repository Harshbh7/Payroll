<!-- components/users.php -->
<div class="container">
  <div id="product1Details" class="product-details">
  <div class="row">
  <div class="col-6 mt-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add Users</h5>
        <p class="card-text">This feature allows you to add users when you click the 'Add User' button.</p>
        <a href="#" class="btn btn-primary btn-add-user" data-mdb-ripple-init>Add User</a>
      </div>
    </div>
  </div>
  <div class="col-6 mt-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add Products</h5>
        <p class="card-text">This feature allows you to add products when you click the 'Add Products' button.</p>
        <a href="#" class="btn btn-primary btn-add-product" data-mdb-ripple-init>Add Products</a>
      </div>
    </div>
  </div>
  <div class="col-6 mt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add Orders</h5>
        <p class="card-text">This feature allows you to add orders when you click the 'Add Orders' button.</p>
        <a href="#" class="btn btn-primary order" data-mdb-ripple-init>Add Orders</a>
      </div>
    </div>
  </div>
  <div class="col-6 mt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Customer Table</h5>
        <p class="card-text">This feature allows you to see customers when you click the 'See Customer' button.</p>
        <a href="#" class="btn btn-primary customer" data-mdb-ripple-init>See Customer</a>
      </div>
    </div>
  </div>
  <div class="col-6 mt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">See About</h5>
        <p class="card-text">This feature allows you to See About when you click the 'See About' button.</p>
        <a href="#" class="btn btn-primary about" data-mdb-ripple-init>See About</a>
      </div>
    </div>
  </div>
  <div class="col-6 mt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">See Contact</h5>
        <p class="card-text">This feature allows you to See Contact when you click the 'See Contact' button.</p>
        <a href="#" class="btn btn-primary contact" data-mdb-ripple-init>See Contact</a>
      </div>
    </div>
  </div>
</div>

  </div>
</div>

<script>
function scrollToElement(id) {
  var element = document.getElementById(id);
  if (element) {
    element.scrollIntoView({ behavior: 'smooth' });
  }
}

function deleteProduct(productId) {
  console.log("Delete product with ID:", productId);
}
</script>

<style>
.product-details {
  margin-top: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  max-height: 530px; 
  overflow-y: auto;
}
</style>

