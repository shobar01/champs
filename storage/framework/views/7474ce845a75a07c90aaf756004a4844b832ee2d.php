<style>
    #accordion {
        margin: 20px 0;
    }

    #accordion #faq .shadow {
        margin-bottom: 10px;
        /* border: 0; */
    }

    #accordion #faq .mb-1 .card-header {
        border: 0;
        -webkit-box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
        box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
        border-radius: 2px;

        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, .03);
        border-bottom: 1px solid rgba(0, 0, 0, .125);

        /* border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0; */
    }

    #accordion #faq .mb-1 .card .btn-header-link {
        color: #000;
        display: block;
        text-align: left;
        /* background: #FFE472; */
        color: #222;
        padding: 10px;

    }

    #accordion #faq .mb-1 .card .btn-header-link:after {
        content: "\f139";
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        float: right;
    }

    #accordion #faq .mb-1 .card .btn-header-link.collapsed {
        /* background: #A541BB; */
        color: #000;
    }

    #accordion #faq .mb-1.card .btn-header-link.collapsed:after {
        content: "\f13a";
    }

    #accordion #faq .mb-1 .collapsing {
        /* background: #FFE472; */
        /* line-height: 30px;
    }
    
    #accordion #faq .shadow .collapse {
      /* border: 0; */
    }

    #accordion #faq .mb-1 .collapse.show {
        /* background: #FFE472; */
        /* line-height: 30px; */
        color: #222;
    }

    .btn.focus,
    .btn:focus {
        outline: 0;
        box-shadow: 0 0 0 0 rgb(0 123 255 / 25%) !important;
    }

    .btn-group-lg>.btn,
    .btn-lg {
        padding: 0 !important;
        font-size: 12px !important;
        line-height: 1.5 !important;
        border-radius: 0.3rem !important;
    }
</style>

<style>
    /* The Modal (background) */
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
        padding-top: 60px;
        overflow: scroll;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        /* margin: 5% auto 15% auto; */
        border: 1px solid #888;
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

    .form-control {
        font-size: 12px !important;
    }

    .right {
        position: absolute;
        right: 10px;
        top: 1px;
        z-index: 5;
        /* width: 300px;
        border: 3px solid #73AD21;
        padding: 10px; */
    }

    .rightbuttom {
        position: absolute;
        bottom: 0px;
        right: 18px;
        /* top: 1px; */
        z-index: 5;
        /* width: 300px;
        border: 3px solid #73AD21;
        padding: 10px; */
    }
