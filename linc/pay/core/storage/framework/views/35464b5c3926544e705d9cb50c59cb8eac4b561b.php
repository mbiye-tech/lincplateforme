<div class="dashboard-top-nav">
    <div class="row align-items-center">
        <div class="col-3 col-md-6">
            <div class="d-flex align-items-center gap-3">
                <a href="<?php echo e(route('home')); ?>" class="logo d-none d-md-inline-block">
                    <img src="<?php echo e(getImage(getFilePath('logoIcon') . '/logo-dark.png')); ?>" alt="<?php echo e(__($general->site_name)); ?>" class="img-fluid logo__is" />
                </a>
                <button class="sidebar-open-btn"><i class="las la-bars"></i></button>
            </div>
        </div>
        <div class="col-9 col-md-6">
            <div class="d-flex justify-content-end align-items-center flex-wrap">
                <ul class="header-top-menu">
                    <li><a href="<?php echo e(route('agent.ticket')); ?>"> <i class="la la-headphones" aria-hidden="true"></i> <?php echo app('translator')->get('Support'); ?></a></li>
                </ul>
                <div class="header-user">
                    <span class="name"> <i class="la la-user" aria-hidden="true"></i> <?php echo e(authAgent()->username); ?></span>
                    <ul class="header-user-menu">
                        <li><a href="<?php echo e(route('agent.profile.setting')); ?>"><i class="las la-user-circle"></i><?php echo app('translator')->get('Profile Setting'); ?></a></li>
                        <li><a href="<?php echo e(route('agent.change.password')); ?>"><i class="las la-cogs"></i> <?php echo app('translator')->get('Change Password'); ?></a></li>
                        <li><a href="<?php echo e(route('agent.twofactor')); ?>"><i class="las la-bell"></i><?php echo app('translator')->get('2FA Security'); ?></a></li>
                        <li><a href="<?php echo e(route('agent.logout')); ?>"><i class="las la-sign-out-alt"></i> <?php echo app('translator')->get('Logout'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/agent/partials/topnav.blade.php ENDPATH**/ ?>