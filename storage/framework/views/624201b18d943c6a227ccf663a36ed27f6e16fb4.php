
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia');?>
<?php $__env->startSection('content');?>
<link href="<?php echo e(asset('public/resource/css/style_viewcogs.css')); ?>" rel="stylesheet" type="text/css">

<style>
    .icon {
        width: 50px;
        height: 50px;
        background-color: #eee;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 39px
    }

    .iconarrow {

        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px
    }

    .badgekuning {
        background-color: #FEBD01;
        /* width: 60px; */
        height: 20px;
        border-radius: 5px;
        padding-left: 2px;
        padding-right: 2px;
        display: flex;
        color: #000;
        font-size: 10px !important;
        font-weight: 200;
        justify-content: center;
        align-items: center
    }

    .badgered {
        background-color: #cc1a0b;
        /* width: 60px; */
        height: 20px;
        padding-bottom: 3px;
        border-radius: 5px;
        padding-left: 2px;
        padding-right: 2px;
        display: flex;
        color: #ffffff;
        font-size: 10px !important;
        font-weight: 200;
        justify-content: center;
        align-items: center
    }

    .tx16 {
        font-size: 16px;
        font-weight: 600
    }

    .tx12 {
        font-size: 12px;
        font-weight: 600
    }

    .text2 {
        color: #a5aec0
    }

    .card {
        /* border: none; */
        border-radius: 10px
    }

    .btn-danger {
        color: #fff !important;
        background-color: #cc1a0b !important;
        border-color: #cc1a0b !important;
    }
</style>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>



<div class="container" style="padding-top: 70px; padding-right: 10px; padding-left: 10px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header px-2 py-2">
                <a class="my-0 font-weight-bold" style="font-size: 12px;">Detail Pengalaman</a>
            </div>
            <div class="card-body" style=" height:500px;padding: 5px 5px 10px 5px !important;">

                <?php if ($df_succes == '1'): ?>

                <ul style="overflow-x: hidden; height: 480px; list-style-type: none; padding: 5px;">
                    <?php $__currentLoopData = $df_pnglmn;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $dfdet): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                    <li class="shadow p-1 mb-1 bg-white rounded"
	                        onclick="btn_dfpnglmn('<?php echo e($dfdet['kdupdpeg']); ?>#<?php echo e($dfdet['nm_perusahaan']); ?>#<?php echo e($dfdet['jabatan']); ?>#<?php echo e($dfdet['alm_perusahaan']); ?>#<?php echo e($dfdet['alasan']); ?>#<?php echo e($dfdet['gaji']); ?>#<?php echo e($dfdet['masa_kerja']); ?>#<?php echo e($dfdet['is_proses']); ?>#<?php echo e($dfdet['is_approve']); ?>#<?php echo e($dfdet['ket_hrd']); ?>#<?php echo e($dfdet['updated_by']); ?>#<?php echo e($dfdet['sttus']); ?>')">

	                        <div class="card p-2 mb-2">
	                            <div class="d-flex justify-content-between">
	                                <div class="d-flex flex-row align-items-center">
	                                    <div class="icon"> <img src="<?php echo e(asset('public/resource/img/hris/pengalaman.png')); ?>"
	                                            class="img-circle avatar center" style="width: 50px; height: 50px;" /></div>
	                                    <div class="text-left col">
	                                        <h3 class="mb-0"><?php echo e($dfdet['nm_perusahaan']); ?></h3>
	                                        <span><?php echo e($dfdet['jabatan']); ?></span>
	                                    </div>
	                                </div>
	                                <?php if ($dfdet['kdupdpeg'] != null): ?>
	                                <div
	                                    class="<?php if ($dfdet['is_proses'] == 'T' && $dfdet['is_approve'] == 'F'): ?> badgered <?php else: ?> badgekuning <?php endif;?>">
                                    <span><?php echo e($dfdet['sttus']); ?></span>
                                </div>
                                <?php endif;?>
                            </div>

                            <div class="text-left">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="" id="basic-addon3"
                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                style="font-size: 12px; color:black; ">Gaji</a>
                                        </span>
                                    </div>
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                        Rp. <?php echo e(number_format($dfdet['gaji'], 0, '', '.')); ?></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-left col">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="" id="basic-addon3"
                                                style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                    style="font-size: 12px; color:black; ">Kota</a>
                                            </span>
                                        </div>
                                        <a style="font-size: 12px; color:black; min-width: 90px;"> :
                                            <?php echo e($dfdet['alm_perusahaan']); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="" id="basic-addon3"
                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                style="font-size: 12px; color:black; ">Masa Kerja</a>
                                        </span>
                                    </div>
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                        <?php echo e($dfdet['masa_kerja']); ?></a>
                                </div>
                            </div>
                            <div class="text-left">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="" id="basic-addon3"
                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                style="font-size: 12px; color:black; ">Alasan Keluar</a>
                                        </span>
                                    </div>
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                        <?php echo e($dfdet['alasan']); ?></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>
                    <?php else: ?>
                    <div class="text-center ">
                        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_evqse4gh.json"
                            background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 420px;" loop
                            autoplay>
                        </lottie-player>
                         <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                    </div>
                </ul>
                <?php endif;?>
            </div>
        </div>

    </div>
