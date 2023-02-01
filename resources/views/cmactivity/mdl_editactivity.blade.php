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
<div id="mdl_editactiv" class="modal">
    <div class="modal-dialog" style="height: 100%; max-width: 100% !important;">
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 5px;">
                    <b style="font-size: 14px;">Edit Activity <br>
                        <a style="font-size: 12px;">{{$tanggalll}}</a> </b>
                </span>
                <i class="ion-android-close" style="color: black; margin-right: 10px; font-size: 20px;" type="button"
                    onclick="clos_editmdlactvty()" class="close"></i>
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm">

                                    <input type="hidden" class="form-control" id="txactv_kdactivty"
                                        name="txactv_kdactivty" value="" required>
                                    <input type="hidden" class="form-control" id="txactv_urutan" name="txactv_urutan"
                                        value="" required>
                                    <input type="hidden" class="form-control" id="txactv_kdotl" name="txactv_kdotl"
                                        value="" required>
                                    <div class="card-body text-left">
                                        <div class="form-group">

                                            <label style="font-size: 12px;">Pilih Tempat</label>
                                            <select class="form-control " id="txactv_editkdoutlet"
                                                name="txactv_editkdoutlet" data-live-search="true" required>
                                                {{-- <option value='T'>Smoking</option>
                                                <option value='F'>Non Smoking</option> --}}
                                                @foreach ($dfoffotl as $df)
                                                <option value="{{$df['KdOutlet']}}" style="font-size:12px !important">
                                                    {{$df['NmOutlet']}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group">

                                            <label style="font-size: 12px;">Waktu Mulai</label>
                                            <input type="time" class="form-control" id="txactv_editjammulai"
                                                name="txactv_editjammulai" value="" min="06:00" max="00:00" required>

                                        </div>
                                        <div class="form-group">

                                            <label style="font-size: 12px;">Waktu Selesai</label>
                                            <input type="time" class="form-control" id="txactv_editjamselesai"
                                                name="txactv_editjamselesai" value="{{$jamnow}}" min="06:00" max="00:00"
                                                required>

                                        </div>
                                        <div class=" form-group">
                                            <label style="font-size: 12px;">Deskripsi </label>
                                            <textarea id="txactv_editdesk" name="txactv_editdesk"
                                                class="form-control form-control-sm textleft inptklmjmlbld" cols="40"
                                                rows="5" placeholder="contoh : memperbaiki printer di BO bandung."
                                                style="font-size: 12px;" required></textarea>
                                            {{-- <small class="form-text  text-danger">*nama anda tidak akan di
                                                tampilkan.</small> --}}
                                        </div>
                                        <div class="form-group mx-5 mt-2 pb-2">
                                            <button type="button"
                                                class="form-control btn-lg btn-dark submit px-3 shadow"
                                                onclick="submt_editactivty()"
                                                style="border-radius: 5px !important; background-color: black; 
                                                            color:white; font-weight: bold; font-size: 14px;">Update</button>
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
    function clos_editmdlactvty(){
        document.getElementById('mdl_editactiv').style.display='none';
      }

      function submt_editactivty(){ 
        var kdkdactv    = $('#txactv_kdactivty').val(); 
        var urtnactv    = $('#txactv_urutan').val(); 
        var loksactv    = $('#txactv_editkdoutlet').val(); 
        var jammactv    = $('#txactv_editjammulai').val(); 
        var jamsactv    = $('#txactv_editjamselesai').val(); 
        var deskactv    = $('#txactv_editdesk').val();  

    
        if (kdkdactv == '' || urtnactv == '' ||  loksactv == '' || jammactv == '' || deskactv=='')  {
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
            Jsn_editSbmtActivty();
        }  
      }

      function Jsn_editSbmtActivty(){  
  
        var kdkdactv    = $('#txactv_kdactivty').val(); 
        var urtnactv    = $('#txactv_urutan').val(); 
        var loksactv    = $('#txactv_editkdoutlet').val(); 
        var jammactv    = $('#txactv_editjammulai').val(); 
        var jamsactv    = $('#txactv_editjamselesai').val(); 
        var deskactv    = $('#txactv_editdesk').val().replace(/(?:\r\n|\r|\n)/g, ' ');  

        var longisi,latisi; 

        longisi     = '{{$dfuser[0]["lokasilong"]}}';
        latisi      = '{{$dfuser[0]["lokasilat"]}}';  

        
        console.log(kdkdactv+'=='+urtnactv+'=='+loksactv+'=='+jammactv+'=='+jamsactv+'=='+deskactv);
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '{{url("submit_editactivty")}}', 
             // kdoutlet,tanggal,nipcek,ket,ipdb
            data: {"_token": "{{ csrf_token() }}","kdactivity":kdkdactv,"urutan":urtnactv,"te_jammulai":jammactv,"te_jamselesai":jamsactv,"te_lokasi":loksactv,"longisi":longisi,"latisi":latisi,
            "te_detactivity":deskactv },
            dataType: 'json',
            success:function(data){
                
                console.log(data);
                $('#loader').hide();
                if(data['stupdate']==false){
                        swal.fire({
                        icon: 'error',
                        title: 'Opps!!',
                        text: 'Gagal Di Update.',
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
                        text: 'Berhasil Di Update.',
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