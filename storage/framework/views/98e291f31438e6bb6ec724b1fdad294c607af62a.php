<style>
    /* The Modal (background) */
    .modal-dialog {
        min-height: calc(100vh - 60px);
        display: flex;
        flex-direction: column;
        justify-content: center;
        overflow: auto;
    }

    @media(max-width: 768px) {
        .modal-dialog {
            min-height: calc(100vh - 90px);
        }
    }

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
        padding-top: 0 !important;
        overflow: scroll;
    } 
    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        /* margin: 5% auto 15% auto; */
        border: 1px solid #888;
        border-radius: 0.6rem !important;
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
</style>
<div id="mdl_waiting" class="modal">
    <div class="modal-dialog" style="max-width: 100% !important;">
        <div class="modal-content animate">
            
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-4">
                                    <div class="login-wrap p-0">
                                        <input type="hidden" id="pddkn_kdupdpeg" name="pddkn_kdupdpeg" /> 
                                        <input type="hidden" id="pkk_type" name="pkk_type" /> 

                                        <div class="row " style="padding:20px;" id="cnt_tolak">
                                            <div class="col d-flex justify-content-center">
                                                <button type="button" class="card point" onclick="sbt_dltppkditolak()"
                                                    target="_self">
                                                    <div class="card-body ">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div class="icon"> 
                                                                    <lottie-player
                                                                        src="https://assets8.lottiefiles.com/packages/lf20_hnmpilyt.json"
                                                                        background="transparent" speed="0.6"
                                                                        style="width: 90px; height: 90px;" loop autoplay>
                                                                    </lottie-player> </div>
                                                                <div class="text-left col">
                                                                    
                                                                <b id="tx_kettolak" style=" color:black; width:100%;"> Ditolak Oleh :  Bisa ajukan lagi </b>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </button>
                                            </div> 
                                        </div>
                                        
                                        <div class="row " style="padding:20px;" id="cnt_disetuji">
                                            <div class="col d-flex justify-content-center">
                                                <button type="button" class="card point" onclick="sbt_disetujui()"
                                                    target="_self">
                                                    <div class="card-body ">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div class="icon"> 
                                                                    <lottie-player
                                                                        src="https://assets6.lottiefiles.com/packages/lf20_tmminzky.json"
                                                                        background="transparent" speed="0.6"
                                                                        style="width: 90px; height: 90px;" loop autoplay>
                                                                    </lottie-player> </div>
                                                                <div class="text-left col">
                                                                    
                                                                <b id="tx_ketdisetuji" style=" color:black; width:100%;"> Ditolak Oleh :  di setuji </b>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </button>
                                            </div> 
                                        </div>
                                        <div class="row "style="padding:20px;" id="cnt_menunggu">
                                            <div class="col d-flex justify-content-center">
                                                <button type="button" class="card point" onclick="sbt_dltppk()"
                                                    target="_self">
                                                    <div class=" card-body">
                                                        <lottie-player
                                                            src="https://assets7.lottiefiles.com/packages/lf20_ycdpu7oe.json"
                                                            background="transparent" speed="1"
                                                            style="width: 90px; height: 90px;" loop autoplay>
                                                        </lottie-player>
                                                    </div>
                                                    <div class="card"
                                                        style="background-color:#FEBD01; color:white; width:100%;">
                                                        <b> Batalkan </b>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="col d-flex justify-content-center">
                                                <button type="button" onclick="clos_waiting()" class="card point">
                                                    <div class="card-body">
                                                        <lottie-player
                                                            src="https://assets5.lottiefiles.com/packages/lf20_b4d1kzop.json"
                                                            background="transparent" speed="1"
                                                            style="width: 90px; height: 90px;" loop autoplay>
                                                        </lottie-player>
                                                    </div>
                                                    <div class="card"
                                                        style="background-color:#FEBD01; color:white; width:100%;">
                                                        <b> Menunggu </b>
                                                    </div>
                                                </button>
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
<script> 

    function clos_waiting(){
        document.getElementById('mdl_waiting').style.display='none'
      } 
      function sbt_dltppk(){
          var kdupdpeg = $('#pddkn_kdupdpeg').val(); 
          var pddkn_type = $('#pddkn_type').val();   
            Swal.fire({
                        text: "Apakah anda yakin akan Membatakan permohonan ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#d33',
                        confirmButtonColor: '#3085d6',
                        cancelButtonText: "Tidak",
                        confirmButtonText: 'Ya, Batlkan!' ,
                        reverseButtons: true,
                        allowOutsideClick: false 
                    }).then((result) => {
                        if (result.isConfirmed){ 
                        loadingon(); 
                        $.ajaxSetup({
                            headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo e(url("btlknppk")); ?>',   
                            data: {"_token": "<?php echo e(csrf_token()); ?>","kdupdpeg":kdupdpeg},
                            dataType: 'json',
                            success:function(data){ 
                                console.log(data);
                                $('#loader').hide(); 
                                    swal.fire({
                                    icon: 'success',
                                    title: '',
                                    text: data['message'],
                                    confirmButtonColor: '#cc1a0b',
                                    allowOutsideClick: false 
                                }).then(function() { 
                                    loadingon();
                                    location.reload();
                                }); 
                                    
                            },
                            error: function () {
                                $('#loader').hide();
                                swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "Server Kita Bermasalah!",
                                    allowOutsideClick: false 
                                });
                            }
                        }); 
                    }
                }) 
      } 
      function sbt_dltppkditolak(){
          var kdupdpeg = $('#pddkn_kdupdpeg').val(); 
          var pddkn_type = $('#pddkn_type').val();    
            loadingon(); 
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("btlknppk")); ?>',   
                data: {"_token": "<?php echo e(csrf_token()); ?>","kdupdpeg":kdupdpeg},
                dataType: 'json',
                success:function(data){ 
                    console.log(data);
                    $('#loader').hide(); 
                        swal.fire({
                        icon: 'success',
                        title: '',
                        text: 'Silahkan mengajukan permohonan kembali!',
                        confirmButtonColor: '#cc1a0b',
                        allowOutsideClick: false 
                    }).then(function() { 
                        loadingon();
                        location.reload();
                    }); 
                        
                },
                error: function () {
                    $('#loader').hide();
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "Server Kita Bermasalah!",
                        allowOutsideClick: false 
                    });
                }
            });  
      } 
      function sbt_disetujui(){
          var kdupdpeg = $('#pddkn_kdupdpeg').val(); 
          var pddkn_type = $('#pddkn_type').val();    
            loadingon(); 
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("updateppk")); ?>',   
                data: {"_token": "<?php echo e(csrf_token()); ?>","kdupdpeg":kdupdpeg},
                dataType: 'json',
                success:function(data){ 
                    console.log(data);
                    $('#loader').hide(); 
                        swal.fire({
                        icon: 'success',
                        title: '',
                        text: data['message'],
                        confirmButtonColor: '#cc1a0b',
                        allowOutsideClick: false 
                    }).then(function() { 
                        loadingon();
                        location.reload();
                    }); 
                        
                },
                error: function () {
                    $('#loader').hide();
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "Server Kita Bermasalah!",
                        allowOutsideClick: false 
                    });
                }
            });  
      } 
</script><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/hris/modal/mdl_waiting.blade.php ENDPATH**/ ?>