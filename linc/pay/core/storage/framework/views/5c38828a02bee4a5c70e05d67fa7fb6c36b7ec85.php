<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php echo e($general->siteName(__($pageTitle))); ?></title>
    <?php echo $__env->make('partials.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="icon" href="<?php echo e(getImage(getFilePath('logoIcon') . '/favicon.png')); ?>" sizes="16x16" type="image/png" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/line-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/lib/odometer-theme-default.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/lib/magnific-popup.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/main.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset($activeTemplateTrue . 'css/custom.css')); ?>" />
    <link rel="stylesheet"
        href="<?php echo e(asset($activeTemplateTrue . 'css/color.php')); ?>?color=<?php echo e($general->base_color); ?>" />
    <?php echo $__env->yieldPushContent('style-lib'); ?>

    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body>
    <?php echo $__env->yieldPushContent('fbComment'); ?>

    <?php if(Route::currentRouteName() == 'home'): ?>

        <div class="preloader">
            <div class="preloader__img">
                <img src="<?php echo e(getImage(getFilePath('logoIcon') . '/favicon.png')); ?>" alt="image">
            </div>
        </div>

    <?php endif; ?>
    <div class="back-to-top">
        <span class="back-top">
            <i class="las la-angle-double-up"></i>
        </span>
    </div>

    <?php echo $__env->yieldContent('panel'); ?>
    <script src="<?php echo e(asset('assets/global/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/lib/jquery.magnific-popup.js')); ?>"></script>

    <script src="<?php echo e(asset($activeTemplateTrue . 'js/lib/viewport.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/lib/odometer.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . 'js/app.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('script-lib'); ?>

    <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('partials.plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->yieldPushContent('script'); ?>


    <script>
        (function($) {
            "use strict";
            $(".langSel").on("change", function() {
                window.location.href = "<?php echo e(route('home')); ?>/change/" + $(this).val();
            });
            $('form').on('submit', function() {
                $(':submit', this).attr('disabled', 'disabled');
            });
            $('.showFilterBtn').on('click', function() {
                $('.responsive-filter-card').slideToggle();
            });
        })(jQuery);

    </script>
</body>

</html>
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/layouts/app.blade.php ENDPATH**/ ?>