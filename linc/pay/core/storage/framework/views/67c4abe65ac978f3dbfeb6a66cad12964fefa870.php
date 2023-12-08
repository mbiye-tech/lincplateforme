<?php $__env->startSection('panel'); ?>
    <div class="row justify-content-center mt-5">
        <div class="col-xxl-5 col-xl-7 col-md-8 col-sm-10">
            <div class="border--card h-auto">
                <h4 class="title"> <i class="las la-money-check-alt"></i> <?php echo e(__($pageTitle)); ?></h4>
                <div class="card-body p-0">
                    <form action="<?php echo e(route('agent.payout.info')); ?>" method="get" class="row">
                        <div class="form-group">
                            <label for="trx"><?php echo app('translator')->get('Transaction Number'); ?></label>
                            <input id="trx" type="text" value="<?php echo e(old('trx')); ?>" class="form--control" placeholder="<?php echo app('translator')->get('Enter Transaction / Slip Number'); ?>" name="trx">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn--base btn-md w-100"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('agent.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/agent/payout/payout_money.blade.php ENDPATH**/ ?>