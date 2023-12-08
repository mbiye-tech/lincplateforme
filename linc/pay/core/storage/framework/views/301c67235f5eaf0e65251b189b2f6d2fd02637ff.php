<div class="mb-3">
    <label class="fw-bold"><?php echo app('translator')->get('Verification Code'); ?></label>
    <div class="verification-code">
        <input type="text" name="code" id="verification-code" class="form-control overflow-hidden" required autocomplete="off">
        <div class="boxes">
            <span>-</span>
            <span>-</span>
            <span>-</span>
            <span>-</span>
            <span>-</span>
            <span>-</span>
        </div>
    </div>
</div>

<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/verification-code.css')); ?>">
    <style>
        .verification-code-wrapper {
            border: 1px solid rgba(var(--r), var(--g), var(--b), 0.1);
            box-shadow: 0 5px 10px 0 rgb(var(--dark) / 0.02);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('#verification-code').on('input', function() {
            $(this).val(function(i, val) {
                if (val.length >= 6) {
                    $('.submit-form').find('button[type=submit]').html('<i class="las la-spinner fa-spin"></i>');
                    $('.submit-form').submit()
                }
                if (val.length > 6) {
                    return val.substring(0, val.length - 1);
                }
                return val;
            });
            for (let index = $(this).val().length; index >= 0; index--) {
                $($('.boxes span')[index]).html('');
            }
            console.log($(this).val());
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/partials/verification_code.blade.php ENDPATH**/ ?>