</style>
<div id="mdl_crikrawnnip" class="modal">
    <div class="" style="height: 100%; max-width: 100% !important; margin-top:60px;">
        <div class="modal-content animate" style="">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 8px;">
                    <b style="font-size: 14px;" id="tx_tittle">Cari Karyawan</b>
                </span>

                <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_crinip()"
                    class="close"></i>
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm">
                                    
                                    <div class="card-body text-left">
                                        <div class="input-group mb-3" id="inpt_cari">
                                            <input id="tx_crinip" name="tx_crinip" type="text" class="form-control"
                                                placeholder="Cari NIP" maxlength="8">
                                            <div class="input-group-append">
                                                <button onclick="Jsn_carinip()" class="btn btn-sm btn-success"
                                                    style=" padding: 0.25rem 0.8rem !important;" type="button"><i
                                                        class=" fas fa fa-search"> </i></button>
                                            </div>
                                        </div>
                                        <div class="input-group " id="inpt_carinama">
                                            <input id="tx_crinama" name="tx_crinama" type="text" class="form-control"
                                                placeholder="Cari Nama">
                                            <div class="input-group-append">
                                                <button onclick="Jsn_carinama()" class="btn btn-sm btn-primary"
                                                    style=" padding: 0.25rem 0.8rem !important;" type="button"><i
                                                        class=" fas fa fa-search"> </i></button>
                                            </div>
                                        </div>


                                        <div id='det_carinip' style="display : none !important;">

                                            <div class="shadow-sm card p-2 mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="icon">
                                                            <img src="" class="img-circle avatar center"
                                                                style="width: 50px; height: 50px;" id="crnip_foto"
                                                                onclick="btn_zoomfto()" />
                                                        </div>
                                                        <div class="text-left col">
                                                            <h3 class="mb-0 font-weight-normal" id="crnip_nama"></h3>
                                                            <span id="crnip_deptjnsotl"> ICT (BO)</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Last
                                                                    Aktif</a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_lastaktif"> :
                                                            Thu, 25 Aug 2022 17:18</a>
                                                    </div>
                                                </div>
                                                <?php if($kdakses == 'AVXXX'): ?>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Device</a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px; "
                                                            id="crnip_perngkat"> :
                                                            samsung-SM-A505F (11)</a>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">NIP </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_nip"> :
                                                            K1050012</a>
                                                    </div>
                                                </div>

                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Tgl Bekerja
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_tglbkrja"> :
                                                            Staff ICT</a>
                                                    </div>
                                                </div>

                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Tgl Kontrak
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_tglkontrak"> :
                                                            Staff ICT</a>
                                                    </div>
                                                </div>

                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Status
                                                                    Bekerja </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_sttuskerja"> :
                                                            Staff ICT</a>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Jabatan </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_jabatan"> :
                                                            Staff ICT</a>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Agama </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_agama"> :
                                                            Islam</a>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Status
                                                                    Kel</a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_sttsmnkh"> :
                                                            Menikah</a>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Jumlah Anak
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_jmlanak"> :
                                                            1 Anak</a>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Jenis Kelamin
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_klmin"> :
                                                            Laki-Laki</a>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Tanggal Lahir
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_tgllahir"> :
                                                            Sabtu, 11 April 1992</a>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Tempat Lahir
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_tmptlahir"> :
                                                            Cimahi</a>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Usia </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_usia"> :
                                                            Sabtu, 11 April 1992</a>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Email</a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_eamil"> :
                                                            +6287888134175</a>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">No WA </a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px;"
                                                            id="crnip_nowa"> :
                                                            +6287888134175</a>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Alamat</a>
                                                            </span>:
                                                        </div>
                                                        <a style="font-size: 12px; color:black;  padding-right:5px; "
                                                            id="crnip_almat"> :
                                                            samsung-SM-A505F (11)</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="accordion">
                                                <div class="accordion" id="faq">
                                                    <div class="mb-1 ">
                                                        <div class="card shadow-sm" id="headingOne">
                                                            <a href="#" class="btn btn-header-link"
                                                                data-toggle="collapse" data-target="#collapseOne"
                                                                aria-expanded="true" aria-controls="collapseOne">
                                                                Data Keluarga

                                                            </a>
                                                        </div>
                                                        <div id="collapseOne" class="collapse"
                                                            aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="card-body"
                                                                style="padding: 5px 5px 10px 5px !important;">
                                                                <ul style="overflow-x: hidden; list-style-type: none; padding: 5px;"
                                                                    id='ul_detkel'>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-1 ">
                                                        <div class="card shadow-sm" id="headingTwo">
                                                            <a href="#" class="btn btn-header-link"
                                                                data-toggle="collapse" data-target="#collapseTwo"
                                                                aria-expanded="true" aria-controls="collapseTwo">
                                                                Data Pendidikan

                                                            </a>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse"
                                                            aria-labelledby="headingTwo" data-parent="#accordion">
                                                            <div class="card-body"
                                                                style="padding: 5px 5px 10px 5px !important;">
                                                                <ul style="overflow-x: hidden; list-style-type: none; padding: 5px;"
                                                                    id='ul_detpendidikan'>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-1 ">
                                                        <div class="card shadow-sm" id="heading3">
                                                            <a href="#" class="btn btn-header-link"
                                                                data-toggle="collapse" data-target="#collapse3"
                                                                aria-expanded="true" aria-controls="collapse3">
                                                                Data Pengalaman

                                                            </a>
                                                        </div>
                                                        <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                                            data-parent="#accordion">
                                                            <div class="card-body"
                                                                style="padding: 5px 5px 10px 5px !important;">
                                                                <ul style="overflow-x: hidden; list-style-type: none; padding: 5px;"
                                                                    id='ul_detpengalaman'>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($kdakses == 'AVXXX'): ?>
                                            <div id="foterwa">
                                                <input type="hidden" id="tx_long" value="107.5623504">
                                                <input type="hidden" id="tx_lat" value="-6.8373736">
                                                <input type="hidden" id="tx_wamap" value="-6.8373736">
                                                <div class="shadow p-1 mb-1 bg-white rounded" onclick="btn_wanow()">
                                                    <div class="card p-2 mb-2">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div class="icon">
                                                                    <lottie-player
                                                                        src="https://assets7.lottiefiles.com/packages/lf20_5gezzxwi.json"
                                                                        background="transparent" speed="0.6"
                                                                        style="width: 50px; height: 50px;" loop
                                                                        autoplay>
                                                                    </lottie-player>
                                                                </div>
                                                                <div class="text-left col">

                                                                    <b id="tx_kettolak"
                                                                        style=" color:black; width:100%;"> Hubungi
                                                                        Sekarang </b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card shadow-sm p-2 mb-2">
                                                    <div class="col">
                                                        <div class="d-flex flex-row align-items-center">

                                                            <div id="map" class="col"
                                                                style="height: 300px; width:240px"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>


                                        <ul style="overflow-x: hidden; height: 70vh; list-style-type: none; padding: 5px;"
                                            id="ul_crinama">


                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="mdl_imgkrwn" class="modal">
        <div class="" style=" max-width: 100% !important; margin-top:60px;">
            <div class=" animate" style="height: 90% !important;">
                <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                    <div class="fw-container">
                        <div class="fw-body">
                            <div class="content">
                                <div class="card-deck mb-3 ">
                                    <div class="card mb-4 shadow-sm">
                                        <div class="card-body text-left">
                                            <div class="row " style="padding:5px;">
                                                <i class="ion-close-circled end-0 right"
                                                    style="color: red;   font-size: 25px;"
                                                    onclick="clos_mdlimgkrwn()"></i>
                                                <div class="col d-flex justify-content-center">
                                                    <img id="img_mdlimgkrwn" class="center" style=" " />
                                                    <img class="rightbuttom" style="width: 175px; height: 25px;"
                                                        src="<?php echo e(asset('public/resource/img/champputihhori.png')); ?>" />
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
        function clos_crinip(){ 
    $('#tx_crinip').val('');  
    var x = document.getElementById("det_carinip");  
    x.style.display = "none";
    var xx = document.getElementById("ul_crinama");  
    xx.style.display = "none";

    
    $('#ul_detkel').empty()
    $('#ul_detpendidikan').empty();
    $('#ul_detpengalaman').empty();
    $('#ul_crinama').empty();
    document.getElementById('mdl_crikrawnnip').style.display='none';  
}
function btn_zoomfto(){ 
    document.getElementById('mdl_imgkrwn').style.display='block';  
}
function clos_mdlimgkrwn(){ 
    document.getElementById('mdl_imgkrwn').style.display='none';  
}
function Jsn_carinip(){  
  
  var tx_crinip    = $('#tx_crinip').val().toUpperCase();  
  $('#tx_crinip').val(tx_crinip);

  if (tx_crinip.length < 8) {
        // $('#loader').hide();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'NIP tidak boleh kurang atau lebih dari 8 digit!', 
            confirmButtonColor: '#cc1a0b',
            allowOutsideClick: false  
        }) 
    } else { 
        
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("cari_krwnbynip")); ?>', 
            // kdoutlet,tanggal,nipcek,ket,ipdb
            data: {"_token": "<?php echo e(csrf_token()); ?>","tx_crinip":tx_crinip,"typee":"A" },
            dataType: 'json',
            success:function(data){
                
                console.log(data);
                $('#loader').hide();
                
                var x = document.getElementById("inpt_carinama");  
                x.style.display = "none";
                

                if(data['success']==0){
                        swal.fire({
                        icon: 'error',
                        title: 'Opps!!',
                        text: data['message'],
                        confirmButtonColor: '#cc1a0b',
                        allowOutsideClick: false,
                    }); 
                }else{
                    // crnip_deptjnsotl,crnip_lastaktif,crnip_Jabatan, crnip_nowa,crnip_device
                    // crnip_tglbkrja,crnip_tglkontrak,crnip_sttuskerja
                    // crnip_agama,crnip_sttsmnkh,crnip_jmlanak,crnip_klmin,crnip_tgllahir,crnip_tmptlahir,crnip_eamil,crnip_almat
                    
                    var df =data['df_krywan'][0];
                    $("#crnip_foto").attr("src",df['foto']);
                    $("#img_mdlimgkrwn").attr("src",df['foto']);
                    
                    $('#crnip_nama').html(df['nm_lengkap']);
                    $('#crnip_deptjnsotl').html(df['dept']+'('+df['kd_jenis_outlet']+')'); 
                    $('#crnip_nip').html(' : '+df['nip']); 
                    $('#crnip_jabatan').html(' : '+df['jabatan']);
                    

                    if (df['lastaksess'] == '-'){ 
                        $('#crnip_lastaktif').css("color","#cc1a0b"); 
                        $('#crnip_lastaktif').html(' : '+df['ket']);
                        $('#crnip_perngkat').html(' : -');  
                    }else{  
                        $('#crnip_lastaktif').css("color","#000"); 
                        $('#crnip_lastaktif').html(' : '+df['lastaksess']); 
                        $('#crnip_perngkat').html(' : '+df['nmdvc'].substring(0, 30) +'. . .'); 
                    }
                    
                    $('#crnip_tglbkrja').html(' : '+df['tgl_bekerja']); 
                    $('#crnip_tglkontrak').html(' : '+df['tgl_kontrak_pt']); 
                    $('#crnip_sttuskerja').html(' : '+df['status']); 
                    $('#crnip_agama').html(' : '+df['agama']); 
                    $('#crnip_sttsmnkh').html(' : '+df['status_kel']); 
                    $('#crnip_jmlanak').html(' : '+df['jml_anak']+' Anak'); 
                    $('#crnip_klmin').html(' : '+df['jns_kelamin']); 
                    $('#crnip_tgllahir').html(' : '+df['tgl_lahir']); 
                    $('#crnip_tmptlahir').html(' : '+df['tpt_lahir']); 
                    getAge(df['tgl_lahir']);
                    $('#crnip_eamil').html(' : '+df['alm_email']); 
                    $('#crnip_almat').html(df['alamat1']); 
                    $('#crnip_nowa').html(' : '+df['nowa']); 
                    
                    var x = document.getElementById("det_carinip"); 
                        x.style.display = "block";

                        if('<?php echo e($kdakses); ?>' == 'AVXXX'){  
                            $('#tx_lat').val(df['lokasilat']);
                            $('#tx_long').val(df['lokasilong']);
                            myMap();
                        }

                var dfkel = data['df_kelrga'];
                var dfpnglmn = data['df_pnglman'];
                var dfpddkn = data['df_pendidikn'];
                data_keluarga(dfkel);
                data_pengalaman(dfpnglmn);
                data_pendidikan(dfpddkn);
                    //     swal.fire({
                    //     icon: 'success',
                    //     title: '',
                    //     text: data['df_krywan'][0]['nm_lengkap'],
                    //     confirmButtonColor: '#cc1a0b',
                    //     allowOutsideClick: false,
                    // }).then(function() { 
                    //     loadingon();
                    //     location.reload();
                    // });
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
} 
function Jsn_carinama(){  
  
    $('#ul_crinama').empty();
  var tx_crinama   = $('#tx_crinama').val();   

  console.log('aaa bari '+tx_crinama.length);
  if (tx_crinama.length == 1 || tx_crinama.length == 2 || tx_crinama == '') {
        // $('#loader').hide();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Nama tidak boleh kurang dari 3 digit!', 
            confirmButtonColor: '#cc1a0b',
            allowOutsideClick: false  
        }) 
    } else { 
        
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("cari_krwnbynip")); ?>', 
            // kdoutlet,tanggal,nipcek,ket,ipdb
            data: {"_token": "<?php echo e(csrf_token()); ?>","tx_crinip":tx_crinama ,"typee":"C" },
            dataType: 'json',
            success:function(data){
                
               
                console.log(data);
                $('#loader').hide();
                
                if(data['success']==0){
                        swal.fire({
                        icon: 'error',
                        title: 'Opps!!',
                        text: data['message'],
                        confirmButtonColor: '#cc1a0b',
                        allowOutsideClick: false,
                    }); 
                }else{ 
                    var xx = document.getElementById("inpt_cari");  
                    xx.style.display = "none";
                    var xxxx = document.getElementById("ul_crinama");  
                    xxxx.style.display = "block";

                    var dfnm = data['df_krywan']; 
                    data_carinama(dfnm);  
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
} 

function getAge(date) {
	// var date = document.getElementById('crnip_tgllahir').value;
 
        if(date === ""){
                alert("Please complete the required field!");
            }else{
                var today = new Date();
                var birthday = new Date(date);
                var year = 0;
                if (today.getMonth() < birthday.getMonth()) {
                    year = 1;
                } else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
                    year = 1;
                }
                var age = today.getFullYear() - birthday.getFullYear() - year;
        
                if(age < 0){
                    age = 0;
                }
                $('#crnip_usia').html(' : '+age+' Tahun');
            }
    }
    </script>
    <script>
        function data_keluarga(dfkel){
    var dfkellength = dfkel.length; 
                
                console.log('Jsn_carinip '+dfkel.length+'==='+dfkel);
    if(dfkellength == 0 ){ 
        $('#ul_detkel').html('<li><div class="text-center ">'+
                '<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_evqse4gh.json" background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>'+
                '</lottie-player>'+
                ' <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>'+
                '</div> </li>'); 
    }else{
        for (let i = 0; i < dfkellength; i++) { 
            var stskl = dfkel[i]['status_kel'];
            var nikkk = dfkel[i]['no_kk'];
            var ktpkk = dfkel[i]['nik'];
            var anggt = dfkel[i]['nm_anggota'];
            var tplhr = dfkel[i]['tpt_lahir'];
            var tglhr = dfkel[i]['tgl_lahir'];
            var jklmn = dfkel[i]['jns_kelamin']; 
            var umurk = dfkel[i]['umur'];
            var tlpon = dfkel[i]['telepon'];
            var almat = dfkel[i]['alamat_rmh1'];
            var profesi = dfkel[i]['profesi'];
            var tkpddkn = dfkel[i]['pendidikan'];  
            var urutan = dfkel[i]['urutan'];
            var logo_kel = dfkel[i]['logo'];  

            var idli = "li_kel"+anggt.replaceAll(" ", "");
            var rw ='<li  id="'+idli+'" >'  
                +'<div class="shadow-sm card p-2 mb-2">'
                    +'<div class="d-flex justify-content-between">'
                        +'<div class="d-flex flex-row align-items-center">'
                            +'<div class="icon"> <img src="'+logo_kel+'" class="img-circle avatar center" style="width: 50px; height: 50px;" /></div>'
                            +'<div class="text-left col">'
                                +'<h3 class="mb-0" >'+stskl.substring(2)+'</h3>'
                                +'<span>'+anggt+'</span>'
                            +'</div>'
                        +'</div>' 
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">No KK</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+nikkk+'</a>'
                        +'</div>'
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">No NIK</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+ktpkk+'</a>'
                        +'</div>'
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">Jenis Kelamin</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+jklmn.substring(2)+'</a>'
                        +'</div>'
                    +'</div>'
                    +'<div class="row">'
                        +'<div class="text-left col">'
                            +'<div class="input-group ">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; ">TTL</a>'
                                    +'</span>'
                                +'</div> <a style="font-size: 12px; color:black; min-width: 90px;"> : '+tplhr+', '+tglhr+'</a>'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                    +'<div class="row">'
                        +'<div class="text-left col">'
                            +'<div class="input-group ">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; ">Umur/Usia</a>'
                                    +'</span>'
                                +'</div> <a style="font-size: 12px; color:black; min-width: 90px;"> : '+umurk+' Tahun</a>'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">No Hp</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+tlpon+'</a>'
                        +'</div>'
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">Profesi</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+profesi+'</a>'
                        +'</div>'
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">Pendidikan</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+tkpddkn+'</a>'
                        +'</div>'
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">Alamat</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> : '+almat+'</a>'
                        +'</div>'
                    +'</div>'
                +'</div>'
            +'</li>';  
            $('#ul_detkel').append(rw);
        }   
    }
}
    </script>
    <script>
        function data_pengalaman(dfpnglmn){
    var dfpnglmnlength = dfpnglmn.length; 
    console.log('Jsn_data_pengalaman'+dfpnglmn.length+'==='+dfpnglmn);
    if(dfpnglmn == 0 ){ 
        $('#ul_detpengalaman').html('<li><div class="text-center ">'+
                '<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_evqse4gh.json" background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>'+
                '</lottie-player>'+
                ' <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>'+
                '</div> </li>'); 
    }else{
        for (let i = 0; i < dfpnglmnlength; i++) { 
            var prshn = dfpnglmn[i]['nm_perusahaan'];
            var jbtan = dfpnglmn[i]['jabatan'];
            var mskrj = dfpnglmn[i]['masa_kerja']; 
            var gajihtmbh = 'Rp. '+new Intl.NumberFormat('id-ID').format(dfpnglmn[i]['gaji']) ;
            var almat = dfpnglmn[i]['alm_perusahaan'];
            var alsan = dfpnglmn[i]['alasan'];
            var urutan = dfpnglmn[i]['urutan'];
 
            var rw ='<li  id="'+prshn.replaceAll(" ","")+'" >'  
                +'<div class="shadow-sm card p-2 mb-2">'
                    +'<div class="d-flex justify-content-between">'
                        +'<div class="d-flex flex-row align-items-center">'
                            +'<div class="icon"> <img src="<?php echo e(asset('public/resource/img/hris/pengalaman.png')); ?>" class="img-circle avatar center" style="width: 50px; height: 50px;" /></div>'
                            +'<div class="text-left col">'
                                +'<h3 class="mb-0" >'+prshn+'</h3>'
                                +'<span>'+jbtan+'</span>'
                            +'</div>'
                        +'</div>' 
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">Gaji</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+gajihtmbh+'</a>'
                        +'</div>'
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">Kota</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+almat+'</a>'
                        +'</div>'
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">Masa Kerja</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+mskrj+' </a>'
                        +'</div>'
                    +'</div>'
                    +'<div class="row">'
                        +'<div class="text-left col">'
                            +'<div class="input-group ">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; ">Alasan Keluar</a>'
                                    +'</span>'
                                +'</div> <a style="font-size: 12px; color:black; min-width: 90px;"> : '+alsan+'</a>'
                            +'</div>'
                        +'</div>'
                    +'</div>'   
                +'</div>'
            +'</li>';    
        $('#ul_detpengalaman').append(rw);   
        }   
    }
    
}
    </script>
    <script>
        function data_carinama(dfcrnm){
        var dfcrnmlength = dfcrnm.length; 
        console.log('Jsn_data_pengalaman'+dfcrnm.length+'==='+dfcrnm);
        if(dfcrnm == 0 ){ 
            $('#ul_crinama').html('<li><div class="text-center ">'+
                    '<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_evqse4gh.json" background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>'+
                    '</lottie-player>'+
                    ' <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>'+
                    '</div> </li>'); 
        }else{
            for (let i = 0; i < dfcrnmlength; i++) { 
                var nip             = dfcrnm[i]['nip']; 
                var nm_lengkap      = dfcrnm[i]['nm_lengkap']; 
                var foto            = dfcrnm[i]['foto']; 
                var id_dept         = dfcrnm[i]['id_dept']; 
                var kd_jenis_outlet = dfcrnm[i]['kd_jenis_outlet']; 
                var lastaksess      = dfcrnm[i]['lastaksess']; 
                var jabatan         = dfcrnm[i]['jabatan']; 
                var ket             = dfcrnm[i]['ket'];  
     
                var rw ='<li id="'+nip+'"  onclick="crinma(\''+nip+'\')" >'
                            +'<div class="shadow-sm card p-2 mb-2">'
                                +'<div class="d-flex justify-content-between">'
                                    +'<div class="d-flex flex-row align-items-center">'
                                        +'<div class="icon"> <img src="'+foto+'" class="img-circle avatar center" style="width: 50px; height: 50px;" /></div>'
                                        +'<div class="text-left col">'
                                            +'<h3 class="mb-0" >'+nm_lengkap+'</h3>'
                                            +'<span>'+id_dept+' ( '+kd_jenis_outlet+' )</span>'
                                        +'</div>'
                                    +'</div>' 
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Aktif</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+lastaksess+'</a>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Jabatan</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+jabatan+'</a>'
                                    +'</div>'
                                +'</div>'  
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Keterangan</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+ket+'</a>'
                                    +'</div>'
                                +'</div>' 
                            +'</div>'
                        +'</li>';    
            $('#ul_crinama').append(rw);   
            }   
        }
        
    }
