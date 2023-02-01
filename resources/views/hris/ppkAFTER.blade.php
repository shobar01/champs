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

    .fixed-plugin .fixed-plugin-button {
        background: #fff;
        border-radius: 10%;
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
</style>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>



<div class="container" style="padding-top: 70px; padding-right: 10px; padding-left: 10px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm ">
            <div class="card-header px-2 py-2">
                <div class="row  px-2">
                    <div class="col" style="padding: 0 5px 0 10px !important;">
                        <a class="my-0 font-weight-bold align-middle" style=" font-size: 12px; "><b>Detail
                                Keluarga</b></a>
                    </div>
                    <div class="col text-right" style="padding: 0 10px 0 5px !important;">
                        <a type="button" style=" font-weight: bold; font-size: 14px;"><i class='fa fa-plus'
                                style='color: #000; margin: 0 5px 0 5px;' onclick="history.go(0)"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body" style="padding: 5px 5px 10px 5px !important;">
                @if ($df_kelrga == '0')
                <div class="text-center ">
                    <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent"
                        speed="1" style="margin: 0 auto; width: 300px; height: 420px;" loop autoplay>
                    </lottie-player>
                    <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                </div>
                @else
                <ul style="overflow-x: hidden; height: 480px; list-style-type: none; padding: 5px;">
                    @foreach ($df_kelrga as $dfdet)
                    <li class="shadow p-1 mb-1 bg-white rounded" onclick="btn_dfkk('isi')">
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
                </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm ">
            <div class="card-header px-2 py-2">
                <div class="row  px-2">
                    <div class="col" style="padding: 0 5px 0 10px !important;">
                        <a class="my-0 font-weight-bold align-middle" style=" font-size: 12px; "><b>Detail
                                Pendidikan</b></a>
                    </div>
                    <div class="col text-right" style="padding: 0 10px 0 5px !important;">
                        <a type="button" style=" font-weight: bold; font-size: 14px;"><i class='fa fa-plus'
                                style='color: #000; margin: 0 5px 0 5px;' onclick="history.go(0)"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body" style="padding: 5px 5px 10px 5px !important;">
                @if ($df_pendidikn == '0')
                <div class="text-center ">
                    <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent"
                        speed="1" style="margin: 0 auto; width: 300px; height: 420px;" loop autoplay>
                    </lottie-player>
                    <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                </div>
                @else
                <ul style="overflow-x: hidden; height: 480px; list-style-type: none; padding: 5px;">
                    @foreach ($df_pendidikn as $dfdet)
                    <li class="shadow p-1 mb-1 bg-white rounded" onclick="btn_dfpddkn('isi')">
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
                                {{-- @if ($dfdet['kdupdpeg'] != null)
                                <div
                                    class="@if ($dfdet['is_proses'] == 'T' && $dfdet['is_approve'] == 'F') badgered @else badgekuning @endif">
                                    <span>{{$dfdet['sttus']}}</span>
                                </div>
                                @endif --}}
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
                </ul>
                @endif
            </div>
        </div>

    </div>
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm ">
            <div class="card-header px-2 py-2">
                <div class="row  px-2">
                    <div class="col" style="padding: 0 5px 0 10px !important;">
                        <a class="my-0 font-weight-bold align-middle" style=" font-size: 12px; "><b>Detail
                                Pengalaman</b></a>
                    </div>
                    <div class="col text-right" style="padding: 0 10px 0 5px !important;">
                        <a type="button" style=" font-weight: bold; font-size: 14px;"><i class='fa fa-plus'
                                style='color: #000; margin: 0 5px 0 5px;' onclick="history.go(0)"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body" style="padding: 5px 5px 10px 5px !important;">
                @if ($df_pnglman == '0')
                <div class="text-center ">
                    <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent"
                        speed="1" style="margin: 0 auto; width: 300px; height: 420px;" loop autoplay>
                    </lottie-player>
                    <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                </div>
                @else
                <ul style="overflow-x: hidden; height: 480px; list-style-type: none; padding: 5px;">
                    @foreach ($df_pnglman as $dfdet)
                    <li class="shadow p-1 mb-1 bg-white rounded" onclick="btn_dfpnglmn('isi')">

                        <div class="card p-2 mb-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="icon"> <img src="{{asset('public/resource/img/hris/pengalaman.png')}}"
                                            class="img-circle avatar center" style="width: 50px; height: 50px;" /></div>
                                    <div class="text-left col">
                                        <h3 class="mb-0">{{$dfdet['nm_perusahaan']}}</h3>
                                        <span>{{$dfdet['jabatan']}}</span>
                                    </div>
                                </div>
                                {{-- @if ($dfdet['kdupdpeg'] != null)
                                <div
                                    class="@if ($dfdet['is_proses'] == 'T' && $dfdet['is_approve'] == 'F') badgered @else badgekuning @endif">
                                    <span>{{$dfdet['sttus']}}</span>
                                </div>
                                @endif --}}
                            </div>

                            <div class="text-left">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="" id="basic-addon3"
                                            style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a
                                                style="font-size: 12px; color:black; ">Gaji</a>
                                        </span>
                                    </div>
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
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
                                        <a style="font-size: 12px; color:black; min-width: 90px;"> :
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
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
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
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                        {{$dfdet['alasan']}}</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>

    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm ">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Detail Keluarga
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                Collapsible Group Item #2
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                                Collapsible Group Item #3
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fixed-plugin" onclick="btn_tmbpddkn()">
    <a class="fixed-plugin-button text-white position-fixed px-3 py-2">

        <i class="material-icons py-1 fas fa fa-floppy-o"> </i>
        <i class="material-icons py-1 px-1"> Save</i>
    </a>
</div>

<script src="{{asset('public/resource/js/lottie.js')}}"></script>
<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });  
</script>
@endsection