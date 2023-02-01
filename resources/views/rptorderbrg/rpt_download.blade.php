<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
          /* .container {
            max-width: 2480px;
            font-size: .5vw;
            position: absolute;
        } */
        .table-bordered td,
        .table-bordered th {
            padding: 2px !important;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;

        }

        /* Center the image and position the close button */
        .img.container {
            text-align: center;
            margin: 0 0 24px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .fixed-plugin .fixed-plugin-button {
            /* background: #1e7e34 !important; */
            font-size: 0.25rem !important;
        }

        .fixed-plugin .fixed-plugin-button {
            background: #fff;
            border-radius: 10%;
            bottom: 50px;
            right: 20px;
            font-size: 1.25rem;
            z-index: 990;
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.16);
            cursor: pointer;
        }

        .fixed-plugin .fixed-plugin-button i {
            pointer-events: none;
        }

        .fixed-plugin .card {
            position: fixed !important;
            right: -360px;
            top: 0;
            height: 100%;
            left: auto !important;
            transform: unset !important;
            width: 360px;
            border-radius: 0;
            padding: 0 10px;
            transition: .2s ease;
            z-index: 1020;
        }

        .fixed-plugin .badge {
            border: 1px solid #fff;
            border-radius: 50%;
            cursor: pointer;
            display: inline-block;
            height: 23px;
            margin-right: 5px;
            position: relative;
            width: 23px;
            transition: all 0.2s ease-in-out;
        }

        .fixed-plugin .badge:hover,
        .fixed-plugin .badge.active {
            border-color: #344767;
        }

        .fixed-plugin .btn.bg-gradient-dark:not(:disabled):not(.disabled) {
            border: 1px solid transparent;
        }

        .fixed-plugin .btn.bg-gradient-dark:not(:disabled):not(.disabled):not(.active) {
            background-color: transparent;
            background-image: none;
            border: 1px solid #344767;
            color: #344767;
        }

        .fixed-plugin.show .card {
            right: 0;
        }

        .material-icons {
            font-size: 20px !important;
        }

        body.swal2-shown>[aria-hidden="true"] {
            transition: 0.1s filter;
            filter: blur(10px);
        }

        .swal2-popup {
            font-size: 0.7rem !important;
            width: 20em !important;
            max-width: 100% !important;
        }

        .swal2-html-container {
            text-align: justify !important;
        }

        .form-control:focus {
            border-color: #cc1a0b;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5);
        }
        html, body {
        /* height: 100% !important; */
        margin: 0 !important;
        /* background: #cc1a0b !important */
        }

        .full-height {
        /* height: 100%; */ 
        width: 100%  !important;
        background: #f0f3f4  !important;
        border-top-left-radius: 25px  !important;
        border-top-right-radius: 25px  !important;
        margin-top: 60px  !important;
        /* position: fixed; */
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;

            
        }
        .container {
            
            max-width: 2480px;
            /* font-size: .5vw; */
            /* position: absolute; */
            /* height: 100vh; */
            width: 100%;
            padding-right: 10px !important; 
            padding-left: 10px !important;
            margin-right: auto;
            margin-left: auto;
            padding-top: 10px !important;
        }
        a {
            /* color: #000000 !important; */
            text-decoration: none !important;
            background-color: transparent; 
        }
    </style>
    <title>Download PDF</title>
</head>

