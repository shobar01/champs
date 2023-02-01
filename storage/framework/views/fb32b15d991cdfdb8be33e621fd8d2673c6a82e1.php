
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.'); ?>
<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('public/resource/css/style_viewcogs.css')); ?>" rel="stylesheet" type="text/css">

<style>
    .icon {
        width: 50px;
        height: 50px;
        background-color: #eee;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 39px
    }

    .iconarrow {

        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px
    }

    .badgekuning {
        background-color: #FEBD01;
        /* width: 60px; */
        height: 20px;
        border-radius: 5px;
        padding-left: 2px;
        padding-right: 2px;
        display: flex;
        color: #000;
        font-size: 10px !important;
        font-weight: 200;
        justify-content: center;
        align-items: center
    }

    .badgered {
        background-color: #cc1a0b;
        /* width: 60px; */
        height: 20px;
        padding-bottom: 3px;
        border-radius: 5px;
        padding-left: 2px;
        padding-right: 2px;
        display: flex;
        color: #ffffff;
        font-size: 10px !important;
        font-weight: 200;
        justify-content: center;
        align-items: center
    }

    .tx16 {
        font-size: 16px;
        font-weight: 600
    }

    .tx12 {
        font-size: 12px;
        font-weight: 600
    }

    .text2 {
        color: #a5aec0
    }

    .card {
        /* border: none; */
        border-radius: 10px
    }

    .btn-danger {
        color: #fff !important;
        background-color: #cc1a0b !important;
        border-color: #cc1a0b !important;
    }

    .fixed-plugin .fixed-plugin-button {
        background: #fff;
        border-radius: 15px;
        bottom: 50px;
        right: 20px;
        font-size: 1.25rem;
        z-index: 990;
        box-shadow: 0 2px 12px 0 rgb(0 0 0 / 16%);
        cursor: pointer;
    }
    .fixed-plugin .fixed-plugin-button {
        background: #cc1a0b !important;
        font-size: 0.25rem !important;
    }
    .material-icons {
        font-size: 16px !important;
        font-style: normal;
    }
    /* .btn { 
        padding: 0rem !important; 
    }
    .btn-link {
        color: #000;  
         text-decoration: none ;
    }
    .btn-link:hover {
        color: #000;  
         text-decoration: none ;
    } */
