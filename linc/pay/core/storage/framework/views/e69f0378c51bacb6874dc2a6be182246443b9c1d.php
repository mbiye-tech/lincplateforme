<?php $__env->startSection('content'); ?>
    <div class="section">
        <div class="container">
            <div class="row g-4 g-lg-3 g-xxl-4 justify-content-center">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-post">
                            <div class="blog-post__img">
                                <img src="<?php echo e(getImage('assets/images/frontend/blog/thumb_' . @$blog->data_values->image, '415x280')); ?>" alt="<?php echo e(__($general->site_name)); ?>" class="blog-post__img-is">
                                <a href="<?php echo e(route('blog.details', [slug($blog->data_values->title), $blog->id])); ?>" class="t-link blog-post__img-link">
                                    <span class="d-inline-block">
                                        <i class="las la-plus"></i>
                                    </span>
                                </a>
                            </div>

                            <div class="blog-post__body">
                                <ul class="list list--row">
                                    <li class="list--row__item">
                                        <div class="blog-post__meta">
                                            <span class="t-link t-link--base blog-post__meta-text">
                                                <?php echo e($blog->created_at->diffForHumans()); ?>

                                            </span>
                                        </div>
                                    </li>
                                </ul>

                                <h5 class="mt-3">
                                    <a href="<?php echo e(route('blog.details', [slug($blog->data_values->title), $blog->id])); ?>" class="t-link blog-post__link">
                                        <?php echo e(__($blog->data_values->title)); ?>

                                    </a>
                                </h5>
                                <p>
                                    <?php
                                        echo strLimit(strip_tags($blog->data_values->description), 120);
                                    ?>
                                </p>
                                <a href="<?php echo e(route('blog.details', [slug($blog->data_values->title), $blog->id])); ?>" class="t-link blog-post__btn">
                                    <?php echo app('translator')->get('Read More'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php if($blogs->hasPages()): ?>
                <div class="d-flex justify-content-center mt-5">
                    <?php echo e(paginateLinks($blogs)); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if($sections->secs != null): ?>
        <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make($activeTemplate . 'sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/blog.blade.php ENDPATH**/ ?>