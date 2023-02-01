@extends('layouts.layout')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content')
<link href="{{asset('public/resource/css/style_viewcogs.css')}}" rel="stylesheet" type="text/css">

<style>
    .icon {
        /* width: 60;
        height: 60;
        background-color: #eee;
        border-radius: 15px; */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px
    }

    .iconarrow {

        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px
    }

    .badge span {
        background-color: #fffbec;
        width: 60px;
        height: 25px;
        padding-bottom: 3px;
        border-radius: 5px;
        display: flex;
        color: #fed85d;
        justify-content: center;
        align-items: center
    }

    .tx16 {
        font-size: 16px;
        font-weight: 600
    }

    .text2 {
        color: #a5aec0
    }

    .card {
        /* border: none; */
        border-radius: 10px
    }

    .card-header {
        padding: 0.5rem 0.5rem !important;
    }

    .btn-danger {
        color: #fff !important;
        background-color: #cc1a0b !important;
        border-color: #cc1a0b !important;
    }

    h3 {
        font-family: 'Arial', sans-serif !important;
        color: #000000 !important;
        font-size: 14px !important;
        margin: 0 0 5px 0 !important;
        text-transform: uppercase !important;
        font-weight: 400 !important;
    }

    #SearchWA {
        background-image: url('{{asset('public/resource/img/searching.png')}}');

        background-size: 20px 20px;
        background-position: 10px 8px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 14px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        /* margin-bottom: 12px; */
    }

    .dropdown-item {
        font-size: 12px !important;
    }
</style>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>



