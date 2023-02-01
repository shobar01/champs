
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;

    }

    /* Center the image and position the close button */
    .img.container {
        text-align: center;
        margin: 0 0 24px 0;
        position: relative;
    }

    img.avatar {
        width: 30%;
        border-radius: 50%;
    }

    .swal-wide {
        /* width: 850px !important; */
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<nav class=" header  fixed-top" style="height: 30px !important; padding: 30px 0 30px 0 !important;">
    <div class="mx-auto my-2 order-0 order-md-1 position-relative">
        <img src="<?php echo e(asset('public/resource/img/logo.png')); ?>" class="img-circle avatar center  fixed-top"
            style="width: 100px; height: 100px;" />
    </div>
</nav>

<div class="container" style="padding-top: 100px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h5 class="my-0 font-weight-bold">Loncat Closing</h5>
            </div>

            <div class="card-body text-left">

                <form id="form_loncatcls" action="<?php echo e(route('loncat')); ?>" method="GET">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Outlet</label>

                        <input type="hidden" name="kdotl" id="kdotl" value="<?php echo e($kdotl); ?>">
                        <input type="hidden" name="stts_lonctcls" id="stts_lonctcls" value="<?php echo e($ssion_sttslonctcls); ?>">
                        <select class="form-control form-control-sm " name="toglekdotl" id="toglekdotl"
                            onchange="pilihkdotl()">
                            <?php $__currentLoopData = $dfotl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($otl['kdoutlet']); ?>" <?php if($kdotl==$otl['kdoutlet'] ): ?> selected <?php endif; ?>>
                                <?php echo e($otl['sngktotl']); ?> (<?php echo e($otl['kdoutlet']); ?>)
                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="noorder">Tanggal</label>

                        <input type="date" name="tgl" id="tgl" value="<?php echo e($tgl); ?>" class="form-control date_now"
                            style="font-size: 14px; color:black;" onchange="pilihkdotl()" required>
                        
                    </div>
                    <div class="form-group mt-5">
                        <button class="btn btn-success btn-lg col-md-3 ml-2 mt-1 float-right " type="button"
                            onclick="submitt()">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js">
</script>

<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
</script>

<script>
    function pilihkdotl(){ 
            var toglekdotl = $('#toglekdotl').val();
            $('#kdotl').val(toglekdotl);    
        } 

    function submitt(){ 
        Swal.fire({
            text: "Apakah anda yakin akan Merubahnya?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            customClass: 'swal-wide',
            cancelButtonText: "Tidak",
            confirmButtonText: 'Ya!' ,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed)
        { 
            event.preventDefault();   
            
            $('#stts_lonctcls').val('T');
            $('#form_loncatcls').submit() 
        }
    })
        
        } 
</script>

<?php if($ssion_sttslonctcls == 'T'): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!!',
        text: "Berhasil di Update",
        confirmButtonColor: '#28a745' 
    })  
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//loncatcls/loncatcls.blade.php ENDPATH**/ ?>