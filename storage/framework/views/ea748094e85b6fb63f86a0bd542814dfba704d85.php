
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.'); ?>
<?php $__env->startSection('content'); ?>
<style>
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1031;
        left: 0;
        top: 0;
        width: 100%;
        /* height: 100%; */
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
        overflow: scroll;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        /* margin: 5% auto 15% auto; */
        border: 1px solid #888;
        /* width: 95%; */
        /* top: 10%; */
    }

    label {
        display: inline-block;
        margin-bottom: 0.2rem !important;
    }

    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes  animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media  screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }

    .form-group {
        margin-bottom: 0.1rem !important;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 0.75rem !important;
    }

    .bootstrap-select .dropdown-toggle .filter-option {
        font-size: 12px !important;
    }

    .form-control {
        font-size: 12px !important;
    }

    .right {
        position: absolute;
        right: 10px;
        top: 1px;
        z-index: 5;
        /* width: 300px;
        border: 3px solid #73AD21;
        padding: 10px; */
    }

    .rightbuttom {
        position: absolute;
        bottom: 0px;
        right: 18px;
        /* top: 1px; */
        z-index: 5;
        /* width: 300px;
        border: 3px solid #73AD21;
        padding: 10px; */
    }
</style>




<div class="container" style="padding-top: 70px;  height: 100vh;">
    <div class="mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <div class="row ">

                    <div class="col" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>Master</b></a>
                    </div>
                    

                    <div class=" text-right" style="padding: 0 10px 0 5px !important;">
                        <div id="gbl_rfrsh" type="button" style=" font-weight: bold; font-size: 14px;"
                            onclick="rfrsh()"><i class='fa fa-refresh' style='color: #000; margin: 0 5px 0 5px;'></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="fw-container">

                    <div class="fw-body">

                        <div class="content">
                            <div class="input-group mb-2 mt-1 px-1">
                                <input type="text" name="myCustomSearchBox" id="myCustomSearchBox"
                                    placeholder="Searching" class="form-control date_nowpts align-middle"
                                    style="font-size: 12px; color:black;" required>
                                <div class="input-group-append">
                                    <button onclick="document.getElementById('dpassword').style.display='block'"
                                        class="btn btn-success" type="button"
                                        style="font-size: 12px; color:white; min-width: 90px;"> Reset </button>
                                </div>
                            </div>

                            <ul style="overflow-x: hidden; height: 70vh; list-style-type: none; padding: 5px;">

                                <?php if($dfrgnti == '0'): ?>

                                <div class="text-center ">
                                    <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>"
                                        background="transparent" speed="1"
                                        style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                                    </lottie-player>
                                    <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                                </div>
                                <?php else: ?>
                                <?php $__currentLoopData = $dfrgnti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class=" ">
                                    

                                    <div class="shadow-sm card p-2 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="icon" onclick="btn_zoomftomstr('<?php echo e($dfdet['foto']); ?>')">
                                                    <img src="<?php echo e($dfdet['foto']); ?>" class="img-circle avatar center"
                                                        style="width: 50px; height: 50px;" />
                                                </div>
                                                <div class="text-left col">
                                                    <a style="font-size: 12px; color:black;"><?php echo e(Str::substr($dfdet['nm_lengkap'],0,15)); ?>

                                                        ( <?php echo e($dfdet['nip']); ?> )</a>
                                                    <a style="font-size: 12px; color:black;"> <?php echo e($dfdet['nmoutlet']); ?> (
                                                        <?php echo e($dfdet['jnsotl']); ?> )</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            onclick="diklik('0#<?php echo e($dfdet['nm_lengkap']); ?>#<?php echo e($dfdet['nip']); ?>#<?php echo e($dfdet['bfnmdvc']); ?>#<?php echo e($dfdet['bfiddvc']); ?>#<?php echo e($dfdet['xcount']); ?>')">
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Jabatan</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                        <?php echo e($dfdet['jabatan']); ?></a>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Model HP</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                        <?php echo e($dfdet['bfnmdvc']); ?></a>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Waktu Req </a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                        <?php echo e($dfdet['wktreq']); ?></a>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Ket</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                        <?php echo e($dfdet['ket']); ?> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </ul>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div id="mdl_imgmaster" class="modal">
    <div class="" style=" max-width: 100% !important; margin-top:60px;">
        <div class=" animate" style="height: 90% !important;">
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body text-left">
                                        <div class="row " style="padding:5px;">
                                            <i class="ion-close-circled end-0 right"
                                                style="color: red;   font-size: 25px;"
                                                onclick="clos_mdlimgmaster()"></i>
                                            <div class="col d-flex justify-content-center">
                                                <img id="img_mdlimgmstr" class="center" style=" " />
                                                <img class="rightbuttom" style="width: 175px; height: 25px;"
                                                    src="<?php echo e(asset('public/resource/img/champputihhori.png')); ?>" />
                                            </div>

                                        </div>


                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- custom -->


    <?php echo $__env->make('modal.m_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $.ajax({
    //other parameters
    success: function () {
    $("#id_footerr").addClass('fixed-bottom');
    }
    });

    function showmodal_done() { 
        $('#modal_baking').modal('show'); 
    } 
    function btn_switchms() { 
        var nm = '<?php echo e($dflog[0]['nama']); ?> (<?php echo e($dflog[0]['wktupdate']); ?>)';
        $('#tx_msswitchupdt').val(nm);
        document.getElementById('mdl_switch').style.display='block';   
    } 
    function btn_zoomftomstr(ft){ 
        document.getElementById('mdl_imgmaster').style.display='block';   
        $("#img_mdlimgmstr").attr("src",ft);
    }
    function clos_mdlimgmaster(){ 
        document.getElementById('mdl_imgmaster').style.display='none';   
        
        $("#img_mdlimgmstr").attr("src",ft);
    }
   
    </script>

    <script>
        function diklik(isi) { 
         
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
        confirmButtonColor: '#3085d6',
        allowOutsideClick: false 
    })
    $('#loader').hide();
    </script>
    <?php elseif(session('jsuccess') == '0'): ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Opps!!',
        text: "<?php echo e(session('jmessage')); ?>",
        confirmButtonColor: '#d33',
        allowOutsideClick: false
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
        confirmButtonColor: '#3085d6',
        allowOutsideClick: false 
    })
    $('#loader').hide();
    </script>
    <?php elseif(session('stt') == '0'): ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Opps!!',
        text: "<?php echo e(session('msg')); ?>" ,
        confirmButtonColor: '#d33',
        allowOutsideClick: false
    })
    $('#loader').hide();
    </script>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_presence', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views//master/master.blade.php ENDPATH**/ ?>