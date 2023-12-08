<?php $__env->startSection('panel'); ?>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="border--card">
                <h5 class="title"><i class="las la-wallet"></i> <?php echo app('translator')->get('Payment via '); ?><?php echo e($pageTitle); ?></h5>
                <div class="card-body p-0">

                    <form action="<?php echo e(route('agent.deposit.manual.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="text-center mt-2"><?php echo app('translator')->get('You have requested'); ?> <b class="text--success"><?php echo e(showAmount($data['amount'])); ?> <?php echo e(__($general->cur_text)); ?></b> , <?php echo app('translator')->get('Please pay'); ?>
                                    <b class="text--success"><?php echo e(showAmount($data['final_amo']) . ' ' . $data['method_currency']); ?> </b> <?php echo app('translator')->get('for successful payment'); ?>
                                </p>
                                <h4 class="text-center mb-4"><?php echo app('translator')->get('Please follow the instruction below'); ?></h4>

                                <p class="my-4 text-center"><?php echo  $data->gateway->description ?></p>

                            </div>

                            <?php if (isset($component)) { $__componentOriginale40beaa5cbfa24869bd0b7ba4d9f41184a3f12f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ViserForm::class, ['identifier' => 'id','identifierValue' => ''.e($gateway->form_id).''] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('viser-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\ViserForm::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale40beaa5cbfa24869bd0b7ba4d9f41184a3f12f0)): ?>
<?php $component = $__componentOriginale40beaa5cbfa24869bd0b7ba4d9f41184a3f12f0; ?>
<?php unset($__componentOriginale40beaa5cbfa24869bd0b7ba4d9f41184a3f12f0); ?>
<?php endif; ?>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--base btn-md w-100"><?php echo app('translator')->get('Pay Now'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/agent/payment/manual.blade.php ENDPATH**/ ?>