<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('User'); ?></th>
                                    <th><?php echo app('translator')->get('Email-Phone'); ?></th>
                                    <th><?php echo app('translator')->get('Country'); ?></th>
                                    <th><?php echo app('translator')->get('Joined At'); ?></th>
                                    <th><?php echo app('translator')->get('Balance'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('User'); ?>">
                                            <span class="fw-bold"><?php echo e($user->fullname); ?></span>
                                            <br>
                                            <span class="small">
                                                <a href="<?php echo e(route('admin.users.detail', $user->id)); ?>"><span>@</span><?php echo e($user->username); ?></a>
                                            </span>
                                        </td>


                                        <td data-label="<?php echo app('translator')->get('Email-Phone'); ?>">
                                            <?php echo e($user->email); ?><br><?php echo e($user->mobile); ?>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Country'); ?>">
                                            <span class="fw-bold" title="<?php echo e(@$user->address->country); ?>"><?php echo e($user->country_code); ?></span>
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Joined At'); ?>">
                                            <?php echo e(showDateTime($user->created_at)); ?> <br> <?php echo e(diffForHumans($user->created_at)); ?>

                                        </td>


                                        <td data-label="<?php echo app('translator')->get('Balance'); ?>">
                                            <span class="fw-bold">

                                                <?php echo e($general->cur_sym); ?><?php echo e(showAmount($user->balance)); ?>

                                            </span>
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <a href="<?php echo e(route('admin.users.detail', $user->id)); ?>" class="btn btn-sm btn-outline--primary">
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
                <?php if($users->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($users)); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="d-flex flex-wrap justify-content-end">
        <form action="" method="GET" class="form-inline">
            <div class="input-group justify-content-end">
                <input type="text" name="search" class="form-control bg--white" placeholder="<?php echo app('translator')->get('Search Username'); ?>" value="<?php echo e(request()->search); ?>">
                <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/admin/users/list.blade.php ENDPATH**/ ?>