<?php
$transferWay = getContent('how_to_receive.content', true);
$transferElement = getContent('how_to_receive.element', false, null, true);
?>
<!-- Transfer Section  -->
<div class="section">
    <div class="section__head">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xl-6">
                    <div class="text-md-center">
                        <h3 class="text-md-center mt-0 mb-4">
                            <?php echo e(__($transferWay->data_values->heading)); ?>

                        </h3>
                        <p class="text-md-center section__para mx-md-auto mb-0">
                            <?php echo e(__($transferWay->data_values->description)); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row g-4 justify-content-center">
            <?php $__currentLoopData = $transferElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="features-card flex-column align-items-center bg--light-2">
                        <div class="icon icon--circle icon--xl bg--base text--white flex-shrink-0">
                            <?php
                                echo $element->data_values->icon;
                            ?>
                        </div>
                        <div class="features-card__content">
                            <h5 class="mt-0 mb-2 text-center">
                                <?php echo e(__($element->data_values->title)); ?>

                            </h5>
                            <p class="m-0 text-center">
                                <?php echo e(__($element->data_values->description)); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- Transfer Section End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/sections/how_to_receive.blade.php ENDPATH**/ ?>