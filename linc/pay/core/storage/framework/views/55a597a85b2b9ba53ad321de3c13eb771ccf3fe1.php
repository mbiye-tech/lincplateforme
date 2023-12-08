<?php
$chooseUsContent = getContent('choose_us.content', true);
$chooseUsElement = getContent('choose_us.element', false, null, true);
?>
<!-- Why Choose Us  -->
<div class="section--bottom">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="section__img section__img--left">
                    <img src="<?php echo e(getImage('assets/images/frontend/choose_us/' . @$chooseUsContent->data_values->image, '635x455')); ?>" alt="<?php echo e(__($general->site_name)); ?>" class="img-fluid" />
                </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1">
                <div class="ms-xxl-4">
                    <h3 class="mt-0"><?php echo e(__($chooseUsContent->data_values->heading)); ?></h3>
                    <ul class="list list--column icon-list">
                        <?php $__currentLoopData = $chooseUsElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list__item icon-list__item">
                                <div class="icon-list__box">
                                    <div class="icon icon--circle icon--xl bg--base text--white flex-shrink-0">
                                        <?php
                                            echo $item->data_values->icon;
                                        ?>
                                    </div>
                                    <div class="icon-list__content">
                                        <h5 class="mt-0">
                                            <?php echo e(__($item->data_values->title)); ?>

                                        </h5>
                                        <p class="icon-list__para mb-0">
                                            <?php echo e(__($item->data_values->description)); ?>

                                        </p>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Why Choose Us End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/sections/choose_us.blade.php ENDPATH**/ ?>