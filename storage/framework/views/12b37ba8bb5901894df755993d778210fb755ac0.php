
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('modal.m_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link href="<?php echo e(asset('public/resource/css/obay.css')); ?>" rel="stylesheet" type="text/css">
<style>
    .swal-confirm {
        width: 50%
    }

    .swal2-popup {
        width: 32em !important;
    }
</style>
<script src="<?php echo e(asset('public/resource/js/feather-icons.min.js')); ?>"></script>
<div class="container-fluid mimin-wrapper">
    <div id="content">
        <img src="<?php echo e(asset('public/resource/img/logo.png')); ?>" class="imglogo"
            style=" position: absolute; top: 50%; transform: translate(-50%, -50%); left: 50%; opacity: .2;">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item nvpilih" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">All</a>
            </li>
            <li class="nav-item nvpilih" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Finish</a>
            </li>
            <li class="nav-item nvpilih" role="presentation">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" role="tab"
                    aria-controls="pills-contact" aria-selected="false">New</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-8 p-1"><input type="text" name="" id="" class="form-control" placeholder="Searching...">
            </div>
            <div class="col-4 p-1">
                <form action="<?php echo e(route('ticketing')); ?>" method="GET" id="formtgl">
                    <input type="date" name="tgl" id="tgltck" onchange="simpantgl()" class="form-control"
                        value="<?php echo e($tgl); ?>">
                </form>
            </div>
        </div>
        <div class="panel p-2">
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        <?php
                        $a = [1,2,3,4,5,6,7,8,9];
                        ?>
                        <?php $__currentLoopData = $a; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 col-xs-6 col-sm-3 col-lg-3  p-1">
                            <div class="card m-1" onclick="detailtc()">
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-2 mx"><i class="fa fa-hourglass fa-2x" style="color:white"></i>
                                        </div>
                                        <div class="col-10">
                                            <span class="redb">ICT DEPT</span>
                                            <p>03 Nov 2022 15:57</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <h1>Ini Done</h1>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h1>Ini Baru</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="btnx">
        <button class="btn btn-add" type="button" data-toggle="modal" data-target="#exampleModal"><i
                class="fa fa-plus fa-2x"></i></button>
        <span class="title">Add Request</span>
    </div>
</div>
</div>

<?php echo $__env->make('ticketing.modal.detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.addreq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.rate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.next', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.note_menunggu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.note_proses', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.note_selesai', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.note_lanjutan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.infokat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.lanjutan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.mdfoto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
    <?php echo csrf_field(); ?>
</form>

<script>
    function simpantgl(){
        $('#formtgl').submit();
    }
    function alertLogout(){
        swal.fire({
            icon:"info",
            title:"Yakin mau keluar dari aplikasi?",
            showCancelButton: true,
            confirmButtonText: 'Ya Keluar',
            }).then((result) => {
            if (result.isConfirmed) {
                $('#logout-form').submit();
            }
            })
    }
    function inject(){
        var header = '<div class="headertext"><i class="fa fa-arrow-left"></i>Champ Ticketing<div></div></div>';
        $('.topheader').html(header);
        setTimeout(() => {
        $('#id_footerr').hide()
        }, 500);
    }
    inject()

    function calldept(){
        $('#kategori').empty();
        let dept = $('#idtujuantck').val();
        let nmdept = $('#tuj'+dept).html();
        // var selects = document.getElementsByTagName("select");
        // for (var i = 0; i < selects.length; i++) {
        //     selects[i].disabled = true;
        // }
        // var textareas = document.getElementsByTagName("textarea"); 
        // for (var i = 0; i < textareas.length; i++) { 
        //     textareas[i].disabled = true;
        // }
        // var buttons = document.getElementsByTagName("button");
        // for (var i = 0; i < buttons.length; i++) {
        //     buttons[i].disabled = true;
        // }
        // console.log(dept)
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type: 'GET',
            url: '<?php echo e(url("datatujuan")); ?>?dept='+dept,
            dataType: 'json',
            success:function(data){
                console.log(data)
                let katdept = data['katdept'];
                for (let i = 0; i < katdept.length; i++) {
                    let kdkat = katdept[i]['kdkat'];
                    let nmkat = katdept[i]['nmkat'];
                    let rowkat = '<option value="'+kdkat+'">'+nmkat+'</option>';
                    $('#kategori').append(rowkat)
                    
                }
                if(katdept.length < 1){
                    $("#kategori").prop('disabled', true);
                    $("#pesan").prop('disabled', true).val("");
                    $(".levelx").prop('disabled', true);
                    $("#simpanreq").prop('disabled', true);
                    swal.fire({
                        icon : "warning",
                        title : "Maaf, Belum bisa request ke Departemen "+nmdept,
                        html : '<div class="text-center">Silahkan Pilih Tujuan Yang lain</div>'
                    })
                }else{
                    $("#kategori").prop('disabled', false);
                    $("#pesan").prop('disabled', false);
                    $(".levelx").prop('disabled', false);
                    $("#simpanreq").prop('disabled', false);
                }
            },error: function () {
            }
        }); 
    }
    function info(){
        $('#infokat').modal('show');
        $('#exampleModal').modal('hide');
    }
    function cinfo(){
        $('#infokat').modal('hide');
        $('#exampleModal').modal('show');
    }
    function detailtc(){
        $('#detailtc').modal('show');
    }
    function sudahdone(){
        Swal.fire({
        title: 'Apakah Request Sudah Benar - Benar Selesai?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'OKE SELESAI',
        denyButtonText: `LANJUTKAN`,
        }).then((result) => {
        if (result.isConfirmed) {
            $('#detailtc').modal('hide');
            $('#rate').modal('show');
        } else if (result.isDenied) {
            $('#detailtc').modal('hide');
            $('#next').modal('show');
        }
        })
    }

    function rate(){
        $('#rate').modal('show');
        $('#detailtc').modal('hide');
    }
    function next(){
        $('#next').modal('show');
        $('#detailtc').modal('hide');
    }

    function lanjutan(){
        $('#next').modal('hide');
        $('#lanjutan').modal('show');
    }


    function note(id){
        $('#'+id).modal('show'); 
        $('#detailtc').modal('hide');
    }

    function closenote(id){
        $('#'+id).modal('hide'); 
        $('#detailtc').modal('show');
    }

    function note1(){
        $('#note_lanjutan').modal('show'); 
        $('#lanjutan').modal('hide');
    }

    function closenote1(){
        $('#note_lanjutan').modal('hide'); 
        $('#lanjutan').modal('show');
    }

    function simpanreqq(){
        Swal.fire({
        title: 'Simpan Request?',
        showCancelButton: true,
        confirmButtonText: 'KIRIM',
        cancelButtonText: 'BATAL',
        }).then((result) => {
        if (result.isConfirmed) {
           swal.fire('Request Berhasil Terkirim !')
        } 
        })
    }

    function reg(id){
        var text = $('#'+id).val();
        var c = text.replace(/[^a-zA-Z0-9:,. ]/g, '');
        $('#'+id).val(c);
    }

    function bukafoto(){        
        $('#mdfoto').modal('show');
        startVideo()
    }
