<?php $__env->startSection('panel'); ?>
    <div class="row justify-content-center">
        <div class="col-xxl-7 col-xl-8 col-lg-10">
            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body">
                    <form action="<?php echo e(route('admin.agents.store')); ?>" method="POST" class="verify-gcaptcha row">
                        <?php echo csrf_field(); ?>
                        <div class="form-group col-md-6">
                            <label for="firstname"><?php echo app('translator')->get('First Name'); ?></label>
                            <input id="firstname" type="text" class="form-control" name="firstname" value="<?php echo e(old('firstname')); ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lastname"><?php echo app('translator')->get('Last Name'); ?></label>
                            <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname')); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="country"><?php echo app('translator')->get('Country'); ?></label>
                            <select name="country" id="country" class="form-control">
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-mobile_code="<?php echo e($country->dial_code); ?>" value="<?php echo e($key); ?>"><?php echo e(__($country->country)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile"><?php echo app('translator')->get('Mobile'); ?></label>
                            <div class="input-group">
                                <span class="input-group-text mobile-code">
                                </span>
                                <input type="number" name="mobile" id="mobile" value="<?php echo e(old('mobile')); ?>" class="form-control checkUser" placeholder="<?php echo app('translator')->get('Your Phone Number'); ?>">
                            </div>
                            <small class="text-danger mobileExist"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username"> <?php echo app('translator')->get('Username'); ?> </label>
                            <input id="username" type="text" class="form-control checkUser" name="username" value="<?php echo e(old('username')); ?>" required>
                            <small class="text-danger usernameExist"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email"><?php echo app('translator')->get('E-Mail Address'); ?></label>
                            <input id="email" type="email" class="form-control checkUser" name="email" value="<?php echo e(old('email')); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password"><?php echo app('translator')->get('Password'); ?></label>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <button class="input-group-text generatePasswordButton" type="button"><?php echo app('translator')->get('Generate'); ?></button>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password-confirm"><?php echo app('translator')->get('Confirm Password'); ?></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" id="recaptcha" class="btn btn--primary h-45 w-100">
                                <?php echo app('translator')->get('Submit'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div id="generatePassword" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title"> <?php echo app('translator')->get('Generate password'); ?></h5>
                        <button type="button" class="close bg--danger text-white" data-bs-dismiss="modal" aria-label="Close">
                            <i class="las la-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="copied-check"><?php echo app('translator')->get('Password'); ?></label>
                            <div class="input-group">
                                <input id="password-generation" type="text" class="form-control" name="generated_password" required>
                                <button class="input-group-text resetPasswordButton" type="button">
                                    <i class="las la-sync-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-0">
                            <input type="checkbox" id="copied-check" name="copied-check" required>
                            <label for="copied-check"><?php echo app('translator')->get('I have copied this password'); ?></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--primary btn-block h-45 w-100 usePasswordButton"><?php echo app('translator')->get('Use this password'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            let mobileElement = $('.mobile-code');
            $('select[name=country]').change(function() {
                mobileElement.text(`+${$('select[name=country] :selected').data('mobile_code')}`);
            });

            mobileElement.text(`+ ${$('select[name=country] :selected').data('mobile_code')}`);

            var generatePasswordModal = $('#generatePassword');

            $('.generatePasswordButton').on('click', function() {
                var form = generatePasswordModal.find('form');
                form[0].reset();
                form.find('[name=generated_password]').val(generatePassword());
                generatePasswordModal.modal('show');
            });
            $('.resetPasswordButton').on('click', function() {
                var form = generatePasswordModal.find('form');
                form.find('[name=generated_password]').val(generatePassword());
            });
            $('.usePasswordButton').on('click', function() {
                var form = generatePasswordModal.find('form');
                var generatedPassword = form.find('[name=generated_password]').val();
                var isCopied = form.find('[name=copied-check]').is(":checked");
                if (!generatedPassword) {
                    showError('<?php echo app('translator')->get('Please re-generate password'); ?>');
                    return false;
                }
                if (!isCopied) {
                    showError('<?php echo app('translator')->get('Please copy this password first'); ?>');
                    return false;
                }
                $('input[name=password]').val(generatedPassword);
                $('input[name=password_confirmation]').val(generatedPassword);
                generatePasswordModal.modal('hide');
            });

            function showError(text) {
                iziToast.error({
                    message: text,
                    position: "topRight"
                });
            }

            function generatePassword() {
                var length = 8,
                    charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+<>?,./",
                    password = "";
                for (var i = 0, n = charset.length; i < length; ++i) {
                    password += charset.charAt(Math.floor(Math.random() * n));
                }
                return password;
            }

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="<?php echo e(route('admin.agents.all')); ?>" class="btn btn-sm btn-outline--primary"><i class="las la-undo"></i> <?php echo app('translator')->get('Back'); ?> </a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .btn-sm {
            line-height: 5px;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/admin/agents/add.blade.php ENDPATH**/ ?>