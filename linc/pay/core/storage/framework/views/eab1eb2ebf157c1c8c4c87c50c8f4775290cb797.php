<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--md table-responsive">
                        <table class="table--light style--two table">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('S.N.'); ?></th>
                                    <th class="text-start"><?php echo app('translator')->get('Name'); ?></th>
                                    <th><?php echo app('translator')->get('Currency'); ?></th>
                                    <th><?php echo app('translator')->get('Rate'); ?></th>
                                    <th><?php echo app('translator')->get('Charge'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td data-label="<?php echo app('translator')->get('S.N.'); ?>"><?php echo e($countries->firstItem() + $loop->index); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Name'); ?>" class="text-start">
                                            <span class="user">
                                                <span class="thumb me-2">
                                                    <img src="<?php echo e(getImage(getFilePath('country') . '/' . $country->image, getFileSize('country'))); ?>" alt="image">
                                                </span>
                                                <?php echo e($country->name); ?>

                                            </span>
                                        </td>
                                        <td data-label="<?php echo app('translator')->get('Currency'); ?>"><?php echo e($country->currency); ?></td>
                                        <td data-label="<?php echo app('translator')->get('Rate'); ?>"> <?php echo e(currencyFormatter($country->rate)); ?> <?php echo e($country->currency); ?> / <?php echo e($general->cur_text); ?>

                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Charge'); ?>">
                                            <?php echo e(currencyFormatter($country->fixed_charge)); ?> <?php echo e($country->currency); ?> +
                                            <?php echo e(currencyFormatter($country->percent_charge)); ?>%
                                        </td>

                                        <td data-label="<?php echo app('translator')->get('Status'); ?>">
                                            <?php
                                                echo $country->statusBadge;
                                            ?>
                                        </td>

                                        <?php
                                            $country->rate = currencyFormatter($country->rate);
                                            $country->fixed_charge = currencyFormatter($country->fixed_charge);
                                            $country->percent_charge = currencyFormatter($country->percent_charge);
                                        ?>

                                        <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                            <button class="btn btn-sm btn-outline--primary cuModalBtn ml-1" data-modal_title="<?php echo app('translator')->get('Update Country'); ?>" data-resource="<?php echo e($country); ?>" data-has_status="true"><i class="las la-pen"></i>
                                                <?php echo app('translator')->get('Edit'); ?></button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="100%" class="text-center">
                                            <?php echo e(__($emptyMessage)); ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <?php if($countries->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($countries)); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div id="cuModal" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <form action="<?php echo e(route('admin.country.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Country'); ?> </label>
                                <select name="country_code" class="form-control select2-basic" required>
                                    <option value="" disabled><?php echo app('translator')->get('Select One'); ?></option>
                                    <?php $__currentLoopData = $countryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shortCode => $countryData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($shortCode); ?>" data-currency="<?php echo e($countryData->currency->code); ?>" <?php if(old('country_code') == $shortCode): ?> selected <?php endif; ?>><?php echo e($countryData->country); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Currency'); ?> </label>
                                <input type="text" class="form-control" name="currency" value="<?php echo e(old('currency')); ?>" readonly />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Image'); ?> </label>
                                <input type="file" class="form-control" name="image" accept=".png,.jpg,.jpeg" value="<?php echo e(old('image')); ?>" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Rate'); ?></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        1 <?php echo e($general->cur_text); ?> =
                                    </span>
                                    <input type="number" step="any" class="form-control" name="rate" value="<?php echo e(old('rate')); ?>" required />
                                    <span class="input-group-text currency">
                                        <?php echo e(old('currency')); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Fixed Charge'); ?> </label>
                                <div class="input-group">
                                    <input type="number" step="any" class="form-control" name="fixed_charge" value="<?php echo e(old('fixed_charge')); ?>" required />
                                    <span class="input-group-text currency">
                                        <?php echo e(old('currency')); ?>

                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Percent Charge'); ?> </label>
                                <div class="input-group">
                                    <input type="number" step="any" class="form-control" name="percent_charge" value="<?php echo e(old('percent_charge')); ?>" required />
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="status">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn--primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="top--control d-flex justify-content-end flex-wrap gap-2">
        <form action="" method="GET" class="float-sm-right">
            <div class="input-group">
                <input type="text" name="search" class="form-control bg--white" placeholder="<?php echo app('translator')->get('Name'); ?> / <?php echo app('translator')->get('Currency'); ?>" value="<?php echo e(request()->search ?? ''); ?>">
                <button type="submit" class="input-group-text btn--primary border-0 text-white"><i class="fa fa-search"></i></button>
            </div>
        </form>

        <button type="button" class="btn btn-sm btn-outline--primary cuModalBtn h-45" data-modal_title="<?php echo app('translator')->get('Add New Country'); ?>"><i class="las la-plus"></i><?php echo app('translator')->get('Add New'); ?></button>
    </div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";

            $('input[name=currency]').on('input', function() {
                $('.currency').text($(this).val());
            });

            $('.cuModalBtn').on('click', function() {
                var countryCode = '';

                if ($(this).data('resource')) {
                    countryCode = $(this).data('resource').country_code;
                    $('.currency').text($(this).data('resource').currency);
                }

                <?php if(!old('currency')): ?>
                    else {
                        $('.currency').text('');
                    }
                <?php endif; ?>

                $(".select2-basic").val(countryCode).select2({
                    dropdownParent: $('#cuModal')
                });
            });

            $('select[name=country_code]').on('change', function() {
                $('input[name=currency]').val($(this).find(':selected').data('currency'));
                $('.currency').text($(this).find(':selected').data('currency'));
            });

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u595814445/domains/linc.cd/public_html/platform/core/resources/views/admin/countries.blade.php ENDPATH**/ ?>