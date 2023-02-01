@extends('layouts.layout_presence')
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

    .btn-danger {
        color: #fff !important;
        background-color: #cc1a0b !important;
        border-color: #cc1a0b !important;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding-top: 01.25rem;
        padding-right: 0.25rem;
        padding-bottom: 1.25rem;
        padding-left: 0.25rem;
    }
</style>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>



<div class="container" style="padding-top: 70px; padding-right: 10px; padding-left: 10px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <div class="row ">

                    <div class="col" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>About Us</b></a>
                    </div>
                    <div class=" text-right" style="padding: 0 10px 0 5px !important;">
                        <div id="gbl_rfrsh" type="button" style=" font-weight: bold; font-size: 14px;"
                            onclick="rfrsh()"><i class='fa fa-refresh' style='color: #000; margin: 0 5px 0 5px;'></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style=" height:500px;">
                {{-- <a href="" target="blank">LINKKKKK</a> --}}
                <ul style="overflow-x: hidden; height: 70vh; list-style-type: none; padding: 5px;" id="ul_about">
                    @foreach ($dfabout as $df)

                    <li id="{{$df['SubAbout']}}" class=""
                        onclick="btn_about('{{$df['IsiAbout']}}#{{$df['SubAbout']}}')">
                        <div class="card mb-3 shadow bg-white ">
                            <div class="btn btn-lg" style="height: 80px;">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="icon">
                                            <img src="{{$df['IcoAbout']}}" class="img-circle avatar center"
                                                style="width: 40px;  " />
                                        </div>
                                        <div class="ml-2 c-details">
                                            <a class="tx16">{{$df['ListAbout']}}</a>
                                            {{-- <span>1 days ago</span> --}}
                                        </div>
                                    </div>

                                    <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div>
                                    {{-- <div class="badge"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                                    --}}
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
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

        function btn_about(isi){
            
        var data = isi.split('#');
        var llnkk = data[0]; 
        var title = data[1]; 
            let linkkk = llnkk.replace('#', '&');
            // alert(linkk);
            
            console.log(title);
                $('#loader').show(); 
                if(title == 'AboutApk'){ 
                    if('{{$nmdvc}}' == 'Apple'){ 
                        swal.fire({
                            icon: 'success',
                            title: '',
                            text: "Silahkan lihat di App Store!",
                            confirmButtonColor: '#cc1a0b',
                            allowOutsideClick: false,
                        });
                        // window.open('itms-apps://apps.apple.com/id/app/champsmobile/id1629576661?l=id', '_blank');
                    }else{ 
                        swal.fire({
                            icon: 'success',
                            title: '',
                            text: "Silahkan lihat di Google Play Store!",
                            confirmButtonColor: '#cc1a0b',
                            allowOutsideClick: false,
                        });
                        // window.open(linkkk, '_blank');
                    } 
                    // ios 
                    // https://apps.apple.com/id/app/champsmobile/id1629576661
                }else{ 
                    window.location.href=linkkk;
                }

                $(document).ready(function () {  
                var refreshId = setInterval(function () {
                    $('#loader').hide();
                    }, 5000);
                    $.ajaxSetup({ cache: false });
                });
        }
</script>

@endsection