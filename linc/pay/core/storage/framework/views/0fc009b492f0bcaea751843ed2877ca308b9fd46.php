<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label> <?php echo app('translator')->get('Site Title'); ?></label>
                                    <input class="form-control" type="text" name="site_name" required value="<?php echo e($general->site_name); ?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('Currency'); ?></label>
                                    <input class="form-control" type="text" name="cur_text" required value="<?php echo e($general->cur_text); ?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('Currency Symbol'); ?></label>
                                    <input class="form-control" type="text" name="cur_sym" required value="<?php echo e($general->cur_sym); ?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label> <?php echo app('translator')->get('Fixed Commission'); ?></label>
                                    <div class="input-group">
                                        <input class="form-control " type="text" name="fixed_commission" value="<?php echo e(getAmount($general->fixed_commission, 8)); ?>">
                                        <div class="input-group-text cur_text">
                                            <?php echo e($general->cur_text); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('Percent Commission'); ?> </label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="percent_commission" value="<?php echo e(getAmount($general->percent_commission, 8)); ?>">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="form-group ">
                                    <label><?php echo app('translator')->get('SMS Code Duration'); ?> </label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="resent_code_duration" value="<?php echo e($general->resent_code_duration); ?>">
                                        <span class="input-group-text">
                                            <?php echo app('translator')->get('Seconds'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label> <?php echo app('translator')->get('Timezone'); ?></label>
                                <div class="agent-selector">
                                    <select class="select2-basic" name="timezone">
                                        <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="'<?php echo e(@$timezone); ?>'"><?php echo e(__($timezone)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label> <?php echo app('translator')->get('Site Base Color'); ?></label>
                                <div class="input-group">
                                    <span class="input-group-text p-0 border-0">
                                        <input type='text' class="form-control colorPicker" value="<?php echo e($general->base_color); ?>" />
                                    </span>
                                    <input type="text" class="form-control colorCode" name="base_color" value="<?php echo e($general->base_color); ?>" />
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-sm-6">
                                <label><?php echo app('translator')->get('Force Secure Password'); ?> <span class="text--primary" title="<?php echo app('translator')->get('If you enable this, users have to set secure password.'); ?>"><i class="fas fa-info-circle"></i></span></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="50" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="secure_password" <?php if($general->secure_password): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label><?php echo app('translator')->get('Agree Policy'); ?> <span class="text--primary" title="<?php echo app('translator')->get('If you enable this, users have to agree with all policies to be registered.'); ?>"><i class="fas fa-info-circle"></i></span></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="50" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="agree" <?php if($general->agree): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label><?php echo app('translator')->get('User Registration'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="50" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="registration" <?php if($general->registration): ?> checked <?php endif; ?>>
                            </div>

                            <div class="form-group col-md-4 col-sm-6">
                                <label><?php echo app('translator')->get('Force SSL'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="50" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disabled'); ?>" name="force_ssl" <?php if($general->force_ssl): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label> <?php echo app('translator')->get('KYC Verification'); ?></label>
                                <a href="<?php echo e(route('admin.kyc.setting.module')); ?>" class="float-end"><?php echo app('translator')->get('KYC Modules'); ?></a>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="50" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="kv" <?php if($general->kv): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label> <?php echo app('translator')->get('Email Verification'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="50" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="ev" <?php if($general->ev): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label><?php echo app('translator')->get('Email Notification'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="50" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="en" <?php if($general->en): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label> <?php echo app('translator')->get('Mobile Verification'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="50" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="sv" <?php if($general->sv): ?> checked <?php endif; ?>>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label><?php echo app('translator')->get('SMS Notification'); ?></label>
                                <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-bs-toggle="toggle" data-height="50" data-on="<?php echo app('translator')->get('Enable'); ?>" data-off="<?php echo app('translator')->get('Disable'); ?>" name="sn" <?php if($general->sn): ?> checked <?php endif; ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/spectrum.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/spectrum.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('.colorPicker').spectrum({
                color: $(this).data('color'),
                change: function(color) {
                    $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
                }
            });

            $('.colorCode').on('input', function() {
                var clr = $(this).val();
                $(this).parents('.input-group').find('.colorPicker').spectrum({
                    color: clr,
                });
            });

            $('select[name=timezone]').val("'<?php echo e(config('app.timezone')); ?>'").select2();
            $('.select2-basic').select2({
                dropdownParent: $('.card-body')
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/admin/setting/general.blade.php ENDPATH**/ ?>