</script>

<script>
    feather.replace();
    const controls = document.querySelector('.controls');
    const cameraOptions = document.querySelector('.video-options>select');
    const video = document.querySelector('video');
    const canvas2 = document.getElementById('canvas2');
    const idfoto = document.getElementById('idfoto');

    const msg2 = document.getElementById('message2');
    const screenshotImage = document.getElementById('ssimage');
    const buttons = [...controls.querySelectorAll('button')];
    let streamStarted = false;

    const video2 = document.getElementById('video2');
    const cameraOptions2 = document.querySelector('.video-options>.select');
    const canvas3 = document.getElementById('canvas3');
    const idfoto2 = document.getElementById('idfoto2');
    const screenshotImage2 = document.getElementById('ssimage2');
    const screenshot2 = document.getElementById('screenshot3');
    let streamStarted2 = false;

    const [play, pause, screenshot] = buttons;
    const videoConstraints = {};
    if (cameraOptions.value === '') {
      videoConstraints.facingMode = 'environment';
    } else {
      videoConstraints.deviceId = { exact: cameraOptions.value };
    }
   const constraints = {
    video: videoConstraints,
    audio: false
   };

    const getCameraSelection = async () => {
      const devices = await navigator.mediaDevices.enumerateDevices();
      const videoDevices = devices.filter(device => device.kind === 'videoinput');
      const options = videoDevices.map(videoDevice => {
          return '<option value="'+videoDevice.deviceId+'">'+videoDevice.label+'</option>';
      });
      cameraOptions.innerHTML = options.join('');
    };

    // const getCameraSelection2 = async () => {
    //   const devices = await navigator.mediaDevices.enumerateDevices();
    //   const videoDevices = devices.filter(device => device.kind === 'videoinput');
    //   const options = videoDevices.map(videoDevice => {
    //       return '<option value="'+videoDevice.deviceId+'">'+videoDevice.label+'</option>';
    //   });
    //   cameraOptions.innerHTML = options.join('');
    // };

    function ereun(){
        video.pause();
        play.classList.remove('d-none');
        pause.classList.add('d-none');
    }
    function startVideo() {
      if (streamStarted) {
        video.play();
        play.classList.add('d-none');
        pause.classList.add('d-none');
        return;
      }
      if ('mediaDevices' in navigator && navigator.mediaDevices.getUserMedia) {
        const updatedConstraints = {
          ...constraints,
          deviceId: {
                      exact: cameraOptions.value
                    }
        };
        startStream(updatedConstraints);
      }
    };
    const startStream = async (constraints) => {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        handleStream(stream);
    };
    const handleStream = (stream) => {
        video.srcObject = stream;
        play.classList.add('d-none');
        pause.classList.add('d-none');
        screenshot.classList.remove('d-none');
        streamStarted = true;
    };

    const doScreenshot = () => {
        canvas2.width = video.videoWidth;
        canvas2.height = video.videoHeight;
        canvas2.getContext('2d').drawImage(video, 0, 0);
        screenshotImage.src = canvas2.toDataURL('image/webp');
        screenshotImage.classList.remove('d-none');
        idfoto.value = canvas2.toDataURL('image/webp');
        setTimeout(function(){ 
          ask();
          canvas2.remove();
          video.pause();
          video.currentTime = 0;
        }, 1000);
    };
    screenshot.onclick = doScreenshot;


    // function startVideo2() {
    //     if (streamStarted2) {
    //       video2.play();
    //       play.classList.add('d-none');
    //       pause.classList.add('d-none');
    //       return;
    //     }
    //     if ('mediaDevices' in navigator && navigator.mediaDevices.getUserMedia) {
    //       const updatedConstraints2 = {
    //         ...constraints,
    //         deviceId: {
    //                     exact: cameraOptions.value
    //                   }
    //       };
    //       startStream2(updatedConstraints2);
    //     }
    // };
    // const startStream2 = async (constraints) => {
    //     const stream2 = await navigator.mediaDevices.getUserMedia(constraints);
    //     handleStream2(stream2);
    // };
    // const handleStream2 = (stream2) => {
    //     video2.srcObject = stream2;
    //     play.classList.add('d-none');
    //     pause.classList.add('d-none');
    //     screenshot2.classList.remove('d-none');
    //     streamStarted2 = true;
    // };
    // const doScreenshot2 = () => {
    //     canvas3.width = video2.videoWidth;
    //     canvas3.height = video2.videoHeight;
    //     canvas3.getContext('2d').drawImage(video2, 0, 0);
    //     screenshotImage2.src = canvas3.toDataURL('image/webp');
    //     screenshotImage2.classList.remove('d-none');
    //     idfoto2.value = canvas3.toDataURL('image/webp');
    //     setTimeout(function(){ 
    //       isiketerangan();
    //       canvas3.remove();
    //       video2.pause();
    //       video2.currentTime = 0;
    //     }, 1000);
    // };
    // screenshot2.onclick = doScreenshot2;

    getCameraSelection();
    // getCameraSelection2();

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/ticketing/ticketing.blade.php ENDPATH**/ ?>