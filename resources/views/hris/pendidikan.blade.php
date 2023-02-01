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
        <div class="card mb-4 shadow-sm ">
            <div class="card-header px-2 py-2">
                <a class="my-0 font-weight-bold" style="font-size: 12px;">Detail Pendidikan</a>
            </div>
            <div class="card-body" style="padding: 5px 5px 10px 5px !important;">
                {{-- <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">
                            <div class="col-md-12" style="padding : 0;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text form-control-sm" id="basic-addon3"
                                            style="font-size: 12px; background:#cc1a0b; color:white; min-width: 80px;  font-weight: bold; ">Nama
                                        </span>
                                    </div>
                                    <input type="text" name="spin_tglmnkh" id="spin_tglmnkh" value="Ahmad Sobari"
                                        class="form-control form-control-sm"
                                        style="font-size: 12px; color:black;  font-weight: bold;" disabled>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
                @if ($df_succes == '1')

                <ul style="overflow-x: hidden; height: 75vh; list-style-type: none; padding: 5px;">
                    @foreach ($df_pddkn as $dfdet)
                    <li class="shadow p-1 mb-1 bg-white rounded"
                        onclick="btn_dfpddkn('{{$dfdet['kdupdpeg']}}#{{$dfdet['tk_sekolah']}}#{{$dfdet['nm_sekolah']}}#{{$dfdet['lokasi']}}#{{$dfdet['thn_ijazah']}}#{{$dfdet['jurusan']}}#{{$dfdet['keterangan']}}#{{$dfdet['is_proses']}}#{{$dfdet['is_approve']}}#{{$dfdet['ket_hrd']}}#{{$dfdet['updated_by']}}#{{$dfdet['sttus']}}')">
                        <div class="card p-2 mb-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="icon"> <img src="{{$dfdet['logo']}}" class="img-circle avatar center"
                                            style="width: 50px; height: 50px;" /> </div>
                                    <div class="text-left col">
                                        <h3 class="mb-0">{{$dfdet['tk_sekolah']}}</h3>
                                        <span>{{$dfdet['nm_sekolah']}}</span>
                                    </div>
                                </div>
                                @if ($dfdet['kdupdpeg'] != null)
                                <div
                                    class="@if ($dfdet['is_proses'] == 'T' && $dfdet['is_approve'] == 'F') badgered @else badgekuning @endif">
                                    <span>{{$dfdet['sttus']}}</span>
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
                                        <a style="font-size: 12px; color:black; min-width: 90px;"> :
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
                                        <a style="font-size: 12px; color:black; min-width: 40px; padding-right:5px;"> :
                                            {{$dfdet['thn_ijazah']}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="" id="basic-addon3"
                                            style="font-size: 10px; color:black; min-width: 70px; padding:0px"><a
                                                style="font-size: 12px; color:black; ">Jurusan</a>
                                        </span>
                                    </div>
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
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
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                        {{$dfdet['keterangan']}}</a>
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
<div class="fixed-plugin" onclick="btn_tmbpddkn()">
    <a class="fixed-plugin-button text-white position-fixed px-3 py-2">
        <i class="material-icons py-2 fas fa fa-plus"></i>
        {{-- <i class="material-icons py-2">add</i> --}}
    </a>
</div>

@include('hris.modal.mdl_pendidikan')
@include('hris.modal.mdl_waiting')


<script src="{{asset('public/resource/js/lottie.js')}}"></script>
<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
        
    function btn_tmbpddkn(){   

    $('#tx_typepddkn').val('Tambah'); 
    $('#tx_tittlepddkn').html('Tambah Pendidikan'); 
      document.getElementById('mdl_tmbhpendidikan').style.display='block';  
    }   
</script>
<script>
    function btn_dfpddkn(isi){
        // kdupdpeg, nip, tk_sekolah, nm_sekolah, lokasi, thn_ijazah, jurusan, keterangan, is_proses, is_approve, ket_hrd, updated_by,sttus 
        var dataa      = isi.split('#');
        var kdpegwi      = dataa[0];  
        var tksklah      = dataa[1]; 
        var nmsklah      = dataa[2]; 
        var lokasis      = dataa[3];  
        var thnijzh      = dataa[4];  
        var jurasan      = dataa[5];  
        var ktrangn      = dataa[6];  
        var ispross      = dataa[7];  
        var isapprv      = dataa[8];  
        var kethrdd      = dataa[9];  
        var updetby      = dataa[10];  
        var statuss      = dataa[11];   
        if(kdpegwi == ''){  
             
            $('#tx_tngktpddkn').val(tksklah);
            $('#tx_nmpddkn').val(nmsklah);
            $('#tx_jrsnpddkn').val(jurasan);
            $('#tx_thnijzhpddkn').val(thnijzh);
            $('#tx_lokasipddkn').val(lokasis);
            $('#tx_ketpddkn').val(ktrangn); 

            $('#tx_tngktpddkn1').val(tksklah);
            $('#tx_nmpddkn1').val(nmsklah);
            $('#tx_jrsnpddkn1').val(jurasan);
            $('#tx_thnijzhpddkn1').val(thnijzh);
            $('#tx_lokasipddkn1').val(lokasis);
            $('#tx_ketpddkn1').val(ktrangn); 

            $('#tx_typepddkn').val('Update'); 
            $('#tx_tittlepddkn').html('Update Pendidikan'); 
            document.getElementById("tx_tngktpddkn").disabled = true; 
            $('.selectpicker').selectpicker('refresh'); 
            document.getElementById('mdl_tmbhpendidikan').style.display='block';   
        }
        if(ispross == 'F' && isapprv=='F' ){ 
            $('#pddkn_kdupdpeg').val(kdpegwi);
            $('#pddkn_url').val('{{url("btlknpendidikan")}}');
            $('#pddkn_type').val('Pendidikan');
            $('#pddkn_dbtype').val('tmp_pendidikan');
            document.getElementById('mdl_waiting').style.display='block';  
            // alert('menunggu proses bisa dibatalkan');
        }
        if(ispross == 'T' && isapprv=='F' ){ 
            alert(statuss+' oleh '+updetby+' : '+kethrdd);
        }
    }
</script>
@endsection