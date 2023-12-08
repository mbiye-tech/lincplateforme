<?php
$transferContent = getContent('transfer.content', true);
$transferElement = getContent('transfer.element', false, null, true);
?>
<!-- Transfer  -->
<div class="section">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6 col-xl-5">
                <h3 class="mt-0"><?php echo e(__($transferContent->data_values->heading)); ?></h3>
                <p class="section__para">
                    <?php echo e(__($transferContent->data_values->description)); ?>

                </p>
                <div class="row g-4">

                    <div class="col-md-6">
                        <ul class="list list--column list--base">
                            <?php $__currentLoopData = $transferElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->even): ?>
                                    <li class="list--column__item">
                                        <?php echo e(__($item->data_values->key_features)); ?>

                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list list--column list--base">
                            <?php $__currentLoopData = $transferElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->odd): ?>
                                    <li class="list--column__item">
                                        <?php echo e(__($item->data_values->key_features)); ?>

                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <a href="<?php echo e($transferContent->data_values->button_link); ?>" class="btn btn--xl btn--base mt-4"> <?php echo e(__($transferContent->data_values->button_text)); ?> </a>
            </div>
            <div class="col-lg-6 col-xl-7">
                <div class="ms-xxl-4">
                    <div class="section__img section__img--right">
                        <img src="<?php echo e(getImage('assets/images/frontend/transfer/' . @$transferContent->data_values->image, '720x460')); ?>" alt="<?php echo e(__($general->site_name)); ?>" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Transfer End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/sections/transfer.blade.php ENDPATH**/ ?>