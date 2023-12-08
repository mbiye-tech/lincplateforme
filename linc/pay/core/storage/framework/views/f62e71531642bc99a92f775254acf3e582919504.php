<?php $__env->startSection('panel'); ?>
    <form action="<?php echo e(route('agent.deposit.insert')); ?>" method="POST" id="form">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="method_code">
        <input type="hidden" name="currency">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <div class="border--card h-auto">
                    <h4 class="title"><i class="las la-plus-circle"></i> <?php echo app('translator')->get('Add Money'); ?></h4>
                    <div class="form-group">
                        <label><?php echo app('translator')->get('Select Gateway'); ?></label>
                        <select class="select form--control" name="gateway" required>
                            <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                            <?php $__currentLoopData = $gatewayCurrency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->method_code); ?>" <?php if(old('gateway') == $data->method_code): echo 'selected'; endif; ?> data-gateway="<?php echo e($data); ?>"><?php echo e($data->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <code class="text--danger gateway-msg"></code>
                    </div>
                    <div class="form-group mb-0">
                        <label><?php echo app('translator')->get('Amount'); ?></label>
                        <div class="input-group">
                            <input class="form--control amount" type="number" step="any" name="amount" autocomplete="off" placeholder="Enter Amount" value="<?php echo e(old('amount')); ?>" required>
                            <span class="input-group-text"><?php echo e(__($general->cur_text)); ?></span>
                        </div>
                        <p><code class="text--warning"><?php echo app('translator')->get('limit'); ?>: <span class="limit">0.00</span> <?php echo e(__($general->cur_text)); ?></code></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="border--card h-auto">
                    <h4 class="title"><i class="lar la-file-alt"></i> <?php echo app('translator')->get('Summery'); ?></h4>
                    <div class="add-money-card-middle">
                        <ul class="add-money-details-list">
                            <li>
                                <span class="caption"><?php echo app('translator')->get('Amount'); ?></span>
                                <div class="value"><?php echo e($general->cur_sym); ?><span class="amount">0.00</span></div>
                            </li>
                            <li>
                                <span class="caption"><?php echo app('translator')->get('Charge'); ?></span>
                                <div class="value"><?php echo e($general->cur_sym); ?><span class="charge">0.00</span> </div>
                            </li>
                            <li>
                                <span class="caption"><?php echo app('translator')->get('Payable'); ?></span>
                                <div class="value"><?php echo e($general->cur_sym); ?><span class="payable">0.00</span> </div>
                            </li>
                            <li class="d-none rate-element">

                            </li>
                            <li class="d-none in-site-cur">
                                <span class="caption"><?php echo app('translator')->get('In'); ?> <span class="base-currency"></span></span>
                                <div class="value final_amo fw-bold">0</div>
                            </li>
                        </ul>
                        <div class="add-money-details-bottom text-center d-none crypto_currency">
                            <span><?php echo app('translator')->get('Conversion with'); ?> <span class="method_currency"></span> <?php echo app('translator')->get('and final value will Show on next step'); ?></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn--base w-100 mt-3 req_confirm"><?php echo app('translator')->get('Proceed'); ?></button>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('select[name=gateway]').change(function() {
                if (!$('select[name=gateway]').val()) {
                    // set all preview 0
                    return false;
                }
                var resource = $('select[name=gateway] option:selected').data('gateway');
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
                $('.min').text(parseFloat(resource.min_amount).toFixed(2));
                $('.max').text(parseFloat(resource.max_amount).toFixed(2));

                $('.limit').text(parseFloat(resource.min_amount).toFixed(2) + ' ~ ' + parseFloat(resource.max_amount).toFixed(2));
                var amount = parseFloat($('input[name=amount]').val());
                if (!amount) {
                    amount = 0;
                }
                if (amount <= 0) {
                    //    set all preview zero
                    return false;
                }
                var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                $('.charge').text(charge);
                var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
                $('.payable').text(payable);
                var final_amo = (parseFloat((parseFloat(amount) + parseFloat(charge))) * rate).toFixed(toFixedDigit);
                $('.final_amo').text(final_amo);
                if (resource.currency != '<?php echo e($general->cur_text); ?>') {
                    var rateElement = `<span class="fw-bold caption"><?php echo app('translator')->get('Conversion Rate'); ?></span> <span class="value"><span  class="fw-bold">1 <?php echo e(__($general->cur_text)); ?> = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span></span>`;
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

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/agent/payment/deposit.blade.php ENDPATH**/ ?>