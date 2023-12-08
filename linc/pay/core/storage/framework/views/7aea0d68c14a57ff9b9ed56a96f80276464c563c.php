<?php $__env->startSection('content'); ?>
    <div class="section section--sm">

        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-12">
                    <div class="show-filter text-end mb-3">
                        <button type="button" class="btn btn--base showFilterBtn btn-sm"><i class="las la-filter"></i> <?php echo app('translator')->get('Filter'); ?></button>
                    </div>
                    <div class="card custom--card responsive-filter-card mb-4">
                        <div class="card-body">
                            <form action="">
                                <div class="d-flex flex-wrap gap-4">
                                    <div class="flex-grow-1">
                                        <label><?php echo app('translator')->get('Transaction Number'); ?></label>
                                        <input type="text" name="search" value="<?php echo e(request()->search); ?>" class="form-control form--control">
                                    </div>
                                    <div class="flex-grow-1">
                                        <label><?php echo app('translator')->get('Type'); ?></label>
                                        <div class="form--select-light">
                                            <select name="type" class="form-select form--select">
                                                <option value=""><?php echo app('translator')->get('All'); ?></option>
                                                <option value="+" <?php if(request()->type == '+'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Plus'); ?></option>
                                                <option value="-" <?php if(request()->type == '-'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Minus'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <label><?php echo app('translator')->get('Remark'); ?></label>
                                        <div class="form--select-light">
                                            <select class="form-select form--select" name="remark">
                                                <option value=""><?php echo app('translator')->get('Any'); ?></option>
                                                <?php $__currentLoopData = $remarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($remark->remark); ?>" <?php if(request()->remark == $remark->remark): echo 'selected'; endif; ?>><?php echo e(__(keyToTitle($remark->remark))); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 align-self-end">
                                        <button class="btn btn--xl btn--base w-100"><i class="las la-filter"></i> <?php echo app('translator')->get('Filter'); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive--md">
                        <table class="custom--table table">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Trx Number'); ?></th>
                                    <th><?php echo app('translator')->get('Amount'); ?></th>
                                    <th><?php echo app('translator')->get('Charge'); ?></th>
                                    <th><?php echo app('translator')->get('Post Balance'); ?></th>
                                    <th><?php echo app('translator')->get('Details'); ?></th>
                                    <th><?php echo app('translator')->get('Time'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('Trx Number'); ?>"><?php echo e($transaction->trx); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                            <?php if($transaction->trx_type == '+'): ?>
                                                <div class="badge badge--success">
                                                    +<?php echo e(showAmount($transaction->amount)); ?> <?php echo e(__($general->cur_text)); ?>

                                                </div>
                                            <?php else: ?>
                                                <div class="badge badge--danger">
                                                    -<?php echo e(showAmount($transaction->amount)); ?> <?php echo e(__($general->cur_text)); ?>

                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Charge'); ?>">
                                            <?php echo e(showAmount($transaction->charge)); ?> <?php echo e(__($general->cur_text)); ?>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Post Balance'); ?>">
                                            <?php echo e(showAmount($transaction->post_balance)); ?> <?php echo e(__($general->cur_text)); ?>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Details'); ?>">
                                            <?php echo e($transaction->details); ?>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Time'); ?>">
                                            <?php echo e(showDateTime($transaction->created_at)); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="100%" class="text-muted text-center"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php if($transactions->hasPages()): ?>
                <div class="mt-3">
                    <?php echo e(paginateLinks($transactions)); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/user/transactions.blade.php ENDPATH**/ ?>