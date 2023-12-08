<?php $__env->startSection('panel'); ?>
    <div class="row justify-content-center mt-5">
        <div class="col-xxl-5 col-xl-7 col-md-8 col-sm-10">
            <div class="border--card">
                <h4 class="title"><i class="las la-key"></i> <?php echo e(__($pageTitle)); ?></h4>
                <div class="card-body p-0">
                    <form action="<?php echo e(route('agent.withdraw.money')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Method'); ?></label>
                            <select class="form--control form--control" name="method_code" required>
                                <option value=""><?php echo app('translator')->get('Select Gateway'); ?></option>
                                <?php $__currentLoopData = $withdrawMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>" data-resource="<?php echo e($data); ?>"> <?php echo e(__($data->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="d-block sm-text mb-2"><?php echo app('translator')->get('Amount'); ?></label>
                            <div class="input-group">
                                <input type="text" name="amount" value="<?php echo e(old('amount')); ?>" class="form--control form--control" required>
                                <span class="input-group-text"><?php echo e($general->cur_text); ?></span>
                            </div>
                        </div>
                        <div class="preview-details d-none mb-3">
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item d-flex justify-content-between bg-transparent px-0">
                                    <span><?php echo app('translator')->get('Limit'); ?></span>
                                    <span><span class="min fw-bold">0</span> <?php echo e(__($general->cur_text)); ?> - <span class="max fw-bold">0</span> <?php echo e(__($general->cur_text)); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between bg-transparent px-0">
                                    <span><?php echo app('translator')->get('Charge'); ?></span>
                                    <span><span class="charge fw-bold">0</span> <?php echo e(__($general->cur_text)); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between bg-transparent px-0">
                                    <span><?php echo app('translator')->get('Receivable'); ?></span> <span><span class="receivable fw-bold"> 0</span> <?php echo e(__($general->cur_text)); ?> </span>
                                </li>
                                <li class="list-group-item d-none justify-content-between rate-element bg-transparent px-0">

                                </li>
                                <li class="list-group-item d-none justify-content-between in-site-cur bg-transparent px-0">
                                    <span><?php echo app('translator')->get('In'); ?> <span class="base-currency"></span></span>
                                    <strong class="final_amo">0</strong>
                                </li>
                            </ul>
                        </div>
                        <button type="submit" class="btn btn--base btn-md w-100"><?php echo app('translator')->get('Submit'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script >
        (function($) {
            "use strict";
            $('select[name=method_code]').change(function() {
                if (!$('select[name=method_code]').val()) {
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                var resource = $('select[name=method_code] option:selected').data('resource');
                var fixed_charge = parseFloat(resource.fixed_charge);
                var percent_charge = parseFloat(resource.percent_charge);
                var rate = parseFloat(resource.rate)
                var toFixedDigit = 2;

                $('.min').text(parseFloat(resource.min_limit).toFixed(2));
                $('.max').text(parseFloat(resource.max_limit).toFixed(2));

                var amount = parseFloat($('input[name=amount]').val());

                if (!amount) {
                    amount = 0;
                }

                if (amount <= 0) {
                    $('.preview-details').addClass('d-none');
                    return false;
                }

                $('.preview-details').removeClass('d-none');

                var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);

                $('.charge').text(charge);

                if (resource.currency != '<?php echo e($general->cur_text); ?>') {
                    var rateElement = `<span><?php echo app('translator')->get('Conversion Rate'); ?></span> <span class="fw-bold">1 <?php echo e(__($general->cur_text)); ?> = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span>`;
                    $('.rate-element').html(rateElement);
                    $('.rate-element').removeClass('d-none');
                    $('.in-site-cur').removeClass('d-none');
                    $('.rate-element').addClass('d-flex');
                    $('.in-site-cur').addClass('d-flex');
                } else {
                    $('.rate-element').html('')
                    $('.rate-element').addClass('d-none');
                    $('.in-site-cur').addClass('d-none');
                    $('.rate-element').removeClass('d-flex');
                    $('.in-site-cur').removeClass('d-flex');
                }

                var receivable = parseFloat((parseFloat(amount) - parseFloat(charge))).toFixed(2);
                $('.receivable').text(receivable);
                var final_amo = parseFloat(parseFloat(receivable) * rate).toFixed(toFixedDigit);
                $('.final_amo').text(final_amo);
                $('.base-currency').text(resource.currency);
                $('.method_currency').text(resource.currency);
                $('input[name=amount]').on('input');
            });
            $('input[name=amount]').on('input', function() {
                var data = $('select[name=method_code]').change();
                $('.amount').text(parseFloat($(this).val()).toFixed(2));
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/agent/withdraw/methods.blade.php ENDPATH**/ ?>