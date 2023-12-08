<?php $__env->startSection('panel'); ?>
    <?php
    $info = json_decode(json_encode(getIpInfo()), true);
    ?>
    <form action="<?php echo e(route('agent.send.money.insert')); ?>" method="post">
        <div class="row justify-content-center mt-5">
            <?php echo csrf_field(); ?>
            <div class="col-xl-8 mb-xl-0 mb-3">
                <div class="border--card">
                    <h4 class="title"><i class="lab la-telegram-plane"></i> <?php echo e(__($pageTitle)); ?></h4>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="sending-country"><?php echo app('translator')->get('Sending From'); ?></label>
                                <div class="input-group input--group agent-selector sending-parent">
                                    <select name="sending_country" id="sending-country" class="country-picker form--control sending-countries">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($sendingCountry == $country->id): echo 'selected'; endif; ?>
                                                    value="<?php echo e($country->id); ?>"
                                                    data-id="<?php echo e($country->id); ?>"
                                                    data-rate="<?php echo e($country->rate); ?>"
                                                    data-dial_code="<?php echo e($country->dial_code); ?>"
                                                    data-currency="<?php echo e($country->currency); ?>"
                                                    data-image="<?php echo e(asset(getFilePath('country') . '/' . $country->image)); ?>"
                                                    data-name="<?php echo e($country->name); ?>">
                                                <?php echo e($country->currency); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input id="from" type="number" step="any" class="form--control sending-amount text-right" placeholder="0.00" name="sending_amount" required>

                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-country"><?php echo app('translator')->get('Send To'); ?></label>
                                <div class="input-group input--group agent-selector recipient-parent">
                                    <select name="recipient_country" id="recipient-country" class="country-picker input-group-text form--control recipient-countries">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($recipientCountry == $country->id): echo 'selected'; endif; ?>
                                                    value="<?php echo e($country->id); ?>"
                                                    data-id="<?php echo e($country->id); ?>"
                                                    data-currency="<?php echo e($country->currency); ?>"
                                                    data-rate="<?php echo e($country->rate); ?>"
                                                    data-dial_code="<?php echo e($country->dial_code); ?>"
                                                    data-fixed_charge="<?php echo e($country->fixed_charge); ?>"
                                                    data-percent_charge="<?php echo e($country->percent_charge); ?>"
                                                    data-image="<?php echo e(asset(getFilePath('country') . '/' . $country->image)); ?>"
                                                    data-name="<?php echo e($country->name); ?>">
                                                <?php echo e($country->currency); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input id="to" type="number" step="any" class="form--control recipient-amount text-right" placeholder="0.00" name="recipient_amount" required>


                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="text--info text-center">
                                    1
                                    <span class="sending-currency"></span> =
                                    <span class="conversion-rate"></span>
                                    <span class="recipient-currency"></span>
                                </h5>
                            </div>

                            <div class="form-group error-section text-center">
                                <small class="text-danger fw-bold error-text"></small>
                            </div>
                            <div class="col-12">
                                <div class="recipient-info row">
                                    <div class="border-line-area mt-2">
                                        <h6 class="border-line-title fw-bold"><?php echo app('translator')->get('Recipient\'s Information'); ?></h6>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        
                                        
                                        <div class="form-group">
                                            <label for="sender_name"><?php echo app('translator')->get('Sender Name'); ?></label>
                                            <input id="sender_name" type="text" class="form--control" value="<?php echo e(old('sender')['name'] ?? null); ?>" name="sender[name]" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="sender_mobile"><?php echo app('translator')->get('Sender Mobile No.'); ?></label>
                                            <div class="input-group input--group">
                                                <span class="input-group-text sender-dial-code">

                                                </span>
                                                <input id="sender_mobile" type="number" class="form--control" value="<?php echo e(old('sender')['mobile'] ?? null); ?>" name="sender[mobile]" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="sender_address"><?php echo app('translator')->get('Sender Address'); ?></label>
                                            <textarea name="sender[address]" id="sender_address" class="form--control"><?php echo e(old('sender')['address'] ?? null); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient_name"><?php echo app('translator')->get('Recipient Name'); ?></label>
                                            <input id="recipient_name" type="text" class="form--control" value="<?php echo e(old('recipient')['name'] ?? null); ?>" name="recipient[name]" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient_mobile"><?php echo app('translator')->get('Recipient Mobile No.'); ?></label>
                                            <div class="input-group input--group">
                                                <span class="input-group-text recipient-dial-code">

                                                </span>
                                                <input id="recipient_mobile" type="number" class="form--control" value="<?php echo e(old('recipient')['mobile'] ?? null); ?>" name="recipient[mobile]" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient_address"><?php echo app('translator')->get('Recipient Address'); ?></label>
                                            <textarea name="recipient[address]" id="recipient_address" class="form--control"><?php echo e(old('recipient')['address'] ?? null); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="border--card h-auto">
                    <h4 class="title"><i class="lar la-file-alt"></i> <?php echo app('translator')->get('Summery'); ?></h4>

                    <div class="add-money-details-bottom d-none crypto_currency text-center">
                        <span><?php echo app('translator')->get('Conversion with'); ?> <span class="method_currency"></span> <?php echo app('translator')->get('and final value will Show on next step'); ?></span>
                    </div>
                    <div class="add-money-card-middle">
                        <ul class="add-money-details-list">
                            <li>
                                <div class="caption">
                                    <?php echo app('translator')->get('Sending Amount'); ?>
                                </div>
                                <div class="value">
                                    <span class="sending-amount"></span>
                                    <span class="sending-currency"></span>
                                </div>
                            </li>
                            <li>
                                <div class="caption">
                                    <span><?php echo app('translator')->get('Total Charge'); ?></span>
                                </div>
                                <div class="value">
                                    <span class="charge-amount">0</span>
                                    <span class="sending-currency"></span>
                                </div>
                            </li>
                            <li>
                                <div class="caption">
                                    <span><?php echo app('translator')->get('Final Amount'); ?></span>
                                </div>
                                <div class="value">
                                    <span class="final-amount"></span>
                                    <span class="sending-currency"></span>
                                </div>
                            </li>
                            <li>
                                <div class="caption">
                                    <span><?php echo app('translator')->get('Payable in'); ?> <?php echo e(__($general->cur_text)); ?></span>
                                </div>
                                <div class="value">
                                    <span class="base-amount"></span>
                                    <span><?php echo e(__($general->cur_text)); ?></span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="border-line-area mt-4">
                        <h6 class="border-line-title fw-bold"><?php echo app('translator')->get('Acknowledgement'); ?></h6>
                    </div>
                    <div class="form-group">
                        <label for="source_of_funds"><?php echo app('translator')->get('Source of Funds'); ?></label>
                        <select class="form--control" name="source_of_funds" id="source_of_funds" required>
                            <option value=""><?php echo app('translator')->get('Select one'); ?></option>
                            <?php $__currentLoopData = $sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($source->id); ?>"><?php echo e(__($source->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sending_purpose"><?php echo app('translator')->get('Sending Purpose'); ?></label>
                        <select class="form--control" name="sending_purpose" id="sending_purpose" required>
                            <option value=""><?php echo app('translator')->get('Select one'); ?></option>
                            <?php $__currentLoopData = $purposes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purpose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($purpose->id); ?>"><?php echo e(__($purpose->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-md btn--base w-100 trx-submit-button mt-3"><?php echo app('translator')->get('Proceed'); ?></button>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            let sender = $('.sending-parent').find('select');
            let receiver = $('.recipient-parent').find('select');

            let sendingAmount = 0;
            let recipientAmount = 0;

            var sendingCountry = sender.find(":selected");
            var recipientCountry = receiver.find(":selected");
            let displayError = false;
            let senderInput = false;
            let recipientInput = false;

            let conversionRate = 0;
            let charge = 0;
            var finalAmount = 0;
            var baseCurrencyAmount = 0;

            resetValues();
            seDialCode();

            function seDialCode() {
                $('.sender-dial-code').text('+' + sender.find(':selected').data('dial_code'))
                $('.recipient-dial-code').text('+' + receiver.find(':selected').data('dial_code'))
            }

            displayError = true;

            sender.on('change', function() {
                seDialCode();
                sendingCountry = $(this).find(":selected");
                resetValues();
            });

            receiver.on('change', function() {
                seDialCode();
                recipientCountry = $(this).find(":selected");
                resetValues();
            });

            $(".sending-amount").on('input', function() {
                sendingAmount = $(this).val();
                recipientAmount = 0;
                senderInput = true;
                recipientInput = false;
                resetValues();
            });

            $(".recipient-amount").on('input', function() {
                recipientAmount = $(this).val();
                sendingAmount = 0;
                senderInput = false;
                recipientInput = true;
                resetValues();
            });

            function getCharge() {
                var fixedCharge = recipientCountry.data('fixed_charge');
                var percentCharge = recipientCountry.data('percent_charge');

                var sendingRate = sendingCountry.data('rate');
                var recipientRate = recipientCountry.data('rate');
                conversionRate = recipientRate / sendingRate;


                if (sendingAmount) {
                    recipientAmount = (conversionRate * sendingAmount).toFixed(2);
                } else if (recipientAmount) {
                    sendingAmount = (recipientAmount / conversionRate).toFixed(2);
                } else {
                    sendingAmount = 0;
                    recipientAmount = 0;
                    return 0
                }
                return (((fixedCharge * 1) + ((recipientAmount * percentCharge) / 100)) * (sendingRate / recipientRate)).toFixed(2);
            }

            function resetValues() {
                charge = getCharge() * 1;
                finalAmount = charge + parseFloat(sendingAmount);
                baseCurrencyAmount = finalAmount / sendingCountry.data('rate');
                updateDom();

                if (!sendingAmount && !recipientAmount) {
                    $('.sending-amount').val('');
                    $('.recipient-amount').val('');

                    if (displayError) {
                        showError();
                    }

                    sendingAmount = 0;
                }
            }

            function updateDom() {
                $('.error-section').addClass('d-none');
                $('.sending-currency').text(sendingCountry.data('currency'));
                $('.recipient-currency').text(recipientCountry.data('currency'));

                if (recipientInput) {
                    $('.sending-amount').val(sendingAmount ? sendingAmount : null);
                } else if (senderInput) {
                    $('.recipient-amount').val(recipientAmount ? recipientAmount : null);
                }
                $('.conversion-rate').text(conversionRate.toFixed(4));
                $('.charge-amount').text(charge);
                $('.final-amount').text(finalAmount.toFixed(2));
                $('.base-amount').text(baseCurrencyAmount.toFixed(2));

            }

            function showError() {
                $('.error-text').text('Please Enter an amount');
                $('.error-section').removeClass('d-none');
            }

            disableSelectedCountry();

            $('.sending-currency').text(sender.find(":selected").data('currency'));
            $('.recipient-currency').text(receiver.find(":selected").data('currency'));

            function disableSelectedCountry() {
                sender.find(':disabled').removeAttr('disabled')
                receiver.find(':disabled').removeAttr('disabled')
                let selectedSenderID = sender.find(':selected').data('id');
                let selectedReceiverID = receiver.find(':selected').data('id');
                sender.find(`[data-id=${selectedReceiverID}]`).attr('disabled', 'disabled');
                receiver.find(`[data-id=${selectedSenderID}]`).attr('disabled', 'disabled');
            }

            // Change Flags on load
            function formatState(state) {
                if (!state.id) return state.text;
                return $('<img src="' + $(state.element).data('image') + '"/> <span>' + state.text + '</span>');
            }

            $('.country-picker').select2({
                templateResult: formatState
            });

            $('.country-picker').on('change', function() {
                disableSelectedCountry();
                changeSelectedCountryFlag();
            });

            // Change Flags on load
            changeSelectedCountryFlag();

            function changeSelectedCountryFlag() {
                $('.sending-parent .select2-selection__rendered').html(flagImageHtml(sender.find(':selected')));
                $('.recipient-parent .select2-selection__rendered').html(flagImageHtml(receiver.find(':selected')));
            }

            function flagImageHtml(data) {
                return `<img class="state-flags" src="${data.data('image')}" class="state-flags"/> ${data.text()}`
            }

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .select2-container--default .select2-results__option[aria-disabled=true] {
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/agent/send/send_money.blade.php ENDPATH**/ ?>