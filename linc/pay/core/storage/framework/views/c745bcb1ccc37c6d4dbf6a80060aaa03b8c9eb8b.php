<?php $__env->startSection('content'); ?>
    <div class="section section--sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="<?php echo e(route('user.deposit.insert')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="method_code">
                        <input type="hidden" name="currency">
                        <input type="hidden" name="amount" value="<?php echo e($sendMoney->base_currency_amount + $sendMoney->base_currency_charge); ?>">
                        <div class="card custom--card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <?php echo e(__($pageTitle)); ?>

                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="d-block sm-text mb-2 required "><?php echo app('translator')->get('Select Gateway'); ?></label>
                                    <div class="form--select-light">
                                        <select class="form-select form--select" name="gateway" required>
                                            <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                                            <?php $__currentLoopData = $gatewayCurrency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($data->method_code); ?>" <?php if(old('gateway') == $data->method_code): echo 'selected'; endif; ?> data-gateway="<?php echo e($data); ?>"><?php echo e($data->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-3 preview-details d-nonee">
                                    <ul class="list-group list-group-flush text-center">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="fw-bold"><?php echo app('translator')->get('Final payment amount'); ?></span>
                                            <span class="fw-bold"><?php echo e(showAmount($sendMoney->sending_amount + $sendMoney->sending_charge)); ?>

                                                <?php echo e($sendMoney->sending_currency); ?></span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="fw-bold"><?php echo app('translator')->get('Payment in'); ?> <?php echo e(__($general->cur_text)); ?></span>
                                            <span class="fw-bold"><?php echo e(showAmount($sendMoney->base_currency_amount + $sendMoney->base_currency_charge)); ?>

                                                <?php echo e(__($general->cur_text)); ?></span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex d-none charge-data justify-content-between">
                                            <span class="fw-bold"><?php echo app('translator')->get('Charge'); ?></span>
                                            <span class=" fw-bold"><span class="charge">0</span> <?php echo e(__($general->cur_text)); ?></span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex d-none payable-data justify-content-between">
                                            <span class="fw-bold"><?php echo app('translator')->get('Payable'); ?></span> <span class="fw-bold"><span class="payable ">
                                                    0</span>
                                                <?php echo e(__($general->cur_text)); ?></span>
                                        </li>
                                        <li class="list-group-item px-0 d-flex d-none limit-data justify-content-between">
                                            <span class="fw-bold"><?php echo app('translator')->get('Limit'); ?></span>
                                            <span class="fw-bold"><span class="min">0</span> <?php echo e(__($general->cur_text)); ?> - <span class="max ">0</span> <?php echo e(__($general->cur_text)); ?></span>
                                        </li>
                                        <li class="list-group-item px-0 justify-content-between d-none rate-element">

                                        </li>
                                        <li class="list-group-item px-0 justify-content-between d-none in-site-cur">
                                            <span class="fw-bold"><?php echo app('translator')->get('In'); ?> <span class="base-currency"></span></span>
                                            <span class="final_amo fw-bold">0</span>
                                        </li>
                                        <li class="list-group-item px-0 justify-content-center crypto_currency d-none">
                                            <span><?php echo app('translator')->get('Conversion with'); ?> <span class="method_currency"></span> <?php echo app('translator')->get('and final value will Show on next
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    step'); ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <button type="submit" class="btn btn--base w-100  btn--xl mt-3"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('select[name=gateway]').change(function() {
                var gatewayValue = $('select[name=gateway]').val();
                if (!gatewayValue) {
                    $('.limit-data').addClass('d-none');
                    $('.charge-data').addClass('d-none');
                    $('.payable-data').addClass('d-none');
                    return false;
                } else {
                    $('.limit-data').removeClass('d-none');
                    $('.charge-data').removeClass('d-none');
                    $('.payable-data').removeClass('d-none');

                }

                var resource = $('select[name=gateway] option:selected').data('gateway');
                let minLimit = parseFloat(resource.min_amount).toFixed(2);
                let maxLimit = parseFloat(resource.max_amount).toFixed(2);
                var amount = parseFloat($('input[name=amount]').val());

                if (amount > maxLimit || amount < minLimit) {
                    $('form :submit').attr('disabled', 'true');
                    notify('error', 'This gateway doesn\'t follow payment limit')
                } else {
                    $('form :submit').removeAttr('disabled');
                }

                var fixed_charge = parseFloat(resource.fixed_charge);
                var percent_charge = parseFloat(resource.percent_charge);
                var rate = parseFloat(resource.rate)
                if (resource.method.crypto == 1) {
                    var toFixedDigit = 8;
                    $('.crypto_currency').removeClass('d-none');
                } else {
                    var toFixedDigit = 2;
                    $('.crypto_currency').addClass('d-none');
                }
                $('.min').text(minLimit);
                $('.max').text(maxLimit);



                if (!amount) {
                    amount = 0;
                }
                var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                $('.charge').text(charge);
                var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
                $('.payable').text(payable);
                var final_amo = (parseFloat((parseFloat(amount) + parseFloat(charge))) * rate).toFixed(toFixedDigit);
                $('.final_amo').text(final_amo);

                if (resource.currency != '<?php echo e($general->cur_text); ?>') {
                    var rateElement =
                        `<span class="fw-bold"><?php echo app('translator')->get('Conversion Rate'); ?></span> <span><span  class="fw-bold">1 <?php echo e(__($general->cur_text)); ?> = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span></span>`;
                    $('.rate-element').html(rateElement)
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


                $('.base-currency').text(resource.currency);
                $('.method_currency').text(resource.currency);
                $('input[name=currency]').val(resource.currency);
                $('input[name=method_code]').val(resource.method_code);
                $('input[name=amount]').on('input');
            });
            $('input[name=amount]').on('input', function() {
                $('select[name=gateway]').change();
                $('.amount').text(parseFloat($(this).val()).toFixed(2));
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/user/payment/payment.blade.php ENDPATH**/ ?>