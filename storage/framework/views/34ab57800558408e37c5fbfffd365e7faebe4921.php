
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('modal.m_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<div class="container" style="padding-top: 100px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Master</h4>
            </div>
            <div class="card-body">

                <div class="fw-container">

                    <div class="fw-body">

                        <div class="content">
                            <div class="input-group mb-3">
                                <input id="myCustomSearchBox" type="text" class="form-control" placeholder="Searching"
                                    aria-label="Search Anything here" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button onclick="document.getElementById('dpassword').style.display='block'"
                                        class="btn btn-success" type="button">Reset
                                        Password</button>
                                </div>
                            </div>

                            <table id="tb_master" class="display nowrap " style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="border-top: 1px solid #111 !important;">No.</th>
                                        <th style="border-top: 1px solid #111 !important;">Name</th>
                                        <th style="border-top: 1px solid #111 !important;">NIP</th>
                                        <!--                    <th>Imie</th>-->
                                        <th style="border-top: 1px solid #111 !important;">Model</th>
                                        <th style="border-top: 1px solid #111 !important;">status</th>
                                        <th style="border-top: 1px solid #111 !important;">Date</th>
                                        <th style="border-top: 1px solid #111 !important;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no2 = 1; ?>
                                    <?php $__currentLoopData = $dfrgnti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrygnti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td><?php echo $no2; ?></td>
                                        <td class="text-left"><?php echo e(Str::substr($arrygnti['nm_lengkap'],0,15)); ?> </td>
                                        <td><?php echo e($arrygnti['nip']); ?></td>
                                        <td><?php echo e($arrygnti['bfnmdvc']); ?>

                                        </td>
                                        <td><?php echo e($arrygnti['ket']); ?>

                                        </td>
                                        <td><?php echo e($arrygnti['wktreq']); ?>

                                        </td>
                                        <td><a class='btn btn-sm btn-primary ' title='Approve'><i class='fa fa-pencil'
                                                    style='color: #fff '
                                                    onclick="diklik('<?php echo e($no2); ?>#<?php echo e($arrygnti['nm_lengkap']); ?>#<?php echo e($arrygnti['nip']); ?>#<?php echo e($arrygnti['bfnmdvc']); ?>#<?php echo e($arrygnti['bfiddvc']); ?>#<?php echo e($arrygnti['xcount']); ?>')"></i></a>
                                        </td>
                                    </tr>
                                    <?php $no2++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- custom -->



<script>
    function showmodal_done() { 
    $('#modal_baking').modal('show'); 
} 
</script>

<script>
    function diklik(isi) { 
        
        $('#modal_inptqty').modal('show');
        document.getElementById('modl_imei').style.display = 'block'; 
        var data = isi.split('#');
        var no = data[0];
        var nma = data[1];
        var nip = data[2];
        var nmd = data[3];
        var mei = data[4]; 
        var con = data[5]; 
        $('#a_id').val(no);
        $('#a_nm').val(nma); 
        $('#a_nip').val(nip); 
        $('#a_dvchp').val(nmd);
        $('#a_dvcimei').val(mei); 
        $('#a_con').val(con);
        document.getElementById("isi_modal").innerHTML = "Apakah anda yakin akan merubah perangkat, " + nma + " (" + nmd + ") ?";
        // When the user clicks anywhere outside of the modal, close it


    }
 
</script>
<?php if(session('jsuccess') == '1'): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "<?php echo e(session('jmessage')); ?>",
        confirmButtonColor: '#3085d6' 
    })
    $('#loader').hide();
</script>
<?php elseif(session('jsuccess') == '0'): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Opps!!',
        text: "<?php echo e(session('jmessage')); ?>",
        confirmButtonColor: '#d33'
    })
    $('#loader').hide();
</script>
<?php endif; ?>

<?php if(session('stt') == '1'): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "<?php echo e(session('msg')); ?>" ,
        confirmButtonColor: '#3085d6' 
    })
    $('#loader').hide();
</script>
<?php elseif(session('stt') == '0'): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Opps!!',
        text: "<?php echo e(session('msg')); ?>" ,
        confirmButtonColor: '#d33'
    })
    $('#loader').hide();
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//master/master.blade.php ENDPATH**/ ?>