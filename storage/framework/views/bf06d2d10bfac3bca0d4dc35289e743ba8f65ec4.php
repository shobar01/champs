
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
        <img src="<?php echo e(asset('resource/img/logo.png')); ?>" class="img-circle avatar center  fixed-top"
            style="width: 100px; height: 100px;" />
    </div>
</nav>

<div class="container" style="padding-top: 100px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h5 class="my-0 font-weight-bold">Compare Monsieur Spoon</h5>
            </div>

            <div class="card-body text-left">

                <form id="send_cmpare" action="<?php echo e(route('mscompare_cek')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" name="tanggal1" id="tanggal1" />
                        <input type="hidden" name="kdoutlet" id="kdoutlet" />
                        <label for="compare_outlet_select">Outlet</label>
                        <select class="form-control selectpicker" id="compare_outlet_select" data-live-search="true"
                            required>

                            <?php $__currentLoopData = $otlms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrotl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($arrotl['kdoutlet']); ?>"><?php echo e($arrotl['nmoutlet']." (".$arrotl['kdoutlet'].")"); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control date_now" required>
                        
                    </div>
                    <div class="form-group mt-5">
                        <button class="btn btn-warning btn-lg col-md-3 ml-2 mt-1 float-right"
                            style="color : white !important;" type="button" onclick="btn_cekcompare()">Cek</button>
                        <button class="btn btn-success btn-lg col-md-3 mt-1 float-right" type="button"
                            onclick="btn_rerap()">Re-Rekap</button>
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

function btn_cekcompare(){
        var sValtgl = $("#tanggal").val();
        var sValotl = $("#compare_outlet_select option:selected").val();
        
        // alert(sValues);
        $('#loader').show();
        $('#kdoutlet').val(sValotl);
        $('#tanggal1').val(sValtgl);
        
        if (sValtgl == "") {
        $('#loader').hide();
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Anda harus memilih tanggal terlebih dahulu!',
        confirmButtonColor: '#3085d6'
        })
        // alert('Tidak Boleh Kosong');
        } else {
        $('#send_cmpare').submit();
        }
        }

</script>
<?php if(session('blmmasuk') == null && (session('rowdet'))): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Semua Jualdet (<?php echo e(session('kdoutlet')); ?>) tersyncron !!',
        text: "Jumlah Row Jualdet <?php echo e(session('rowdet')); ?>",
        confirmButtonColor: '#28a745' 
    })
    $('#loader').hide();
</script>
<?php elseif(session('blmmasuk')): ?>

<?php echo $__env->make('mscompare.m_cekcompare', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    // function showmodal_compare() {
    $('#modal_compare').modal('show');
    // }
    /* Swal.fire({
        icon: 'error',
        title: 'ada yang belum tersycn!!',
        text: "<?php echo e(session('cek_msg')); ?>",
        confirmButtonColor: '#d33'
    }) */
    $('#loader').hide();
</script>
<?php elseif((session('blmmasuk') == null) && (session('rowdet') == "0") ): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Data (<?php echo e(session('kdoutlet')); ?>) belum tersedia!!',
        text: "<?php echo e(session('cek_msg')); ?>",
        confirmButtonColor: '#d33'
    })
    $('#loader').hide();
</script>
<?php elseif(session('rowres')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data Berhasil tersyncron!!',
        text: "Jumlah data yang di sycncron <?php echo e(session('rowres')); ?>",
        confirmButtonColor: '#28a745'
    })
    $('#loader').hide();
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//mscompare/mscompare.blade.php ENDPATH**/ ?>