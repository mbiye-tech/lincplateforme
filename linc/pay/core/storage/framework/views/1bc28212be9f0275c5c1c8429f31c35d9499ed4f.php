<?php $__env->startSection('content'); ?>
    <?php
    $contact = getContent('contact.content', true);
    $socials = getContent('social_icon.element', false, null, true);
    ?>

    <!-- Map Section  -->
    <div class="section">
        <div class="container">
            <div class="row g-4 justify-content-between">
                <div class="col-lg-6 col-xl-5">

                    <div class="bg--light">
                        <form action="" method="POST" class="verify-gcaptcha row g-3 g-sm-4 login__form">
                            <?php echo csrf_field(); ?>
                            <div class="col-12">
                                <h4 class="mt-0"><?php echo e(__($contact->data_values->title)); ?></h4>
                                <p class="mb-0">
                                    <?php echo e(__($contact->data_values->description)); ?>

                                </p>
                            </div>

                            <?php if(auth()->guard()->guest()): ?>
                                <div class="col-12">
                                    <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Name'); ?></label>
                                    <input name="name" type="text" class="form-control form--control" value="<?php echo e(old('name')); ?>" required>
                                </div>

                                <div class="col-12">
                                    <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Email'); ?></label>
                                    <input name="email" type="email" class="form-control form--control" value="<?php echo e(old('email')); ?>" required>
                                </div>
                            <?php else: ?>
                                <div class="col-12">
                                    <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Name'); ?></label>
                                    <input class="form-control form--control" value="<?php echo e(auth()->user()->fullname); ?>" disabled>
                                </div>

                                <div class="col-12">
                                    <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Email'); ?></label>
                                    <input class="form-control form--control" value="<?php echo e(auth()->user()->email); ?>" disabled>
                                </div>
                            <?php endif; ?>
                            <div class="col-12">
                                <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Subject'); ?></label>
                                <input name="subject" type="text" class="form-control form--control" value="<?php echo e(old('subject')); ?>" required>
                            </div>

                            <div class="col-12">
                                <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Message'); ?></label>
                                <textarea name="message" wrap="off" class="form-control form--control-textarea" required><?php echo e(old('message')); ?></textarea>
                            </div>

                            <?php if (isset($component)) { $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Captcha::class, ['class' => 'd-block sm-text'] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
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
                            <div class="col-12">
                                <button class="btn btn--xl btn--base"> <?php echo app('translator')->get('Send Message'); ?> </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="d-flex flex-column gap-5">
                        <img src="<?php echo e(getImage('assets/images/frontend/contact/' . @$contact->data_values->image, '525x395')); ?>" alt="" class="img-fluid d-none d-lg-block">
                        <ul class="list list--column">
                            <li class="list--column__item">
                                <div class="header-top__info">
                                    <span class="header-top__icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <span class="header-top__text t-short-para"> <?php echo e(__($contact->data_values->address)); ?></span>
                                </div>
                            </li>
                            <li class="list--column__item">
                                <div class="header-top__info">
                                    <span class="header-top__icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </span>
                                    <span class="header-top__text t-short-para"> <?php echo e(__($contact->data_values->mobile)); ?></span>
                                </div>
                            </li>
                            <li class="list--column__item">
                                <div class="header-top__info">
                                    <span class="header-top__icon">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                    <span class="header-top__text t-short-para"> <?php echo e(__($contact->data_values->email)); ?></span>
                                </div>
                            </li>
                            <li class="list--column__item">
                                <ul class="list list--row-sm align-items-center">
                                    <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e($social->data_values->url); ?>" target="_blank" class="social-icon">
                                                <?php
                                                    echo $social->data_values->icon;
                                                ?>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if($sections->secs != null): ?>
        <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make($activeTemplate . 'sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <!-- Map Section End -->
    <div class="map-section">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-12">
                    <iframe class="map" src="https://maps.google.com/maps?q=<?php echo e($contact->data_values->latitude); ?>,<?php echo e($contact->data_values->longitude); ?>&hl=es&z=14&amp;output=embed"></iframe>
                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/contact.blade.php ENDPATH**/ ?>