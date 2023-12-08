<?php $__env->startSection('panel'); ?>
    <div class="custom--card mt-5">
        <div class="card-body">
            <div class="row align-items-center mb-3 flex-wrap">
                <div class="col-12 col-md-8">
                    <h6 class="mb-md-0 mb-3"><?php echo app('translator')->get($pageTitle); ?></h6>
                </div>
                <div class="col-12 col-md-4">
                    <div class="text-end">
                        <form action="" method="GET">
                            <div class="search--box">
                                <input type="text" name="search" class="form--control" value="<?php echo e(request()->search); ?>" placeholder="<?php echo app('translator')->get('Transaction No.'); ?>" autocomplete="off">
                                <button type="submit" class="search-box-btn">
                                    <i class="las la-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive--md">
                <table class="custom--table table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Transaction No.'); ?></th>
                            <th><?php echo app('translator')->get('Sent Amount'); ?> </th>
                            <th><?php echo app('translator')->get('Recipient'); ?></th>
                            <th><?php echo app('translator')->get('Recipient Will Get'); ?></th>
                            <th><?php echo app('translator')->get('Sent Date'); ?></th>
                            <th><?php echo app('translator')->get('Payout Date'); ?></th>
                            <th><?php echo app('translator')->get('Status'); ?></th>
                            <th><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('TRANSACTION No.'); ?>"><?php echo e($transfer->trx); ?></td>
                                <td data-label="<?php echo app('translator')->get('Sent Amount'); ?>">
                                    <strong><?php echo e(showAmount($transfer->sending_amount)); ?> <?php echo e(__($transfer->sending_currency)); ?></strong>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Recipient'); ?>">
                                    <?php echo e($transfer->recipient->name); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Recipient Will Get'); ?>">
                                    <?php echo e(showAmount($transfer->recipient_amount)); ?> <?php echo e(__($transfer->recipient_currency)); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Sent date'); ?>">
                                    <span title="<?php echo e(diffForHumans($transfer->created_at)); ?>"> <?php echo e(showDateTime($transfer->created_at)); ?></span>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Payout date'); ?>">
                                    <?php if($transfer->received_at): ?>
                                        <span title="<?php echo e(diffForHumans($transfer->received_at)); ?>"> <?php echo e(showDateTime($transfer->received_at)); ?></span>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('N/A'); ?>
                                    <?php endif; ?>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                    <?php
                                        echo $transfer->statusText;
                                    ?>
                                </td>
                                <?php
                                    $details = $transfer->detail != null ? json_encode($transfer->detail) : null;
                                ?>

                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <button class="btn btn-outline--primary btn-sm approveBtn" data-info="<?php echo e($details); ?>" data-id="<?php echo e(encrypt($transfer->id)); ?>" data-name="<?php echo e($transfer->recipient->name); ?>" data-mobile="<?php echo e(@$transfer->recipient->dial_code . $transfer->recipient->mobile); ?>" data-address="<?php echo e($transfer->recipient->address); ?>" data-country="<?php echo e($transfer->recipient_country); ?>" data-trx="<?php echo e($transfer->trx); ?>" data-status="<?php echo e($transfer->status); ?>">
                                        <i class="fa fa-desktop"></i> <?php echo app('translator')->get('Details'); ?>
                                    </button>
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

    
    <div id="detailsModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Details'); ?></h5>
                    <button type="button" class="btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><?php echo app('translator')->get('Recipient Name'); ?> : <span class="name fw-bold"></span></li>
                        <li class="list-group-item d-flex justify-content-between"><?php echo app('translator')->get('Recipient Number'); ?> : <span class="mobile fw-bold"></span></li>
                        <li class="list-group-item d-flex justify-content-between"><?php echo app('translator')->get('Recipient Address'); ?> : <span class="address fw-bold"></span></li>
                        <li class="list-group-item d-flex justify-content-between"><?php echo app('translator')->get('Recipient Country'); ?> : <span class="country fw-bold"></span></li>
                        <li class="list-group-item d-flex justify-content-between"><?php echo app('translator')->get('Transaction No.'); ?> : <span class="trx fw-bold"></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('.approveBtn').on('click', function() {
                var modal = $('#detailsModal');
                modal.find('.name').text($(this).data('name'));
                modal.find('.mobile').text('+' + $(this).data('mobile'));
                modal.find('.country').text($(this).data('country'));
                modal.find('.address').text($(this).data('address'));
                modal.find('.trx').text($(this).data('trx'));
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/agent/send/transfer_history.blade.php ENDPATH**/ ?>