</div>
<div class="fixed-plugin" onclick="btn_tmbhpnglmn()">
    <a class="fixed-plugin-button text-white position-fixed px-3 py-2">
        <i class="material-icons py-2 fas fa fa-plus"></i>

    </a>
</div>

<?php echo $__env->make('hris.modal.mdl_pengalman', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('hris.modal.mdl_waiting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
    function btn_tmbhpnglmn(){

    $('#tx_tittlepnlmn').val('Tambah');
    $('#tx_tittlepnlmn').html('Tambah Pengalaman');
      document.getElementById('mdl_tmbhpenglmn').style.display='block';
    }
    function btn_dfpnglmn(isi){
        //kdupdpeg,nm_perusahaan,jabatan,alm_perusahaan,alasan,gaji,masa_kerja,is_proses,is_approve,ket_hrd,updated_by,sttus
        var dataa       = isi.split('#');
        var kdpegwi     = dataa[0];
        var nmptpt      = dataa[1];
        var jabtan      = dataa[2];
        var almtpt      = dataa[3];
        var alasan      = dataa[4];
        var gaji        = dataa[5];
        var mskerja     = dataa[6];
        var ispross     = dataa[7];
        var isapprv     = dataa[8];
        var kethrdd     = dataa[9];
        var updetby     = dataa[10];
        var statuss     = dataa[11];
        if(kdpegwi == ''){

        //tx_pnglmnpt,tx_pnglmnjbtn,tx_pnglmnmskerja,tx_pnglmngji,tx_pnglmnalmtprshan,tx_pnglmnalsn



            $('#tx_pnglmnpt').val(nmptpt);
            $('#tx_pnglmnjbtn').val(jabtan);
            $('#tx_pnglmnmskerja').val(mskerja);
            $('#tx_pnglmngji').val(gaji);
            $('#tx_pnglmnalmtprshan').val(almtpt);
            $('#tx_pnglmnalsn').val(alasan);

            $('#tx_pnglmnpt1').val(nmptpt);
            $('#tx_pnglmnjbtn1').val(jabtan);
            $('#tx_pnglmnmskerja1').val(mskerja);
            $('#tx_pnglmngji1').val(gaji);
            $('#tx_pnglmnalmtprshan1').val(almtpt);
            $('#tx_pnglmnalsn1').val(alasan);

            $('#tx_tittlepnlmn').val('Update');
            $('#tx_tittlepnlmn').html('Update Pengalaman');
            // document.getElementById("tx_tngktpddkn").disabled = true;
            // $('.selectpicker').selectpicker('refresh');
            document.getElementById('mdl_tmbhpenglmn').style.display='block';
        }
        if(ispross == 'F' && isapprv=='F' ){
            $('#pddkn_kdupdpeg').val(kdpegwi);
            $('#pddkn_url').val('<?php echo e(url("btlknpendidikan")); ?>');
            $('#pddkn_type').val('Pengalaman');
            $('#pddkn_dbtype').val('tmp_pengalaman');
            // $('#pddkn_url').val('<?php echo e(url("btlknpendidikan")); ?>');
            document.getElementById('mdl_waiting').style.display='block';
            // alert('menunggu proses bisa dibatalkan');
        }
        if(ispross == 'T' && isapprv=='F' ){
            alert(statuss+' oleh '+updetby+' : '+kethrdd);
        }
    }
</script>
<?php $__env->stopSection();?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/hris/pengalaman.blade.php ENDPATH**/?>