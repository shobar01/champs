
<style>
    
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1031;
        left: 0;
        top: 0;
        width: 100%;
        height: 97vh;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 0px;
        /* overflow: scroll; */
        position: fixed;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 0%;
        border: 1px solid #888;
        width: 100%;
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
    .dropdown-item { 
        font-size: 12px !important;
    } 
</style>

<link href="<?php echo e(asset('public/resource/css/style_viewcogs.css')); ?>" rel="stylesheet" type="text/css">
<div id="mdl_addbrg" class="modal" style="padding-top: 60px;">
    <div class="" >
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 8px;">
                    <b style="font-size: 14px;" >Tambah Barang MS</b>
                </span>

                <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_addbrg()"
                    class="close"></i> 
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">
                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm"> 
                                    <div class="card-body text-left"> 
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" 
                                                    style="font-size: 12px; color:black;min-width: 90px;">Kode Barang
                                                </span>
                                            </div>
                                            <input type="text" id="tx_inptkdbrg" name="tx_inptkdbrg" class="form-control "
                                                style="font-size: 12px; color:black;" 
                                                placeholder="contoh : 466500" >
                                        </div> 

                                        <div class="text-center px-1 pb-2 mt-3">
                                            <div class="row">
                                                <div class="col">
                                                    <button type="button" class="btn btn-lg btn-block btn-success" id="Searching"
                                                        onclick="addbrg()" style="width:100%; font-weight: 500; font-size: 12px;">
                                                        Tambah Barang
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-deck mt-3 ">
                                            <div class="card mb-4 shadow-sm">
                                                <div class="shadow-lg rounded-2 bg-white p-1">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="text-left" id="basic-addon3"
                                                                style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Kd Barang</a>
                                                            </span><b>: </b>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;"><b id="tx_mskdbrg"> &nbsp; . . . </b></a>
                                                    </div> 
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="text-left" id="basic-addon3"
                                                                style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Nama Barang</a>
                                                            </span><b>: </b>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;"><b id="tx_msnmbrg"> &nbsp; . . .  </b></a>
                                                    </div> 
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="text-left" id="basic-addon3"
                                                                style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Kd Ada/Konversi</a>
                                                            </span><b>: </b>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;" ><b  id="tx_msadaknvrs"> &nbsp; . . .</b></a>
                                                    </div> 
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="text-left" id="basic-addon3"
                                                                style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; " >Sat 1/Sat 2</a>
                                                            </span><b>: </b>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;"><b id="tx_mssat1sat2"> &nbsp; . . . </b></a>
                                                    </div>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="text-left" id="basic-addon3"
                                                                style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Status Insert </a>
                                                            </span><b>: </b>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;"><b id="tx_mssttsinsrt"> &nbsp; . . .</b></a>
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
    </div>
</div>
<script> 
    function clos_addbrg(){  
        $('#tx_inptkdbrg').val(''); 
        $('#tx_mskdbrg').html(' &nbsp; . . .'); 
        $('#tx_msnmbrg').html(' &nbsp; . . .'); 
        $('#tx_msadaknvrs').html(' &nbsp; . . .'); 
        $('#tx_mssat1sat2').html(' &nbsp; . . .'); 
        $('#tx_mssttsinsrt').html(' &nbsp; . . .');   
        document.getElementById('mdl_addbrg').style.display='none';  
    } 

    
    function addbrg(){   
        var tx_inptkdbrg = $('#tx_inptkdbrg').val(); 
        if (tx_inptkdbrg == '' )  {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kode Barang Tidak Boleh kosong!',
                confirmButtonColor: '#cc1a0b',
                allowOutsideClick: false, 
            }) 
        } else { 
            Swal.fire({
                    text: "Apakah anda yakin akan Menambahkan ,"+tx_inptkdbrg+" ?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: "Tidak",
                    confirmButtonText: 'Ya, Ubah!' ,
                    reverseButtons: true,
                    allowOutsideClick: false 
                }).then((result) => {
                    if (result.isConfirmed)
                { 
                    event.preventDefault(); 
                    jsn_tbhbrg(); 
                }
            }) 
        }   
    }

    function jsn_tbhbrg(){
        
        var tx_inptkdbrg = $('#tx_inptkdbrg').val(); 
        var nip = '<?php echo e($nip); ?>';
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("submit_tmbhbrgms")); ?>', 
             // kdoutlet,tanggal,nipcek,ket,ipdb
            data: {"_token": "<?php echo e(csrf_token()); ?>","kdbarang":tx_inptkdbrg, "nip":nip },
            dataType: 'json',
            success:function(data){
                
                console.log(data);
                
                $('#tx_mskdbrg').html(' &nbsp; '+data['kdbarang']); 
                $('#tx_msnmbrg').html(' &nbsp; '+data['nmbarang']); 
                $('#tx_msadaknvrs').html(' &nbsp; '+data['kodeada']+'\\'+data['konversi']); 
                $('#tx_mssat1sat2').html(' &nbsp; '+data['sat1']+'\\'+data['sat2']); 
                $('#tx_mssttsinsrt').html(' &nbsp; '+data['resinsert']); 
                $('#loader').hide(); 
                    
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


</script>
 
<?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/msadjust/mdl_addbrgms.blade.php ENDPATH**/ ?>