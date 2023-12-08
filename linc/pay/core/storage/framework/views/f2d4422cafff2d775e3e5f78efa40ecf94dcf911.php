<?php
$contact = getContent('contact.content', true);
$app = getContent('app.content', true);
$pages = getContent('policy_pages.element', false, null, true);
?>
<!-- Footer  -->
<footer class="footer bg--accent">
    <div class="section">
        <div class="container">
            <div class="row g-4 gy-sm-5 justify-content-xl-between">
                <div class="col-sm-6 col-lg-4 col-xxl-3">
                    <h5 class="text--white widget__title mt-0">
                        <a href="/about-us" style="color:#fff; text-decoration:none">
                                <?php echo app('translator')->get('About LinC'); ?>
                            </a>
                        </h5>
                    <p class="text--white t-short-para mb-0">
                        <?php echo e(__(""/*$app->data_values->short_description*/)); ?>

                    </p>
                </div>
                <div class="col-sm-6 col-lg-2 col-xl-2">
                    <h5 class="text--white widget__title mt-0"><?php echo app('translator')->get('Accounts'); ?></h5>
                    <ul class="list list--column list--base">
                        <li class="list--column__item">
                            <a href="<?php echo e(route('user.login')); ?>"
                               class="t-link t-link--base text--white d-inline-block">
                                <?php echo app('translator')->get('Login'); ?>
                            </a>
                        </li>
                        <li class="list--column__item">
                            <a href="<?php echo e(route('user.register')); ?>"
                               class="t-link t-link--base text--white d-inline-block">
                                <?php echo app('translator')->get('Register'); ?>
                            </a>
                        </li>
                        <li class="list--column__item">
                            <a href="<?php echo e(route('agent.login')); ?>"
                               class="t-link t-link--base text--white d-inline-block">
                                <?php echo app('translator')->get('Agent Login'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 col-xl-2">
                    <h5 class="text--white widget__title mt-0"><?php echo app('translator')->get('Policy Pages'); ?></h5>
                    <ul class="list list--column list--base">
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list--column__item">
                                <a
                                   href="<?php echo e(route('policy.pages', [slug($page->data_values->title), $page->id])); ?>"
                                   class="t-link t-link--base text--white d-inline-block">
                                    <?php echo e(__($page->data_values->title)); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 col-xl-4 col-xxl-3">
                    <h5 class="text--white widget__title mt-0">
                        <?php echo app('translator')->get('Contact Us'); ?>
                    </h5>
                    <ul class="list list--column">
                        <li class="list--column__item">
                            <div class="contact-card">
                                <div class="contact-card__icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-card__content">
                                    <p class="text--white mb-0">
                                        <?php echo e(__($contact->data_values->address)); ?>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list--column__item">
                            <div class="contact-card">
                                <div class="contact-card__icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-card__content">
                                    <p class="text--white mb-0">
                                        <?php echo e(__($contact->data_values->email)); ?>

                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list--column__item">
                            <div class="contact-card">
                                <div class="contact-card__icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="contact-card__content">
                                    <p class="text--white mb-0">
                                        <?php echo e(__($contact->data_values->mobile)); ?>

                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright bg--accent-dark py-3">
        <p class="sm-text text--white mb-0 text-center"><?php echo app('translator')->get('Copyright'); ?> &copy; <?php echo e(__(date('Y'))); ?>. <?php echo app('translator')->get('All Rights Reserved'); ?></p>
    </div>
</footer>
<!-- Footer End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/partials/footer.blade.php ENDPATH**/ ?>