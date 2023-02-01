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

    .form-group {
        margin-bottom: 0.1rem !important;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 0.75rem !important;
    }
</style>
<div id="mdl_tmbhactiv" class="modal">
    <div class="modal-dialog" style="height: 100%; max-width: 100% !important;">
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 5px;">
                    <b style="font-size: 14px;">Tambah Activity <br>
                        <a style="font-size: 12px;">{{$tanggalll}}</a> </b>
                </span>
                <i class="ion-android-close" style="color: black; margin-right: 10px; font-size: 20px;" type="button"
                    onclick="clos_tmbhmdlactvty()" class="close"></i>
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm">

                                    <div class="card-body text-left">
                                        <div class="form-group">

                                            <label style="font-size: 12px;">Pilih Tempat</label>
                                            <select class="form-control selectpicker" id="txactv_kdoutlet"
                                                name="txactv_kdoutlet" data-live-search="true" required>
                                                @foreach ($dfoffotl as $df)
                                                <option value="{{ $df['KdOutlet']}}" style="font-size:12px !important">
                                                    {{ $df['NmOutlet'] }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">

                                            <label style="font-size: 12px;">Waktu Mulai</label>
                                            <input type="time" class="form-control" id="txactv_jammulai"
                                                name="txactv_jam" value="{{$jamnow}}" min="06:00" max="00:00" required>

                                        </div>
                                        <div class="form-group">

                                            <label style="font-size: 12px;">Waktu Selesai</label>
                                            <input type="time" class="form-control" id="txactv_jamselesai"
                                                name="txactv_jam" value="{{$jamnow}}" min="06:00" max="00:00" required>

                                        </div>
                                        <div class=" form-group">
                                            <label style="font-size: 12px;">Deskripsi </label>
                                            <textarea id="txactv_desk" name="txactv_desk"
                                                class="form-control form-control-sm textleft inptklmjmlbld" cols="40"
                                                rows="5" placeholder="contoh : memperbaiki printer di BO bandung."
                                                style="font-size: 12px;" required></textarea>
                                            {{-- <small class="form-text  text-danger">*nama anda tidak akan di
                                                tampilkan.</small> --}}
                                        </div>
                                        <div class="form-group mx-5 mt-2 pb-2">
                                            <button type="button"
                                                class="form-control btn-lg btn-dark submit px-3 shadow"
                                                onclick="submt_activty()"
                                                style="border-radius: 5px !important; background-color: black; 
                                                            color:white; font-weight: bold; font-size: 14px;">Kirim</button>
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
    function clos_tmbhmdlactvty(){
        document.getElementById('mdl_tmbhactiv').style.display='none'
      }
      
      function submt_activty(){
        var kdotl    = $('#txactv_kdoutlet').val(); 
        var txjmm    = $('#txactv_jammulai').val(); 
        var txjms    = $('#txactv_jamselesai').val(); 
        var tdesk  = $('#txactv_desk').val();
        console.log(kdotl+'=='+txjmm+'=='+tdesk+'=='+txjms);
    
        if (kdotl == '' || txjmm == '' ||  txjms == '' || tdesk == '')  {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lokasi, Jam atau deskripsi tidak boleh kosong!',
                confirmButtonColor: '#cc1a0b',
                allowOutsideClick: false, 
            }) 
        } else { 
            $('#loader').hide();  
            Jsn_SbmtActivty();
        }  
      }

      function Jsn_SbmtActivty(){
        var tipe, kdactivity, jmlactivty, nip,longisi,latisi,iddevice,nmdevice;

        if('{{$jmlactivty}}' == '0'){
            tipe = 'A';
            jmlactivty = 1; 
        } else {
            tipe = 'B';
            jmlactivty = parseInt('{{$jmlactivty}}') + parseInt(1); 
        } 
        kdactivity  = '{{$kdactivity}}';
        nip         = '{{$dfuser[0]["nip"]}}';
        longisi     = '{{$dfuser[0]["lokasilong"]}}';
        latisi      = '{{$dfuser[0]["lokasilat"]}}';
        nmdevice    = '{{$dfuser[0]["nmdvc"]}}';
        iddevice    = '{{$dfuser[0]["dvcimei"]}}';

         
       
        var te_lokasi       = $('#txactv_kdoutlet').val(); 
        var te_jmm    = $('#txactv_jammulai').val(); 
        var te_jms    = $('#txactv_jamselesai').val(); 
        var te_detactivity  =  $('#txactv_desk').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        
        console.log(nmdevice+"=="+ iddevice+"=="+ nip+"=="+jmlactivty);
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '{{url("submit_tmbhactivty")}}', 
             // kdoutlet,tanggal,nipcek,ket,ipdb
            data: {"_token": "{{ csrf_token() }}","tipe":tipe,"kdactivity":kdactivity,"jmlactivty":jmlactivty,"nip":nip,"longisi":longisi,"latisi":latisi,"iddevice":iddevice,
            "nmdevice":nmdevice,"iddevice":iddevice,"te_jammulai":te_jmm,"te_jamselesai":te_jms,"te_lokasi":te_lokasi,"te_detactivity":te_detactivity },
            dataType: 'json',
            success:function(data){
                
                console.log(data);
                $('#loader').hide();
                if(data['stupdate']==false){
                        swal.fire({
                        icon: 'error',
                        title: 'Opps!!',
                        text: 'Gagal Di Tambahkan.',
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
                        text: 'Berhasil Di Tambahkan.',
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