<?php
$counters = getContent('counter.element', false, null, true);
?>
<!-- Counter Section  -->
<div class="section--sm counter-section bg--light-2">
    <div class="container">
        <div class="row gy-4 gy-sm-5 g-xl-4 align-items-center justify-content-center">
            <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-xl-3">
                    <div class="counter-up">
                        <span class="counter-up__icon">
                            <?php
                                echo $counter->data_values->icon;
                            ?>
                        </span>
                        <div class="counter-up__content">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="counter-up__counter">
                                    <span class="odometer" data-odometer-final="<?php echo e($counter->data_values->digit); ?>">0</span>
                                </span>
                                <h5 class="text--base my-0">+</h5>
                            </div>
                            <h6 class="counter-up__title mb-0 text-white"><?php echo e(__($counter->data_values->title)); ?></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- Counter Section End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/sections/counter.blade.php ENDPATH**/ ?>