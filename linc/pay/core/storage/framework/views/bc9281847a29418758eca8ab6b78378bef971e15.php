<?php $__env->startSection('panel'); ?>
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-4">
            <div class="d-widget curve--shape">
                <div class="d-widget__content">
                    <i class="las la-check-circle"></i> <?php echo app('translator')->get('Successful Deposit'); ?>
                    <h2 class="d-widget__amount fw-normal"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($successful)); ?></h2>
                </div>

            </div><!-- d-widget end -->
        </div>
        <div class="col-12 col-md-4">
            <div class="d-widget curve--shape">
                <div class="d-widget__content">
                    <i class="las la-pause-circle"></i> <?php echo app('translator')->get('Pending Deposit'); ?>
                    <h2 class="d-widget__amount fw-normal"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($pending)); ?></h2>
                </div>

            </div><!-- d-widget end -->
        </div>
        <div class="col-12 col-md-4">
            <div class="d-widget curve--shape">
                <div class="d-widget__content ">
                    <i class="las la-times-circle"></i> <?php echo app('translator')->get('Rejected Deposit'); ?>
                    <h2 class="d-widget__amount fw-normal"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($rejected)); ?></h2>
                </div>

            </div><!-- d-widget end -->
        </div>
    </div>
    <div class="custom--card mt-3">

        <div class="card-body">
            <div class="row align-items-center flex-wrap mb-3">
                <div class="col-12 col-md-8">
                    <h6 class="mb-3 mb-md-0"><?php echo app('translator')->get($pageTitle); ?></h6>
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
                <table class="table custom--table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Gateway | Transaction'); ?></th>
                            <th><?php echo app('translator')->get('Initiated'); ?></th>
                            <th><?php echo app('translator')->get('Amount'); ?></th>
                            <th><?php echo app('translator')->get('Conversion'); ?></th>
                            <th><?php echo app('translator')->get('Status'); ?></th>
                            <th><?php echo app('translator')->get('Details'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $details = $deposit->detail ? json_encode($deposit->detail) : null;
                            ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('Gateway | Transaction'); ?>">
                                    <span class="fw-bold"> <a href="<?php echo e(appendQuery('method', @$deposit->gateway->alias)); ?>"><?php echo e(__(@$deposit->gateway->name)); ?></a> </span>
                                    <br>
                                    <small> <?php echo e($deposit->trx); ?> </small>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Date'); ?>">
                                    <?php echo e(showDateTime($deposit->created_at)); ?><br><?php echo e(diffForHumans($deposit->created_at)); ?>

                                </td>
                                <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                    <?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($deposit->amount)); ?> + <span class="text-danger" title="<?php echo app('translator')->get('charge'); ?>"><?php echo e(showAmount($deposit->charge)); ?> </span>
                                    <br>
                                    <strong title="<?php echo app('translator')->get('Amount with charge'); ?>">
                                        <?php echo e(showAmount($deposit->amount + $deposit->charge)); ?> <?php echo e(__($general->cur_text)); ?>

                                    </strong>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Conversion'); ?>">
                                    1 <?php echo e(__($general->cur_text)); ?> = <?php echo e(showAmount($deposit->rate)); ?> <?php echo e(__($deposit->method_currency)); ?>

                                    <br>
                                    <strong><?php echo e(showAmount($deposit->final_amo)); ?> <?php echo e(__($deposit->method_currency)); ?></strong>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                    <?php echo $deposit->statusBadge ?>
                                </td>
                                <?php
                                    $details = $deposit->detail != null ? json_encode($deposit->detail) : null;
                                ?>
                                <td data-label="<?php echo app('translator')->get('Details'); ?>">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-outline--primary ms-1 <?php if($deposit->method_code >= 1000): ?> detailBtn <?php else: ?> disabled <?php endif; ?>"
                                        <?php if($deposit->method_code >= 1000): ?> data-info="<?php echo e($details); ?>" <?php endif; ?>
                                        <?php if($deposit->status == 3): ?> data-admin_feedback="<?php echo e($deposit->admin_feedback); ?>" <?php endif; ?>>
                                        <i class="la la-desktop"></i> <?php echo app('translator')->get('Details'); ?>
                                    </a>
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
            <?php if($deposits->hasPages()): ?>
                <div class="d-flex justify-content-end">
                    <?php echo e(paginateLinks($deposits)); ?>


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
                    <ul class="list-group list-group-flush userData mb-2">
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
            "use strict";

            $('.detailBtn').on('click', function() {
                var modal = $('#detailModal');

                var userData = $(this).data('info');
                var html = '';
                if (userData) {
                    userData.forEach(element => {
                        if (element.type != 'file') {
                            html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>${element.name}</span>
                                <span">${element.value}</span>
                            </li>`;
                        }
                    });
                }

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

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/agent/deposit_history.blade.php ENDPATH**/ ?>