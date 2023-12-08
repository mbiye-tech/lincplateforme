<?php
$faqContent = getContent('faq.content', true);
$faqs = getContent('faq.element', false, null, true);
?>
<!-- FAQ Section  -->
<div class="section faq-section">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="ms-xl-5 text-center">
                    <img src="<?php echo e(getImage('assets/images/frontend/faq/' . @$faqContent->data_values->image, '630x460')); ?>" alt="<?php echo e(__($general->site_name)); ?>" class="img-fluid" />
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <h3 class="mt-0 mb-4"> <?php echo e(__($faqContent->data_values->heading)); ?> </h3>
                <div class="accordion custom--accordion" id="accordionExample">
                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item">
                            <span class="accordion-header" id="faq<?php echo e($faq->id); ?>">
                                <button
                                    class="accordion-button"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo e($faq->id); ?>"
                                    aria-expanded="false"
                                    aria-controls="collapse<?php echo e($faq->id); ?>">
                                    <?php echo e(__($faq->data_values->question)); ?>

                                </button>
                            </span>
                            <div
                                id="collapse<?php echo e($faq->id); ?>"
                                class="accordion-collapse collapse  "
                                aria-labelledby="faq<?php echo e($faq->id); ?>"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php
                                        echo $faq->data_values->answer;
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQ Section End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/sections/faq.blade.php ENDPATH**/ ?>