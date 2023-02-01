@extends('layouts.layout_presence')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content')
<link href="{{asset('public/resource/css/style_viewcogs.css')}}" rel="stylesheet" type="text/css">

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
            <form id="form_ppk" action="{{route('simpan_ppk')}}" method="POST" enctype="multipart/form-data" onkeypress="return event.keyCode !=13">
                @csrf 
                <input type="hidden" id="tx_reqnip" name="tx_reqnip"  value="{{$nip}}" required> 
                <input type="hidden" id="tx_reqnmusr" name="tx_reqnmusr" value="{{$nm_lengkap}}" required>
                <input type="hidden" id="tx_kdakses" name="tx_kdakses" value="{{$kdakses}}" required>
                <div class="fw-container">
                    <div id="accordion">
                    <div class="accordion" id="faq">
                        
                        {{-- Keluarga --}}
                        <div class="mb-1 mx-2">
                            <div class="card shadow-sm" id="headingOne"> 
                                <a href="#"  class="btn btn-header-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Detail Keluarga
                                </a> 
                            </div>
                        
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body" style="padding: 5px 5px 10px 5px !important;"> 
                                @if ($df_kelrga == '0') 
                                <div class="text-center " id="empt_kel">
                                    <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}"
                                        background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 420px;" loop
                                        autoplay>
                                    </lottie-player>
                                    
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                                </div>
                                @else 
                                <ul style="overflow-x: hidden; list-style-type: none; padding: 5px;" id="ul_kel">    

                                    @foreach ($df_kelrga as $dfdet) 
                                    <li  
                                    @if ($jsdfppk['head_kdupdpeg'] == 0)
                                    onclick="btn_editkk('{{$dfdet['urutan']}}')" 
                                    @endif 
                                    id='li_kel{{str_replace(' ','', $dfdet['nm_anggota'])}}'> 
                                    <input type="hidden" id="sttuskel_{{$dfdet['urutan']}}" name="kel_sttuskel[]" value="{{$dfdet['status_kel']}}" required>
                                    <input type="hidden" id="nmanggt_{{$dfdet['urutan']}}" name="kel_nmanggt[]" value="{{$dfdet['nm_anggota']}}" required>
                                    <input type="hidden" id="kk_{{$dfdet['urutan']}}" name="kel_kk[]" value="{{$dfdet['no_kk']}}" required>
                                    <input type="hidden" id="niik_{{$dfdet['urutan']}}" name="kel_niik[]" value="{{$dfdet['nik']}}" required>
                                    <input type="hidden" id="jnsklmn_{{$dfdet['urutan']}}" name="kel_jnsklmn[]" value="{{$dfdet['jns_kelamin']}}" required>
                                    <input type="hidden" id="tmptlhr_{{$dfdet['urutan']}}" name="kel_tmptlhr[]" value="{{$dfdet['tpt_lahir']}}" required>
                                    <input type="hidden" id="tgllhr_{{$dfdet['urutan']}}" name="kel_tgllhr[]" value="{{$dfdet['tgl_lahir']}}" required>
                                    <input type="hidden" id="umur_{{$dfdet['urutan']}}" name="kel_umur[]" value="{{$dfdet['umur']}}" required>
                                    <input type="hidden" id="tlpon_{{$dfdet['urutan']}}" name="kel_tlpon[]" value="{{$dfdet['telepon']}}" required>
                                    <input type="hidden" id="profesi_{{$dfdet['urutan']}}" name="kel_profesi[]" value="{{$dfdet['profesi']}}" required> 
                                    <input type="hidden" id="tngktpddknkk_{{$dfdet['urutan']}}" name="kel_tngktpddknkk[]" value="{{$dfdet['pendidikan']}}" required>
                                    <input type="hidden" id="rmh_{{$dfdet['urutan']}}" name="kel_rmh[]" value="{{$dfdet['alamat_rmh1']}}" required>
                                        <div class="shadow-sm card p-2 mb-2">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="icon"> <img src="{{$dfdet['logo']}}" class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" /></div>
                                                    <div class="text-left col">
                                                        <h3 class="mb-0" id="html_sttuskel_{{$dfdet['urutan']}}"  >{{substr($dfdet['status_kel'],2)}} </h3>
                                                        <span id="html_nmanggt_{{$dfdet['urutan']}}" >{{$dfdet['nm_anggota']}}</span>
                                                    </div>
                                                </div>
                                                @if ($jsdfppk['head_kdupdpeg'] != 0)
                                                <div
                                                    class="@if ($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F') badgered @elseif ($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F') badgekuning @endif">
                                                    <span>@if ($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F') Di Tolak @elseif ($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F') Menunggu @endif</span>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">No KK</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_kk_{{$dfdet['urutan']}}" > :
                                                        {{$dfdet['no_kk']}}</a>
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
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;" id="html_niik_{{$dfdet['urutan']}}" > :
                                                        {{$dfdet['nik']}}</a>
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
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_jnsklmn_{{$dfdet['urutan']}}"> :
                                                        {{substr($dfdet['jns_kelamin'],2)}}</a>
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
                                                        <a style="font-size: 12px; color:black; min-width: 90px;" id="html_ttl_{{$dfdet['urutan']}}"> :
                                                            {{$dfdet['tpt_lahir']}}, {{$dfdet['tgl_lahir']}}</a>
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
                                                        <a style="font-size: 12px; color:black; min-width: 90px;" id="html_umur_{{$dfdet['urutan']}}" > :
                                                            {{$dfdet['umur']}} Tahun</a>
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
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_tlpon_{{$dfdet['urutan']}}" > :
                                                        {{$dfdet['telepon']}}</a>
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
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_tngktpddknkk_{{$dfdet['urutan']}}" > :
                                                        {{$dfdet['pendidikan']}}</a>
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
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_profesi_{{$dfdet['urutan']}}" > :
                                                        {{$dfdet['profesi']}}</a>
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
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_rmh_{{$dfdet['urutan']}}" > :
                                                        {{$dfdet['alamat_rmh1']}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li> 
                                    @endforeach 
                                </ul>
                                @endif
                            </div>
                            <div class="form-group mx-5 mt-2 pb-2">
                                @if ($jsdfppk['head_kdupdpeg'] == 0) 
                                    @php 
                                    if($df_kelrga == '0'){ 
                                        $jmlklrga = 0;
                                    }else{ 
                                        $jmlklrga = count($df_kelrga);
                                    }
                                    @endphp
                                    <button type="button"
                                        class="form-control btn-lg  submit px-3 shadow algin-middle"
                                        style="border-radius: 5px !important; background-color: black; color:white;"
                                        onclick="btn_tmbkk({{$jmlklrga}})">Tambah Keluarga</button>
                                @endif 
                            </div>
                            </div>
                        </div> 
                        {{-- Pendidikan --}}
                        <div class="mb-1 mx-2">
                            <div class="card shadow-sm" id="headingTwo"> 
                                <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Detail Pendidikan
                                </a> 
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body" style="padding: 5px 5px 10px 5px !important;"> 
                                @if ($df_pendidikn == '0') 
                                <div class="text-center ">
                                    <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}"
                                        background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 420px;" loop
                                        autoplay>
                                    </lottie-player>
                                    
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                                </div>
                                @else
                                <ul style="overflow-x: hidden; list-style-type: none; padding: 5px;" id="ul_pnddkn">
                                    @foreach ($df_pendidikn as $dfdet)
                                    <li id="li_pendidikan{{str_replace(' ','', $dfdet['tk_sekolah'])}}" 
                                    @if ($jsdfppk['head_kdupdpeg'] == 0) 
                                    onclick="btn_editpddkn('{{$dfdet['urutan']}}')"
                                    @endif>
                                    <input type="hidden" id="tksklh_{{$dfdet['urutan']}}" name="pddkn_tksklh[]" value="{{$dfdet['tk_sekolah']}}" required> 
                                    <input type="hidden" id="sklh_{{$dfdet['urutan']}}" name="pddkn_sklh[]" value="{{$dfdet['nm_sekolah']}}" required> 
                                    <input type="hidden" id="lksi_{{$dfdet['urutan']}}" name="pddkn_lksi[]" value="{{$dfdet['lokasi']}}" required> 
                                    <input type="hidden" id="thnijzh_{{$dfdet['urutan']}}" name="pddkn_thnijzh[]" value="{{$dfdet['thn_ijazah']}}" required> 
                                    <input type="hidden" id="jurusan_{{$dfdet['urutan']}}" name="pddkn_jurusan[]" value="{{$dfdet['jurusan']}}" required> 
                                    <input type="hidden" id="ketrngn_{{$dfdet['urutan']}}" name="pddkn_ketrngn[]" value="{{$dfdet['keterangan']}}" required>  
                                    {{-- onclick="btn_dfpddkn"> --}}
                        
                                    
                                        <div class="shadow-sm card p-2 mb-2">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="icon"> <img src="{{$dfdet['logo']}}" class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" /> </div>
                                                    <div class="text-left col">
                                                        <h3 class="mb-0" id="html_tksklh_{{$dfdet['urutan']}}">{{$dfdet['tk_sekolah']}}</h3>
                                                        <span id="html_sklh_{{$dfdet['urutan']}}">{{$dfdet['nm_sekolah']}}</span>
                                                    </div>
                                                </div> 
                                                @if ($jsdfppk['head_kdupdpeg'] != 0)
                                                <div
                                                    class="@if ($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F') badgered @elseif ($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F') badgekuning @endif">
                                                    <span>@if ($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F') Di Tolak @elseif ($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F') Menunggu @endif</span>
                                                </div>
                                                @endif
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
                                                        <a style="font-size: 12px; color:black; min-width: 90px;"  id="html_lksi_{{$dfdet['urutan']}}"> :
                                                            {{$dfdet['lokasi']}}</a>
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
                                                        <a style="font-size: 12px; color:black; min-width: 40px; padding-right:5px;"  id="html_thnijzh_{{$dfdet['urutan']}}"> :
                                                            {{$dfdet['thn_ijazah']}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 70px; padding:0px"><a
                                                                style="font-size: 12px; color:black; "  id="html_tksklh_{{$dfdet['urutan']}}">Jurusan</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_jurusan_{{$dfdet['urutan']}}" > :
                                                        {{$dfdet['jurusan']}}</a>
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
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;"  id="html_ketrngn_{{$dfdet['urutan']}}"> :
                                                        {{$dfdet['keterangan']}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div> 
                            <div class="form-group mx-5 mt-2 pb-2">
                                @if ($jsdfppk['head_kdupdpeg'] == 0) 
                                    @php 
                                    if($df_pendidikn == '0'){ 
                                        $jmlpnddkn = 0;
                                    }else{ 
                                        $jmlpnddkn = count($df_pendidikn);
                                    }
                                    @endphp
                                    <button type="button"
                                        class="form-control btn-lg  submit px-3 shadow algin-middle"
                                        style="border-radius: 5px !important; background-color: black; color:white;"
                                        onclick="btn_tmbhpndidikan({{$jmlpnddkn}})">Tambah Pendidikan</button>
                                @endif
                            </div>
                            </div>
                        </div> 
                        
                        {{-- Pengalaman --}}
                        <div class="mb-1 mx-2">
                            <div class="card shadow-sm" id="headingThree"> 
                                <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Detail Pengalaman
                                </a> 
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body" style="padding: 5px 5px 10px 5px !important;"> 
                                @if ($df_pnglman == '0') 
                                <div class="text-center " id="empt_pnglmn">
                                    <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}"
                                        background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 410px;" loop
                                        autoplay>
                                    </lottie-player>
                                    
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                                </div>
                                
                                <ul style="overflow-x: hidden;   list-style-type: none; padding: 5px;" id="ul_pnglmn">
                                    
                                </ul>
                                @else
                                <ul style="overflow-x: hidden; list-style-type: none; padding: 5px;" id="ul_pnglmn">
                                    @foreach ($df_pnglman as $dfdet)
                                    <li id="li_pt{{str_replace(' ','', $dfdet['nm_perusahaan'])}}"
                                    @if ($jsdfppk['head_kdupdpeg'] == 0)  onclick="btn_editpnglmn('{{$dfdet['urutan']}}')" @endif> 
                                        
                                    <input type="hidden" id="nmpt{{$dfdet['urutan']}}" name="pnglmn_nmpt[]" value="{{$dfdet['nm_perusahaan']}}" required>
                                    <input type="hidden" id="jbtn{{$dfdet['urutan']}}" name="pnglmn_jbtn[]" value="{{$dfdet['jabatan']}}" required>
                                    <input type="hidden" id="mskrj{{$dfdet['urutan']}}" name="pnglmn_mskrj[]" value="{{$dfdet['masa_kerja']}}" required>
                                    <input type="hidden" id="gajih{{$dfdet['urutan']}}" name="pnglmn_gajih[]" value="{{$dfdet['gaji']}}" required>
                                    <input type="hidden" id="almat{{$dfdet['urutan']}}" name="pnglmn_almat[]" value="{{$dfdet['alm_perusahaan']}}" required>
                                    <input type="hidden" id="alsan{{$dfdet['urutan']}}" name="pnglmn_alsan[]" value="{{$dfdet['alasan']}}" required>
                                        <div class="shadow-sm card p-2 mb-2">
                                            
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="icon"> <img src="{{asset('public/resource/img/hris/pengalaman.png')}}"
                                                            class="img-circle avatar center" style="width: 50px; height: 50px;" /></div>
                                                    <div class="text-left col">
                                                        <h3 class="mb-0" id="html_nmpt{{$dfdet['urutan']}}" >{{$dfdet['nm_perusahaan']}}</h3>
                                                        <span id="html_jbtn{{$dfdet['urutan']}}" >{{$dfdet['jabatan']}}</span>
                                                    </div>
                                                </div> 
                                                @if ($jsdfppk['head_kdupdpeg'] != 0)
                                                <div
                                                    class="@if ($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F') badgered @elseif ($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F') badgekuning @endif">
                                                    <span>@if ($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv'] == 'F') Di Tolak @elseif ($jsdfppk['head_is_proses']== 'F' && $jsdfppk['head_is_approv'] == 'F') Menunggu @endif</span>
                                                </div>
                                                @endif
                                            </div>
                
                                            <div class="text-left">
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                                style="font-size: 12px; color:black; ">Gaji</a>
                                                        </span>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;" id="html_gajih{{$dfdet['urutan']}}" > :
                                                        Rp. {{number_format($dfdet['gaji'], 0, '', '.')}}</a>
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
                                                        <a style="font-size: 12px; color:black; min-width: 90px;" id="html_almat{{$dfdet['urutan']}}" > :
                                                            {{$dfdet['alm_perusahaan']}}</a>
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
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;" id="html_mskrj{{$dfdet['urutan']}}" > :
                                                        {{$dfdet['masa_kerja']}}</a>
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
                                                    <a style="font-size: 12px; color:black;  padding-right:5px;" id="html_alsan{{$dfdet['urutan']}}" > :
                                                        {{$dfdet['alasan']}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                            <div class="form-group mx-5 mt-2 pb-2">
                                @if ($jsdfppk['head_kdupdpeg'] == 0) 
                                    @php 
                                    if($df_pnglman == '0'){ 
                                        $jmlpnglmn = 0;
                                    }else{ 
                                        $jmlpnglmn = count($df_pnglman);
                                    }
                                    @endphp
                                    <button type="button"
                                        class="form-control btn-lg  submit px-3 shadow algin-middle"
                                        style="border-radius: 5px !important; background-color: black; color:white;"
                                        onclick="btn_tmbhpnglmn({{$jmlpnglmn}})">Tambah Pengalaman</button>
                                @endif
                            </div>
                            </div>
                        </div>
                        {{-- Keterangan Tambahan --}}
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
                                        rows="5" placeholder="@if ($jsdfppk['head_kdupdpeg'] == 0) contoh : untuk data detail keluarga , anak tidak memiliki no nik jadi menggunakan no KK. dan mohon segera di proses. @else {{$jsdfppk['head_ketuser']}} @endif" 
                                        style="font-size: 12px;" required  @if ($jsdfppk['head_kdupdpeg'] != 0) disabled @endif
                                        ></textarea>
                                </div>

                            </div>  
                        </div>
                        
                    </div>
                    </div>
                </div>
            </form> 
{{-- {{$jsdfppk['head_kdupdpeg']}} --}}
        </div>
    </div>
</div>
{{-- jsdfppk  head_is_approv , head_is_proses ,head_ket_hrd ,head_kdupdpeg , --}}
@if ($jsdfppk['head_kdupdpeg'] == 0)
<div class="fixed-plugin" onclick="btnsaveppk()">
    <a class="fixed-plugin-button text-white position-fixed px-3 py-2">
       
        <i class="material-icons py-1 fas fa fa-floppy-o"> </i>
        <i class="material-icons py-1 px-1"> Save</i>
    </a>
</div>
@endif
  
@include('hris.modal.mdl_pendidikan')
@include('hris.modal.mdl_pengalman')
@include('hris.modal.mdl_kk') 
@include('hris.modal.mdl_waiting')

@if ($jsdfppk['head_kdupdpeg'] != 0)
    @if($jsdfppk['head_is_proses'] == 'F' && $jsdfppk['head_is_approv']=='F' )
        <script> 
            // $('#pddkn_url').val('{{url("btlknpendidikan")}}');
            
            $('#cnt_tolak').remove();
            $('#cnt_disetuji').remove();
            $('#pkk_type').val('menunggu');

            $('#pddkn_kdupdpeg').val("{{$jsdfppk['head_kdupdpeg']}}");
            // $('#pddkn_url').val('{{url("btlknpendidikan")}}');
            document.getElementById('mdl_waiting').style.display='block';  
            // alert('menunggu proses bisa dibatalkan');
        </script>
    @endif
    @if($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv']=='F')
        <script>
            
            $('#cnt_menunggu').remove();
            $('#cnt_disetuji').remove();
            $('#pkk_type').val('ditolak');
            $('#pddkn_kdupdpeg').val("{{$jsdfppk['head_kdupdpeg']}}");
            $('#tx_kettolak').html('Di Tolak'+' oleh '+"{{$jsdfppk['head_updated_by']}}"+' : '+"{{$jsdfppk['head_ket_hrd']}}"+"<br>Silahkan Mengajuakan permohonan Kembali.");
            document.getElementById('mdl_waiting').style.display='block';  
            // alert('Di Tolak'+' oleh '+"{{$jsdfppk['head_updated_by']}}"+' : '+"{{$jsdfppk['head_ket_hrd']}}"); 
        </script>
    @endif
    @if($jsdfppk['head_is_proses']== 'T' && $jsdfppk['head_is_approv']=='T')
        <script>
            $('#cnt_tolak').remove();
            $('#cnt_menunggu').remove();
            $('#pkk_type').val('disetujui');
            $('#pddkn_kdupdpeg').val("{{$jsdfppk['head_kdupdpeg']}}");
            $('#tx_ketdisetuji').html('Di Setujui'+' oleh '+"{{$jsdfppk['head_updated_by']}}"+' : '+"{{$jsdfppk['head_ket_hrd']}}");
            document.getElementById('mdl_waiting').style.display='block';  
            // alert('Di Tolak'+' oleh '+"{{$jsdfppk['head_updated_by']}}"+' : '+"{{$jsdfppk['head_ket_hrd']}}"); 
        </script>
    @endif
@endif

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
        $('#tx_tngktpddkn').empty().append("@foreach ($df_tkpddkn1 as $df)"+"<option value='{{$df['tk_pendidikan']}}'style='font-size:12px !important'>{{$df['tk_pendidikan'] }}</option> @endforeach"); 
        
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
@endsection