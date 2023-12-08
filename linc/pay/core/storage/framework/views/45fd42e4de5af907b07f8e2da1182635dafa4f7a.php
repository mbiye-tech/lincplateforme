<?php $__env->startSection('content'); ?>
    <div class="section section--sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="card custom--card">

                        <div class="card-body">
                            <div class="alert alert-warning" role="alert">
                                <?php echo app('translator')->get('To get access to your dashboard, you need to complete your profile by submitting the below form with proper information.'); ?>
                            </div>

                            <form method="POST" action="<?php echo e(route('user.data.submit')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row mb-0">
                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('First Name'); ?></label>
                                        <input type="text" class="form-control form--control" name="firstname" value="<?php echo e(old('firstname')); ?>" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Last Name'); ?></label>
                                        <input type="text" class="form-control form--control" name="lastname" value="<?php echo e(old('lastname')); ?>" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Address'); ?></label>
                                        <input type="text" class="form-control form--control" name="address" value="<?php echo e(old('address')); ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('State'); ?></label>
                                        <input type="text" class="form-control form--control" name="state" value="<?php echo e(old('state')); ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Zip Code'); ?></label>
                                        <input type="text" class="form-control form--control" name="zip" value="<?php echo e(old('zip')); ?>">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('City'); ?></label>
                                        <input type="text" class="form-control form--control" name="city" value="<?php echo e(old('city')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn--base w-100 btn--xl">
                                            <?php echo app('translator')->get('Submit'); ?>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/user/user_data.blade.php ENDPATH**/ ?>