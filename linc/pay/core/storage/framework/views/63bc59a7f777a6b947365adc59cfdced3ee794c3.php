<?php
$brands = getContent('brand.element', false, null, true);
?>

<!-- Client Slider  -->
<div class="section--sm section--bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="client-slider">
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="client-slider__item">
                            <div class="client-card">
                                <img src=<?php echo e(getImage('assets/images/frontend/brand/' . @$brand->data_values->image, '130x50')); ?> alt="<?php echo e(__($general->site_name)); ?>" class="client-card__img">
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Client Slider End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/sections/brand.blade.php ENDPATH**/ ?>