<div class="container" style="padding-top: 70px; padding-right: 10px; padding-left: 10px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <form id="send_dept" class="" action="{{route('cmwakontak')}}" method="GET">
                    @csrf
                    <input type="hidden" name="kdakses" id="kdakses" value="{{$kdakses}}">
                    <input type="hidden" name="nip" id="nip" value="{{$nip}}">
                    <input type="hidden" name="tx_dept" id="tx_dept" value="{{$tx_dept}}">
                </form>
                {{--
                <a class="my-0 font-weight-normal" style="font-size: 16px;"><b>WhatsApp Contact</b></a> --}}
                <div class="form-group">
                    {{-- <label for="akunting_outlet_select">Outlet</label> --}}
                    <select class="form-control  form-select selectpicker" id="select_dept" data-live-search="true"
                        onchange="pilih_dept()" required>
                        <option> @if($tx_dept != 'F') @if($tx_dept == 'T') All Departement @else {{$tx_dept}}
                            @endif @else Pilih Dept @endif </option>
                        @foreach ($df_dept as $arrotl)
                        <option value="{{$arrotl['id_dept']}}">{{$arrotl['id_dept']}}
                        </option>
                        @endforeach

                        <option value="T"> All Departement </option>
                    </select>
                </div>
                <div class="mb-1 mt-1 navbar" style="padding: 0px;">
                    <input id="SearchWA" onkeyup="Serchwaa()" type="text" class="form-control"
                        placeholder="Searching WhatsApp" aria-label="Search" aria-describedby="basic-addon2">

                </div>
            </div>
            <div class="card-body" style=" height:500px; padding: 0 !important;">
                <div class="d-flex justify-content-between">
                    <input type="hidden" id="start" value="jalan cihanjuang no.156">
                    <input type="hidden" id="end" value="jalan cihanjuang no.156">

                    {{-- <div id="googleMap" style="height: 300px; width:400px;"></div> --}}

                    {{-- <div id="googleMap2" class="col" style="height: 300px; width:400px"></div> --}}

                    {{-- <div id="googleMap3" style="width:400px;height:300px;"></div>
                    <div id="googleMap4" style="width:400px;height:300px;"></div> --}}
                </div>

                <ul style="overflow-x: hidden; height: 75vh; list-style-type: none; padding: 5px;" id="ul_searchwa">

                    @if($df_allwa == 0)

                    <div class="text-center ">
                        <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent"
                            speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                        </lottie-player>
                        <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                    </div>
                    @else
                    @foreach ($df_allwa as $dfdet)
                    <li class="shadow p-1 mb-1 bg-white rounded"
                        onclick="btn_wamap('{{$dfdet['nm_lengkap']}}#{{$dfdet['nowa']}}#{{$dfdet['lokasilat']}}#{{$dfdet['lokasilong']}}')">
                        {{-- <a href="https://api.whatsapp.com/send?phone={{$dfdet['nowa']}}&text=%20"> --}}
                            <div class="card p-2 mb-2">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="icon">
                                            <img src="{{$dfdet['foto']}}" class="img-circle avatar center"
                                                style="width: 50px; height: 50px;" />
                                        </div>
                                        <div class="text-left col">
                                            <h3 class="mb-0 font-weight-normal">{{$dfdet['nm_lengkap']}}</h3>
                                            <span> {{$dfdet['id_dept']}} ( {{$dfdet['jns_otl']}} )</span>
                                        </div>
                                    </div>
                                    {{-- @if ($dfdet['nowa'] != '0' )
                                    <div>
                                        <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_5gezzxwi.json"
                                            background="transparent" speed="1"
                                            style="margin: 0 auto; width: 30px; height: 30px;" loop autoplay>
                                        </lottie-player>
                                    </div>

                                    @endif --}}
                                </div>
                                <div class="text-left">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="" id="basic-addon3"
                                                style="font-size: 10px; color:black; min-width: 70px; padding:0px"><a
                                                    style="font-size: 10px; color:black; ">Aktif</a>
                                            </span>
                                        </div>
                                        <a style="font-size: 10px; color:black;  padding-right:5px;"> :
                                            {{$dfdet['lastaksess']}}</a>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="" id="basic-addon3"
                                                style="font-size: 10px; color:black; min-width: 70px; padding:0px"><a
                                                    style="font-size: 10px; color:black; ">Jabatan </a>
                                            </span>
                                        </div>
                                        <a style="font-size: 10px; color:black;  padding-right:5px;"> :
                                            {{$dfdet['jabatan']}}</a>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="" id="basic-addon3"
                                                style="font-size: 10px; color:black; min-width: 70px; padding:0px"><a
                                                    style="font-size: 10px; color:black; ">No WA </a>
                                            </span>
                                        </div>
                                        <a style="font-size: 10px; color:black;  padding-right:5px;"> :
                                            {{$dfdet['nowa']}}</a>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="" id="basic-addon3"
                                                style="font-size: 10px; color:black; min-width: 70px; padding:0px"><a
                                                    style="font-size: 10px; color:black; ">Device</a>
                                            </span>
                                        </div>
                                        <a style="font-size: 10px; color:black;  padding-right:5px;"> :
                                            {{$dfdet['nmdvc']}} ({{$dfdet['osdvc']}})</a>
                                    </div>
                                </div>
                            </div>
                            {{--
                        </a> --}}
                    </li>
                    @endforeach
                    @endif

                </ul>

            </div>
        </div>
        {{-- {{session('simpan_succs') }} --}}
    </div>
</div>

@include('cmallwa.mdl_wamap')

<script src="{{asset('public/resource/js/lottie.js')}}"></script>
<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });   
</script>
<script>
    function Serchwaa() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("SearchWA");
        filter = input.value.toUpperCase();
        ul = document.getElementById("ul_searchwa");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("div")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
  
   

    function pilih_dept(){
        var bb = $('#select_dept').val();
        $('#tx_dept').val(bb);
         
         $('#send_dept').submit();
    }
    function btn_wamap(isi){ 
        var dataa      = isi.split('#');
        var nmlngkp      = dataa[0]; 
        var nowhtsp      = dataa[1]; 
        var lksilat      = dataa[2]; 
        var lksilog      = dataa[3];  
        $('#tx_nmmap').html(nmlngkp);  
        $('#tx_wamap').val(nowhtsp);  
        $('#tx_lat').val(lksilat);
        $('#tx_long').val(lksilog);
  
        myMap();
        document.getElementById('mdl_wamap').style.display='block';  
    }
    
</script>

@endsection