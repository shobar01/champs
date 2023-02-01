
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.'); ?>
<?php $__env->startSection('content'); ?>
<style>
    .user {
        display: flex;
        margin-top: auto;
        min-width: 100%;
    }

    .user img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

    .user-info h5 {
        margin: 0;
    }

    .user-info small {
        color: #545d7a;
    }

    .btn {
        font-size: 0.8rem !important;
    }

    .buttonoff:hover {
        background-color: green;
    }

    .buttonon {
        /* background-image: url('resource/img/mejaon.png'); */
        background-size: cover;
        background-color: transparent;
        width: 90px;
        height: 90px;
        font-size: 1.5rem;
        font-weight: bold;
        color: #000;
        border: none;
        margin: 0 10px;
    }

    .buttonon:hover {
        background-color: #000;
        border-radius: 50%;
    }

    .btn-circle.btn-xl {
        width: 100px;
        height: 100px;
        padding: 13px 18px;
        border-radius: 60px;
        font-size: 15px;
        text-align: center;
    }

    .br {
        display: block;
        margin-bottom: 0em;
    }

    .brmedium {
        display: block;
        margin-bottom: 1em;
    }

    .brlarge {
        display: block;
        margin-bottom: 2em;
    }

    .brxsmall {
        display: block;
        margin-bottom: -.4em;
    }

    .user {
        display: flex;
        margin-top: auto;
        min-width: 100%;
    }

    .user img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

    .user-info h5 {
        margin: 0;
    }

    .user-info small {
        color: #545d7a;
    }

    .form-control {
        font-size: 0.7rem !important;
    }
</style>


<div class="container">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header px-2 py-2">
                <h4 class="my-0 font-weight-bold" style="font-size: 12px;">Activity <?php if($jmlactivty != '0'): ?>
                    <?php echo e($kdactivity); ?> <?php endif; ?></h4>
            </div>
            <div class="card-body" style="padding: 5px 5px 10px 5px !important;">
                <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">
                            <div class="col-md-12" style="padding : 0;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text form-control-sm" id="basic-addon3"
                                            style="font-size: 12px; background:#cc1a0b; color:white; min-width: 80px;  font-weight: bold; ">Nama
                                        </span>
                                    </div>
                                    <input type="text" name="spin_tglmnkh" id="spin_tglmnkh"
                                        value="<?php echo e($dfuser[0]['nm_lengkap']); ?>" class="form-control form-control-sm"
                                        style="font-size: 12px; color:black;  font-weight: bold;" disabled>
                                </div>

                                <form id="send_activitytgl" class="" action=" " method="GET">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" name="kdakses" id="kdakses" value="<?php echo e($kdakses); ?>">
                                    <input type="hidden" name="nip" id="nip" value="<?php echo e($nip); ?>">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control-sm" id="basic-addon3"
                                                style="font-size: 12px; background:#cc1a0b; color:white; min-width: 80px;  font-weight: bold; ">Tanggal
                                            </span>
                                        </div>
                                        <input type="date" name="spin_tglactivty" id="spin_tglactivty" value="<?php echo e($ttgl); ?>"
                                            class="form-control form-control-sm"
                                            style="font-size: 12px; color:black;  font-weight: bold;"
                                            max="<?php echo e($date_max); ?>" min="<?php echo e($date_min); ?>" onchange="tgl_activty()">
                                    </div>

                                </form>
                            </div>

                            <?php if($jmlactivty == '0'): ?>
                            <div class="text-center ">
                                <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>"
                                    background="transparent" speed="1"
                                    style="margin: 0 auto; width: 300px; height: 420px;" loop autoplay>
                                </lottie-player>
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                            </div>
                            <?php else: ?>
                            <ul style="overflow-x: hidden; height: 435px; list-style-type: none; padding: 5px;">
                                <?php $__currentLoopData = $dfactivtydet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="shadow p-1 mb-1 bg-white rounded" <?php if($tglnow=='T' ): ?>
                                    onclick="btn_det('<?php echo e($dfdet['urutan']); ?>#<?php echo e($dfdet['detactivity']); ?>#<?php echo e($dfdet['nmlok']); ?>#<?php echo e($dfdet['jammulai']); ?>#<?php echo e($dfdet['jamselesai']); ?>#<?php echo e($dfdet['lokasi']); ?>') "
                                    <?php endif; ?>>
                                    <div class="col-md-12" style="padding: 0px  0px  0px  0px !important;">
                                        <div class=""
                                            style="background-color: #FFFFFF !important; border-radius: 5px !important; padding: 5px 5px 5px 5px !important;">
                                            <div class="user">

                                                <div class="user-info" style="padding-left: 5px; min-width: 100%;">
                                                    <div class="input-group input-group-sm ">
                                                        <span class=" " id="basic-addon3"
                                                            style="color:black;min-width: 100%; margin: 0px 10px 0px 0px;   font-size: 12px;  ">
                                                            <?php echo e($dfdet['detactivity']); ?>

                                                        </span>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col" style="padding: 0 5px 0 10px !important;">
                                                            <span class="text-left col" id="basic-addon3"
                                                                style="height: 12px; color:black; min-width: 100%; margin: 10px 10px 0px 0px;  font-size: 10px;">
                                                                <?php echo e($dfdet['nmlok']); ?>

                                                            </span>
                                                        </div>
                                                        <div class="col text-right"
                                                            style="padding: 0 10px 0 5px !important;">
                                                            <span id="basic-addon3"
                                                                style="height: 12px; color:black; min-width: 100%; margin: 10px 10px 0px 0px;  font-size: 10px;">
                                                                <?php echo e($dfdet['jammulai']); ?> s/d <?php echo e($dfdet['jamselesai']); ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($tglnow == 'T'): ?>

