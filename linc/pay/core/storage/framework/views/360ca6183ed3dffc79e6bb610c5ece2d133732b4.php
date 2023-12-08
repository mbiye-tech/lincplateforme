<?php $__env->startSection('content'); ?>
    <div class="section">
        <div class="container-fluid container-restricted">
            <div class="row gy-5 g-lg-4">
                <div class="col-lg-8 col-xxl-9">
                    <div class="blog-post px-md-3">
                        <div class="blog-post__img blog-post__img-xl">
                            <img src="<?php echo e(getImage('assets/images/frontend/blog/' . @$blog->data_values->image, '1245x840')); ?>" alt="<?php echo e(__($general->site_name)); ?>" class="blog-post__img-is" />
                        </div>

                        <div class="blog-post__body">
                            <h4 class="mt-0">
                                <?php echo e(__($blog->data_values->title)); ?>

                            </h4>

                            <p class="contact-section__content-text mt-4">
                                <?php echo $blog->data_values->description; ?>
                            </p>

                            <div class="row g-4">
                                <div class="col-12">
                                    <ul class="list list--row-sm align-items-center">
                                        <li class="list--row__item">
                                            <span class="d-block xl-text fw-md heading-clr">
                                                <?php echo app('translator')->get('Share'); ?>
                                            </span>
                                        </li>
                                        <li class="list--row__item">
                                            <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>"
                                               class="t-link t-link--accent icon icon--xs icon--circle bg--base text--white">
                                                <i class="lab la-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list--row__item">
                                            <a href="https://twitter.com/intent/tweet?text=my share text&amp;url=<?php echo e(urlencode(url()->current())); ?>"
                                               class="t-link t-link--accent icon icon--xs icon--circle bg--base text--white">
                                                <i class="lab la-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list--row__item">
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo e(urlencode(url()->current())); ?>"
                                               class="t-link t-link--accent icon icon--xs icon--circle bg--base text--white">
                                                <i class="lab la-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li class="list--row__item">
                                            <a href="https://www.instagram.com/?url=<?php echo e(urlencode(url()->current())); ?>"
                                               class="t-link t-link--accent icon icon--xs icon--circle bg--base text--white">
                                                <i class="lab la-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="fb-comments" data-href="<?php echo e(url()->current()); ?>" data-width="" data-numposts="5"></div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xxl-3">
                    <aside class="sidebar">
                        <ul class="list list--column">
                            <li class="list--column__item">
                                <div class="widget">
                                    <h5 class="widget__title widget-title mb-4"><?php echo app('translator')->get('Recent Posts'); ?></h5>
                                    <ul class="list list--column widget-category">
                                        <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list--column__item widget-category__item">
                                                <div class="d-flex pb-3">
                                                    <div class="me-3 flex-shrink-0">
                                                        <div class="recent-img user__img user__img--md">
                                                            <img src="<?php echo e(getImage('assets/images/frontend/blog/thumb_' . @$blog->data_values->image, '415x280')); ?>" alt="<?php echo e(__($general->site_name)); ?>" class="user__img-is" />
                                                        </div>
                                                    </div>
                                                    <div class="article">
                                                        <h6 class="blog-post__title fw-md mt-0 mb-2">
                                                            <a href="<?php echo e(route('blog.details', [slug($blog->data_values->title), $blog->id])); ?>"
                                                               class="t-link d-block text--accent t-link--base"> <?php echo e(__($blog->data_values->title)); ?>

                                                            </a>
                                                        </h6>
                                                        <ul class="list list--row align-items-center">
                                                            <li class="list--row__item">
                                                                <p class="sm-text t-heading-font text--accent mb-0">
                                                                    <?php echo e($blog->created_at->diffForHumans()); ?>

                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('fbComment'); ?>
    <?php echo loadExtension('fb-comment') ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/blog_details.blade.php ENDPATH**/ ?>