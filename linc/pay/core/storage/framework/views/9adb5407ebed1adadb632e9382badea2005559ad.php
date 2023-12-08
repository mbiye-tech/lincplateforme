<?php $__env->startSection('panel'); ?>
    <?php
    $deposit = [];
    ?>
    <div class="row gy-4">
        <div class="col-xl-4 col-md-6">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body">
                    <h5 class="mb-3"><?php echo app('translator')->get('Receivable amount: '); ?> <span
                            class="text--danger"><?php echo e(showAmount($sendMoney->recipient_amount)); ?>

                            <?php echo e(__($sendMoney->recipient_currency)); ?></span></h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Initiated'); ?>
                            <span class="fw-bold"><?php echo e($sendMoney->created_at->diffForHumans()); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Transaction Number'); ?>
                            <span class="fw-bold"><?php echo e(@$sendMoney->trx); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Created By'); ?>
                            <span class="fw-bold">
                                <?php if($sendMoney->user_id): ?>
                                    <a
                                        href="<?php echo e(route('admin.users.detail', $sendMoney->user_id)); ?>"><span>@</span><?php echo e(@$sendMoney->user->username); ?></a>
                                <?php else: ?>
                                    <a
                                        href="<?php echo e(route('admin.agents.detail', $sendMoney->agent_id)); ?>"><span>@</span><?php echo e(@$sendMoney->agent->username); ?></a>
                                <?php endif; ?>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Sending Amount'); ?>
                            <span class="fw-bold"><?php echo e(showAmount($sendMoney->sending_amount)); ?>

                                <?php echo e($sendMoney->sending_currency); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Source of fund'); ?>
                            <span class="fw-bold"> <?php echo e(@$sendMoney->source_of_fund); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Sending Purpose'); ?>
                            <span class="fw-bold"> <?php echo e(@$sendMoney->sending_purpose); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo app('translator')->get('Status'); ?>
                            <span class="fw-bold" title="Updated at <?php echo e(diffForHumans($sendMoney->updated_at)); ?>">
                                <?php
                                    echo $sendMoney->statusText;
                                ?>
                            </span>
                        </li>
                        <?php if($sendMoney->payout_by): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo app('translator')->get('Payout By'); ?>
                                <span class="fw-bold">
                                    <a href="<?php echo e(route('admin.agents.detail', $sendMoney->payout_by)); ?>"><span>@</span><?php echo e(@$sendMoney->payoutBy->username); ?></a>
                                </span>
                            </li>
                        <?php endif; ?>
                        <?php if(@$sendMoney->admin_feedback): ?>
                            <li class="list-group-item">
                                <strong><?php echo app('translator')->get('Admin Response'); ?></strong>
                                <br>
                                <p><?php echo e(__(@$sendMoney->admin_feedback)); ?></p>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <?php if(@$sendMoney->status == 1): ?>
                        <button class="btn mt-2 h-45 w-100 btn--base btn-outline--danger ml-1 refundButton"
                            data-action="<?php echo e(route('admin.send.money.refund.now', $sendMoney->id)); ?>"><i
                                class="fas fa-hand-holding-usd"></i>
                            <?php echo app('translator')->get('Refund'); ?>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-md-6">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-2"><?php echo app('translator')->get('Recipient Information'); ?></h5>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo app('translator')->get('Sender'); ?>
                                    <span class="fw-bold"><?php echo e(@$sendMoney->senderInfo->name); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo app('translator')->get('Sender Mobile'); ?>
                                    <span class="fw-bold">+<?php echo e(@$sendMoney->senderInfo->mobile); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo app('translator')->get('Sender Address'); ?>
                                    <span class="fw-bold"><?php echo e(@$sendMoney->senderInfo->address); ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo app('translator')->get('Recipient'); ?>
                                    <span class="fw-bold"><?php echo e($sendMoney->recipient->name); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo app('translator')->get('Recipient Mobile'); ?>
                                    <span class="fw-bold">+<?php echo e(@$sendMoney->recipient->dial_code . $sendMoney->recipient->mobile); ?>

                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo app('translator')->get('Recipient Address'); ?>
                                    <span class="fw-bold"><?php echo e($sendMoney->recipient->address); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <div id="rejectModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Confirmation Alert'); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to refund this send money?'); ?></p>

                        <div class="form-group">
                            <label class="fw-bold mt-2"><?php echo app('translator')->get('Reason for Rejection'); ?></label>
                            <textarea name="message" id="message" placeholder="<?php echo app('translator')->get('Reason for Rejection'); ?>" class="form-control"
                                rows="5"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-bs-dismiss="modal"><?php echo app('translator')->get('No'); ?></button>
                        <button type="submit" class="btn btn--primary"><?php echo app('translator')->get('Yes'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('.refundButton').on('click', function() {
                var modal = $('#rejectModal');
                modal.find('form').attr('action', $(this).data('action'));
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/admin/send_money/detail.blade.php ENDPATH**/ ?>