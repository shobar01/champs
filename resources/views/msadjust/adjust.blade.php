@extends('layouts.layout_presence')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content')
<style> 
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
</style>
<div class="container" style="padding-top: 60px; padding-right: 5px ; padding-left: 5px; height: 100vh;">
    <div class="card-deck mb-3 ">
        <div class="card shadow-sm" style="height:auto">
            <div class="card-header">
                <div class="row ">

                    <div class="col" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal" style="font-size: 12px;"><b>Adjust MS</b></a>
                    </div>

                    <div class="col text-right" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal " style="font-size: 12px;"><b>{{$tanggalll}}</b></a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form id="send_adjust" class="" action="{{ route('adjustms') }}" method="GET">
                    @csrf
                    <input type="text" id="nip" name="nip" value="{{$nip}}" hidden />

                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black; min-width: 90px;">Tgl Closing
                            </span>
                        </div>

                        <input type="date" name="tgl_noorder" id="tgl_noorder" value="{{$itgl}}"
                            class="form-control date_now align-middle" style="font-size: 12px; color:black;" required>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black;min-width: 90px;">No Order
                            </span>
                        </div>
                        <input type="text" id="inpt_noorder" name="inpt_noorder" class="form-control "
                            value="{{$noorder}}" style="font-size: 12px; color:black;" onkeypress="inptnenter_noorder()"
                            placeholder="contoh : MSJXX-22050600000XXX" required>
                    </div>
                </form>
                <div class="text-center px-1 pb-2 mt-3">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-lg btn-block btn-success" id="Searching"
                                onclick="jsn_adjst()" style="width:100%; font-weight: 500; font-size: 12px;">
                                Cari NoOrder
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Tabel content --}}
                @if($jsrslt['success'] == '1')
                <div class="content">
                    <div id="accordion" class="accordion md-accordion" role="tablist" aria-multiselectable="true">
                        <ul id="nav-tab" style="overflow-x: hidden; list-style-type: none; padding: 5px;">
                            <li id="ii'+noorder" class="bg-white rounded ">

                                <div class="card-header text-center mb-1" style=" padding:5px !important;"><a
                                        style="font-size: 14px; color:black;"><b>{{$noorder}}
                                            ({{$jsrslt['nomeja']}})</b></a>
                                </div>


                                <div class="shadow-lg rounded-2 bg-white p-1">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="text-left" id="basic-addon3"
                                                style="font-size: 10px; color:black; min-width: 90px; padding:0px"><a
                                                    style="font-size: 12px; color:black; "><b>Kasir </b></b></a>
                                            </span><b>: </b>
                                        </div>
                                        <a style="font-size: 12px; color:black;"><b> &nbsp; {{$jsrslt['nama']}}-
                                                {{$jsrslt['nipkasir']}}</b></a>
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="text-left" id="basic-addon3"
                                                style="font-size: 10px; color:black; min-width: 90px; padding:0px"><a
                                                    style="font-size: 12px; color:black; "><b>TgPosting
                                                    </b></b></a>
                                            </span><b>: </b>
                                        </div>
                                        <a style="font-size: 12px; color:black;"><b> &nbsp;
                                                {{$jsrslt['tglposting']}}</b></a>

                                    </div>
                                </div>
                                {{-- Tabel Content --}}
                                <div class="table-responsive" style="overflow-x: hidden">
                                    <div class="table-responsive" style="overflow-x: hidden; height: 250px; ">
                                        <table id="tbllogkredit" class="table table-striped"
                                            style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important; "
                                            width="100%">
                                            {{-- tgl,kdoutlet,NmOutlet,ip sisa --}}

                                            @foreach ($jsrslt['detail'] as $dfdet)
                                            <tr style="height:30px">
                                                <td class="ftsize12l" width="70%">{{$dfdet['mnn']}}</td>
                                                <td class="ftsize12r" width="5%"> x{{$dfdet['qtyjual']}}</td>
                                                <td class="ftsize12r text-right" width="25%">
                                                    {{number_format($dfdet['tts'], 0, '', '.') }}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                {{-- End Tabel Content --}}

                            </li>
                        </ul>

                    </div>

                </div>
                <div class="shadow-lg rounded-2 bg-white" style="  z-index: 1030; ">
                    <div class="pt-1 pr-2">
                        <table class=" nowrap " width="100%">
                            <tbody>
                                <tr>
                                    <th class="text-right py-0" style="font-size: 12px; color: black;">
                                        Subtotal
                                    </th>
                                    <th class="text-right py-0"
                                        style="font-size: 12px; color: black; padding-right: 5px; width: 30%;">
                                        {{number_format($jsrslt['jmljual'], 0, '', '.') }}
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-right py-0" style="font-size: 12px; color: black;">Service
                                    </th>
                                    <th class="text-right py-0"
                                        style="font-size: 12px; color: black; padding-right: 5px; width: 30%;">
                                        {{number_format($jsrslt['jmlserv'], 0, '', '.') }}</th>
                                </tr>
                                <tr>
                                    <th class="text-right py-0" style="font-size: 12px; color: black;">PB1
                                    </th>
                                    <th class="text-right py-0"
                                        style="font-size: 12px; color: black; padding-right: 5px; width: 30%;">
                                        {{number_format($jsrslt['jmltax'], 0, '', '.') }}
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-right py-0" style="font-size: 14px; color: black;">Total
                                    </th>
                                    <th class="text-right py-0"
                                        style="font-size: 14px; color: black; padding-right: 5px; width: 30%;">
                                        Rp. {{number_format($jsrslt['jmljual']+$jsrslt['jmltax']+$jsrslt['jmlserv'], 0,
                                        '', '.') }}
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    @if($jsrslt['jmljual'] != "0")
                    <div class="text-center px-1 pb-2">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-lg btn-block btn-success" id="pay-button"
                                    onclick="btnjsn_adjust()" style="width:100%; font-weight: 500; font-size: 12px;">
                                    Proses
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @else
                <div class="text-center ">
                    <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}"
                        background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop
                        autoplay>
                    </lottie-player>
                    
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                </div>
                @endif
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

<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
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