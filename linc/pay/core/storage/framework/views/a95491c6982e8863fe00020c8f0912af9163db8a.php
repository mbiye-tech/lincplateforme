<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two custom-data-table">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Gateway'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-label="<?php echo app('translator')->get('Gateway'); ?>"><?php echo e(__($gateway->name)); ?></td>

                                    <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                        <?php if($gateway->status == 1): ?>
                                            <span class="text--small badge font-weight-normal badge--success"><?php echo app('translator')->get('Enabled'); ?></span>
                                        <?php else: ?>
                                            <span class="text--small badge font-weight-normal badge--warning"><?php echo app('translator')->get('Disabled'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                        <div class="button--group">
                                            <a href="<?php echo e(route('admin.gateway.manual.edit', $gateway->alias)); ?>" class="btn btn-sm btn-outline--primary editGatewayBtn">
                                                <i class="la la-pencil"></i> <?php echo app('translator')->get('Edit'); ?>
                                            </a>

                                            <?php if($gateway->status == 0): ?>
                                                <button class="btn btn-sm btn-outline--success confirmationBtn" data-question="<?php echo app('translator')->get('Are you sure to enable this gateway?'); ?>" data-action="<?php echo e(route('admin.gateway.manual.activate',$gateway->code)); ?>">
                                                    <i class="la la-eye"></i> <?php echo app('translator')->get('Enable'); ?>
                                                </button>
                                            <?php else: ?>
                                                <button class="btn btn-sm btn-outline--danger confirmationBtn" data-question="<?php echo app('translator')->get('Are you sure to disable this gateway?'); ?>" data-action="<?php echo e(route('admin.gateway.manual.deactivate',$gateway->code)); ?>">
                                                    <i class="la la-eye-slash"></i> <?php echo app('translator')->get('Disable'); ?>
                                                </button>
                                            <?php endif; ?>
                                        </div>
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
            </div><!-- card end -->
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ConfirmationModal::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\ConfirmationModal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b)): ?>
<?php $component = $__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b; ?>
<?php unset($__componentOriginalc51724be1d1b72c3a09523edef6afdd790effb8b); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="d-flex flex-wrap justify-content-end">
        <a class="btn btn-outline--primary h-45 me-2 mb-2" href="<?php echo e(route('admin.gateway.manual.create')); ?>"><i class="las la-plus"></i><?php echo app('translator')->get('Add New'); ?></a>
        <div class="d-inline">
            <div class="input-group justify-content-end">
                <input type="text" name="search_table" class="form-control bg--white" placeholder="<?php echo app('translator')->get('Search'); ?>...">
                <button class="btn btn--primary input-group-text"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/admin/gateways/manual/list.blade.php ENDPATH**/ ?>