<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom--card">
                        <div class="card-body">
                            <?php
                                echo $policy->data_values->details;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/policy.blade.php ENDPATH**/ ?>