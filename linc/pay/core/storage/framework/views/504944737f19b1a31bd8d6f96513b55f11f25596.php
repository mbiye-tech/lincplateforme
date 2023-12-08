<?php
$appContent = getContent('app.content', true);
$appElement = getContent('app.element', false, null, true);
?>
<!-- App Section  -->
<div class="section--top">
    <div class="container">
        <div class="row gy-5 g-lg-4 align-items-center justify-content-center">
            <div class="col-lg-6 col-md-5 col-sm-10">
                <img src="<?php echo e(getImage('assets/images/frontend/app/' . @$appContent->data_values->image, '630x635')); ?>" alt="<?php echo e(__($general->site_name)); ?>" class="img-fluid">
            </div>
            <div class="col-lg-6 col-md-7">
                <div class="ms-xxl-5">
                    <h3 class="mt-0">
                        <?php echo e(__($appContent->data_values->heading)); ?>

                    </h3>
                    <p class="section__para">
                        <?php echo e(__($appContent->data_values->short_description)); ?>

                    </p>
                    <ul class="list list--column list--base">
                        <?php $__currentLoopData = $appElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list--column__item">
                                <?php echo e(__($app->data_values->key_feature_item)); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <div class="hero__btn-group flex-lg-wrap gap-sm-4 mt-4 flex-nowrap gap-3">
                        <a target="_blank" href="<?php echo e($appContent->data_values->play_store_url); ?>" class="t-link d-inline-block">
                            <img src="<?php echo e(getImage('assets/images/frontend/app/' . @$appContent->data_values->play_store_icon, '200x60')); ?>" alt="remitance" class="img-fluid">
                        </a>

                        <a target="_blank" href="<?php echo e($appContent->data_values->app_store_url); ?>" class="t-link d-inline-block">
                            <img src="<?php echo e(getImage('assets/images/frontend/app/' . @$appContent->data_values->app_store_icon, '200x60')); ?>" alt="remitance" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- App Section End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/sections/app.blade.php ENDPATH**/ ?>