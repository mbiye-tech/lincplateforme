<?php $__env->startSection('content'); ?>
    <div class="section section--sm">
        <div class="container">
            <div class="d-flex flex-wrap flex-row-reverse justify-content-between align-items-center mb-lg-3">
                <div class="text-end">
                    <a href="<?php echo e(route('ticket.open')); ?>" class="btn btn-sm btn--base mb-2"> <i class="fa fa-plus"></i> <?php echo app('translator')->get('New Ticket'); ?></a>
                </div>
                <div class="custom--table__header">
                    <h5 class="text-lg-start m-0 text-center"><?php echo app('translator')->get('Support Ticket'); ?></h5>
                </div>
            </div>
            <div class="table-responsive--md">
                <table class="table custom--table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Subject'); ?></th>
                            <th><?php echo app('translator')->get('Status'); ?></th>
                            <th><?php echo app('translator')->get('Priority'); ?></th>
                            <th><?php echo app('translator')->get('Last Reply'); ?></th>
                            <th><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('Subject'); ?>"> [<?php echo app('translator')->get('Ticket'); ?>#<?php echo e($support->ticket); ?>] <?php echo e(__($support->subject)); ?> </td>
                                <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                    <?php if($support->status == 0): ?>
                                        <span class="badge badge--success py-2 px-3"><?php echo app('translator')->get('Open'); ?></span>
                                    <?php elseif($support->status == 1): ?>
                                        <span class="badge badge--primary py-2 px-3"><?php echo app('translator')->get('Answered'); ?></span>
                                    <?php elseif($support->status == 2): ?>
                                        <span class="badge badge--warning py-2 px-3"><?php echo app('translator')->get('Customer Reply'); ?></span>
                                    <?php elseif($support->status == 3): ?>
                                        <span class="badge badge--dark py-2 px-3"><?php echo app('translator')->get('Closed'); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Priority'); ?>">
                                    <?php if($support->priority == 1): ?>
                                        <span class="badge badge--dark py-2 px-3"><?php echo app('translator')->get('Low'); ?></span>
                                    <?php elseif($support->priority == 2): ?>
                                        <span class="badge badge--success py-2 px-3"><?php echo app('translator')->get('Medium'); ?></span>
                                    <?php elseif($support->priority == 3): ?>
                                        <span class="badge badge--primary py-2 px-3"><?php echo app('translator')->get('High'); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="<?php echo app('translator')->get('Last Reply'); ?>"><?php echo e(\Carbon\Carbon::parse($support->last_reply)->diffForHumans()); ?> </td>

                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <a href="<?php echo e(route('ticket.view', $support->ticket)); ?>" class="btn btn--base btn--sm">
                                        <i class="fa fa-desktop"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="100%" class="text-center text-muted"><?php echo e(__($emptyMessage)); ?> </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3 d-flex justify-content-end">
                <?php if($supports->hasPages()): ?>
                    <?php echo e(paginateLinks($supports)); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/user/support/index.blade.php ENDPATH**/ ?>