<?php
$content = getContent('feature.content', true);
$features = getContent('feature.element', false, null, true);
?>
<!-- Feature Section  -->
<div class="section features-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mt-0 mb-4 text-center">
                    <?php echo e(@$content->data_values->heading); ?>

                </h3>
            </div>
        </div>
        <div class="row g-4 g-md-3 justify-content-center">




            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="features-card flex-column flex-xl-row justify-content-center text-xl-start align-items-xl-center text-center">
                        <div class="icon icon--circle icon--xl bg--base text--white mx-auto flex-shrink-0">
                            <?php
                                echo $feature->data_values->icon;
                            ?>
                        </div>
                        <div class="features-card__content">
                            <h5 class="mt-0 mb-2">
                                <?php echo e(__($feature->data_values->title)); ?>

                            </h5>
                            <p class="mb-0">
                                <?php echo e(__($feature->data_values->description)); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/sections/feature.blade.php ENDPATH**/ ?>