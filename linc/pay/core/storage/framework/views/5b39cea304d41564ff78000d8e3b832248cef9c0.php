<?php $__env->startSection('content'); ?>
    <div class="section section--sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card custom--card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <?php echo e(__($pageTitle)); ?>

                            </h5>
                        </div>
                        <div class="card-body">
                            <form class="register" action="" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('First Name'); ?></label>
                                        <input type="text" class="form-control form--control" name="firstname" value="<?php echo e($user->firstname); ?>" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Last Name'); ?></label>
                                        <input type="text" class="form-control form--control" name="lastname" value="<?php echo e($user->lastname); ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('E-mail Address'); ?></label>
                                        <input class="form-control form--control" value="<?php echo e($user->email); ?>" readonly>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Mobile Number'); ?></label>
                                        <input class="form-control form--control" value="<?php echo e($user->mobile); ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Address'); ?></label>
                                        <input type="text" class="form-control form--control" name="address" value="<?php echo e(@$user->address->address); ?>">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('State'); ?></label>
                                        <input type="text" class="form-control form--control" name="state" value="<?php echo e(@$user->address->state); ?>">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Zip Code'); ?></label>
                                        <input type="text" class="form-control form--control" name="zip" value="<?php echo e(@$user->address->zip); ?>">
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('City'); ?></label>
                                        <input type="text" class="form-control form--control" name="city" value="<?php echo e(@$user->address->city); ?>">
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Country'); ?></label>
                                        <input class="form-control form--control" value="<?php echo e(@$user->address->country); ?>" disabled>
                                    </div>

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

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/user/profile_setting.blade.php ENDPATH**/ ?>