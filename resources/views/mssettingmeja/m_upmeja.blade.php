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

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }
</style>
<div id="up_meja" class="modal">
    <div class="modal-dialog" style="height: 100%; max-width: 100% !important;">
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500; font-size: 14px; margin-top: 5px;">
                    <b id="tx_ketupmeja">Setting Meja </b>
                </span>
                <i class="ion-android-close" style="color: black; margin-right: 10px; font-size: 20px;" type="button"
                    onclick="clos_mdldah()" class="close"></i>
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">
                <div class="card">
                    <div class="card-body" id="card-bd" style="padding-top: 10px;">
                        <div class="fw-container">
                            <div class="fw-body">
                                <div class="content">
                                    <div class="input-group">

                                        <input type="hidden" name="tx_nomeja" id="tx_nomeja" value="" class="form-control"
                                            style="font-weight: bold; color:black;" />
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"
                                                    style="font-size: 12px; background:#cc1a0b; color:white; min-width: 90px;  font-weight: bold;">Kapasitas</span>
                                            </div>
                                            <select class="form-control form-control-sm " name="tx_kpsts"
                                                id="tx_kpsts" style=" font-weight: bold; color:black;">
                                                <option value='2'>2 Pax</option>
                                                <option value='4'>4 Pax</option>
                                                <option value='6'>6 Pax</option>
                                            </select>
                                            {{-- <input type="number" name="tx_kpsts" id="tx_kpsts" value=""
                                                class="form-control" style="font-weight: bold; color:black;" /> --}}
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"
                                                    style="font-size: 14px; background:#cc1a0b; color:white; min-width: 90px;  font-weight: bold; ">Area
                                                </span>
                                            </div>
                                            <select class="form-control form-control-sm " name="spin_areasmking"
                                                id="spin_areasmking" style=" font-weight: bold; color:black;">
                                                <option value='T'>Smoking</option>
                                                <option value='F'>Non Smoking</option>
                                            </select>
                                        </div>


                                        {{-- <div class="flex-md-row input-group mb-2 mt-2">


                                            <div class="col-md-12" style="padding: 0px !important;">
                                                <div class="input-group-text">
                                                    <span id="basic-addon3"
                                                        style="font-size: 14px; color:black;  font-weight: bold;">Area
                                                    </span>
                                                </div>
                                                <div class="form-control">
                                                    <label class="radio">
                                                        <input type="radio" name="answer">
                                                        Smoking
                                                    </label>
                                                    <label class="radio align-right">
                                                        <input type="radio" name="answer">
                                                        Non Smoking
                                                    </label>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <div class="side " style="padding: 2% 25% 0px 25%">
                                        <button class=" btn btn-lg btn-block btn-dark  btn-rounded mb-1 mt-5"
                                            type="button"
                                            style="font-size: 12px; color:white;    min-width: 150px;  font-weight: bold; padding-left: 10px !important; "
                                            onclick="Mjsn_sbmtupdt()">Kirim</button>
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
    function clos_mdldah(){
        document.getElementById('up_meja').style.display='none'
        $('#tx_ket').val('');
      }
      
</script>
<script>
    function Mjsn_sbmtupdt(isi){ 
        var nmeja    = $('#tx_nomeja').val(); 
        var kpsts    = $('#tx_kpsts').val(); 
        var smoke  = $('#spin_areasmking').val();

        var kdotlmj; 
        if ('{{$kdakses}}' == 'AVMS2'){
            kdotlmj= '{{$ikdoutlet}}'; 
        }else{
            kdotlmj= $('#kdotlmj').val(); 
        }
          
        console.log('tambah meja '+nmeja+'==='+kpsts+'==='+smoke+'===');  
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '{{url("sbt_updtsetmja")}}',
            // kdotl, kdakses, nomeja, kapasitas, smokarea
            data: {"_token": "{{ csrf_token() }}","kdotl":kdotlmj,"kdakses":'{{$kdakses}}',"nomeja":nmeja,"kapasitas":kpsts,"smokarea":smoke,"tippe":'B'},
            dataType: 'json',
            success:function(data){
                console.log(data);
                $('#loader').hide(); 
                if(data['UpdtB']==false){
                    swal.fire({
                    icon: 'error',
                    title: 'Opps!!',
                    text: 'Gagal Update meja.',
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
                    text: 'Berhasil Update Meja.',
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
</script>