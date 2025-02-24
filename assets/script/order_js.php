<script>
function scrollToElement(id) {
  var element = document.getElementById(id);
  if (element) {
    element.scrollIntoView({ behavior: 'smooth' });
  }
}

function deleteProduct(productId) {
  // Implement product deletion logic
  console.log("Delete product with ID:", productId);
}
</script>