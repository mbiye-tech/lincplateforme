<?php $__env->startSection('panel'); ?>
    <div class="custom--card mt-5">
        <div class="card-body">
            <div class="row align-items-center flex-wrap mb-3">
                <div class="col-12 col-md-8">
                    <h6 class="mb-3 mb-md-0"><?php echo app('translator')->get($pageTitle); ?></h6>
                </div>
                <div class="col-12 col-md-4">
                    <div class="text-end">
                        <form action="" method="GET">
                            <div class="search--box">
                                <input type="text" name="search" class="form--control" value="<?php echo e(request()->search); ?>" placeholder="<?php echo app('translator')->get('Transaction ID'); ?>" autocomplete="off">
                                <button type="submit" class="search-box-btn">
                                    <i class="las la-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive--md">
                <table class="table custom--table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Transaction ID'); ?></th>
                            <th><?php echo app('translator')->get('Recipient'); ?></th>
                            <th><?php echo app('translator')->get('Mobile'); ?></th>
                            <th><?php echo app('translator')->get('Country'); ?></th>
                            <th><?php echo app('translator')->get('Payout Amount'); ?></th>
                            <th><?php echo app('translator')->get('Payout Date'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('Transaction ID'); ?>"><?php echo e($transfer->trx); ?></td>

                                <td data-label="<?php echo app('translator')->get('Recipient'); ?>">
                                    <?php echo e($transfer->recipient->name); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Mobile'); ?>">
                                    +<?php echo e(@$transfer->recipient->dial_code . $transfer->recipient->mobile); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Mobile'); ?>">
                                    <?php echo e($transfer->recipient_country); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Payout Amount'); ?>">
                                    <?php echo e(showAmount($transfer->recipient_amount)); ?> <?php echo e(__($transfer->recipient_currency)); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Payout date'); ?>">
                                    <?php if($transfer->received_at): ?>
                                        <span title="<?php echo e(diffForHumans($transfer->received_at)); ?>"> <?php echo e(showDateTime($transfer->received_at)); ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="100%" class="text-center"><?php echo e(__($emptyMessage)); ?></td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
            <?php if($transfers->hasPages()): ?>
                <div class="d-flex justify-content-end">
                    <?php echo e(paginateLinks($transfers)); ?>


                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/agent/payout/history.blade.php ENDPATH**/ ?>