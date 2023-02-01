@extends('layouts.layout')
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
</style>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>



<div class="container" style="padding-top: 70px; padding-right: 10px; padding-left: 10px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header px-2 py-2">
                <a class="my-0 font-weight-bold" style="font-size: 12px;">Detail Kartu Keluarga</a>
            </div>
            <div class="card-body" style=" height:500px;padding: 5px 5px 10px 5px !important;">
                @if ($df_succes == '1')

                <ul style="overflow-x: hidden; height: 480px; list-style-type: none; padding: 5px;">
                    @foreach ($df_kk as $dfdet)
                    <li class="shadow p-1 mb-1 bg-white rounded"
                        onclick="btn_dfkk('{{$dfdet['kdupdpeg']}}#{{$dfdet['status_kel']}}#{{$dfdet['nm_anggota']}}#{{$dfdet['no_kk']}}#{{$dfdet['nik']}}#{{$dfdet['jns_kelamin']}}#{{$dfdet['tpt_lahir']}}#{{$dfdet['tgl_lahir']}}#{{$dfdet['umur']}}#{{$dfdet['telepon']}}#{{$dfdet['alamat_rmh1']}}#{{$dfdet['is_proses']}}#{{$dfdet['is_approve']}}#{{$dfdet['ket_hrd']}}#{{$dfdet['updated_by']}}#{{$dfdet['sttus']}}')">
                        <div class="card p-2 mb-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="icon"> <img src="{{$dfdet['logo']}}" class="img-circle avatar center"
                                            style="width: 50px; height: 50px;" /></div>
                                    <div class="text-left col">
                                        <h3 class="mb-0">{{substr($dfdet['status_kel'],2)}}</h3>
                                        <span>{{$dfdet['nm_anggota']}}</span>
                                    </div>
                                </div>
                                @if ($dfdet['kdupdpeg'] != null)
                                <div
                                    class="@if ($dfdet['is_proses'] == 'T' && $dfdet['is_approve'] == 'F') badgered @else badgekuning @endif">
                                    <span>{{$dfdet['sttus']}}</span>
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
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
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
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
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
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
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
                                        <a style="font-size: 12px; color:black; min-width: 90px;"> :
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
                                        <a style="font-size: 12px; color:black; min-width: 90px;"> :
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
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                        {{$dfdet['telepon']}}</a>
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
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                        {{$dfdet['alamat_rmh1']}}</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    @else
                    <div class="text-center ">
                        <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent"
                            speed="1" style="margin: 0 auto; width: 300px; height: 420px;" loop autoplay>
                        </lottie-player>
                        <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                    </div>
                </ul>
                @endif
            </div>
        </div>

    </div>
</div>
<div class="fixed-plugin" onclick="btn_tmbkk()">
    <a class="fixed-plugin-button text-white position-fixed px-3 py-2">
        <i class="material-icons py-2 fas fa fa-plus"></i>
        {{-- <i class="material-icons py-2">add</i> --}}
    </a>
</div>

@include('hris.modal.mdl_kk')
@include('hris.modal.mdl_waiting')

<script src="{{asset('public/resource/js/lottie.js')}}"></script>

<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });   
    function btn_tmbkk(){    
        $('#tx_tittle').html('Tambah Kartu Keluarga');
        $('#tx_type').val('Tambah'); 
      document.getElementById('mdl_tmbhkk').style.display='block';  
    }  
    function btn_dfkk(isi){
        // kdupdpeg,status_kel,nm_anggota,no_kk,nik,jns_kelamin,tpt_lahir,tgl_lahir,umur,telepon,alamat_rmh1,is_proses,is_approve,ket_hrd,updated_by,sttus 
        var dataa       = isi.split('#');
        var kdpegwi     = dataa[0];  
        var sttskl      = dataa[1]; 
        var nmanggt     = dataa[2]; 
        var nokk        = dataa[3];  
        var nonik       = dataa[4];    
        var jnsklmn     = dataa[5];    
        var tmptlhr     = dataa[6];    
        var tgllhr      = dataa[7];    
        var umur        = dataa[8];    
        var telepon     = dataa[9];      
        var almtrmh     = dataa[10];  
        var ispross     = dataa[11]; 
        var isapprv     = dataa[12];  
        var kethrdd     = dataa[13];  
        var updetby     = dataa[14];  
        var statuss     = dataa[15];   
        if(kdpegwi == ''){
            // Update
            console.log(tgllhr);
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
            $('#tx_sttkk1').val(sttskl); 
            $('#tx_kknkk1').val(nokk);
            $('#tx_kknik1').val(nonik);
            $('#tx_agtkk1').val(nmanggt);
            $('#tx_tmptkk1').val(tmptlhr);
            $('#tx_tglkk1').val(tgllhr);
            $('#tx_jkkk1').val(jnsklmn);
            $('#tx_usiakk1').val(umur);
            $('#tx_hpkk1').val(telepon);
            $('#tx_almtkk1').val(almtrmh);
            $('#tx_type').val('Update');
            $('#tx_tittle').html('Update Kartu Keluarga'); 
            console.log(jnsklmn);
            document.getElementById("tx_sttkk").disabled = true; 
            // document.getElementById("tx_jkkk").disabled = true; 
            $('.selectpicker').selectpicker('refresh');  
            // $("#tx_sttkk").append('<option value="'+sttskl+'"  style="font-size:12px !important" selected>'+sttskl+'</option>'); 
            // $("#tx_jkkk").append('<option value="'+jnsklmn+'"  style="font-size:12px !important" selected>'+jnsklmn+'</option>'); 

            document.getElementById('mdl_tmbhkk').style.display='block';  
        }
        if(ispross == 'F' && isapprv=='F' ){ 
            $('#pddkn_kdupdpeg').val(kdpegwi);
            $('#pddkn_url').val('{{url("btlknpendidikan")}}');
            $('#pddkn_type').val('Kartu Keluarga');
            $('#pddkn_dbtype').val('tmp_keluarga');
            // $('#pddkn_url').val('{{url("btlknpendidikan")}}');
            document.getElementById('mdl_waiting').style.display='block';  
            // alert('menunggu proses bisa dibatalkan');
        }
        if(ispross == 'T' && isapprv=='F' ){ 
            alert(statuss+' oleh '+updetby+' : '+kethrdd);
        }
    }

    
</script>

@endsection