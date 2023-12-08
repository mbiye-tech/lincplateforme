<?php
$howWorkContent = getContent('how_work.content', true);
$howWorkElement = getContent('how_work.element', false, null, true);
?>
<!-- Work Step  -->
<div class="section bg--light-2">
    <div class="section__head">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="text-center">
                        <h3 class="mt-0 mb-4">
                            <?php echo e(__($howWorkContent->data_values->heading)); ?>

                        </h3>
                        <p class="section__para mx-md-auto mb-0">
                            <?php echo e(__($howWorkContent->data_values->description)); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="work--step">
        <div class="container">
            <div class="row g-4 g-md-0">
                <?php $__currentLoopData = $howWorkElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="step-card flex-column align-items-center">
                            <div class="icon icon--circle icon--xl step-icon flex-shrink-0">
                                <?php
                                    echo $work->data_values->icon;
                                ?>
                            </div>
                            <div class="features-card__content">
                                <h5 class="mt-0 mb-2 text-center">
                                    <?php echo e(__($work->data_values->title)); ?>

                                </h5>
                                <p class="m-0 text-center">
                                    <?php echo e(__($work->data_values->description)); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</div>
<!-- Work Step End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/sections/how_work.blade.php ENDPATH**/ ?>