function crinma(nip){ 
    console.log(nip);
  $('#tx_crinip').val(nip);
  
  var xx = document.getElementById("inpt_cari");  
  xx.style.display = "none";
  var xx1 = document.getElementById("inpt_carinama");  
  xx1.style.display = "none";

//   var x = document.getElementById("det_carinip");  
//   x.style.display = "none";
  var xx = document.getElementById("ul_crinama");  
  xx.style.display = "none";
  Jsn_carinip();
}
    </script>
    <script>
        function data_pendidikan(dfpddkn){
        var dfpddknlength = dfpddkn.length;  
        if(dfpddkn == 0 ){ 
            $('#ul_detpengalaman').html('<li><div class="text-center ">'+
                    '<lottie-player src="https://assets9.lottiefiles.com/packages/lf20_evqse4gh.json" background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>'+
                    '</lottie-player>'+
                    ' <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>'+
                    '</div> </li>'); 
        }else{
            for (let i = 0; i < dfpddknlength; i++) {  
                var tngkt = dfpddkn[i]['tk_sekolah'];
                var nmpdk = dfpddkn[i]['nm_sekolah'];
                var jrsnp = dfpddkn[i]['jurusan'];
                var thniz = dfpddkn[i]['thn_ijazah'];
                var loksi = dfpddkn[i]['lokasi'];
                var ketrg = dfpddkn[i]['keterangan'];
                var logo_ppdkn = dfpddkn[i]['logo'];
     
                var idpk = "li_pendidikan"+tngkt.replaceAll(" ", ""); 
                var rw ='<li id="'+idpk+'" >'   
                +'<div class="shadow-sm card p-2 mb-2">'
                    +'<div class="d-flex justify-content-between">'
                        +'<div class="d-flex flex-row align-items-center">'
                            +'<div class="icon"> <img src="'+logo_ppdkn+'" class="img-circle avatar center" style="width: 50px; height: 50px;" /></div>'
                            +'<div class="text-left col">'
                                +'<h3 class="mb-0" >'+tngkt+'</h3>'
                                +'<span>'+nmpdk+'</span>'
                            +'</div>'
                        +'</div>' 
                    +'</div>'
                    +'<div class="row">' 
                        +'<div class="text-left col">'
                            +'<div class="input-group ">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                        +'<a style="font-size: 12px; color:black; ">Kota</a>'
                                    +'</span>'
                                +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+loksi+'</a>'
                            +'</div>'
                        +'</div>'
                        +'<div class="text-right"  style="padding: 0 12px 0 5px !important;">'
                            +'<div class="input-group ">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                        +'<a style="font-size: 12px; color:black; ">Tahun</a>'
                                    +'</span>'
                                +'</div> <a style="font-size: 12px; color:black; min-width: 40px; padding-right:5px;" > : '+thniz+'</a>'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">Jurusan</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black; min-width: 40px;  padding-right:5px;"> :  '+jrsnp+'</a>'
                        +'</div>'
                    +'</div>'
                    +'<div class="text-left">'
                        +'<div class="input-group ">'
                            +'<div class="input-group-prepend">'
                                +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 80px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">Keterangan</a>'
                                +'</span>'
                            +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+ketrg+'</a>'
                        +'</div>'
                    +'</div>' 
                +'</div>'
            +'</li>';    
            $('#ul_detpendidikan').append(rw);   
            }   
        }
        
    }
    </script>
    <script>
        function btn_wanow(){ 
    var wanow = $('#tx_wamap').val();

  location.href = "https://api.whatsapp.com/send?phone="+wanow+"&text=%20";
    // document.getElementById('mdl_carikrwn').style.display='none';  
}
function myMap() {  
        // var mapOptions1 = {  
        //   center: new google.maps.LatLng(51.508742,-0.120850),  
        //   zoom:9,  
        //   mapTypeId: google.maps.MapTypeId.ROADMAP  
        // };  
        
        var lokasi =  {lat: parseFloat(document.getElementById('tx_lat').value), lng: parseFloat(document.getElementById('tx_long').value)};
        var mapOptions2 = {  
          center: new google.maps.LatLng(lokasi),  
          zoom:18,  
          mapTypeId: google.maps.MapTypeId.SATELLITE  
        };  
        // The marker, positioned at Uluru
        
        // var mapOptions3 = {  
        //   center: new google.maps.LatLng(51.508742,-0.120850),  
        //   zoom:9,  
        //   mapTypeId: google.maps.MapTypeId.HYBRID  
        // };  
        // var mapOptions2 = {  
        //   center: new google.maps.LatLng(51.508742,-0.120850),  
        //   zoom:9,  
        //   mapTypeId: google.maps.MapTypeId.TERRAIN  
        // };  
        // var map1 = new google.maps.Map(document.getElementById("googleMap"),mapOptions1);  
        var map2 = new google.maps.Map(document.getElementById("map"),mapOptions2);  
        const marker = new google.maps.Marker({
            position: lokasi,
            map: map2,
        });
        // var map3 = new google.maps.Map(document.getElementById("googleMap3"),mapOptions3);  
        // var map4 = new google.maps.Map(document.getElementById("googleMap4"),mapOptions4);  
      }  

    //   google.maps.event.addDomListener(window, "load", myMap);
    </script>


    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfFB3dsyGmzSihW3x1P1yAEyq3Kdp49NY&callback=myMap&v=weekly"
        async></script><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/hris/modal/mdl_carikaryawannip.blade.php ENDPATH**/ ?>