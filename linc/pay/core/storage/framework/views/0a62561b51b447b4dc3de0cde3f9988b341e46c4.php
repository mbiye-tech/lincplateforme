<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($general->siteName($pageTitle ?? '')); ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(getImage(getFilePath('logoIcon') . '/favicon.png')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/agent/css/lightcase.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/slick.css')); ?>">
    <?php echo $__env->yieldPushContent('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/agent/css/agent.css')); ?>">
    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body>
    <?php echo $__env->yieldContent('content'); ?>

    <script src="<?php echo e(asset('assets/global/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/agent/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/agent/js/lightcase.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/agent/js/jquery.paroller.min.js')); ?>"></script>
    <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('script-lib'); ?>
    <script src="<?php echo e(asset('assets/global/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/agent/js/agent.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/global/js/jquery.slimscroll.min.js')); ?>"></script>

    <script>
        (function($) {
            "use strict";
            $(".langSel").on("change", function() {
                window.location.href = "<?php echo e(route('home')); ?>/change/" + $(this).val();
            });
            $('.showFilterBtn').on('click', function() {
                $('.responsive-filter-card').slideToggle();
            });

        })(jQuery)
    </script>

    <?php echo $__env->yieldPushContent('script'); ?>


</body>

</html>
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/agent/layouts/master.blade.php ENDPATH**/ ?>