<?php $__env->startSection('panel'); ?>
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-4">
            <div class="d-widget curve--shape">
                <div class="d-widget__content">
                    <i class="las la-check-circle"></i> <?php echo app('translator')->get('Approved Withdrawals'); ?>
                    <h2 class="d-widget__amount fw-normal"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($successful)); ?></h2>
                </div>

            </div><!-- d-widget end -->
        </div>
        <div class="col-12 col-md-4">
            <div class="d-widget curve--shape">
                <div class="d-widget__content">
                    <i class="las la-pause-circle"></i> <?php echo app('translator')->get('Pending Withdrawals'); ?>
                    <h2 class="d-widget__amount fw-normal"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($pending)); ?></h2>
                </div>

            </div><!-- d-widget end -->
        </div>
        <div class="col-12 col-md-4">
            <div class="d-widget curve--shape">
                <div class="d-widget__content">
                    <i class="las la-times-circle"></i> <?php echo app('translator')->get('Rejected Withdrawals'); ?>
                    <h2 class="d-widget__amount fw-normal"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($rejected)); ?></h2>
                </div>

            </div><!-- d-widget end -->
        </div>
    </div>
    <div class="custom--card mt-3">

        <div class="card-body">
            <div class="row align-items-center mb-3 flex-wrap">
                <div class="col-12 col-md-8">
                    <h6 class="mb-md-0 mb-3"><?php echo app('translator')->get($pageTitle); ?></h6>
                </div>
                <div class="col-12 col-md-4">
                    <div class="text-end">
                        <form action="" method="GET">
                            <div class="search--box">
                                <input type="text" name="trx" class="form--control" value="<?php echo e(request()->trx); ?>" placeholder="<?php echo app('translator')->get('Transaction ID'); ?>" autocomplete="off">
                                <button type="submit" class="search-box-btn">
                                    <i class="las la-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive--sm">
                <table class="custom--table table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Gateway | Transaction'); ?></th>
                            <th><?php echo app('translator')->get('Initiated'); ?></th>
                            <th><?php echo app('translator')->get('Amount'); ?> - <?php echo app('translator')->get('Charge'); ?></th>
                            <th><?php echo app('translator')->get('Conversion'); ?></th>
                            <th><?php echo app('translator')->get('Status'); ?></th>
                            <th><?php echo app('translator')->get('Details'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $details = $withdraw->withdraw_information != null ? json_encode($withdraw->withdraw_information) : null;
                            ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('Gateway | Transaction'); ?>">
                                    <span class="fw-bold"><a href="<?php echo e(appendQuery('method', @$withdraw->method->id)); ?>"> <?php echo e(__(@$withdraw->method->name)); ?></a></span>
                                    <br>
                                    <small><?php echo e($withdraw->trx); ?></small>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Initiated'); ?>">
                                    <?php echo e(showDateTime($withdraw->created_at)); ?> <br> <?php echo e(diffForHumans($withdraw->created_at)); ?>

                                </td>

                                <td data-label="<?php echo app('translator')->get('Amount'); ?> - <?php echo app('translator')->get('Charge'); ?>">
                                    <?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($withdraw->amount)); ?> - <span class="text-danger" title="<?php echo app('translator')->get('charge'); ?>"><?php echo e(showAmount($withdraw->charge)); ?> </span>
                                    <br>
                                    <strong title="<?php echo app('translator')->get('Amount after Charge'); ?>">
                                        <?php echo e(showAmount($withdraw->amount - $withdraw->charge)); ?> <?php echo e(__($general->cur_text)); ?>

                                    </strong>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Conversion'); ?>">
                                    1 <?php echo e(__($general->cur_text)); ?> = <?php echo e(showAmount($withdraw->rate)); ?> <?php echo e(__($withdraw->currency)); ?>

                                    <br>
                                    <strong><?php echo e(showAmount($withdraw->final_amount)); ?> <?php echo e(__($withdraw->currency)); ?></strong>
                                </td>



                                <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                    <?php echo $withdraw->statusBadge ?>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Details'); ?>">
                                    <button class="btn btn-sm btn-outline--primary ms-1 detailBtn" data-user_data="<?php echo e(json_encode($withdraw->withdraw_information)); ?>" <?php if($withdraw->status == 3): ?> data-admin_feedback="<?php echo e($withdraw->admin_feedback); ?>" <?php endif; ?>>
                                        <i class="la la-desktop"></i> <?php echo app('translator')->get('Details'); ?>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="text-muted text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php if($withdrawals->hasPages()): ?>
                <div class="d-flex justify-content-end">
                    <?php echo e(paginateLinks($withdrawals)); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Details'); ?></h5>
                    <button type="button" class="btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush userData">
                    </ul>
                    <div class="feedback"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            'use strict';
            $('.detailBtn').on('click', function() {
                var modal = $('#detailModal');
                var userData = $(this).data('user_data');
                var html = ``;
                userData.forEach(element => {
                    if (element.type != 'file') {
                        html += `
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>${element.name}</span>
                            <span">${element.value}</span>
                        </li>`;
                    }
                });
                modal.find('.userData').html(html);

                if ($(this).data('admin_feedback') != undefined) {
                    var adminFeedback = `
                        <div class="my-3">
                            <strong><?php echo app('translator')->get('Admin Feedback'); ?></strong>
                            <p>${$(this).data('admin_feedback')}</p>
                        </div>
                    `;
                } else {
                    var adminFeedback = '';
                }

                modal.find('.feedback').html(adminFeedback);

                modal.modal('show');
            });
        })(jQuery)
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/agent/withdraw/log.blade.php ENDPATH**/ ?>