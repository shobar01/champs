<style>
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
        /* margin: 0% auto 15% auto; */
        border: 1px solid #888;
        width: 100%;
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
</style>

<div id="dpassword" class="modal">
    <div class="modal-dialog" style="margin: 0 0 auto 0;height: 100%; max-width: 100% !important;">
        <div class="modal-content">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500; font-size: 20px;">
                    <b> @if($btn_kontak == 'R') Input Guest Reservation @else Input Guest @endif </b>
                </span>
                <i class="ion-android-close" style="color: black; margin-right: 10px; font-size: 24px;" type="button"
                    onclick="document.getElementById('dpassword').style.display='none'" class="close"></i>
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">
                <div class="card">
                    <div class="card-body" id="card-bd" style="padding: 10px 0 10px 0 ;">
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
                                                        <input type="number" name="no_wa" id="no_wa" value=""
                                                            class="form-control" placeholder="Example : 087888855156"
                                                            onfocus="myFunction(this)"
                                                            style="font-size: 12px !important;" required />
                                                    </div>
                                                </td>
                                                <td style="width: 2%;"></td>

                                                <td style="font-size: 12px !important; color : white; width: 48%;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3"
                                                                style="font-size: 12px; background:#26160D; color:white; min-width: 130px;  font-weight: bold;">Name</span>
                                                        </div>
                                                        <input type="text" name="nm_tmu" id="nm_tmu" value=""
                                                            class="form-control" placeholder="Example : Bagus"
                                                            style="font-size: 12px !important;" required />
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px !important; color : white; width: 48%;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3"
                                                                style="font-size: 12px; background:#26160D; color:white; min-width: 130px;  font-weight: bold;">Note</span>
                                                        </div>
                                                        <input type="text" name="ket_tmu" id="ket_tmu" value=""
                                                            class="form-control" placeholder="Example : Non Smoking"
                                                            style="font-size: 12px !important;" />
                                                    </div>
                                                </td>
                                                <td style="width: 2%;"></td>
                                                <td style="font-size: 12px !important; color : white; width: 48%;">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon3"
                                                                style="font-size: 12px; background:#26160D; color:white; min-width: 130px;  font-weight: bold;">Change
                                                                Table</span>
                                                        </div>
                                                        <select class="form-control selectpicker" id="no_table"
                                                            name="no_table" data-live-search="true">
                                                            @if ($btn_kontak=='R' )
                                                            <option value="R"
                                                                style="font-size: 12px !important; color:black;">
                                                                Reservation
                                                            </option>
                                                            @else
                                                            <option value="F"
                                                                style="font-size: 12px !important; color:black;">
                                                                Waitinglist
                                                            </option>
                                                            @foreach ($df_meja as $df)
                                                            @if($df['noorder'] == 'OPEN')
                                                            <option value="{{ $df['nomeja']}}"
                                                                style="font-size:12px !important">
                                                                {{ $df['nomeja']}} </option>
                                                            @endif
                                                            @endforeach
                                                            @endif
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
                                                        <input type="number" name="pax_tmu" id="pax_tmu" value=""
                                                            class="form-control" placeholder="Example : 3 "
                                                            style="font-size: 12px !important;" />
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
                                                            id="tx_date" name="tx_date" min="{{$date_min}}"
                                                            max="{{$date_max}}" value="{{$date_min}}">
                                                        <input type="time" class="form-control" id="tx_jam"
                                                            name="tx_jam" value="00:00" min="06:00" max="00:00"
                                                            required>
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>

                                        </table>
                                    </div>

                                    <div class="side " style="padding: 2% 25% 0px 25%">
                                        <button class=" btn btn-lg btn-block  btn-rounded mb-1 mt-2" type="button"
                                            style="font-size: 12px; color:white; background-color: #26160D;  min-width: 150px;  font-weight: bold; padding-left: 10px !important; "
                                            onclick="send()">Save Guest</button>
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
    function myFunction(x) {
        $('#nm_tmu').val('');  
        $('#nm_tmu').attr("disabled", false);
    }
</script>