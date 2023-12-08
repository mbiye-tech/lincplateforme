<?php
if (request()->routeIs('home')) {
    $class = 'header--primary';
} else {
    $class = 'header--secondary';
}
$pages = App\Models\Page::where('tempname', $activeTemplate)
    ->where('is_default', 0)
    ->get();
?>
<!-- Header -->
<header class="header-fixed <?php echo e($class); ?>">

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <?php if($class == 'header--primary'): ?>
                <a href="<?php echo e(route('home')); ?>" class="logo logo-dark">
                    <img src="<?php echo e(getImage(getFilepath('logoIcon') . '/logo-dark.png')); ?>" alt="<?php echo e(__($general->site_name)); ?>" class="img-fluid logo__is" />
                </a>
            <?php endif; ?>

            <a href="<?php echo e(route('home')); ?>" class="logo logo-light">
                <img src="<?php echo e(getImage(getFilepath('logoIcon') . '/logo.png')); ?>" alt="<?php echo e(__($general->site_name)); ?>" class="img-fluid logo__is" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="menu-toggle"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-lg-0 align-items-lg-center mb-2">
                    <li class="nav-item">
                        <a href="<?php echo e(route('home')); ?>" class="primary-menu__link"><?php echo app('translator')->get('Home'); ?></a>
                    </li>
                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item"><a href="<?php echo e(route('pages', [$data->slug])); ?>"
                               class="primary-menu__link"><?php echo e(__($data->name)); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('blog')); ?>" class="primary-menu__link"><?php echo app('translator')->get('Blog'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('contact')); ?>" class="primary-menu__link"><?php echo app('translator')->get('Contact'); ?></a>
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
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item pt-lg-0 pb-lg-0 pt-10 pb-10">
                            <a href="<?php echo e(route('user.login')); ?>" class="btn btn--md btn--base fixed-width"> <?php echo app('translator')->get('Login'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item pt-lg-0 pb-lg-0 pt-10 pb-10">
                            <div class="d-flex align-items-center flex-wrap gap-3">
                                <a href="<?php echo e(route('user.home')); ?>" class="btn btn--md btn--base"> <?php echo app('translator')->get('Dashboard'); ?></a>
                                <a href="<?php echo e(route('user.logout')); ?>" class="btn btn--md btn--custom">
                                    <?php echo app('translator')->get('Logout'); ?>
                                </a>
                            </div>

                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Header End -->
<?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/partials/header.blade.php ENDPATH**/ ?>