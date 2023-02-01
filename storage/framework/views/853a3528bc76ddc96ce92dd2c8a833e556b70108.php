
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
                <h5 class="my-0 font-weight-bold">Reedem and Check Voucher Sodexo</h5>
            </div>

            <div class="card-body text-left">

                <form id="send_akntg" action="<?php echo e(route('akunting_cekvoucher')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">

                        <input type="hidden" name="btnpilih" id="btnpilih" />
                        <input type="hidden" name="kdoutlet" id="kdoutlet" />
                        <label for="kdvocher">Kode Voucher</label>
                        <input type="text" class="form-control" id="kdvocher" name="kdvocher"
                            aria-describedby="emailHelp" placeholder="contoh : SX4BXXX1B5">

                    </div>
                    <div class="form-group">
                        <label for="akunting_outlet_select">Outlet</label>
                        <select class="form-control selectpicker" id="akunting_outlet_select" data-live-search="true"
                            required>

                            <?php $__currentLoopData = $alloutlet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrotl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($arrotl['KdOutlet']); ?>"><?php echo e($arrotl['NmOutlet']." (".$arrotl['KdOutlet'].")"); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="noorder">No Order</label>
                        <input type="text" class="form-control" id="noorder" name="noorder"
                            placeholder="contoh : BPB02-21072800002265">
                        <small class="form-text  text-danger">*untuk cek voucher tidak perlu input No
                            Order.</small>
                    </div>
                    <div class="form-group mt-5">
                        <button class="btn btn-warning btn-lg col-md-3 ml-2 mt-1 float-right " type="button"
                            onclick="btn_cek()">Cek</button>
                        <button class="btn btn-success btn-lg col-md-3 mt-1 float-right" type="button"
                            onclick="btn_reedem()">Reedem</button>
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

    function btn_cek(){
    var sValkdv = $("#kdvocher").val(); 
    var sValotl = $("#akunting_outlet_select option:selected").val();
            var sValnor = $("#noorder").val();
            var sValues = sValotl +"#"+sValkdv+"#"+sValnor;
            // alert(sValues);
            $('#loader').show();
            $('#kdoutlet').val(sValotl);
            $('#btnpilih').val('btncek');

        if (sValkdv == "") {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kode Voucher Tidak Boleh Kosong!',
                confirmButtonColor: '#3085d6' 
            })
            // alert('Tidak Boleh Kosong');
        } else {  
            $('#send_akntg').submit();
        }
         
   
    }
  function btn_reedem(){
    
var sValotl = $("#akunting_outlet_select option:selected").val();
    var sValkdv = $("#kdvocher").val();
    var sValnor = $("#noorder").val();
    var sValues = sValotl +"#"+sValkdv+"#"+sValnor;
    // alert(sValues);
    $('#loader').show();
    $('#kdoutlet').val(sValotl);
    $('#btnpilih').val('btnreedem');
if (sValnor == "") {
    $('#loader').hide();
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'NoOrder Tidak Boleh Kosong!',
    confirmButtonColor: '#3085d6'
    })
    // alert('Tidak Boleh Kosong');
    } else {
    $('#send_akntg').submit();
    }
}

</script>

<?php if(session('cek_sttus') == 'true'): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!!',
        text: "<?php echo e(session('cek_msg')); ?>",
        confirmButtonColor: '#28a745' 
    })
    $('#loader').hide();
</script>
<?php elseif(session('cek_sttus') == 'false'): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Opps!!',
        text: "<?php echo e(session('cek_msg')); ?>",
        confirmButtonColor: '#d33'
    })
    $('#loader').hide();
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//akunting/akunting.blade.php ENDPATH**/ ?>