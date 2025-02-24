<script>
    $(document).ready(function() {
        function loadContent(url) {
            $.ajax({
                url: url,
                success: function(data) {
                    $('#main-content').html(data);
                },
                error: function() {
                    alert("Failed to load content.");
                }
            });
        }

        // Event delegation for dynamically loaded content
        $(document).on('click', '.btn-add-user', function(e) {
            e.preventDefault();
            loadContent('components/add_user.php');
        });

        $(document).on('click', '.btn-add-product', function(e) {
            e.preventDefault();
            loadContent('components/add_product.php');
        });

        $(document).on('click', '.home', function(e) {
            e.preventDefault();
            loadContent('components/users.php');
        });

        $(document).on('click', '.about', function(e) {
            e.preventDefault();
            loadContent('components/about.php');
        });

        $(document).on('click', '.contact', function(e) {
            e.preventDefault();
            loadContent('components/contact.php');
        });

        $(document).on('click', '.customer', function(e) {
            e.preventDefault();
            loadContent('components/customer.php');
        });

        $(document).on('click', '.products', function(e) {
            e.preventDefault();
            loadContent('components/products.php');
        });

        $(document).on('click', '.order', function(e) {
            e.preventDefault();
            loadContent('components/order.php');
        });

        $(document).on('click', '.bill', function(e) {
            e.preventDefault();
            loadContent('components/bill.php');
        });

        // Ensure that the Dashboard link is active on page load
        $('#dashboard-link').addClass('active');

        // Manage active class on nav links
        var navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                navLinks.forEach(function(link) {
                    link.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    });
</script>