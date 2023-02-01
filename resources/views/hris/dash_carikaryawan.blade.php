@extends('layouts.layout_presence')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content')
<link href="{{asset('public/resource/css/style_viewcogs.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

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
        border-radius: 15px
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

    .bootstrap-select .dropdown-toggle .filter-option {
        font-size: 14px !important;
        font-weight: 400 !important;
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



<div class="container" style="padding-top: 70px; padding-right: 10px; padding-left: 10px;">
    <div class="mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <form id="send_dept" class="" action="{{route('caricri')}}" method="GET">
                    @csrf
                    <input type="hidden" name="kdakses" id="kdakses" value="{{$kdakses}}">
                    <input type="hidden" name="nip" id="nip" value="{{$nip}}">
                    <input type="hidden" name="tx_dept" id="tx_dept" value="{{$tx_dept}}">
                </form>
                <div class="form-group shadow p-1 mb-1 bg-white rounded">
                    <div class="col-xs-2">
                        <select class="form-control form-select selectpicker" id="select_dept" data-live-search="true"
                            onchange="pilih_dept()" required>
                            <option> @if($tx_dept != 'F') @if($tx_dept == 'T') All Departement @else {{$tx_dept}}
                                @endif @else Pilih Dept @endif </option>
                            @foreach ($df_dept as $arrotl)
                            <option value="{{$arrotl['id_dept']}}">{{$arrotl['id_dept']}}
                            </option>
                            @endforeach
                            <option value="0"> Iphone Versi 1.2</option>
                            {{-- <option value="T"> All Departement </option> --}}
                        </select>
                    </div>
                </div>
                <div class="mb-1 mt-1 navbar shadow p-1 mb-1 bg-white rounded" style="padding: 0px;">
                    <input id="SearchWA" onkeyup="Serchwaa()" type="text" class="form-control"
                        placeholder="CARI {{$tx_dept}}" aria-label="Search" aria-describedby="basic-addon2">

                </div>
            </div>
            <div class="card-body" style=" height:70vh; padding: 0 !important;">
                <div class="d-flex justify-content-between">
                    <input type="hidden" id="start" value="jalan cihanjuang no.156">
                    <input type="hidden" id="end" value="jalan cihanjuang no.156">
                </div>

                <ul style="overflow-x: hidden; height: 70vh; list-style-type: none; padding: 5px;" id="ul_searchwa">

                    @if($df_allwa == 0)

                    <div class="text-center ">
                        <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent"
                            speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                        </lottie-player>
                        <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                    </div>
                    @else
                    @foreach ($df_allwa as $dfdet)
                    <li class=" "
                        onclick="btn_wamap('{{$dfdet['nm_lengkap']}}#{{$dfdet['nowa']}}#{{$dfdet['lokasilat']}}#{{$dfdet['lokasilong']}}#{{$dfdet['nip']}}#{{$dfdet['lastaksess']}}')">

                        <div class="shadow-sm card p-2 mb-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="icon">
                                        <img src="{{$dfdet['foto']}}" class="img-circle avatar center"
                                            style="width: 50px; height: 50px;" />
                                    </div>
                                    <div class="text-left col">
                                        <h3 class="mb-0 font-weight-normal">{{$dfdet['nm_lengkap']}}</h3>
                                        <span> {{$dfdet['id_dept']}} ( {{$dfdet['kd_jenis_outlet']}} )</span>
                                    </div>
                                </div>
                            </div>
                            @if ($dfdet['lastaksess'] == '-')
                            <div class="text-left">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="" id="basic-addon3"
                                            style="font-size: 14px; color:#cc1a0b; min-width: 80px; padding:0px"><a
                                                style="font-size: 14px; color:#cc1a0b; ">Keterangan</a>
                                        </span>
                                    </div>
                                    <a style="font-size: 14px; color:#cc1a0b;  padding-right:5px;"> :
                                        {{$dfdet['ket']}}</a>
                                </div>
                            </div>
                            @endif

                            @if ($dfdet['lastaksess'] != '-')
                            <div class="text-left">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="" id="basic-addon3"
                                            style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                style="font-size: 12px; color:black; ">Aktif</a>
                                        </span>
                                    </div>
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                        {{$dfdet['lastaksess']}}</a>
                                </div>
                            </div>
                            <div class="text-left">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="" id="basic-addon3"
                                            style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                style="font-size: 12px; color:black; ">Jabatan </a>
                                        </span>
                                    </div>
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                        {{$dfdet['jabatan']}}</a>
                                </div>
                            </div>
                            <div class="text-left">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="" id="basic-addon3"
                                            style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                style="font-size: 12px; color:black; ">No WA </a>
                                        </span>
                                    </div>
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                        {{$dfdet['nowa']}}</a>
                                </div>
                            </div>
                            @if ($kdakses == 'AVXXX')
                            <div class="text-left">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="" id="basic-addon3"
                                            style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                style="font-size: 12px; color:black; ">Device</a>
                                        </span>
                                    </div>
                                    <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                        {{$dfdet['nmdvc']}} </a>
                                </div>
                            </div>
                            @endif
                            @endif
                        </div>
                    </li>
                    @endforeach
                    @endif

                </ul>

            </div>
        </div>
    </div>
</div>
<div class="fixed-plugin" onclick="btn_crinip('aa')">
    <a class="fixed-plugin-button text-white position-fixed px-3 py-2">

        <i class="material-icons py-1 fas fa fa-search"> </i>
        <i class="material-icons py-1 px-1"> Cari NIP</i>
    </a>
</div>
{{-- @include('hris.modal.mdl_carikaryawandet') --}}
@include('hris.modal.mdl_carikaryawannip')

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
        var dataa       = isi.split('#');
        var nmlngkp      = dataa[0]; 
        var nowhtsp      = dataa[1]; 
        var lksilat      = dataa[2]; 
        var lksilog      = dataa[3];  
        var nip          = dataa[4];  
        var lastaksess   = dataa[5];  
        console.log('lastaksess'+lastaksess);
        $('#tx_nmmap').html(nmlngkp);  
        $('#tx_wamap').val(nowhtsp);  
        $('#tx_lat').val(lksilat);
        $('#tx_long').val(lksilog);
        $('#tx_crinip').val(nip);

        // if(lastaksess == ''){ 
        //     var x = document.getElementById("foterwa");  
        //     x.style.display = "none";
        // }else{
            
        //     var x = document.getElementById("foterwa");  
        //     x.style.display = "block"; 
        //     myMap();
        // }
        // var x = document.getElementById("foterwa");  
        // x.style.display = "none";
        if('{{$kdakses}}' == 'AVXXX'){ 
        // var x = document.getElementById("foterwa");  
        //     x.style.display = "block"; 
            myMap();
        }
        var xx = document.getElementById("inpt_cari");  
        xx.style.display = "none";
        var xxx = document.getElementById("inpt_carinama");  
        xxx.style.display = "none"; 
        var xxxx = document.getElementById("ul_crinama");  
        xxxx.style.display = "none";
        
        
  
        // document.getElementById('mdl_carikrwn').style.display='block';
        Jsn_carinip();  

        
        document.getElementById('mdl_crikrawnnip').style.display='block';  
    }
    function btn_crinip(isi){ 
        var dataa      = isi.split('#'); 
        
        var xx = document.getElementById("inpt_cari");  
        xx.style.display = "flex";
        var xxx = document.getElementById("inpt_carinama");  
        xxx.style.display = "flex";
        
        var xxxx = document.getElementById("ul_crinama");  
        xxxx.style.display = "none";
        
        document.getElementById('mdl_crikrawnnip').style.display='block';  
    }
    
</script>

@endsection