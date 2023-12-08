<!-- Header -->
<header class="header-fixed header--secondary">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="<?php echo e(route('home')); ?>" class="logo logo-light">
                <img src="<?php echo e(getImage(getFilepath('logoIcon') . '/logo.png')); ?>" alt="<?php echo e(__($general->site_name)); ?>"
                     class="img-fluid logo__is" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="menu-toggle"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0 align-items-lg-center mb-2">
                    <li class="nav-item">
                        <a href="<?php echo e(route('user.home')); ?>" class="primary-menu__link"><?php echo app('translator')->get('Dashboard'); ?></a>
                    </li>
                    <li class="nav-item primary-menu__list has-sub">
                        <a href="javascript:void(0)" class="primary-menu__link"><?php echo app('translator')->get('Send Money'); ?></a>
                        <ul class="primary-menu__sub">
                            <li class="primary-menu__sub-list">
                                <a class="t-link primary-menu__sub-link" href="<?php echo e(route('user.send.money.now')); ?>">
                                    <?php echo app('translator')->get('Send Now'); ?>
                                </a>
                            </li>

                            <li class="primary-menu__sub-list">
                                <a class="t-link primary-menu__sub-link" href="<?php echo e(route('user.send.money.history')); ?>">
                                    <?php echo app('translator')->get('View History'); ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item primary-menu__list has-sub">
                        <a href="javascript:void(0)" class="primary-menu__link"><?php echo app('translator')->get('Support Ticket'); ?></a>
                        <ul class="primary-menu__sub">
                            <li class="primary-menu__sub-list">
                                <a class="t-link primary-menu__sub-link" href="<?php echo e(route('ticket.open')); ?>">
                                    <?php echo app('translator')->get('Open Now'); ?>
                                </a>
                            </li>
                            <li class="primary-menu__sub-list">
                                <a class="t-link primary-menu__sub-link" href="<?php echo e(route('ticket')); ?>">
                                    <?php echo app('translator')->get('All Tickets'); ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item primary-menu__list has-sub">
                        <a href="javascript:void(0)" class="primary-menu__link"><?php echo e(auth()->user()->username); ?></a>
                        <ul class="primary-menu__sub">
                            <li class="primary-menu__sub-list">
                                <a class="t-link primary-menu__sub-link" href="<?php echo e(route('user.transactions')); ?>">
                                    <?php echo app('translator')->get('Transactions'); ?>
                                </a>
                            </li>
                            <li class="primary-menu__sub-list">
                                <a class="t-link primary-menu__sub-link" href="<?php echo e(route('user.change.password')); ?>">
                                    <?php echo app('translator')->get('Change Password'); ?>
                                </a>
                            </li>
                            <li class="primary-menu__sub-list">
                                <a class="t-link primary-menu__sub-link" href="<?php echo e(route('user.profile.setting')); ?>">
                                    <?php echo app('translator')->get('Profile Setting'); ?>
                                </a>
                            </li>
                            <li class="primary-menu__sub-list">
                                <a class="t-link primary-menu__sub-link" href="<?php echo e(route('user.twofactor')); ?>">
                                    <?php echo app('translator')->get('2FA Security'); ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item pt-lg-0 pb-lg-0 pt-10 pb-10">
                        <div class="select-lang">
                            <select class="form-select langSel">
                                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->code); ?>"
                                            <?php if(session('lang') == $item->code): ?> selected <?php endif; ?>><?php echo e(__($item->name)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </li>
                    <li class="nav-item pt-lg-0 pb-lg-0 pt-10 pb-10">
                        <a href="<?php echo e(route('user.logout')); ?>" class="btn btn--md btn--base fixed-width"> <?php echo app('translator')->get('Logout'); ?>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Header End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/templates/basic/partials/user_header.blade.php ENDPATH**/ ?>