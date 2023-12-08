<?php $__env->startSection('panel'); ?>
    <div class="row justify-content-center">
        <?php if(request()->routeIs('admin.deposit.list') || request()->routeIs('admin.deposit.method') || request()->routeIs('admin.users.deposits') || request()->routeIs('admin.users.deposits.method')): ?>
            <div class="col-xxl-3 col-sm-6 mb-30">
                <div class="widget-two box--shadow2 b-radius--5 bg--success has-link">
                    <a href="<?php echo e(route('admin.deposit.successful')); ?>" class="item-link"></a>
                    <div class="widget-two__content">
                        <h2 class="text-white"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($successful)); ?></h2>
                        <p class="text-white"><?php echo app('translator')->get('Successful Deposit'); ?></p>
                    </div>
                </div><!-- widget-two end -->
            </div>
            <div class="col-xxl-3 col-sm-6 mb-30">
                <div class="widget-two box--shadow2 b-radius--5 bg--6 has-link">
                    <a href="<?php echo e(route('admin.deposit.pending')); ?>" class="item-link"></a>
                    <div class="widget-two__content">
                        <h2 class="text-white"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($pending)); ?></h2>
                        <p class="text-white"><?php echo app('translator')->get('Pending Deposit'); ?></p>
                    </div>
                </div><!-- widget-two end -->
            </div>
            <div class="col-xxl-3 col-sm-6 mb-30">
                <div class="widget-two box--shadow2 has-link b-radius--5 bg--pink">
                    <a href="<?php echo e(route('admin.deposit.rejected')); ?>" class="item-link"></a>
                    <div class="widget-two__content">
                        <h2 class="text-white"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($rejected)); ?></h2>
                        <p class="text-white"><?php echo app('translator')->get('Rejected Deposit'); ?></p>
                    </div>
                </div><!-- widget-two end -->
            </div>
            <div class="col-xxl-3 col-sm-6 mb-30">
                <div class="widget-two box--shadow2 has-link b-radius--5 bg--dark">
                    <a href="<?php echo e(route('admin.deposit.initiated')); ?>" class="item-link"></a>
                    <div class="widget-two__content">
                        <h2 class="text-white"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($initiated)); ?></h2>
                        <p class="text-white"><?php echo app('translator')->get('Initiated Deposit'); ?></p>
                    </div>
                </div><!-- widget-two end -->
            </div>
        <?php endif; ?>

        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Gateway | Transaction'); ?></th>
                                    <th><?php echo app('translator')->get('Initiated'); ?></th>
                                    <th><?php echo app('translator')->get('User'); ?></th>
                                    <th><?php echo app('translator')->get('Amount'); ?></th>
                                    <th><?php echo app('translator')->get('Conversion'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
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
                                        <td data-label="<?php echo app('translator')->get('User'); ?>">

                                            <?php if($deposit->user_id): ?>
                                                <span class="fw-bold"><?php echo e(@$deposit->user->fullname); ?></span>
                                                <br>
                                                <span class="small">
                                                    <a
                                                        href="<?php echo e(appendQuery('search', @$deposit->user->username)); ?>"><span>@</span><?php echo e(@$deposit->user->username); ?></a>
                                                </span>
                                            <?php else: ?>
                                                <span class="fw-bold"><?php echo e(@$deposit->agent->fullname); ?></span>
                                                <br>
                                                <span class="small">
                                                    <a
                                                        href="<?php echo e(appendQuery('search', @$deposit->agent->username)); ?>"><span>@</span><?php echo e(@$deposit->agent->username); ?></a>
                                                </span>
                                            <?php endif; ?>
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
                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <a href="<?php echo e(route('admin.deposit.details', $deposit->id)); ?>"
                                                class="btn btn-sm btn-outline--primary ms-1">
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
                        </table><!-- table end -->
                    </div>
                </div>
                <?php if($deposits->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($deposits)); ?>

                    </div>
                <?php endif; ?>
            </div><!-- card end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
    <?php if(!request()->routeIs('admin.users.deposits') && !request()->routeIs('admin.users.deposits.method')): ?>
        <form action="" method="GET">
            <div class="form-inline float-sm-end mb-2 ms-0 ms-xl-2 ms-lg-0">
                <div class="input-group">
                    <input type="text" name="search" class="form-control bg--white" placeholder="<?php echo app('translator')->get('Trx number/Username'); ?>" value="<?php echo e(request()->search ?? ''); ?>">
                    <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="form-inline float-sm-end">
                <div class="input-group">
                    <input name="date" type="text" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control bg--white" data-position='bottom right' placeholder="<?php echo app('translator')->get('Start date - End date'); ?>" autocomplete="off" value="<?php echo e(request()->date); ?>">
                    <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    <?php endif; ?>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/global/js/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/datepicker.en.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            if (!$('.datepicker-here').val()) {
                $('.datepicker-here').datepicker();
            }
        })(jQuery)
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/admin/deposit/log.blade.php ENDPATH**/ ?>