<?php $__env->startSection('content'); ?>
    <div class="section section--sm">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card custom--card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <?php echo e(__($pageTitle)); ?>

                            </h5>
                        </div>
                        <div class="card-body">

                            <form action="" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Current Password'); ?></label>
                                    <input type="password" class="form-control form--control" name="current_password" required autocomplete="current-password">
                                </div>
                                <div class="form-group">
                                    <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Password'); ?></label>
                                    <div>
                                        <input type="password" class="form-control form--control" name="password" required autocomplete="current-password">
                                        <?php if($general->secure_password): ?>
                                            <div class="input-popup">
                                                <p class="error lower"><?php echo app('translator')->get('1 small letter minimum'); ?></p>
                                                <p class="error capital"><?php echo app('translator')->get('1 capital letter minimum'); ?></p>
                                                <p class="error number"><?php echo app('translator')->get('1 number minimum'); ?></p>
                                                <p class="error special"><?php echo app('translator')->get('1 special character minimum'); ?></p>
                                                <p class="error minimum"><?php echo app('translator')->get('6 character password'); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Confirm Password'); ?></label>
                                    <input type="password" class="form-control form--control" name="password_confirmation" required autocomplete="current-password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn--base w-100  btn--xl"><?php echo app('translator')->get('Submit'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/global/js/secure_password.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            <?php if($general->secure_password): ?>
                $('input[name=password]').on('input', function() {
                    secure_password($(this));
                });

                $('[name=password]').focus(function() {
                    $(this).closest('div').addClass('hover-input-popup');
                });

                $('[name=password]').focusout(function() {
                    $(this).closest('div').removeClass('hover-input-popup');
                });
            <?php endif; ?>
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/user/password.blade.php ENDPATH**/ ?>