<div class="fixed-plugin" onclick="btn_tmbactivity()">
    <a class="fixed-plugin-button text-white position-fixed px-3 py-2">
        <i class="material-icons py-2 fas fa fa-plus"></i>
        
    </a>
</div>
<?php endif; ?>
</div>

<?php echo $__env->make('cmactivity.mdl_cmtmbhactivity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('cmactivity.mdl_editactivity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Bootstrap 4 Autocomplete -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js"
    crossorigin="anonymous">
</script>

<script>
    function btn_det(isi){  
        var dataa      = isi.split('#');
        var urtnctv      = dataa[0]; 
        var detactv      = dataa[1]; 
        var nmloktv      = dataa[2]; 
        var jammltv      = dataa[3]; 
        var jammstv      = dataa[4];  
        var kdotltv      = dataa[5];  
        
        $('#txactv_kdactivty').val('<?php echo e($kdactivity); ?>');
        $('#txactv_urutan').val(urtnctv);
        $('#txactv_editdesk').val(detactv);  
        $('#txactv_editjammulai').val(jammltv);
        $('#txactv_editjamselesai').val(jammstv);
        $('#txactv_kdotl').val(kdotltv); 

        $("#txactv_editkdoutlet").append('<option value="'+kdotltv+'"  style="font-size:12px !important" selected>'+nmloktv+'</option>');

        // $(document).ready(()=>{
        $("#txactv_editkdoutlet").val(kdotltv);
        // }); 

        // var text = $("select[name=txactv_editkdoutlet] option[value='1']").text();
        // //We need to show the text inside the span that the plugin show
        // $('.bootstrap-select .filter-option').text(text);
        //Check the selected attribute for the real select 
        // $('select[name=txactv_editkdoutlet]').val(kdotltv);

        document.getElementById('mdl_editactiv').style.display='block';  
    }

    function tgl_activty(diklik){ 
        $('#send_activitytgl').submit();
    }

    /* Search in Select */
    $(document).ready(function() {
        $('.basic-single').select2();
      });
     

    function btn_tmbactivity(){   
      document.getElementById('mdl_tmbhactiv').style.display='block';  
    } 
</script>
<script>
    $.ajax({
        success: function () {
            $("#id_footerr").addClass('fixed-bottom');
        }
        }); 
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/cmactivity/cmactivity.blade.php ENDPATH**/ ?>