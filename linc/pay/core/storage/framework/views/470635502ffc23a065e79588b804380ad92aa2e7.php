<div class="d-sidebar h-100 rounded">
    <button class="sidebar-close-btn bg--base text-white"><i class="las la-times"></i></button>

    <div class="sidebar-menu-wrapper" id="sidebar-menu-wrapper">
        <ul class="sidebar-menu">
            <li class="sidebar-menu__header"><?php echo app('translator')->get('Main'); ?></li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.dashboard')); ?>">
                <a href="<?php echo e(route('agent.dashboard')); ?>" class="sidebar-menu__link">
                    <i class="lab la-buffer"></i>
                    <?php echo app('translator')->get(' Dashboard'); ?>
                </a>
            </li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.transaction.history')); ?>">
                <a href="<?php echo e(route('agent.transaction.history')); ?>" class="sidebar-menu__link">
                    <i class="la la-exchange"></i>
                    <?php echo app('translator')->get('Transaction History'); ?>
                </a>
            </li>

            <li class="sidebar-menu__header"><?php echo app('translator')->get('Payout'); ?></li>
            <li class="sidebar-menu__item <?php echo e(menuActive(['agent.payout', 'agent.payout.info'])); ?>">
                <a href="<?php echo e(route('agent.payout')); ?>" class="sidebar-menu__link">
                    <i class="las la-money-check"></i>
                    <?php echo app('translator')->get('Payout Now'); ?>
                </a>
            </li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.payout.history')); ?>">
                <a href="<?php echo e(route('agent.payout.history')); ?>" class="sidebar-menu__link">
                    <i class="las la-file-invoice-dollar"></i>
                    <?php echo app('translator')->get('Payout History'); ?>
                </a>
            </li>

            <li class="sidebar-menu__header"><?php echo app('translator')->get('Send Money'); ?></li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.send.money')); ?>">
                <a href="<?php echo e(route('agent.send.money')); ?>" class="sidebar-menu__link">
                    <i class="la la-comment-dollar"></i>
                    <?php echo app('translator')->get('Send Now'); ?>
                </a>
            </li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.transfer.history')); ?>">
                <a href="<?php echo e(route('agent.transfer.history')); ?>" class="sidebar-menu__link">
                    <i class="lab la-buffer"></i>
                    <?php echo app('translator')->get('History'); ?>
                </a>
            </li>


            <li class="sidebar-menu__header"><?php echo app('translator')->get('Deposit'); ?></li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.deposit')); ?>">
                <a href="<?php echo e(route('agent.deposit')); ?>" class="sidebar-menu__link">
                    <i class="las la-wallet"></i>
                    <?php echo app('translator')->get('Add Money'); ?>
                </a>
            </li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.deposit.history')); ?>">
                <a href="<?php echo e(route('agent.deposit.history')); ?>" class="sidebar-menu__link">
                    <i class="las la-store"></i>
                    <?php echo app('translator')->get('History'); ?>
                </a>
            </li>

            <li class="sidebar-menu__header"><?php echo app('translator')->get('Withdraw'); ?></li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.withdraw')); ?>">
                <a href="<?php echo e(route('agent.withdraw')); ?>" class="sidebar-menu__link">
                    <i class="las la-university"></i>
                    <?php echo app('translator')->get('Withdraw Money'); ?>
                </a>
            </li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.withdraw.history')); ?>">
                <a href="<?php echo e(route('agent.withdraw.history')); ?>" class="sidebar-menu__link">
                    <i class="las la-clipboard"></i>
                    <?php echo app('translator')->get('History'); ?>
                </a>
            </li>

            <li class="sidebar-menu__header"><?php echo app('translator')->get('Settings'); ?></li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.profile.setting')); ?>">
                <a href="<?php echo e(route('agent.profile.setting')); ?>" class="sidebar-menu__link">
                    <i class="las la-user"></i>
                    <?php echo app('translator')->get('Profile Setting'); ?>
                </a>
            </li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.change.password')); ?>">
                <a href="<?php echo e(route('agent.change.password')); ?>" class="sidebar-menu__link">
                    <i class="las la-cogs"></i>
                    <?php echo app('translator')->get('Password Setting'); ?>
                </a>
            </li>
            <li class="sidebar-menu__item <?php echo e(menuActive('agent.twofactor')); ?>">
                <a href="<?php echo e(route('agent.twofactor')); ?>" class="sidebar-menu__link">
                    <i class="las la-key"></i>
                    <?php echo app('translator')->get('2FA Security'); ?>
                </a>
            </li>

            <li class="sidebar-menu__item">
                <a href="<?php echo e(route('agent.logout')); ?>" class="sidebar-menu__link">
                    <i class="las la-sign-out-alt"></i>
                    <?php echo app('translator')->get('Logout'); ?>
                </a>
            </li>
        </ul><!-- sidebar-menu end -->
    </div>
</div>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';
        (function($) {
            const sidebar = document.querySelector('.d-sidebar');
            const sidebarOpenBtn = document.querySelector('.sidebar-open-btn');
            const sidebarCloseBtn = document.querySelector('.sidebar-close-btn');

            sidebarOpenBtn.addEventListener('click', function() {
                sidebar.classList.add('active');
            });
            sidebarCloseBtn.addEventListener('click', function() {
                sidebar.classList.remove('active');
            });


            $(function() {
                $('#sidebar-menu-wrapper').slimScroll({
                    // height: 'calc(100vh - 52px)'
                    height: '100vh'
                });
            });

            $('.sidebar-dropdown > a').on('click', function() {
                if ($(this).parent().find('.sidebar-submenu').length) {
                    if ($(this).parent().find('.sidebar-submenu').first().is(':visible')) {
                        $(this).find('.side-menu__sub-icon').removeClass('transform rotate-180');
                        $(this).removeClass('side-menu--open');
                        $(this).parent().find('.sidebar-submenu').first().slideUp({
                            done: function done() {
                                $(this).removeClass('sidebar-submenu__open');
                            }
                        });
                    } else {
                        $(this).find('.side-menu__sub-icon').addClass('transform rotate-180');
                        $(this).addClass('side-menu--open');
                        $(this).parent().find('.sidebar-submenu').first().slideDown({
                            done: function done() {
                                $(this).addClass('sidebar-submenu__open');
                            }
                        });
                    }
                }
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/agent/partials/sidenav.blade.php ENDPATH**/ ?>