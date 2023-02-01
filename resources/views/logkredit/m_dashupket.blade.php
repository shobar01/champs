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
<div id="up_ket" class="modal">
    <div class="modal-dialog" style="height: 100%; max-width: 100% !important;">
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500; font-size: 14px;">
                    <b id="tx_ketdash">Catatan</b>
                </span>
                <i class="ion-android-close" style="color: black; margin-right: 10px; font-size: 24px;" type="button"
                    onclick="clos_mdldah()" class="close"></i>
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">
                <div class="card">
                    <div class="card-body" id="card-bd" style="padding-top: 10px;">
                        <div class="fw-container">
                            <div class="fw-body">
                                <div class="content">
                                    <div class="input-group">

                                        <input type="hidden" name="tx_dashupkdotl" id="tx_dashupkdotl" value=""
                                            class="form-control" style="font-weight: bold; color:black;" />
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"
                                                    style="font-size: 12px; background:#cc1a0b; color:white; min-width: 90px;  font-weight: bold;">Sisa</span>
                                            </div>
                                            <input type="text" name="tx_dashupketsisa" id="tx_dashupketsisa" value=""
                                                class="form-control" style="font-weight: bold; color:black;" disabled />
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3"
                                                    style="font-size: 12px; background:#cc1a0b; color:white; min-width: 90px;  font-weight: bold;">Alamat
                                                    IP</span>
                                            </div>
                                            <input type="text" name="tx_dashupketip" id="tx_dashupketip" value=""
                                                class="form-control" style="font-weight: bold; color:black;" disabled />
                                        </div>

                                        <div class="flex-md-row mb-2 mt-2">

                                            <div class="col-md-12" style="padding: 0px !important;">
                                                <div class="input-group-text">
                                                    <span id="basic-addon3"
                                                        style="font-size: 14px; color:black;  font-weight: bold;">Catatan
                                                    </span>
                                                </div>
                                                <textarea rows="5" cols="50" class="form-control" id="tx_ket"
                                                    placeholder="contoh : tidak ada jaringan atau kabel adaptor terputus..."></textarea>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="side " style="padding: 2% 25% 0px 25%">
                                        <button class=" btn btn-lg btn-block btn-primary  btn-rounded mb-1 mt-5"
                                            type="button"
                                            style="font-size: 12px; color:white;    min-width: 150px;  font-weight: bold; padding-left: 10px !important; "
                                            onclick="senddash_upket('B')">Kirim</button>
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
        document.getElementById('up_ket').style.display='none'
        $('#tx_ket').val('');
      }
      
</script>