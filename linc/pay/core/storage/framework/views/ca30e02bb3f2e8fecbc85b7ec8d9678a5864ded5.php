<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Created By'); ?></th>
                                    <th><?php echo app('translator')->get('Sent From'); ?></th>
                                    <th><?php echo app('translator')->get('Recipient'); ?></th>
                                    <th><?php echo app('translator')->get('Sending Amount / Trx'); ?></th>
                                    <th><?php echo app('translator')->get('Receivable Amount'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $sendMoneys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sendMoney): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('Created By'); ?>">
                                            <?php if($sendMoney->user_id): ?>
                                                <span class="fw-bold"><?php echo e(@$sendMoney->user->fullname); ?></span>
                                                <br>
                                                <span class="small">
                                                    <a href="<?php echo e(route('admin.users.detail', $sendMoney->user_id)); ?>"><span>@</span><?php echo e($sendMoney->user->username); ?></a>
                                                </span>
                                            <?php else: ?>
                                                <span class="fw-bold"><?php echo e(@$sendMoney->agent->fullname); ?></span>
                                                <br>
                                                <span class="small">
                                                    <a href="<?php echo e(route('admin.agents.detail', $sendMoney->agent_id)); ?>"><span>@</span><?php echo e($sendMoney->agent->username); ?></a>
                                                </span>
                                            <?php endif; ?>
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Sent From'); ?>">
                                            <?php echo e(@$sendMoney->senderInfo->name); ?><br><?php echo e($sendMoney->sending_country); ?>

                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Recipient'); ?>">
                                            <?php echo e($sendMoney->recipient->name); ?><br><?php echo e($sendMoney->recipient_country); ?>

                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Sending Amount / Trx/Trx'); ?>">
                                            <?php echo e(showAmount($sendMoney->sending_amount)); ?> <?php echo e($sendMoney->sending_currency); ?> <br>
                                            <span class="text--primary"><?php echo e($sendMoney->trx); ?></span>
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Receivable Amount'); ?>">
                                            <?php echo e(showAmount($sendMoney->recipient_amount)); ?> <?php echo e($sendMoney->recipient_currency); ?> <br>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                            <?php
                                                echo $sendMoney->statusText;
                                            ?>
                                            <br>
                                            <?php echo e($sendMoney->updated_at->diffForHumans()); ?>

                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <a href="<?php echo e(route('admin.send.money.details', $sendMoney->id)); ?>" class="btn btn-sm btn-outline--primary">
                                                <i class="las la-desktop text--shadow"></i> <?php echo app('translator')->get('Details'); ?>
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
                <?php if($sendMoneys->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($sendMoneys)); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <form action="" method="GET" class="form-inline float-sm-end">
        <div class="input-group ">
            <input type="text" name="search" class="form-control bg-white text--dark" placeholder="<?php echo app('translator')->get('Trx/sender/recipient info'); ?>" value="<?php echo e(request()->search ?? ''); ?>">
            <button type="submit" class="input-group-text bg--primary border-0"><i class="fa fa-search"></i></button>
        </div>
    </form>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/admin/send_money/list.blade.php ENDPATH**/ ?>