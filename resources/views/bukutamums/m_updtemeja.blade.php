{{-- <style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;

    }


    /* Extra styles for the cancel button */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
        text-align: center;
        margin: 0 0 24px 0;
        position: relative;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1031;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        /* padding-top: 60px; */
        overflow: hidden;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 0% auto 15% auto;
        border: 1px solid #888;
        width: 80%;
        /* top: 10%; */
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
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

    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
    }

    .alert.success {
        background-color: #4CAF50;
    }

    .alert.info {
        background-color: #2196F3;
    }

    .alert.warning {
        background-color: #ff9800;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }

    /* .swal-wide {
        width: 50% !important; 
    } */
</style> --}}

<div id="upmeja" class="modal">
    <div class="modal-dialog" style="margin: 0 0 auto 0;height: 100%; max-width: 100% !important;">
        <div class="modal-content">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500; font-size: 20px;">
                    <b>Update Table</b>
                </span>
                <i class="ion-android-close" style="color: black; margin-right: 10px; font-size: 24px;" type="button"
                    onclick="document.getElementById('upmeja').style.display='none'" class="close"></i>
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">
                <div class="card">
                    <div class="card-body" id="card-bd" style="padding-top: 10px;">
                        <div class="fw-container">
                            <div class="fw-body">
                                <div class="content">
                                    <div class="input-group">
                                        <table class="" style="width:100%; ">
                                            <tr>
                                                <td style="font-size: 12px !important; color : white; width: 48%;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3"
                                                                style="font-size: 12px; background:#26160D; color:white; min-width: 130px;  font-weight: bold;">No
                                                                WhatsApp</span>
                                                        </div>
                                                        <input type="number" name="upmej_no_wa" id="upmej_no_wa"
                                                            value="" class="form-control"
                                                            placeholder="example : 087888855156"
                                                            onfocus="myFunction(this)" disabled />
                                                    </div>
                                                </td>
                                                <td style="width: 2%;"></td>

                                                <td style="font-size: 12px !important; color : white; width: 48%;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3"
                                                                style="font-size: 12px; background:#26160D; color:white; min-width: 130px;  font-weight: bold;">Name</span>
                                                        </div>
                                                        <input type="text" name="upmej_nm_tmu" id="upmej_nm_tmu"
                                                            value="" class="form-control" placeholder="Example : Bagus"
                                                            required />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px !important; color : white; width: 48%;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3"
                                                                style="font-size: 12px; background:#26160D; color:white; min-width: 130px;  font-weight: bold;">Last
                                                                Visit</span>
                                                        </div>
                                                        <input type="text" name="upmej_jmlvst" id="upmej_jmlvst"
                                                            value="" placeholder="Example : 29-11-2021 09:12" hidden />
                                                        <input type="text" name="upmej_lvisit" id="upmej_lvisit"
                                                            value="" class="form-control"
                                                            placeholder="Example : 29-11-2021 09:12" disabled />
                                                    </div>
                                                </td>
                                                <td style="width: 2%;"></td>
                                                <td style="font-size: 12px !important; color : white; width: 48%;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3"
                                                                style="font-size: 12px; background:#26160D; color:white; min-width: 130px;  font-weight: bold;">Choose
                                                                Table</span>
                                                        </div>
                                                        <select class="form-control selectpicker" id="no_table2"
                                                            name="no_table2" data-live-search="true" required>
                                                            <option value="F" style="font-size:12px; color:black;">
                                                                Waitinglist
                                                            </option>
                                                            @foreach ($df_meja as $df)
                                                            @if($df['noorder'] == 'OPEN')
                                                            <option value="{{ $df['nomeja']}}"
                                                                style="font-size:12px !important">
                                                                {{ $df['nomeja'] }}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 48%;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3"
                                                                style="font-size: 12px; background:#26160D; color:white; min-width: 130px;  font-weight: bold;">Pax
                                                                Customer</span>
                                                        </div>
                                                        <input type="number" name="upmej_pax_tmu" id="upmej_pax_tmu"
                                                            value="" class="form-control" placeholder="Example : 3 "
                                                            disabled />
                                                    </div>
                                                </td>
                                                <td style="width: 2%;"></td>
                                                <td style="font-size: 12px !important; color : white; width: 48%;">

                                                    @if ($btn_kontak=='R' )
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3"
                                                                style="font-size: 12px; background:#26160D; color:white; min-width: 130px;  font-weight: bold;">Tanggal</span>
                                                        </div>
                                                        <input type="date" class="form-control date_interval2"
                                                            id="tx_dateup" name="tx_dateup" min="{{$date_min}}"
                                                            max="{{$date_max}}" value="{{$date_min}}">
                                                        <input type="time" class="form-control" id="tx_jamup"
                                                            name="tx_jamup" value="00:00" min="06:00" max="00:00"
                                                            required>
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>

                                        </table>
                                    </div>

                                    <div class="side " style="padding: 2% 5% 0px 5%">
                                        <div class="text-center px-1 pb-1">
                                            <div class="row" style="padding: 0 30px 0 30px;">
                                                <div class="col">
                                                    <button type="button"
                                                        class=" btn btn-lg btn-block  btn-rounded mb-1 mt-2"
                                                        style="font-size: 12px; color:white; background-color: #cc1a0b;  min-width: 150px;  font-weight: bold; padding-left: 10px !important; "
                                                        onclick="btn_cancela()">
                                                        Cancel
                                                    </button>
                                                </div>
                                                <div class="col">
                                                    <button type="button"
                                                        class=" btn btn-lg btn-block  btn-rounded mb-1 mt-2"
                                                        style="font-size: 12px; color:white; background-color: #26160D;  min-width: 150px;  font-weight: bold; padding-left: 10px !important; "
                                                        onclick="send_updt()">
                                                        Update
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

