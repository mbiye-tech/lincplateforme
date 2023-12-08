<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--md table-responsive">
                        <table class="table--light style--two table">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('S.N.'); ?></th>
                                    <th><?php echo app('translator')->get('Name'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $sendingPurposes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sendingPurpose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('S.N.'); ?>"><?php echo e($sendingPurposes->firstItem() + $loop->index); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Name'); ?>"><?php echo e($sendingPurpose->name); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                            <span class="badge badge-pill badge--<?php echo e($sendingPurpose->status == 0 ? 'danger' : 'success'); ?>"><?php echo e($sendingPurpose->status == 0 ? 'Disabled' : 'Active'); ?></span>
                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <button class="btn btn-sm btn-outline--primary cuModalBtn ml-1" data-modal_title="<?php echo app('translator')->get('Update Sending Purpose'); ?>" data data-resource="<?php echo e($sendingPurpose); ?>" data-has_status="1"><i class="las la-pen"></i>
                                                <?php echo app('translator')->get('Edit'); ?></button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="100%" class="text-center">
                                            <?php echo e(__($emptyMessage)); ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <?php if($sendingPurposes->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($sendingPurposes)); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div id="cuModal" class="modal fade">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Edit Sending Purposes'); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.sending.purpose.save')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Name'); ?> </label>
                            <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required />
                        </div>
                        <div class="status"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="top--control d-flex justify-content-md-end flex-nowrap" style="gap:23px 10px">
        <form action="" method="GET" class="float-sm-right">
            <div class="input-group bg-white">
                <input type="text" name="search" class="form-control bg--white text--dark" placeholder="<?php echo app('translator')->get('Name'); ?>" value="<?php echo e(request()->search ?? ''); ?>">
                <button type="submit" class="input-group-text bg--primary border-0 text-white"><i class="fa fa-search"></i></button>
            </div>
        </form>
        <button type="button" class="btn btn-sm btn-outline--primary cuModalBtn" data-modal_title="<?php echo app('translator')->get('Add New Sending Purpose'); ?>"><i class="las la-plus"></i><?php echo app('translator')->get('Add New'); ?></button>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/admin/sending_purposes.blade.php ENDPATH**/ ?>