<?php $__env->startSection('content'); ?>
    <div class="section section--sm">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-lg-3 flex-row-reverse flex-wrap">
                <div class="text-end">
                    <a href="<?php echo e(route('user.send.money.now')); ?>" class="btn btn-sm btn--base mb-2"> <i class="fa fa-plus"></i> <?php echo app('translator')->get('Send New'); ?></a>
                </div>
                <div class="custom--table__header">
                    <h5 class="text-lg-start m-0 text-center"><?php echo e(__($pageTitle)); ?></h5>
                </div>
            </div>
            <div class="table-responsive--md">
                <table class="custom--table table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Trx ID'); ?></th>
                            <th><?php echo app('translator')->get('Sent Amount'); ?> </th>
                            <th><?php echo app('translator')->get('Recipient'); ?></th>
                            <th><?php echo app('translator')->get('Receivable'); ?></th>
                            <th><?php echo app('translator')->get('Send | Received'); ?></th>
                            <th><?php echo app('translator')->get('Status'); ?></th>
                            <th><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('Trx'); ?>"><?php echo e($transfer->trx); ?></td>
                                <td data-label="<?php echo app('translator')->get('Sent Amount'); ?>">
                                    <strong><?php echo e(showAmount($transfer->sending_amount)); ?> <?php echo e(__($transfer->sending_currency)); ?></strong>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Recipient'); ?>">
                                    <?php echo e($transfer->recipient->name); ?>

                                    <br>
                                    <?php echo e(__($transfer->recipient_country)); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Receivable'); ?>">
                                    <?php echo e(showAmount($transfer->recipient_amount)); ?> <?php echo e(__($transfer->recipient_currency)); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Send | Received'); ?>">
                                    <?php echo e(showDateTime($transfer->created_at, 'd M, y h:i a')); ?>

                                    <br />
                                    <?php echo e($transfer->received_at ? showDateTime($transfer->received_at, 'd M, y h:i a') : 'N/A'); ?>

                                </td>
                                <td data-label="Status">
                                    <?php if($transfer->status == 1): ?>
                                        <span class="badge badge--primary"><?php echo app('translator')->get('Sent'); ?></span>
                                    <?php elseif($transfer->status == 2): ?>
                                        <span class="badge badge--success"><?php echo app('translator')->get('Received'); ?></span>
                                    <?php elseif($transfer->status == 3): ?>
                                        <span class="badge badge--danger"><?php echo app('translator')->get('Refunded'); ?></span>
                                    <?php elseif($transfer->status == 4): ?>
                                        <span class="badge badge--info"><?php echo app('translator')->get('Payment Pending'); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge--warning"><?php echo app('translator')->get('Initiated'); ?></span>
                                    <?php endif; ?>

                                    <?php if($transfer->admin_feedback != null): ?>
                                        <button class="btn-info btn-rounded badge feedbackBtn" data-admin_feedback="<?php echo e($transfer->admin_feedback); ?>"><i class="fa fa-info"></i></button>
                                    <?php endif; ?>
                                </td>
                                <?php
                                    $details = $transfer->detail != null ? json_encode($transfer->detail) : null;
                                ?>

                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <button class="btn btn--base btn-sm detailBtn" data-info="<?php echo e($details); ?>" data-id="<?php echo e(encrypt($transfer->id)); ?>" data-name="<?php echo e($transfer->recipient->name); ?>" data-mobile="<?php echo e($transfer->recipient->mobile); ?>" data-address="<?php echo e($transfer->recipient->address); ?>" data-country="<?php echo e($transfer->recipient_country); ?>" data-trx="<?php echo e($transfer->trx); ?>" data-status="<?php echo e($transfer->status); ?>">
                                        <i class="fa fa-desktop"></i>
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
            <div class="d-flex justify-content-end mt-3">
                <?php if($transfers->hasPages()): ?>
                    <?php echo e(paginateLinks($transfers)); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div id="detailsModal" class="modal custom--modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Details'); ?></h5>
                    <button type="button" class="close btn btn--danger btn-sm close-button" data-bs-dismiss="modal" aria-label="Close">
                        <i class="la la-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><?php echo app('translator')->get('Recipient Name'); ?> : <span class="name fw-bold"></span></li>
                        <li class="list-group-item d-flex justify-content-between"><?php echo app('translator')->get('Recipient Number'); ?> : <span class="mobile fw-bold"></span></li>
                        <li class="list-group-item d-flex justify-content-between"><?php echo app('translator')->get('Recipient Address'); ?> : <span class="address fw-bold"></span></li>
                        <li class="list-group-item d-flex justify-content-between"><?php echo app('translator')->get('Recipient Country'); ?> : <span class="country fw-bold"></span></li>
                        <li class="list-group-item d-flex justify-content-between"><?php echo app('translator')->get('Transaction No'); ?> : <span class="trx fw-bold"></span></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <form action="<?php echo e(route('user.send.money.pay')); ?>" method="POST" class="w-100">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id">
                        <button class="btn btn--base w-100 btn--xl">
                            <?php echo app('translator')->get('Pay Now'); ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div id="feedbackModal" class="modal custom--modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Feedback'); ?></h5>
                    <button type="button" class="close btn btn--danger btn-sm close-button" data-bs-dismiss="modal" aria-label="Close">
                        <i class="la la-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <span class="admin_feedback"></span>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('.detailBtn').on('click', function() {
                var modal = $('#detailsModal');
                modal.find('.name').text($(this).data('name'));
                modal.find('.mobile').text($(this).data('mobile'));
                modal.find('.country').text($(this).data('country'));
                modal.find('.address').text($(this).data('address'));
                modal.find('.trx').text($(this).data('trx'));
                if ($(this).data('status') == 0) {
                    modal.find('.modal-footer form [name=id]').val($(this).data('id'));
                    modal.find('.modal-footer form :submit').removeAttr('disabled');
                    modal.find('.modal-footer').show();
                } else {
                    modal.find('.modal-footer form [name=id]').val('');
                    modal.find('.modal-footer').hide();
                }
                modal.modal('show');
            });
            $('.feedbackBtn').on('click', function() {
                var modal = $('#feedbackModal');
                modal.find('.admin_feedback').text($(this).data('admin_feedback'));
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/user/send_money/history.blade.php ENDPATH**/ ?>