<body > 
    {{-- <nav class=" header  fixed-top" style="height: 30px !important; padding: 30px 0 30px 0 !important;">
        <div class="mx-auto my-2 order-0 order-md-1 position-relative">
            <img src="{{asset('public/resource/img/logo.png')}}" class="img-circle avatar center  fixed-top"
                style="width: 60px; height: 60px;" />
        </div>
    </nav> --}} 
    <div class="text-center" style="  background: #cc1a0b !important ; height: 80px;" >
        <img src="{{asset('public/resource/img/logo-cmprs.png')}}" style="width: 60px; height: 60px;"  >
    </div>   
    <div class="container  " style="  padding-right: 0px ; padding-left: 0px;width: 100%  !important;
    background: #f0f3f4  !important;
    border-top-left-radius: 25px  !important;
    border-top-right-radius: 25px  !important;  margin-top: -20px; ">  
        <div class="card-deck mb-3 ">
            <div class="card mb-4 shadow-sm">
                
                    <div class="fw-container" style="">
                        <div class="fw-body">
                            <div class="content">  
                                    <div style=" -ms-flex-wrap: wrap; flex-wrap: wrap; " class="mb-4 "> 

                                        
                                        <div class="col text-left mt-2 ">
                                            <a class="my-0 font-weight-normal" style="font-size: 24px; color: #000000 !important; "><b>Report Order Barang, {{$nmotl}} </b></a>
                                        </div>
                                        {{-- <div class="col text-right" >
                                            <a class="my-0 font-weight-normal" style="font-size: 26px; min-widht"><b>{{$tanggalll}}</b></a>
                                        </div> --}}
                                        <div class="text-left"> 
                                            <div class="  ml-3"> 
                                                <a  style="font-size: 20px; color:black; min-width: 180px; padding:0px"> Kode Order/Doc &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                                </a> 
                                                <a style="font-size: 20px; color:black;  padding-left:180px; padding-right:5px;"> :
                                                    {{$kdbrng}} / {{$whdocno}} 
                                                </a>
                                            </div> 
                                            <div class="  ml-3"> 
                                                <a  style="font-size: 20px; color:black; min-width: 180px; padding:0px"> Tgl. Order/User &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                </a> 
                                                <a style="font-size: 20px; color:black;  padding-left:180px; padding-right:5px;"> :
                                                    {{$wktorder}} / {{$nm_lengkap}} 
                                                </a>
                                            </div> 
                                            <div class="  ml-3"> 
                                                <a  style="font-size: 20px; color:black; min-width: 180px; padding:0px"> Tgl. Datang Barang  
                                                </a> 
                                                <a style="font-size: 20px; color:black;  padding-left:180px; padding-right:5px;"> :
                                                    {{$tglterima}} 
                                                </a>
                                            </div> 
                                         
                                        </div>     
                                        
                                    </div> 
                                     
                                <div class="table-responsive  ">

                                    <table id="tb_ordbrgpdf" class="table table-striped table-bordered"
                                        style="width:98%; margin-left:8px;">

                                        <tbody>
                                            <tr class="text-center">
                                                <th
                                                    style="border: 1px solid #111 !important; font-size: 26px !important;  font-weight: 500; width:5%; background: #FEBD01 !important;">
                                                    No.</th>
                                                <th
                                                    style="border: 1px solid #111 !important; font-size: 26px !important;  font-weight: 500; width:10%; background: #FEBD01 !important;">
                                                    Kode</th>
                                                <th
                                                    style="border: 1px solid #111 !important; font-size: 26px !important;  font-weight: 500; width:50%;background: #FEBD01 !important;">
                                                    Nama Barang</th>
                                                <th
                                                    style="border: 1px solid #111 !important; font-size: 26px !important; font-weight: 500; width:10%; background: #FEBD01 !important;">
                                                    Satuan</th>
                                                <th
                                                    style="border: 1px solid #111 !important; font-size: 26px !important; font-weight: 500; width:10%;background: #FEBD01 !important;">
                                                    Qty</th>
                                            </tr>
                                            @foreach ($dford as $arrydetail)
                                            <tr>
                                                <td class="text-center"
                                                    style="font-size: 26px !important; font-weight: 500; width:5%; border: 1px solid #111 !important; ">
                                                    {{$loop->iteration}}</td>
                                                <td class="text-center"
                                                    style="font-size: 26px !important;  font-weight: 500; width:10%; border: 1px solid #111 !important; ">
                                                    {{$arrydetail['kdbarang']}}
                                                </td>
                                                <td
                                                    style="font-size: 26px !important;  font-weight: 500; width:50%;border: 1px solid #111 !important;">
                                                    {{ucfirst(strtolower($arrydetail['nmbarang']))}}</td>
                                                <td class="text-center"
                                                    style="font-size: 26px !important;  font-weight: 500; width:10%;border: 1px solid #111 !important; ">
                                                    {{$arrydetail['satuan']}} </td>
                                                <td class="text-center"
                                                    style="font-size: 26px !important;  font-weight: 500; width:10%; border: 1px solid #111 !important;">
                                                    {{$arrydetail['qty']}} </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 

            </div> 
        </div>
          
        @if(isset($linkk)) 
                                            
        {{-- <div class="ml-3 "> 
        <a href="https://api.whatsapp.com/send?text=https://codelapan.com/post/cara-membuat-copy-to-clipboard-dengan-javascript" 
        class="text-center text-dark" target="_blank" 
        rel="noreferrer" title="Share this post on Whatsapp" aria-label="WhatsappShare"> 
        <img data-src="https://codelapan.com/front/img/whatsapp.png" 
        class="icon-share rounded-circle shadow-sm me-2 mb-2 lazyloaded" 
        style="width: 43px" alt="Whatsapp" 
        src="https://codelapan.com/front/img/whatsapp.png"> <small> Share to <br>Whatsapp</small> </a>
        </div> --}}
        
        {{-- <div class="fixed-plugin" onclick="btn_shareob('{{$linkk}}')">
            <a class="fixed-plugin-button text-white position-fixed px-3 py-2"> 
                <img 
                class=" shadow-sm " 
                style="width: 300px;" alt="Whatsapp" 
                src="{{asset('public/resource/img/share.png')}}">   
            </a>
        </div> --}}
        <a class="fixed-plugin-button text-white position-fixed px-3 py-2" href="{{asset('public/resource/img/share.png')}}" download> aaaaaaaa
            <img 
            class=" shadow-sm " 
            style="width: 300px;" alt="Whatsapp" 
            src="{{asset('public/resource/img/share.png')}}">   
        </a>
        {{-- <div class="ml-3 "> 
            <input id="id_link" name="id_link" value="{{$linkk}}"/>
            <div type="button" style="font-size: 20px; min-width: 180px; padding:0px  color: blue !important;
            text-decoration: underline blue !important;
            background-color: transparent; " onclick="cplink()"> Copy Link untuk di bagikan! 
            </div>  
        </div>  --}}
        @endif
    </div> 
   
    {{-- <div class=" text-center" style="bottom:10px !important;">
        <img src="{{asset('public/resource/img/footer.jpg')}}" width="500px">
    </div> --}}
      <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>
  <script>
    function btn_shareob(linkkk){
        $('#loader').show(); 
            window.location.href='https://api.whatsapp.com/send?text='+linkkk;
            $(document).ready(function () {  
            var refreshId = setInterval(function () {
                $('#loader').hide();
                }, 5000);
                $.ajaxSetup({ cache: false });
            });
    }
    function cplink() {
    // Get the text field
    var copyText = document.getElementById("id_link"); 
    // // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    var isitx ='aaasdda';

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);
    // Alert the copied text
    alert("Berhasil di copy , silahkan paste di group whatsapp LOGISTK : " + copyText.value);
    }
  </script>
</body>

</html>