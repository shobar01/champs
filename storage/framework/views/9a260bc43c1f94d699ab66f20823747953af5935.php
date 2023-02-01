<style>
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
        overflow: scroll;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
        width: 95%;
        top: 10%;
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
</style>
<div id="tmbh_meja" class="modal">
    <div class="modal-dialog" style="height: 100%; max-width: 100% !important;">
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500; font-size: 14px; margin-top: 5px;">
                    <b id="tx_ketupmeja">Tambah Meja 0<?php echo e(count($df_meja)+1); ?> </b>
                </span>
                <i class="ion-android-close" style="color: black; margin-right: 10px; font-size: 20px;" type="button"
                    onclick="clos_tmbhmdldah()" class="close"></i>
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">
                <div class="card">
                    <div class="card-body" id="card-bd" style="padding-top: 10px;">
                        <div class="fw-container">
                            <div class="fw-body">
                                <div class="content">
                                    <div class="input-group">

                                        <input type="hidden" name="tx_tbhnomeja" id="tx_tbhnomeja"
                                            value="0<?php echo e(count($df_meja)+1); ?>" class="form-control"
                                            style="font-weight: bold; color:black;" />
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"
                                                    style="font-size: 12px; background:#cc1a0b; color:white; min-width: 90px;  font-weight: bold;">Kapasitas</span>
                                            </div>
                                            <select class="form-control form-control-sm " name="tx_tbhkpsts"
                                                id="tx_tbhkpsts" style=" font-weight: bold; color:black;">
                                                <option value='2'>2 Pax</option>
                                                <option value='4'>4 Pax</option>
                                                <option value='6'>6 Pax</option>
                                            </select>
                                            
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"
                                                    style="font-size: 14px; background:#cc1a0b; color:white; min-width: 90px;  font-weight: bold; ">Area
                                                </span>
                                            </div>
                                            <select class="form-control form-control-sm " name="spin_tbhareasmking"
                                                id="spin_tbhareasmking" style=" font-weight: bold; color:black;">
                                                <option value='T'>Smoking</option>
                                                <option value='F'>Non Smoking</option>
                                            </select>
                                        </div>
                                        
                                    </div>

                                    <div class="side " style="padding: 2% 25% 0px 25%">
                                        <button class=" btn btn-lg btn-block btn-dark  btn-rounded mb-1 mt-5"
                                            type="button"
                                            style="font-size: 12px; color:white;    min-width: 150px;  font-weight: bold; padding-left: 10px !important; "
                                            onclick="Mjsn_sbmttmbh()">Kirim</button>
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
    function clos_tmbhmdldah(){
        document.getElementById('tmbh_meja').style.display='none'
        $('#tx_ket').val('');
      }
      
</script>
<script>
    function Mjsn_sbmttmbh(){ 
        var nmeja    = $('#tx_tbhnomeja').val(); 
        var kpsts    = $('#tx_tbhkpsts').val(); 
        var smoke  = $('#spin_tbhareasmking').val();
        console.log(nmeja+'=='+kpsts+'=='+smoke);
    
        if (nmeja == '' || kpsts == '' || smoke == '')  {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'NoMeja, Kapasitas atau Area Smoking tidak boleh kosong!',
                confirmButtonColor: '#cc1a0b',
                allowOutsideClick: false, 
            }) 
        } else { 
            $('#loader').hide(); 
            Jsn_sbmttmbh();
        }  
       
    }

    function Jsn_sbmttmbh(){
        
        var nmeja    = $('#tx_tbhnomeja').val(); 
        var kpsts    = $('#tx_tbhkpsts').val(); 
        var smoke  = $('#spin_tbhareasmking').val();
        
        var kdotlmj; 
        if ('<?php echo e($kdakses); ?>' == 'AVMS2'){
            kdotlmj= '<?php echo e($ikdoutlet); ?>'; 
        }else{
            kdotlmj= $('#kdotlmj').val(); 
        }
       
        console.log('Bari '+nmeja+'==='+kpsts+'==='+smoke+'===');  
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("sbt_updtsetmja")); ?>',
            // kdotl, kdakses, nomeja, kapasitas, smokarea
            data: {"_token": "<?php echo e(csrf_token()); ?>","kdotl":kdotlmj,"kdakses":'<?php echo e($kdakses); ?>',"nomeja":nmeja,"kapasitas":kpsts,"smokarea":smoke,"tippe":'C'},
            dataType: 'json',
            success:function(data){
                console.log(data);
                $('#loader').hide(); 
                if(data['UpdtB']==false){
                    swal.fire({
                    icon: 'error',
                    title: 'Opps!!',
                    text: 'Gagal Tambah data.',
                    confirmButtonColor: '#cc1a0b',
                    allowOutsideClick: false,
                }).then(function() { 
                    loadingon();
                    location.reload();
                }); 
                }else{
                    swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Berhasil Tambah data.',
                    confirmButtonColor: '#cc1a0b',
                    allowOutsideClick: false,
                }).then(function() { 
                    loadingon();
                    location.reload();
                });
                }
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
</script><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/mssettingmeja/m_tmbhmeja.blade.php ENDPATH**/ ?>