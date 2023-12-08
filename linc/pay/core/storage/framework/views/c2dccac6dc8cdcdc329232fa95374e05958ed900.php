<?php $__env->startSection('panel'); ?>
    <div class="row mb-none-30">
        <div class="col-md-12 mb-30">
            <div class="card bl--5-primary">
                <div class="card-body">
                    <p class="text--primary"><?php echo app('translator')->get('If the logo and favicon are not changed after you update from this page, please'); ?> <span class="text--danger"><?php echo app('translator')->get('clear the cache'); ?></span> <?php echo app('translator')->get('from your browser. As we keep the filename the same after the update, it may show the old image for the cache. usually, it works after clear the cache but if you still see the old logo or favicon, it may be caused by server level or network level caching. Please clear them too.'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <label class="mb-3 fw-bold"><?php echo app('translator')->get('Logo for White Background'); ?></label>
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview logoPicPrev" style="background-image: url(<?php echo e(getImage(getFilePath('logoIcon') . '/logo.png', '?' . time())); ?>)">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload m-0 p-0" id="profilePicUpload1" accept=".png, .jpg, .jpeg" name="logo">
                                            <label for="profilePicUpload1" class="bg--primary"><?php echo app('translator')->get('Upload'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <label class="mb-3 fw-bold"><?php echo app('translator')->get('Logo for Dark Background'); ?></label>
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview logoPicPrev bg--dark" style="background-image: url(<?php echo e(getImage(getFilePath('logoIcon') . '/logo-dark.png', '?' . time())); ?>)">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload m-0 p-0" id="profilePicUpload2" accept=".png, .jpg, .jpeg" name="logo_dark">
                                            <label for="profilePicUpload2" class="bg--primary"><?php echo app('translator')->get('Upload'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <label class="mb-3 fw-bold"><?php echo app('translator')->get('Favicon'); ?></label>
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview logoPicPrev" style="background-image: url(<?php echo e(getImage(getFilePath('logoIcon') . '/favicon.png', '?' . time())); ?>)">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload m-0 p-0" id="profilePicUpload3" accept=".png" name="favicon">
                                            <label for="profilePicUpload3" class="bg--primary"><?php echo app('translator')->get('Upload'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/pay/core/resources/views/admin/setting/logo_icon.blade.php ENDPATH**/ ?>