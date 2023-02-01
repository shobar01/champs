@extends('layouts.layout_presence')
@section('title', 'PT.Champ Resto Indonesia')
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
            <div class="card-header">
                <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>Data Detail
                        Karyawan</b></a> 
            </div>
            <div class="card-body" style=" height:500px;">
                <div class="card p-1 mb-2">
                    <button class="btn btn-danger btn-lg" onclick="btndata_profile()">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"> <i class="fa fa-id-card-o" aria-hidden="true"></i></div>
                                <div class="ml-2 c-details">
                                    <a class="tx16">Data Utama</a>
                                    {{-- <span>1 days ago</span> --}}
                                </div>
                            </div>

                            <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div>
                            {{-- <div class="badge"><i class="fa fa-chevron-right" aria-hidden="true"></i></div> --}}
                        </div>
                    </button>
                </div>
                {{-- <div class="card p-1 mb-2">
                    <button class="btn btn-danger btn-lg" onclick="btndata_pendidikan()">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"> <i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
                                <div class="ml-2 c-details">
                                    <a class="tx16">Pendidikan</a>
                                </div>
                            </div>

                            <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div>
                        </div>
                    </button>
                </div>
                <div class="card p-1 mb-2">
                    <button class="btn btn-danger btn-lg" onclick="btndata_pengalaman()">

                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"> <i class="fa fa-briefcase" aria-hidden="true"></i></div>
                                <div class="ml-2 c-details">
                                    <a class="tx16">Pengalaman</a>
                                </div>
                            </div>

                            <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div>
                        </div>
                    </button>
                </div>
                <div class="card p-1 mb-2" onclick="btndata_krtukeluarga()">
                    <button class="btn btn-danger btn-lg">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"> <i class="fa fa-users" aria-hidden="true"></i></div>
                                <div class="ml-2 c-details">
                                    <a class="tx16">Kartu Keluarga</a>
                                </div>
                            </div>

                            <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div>
                        </div>
                    </button>
                </div> --}}
                <div class="card p-1 mb-2">
                    <button class="btn btn-danger btn-lg" onclick="btndata_ppk()">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"> <i class="fa fa-id-card-o" aria-hidden="true"></i></div>
                                <div class="ml-2 c-details">
                                    <a class="tx16">Data Rincian</a>
                                    {{-- <span>1 days ago</span> --}}
                                </div>
                            </div>

                            <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div>
                            {{-- <div class="badge"><i class="fa fa-chevron-right" aria-hidden="true"></i></div> --}}
                        </div>
                    </button>
                </div>
            </div>
        </div> 
{{-- {{session('simpan_succs') }}  --}}
    </div>
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

@if (session('simpan_succs') == 1)
<script>
    Swal.fire({
    icon: 'success',
    title: 'Success',
    text: "{{session('simpan_msg')}}" ,
    confirmButtonColor: '#3085d6',
    allowOutsideClick: false 
})
$('#loader').hide(); 
</script> 
@elseif(session('simpan_succs') == 0)
<script>
    Swal.fire({
    icon: 'error',
    title: 'Opps!!',
    text: "{{session('simpan_msg')}}" ,
    confirmButtonColor: '#d33',
    allowOutsideClick: false
})
$('#loader').hide(); 
</script>  
@endif 

<script>
    function btndata_profile(){ 
        let llnkk = '{{$link_dataprofile}}';
        let linkkk = llnkk.replace('#', '&');
        // alert(linkk);
            $('#loader').show(); 
            window.location.href=linkkk;
            $(document).ready(function () {  
            var refreshId = setInterval(function () {
                $('#loader').hide();
                }, 5000);
                $.ajaxSetup({ cache: false });
            });
        }
    function btndata_pendidikan(){ 
        let llnkk = '{{$link_datapenddkn}}';
        let linkkk = llnkk.replace('#', '&');
        // alert(linkk);
            $('#loader').show(); 
            window.location.href=linkkk;
            $(document).ready(function () {  
            var refreshId = setInterval(function () {
                $('#loader').hide();
                }, 5000);
                $.ajaxSetup({ cache: false });
            });
        }
    function btndata_pengalaman(){ 
        let llnkk = '{{$link_datapnglman}}';
        let linkkk = llnkk.replace('#', '&');
        // alert(linkk);
            $('#loader').show(); 
            window.location.href=linkkk;
            $(document).ready(function () {  
            var refreshId = setInterval(function () {
                $('#loader').hide();
                }, 5000);
                $.ajaxSetup({ cache: false });
            });
        }

        function btndata_ppk(){ 
        let llnkk = '{{$link_detppk}}';
        let linkkk = llnkk.replace('#', '&');
        // alert(linkk);
            $('#loader').show(); 
            window.location.href=linkkk;
            $(document).ready(function () {  
            var refreshId = setInterval(function () {
                $('#loader').hide();
                }, 5000);
                $.ajaxSetup({ cache: false });
            });
        }
    function btndata_krtukeluarga(){ 
        let llnkk = '{{$link_datakkelrga}}';
        let linkkk = llnkk.replace('#', '&');
        // alert(linkk);
            $('#loader').show(); 
            window.location.href=linkkk;
            $(document).ready(function () {  
            var refreshId = setInterval(function () {
                $('#loader').hide();
                }, 5000);
                $.ajaxSetup({ cache: false });
            });
        }
</script>
@endsection