<?php $__env->startSection('content'); ?>
    <div class="login-main"
         style="background-image: url('<?php echo e(asset('assets/agent/images/login.jpg')); ?>')">
        <div class="custom-container container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 col-sm-11">
                    <div class="login-area">
                        <div class="login-wrapper">
                            <div class="login-wrapper__top">
                                <h3 class="title text-white"><?php echo app('translator')->get('Welcome to'); ?> <strong><?php echo e(__($general->site_name)); ?></h3>
                                <p class="text-white"><?php echo e(__($pageTitle)); ?></p>
                            </div>
                            <div class="login-wrapper__body">
                                <form action="<?php echo e(route('agent.login')); ?>" method="POST" class="cmn-form mt-30 verify-gcaptcha login-form">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label><?php echo app('translator')->get('Username'); ?></label>
                                                <input type="text" class="form--control" value="<?php echo e(old('username')); ?>" name="username" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label><?php echo app('translator')->get('Password'); ?></label>
                                                <input type="password" class="form--control" name="password" value="" required>
                                            </div>
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Captcha::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
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
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" name="remember" type="checkbox" id="remember">
                                            <label class="form-check-label" for="remember"><?php echo app('translator')->get('Remember Me'); ?></label>
                                        </div>
                                        <a href="<?php echo e(route('agent.password.reset')); ?>" class="forget-text"><?php echo app('translator')->get('Forgot Password?'); ?></a>
                                    </div>
                                    <button type="submit" class="btn cmn-btn w-100 mt-3"><?php echo app('translator')->get('LOGIN'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('agent.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/agent/auth/login.blade.php ENDPATH**/ ?>