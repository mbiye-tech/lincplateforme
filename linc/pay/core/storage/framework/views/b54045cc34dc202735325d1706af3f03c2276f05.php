<?php $__env->startSection('content'); ?>
    <!-- page-wrapper start -->
    <div class="agent-dashboard">
        <?php echo $__env->make('agent.partials.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('agent.partials.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="agent-dashboard__body">
            <?php echo $__env->yieldContent('panel'); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('agent.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/agent/layouts/app.blade.php ENDPATH**/ ?>