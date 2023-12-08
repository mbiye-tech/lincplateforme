<?php $__env->startSection('panel'); ?>
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <div class="card custom--card border-0">
                <div class="card-header bg--dark border text-white">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h6 class="text-white"><?php echo e(__($pageTitle)); ?></h6>
                        </div>
                        <div class="col-4 text-end">
                            <button class="trans-search-open-btn bg-transparent text-white"><i class="las la-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <form class="transaction-top-form d-none my-3 px-3" action="" method="GET">
                        <div class="custom-select-search-box">
                            <input type="text" name="trx" class="form--control" value="<?php echo e(request()->trx); ?>" placeholder="<?php echo app('translator')->get('Transaction ID'); ?>" required>
                            <button type="submit" class="search-box-btn">
                                <i class="las la-search"></i>
                            </button>
                        </div>
                    </form><!-- transaction-top-form end -->
                    <div class="row gy-3 gx-3 transaction-top-select p-3">
                        <div class="col-md-4">
                            <div class="custom-select-box-two">
                                <label><?php echo app('translator')->get('Transaction type'); ?></label>
                                <select onChange="window.location.href=this.value">
                                    <option value="<?php echo e(appendQuery('type', '')); ?>" <?php if(request()->type == ''): echo 'selected'; endif; ?>><?php echo app('translator')->get('All Type'); ?></option>
                                    <option value="<?php echo e(appendQuery('type', 'plus_trx')); ?>" <?php if(request()->type == 'plus_trx'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Plus Transactions'); ?></option>
                                    <option value="<?php echo e(appendQuery('type', 'minus_trx')); ?>" <?php if(request()->type == 'minus_trx'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Minus Transactions'); ?></option>
                                </select>
                            </div><!-- custom-select-box-two end -->
                        </div>

                        <div class="col-md-4">
                            <div class="custom-select-box-two">
                                <label><?php echo app('translator')->get('Remarks'); ?></label>
                                <select onChange="window.location.href=this.value">
                                    <option value="<?php echo e(appendQuery('remark', '')); ?>" <?php if(request()->remark == ''): echo 'selected'; endif; ?>><?php echo app('translator')->get('Any'); ?></option>
                                    <?php $__currentLoopData = $remarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(appendQuery('remark', $remark->remark)); ?>" <?php if(request()->remark == $remark->remark): echo 'selected'; endif; ?>><?php echo e(__(keyToTitle($remark->remark))); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div><!-- custom-select-box-two end -->
                        </div>

                        <div class="col-md-4">
                            <div class="custom-select-box-two">
                                <label><?php echo app('translator')->get('History From'); ?></label>
                                <select onChange="window.location.href=this.value">
                                    <option value="<?php echo e(appendQuery('duration', '')); ?>" <?php if(request()->duration == ''): echo 'selected'; endif; ?>><?php echo app('translator')->get('All Time'); ?></option>
                                    <option value="<?php echo e(appendQuery('duration', 'last-24-hours')); ?>" <?php if(request()->duration == 'last-24-hours'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Last 24 hours'); ?></option>
                                    <option value="<?php echo e(appendQuery('duration', 'last-week')); ?>" <?php if(request()->duration == 'last-week'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Last week'); ?></option>
                                    <option value="<?php echo e(appendQuery('duration', 'last-15-days')); ?>" <?php if(request()->duration == 'last-15-days'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Last 15 days'); ?></option>
                                    <option value="<?php echo e(appendQuery('duration', 'last-month')); ?>" <?php if(request()->duration == 'last-month'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Last month'); ?></option>
                                    <option value="<?php echo e(appendQuery('duration', 'last-year')); ?>" <?php if(request()->duration == 'last-year'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Last Year'); ?></option>
                                </select>
                            </div><!-- custom-select-box-two end -->
                        </div>
                    </div>
                    <div class="accordion table--acordion" id="transactionAccordion">
                        <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="accordion-item transaction-item <?php echo e($transaction->trx_type == '-' ? 'sent-item' : 'rcv-item'); ?>">
                                <h2 class="accordion-header" id="h-<?php echo e($loop->iteration); ?>">
                                    <div class="accordion-button collapsed d-flex flex-wrap gap-3" type="button" data-bs-toggle="collapse" data-bs-target="#c-<?php echo e($loop->iteration); ?>" aria-expanded="false" aria-controls="c-1">

                                        <div class="icon-wrapper order-1">
                                            <div class="left">
                                                <div class="icon">
                                                    <i class="las la-long-arrow-alt-right"></i>
                                                </div>
                                                <div class="content">
                                                    <h6 class="trans-title"><?php echo e(keyToTitle($transaction->remark)); ?></h6>
                                                    <span class="text-muted font-size--14px mt-2"><?php echo e(showDateTime($transaction->created_at, 'M d Y @g:i:a')); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="content-wrapper flex-grow-1 order-3">
                                            <p class="text-muted text-start font-size--14px"><b><?php echo e(__($transaction->details)); ?> <?php echo e($transaction->receiver ? @$transaction->receiver->username : ''); ?></b></p>
                                        </div>

                                        <div class="order-sm-3 text-end amount-wrapper order-2 flex-shrink-0">
                                            <p><b> <?php echo e($general->cur_sym . showAmount($transaction->amount)); ?> </b></p>
                                        </div>
                                    </div>
                                </h2>

                                <div id="c-<?php echo e($loop->iteration); ?>" class="accordion-collapse collapse" aria-labelledby="h-1" data-bs-parent="#transactionAccordion">
                                    <div class="accordion-body">
                                        <ul class="caption-list">
                                            <li>
                                                <span class="caption"><?php echo app('translator')->get('Transaction ID'); ?></span>
                                                <span class="value"><?php echo e($transaction->trx); ?></span>
                                            </li>
                                            <li>
                                                <span class="caption"><?php echo app('translator')->get('Wallet'); ?></span>
                                                <span class="value"><?php echo e($general->cur_text); ?></span>
                                            </li>

                                            <li>
                                                <span class="caption"><?php echo app('translator')->get('Transacted Amount'); ?></span>
                                                <span class="value"><?php echo e(showAmount($transaction->amount)); ?> <?php echo e($general->cur_text); ?></span>
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
                </div>
                <?php if($transactions->hasPages()): ?>
                    <div class="card-footer d-flex justify-content-end bg-transparent">
                        <?php echo e(paginateLinks($transactions)); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        (function($) {
            $('.trans-search-open-btn').on('click', function() {
                $('.transaction-top-form,.transaction-top-select').toggleClass('d-none');
            })
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/agent/transactions.blade.php ENDPATH**/ ?>