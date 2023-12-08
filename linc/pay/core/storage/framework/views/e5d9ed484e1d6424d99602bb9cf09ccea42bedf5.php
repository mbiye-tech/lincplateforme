<?php $__env->startSection('content'); ?>
    <?php
    $register = getContent('register.content', true);
    $policyPages = getContent('policy_pages.element', false, null, true);
    ?>
    <div class="section login-section" style="background-image: url(<?php echo e(getImage($activeTemplateTrue . 'images/auth-bg.jpg')); ?>)">
        <div class="container">
            <div class="row g-4 g-xl-0 justify-content-between align-items-center">
                <div class="col-lg-4 col-xl-6 d-none d-lg-block">
                    <img src="<?php echo e(getImage('assets/images/frontend/register/' . @$register->data_values->image, '660x625')); ?>"
                        alt="<?php echo e($general->site_name); ?>" class="img-fluid">
                </div>
                <div class="col-lg-8 col-xl-6">
                    <div class="login__right bg--light">
                        <form action="<?php echo e(route('user.register')); ?>" class="login__form row g-3 g-sm-4" method="POST" onsubmit="return submitUserForm();" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <div class="col-sm-6 col-xl-6 ">
                                <label for="user-name" class="form-label sm-text t-heading-font heading-clr fw-md"><?php echo app('translator')->get('Username'); ?></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="la la-user"></i>
                                    </span>
                                    <input id="username" id="user-name" type="text" class="form-control form--control checkUser" name="username" value="<?php echo e(old('username')); ?>" required>
                                </div>
                                <small class="text-danger usernameExist"></small>
                            </div>
                            <div class="col-sm-6 col-xl-6 ">
                                <label for="email" class="form-label sm-text t-heading-font heading-clr fw-md"><?php echo app('translator')->get('Email'); ?></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="las la-envelope"></i>
                                    </span>
                                    <input id="email" type="email" class="form-control checkUser form--control" name="email" value="<?php echo e(old('email')); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-6 ">
                                <label class="form-label sm-text t-heading-font heading-clr fw-md">
                                    <?php echo app('translator')->get('Country'); ?>
                                </label>
                                <div class="input-group input--group">
                                    <span class="input-group-text">
                                        <i class="las la-globe"></i>
                                    </span>
                                    <div class="form--select-light">
                                        <select class="form-select form--select" name="country" aria-label="Default select example">
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option data-mobile_code="<?php echo e($country->dial_code); ?>" value="<?php echo e($country->country); ?>" data-code="<?php echo e($key); ?>"><?php echo e(__($country->country)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-6 ">
                                <label for="mobile" class="form-label sm-text t-heading-font heading-clr fw-md"><?php echo app('translator')->get('Mobile'); ?></label>
                                <div class="input-group">
                                    <span class="input-group-text mobile-code">
                                    </span>
                                    <input type="hidden" name="mobile_code">
                                    <input type="hidden" name="country_code">
                                    <input type="number" name="mobile" id="mobile" value="<?php echo e(old('mobile')); ?>" class="form-control form--control checkUser">
                                </div>
                                <small class="text-danger mobileExist"></small>
                            </div>
                            <div class="col-sm-6 col-xl-6 ">
                                <label for="password" class="form-label sm-text t-heading-font heading-clr fw-md"><?php echo app('translator')->get('Password'); ?></label>
                                <div class="input-group hover-input-popup ">
                                    <span class="input-group-text">
                                        <i class="las la-lock"></i>
                                    </span>
                                    <input id="password" type="password" name="password" class="form-control form--control border-end-0" />
                                    <span class="input-group-text pass-toggle border-start-0">
                                        <i class="las la-eye-slash"></i>
                                    </span>
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
                            <div class="col-sm-6 col-xl-6 ">
                                <label for="confirm-password" class="form-label sm-text t-heading-font heading-clr fw-md"><?php echo app('translator')->get('Confirm Password'); ?></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="las la-lock"></i>
                                    </span>
                                    <input id="confirm-password" type="password" class="form-control form--control border-end-0" name="password_confirmation" required autocomplete="new-password" />
                                    <span class="input-group-text pass-toggle border-start-0">
                                        <i class="las la-eye-slash"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-12">
                                <?php if (isset($component)) { $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Captcha::class, ['class' => 'form-label sm-text t-heading-font heading-clr fw-md'] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Captcha::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243)): ?>
<?php $component = $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243; ?>
<?php unset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243); ?>
<?php endif; ?>
                            </div>
                            <?php if($general->agree): ?>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input custom--check" type="checkbox" name="agree" id="rememberMe" required />
                                        <label class="form-check-label sm-text t-heading-font heading-clr" for="rememberMe">
                                            <?php echo app('translator')->get('I agree with'); ?>
                                            <?php $__currentLoopData = $policyPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('policy.pages', [slug($page->data_values->title), $page->id])); ?>" class="t-link text--base t-link--base"><?php echo e(__($page->data_values->title)); ?></a>
                                                <?php if(!$loop->last): ?>
                                                    ,
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-12">
                                <button class="btn btn--xl btn--base w-100 btn--xl"> <?php echo app('translator')->get('Submit'); ?> </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    

    <div class="modal fade" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="existModalLongTitle"><?php echo app('translator')->get('You are with us'); ?></h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <h6 class="text-center"><?php echo app('translator')->get('You already have an account please Login '); ?></h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                    <a href="<?php echo e(route('user.login')); ?>" class="btn btn--base btn-sm"><?php echo app('translator')->get('Login'); ?></a>
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
        "use strict";
        (function($) {
            <?php if($mobile_code): ?>
                $(`option[data-code=<?php echo e($mobile_code); ?>]`).attr('selected', '');
            <?php endif; ?>

            $('select[name=country]').change(function() {
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            <?php if($general->secure_password): ?>
                $('input[name=password]').on('input', function() {
                    secure_password($(this));
                });

                $('[name=password]').focus(function() {
                    $(this).closest('.form-group').addClass('hover-input-popup');
                });

                $('[name=password]').focusout(function() {
                    $(this).closest('.form-group').removeClass('hover-input-popup');
                });
            <?php endif; ?>

            $('.checkUser').on('focusout', function(e) {
                var url = '<?php echo e(route('user.checkUser')); ?>';
                var value = $(this).val();
                var token = '<?php echo e(csrf_token()); ?>';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/user/auth/register.blade.php ENDPATH**/ ?>