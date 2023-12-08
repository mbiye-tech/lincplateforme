<?php $__env->startSection('content'); ?>
    <div class="section section--sm">
        <div class="container">
            <div class="card custom--card">
                <div class="card-header">
                    <h5 class="card-title">
                        <?php echo e(__($pageTitle)); ?>

                    </h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('ticket.store')); ?>" method="post" enctype="multipart/form-data" onsubmit="return submitUserForm();">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="name" value="<?php echo e(@$user->firstname . ' ' . @$user->lastname); ?>">
                        <input type="hidden" name="email" value="<?php echo e(@$user->email); ?>">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="text--accent sm-text d-block mb-2 fw-md" for="website"><?php echo app('translator')->get('Subject'); ?></label>
                                <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" class="form-control form--control ">
                            </div>
                            <div class="col-md-4">
                                <label class="text--accent sm-text d-block mb-2 fw-md" for="priority"><?php echo app('translator')->get('Priority'); ?></label>
                                <div class="form--select-light">
                                    <select name="priority" class="form-select form--select ">
                                        <option value="3"><?php echo app('translator')->get('High'); ?></option>
                                        <option value="2"><?php echo app('translator')->get('Medium'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('Low'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="text--accent sm-text d-block mb-2 fw-md" for="inputMessage"><?php echo app('translator')->get('Message'); ?></label>
                                <textarea name="message" id="inputMessage" rows="6" class="form-control form--control-textarea " required><?php echo e(old('message')); ?></textarea>
                            </div>

                            <div class="col-12">
                                <div class="support-upload-field mb-3 gy-3 row">
                                    <label class="text--accent sm-text d-block  fw-md"><?php echo app('translator')->get('Attachments:'); ?> <small class="text-danger"><?php echo app('translator')->get('Max 5 files can be uploaded'); ?>. <?php echo app('translator')->get('Maximum upload size is'); ?> <?php echo e(ini_get('upload_max_filesize')); ?></small></label>
                                    <div class="col-md-11">
                                        <input type="file" name="attachments[]" class="form-control form--control" accept=".jpg, .jpeg, .png, .pdf, .doc, .docx" />
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn--base btn--xl w-100 addBtn"><i class="las la-plus"></i></button>
                                    </div>
                                </div>
                                <div id="file-upload-list"></div>
                                <div class="text--accent sm-text d-block mb-2 fw-md form-text text-muted"><?php echo app('translator')->get('Allowed File Extensions'); ?>: .<?php echo app('translator')->get('jpg'); ?>, .<?php echo app('translator')->get('jpeg'); ?>, .<?php echo app('translator')->get('png'); ?>, .<?php echo app('translator')->get('pdf'); ?>, .<?php echo app('translator')->get('doc'); ?>, .<?php echo app('translator')->get('docx'); ?></div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn--base btn--xl w-100" type="submit" id="recaptcha"><i class="fa fa-paper-plane"></i>&nbsp;<?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('#file-upload-list').on('click', '.removeBtn', function() {
                $(this).parent('.input-group').remove();
            });

            $('.addBtn').on('click', function() {
                $('#file-upload-list').append(`
                    <div class="input-group mb-3">
                        <input type="file" name="attachments[]" class="form-control form--control" accept=".jpg, .jpeg, .png, .pdf, .doc, .docx"  />
                        <button type="button" class="input-group-text btn btn--danger removeBtn"><i class="las la-times"></i></button>
                    </div>
                `);
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/templates/basic/user/support/create.blade.php ENDPATH**/ ?>