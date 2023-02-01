@extends('layouts.layout_presence')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content')
<script src="{{asset('public/resource/qr/easy.qrcode.min.js')}}" type="text/javascript" charset="utf-8"></script>
<style>
    .btn-sm {
        padding: 5px;
    }

    .card-header {
        padding: 0.45rem 1.25rem !important;
    }

    .table td,
    .table th {
        padding: 0.05rem !important;
        vertical-align: middle !important;
        border-top: 1px solid #dee2e6 !important;
    }

    .card-body {
        padding: 0.25rem !important;
    }

    .swal2-popup {
        font-size: 0.7rem !important;
        width: 30em !important;
        max-width: 100% !important;
    }

    .swal2-html-container {
        text-align: justify !important;
    }

    hr {
        margin-top: 0.5rem !important;
        margin-bottom: 0.5rem !important;
    }
    .imgblock {
    margin: 10px 0;
    text-align: center;
    /* float: left; */
    /* min-height: 420px; */
    /* border-top: 1px solid #B4B7B4;
    border-bottom: 1px solid #B4B7B4; */
  }
  #container {
    /* width: 1030px; */
    margin: 0px auto;
  }

</style>
<div class="container" style="padding-top: 60px; padding-right: 5px ; padding-left: 5px;  height: 100vh;">
    <div class="card-deck mb-3 ">
        <div class="card shadow-sm" style="height:auto">
            <div class="card-header">
                <div class="row ">

                    <div class="col" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal" style="font-size: 12px;"><b>PosTab Verification</b></a>
                    </div>

                    <div class="col text-right" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal " style="font-size: 12px;"><b>{{$tanggalll}}</b></a>
                    </div>
                </div>
            </div>
            <div class="card-body"> 
                <div class="card p-2 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon"> 
                                <img src="http://api.champ-group.com/champ_dev/asset/champs_api/images_user/{{$dfuser[0]['foto']}}" class="img-circle avatar center"
                                    style="width: 50px; height: 50px;" /> 
                                </div>
                            <div class="text-left col">
                                <h3 class="mb-0 font-weight-normal">{{$dfuser[0]['nm_lengkap']}}</h3>
                                <span> {{$dfuser[0]['dept']}} ( {{$dfuser[0]['jnsotl']}} )</span>
                            </div>
                        </div> 
                    </div>  
                       
                    <div class="text-left mt-2">
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="" id="basic-addon3"
                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                        style="font-size: 12px; color:black; ">Jabatan </a>
                                </span>
                            </div>
                            <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                {{$dfuser[0]['jabatan']}}</a>
                        </div>
                    </div>  
                </div>  
                {{-- <div class="card  z-index-0 fadeIn3 fadeInBottom"> --}}
                <div id="container">
 
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>

    {{--
    <div class="fixed-plugin" onclick="pilihdwnd()">
        <a class="fixed-plugin-button text-white position-fixed px-3 py-2">
            <i class="material-icons py-2 fas fa fa-download"></i>
        </a>
    </div> --}}
</div>
<script type="text/template" id="qrcodeTpl">
    <div class="  ">
          <!-- <div class="title">{title}</div> -->
          <div class="qr card p-2" id="qrcode_{i}"></div>
      </div>
  </script>
<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
        // var qrrr = '{$qrgnrt}';

        var demoParams = [ 
		{
			title: "Logo + quietZoneColor",
			config: {
				text: '{{$qrgnrt}}', // Content

				width: 240, // Widht
				height: 240, // Height
				colorDark: "#000000", // Dark color
				colorLight: "#ffffff", // Light color
				
				quietZone: 15,
				quietZoneColor: '#ffffff',

				// === Logo
				//logo: "logo-transparent.png", // LOGO
				 					logo:"{{asset('public/resource/img/champs.png')}}",  
				//					logoWidth:80, 
				//					logoHeight:80,
				logoBackgroundColor: '#ffffff', // Logo backgroud color, Invalid when `logBgTransparent` is true; default is '#ffffff'
				logoBackgroundTransparent: false, // Whether use transparent image, default is false


				correctLevel: QRCode.CorrectLevel.H // L, M, Q, H

			} 

		}

	] 
	var qrcodeTpl = document.getElementById("qrcodeTpl").innerHTML;
	var container = document.getElementById('container');

	for (var i = 0; i < demoParams.length; i++) {
		var qrcodeHTML = qrcodeTpl.replace(/\{title\}/, demoParams[i].title).replace(/{i}/, i);
		container.innerHTML+=qrcodeHTML;
	}
	for (var i = 0; i < demoParams.length; i++) {
			var t=new QRCode(document.getElementById("qrcode_"+i), demoParams[i].config);
	}
</script>
<script>
    function pilihbln(){  
        $('#tipe_suarakrwan').val('B');
        $('#send_suarakaryawan').submit();
    } 
    function pilihdwnd(){  
        $('#tipe_suarakrwan').val('C');
        $('#send_suarakaryawan').submit();
    } 
    function isi_suara(isi){  
        $('#loader').hide();
        Swal.fire({
            icon: 'info', 
            text: isi,
            confirmButtonColor: '#cc1a0b',
            allowOutsideClick: false 
        }) 
    }  

    function inptnenter_noorder(){ 
         
        var input_norder = document.getElementById('inpt_noorder');

        input_norder.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            
            var inputaa =  document.getElementById('inpt_noorder').value;
            // alert(inputaa);
            jsn_adjst();
        }
        }); 
    }

</script>
<script>
    function jsn_adjst(){  
        var inpt_tgl =   $("#tgl_noorder").val();
        var inpt_nor =   $("#inpt_noorder").val();
         console.log(inpt_nor+'===='+inpt_tgl);
          
         $('#send_adjust').submit();
    }
</script>
<script>
    function btnjsn_adjust(){  
        
        var inpt_tgl =   $("#tgl_noorder").val();
        var inpt_nor =   $("#inpt_noorder").val();
        Swal.fire({
                    text: "Apakah anda ({{$nip}}) yakin akan Merubahnya?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: "Tidak",
                    confirmButtonText: 'Ya, Kirim!' ,
                    reverseButtons: true,
                    allowOutsideClick: false 
                }).then((result) => {
                    if (result.isConfirmed){ 
                    loadingon(); 
                    $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                    $.ajax({
                        type: 'POST',
                        url: '{{url("submit_adjust")}}', 
                        data: {"_token": "{{ csrf_token() }}","nip":'{{$nip}}',"inpt_tgl":inpt_tgl,"inpt_nor":inpt_nor},
                        dataType: 'json',
                        success:function(data){
                            
                            console.log(data);
                            $('#loader').hide();
                            
                                swal.fire({
                                icon: 'success',
                                title: '',
                                text: data['message'],
                                confirmButtonColor: '#cc1a0b',
                                allowOutsideClick: false 
                            }).then(function() { 
                                loadingon();
                                location.reload();
                            }); 
                                
                        },
                        error: function () {
                            $('#loader').hide();
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: "Server Kita Bermasalah!",
                                allowOutsideClick: false 
                            });
                        }
                    }); 
                }
            }) 
        }

</script>
@endsection