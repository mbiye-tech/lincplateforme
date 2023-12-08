<?php
$cookie = App\Models\Frontend::where('data_keys', 'cookie.data')->first();
?>
<?php if($cookie->data_values->status == 1 && !\Cookie::get('gdpr_cookie')): ?>
    <!-- cookies dark version start -->
    <div class="cookies-card text-center hide">
        <div class="cookies-card__icon text--base">
            <i class="las la-cookie-bite"></i>
        </div>
        <p class="mt-4 cookies-card__content"><?php echo e($cookie->data_values->short_desc); ?> <a href="<?php echo e(route('cookie.policy')); ?>" class="text--primary" target="_blank"><?php echo app('translator')->get('learn more'); ?></a></p>
        <div class="cookies-card__btn mt-4">
            <a href="javascript:void(0)" class="btn btn--xl btn--base w-100  btn--xl policy"><?php echo app('translator')->get('Allow'); ?></a>
        </div>
    </div>
    <!-- cookies dark version end -->
<?php endif; ?>
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/partials/cookie.blade.php ENDPATH**/ ?>