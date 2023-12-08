<?php
$aboutContent = getContent('about.content', true);
$aboutElement = getContent('about.element', false, null, true);
?>
<!-- about  -->
<div class="section">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6 col-xl-7">
                <div class="me-xxl-4">
                    <img src="<?php echo e(getImage('assets/images/frontend/about/' . @$aboutContent->data_values->image, '720x460')); ?>" alt="<?php echo e(__($general->site_name)); ?>" class="img-fluid">
                </div>
            </div>

            <div class="col-lg-6 col-xl-5">
                <h3 class="mt-0"><?php echo e(__($aboutContent->data_values->heading)); ?></h3>
                <p class="section__para">
                    <?php echo e(__($aboutContent->data_values->description)); ?>

                </p>
                <hr/>
                <div class="row g-4">
                    <h5 class="mt-4"><?php echo e(__("WHAT WE VALUE")); ?></h5>
                    <p style="margin-top:0" class="section__para">
                        <?php echo e(__("From our earliest beginnings, we have put technology to work connecting people. As technology has advanced, so have we—but always with our focus on connecting people with the places and loved ones that matter most to them, in good times and bad.")); ?>

                    </p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12" style="margin-top: 70px;text-align:center">
                        <hr/>
                    <?php $__currentLoopData = $aboutElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <?php echo __($item->data_values->feature_item); ?>

                        </div>
                        <hr/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- about End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/sections/about.blade.php ENDPATH**/ ?>