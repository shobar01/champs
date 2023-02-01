
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>





<div class="container" style="padding: 100px 0 0 0;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal" style="font-size: 14px;"><b>View SOP PDF</b></h4>
            </div>
            <div class="card-body">
                
                    <div class="fw-container" style="margin-top: 1%;">
                        <div class="fw-body">
                            <div class="content">
                                
                                <div class="input-group mb-3">
                                    <input id="search_cogs" type="text" class="form-control" placeholder="Searching"
                                        aria-label="Search" aria-describedby="basic-addon2">
                                </div>

                                <ul id="table-card"
                                    style="overflow-x: hidden; height: 450px; list-style-type: none; padding: 5px;">
                                    <?php $__currentLoopData = $datta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $df): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="shadow p-2 mb-3 bg-white rounded"
                                        style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important;">
                                        <div class="input-group" id="aa'+i+'">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a
                                                        style="font-size: 12px; color:black; ">
                                                        <b><?php echo e(str_replace('/soppdf/','',str_replace('.pdf','',$df))); ?></b>
                                                    </a>
                                                </span>
                                            </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script>
        $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
    </script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//vsop/vsop.blade.php ENDPATH**/ ?>