</style>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

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
        background-color: rgba(0,0,0,.03);
        border-bottom: 1px solid rgba(0,0,0,.125);
        
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
    
    .btn.focus, .btn:focus {
        outline: 0;
        box-shadow: 0 0 0 0 rgb(0 123 255 / 25%) !important;
    }
    .btn-group-lg>.btn, .btn-lg {
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


<div class="container" style="padding-top: 70px; padding-right: 10px; padding-left: 10px;  min-height: 100% !important;
height: 130vh; "> 
  
    <div class=" mb-3 ">
        <div class="card mb-4 shadow-sm ">
            <form id="form_ppk" action="<?php echo e(route('simpan_ppk')); ?>" method="POST" enctype="multipart/form-data" onkeypress="return event.keyCode !=13">
                <?php echo csrf_field(); ?> 
                <input type="hidden" id="tx_reqnip" name="tx_reqnip"  value="<?php echo e($nip); ?>" required> 
                <input type="hidden" id="tx_reqnmusr" name="tx_reqnmusr" value="<?php echo e($nm_lengkap); ?>" required>
                <input type="hidden" id="tx_kdakses" name="tx_kdakses" value="<?php echo e($kdakses); ?>" required>
                <div class="fw-container">
                    <div id="accordion">
                    <div class="accordion" id="faq">
                        
                        
                        <div class="mb-1 mx-2">
                            <div class="card shadow-sm" id="headingOne"> 
                                <a href="#"  class="btn btn-header-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Detail Keluarga
                                </a> 
                            </div>
                        
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body" style="padding: 5px 5px 10px 5px !important;"> 
                                <?php if($df_kelrga == '0'): ?> 
                                <div class="text-center " id="empt_kel">
                                    <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>"
                                        background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 420px;" loop
                                        autoplay>
                                    </lottie-player>
                                    
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                                </div>
                                <?php else: ?> 
                                <ul style="overflow-x: hidden; list-style-type: none; padding: 5px;" id="ul_kel">    

                                    <?php $__currentLoopData = $df_kelrga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <li  
                                    <?php if($jsdfppk['head_kdupdpeg'] == 0): ?>
                                    onclick="btn_editkk('<?php echo e($dfdet['urutan']); ?>')" 
                                    <?php endif; ?> 
                                    id='li_kel<?php echo e(str_replace(' ','', $dfdet['nm_anggota'])); ?>'> 
                                    <input type="hidden" id="sttuskel_<?php echo e($dfdet['urutan']); ?>" name="kel_sttuskel[]" value="<?php echo e($dfdet['status_kel']); ?>" required>
                                    <input type="hidden" id="nmanggt_<?php echo e($dfdet['urutan']); ?>" name="kel_nmanggt[]" value="<?php echo e($dfdet['nm_anggota']); ?>" required>
                                    <input type="hidden" id="kk_<?php echo e($dfdet['urutan']); ?>" name="kel_kk[]" value="<?php echo e($dfdet['no_kk']); ?>" required>
                                    <input type="hidden" id="niik_<?php echo e($dfdet['urutan']); ?>" name="kel_niik[]" value="<?php echo e($dfdet['nik']); ?>" required>
                                    <input type="hidden" id="jnsklmn_<?php echo e($dfdet['urutan']); ?>" name="kel_jnsklmn[]" value="<?php echo e($dfdet['jns_kelamin']); ?>" required>
                                    <input type="hidden" id="tmptlhr_<?php echo e($dfdet['urutan']); ?>" name="kel_tmptlhr[]" value="<?php echo e($dfdet['tpt_lahir']); ?>" required>
                                    <input type="hidden" id="tgllhr_<?php echo e($dfdet['urutan']); ?>" name="kel_tgllhr[]" value="<?php echo e($dfdet['tgl_lahir']); ?>" required>
                                    <input type="hidden" id="umur_<?php echo e($dfdet['urutan']); ?>" name="kel_umur[]" value="<?php echo e($dfdet['umur']); ?>" required>
                                    <input type="hidden" id="tlpon_<?php echo e($dfdet['urutan']); ?>" name="kel_tlpon[]" value="<?php echo e($dfdet['telepon']); ?>" required>
                                    <input type="hidden" id="profesi_<?php echo e($dfdet['urutan']); ?>" name="kel_profesi[]" value="<?php echo e($dfdet['profesi']); ?>" required> 
                                    <input type="hidden" id="tngktpddknkk_<?php echo e($dfdet['urutan']); ?>" name="kel_tngktpddknkk[]" value="<?php echo e($dfdet['pendidikan']); ?>" required>
                                    <input type="hidden" id="rmh_<?php echo e($dfdet['urutan']); ?>" name="kel_rmh[]" value="<?php echo e($dfdet['alamat_rmh1']); ?>" required>
                                        <div class="shadow-sm card p-2 mb-2">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="icon"> <img src="<?php echo e($dfdet['logo']); ?>" class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" /></div>
                                                    <div class="text-left col">
                                                        <h3 class="mb-0" id="html_sttuskel_<?php echo e($dfdet['urutan']); ?>"  ><?php echo e(substr($dfdet['status_kel'],2)); ?> </h3>
                                                        <span id="html_nmanggt_<?php echo e($dfdet['urutan']); ?>" ><?php echo e($dfdet['nm_anggota']); ?></span>
                                                    </div>
                                                </div>
                                                <?php if($jsdfppk['head_kdupdpeg'] != 0): ?>
                                                <div
                                                    class="<?php if($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F'): ?> badgered <?php elseif($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F'): ?> badgekuning <?php endif; ?>">
                                                    <span><?php if($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F'): ?> Di Tolak <?php elseif($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F'): ?> Menunggu <?php endif; ?></span>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">No KK</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_kk_<?php echo e($dfdet['urutan']); ?>" > :
                                                        <?php echo e($dfdet['no_kk']); ?></a>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">No NIK</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;" id="html_niik_<?php echo e($dfdet['urutan']); ?>" > :
                                                        <?php echo e($dfdet['nik']); ?></a>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Jenis Kelamin</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_jnsklmn_<?php echo e($dfdet['urutan']); ?>"> :
                                                        <?php echo e(substr($dfdet['jns_kelamin'],2)); ?></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-left col">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">TTL</a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black; min-width: 90px;" id="html_ttl_<?php echo e($dfdet['urutan']); ?>"> :
                                                            <?php echo e($dfdet['tpt_lahir']); ?>, <?php echo e($dfdet['tgl_lahir']); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-left col">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Umur/Usia</a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black; min-width: 90px;" id="html_umur_<?php echo e($dfdet['urutan']); ?>" > :
                                                            <?php echo e($dfdet['umur']); ?> Tahun</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">No Hp</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_tlpon_<?php echo e($dfdet['urutan']); ?>" > :
                                                        <?php echo e($dfdet['telepon']); ?></a>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Pendidikan</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_tngktpddknkk_<?php echo e($dfdet['urutan']); ?>" > :
                                                        <?php echo e($dfdet['pendidikan']); ?></a>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Profesi</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_profesi_<?php echo e($dfdet['urutan']); ?>" > :
                                                        <?php echo e($dfdet['profesi']); ?></a>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Alamat</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_rmh_<?php echo e($dfdet['urutan']); ?>" > :
                                                        <?php echo e($dfdet['alamat_rmh1']); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </ul>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mx-5 mt-2 pb-2">
                                <?php if($jsdfppk['head_kdupdpeg'] == 0): ?> 
                                    <?php 
                                    if($df_kelrga == '0'){ 
                                        $jmlklrga = 0;
                                    }else{ 
                                        $jmlklrga = count($df_kelrga);
                                    }
                                    ?>
                                    <button type="button"
                                        class="form-control btn-lg  submit px-3 shadow algin-middle"
                                        style="border-radius: 5px !important; background-color: black; color:white;"
                                        onclick="btn_tmbkk(<?php echo e($jmlklrga); ?>)">Tambah Keluarga</button>
                                <?php endif; ?> 
                            </div>
                            </div>
                        </div> 
                        
                        <div class="mb-1 mx-2">
                            <div class="card shadow-sm" id="headingTwo"> 
                                <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Detail Pendidikan
                                </a> 
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body" style="padding: 5px 5px 10px 5px !important;"> 
                                <?php if($df_pendidikn == '0'): ?> 
                                <div class="text-center ">
                                    <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>"
                                        background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 420px;" loop
                                        autoplay>
                                    </lottie-player>
                                    
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                                </div>
                                <?php else: ?>
                                <ul style="overflow-x: hidden; list-style-type: none; padding: 5px;" id="ul_pnddkn">
                                    <?php $__currentLoopData = $df_pendidikn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li id="li_pendidikan<?php echo e(str_replace(' ','', $dfdet['tk_sekolah'])); ?>" 
                                    <?php if($jsdfppk['head_kdupdpeg'] == 0): ?> 
                                    onclick="btn_editpddkn('<?php echo e($dfdet['urutan']); ?>')"
                                    <?php endif; ?>>
                                    <input type="hidden" id="tksklh_<?php echo e($dfdet['urutan']); ?>" name="pddkn_tksklh[]" value="<?php echo e($dfdet['tk_sekolah']); ?>" required> 
                                    <input type="hidden" id="sklh_<?php echo e($dfdet['urutan']); ?>" name="pddkn_sklh[]" value="<?php echo e($dfdet['nm_sekolah']); ?>" required> 
                                    <input type="hidden" id="lksi_<?php echo e($dfdet['urutan']); ?>" name="pddkn_lksi[]" value="<?php echo e($dfdet['lokasi']); ?>" required> 
                                    <input type="hidden" id="thnijzh_<?php echo e($dfdet['urutan']); ?>" name="pddkn_thnijzh[]" value="<?php echo e($dfdet['thn_ijazah']); ?>" required> 
                                    <input type="hidden" id="jurusan_<?php echo e($dfdet['urutan']); ?>" name="pddkn_jurusan[]" value="<?php echo e($dfdet['jurusan']); ?>" required> 
                                    <input type="hidden" id="ketrngn_<?php echo e($dfdet['urutan']); ?>" name="pddkn_ketrngn[]" value="<?php echo e($dfdet['keterangan']); ?>" required>  
                                    
                        
                                    
                                        <div class="shadow-sm card p-2 mb-2">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="icon"> <img src="<?php echo e($dfdet['logo']); ?>" class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" /> </div>
                                                    <div class="text-left col">
                                                        <h3 class="mb-0" id="html_tksklh_<?php echo e($dfdet['urutan']); ?>"><?php echo e($dfdet['tk_sekolah']); ?></h3>
                                                        <span id="html_sklh_<?php echo e($dfdet['urutan']); ?>"><?php echo e($dfdet['nm_sekolah']); ?></span>
                                                    </div>
                                                </div> 
                                                <?php if($jsdfppk['head_kdupdpeg'] != 0): ?>
                                                <div
                                                    class="<?php if($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F'): ?> badgered <?php elseif($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F'): ?> badgekuning <?php endif; ?>">
                                                    <span><?php if($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F'): ?> Di Tolak <?php elseif($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F'): ?> Menunggu <?php endif; ?></span>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                
                                            <div class="row">
                                                <div class="text-left col">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 10px; color:black; min-width: 70px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Kota</a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black; min-width: 90px;"  id="html_lksi_<?php echo e($dfdet['urutan']); ?>"> :
                                                            <?php echo e($dfdet['lokasi']); ?></a>
                                                    </div>
                                                </div>
                                                <div class="text-right" style="padding: 0 10px 0 5px !important;">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 10px; color:black; min-width: 40px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Tahun</a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black; min-width: 40px; padding-right:5px;"  id="html_thnijzh_<?php echo e($dfdet['urutan']); ?>"> :
                                                            <?php echo e($dfdet['thn_ijazah']); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 70px; padding:0px"><a
                                                                style="font-size: 12px; color:black; "  id="html_tksklh_<?php echo e($dfdet['urutan']); ?>">Jurusan</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_jurusan_<?php echo e($dfdet['urutan']); ?>" > :
                                                        <?php echo e($dfdet['jurusan']); ?></a>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 70px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Keterangan</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_ketrngn_<?php echo e($dfdet['urutan']); ?>"> :
                                                        <?php echo e($dfdet['keterangan']); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </div> 
                            <div class="form-group mx-5 mt-2 pb-2">
                                <?php if($jsdfppk['head_kdupdpeg'] == 0): ?> 
                                    <?php 
                                    if($df_pendidikn == '0'){ 
                                        $jmlpnddkn = 0;
                                    }else{ 
                                        $jmlpnddkn = count($df_pendidikn);
                                    }
                                    ?>
                                    <button type="button"
                                        class="form-control btn-lg  submit px-3 shadow algin-middle"
                                        style="border-radius: 5px !important; background-color: black; color:white;"
                                        onclick="btn_tmbhpndidikan(<?php echo e($jmlpnddkn); ?>)">Tambah Pendidikan</button>
                                <?php endif; ?>
                            </div>
                            </div>
                        </div> 
                        
                        
                        <div class="mb-1 mx-2">
                            <div class="card shadow-sm" id="headingThree"> 
                                <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Detail Pengalaman
                                </a> 
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body" style="padding: 5px 5px 10px 5px !important;"> 
                                <?php if($df_pnglman == '0'): ?> 
                                <div class="text-center " id="empt_pnglmn">
                                    <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>"
                                        background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 410px;" loop
                                        autoplay>
                                    </lottie-player>
                                    
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                                </div>
                                
                                <ul style="overflow-x: hidden;   list-style-type: none; padding: 5px;" id="ul_pnglmn">
                                    
                                </ul>
                                <?php else: ?>
                                <ul style="overflow-x: hidden; list-style-type: none; padding: 5px;" id="ul_pnglmn">
                                    <?php $__currentLoopData = $df_pnglman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfdet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li id="li_pt<?php echo e(str_replace(' ','', $dfdet['nm_perusahaan'])); ?>"
                                    <?php if($jsdfppk['head_kdupdpeg'] == 0): ?>  onclick="btn_editpnglmn('<?php echo e($dfdet['urutan']); ?>')" <?php endif; ?>> 
                                        
                                    <input type="hidden" id="nmpt<?php echo e($dfdet['urutan']); ?>" name="pnglmn_nmpt[]" value="<?php echo e($dfdet['nm_perusahaan']); ?>" required>
                                    <input type="hidden" id="jbtn<?php echo e($dfdet['urutan']); ?>" name="pnglmn_jbtn[]" value="<?php echo e($dfdet['jabatan']); ?>" required>
                                    <input type="hidden" id="mskrj<?php echo e($dfdet['urutan']); ?>" name="pnglmn_mskrj[]" value="<?php echo e($dfdet['masa_kerja']); ?>" required>
                                    <input type="hidden" id="gajih<?php echo e($dfdet['urutan']); ?>" name="pnglmn_gajih[]" value="<?php echo e($dfdet['gaji']); ?>" required>
                                    <input type="hidden" id="almat<?php echo e($dfdet['urutan']); ?>" name="pnglmn_almat[]" value="<?php echo e($dfdet['alm_perusahaan']); ?>" required>
                                    <input type="hidden" id="alsan<?php echo e($dfdet['urutan']); ?>" name="pnglmn_alsan[]" value="<?php echo e($dfdet['alasan']); ?>" required>
                                        <div class="shadow-sm card p-2 mb-2">
                                            
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="icon"> <img src="<?php echo e(asset('public/resource/img/hris/pengalaman.png')); ?>"
                                                            class="img-circle avatar center" style="width: 50px; height: 50px;" /></div>
                                                    <div class="text-left col">
                                                        <h3 class="mb-0" id="html_nmpt<?php echo e($dfdet['urutan']); ?>" ><?php echo e($dfdet['nm_perusahaan']); ?></h3>
                                                        <span id="html_jbtn<?php echo e($dfdet['urutan']); ?>" ><?php echo e($dfdet['jabatan']); ?></span>
                                                    </div>
                                                </div> 
                                                <?php if($jsdfppk['head_kdupdpeg'] != 0): ?>
                                                <div
                                                    class="<?php if($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F'): ?> badgered <?php elseif($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F'): ?> badgekuning <?php endif; ?>">
                                                    <span><?php if($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F'): ?> Di Tolak <?php elseif($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F'): ?> Menunggu <?php endif; ?></span>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Gaji</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;" id="html_gajih<?php echo e($dfdet['urutan']); ?>" > :
                                                        Rp. <?php echo e(number_format($dfdet['gaji'], 0, '', '.')); ?></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-left col">
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="" id="basic-addon3"
                                                                style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                    style="font-size: 12px; color:black; ">Kota</a>
                                                            </span>
                                                        </div>
                                                        <a style="font-size: 12px; color:black; min-width: 90px;" id="html_almat<?php echo e($dfdet['urutan']); ?>" > :
                                                            <?php echo e($dfdet['alm_perusahaan']); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Masa Kerja</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;" id="html_mskrj<?php echo e($dfdet['urutan']); ?>" > :
                                                        <?php echo e($dfdet['masa_kerja']); ?></a>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Alasan Keluar</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;" id="html_alsan<?php echo e($dfdet['urutan']); ?>" > :
                                                        <?php echo e($dfdet['alasan']); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mx-5 mt-2 pb-2">
                                <?php if($jsdfppk['head_kdupdpeg'] == 0): ?> 
                                    <?php 
                                    if($df_pnglman == '0'){ 
                                        $jmlpnglmn = 0;
                                    }else{ 
                                        $jmlpnglmn = count($df_pnglman);
                                    }
                                    ?>
                                    <button type="button"
                                        class="form-control btn-lg  submit px-3 shadow algin-middle"
                                        style="border-radius: 5px !important; background-color: black; color:white;"
                                        onclick="btn_tmbhpnglmn(<?php echo e($jmlpnglmn); ?>)">Tambah Pengalaman</button>
                                <?php endif; ?>
                            </div>
                            </div>
                        </div>
                        
                        <div class="my-2 mx-2">
                            <div class="card shadow-sm" id="headingThree" style="background:#cc1a0b;">
                                <h5 class="mb-0">
                                    <a class="btn btn-header" style="color: white" >
                                    Keterangan Tambahan
                                    </a>
                                </h5>
                            </div> 
                            <div class="card-body" style="padding: 3px 0px 10px 0px !important;"> 
                                <div class=" form-group">  
                                    <textarea id="tx_kettmbhn" name="tx_kettmbhn"
                                        class="form-control form-control-sm textleft inptklmjmlbld" cols="40"
                                        rows="5" placeholder="<?php if($jsdfppk['head_kdupdpeg'] == 0): ?> contoh : untuk data detail keluarga , anak tidak memiliki no nik jadi menggunakan no KK. dan mohon segera di proses. <?php else: ?> <?php echo e($jsdfppk['head_ketuser']); ?> <?php endif; ?>" 
                                        style="font-size: 12px;" required  <?php if($jsdfppk['head_kdupdpeg'] != 0): ?> disabled <?php endif; ?>
                                        ></textarea>
                                </div>

                            </div>  
                        </div>
                        
                    </div>
                    </div>
                </div>
            </form> 

        </div>
    </div>
</div>

<?php if($jsdfppk['head_kdupdpeg'] == 0): ?>
<div class="fixed-plugin" onclick="btnsaveppk()">
    <a class="fixed-plugin-button text-white position-fixed px-3 py-2">
       
        <i class="material-icons py-1 fas fa fa-floppy-o"> </i>
        <i class="material-icons py-1 px-1"> Save</i>
    </a>
</div>
<?php endif; ?>
  
<?php echo $__env->make('hris.modal.mdl_pendidikan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('hris.modal.mdl_pengalman', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('hris.modal.mdl_kk', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php echo $__env->make('hris.modal.mdl_waiting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($jsdfppk['head_kdupdpeg'] != 0): ?>
    <?php if($jsdfppk['head_is_proses'] == 'F' && $jsdfppk['head_is_approv']=='F' ): ?>
        <script> 
            // $('#pddkn_url').val('<?php echo e(url("btlknpendidikan")); ?>');
            
            $('#cnt_tolak').remove();
            $('#cnt_disetuji').remove();
            $('#pkk_type').val('menunggu');

            $('#pddkn_kdupdpeg').val("<?php echo e($jsdfppk['head_kdupdpeg']); ?>");
            // $('#pddkn_url').val('<?php echo e(url("btlknpendidikan")); ?>');
            document.getElementById('mdl_waiting').style.display='block';  
            // alert('menunggu proses bisa dibatalkan');
        </script>
    <?php endif; ?>
    <?php if($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv']=='F'): ?>
        <script>
            
            $('#cnt_menunggu').remove();
            $('#cnt_disetuji').remove();
            $('#pkk_type').val('ditolak');
            $('#pddkn_kdupdpeg').val("<?php echo e($jsdfppk['head_kdupdpeg']); ?>");
            $('#tx_kettolak').html('Di Tolak'+' oleh '+"<?php echo e($jsdfppk['head_updated_by']); ?>"+' : '+"<?php echo e($jsdfppk['head_ket_hrd']); ?>"+"<br>Silahkan Mengajuakan permohonan Kembali.");
            document.getElementById('mdl_waiting').style.display='block';  
            // alert('Di Tolak'+' oleh '+"<?php echo e($jsdfppk['head_updated_by']); ?>"+' : '+"<?php echo e($jsdfppk['head_ket_hrd']); ?>"); 
        </script>
    <?php endif; ?>
    <?php if($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv']=='T'): ?>
        <script>
            $('#cnt_tolak').remove();
            $('#cnt_menunggu').remove();
            $('#pkk_type').val('disetujui');
            $('#pddkn_kdupdpeg').val("<?php echo e($jsdfppk['head_kdupdpeg']); ?>");
            $('#tx_ketdisetuji').html('Di Setujui'+' oleh '+"<?php echo e($jsdfppk['head_updated_by']); ?>"+' : '+"<?php echo e($jsdfppk['head_ket_hrd']); ?>");
            document.getElementById('mdl_waiting').style.display='block';  
            // alert('Di Tolak'+' oleh '+"<?php echo e($jsdfppk['head_updated_by']); ?>"+' : '+"<?php echo e($jsdfppk['head_ket_hrd']); ?>"); 
        </script>
    <?php endif; ?>
<?php endif; ?>

<script>
    $.ajax({
        //other parameters
        success: function () {
            $("#id_footerr").addClass('fixed-bottom');
        }
    }); 
    function btn_editpddkn(urutan){     
            // kdupdpeg, nip, tk_sekolah, nm_sekolah, lokasi, thn_ijazah, jurusan, keterangan, is_proses, is_approve, ket_hrd, updated_by,sttus  
                
        var tksklah      = $('#tksklh_'+urutan+'').val();
        var nmsklah      = $('#sklh_'+urutan+'').val();
        var lokasis      = $('#lksi_'+urutan+'').val(); 
        var thnijzh      = $('#thnijzh_'+urutan+'').val(); 
        var jurasan      = $('#jurusan_'+urutan+'').val();  
        var ktrangn      = $('#ketrngn_'+urutan+'').val();    
             
        $('#tx_tngktpddkn').val(tksklah);
        $('#tx_nmpddkn').val(nmsklah);
        $('#tx_jrsnpddkn').val(jurasan);
        $('#tx_thnijzhpddkn').val(thnijzh);
        $('#tx_lokasipddkn').val(lokasis);
        $('#tx_ketpddkn').val(ktrangn);  

        $('#tx_urtanpddkn').val(urutan); 
        $('#tx_typepddkn').val('Update'); 
        $('#tx_tittlepddkn').html('Update Pendidikan'); 
        $('#tx_tngktpddkn').append("<option value='"+tksklah+"' style='font-size:12px !important' selected>"+tksklah+"</option>");
        document.getElementById("tx_tngktpddkn").disabled = true;  
        $('#btn_tmbah').html('Update'); 
        $('.selectpicker').selectpicker('refresh'); 
        document.getElementById('mdl_tmbhpendidikan').style.display='block';    
    }  
    function btn_editkk(urutan){  
        var sttskl      = $('#sttuskel_'+urutan+'').val();
        var nmanggt     = $('#nmanggt_'+urutan+'').val(); 
        var nokk        = $('#kk_'+urutan+'').val(); 
        var nonik       = $('#niik_'+urutan+'').val();   
        var jnsklmn     = $('#jnsklmn_'+urutan+'').val();   
        var tmptlhr     = $('#tmptlhr_'+urutan+'').val();   
        var tgllhr      = $('#tgllhr_'+urutan+'').val();  
        var umur        = $('#umur_'+urutan+'').val();   
        var telepon     = $('#tlpon_'+urutan+'').val();     
        var profesi     = $('#profesi_'+urutan+'').val();     
        var tkpddkn     = $('#tngktpddknkk_'+urutan+'').val();     
        var almtrmh     = $('#rmh_'+urutan+'').val();   
        console.log('=='+profesi);
            // Update 
            $('#tx_sttkk').val(sttskl);
            $('#tx_kknkk').val(nokk);
            $('#tx_kknik').val(nonik);
            $('#tx_agtkk').val(nmanggt);
            $('#tx_tmptkk').val(tmptlhr);
            $('#tx_tglkk').val(tgllhr);
            $('#tx_jkkk').val(jnsklmn);
            $('#tx_usiakk').val(umur);
            $('#tx_hpkk').val(telepon);
            $('#tx_almtkk').val(almtrmh);
            $('#tx_profesi').val(profesi);
            $('#tx_tngktpddknkk').val(tkpddkn);
            $('#tx_urtankel').val(urutan);

            $('#tx_typekel').val('Update');
            $('#tx_tittle').html('Update Kartu Keluarga');   
            $('#btn_submitkk').html('Update');
            document.getElementById("tx_sttkk").disabled = true;  
            
            $('#btn_keldelt').attr('disabled', false);  
            $('.selectpicker').selectpicker('refresh');   

            document.getElementById('mdl_tmbhkk').style.display='block'; 
    }
    function btn_editpnglmn(urutan){   

        var prshn     = $('#nmpt'+urutan+'').val();
        var jbtan     = $('#jbtn'+urutan+'').val(); 
        var mskrj     = $('#mskrj'+urutan+'').val(); 
        var gajih     = $('#gajih'+urutan+'').val();   
        var almat     = $('#almat'+urutan+'').val();   
        var alsan     = $('#alsan'+urutan+'').val();   

        $('#tx_pnglmnpt').val(prshn);
        $('#tx_pnglmnjbtn').val(jbtan);
        $('#tx_pnglmnmskerja').val(mskrj);
        $('#tx_pnglmngji').val(gajih);
        $('#tx_pnglmnalmtprshan').val(almat);
        $('#tx_pnglmnalsn').val(alsan);   
          
        $('#tx_urtanpnglmn').val(urutan);  
            // Update   
        $('#tx_typepnglmn').val('Update'); 
        $('#tx_tittlepnlmn').html('Update Pengalaman'); 
        $('#btn_submtpnglmn').html('Update'); 
        $('#btn_pnglmndelt').attr('disabled', false);  
        document.getElementById('mdl_tmbhpenglmn').style.display='block';  
    }
    function btn_tmbhpnglmn(xcnt){    
        
        addRow = xcnt; 
        
        addRow++;
        console.log(addRow);
        $('#tx_typepnglmn').val('Tambah'); 
        $('#tx_tittlepnlmn').html('Tambah Pengalaman'); 
        $('#btn_submtpnglmn').html('Tambah');  
        $('#tx_urtanpnglmn').val(addRow);  
            
        $('#btn_pnglmndelt').attr('disabled', true);  
        document.getElementById('mdl_tmbhpenglmn').style.display='block';  
    } 
    function btn_tmbhpndidikan(xcnt){    
        
        addRow = xcnt; 
        
        addRow++;
        console.log(addRow);
        // $('#tx_typepnglmn').val('Tambah'); 
        // $('#tx_tittlepnlmn').html('Tambah Pengalaman'); 
        // $('#btn_submtpnglmn').html('Tambah');  
        // $('#tx_urtanpnglmn').val(addRow);  
            
        // $('#btn_pnglmndelt').attr('disabled', true);  
         
        $('#tx_typepddkn').val('Tambah'); 
        $('#tx_tittlepddkn').html('Tambah Pendidikan'); 
        $('#btn_tmbah').html('Tambah');  
        $('#tx_tngktpddkn').empty().append("<?php $__currentLoopData = $df_tkpddkn1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $df): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"+"<option value='<?php echo e($df['tk_pendidikan']); ?>'style='font-size:12px !important'><?php echo e($df['tk_pendidikan']); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"); 
        
        document.getElementById("tx_tngktpddkn").disabled = false; 
        $('.selectpicker').selectpicker('refresh'); 
        document.getElementById('mdl_tmbhpendidikan').style.display='block';   
    }  
    
    function btn_tmbkk(x){  
            addRow = x;
            addRow++;
            console.log(addRow); 

        $('#tx_tittle').html('Tambah Kartu Keluarga');
        $('#tx_typekel').val('Tambah');  
        $('#btn_submitkk').html('Tambah'); 
        $('#tx_urtankel').val(addRow); 
        
        $('#btn_keldelt').attr('disabled', true);  
        
        document.getElementById("tx_sttkk").disabled = false;  
            $('.selectpicker').selectpicker('refresh');   
        document.getElementById('mdl_tmbhkk').style.display='block';  
    }  
    function btnsaveppk(){
        Swal.fire({
            text: "Apakah anda yakin akan menyimpannya?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            cancelButtonText: "Tidak",
            confirmButtonText: 'Ya, Simpan!' ,
            reverseButtons: true,
            allowOutsideClick: false 
        }).then((result) => {
            if (result.isConfirmed)
        { 
            event.preventDefault(); 
            loadingon(); 
            $('#form_ppk').submit() 
        }
    })
    }
</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_presence', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/hris/ppk.blade.php ENDPATH**/ ?>