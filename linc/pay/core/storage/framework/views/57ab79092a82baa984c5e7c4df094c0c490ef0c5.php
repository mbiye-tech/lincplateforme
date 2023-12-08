<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('Agent'); ?></th>
                                    <th><?php echo app('translator')->get('Email-Phone'); ?></th>
                                    <th><?php echo app('translator')->get('Country'); ?></th>
                                    <th><?php echo app('translator')->get('Joined At'); ?></th>
                                    <th><?php echo app('translator')->get('Balance'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('Agent'); ?>">
                                            <span class="fw-bold"><?php echo e($agent->fullname); ?></span>
                                            <br>
                                            <span class="small">
                                                <a href="<?php echo e(route('admin.agents.detail', $agent->id)); ?>"><span>@</span><?php echo e($agent->username); ?></a>
                                            </span>
                                        </td>


                                        <td data-label="<?php echo app('translator')->get('Email-Phone'); ?>">
                                            <?php echo e($agent->email); ?><br><?php echo e($agent->mobile); ?>

                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Country'); ?>">
                                            <span class="fw-bold" title="<?php echo e(@$agent->address->country); ?>"><?php echo e($agent->country_code); ?></span>
                                        </td>



                                        <td data-label="<?php echo app('translator')->get('Joined At'); ?>">
                                            <?php echo e(showDateTime($agent->created_at)); ?> <br> <?php echo e(diffForHumans($agent->created_at)); ?>

                                        </td>


                                        <td data-label="<?php echo app('translator')->get('Balance'); ?>">
                                            <span class="fw-bold">

                                                <?php echo e($general->cur_sym); ?><?php echo e(showAmount($agent->balance)); ?>

                                            </span>
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <a href="<?php echo e(route('admin.agents.detail', $agent->id)); ?>" class="btn btn-sm btn-outline--primary">
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
                <?php if($agents->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($agents)); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="d-flex flex-wrap justify-content-end">
        <a class="btn btn-outline--primary h-45 me-2 mb-2" href="<?php echo e(route('admin.agents.add')); ?>"><i class="las la-plus"></i><?php echo app('translator')->get('Add New'); ?></a>
        <form accept="" class="form-inline">
            <div class="input-group justify-content-end">
                <input type="text" name="search" class="form-control bg--white" placeholder="<?php echo app('translator')->get('Search Username'); ?>" value="<?php echo e(request()->search); ?>">
                <button class=" btn btn--primary input-group-text"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/admin/agents/list.blade.php ENDPATH**/ ?>