</div>

<script>
    /* Search in Select */
     $(document).ready(function() {
        $('.js-example-basic-single').select2();
      });
     
    // function myFunction(x) {
    //     $('#nm_tmu').val('');  
    //     $('#nm_tmu').attr("disabled", false);
    // }
    function send_updt(){ 
        var nmcus       = $('#upmej_nm_tmu').val();
        var nowa        = $('#upmej_no_wa').val();
        var urtan       = $('#upmej_jmlvst').val();
        var no_table    = $('#no_table2').val();
        var kdotl       = '{{$kdoutlet}}'; 
        var pax_tmu    = $('#upmej_pax_tmu').val();  
        var txdate      = $('#tx_dateup').val();
        var tx_jamup       = $('#tx_jamup').val(); 
        var txdate1;
        if ('{{$btn_kontak}}' == 'R'){ 
            txdate1 = txdate+' '+txjam+':00';
        }else{
            txdate1= null;
        }
        
        console.log(nmcus+' '+nowa+' '+urtan+' '+no_table+' '+kdotl);
    loadingon();  
    if (nmcus == "" || nowa== "") {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Meja Tidak boleh kosong!',
                confirmButtonColor: '#3085d6',
                allowOutsideClick: false  
            })
            // alert('Tidak Boleh Kosong');
        } else { 
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
            type: 'POST',
            url: '{{url("contacttamu")}}',
            data: {"_token": "{{ csrf_token() }}","tipe":"I","nmcust":nmcus,"kontak":nowa,"urutan":urtan,"kdoutlet":kdotl,"meja":no_table,"pax_tmu":pax_tmu,"tglreservasi":txdate1},
            dataType: 'json',
            success:function(data){
                
                console.log(data);
                $('#loader').hide(); 
                document.getElementById('dpassword').style.display='none';
                Swal.fire({
                icon: 'success',
                title: 'success...',
                text: 'Meja berhasil di pilih',
                confirmButtonColor: '#3085d6',
                allowOutsideClick: false  
            }) 
                location.reload();
            },
            error: function () {
                $('#loader').hide();
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Server Kita Bermasalah nih!",
                    allowOutsideClick: false 
                });
            }
        }); 
    }
       
    }
</script>

<script>
    function btn_cancela(){  

        
        var nmcus       = $('#upmej_nm_tmu').val();
        var nowa        = $('#upmej_no_wa').val();
        var urtan       = $('#upmej_jmlvst').val();
        var no_table    = $('#no_table2').val();
        var kdotl       = '{{$kdoutlet}}'; 
        var pax_tmu    = $('#upmej_pax_tmu').val(); 

        var txdate1;  
            txdate1= null; 
       
       console.log(nmcus+' '+nowa+' '+urtan+' '+no_table+' '+kdotl);
       
      Swal.fire({
                    text: "Apakah anda yakin akan Cancel Customer ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: "Tidak",
                    confirmButtonText: 'Ya, Cancel!' ,
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed)
                { 
                    loadingon(); 
                    $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '{{url("contacttamu")}}',
                        data: {"_token": "{{ csrf_token() }}","tipe":"K","nmcust":nmcus,"kontak":nowa,"urutan":urtan,"kdoutlet":kdotl,"meja":no_table,"pax_tmu":pax_tmu,"tglreservasi":txdate1},
                        dataType: 'json',
                        success:function(data){
                            
                            console.log(data);
                            $('#loader').hide();
                            swal.fire({
                                icon: 'success',
                                title: 'success...',
                                text: 'Customer berhasil di CANCEL',
                                confirmButtonColor: '#26160D',
                            }).then(function() {
                                // document.getElementById('modl_dettamu').style.display='none';
                                // document.getElementById('upmeja').style.display='none';
                                loadingon();
                                location.reload();
                            });     
                        },
                        error: function () {
                            $('#loader').hide();
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: "Server Kita Bermasalah nih!"
                            });
                        }
                    }); 
                  }
            }) 
   }
</script>