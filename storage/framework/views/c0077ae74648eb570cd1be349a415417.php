<!DOCTYPE html>
<html lang="<?php echo e(get_current_locale()); ?>" data-locale="<?php echo e(get_current_locale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="FlashTech - Cửa hàng công nghệ hàng đầu Việt Nam">
    <meta name="keywords" content="smartphone, laptop, tablet, phụ kiện công nghệ">
    <title><?php echo $__env->yieldContent('title', 'FlashTech - Technology Store'); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vite CSS -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <script>
        // Set locale in session storage for JavaScript components
        sessionStorage.setItem('locale', '<?php echo e(get_current_locale()); ?>');
    </script>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <!-- Header -->
    <?php echo $__env->make('Customers.Layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Main Content -->
    <main class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <?php echo $__env->make('Customers.Layouts.Footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Chat Widget -->
    <?php echo $__env->make('customers.components.chat-widget', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


    <script>
        function addToCartFromCard(productId) {
            fetch('<?php echo e(route("cart.add")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ product_id: productId, quantity: 1 })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Update cart count in navbar if exists
                    const cartBadge = document.querySelector('.cart-count');
                    if (cartBadge) {
                        cartBadge.textContent = data.cartCount;
                        cartBadge.style.display = data.cartCount > 0 ? '' : 'none';
                    }
                }
            })
            .catch(() => {});
        }

        function addToComparisonList(productId) {
            fetch('<?php echo e(url("so-sanh/them")); ?>/' + productId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const compBadge = document.querySelector('.comparison-count');
                    if (compBadge) {
                        compBadge.textContent = data.count;
                        compBadge.style.display = data.count > 0 ? '' : 'none';
                    }
                    if (typeof flasher !== 'undefined') {
                        flasher.success(data.message);
                    } else {
                        alert(data.message);
                    }
                } else {
                    if (typeof flasher !== 'undefined') {
                        flasher.error(data.message);
                    } else {
                        alert(data.message);
                    }
                }
            })
            .catch(() => {});
        }
    </script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /home/flashtm/Documents/FlashTechMongo/resources/views/Customers/Layouts/master.blade.php ENDPATH**/ ?>