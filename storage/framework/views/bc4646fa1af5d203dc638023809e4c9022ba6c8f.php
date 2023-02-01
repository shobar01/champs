
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>

<div class="container" style="padding-top: 100px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Presence</h4>
            </div>
            <div class="card-body">

                <form id="send_periode" class="" action="<?php echo e(route('presence_periode')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" class="" name="perid_bln" id="perid_bln" />
                    <input type="hidden" class="" name="perid_thn" id="perid_thn" />
                    <div class="row">
                        <div class="col-5 " style="padding-right : 0px; !important">
                            <select class="form-control form-control-sm " id="bln_select">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-3" style="padding-right : 0px; !important">
                            <select class="form-control form-control-sm " id="thn_select">
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                        <div class="col-4 justify-content-end d-flex">
                            <button class="btn btn-success btn-sm btn-block" type="submit"
                                onclick="periode()">Periode</button>
                        </div>
                    </div>
                    
                    <div class="fw-container" style="margin-top: 1%;">
                        <div class="fw-body">
                            <div class="content">
                                <div class="input-group mb-3">
                                    <input id="search_absen" type="text" class="form-control" placeholder="Searching"
                                        aria-label="Search" aria-describedby="basic-addon2">
                                </div>

                                <table id="tb_presence" class="display nowrap " style="width:100%; ">
                                    <thead>
                                        
                                        <tr>
                                            <th style="border-top: 1px solid #111 !important;">No.</th>
                                            <th style="border-top: 1px solid #111 !important;">Tanggal</th>
                                            <th style="border-top: 1px solid #111 !important;">Hadir</th>
                                            <th style="border-top: 1px solid #111 !important;">Istirahat</th>
                                            <th style="border-top: 1px solid #111 !important;">Lokasi</th>
                                            <th style="border-top: 1px solid #111 !important;">Durasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no2 = 1; ?>
                                        <?php $__currentLoopData = $absensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arryabsensi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo $no2; ?></td>
                                            <td><?php echo e($arryabsensi['tgl']); ?></td>
                                            <td><?php echo e($arryabsensi['hdr']); ?> </td>
                                            <td><?php echo e($arryabsensi['istrht']); ?> </td>
                                            <td><?php echo e($arryabsensi['otl']); ?> </td>
                                            <td><?php echo e($arryabsensi['dur1']); ?> </td>
                                        </tr>
                                        <?php $no2++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tfoot>
                                        <tr>
                                            <th style="border-bottom: 1px solid #111 !important;">No.</th>
                                            <th style="border-bottom: 1px solid #111 !important;">Tanggal</th>
                                            <th style="border-bottom: 1px solid #111 !important;">Hadir</th>
                                            <th style="border-bottom: 1px solid #111 !important;">Istirahat</th>
                                            <th style="border-bottom: 1px solid #111 !important;">Lokasi</th>
                                            <th style="border-bottom: 1px solid #111 !important;">Durasi</th>
                                        </tr>
                                    </tfoot>
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
    $("#bln_select option[value='<?php echo e(session('blncm')); ?>']").attr("selected", "selected"); 
    $("#thn_select option[value='<?php echo e(session('thncm')); ?>']").attr("selected", "selected");
    // $("div.bln_select select").val("09").change();
    function showmodal_done() {
    $('#modal_baking').modal('show');
    }
    function periode(){
    var sValbln = $("#bln_select option:selected").val(); 
    var sValthn = $("#thn_select option:selected").val();
    var sValues = sValbln +"#"+sValthn;  
    $('#loader').show();   
    
        $('#perid_bln').val(sValbln);
        $('#perid_thn').val(sValthn);
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
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//presence/presence.blade.php ENDPATH**/ ?>