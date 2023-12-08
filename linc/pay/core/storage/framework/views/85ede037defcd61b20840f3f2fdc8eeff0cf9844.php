<?php $__env->startSection('panel'); ?>
    <div class="mt-5">
        <?php $kycInstruction = getContent('kyc_instruction_user.content', true); ?>
        <!-- kyc start -->
        <div class="mb-30">
            <?php if(authAgent()->kv == 0): ?>
                <div class="alert alert-info p-4" role="alert">
                    <h4 class="alert-heading"><?php echo app('translator')->get('KYC Verification Required'); ?></h4>
                    <hr>
                    <p class="mb-0"> <?php echo e(__($kycInstruction->data_values->verification_instruction)); ?> <a href="<?php echo e(route('agent.kyc.form')); ?>"><?php echo app('translator')->get('Click Here to Verify'); ?></a></p>
                </div>
            <?php elseif(authAgent()->kv == 2): ?>
                <div class="alert alert-warning p-4" role="alert">
                    <h4 class="alert-heading"><?php echo app('translator')->get('KYC Verification pending'); ?></h4>
                    <hr>
                    <p class="mb-0"> <?php echo e(__($kycInstruction->data_values->pending_instruction)); ?> <a href="<?php echo e(route('agent.kyc.data')); ?>"><?php echo app('translator')->get('See KYC Data'); ?></a></p>
                </div>
            <?php endif; ?>
        </div>
        <!-- kyc end -->
        <!-- widget start -->
        <div class="row gy-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="d-widget curve--shape">
                    <div class="d-widget__content">
                        <i class="las la-wallet"></i> <?php echo app('translator')->get('USD Balance'); ?>
                        <h2 class="d-widget__amount fw-normal"><?php echo e(showAmount($widget['balance'])); ?> <?php echo e($general->cur_text); ?></h2>
                    </div>

                </div><!-- d-widget end -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-widget curve--shape">
                    <div class="d-widget__content">
                        <i class="las la-store"></i> <?php echo app('translator')->get('Pending Deposits'); ?>
                        <h2 class="d-widget__amount fw-normal"><?php echo e($widget['pending_deposit']); ?></h2>
                    </div>

                </div><!-- d-widget end -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-widget curve--shape">
                    <div class="d-widget__content">
                        <i class="las la-hand-holding-usd"></i> <?php echo app('translator')->get('Pending Withdrawals'); ?>
                        <h2 class="d-widget__amount fw-normal"><?php echo e($widget['pending_withdraw']); ?></h2>
                    </div>

                </div><!-- d-widget end -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-widget curve--shape">
                    <div class="d-widget__content">
                        <i class="la la-exchange-alt"></i> <?php echo app('translator')->get('Total Transactions'); ?>
                        <h2 class="d-widget__amount fw-normal"><?php echo e($widget['total_transaction']); ?></h2>
                    </div>

                </div><!-- d-widget end -->
            </div>
        </div><!-- widget end -->
        <!-- chart start -->
        <div class="row gy-4 mb-3">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d">
                            <h5 class="card-title"><?php echo app('translator')->get('Monthly  Transaction Report'); ?></h5>
                        </div>
                        <div id="apex-line"> </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row align-items-center mb-3">
                    <div class="col-6">
                        <h6 class="fw-normal"><?php echo app('translator')->get('Insights'); ?></h6>
                    </div>
                    <div class="col-6 text-end">
                        <div class="dropdown custom--dropdown has--arrow">
                            <button class="text-btn dropdown-toggle font-size--14px text--base" type="button" id="latestActivitiesButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo e(__($insights['duration'])); ?>

                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="latestActivitiesButton">
                                <li><a class="dropdown-item money" href="<?php echo e(route('agent.dashboard')); ?>"><?php echo app('translator')->get('Today'); ?></a></li>
                                <li><a class="dropdown-item money" href="<?php echo e(route('agent.dashboard', 'last-week')); ?>"><?php echo app('translator')->get('Last week'); ?></a></li>
                                <li><a class="dropdown-item money" href="<?php echo e(route('agent.dashboard', 'last-15-days')); ?>"><?php echo app('translator')->get('Last 15 days'); ?></a></li>
                                <li><a class="dropdown-item money" href="<?php echo e(route('agent.dashboard', 'last-month')); ?>"><?php echo app('translator')->get('Last month'); ?></a></li>
                                <li><a class="dropdown-item money" href="<?php echo e(route('agent.dashboard', 'last-year')); ?>"><?php echo app('translator')->get('Last year'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- row end -->
                <div class="row mb-4">
                    <div class="col-sm-6 mb-3">
                        <div class="custom--card">
                            <div class="card-body">
                                <h6 class="font-size--16px mb-4"><?php echo app('translator')->get('Total Payout'); ?> <small class="text--muted last-time">( <?php echo e(__($insights['duration'])); ?> )</small></h6>
                                <h3 class="title fw-normal money-in"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($insights['payouts'])); ?></h3>
                                <span class="text-muted font-size--14px"><?php echo app('translator')->get('Total amount converted in'); ?> <?php echo e($general->cur_text); ?></span>
                                <div class="d-flex align-items-center justify-content-between mt-4 flex-wrap">
                                    <a href="<?php echo e(route('agent.payout.history')); ?>" class="font-size--14px fw-bold"><?php echo app('translator')->get('View Payouts'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="custom--card">
                            <div class="card-body">
                                <h6 class="font-size--16px mb-4"><?php echo app('translator')->get('Total Sent Money'); ?> <small class="text--muted last-time">( <?php echo e(__($insights['duration'])); ?> )</small> </h6>
                                <h3 class="title fw-normal money-out"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($insights['sent_amounts'])); ?></h3>
                                <span class="text-muted font-size--14px"><?php echo app('translator')->get('Total amount converted in'); ?> <?php echo e($general->cur_text); ?></span>
                                <div class="d-flex align-items-center justify-content-between mt-4 flex-wrap">
                                    <a href="<?php echo e(route('agent.transfer.history')); ?>" class="font-size--14px fw-bold"><?php echo app('translator')->get('View Send Moneys'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="my-2"><?php echo app('translator')->get('Deposits & Withdrawn'); ?></p>
                    <div class="col-sm-6">
                        <div class="custom--card">
                            <div class="card-body">
                                <h6 class="font-size--16px mb-4"><?php echo app('translator')->get('Total Deposits'); ?> <small class="text--muted last-time">( <?php echo e(__($insights['duration'])); ?> )</small> </h6>
                                <h3 class="title fw-normal"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($insights['deposits'])); ?></h3>

                                <div class="d-flex align-items-center justify-content-between mt-4 flex-wrap">

                                    <a href="<?php echo e(route('agent.deposit.history')); ?>" class="font-size--14px fw-bold"><?php echo app('translator')->get('View Deposits'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="custom--card">
                            <div class="card-body">
                                <h6 class="font-size--16px mb-4"><?php echo app('translator')->get('Total Withdrawn'); ?> <small class="text--muted last-time">( <?php echo e(__($insights['duration'])); ?> )</small> </h6>
                                <h3 class="title fw-normal"><?php echo e($general->cur_sym); ?><?php echo e(showAmount($insights['withdraws'])); ?></h3>

                                <div class="d-flex align-items-center justify-content-between mt-4 flex-wrap">

                                    <a href="<?php echo e(route('agent.withdraw.history')); ?>" class="font-size--14px fw-bold"><?php echo app('translator')->get('View Withdrawals'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- chart end -->
        <?php if($transactions): ?>
            <!-- transaction table start -->

            <div class="accordion table--acordion" id="transactionAccordion">

                <h6 class="p-3"><?php echo app('translator')->get('Latest Transactions'); ?></h6>

                <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="accordion-item transaction-item <?php echo e($transaction->trx_type == '-' ? 'sent-item' : 'rcv-item'); ?>">
                        <h2 class="accordion-header" id="h-<?php echo e($loop->iteration); ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-<?php echo e($loop->iteration); ?>" aria-expanded="false" aria-controls="c-1">
                                <div class="col-lg-3 col-sm-4 col-6 icon-wrapper order-1">
                                    <div class="left">
                                        <div class="icon">
                                            <i class="las la-long-arrow-alt-right"></i>
                                        </div>
                                        <div class="content">
                                            <h6 class="trans-title"><?php echo e(__(ucwords($transaction->remark))); ?></h6>
                                            <span class="text-muted font-size--14px mt-2"><?php echo e(showDateTime($transaction->created_at, 'M d Y @g:ia')); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-5 col-12 order-sm-2 content-wrapper mt-sm-0 order-3 mt-3">
                                    <p class="text-muted font-size--14px"><b><?php echo e(__($transaction->details)); ?></b></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-6 order-sm-3 text-end amount-wrapper order-2">
                                    <p><b><?php echo e(showAmount($transaction->amount)); ?> <?php echo e($general->cur_text); ?></b></p>
                                </div>
                            </button>
                        </h2>
                        <div id="c-<?php echo e($loop->iteration); ?>" class="accordion-collapse collapse" aria-labelledby="h-1" data-bs-parent="#transactionAccordion">
                            <div class="accordion-body">
                                <ul class="caption-list">
                                    <li>
                                        <span class="caption"><?php echo app('translator')->get('Transaction ID'); ?></span>
                                        <span class="value"><?php echo e($transaction->trx); ?></span>
                                    </li>
                                    <li>
                                        <span class="caption"><?php echo app('translator')->get('Transacted Amount'); ?></span>
                                        <span class="value"> <?php echo e($transaction->trx_type); ?> <?php echo e(showAmount($transaction->amount)); ?> <?php echo e($general->cur_text); ?></span>
                                    </li>
                                    <li>
                                        <span class="caption"><?php echo app('translator')->get('Remaining Balance'); ?></span>
                                        <span class="value"><?php echo e(showAmount($transaction->post_balance)); ?> <?php echo e($general->cur_text); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- transaction-item end -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="accordion-body text-center">
                        <h4 class="text--muted"><?php echo app('translator')->get('No transaction found'); ?></h4>
                    </div>
                <?php endif; ?>
            </div>
            <!-- transaction table end -->
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('/assets/global/js/apexcharts.min.js')); ?>"></script>
    <script>
        'use strict';
        (function($) {
            $('.reason').on('click', function() {
                $('#reasonModal').find('.reason').text($(this).data('reasons'))
                $('#reasonModal').modal('show')
            });
        })(jQuery);



        var options = {
            chart: {
                height: 376,
                type: "area",
                toolbar: {
                    show: false
                },
                dropShadow: {
                    enabled: true,
                    enabledSeries: [0],
                    top: -2,
                    left: 0,
                    blur: 10,
                    opacity: 0.08
                },
                animations: {
                    enabled: true,
                    easing: 'linear',
                    dynamicAnimation: {
                        speed: 1000
                    }
                },
            },
            dataLabels: {
                enabled: false
            },
            colors: ["#2E93fA"],
            series: [{
                name: "Charges",
                data: <?php echo json_encode($report['trx_amount'], 15, 512) ?>
            }],

            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "<?php echo e(__($general->cur_sym)); ?>" + val + " "
                    }
                }
            },
            xaxis: {
                categories: <?php echo json_encode($report['trx_dates'], 15, 512) ?>
            },
            grid: {
                padding: {
                    left: 5,
                    right: 5
                },
                xaxis: {

                    lines: {
                        show: true
                    }
                },
                yaxis: {
                    lines: {
                        show: true
                    }
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#apex-line"), options);
        chart.render()
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/agent/dashboard.blade.php ENDPATH**/ ?>