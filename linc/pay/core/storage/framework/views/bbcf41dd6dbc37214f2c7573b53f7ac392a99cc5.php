<?php $__env->startSection('content'); ?>
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7 col-xl-5">
                    <div class="card custom--card">
                        <div class="card-body">
                            <div class="mb-4">
                                <p><?php echo app('translator')->get('To recover your account please provide your email or username to find your account.'); ?></p>
                            </div>
                            <form method="POST" action="<?php echo e(route('user.password.email')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Email or Username'); ?></label>
                                    <input type="text" class="form-control form--control" name="value" value="<?php echo e(old('value')); ?>" required autofocus="off">
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

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/user/auth/passwords/email.blade.php ENDPATH**/ ?>