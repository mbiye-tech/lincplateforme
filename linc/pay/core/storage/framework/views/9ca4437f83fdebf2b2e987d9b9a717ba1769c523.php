<?php $__env->startSection('panel'); ?>
    <div class="row justify-content-center">
        <?php if(request()->routeIs('admin.withdraw.log') || request()->routeIs('admin.withdraw.method') || request()->routeIs('admin.users.withdrawals') || request()->routeIs('admin.users.withdrawals.method')): ?>
            <div class="col-xl-4 col-sm-6 mb-30">
                <div class="widget-two box--shadow2 has-link b-radius--5 bg--success">
                    <a href="<?php echo e(route('admin.withdraw.approved')); ?>" class="item-link"></a>
                    <div class="widget-two__content">
                        <h2 class="text-white"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($successful)); ?></h2>
                        <p class="text-white"><?php echo app('translator')->get('Approved Withdrawals'); ?></p>
                    </div>
                </div><!-- widget-two end -->
            </div>
            <div class="col-xl-4 col-sm-6 mb-30">
                <div class="widget-two box--shadow2 has-link b-radius--5 bg--6">
                    <a href="<?php echo e(route('admin.withdraw.pending')); ?>" class="item-link"></a>
                    <div class="widget-two__content">
                        <h2 class="text-white"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($pending)); ?></h2>
                        <p class="text-white"><?php echo app('translator')->get('Pending Withdrawals'); ?></p>
                    </div>
                </div><!-- widget-two end -->
            </div>
            <div class="col-xl-4 col-sm-6 mb-30">
                <div class="widget-two box--shadow2 b-radius--5 has-link bg--pink">
                    <a href="<?php echo e(route('admin.withdraw.rejected')); ?>" class="item-link"></a>
                    <div class="widget-two__content">
                        <h2 class="text-white"><?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($rejected)); ?></h2>
                        <p class="text-white"><?php echo app('translator')->get('Rejected Withdrawals'); ?></p>
                    </div>
                </div><!-- widget-two end -->
            </div>
        <?php endif; ?>
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">

                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Gateway | Transaction'); ?></th>
                                    <th><?php echo app('translator')->get('Initiated'); ?></th>
                                    <th><?php echo app('translator')->get('Agent'); ?></th>
                                    <th><?php echo app('translator')->get('Amount'); ?></th>
                                    <th><?php echo app('translator')->get('Conversion'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>

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

                                        <td data-label="<?php echo app('translator')->get('Agent'); ?>">
                                            <span class="fw-bold"><?php echo e($withdraw->agent->fullname); ?></span>
                                            <br>
                                            <span class="small"> <a href="<?php echo e(appendQuery('search', @$withdraw->agent->username)); ?>"><span>@</span><?php echo e(@$withdraw->agent->username); ?></a> </span>
                                        </td>


                                        <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                            <?php echo e(__($general->cur_sym)); ?><?php echo e(showAmount($withdraw->amount)); ?> - <span class="text-danger" title="<?php echo app('translator')->get('charge'); ?>"><?php echo e(showAmount($withdraw->charge)); ?> </span>
                                            <br>
                                            <strong title="<?php echo app('translator')->get('Amount after charge'); ?>">
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
                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <a href="<?php echo e(route('admin.withdraw.details', $withdraw->id)); ?>" class="btn btn-sm btn-outline--primary ms-1">
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
                <?php if($withdrawals->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($withdrawals)); ?>

                    </div>
                <?php endif; ?>
            </div><!-- card end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php $__env->startPush('breadcrumb-plugins'); ?>
    <form action="" method="GET">
        <div class="form-inline float-sm-end mb-2 ms-0 ms-xl-2 ms-lg-0">
            <div class="input-group">
                <input type="text" name="search" class="form-control bg--white" placeholder="<?php echo app('translator')->get('Trx number/Username'); ?>" value="<?php echo e(request()->search); ?>">
                <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="form-inline float-sm-end">
            <div class="input-group">
                <input name="date" type="text" data-range="true" data-multiple-dates-separator=" - " data-language="en" class="datepicker-here form-control bg--white" data-position='bottom right' placeholder="<?php echo app('translator')->get('Start Date - End date'); ?>" autocomplete="off" value="<?php echo e(request()->date); ?>">
                <input type="hidden" name="method" value="<?php echo e(@$method->id); ?>">
                <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/global/js/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/datepicker.en.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            'use strict';
            if (!$('.datepicker-here').val()) {
                $('.datepicker-here').datepicker();
            }
        })(jQuery)
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/admin/withdraw/withdrawals.blade.php ENDPATH**/ ?>