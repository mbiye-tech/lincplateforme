<?php $__env->startSection('content'); ?>
    <?php
    $kycInstruction = getContent('kyc_instruction_user.content', true);
    ?>
    
 
          <a class="btn btn-md-btn--md btn--base fixed-with" href="<?php echo e(route('user.send.money.now')); ?>">
                                    <?php echo app('translator')->get('Send Money'); ?>
            </a>
            
    <div class="section section--sm">
        <?php if(auth()->user()->kv != 1): ?>
            <div class="section__head">
                <div class="container">
                    <div class="row">
                        <?php if(auth()->user()->kv == 0): ?>
                            <div class="col-12">
                                <div class="alert alert-info mb-0" role="alert">
                                    <h5 class="alert-heading m-0"><?php echo app('translator')->get('KYC Verification Required'); ?></h5>
                                    <hr>
                                    <p class="mb-0"> <?php echo e(__($kycInstruction->data_values->verification_instruction)); ?> <a href="<?php echo e(route('user.kyc.form')); ?>"><?php echo app('translator')->get('Click Here to Verify'); ?></a></p>
                                </div>
                            </div>
                        <?php elseif(auth()->user()->kv == 2): ?>
                            <div class="col-12">
                                <div class="alert alert-warning mb-0" role="alert">
                                    <h5 class="alert-heading m-0"><?php echo app('translator')->get('KYC Verification pending'); ?></h5>
                                    <hr>
                                    <p class="mb-0"> <?php echo e(__($kycInstruction->data_values->pending_instruction)); ?> <a href="<?php echo e(route('user.kyc.data')); ?>"><?php echo app('translator')->get('See KYC Data'); ?></a></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="section__head">
            <div class="container">
                <div class="row g-4 justify-content-center">

                    <div class="col-md-6 col-xl-4">
                        <div class="dashboard-card">
                            <div class="user align-items-center justify-content-center">
                                <div class="icon icon--lg icon--circle">
                                    <i class="fas fa-wallet"></i>
                                </div>
                                <div class="user__content">
                                    <p class="xl-text mb-0">
                                        <a href="<?php echo e(route('user.send.money.history')); ?>" class="t-link text--body"><?php echo app('translator')->get('Balance'); ?></a>
                                    </p>
                                    <h4 class="mt-2 mb-0">
                                        <a href="<?php echo e(route('user.send.money.history')); ?>" class="t-link text--body">
                                            <?php echo e($general->cur_sym); ?><?php echo e(showAmount($widget['balance'])); ?>

                                        </a>
                                    </h4>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="dashboard-card">
                            <div class="user align-items-center justify-content-center">
                                <div class="icon icon--lg icon--circle">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="user__content">
                                    <p class="xl-text text--white mb-0">
                                        <a href="<?php echo e(route('user.send.money.history')); ?>" class="t-link t-link--light text--white">
                                            <?php echo app('translator')->get('Sent Amount'); ?>
                                        </a>
                                    </p>
                                    <h4 class="text--white mt-2 mb-0">
                                        <a href="<?php echo e(route('user.send.money.history')); ?>" class="t-link t-link--light text--white">
                                            <?php echo e($general->cur_sym); ?><?php echo e(showAmount($widget['send_money_amount'])); ?>

                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="dashboard-card">
                            <div class="user align-items-center justify-content-center">
                                <div class="icon icon--lg icon--circle">
                                    <i class="fas fa-coins"></i>
                                </div>
                                <div class="user__content">
                                    <p class="xl-text text--white mb-0">
                                        <a href="<?php echo e(route('user.send.money.history')); ?>" class="t-link t-link--light text--white">
                                            <?php echo app('translator')->get('Unpaid'); ?>
                                        </a>
                                    </p>
                                    <h4 class="text--white mt-2 mb-0">
                                        <a href="<?php echo e(route('user.send.money.history')); ?>" class="t-link t-link--light text--white">
                                            <?php echo e($general->cur_sym); ?><?php echo e(showAmount($widget['unPaid'])); ?>

                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-lg-3">
                <div class="col-12">
                    <div class="custom--table__header">
                        <h5 class="text-lg-start m-0 text-center"><?php echo app('translator')->get('Recent Send Money Log'); ?></h5>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table-responsive--md">
                        <table class="custom--table table">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Time'); ?></th>
                                    <th><?php echo app('translator')->get('Trx Number'); ?></th>
                                    <th><?php echo app('translator')->get('Sent Amount'); ?></th>
                                    <th><?php echo app('translator')->get('Recipient'); ?></th>
                                    <th><?php echo app('translator')->get('Receivable Amount'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $sendMoneys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sendMoney): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('Time'); ?>"> <?php echo e(showDateTime($sendMoney->created_at)); ?> </td>
                                        <td data-label="<?php echo app('translator')->get('Trx Number'); ?>"> <?php echo e($sendMoney->trx); ?> </td>
                                        <td data-label="<?php echo app('translator')->get('Sent Amount'); ?>"><strong><?php echo e(showAmount($sendMoney->sending_amount)); ?> <?php echo e(__($sendMoney->sending_currency)); ?></strong></td>
                                        <td data-label="<?php echo app('translator')->get('Recipient'); ?>"><?php echo e($sendMoney->recipient->name); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Receivable Amount'); ?>"><?php echo e(showAmount($sendMoney->recipient_amount)); ?> <?php echo e(__($sendMoney->recipient_currency)); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                            <?php if($sendMoney->status == 1): ?>
                                                <span class="badge badge--primary"><?php echo app('translator')->get('Sent'); ?></span>
                                            <?php elseif($sendMoney->status == 2): ?>
                                                <span class="badge badge--success"><?php echo app('translator')->get('Received'); ?></span>
                                            <?php elseif($sendMoney->status == 3): ?>
                                                <span class="badge badge--danger"><?php echo app('translator')->get('Refunded'); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge--warning"><?php echo app('translator')->get('Initiated'); ?></span>
                                            <?php endif; ?>

                                            <?php if($sendMoney->admin_feedback != null): ?>
                                                <button class="btn-info btn-rounded badge feedbackBtn" data-admin_feedback="<?php echo e($sendMoney->admin_feedback); ?>"><i class="fa fa-info"></i></button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="100%" class="text-muted text-center"><?php echo e(__($emptyMessage)); ?> </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
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
            $('.feedbackBtn').on('click', function() {
                var modal = $('#feedbackModal');
                modal.find('.admin_feedback').text($(this).data('admin_feedback'));
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600&display=swap" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .dashboard-card .user__content h4 {
            font-family: "rajdhani", sans-serif;
            font-weight: 500;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/user/dashboard.blade.php ENDPATH**/ ?>