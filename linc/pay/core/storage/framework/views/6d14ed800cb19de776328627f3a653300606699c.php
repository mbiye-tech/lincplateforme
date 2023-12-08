<?php $__env->startSection('panel'); ?>
    <form action="" method="POST" id="form">
        <?php echo csrf_field(); ?>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8  col-md-10">
                <div class="border--card h-auto">
                    <h4 class="title"><i class="las la-user"></i> <?php echo e(__($pageTitle)); ?></h4>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="InputFirstname" class="col-form-label"><?php echo app('translator')->get('First Name'); ?>:</label>
                            <input type="text" class="form--control" id="InputFirstname" name="firstname" placeholder="<?php echo app('translator')->get('First Name'); ?>" value="<?php echo e($agent->firstname); ?>" minlength="3">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="lastname" class="col-form-label"><?php echo app('translator')->get('Last Name'); ?>:</label>
                            <input type="text" class="form--control" id="lastname" name="lastname" placeholder="<?php echo app('translator')->get('Last Name'); ?>" value="<?php echo e($agent->lastname); ?>" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email" class="col-form-label"><?php echo app('translator')->get('E-mail Address'); ?>:</label>
                            <input class="form--control" id="email" placeholder="<?php echo app('translator')->get('E-mail Address'); ?>" value="<?php echo e($agent->email); ?>" readonly>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="phone" class="col-form-label"><?php echo app('translator')->get('Mobile Number'); ?></label>
                            <input class="form--control" id="phone" value="<?php echo e($agent->mobile); ?>" readonly>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="address" class="col-form-label"><?php echo app('translator')->get('Address'); ?>:</label>
                            <input type="text" class="form--control" id="address" name="address" placeholder="<?php echo app('translator')->get('Address'); ?>" value="<?php echo e(@$agent->address->address); ?>" required="">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="state" class="col-form-label"><?php echo app('translator')->get('State'); ?>:</label>
                            <input type="text" class="form--control" id="state" name="state" placeholder="<?php echo app('translator')->get('state'); ?>" value="<?php echo e(@$agent->address->state); ?>" required="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="zip" class="col-form-label"><?php echo app('translator')->get('Zip Code'); ?>:</label>
                            <input type="text" class="form--control" id="zip" name="zip" placeholder="<?php echo app('translator')->get('Zip Code'); ?>" value="<?php echo e(@$agent->address->zip); ?>" required="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="city" class="col-form-label"><?php echo app('translator')->get('City'); ?>:</label>
                            <input type="text" class="form--control" id="city" name="city" placeholder="<?php echo app('translator')->get('City'); ?>" value="<?php echo e(@$agent->address->city); ?>" required="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="col-form-label"><?php echo app('translator')->get('Country'); ?>:</label>
                            <input class="form--control" value="<?php echo e(@$agent->address->country); ?>" disabled>
                        </div>
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn--base w-100"><?php echo app('translator')->get('Update Profile'); ?></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/agent/profile_setting.blade.php ENDPATH**/ ?>