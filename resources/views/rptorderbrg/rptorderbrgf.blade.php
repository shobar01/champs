@extends('layouts.layout_presence')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content')
@include('rptorderbrg.m_dwonldf')
<style>
    .btn-sm {
        padding: 5px;
    }

    .table-bordered td,
    .table-bordered th {
        padding-top: 0;
        padding-bottom: 0;
        font-size: 14px;
    }

    tr.detail-row {
        display: none
    }

    tr.detail-row.open {
        display: block;
        display: table-row;
        background-color: #febf014b;
    }

    tr.detail-row.open:hover {
        background-color: #FEBD01;
    }

    tr.detail-row>td {
        border-top: 3px solid #d1e1ea !important;
    }
    .form-control{
        height: calc(0.8em + 0.75rem + 2px) !important;
        padding: 0rem 0.75rem;
        font-size: 12px !important;
    } 
    .input-group-text { 
        padding: 0rem 0.75rem !important;
    }
    table.dataTable thead th, table.dataTable thead td {
        padding: 3px 10px !important;
        border-bottom: 1px solid #ced4da;
        border-top: 1px solid #ced4da;
        background: #f1f1f1 !important;
        color: black !important;
    }
    table.dataTable tbody th, table.dataTable tbody td {
        /* padding: 6px 10px !important; */
    }
    .input-group-text { 
    background-color: #f1f1f1 !important;   
    }
    table.dataTable.no-footer {
    border-bottom: 1px solid #ced4da !important;
    }
    .btn-danger {
    color: #fff;
    background-color: #cc1a0b !important;
    border-color: #cc1a0b !important;
    } 
</style>
<div class="container" style="padding-top: 70px; padding-right: 0px ; padding-left: 0px; ">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">

                <div class="row ">

                    {{-- <a id="kkk" href="{{asset('storage/app/public/pdf/RPT-MSJ01-OB2212191143.pdf')}}" download>asdadada</a>  --}}
                    {{-- <a id="kkk"  download>asdadadada</a>--}}
                    
                    <div class="col-md-6">
                        <a class="my-0 font-weight-normal " style="font-size: 12px;"><b>Report Order Barang
                                ({{$kdbrng}})</b></a>
                    </div>

                    <div class="col-md-6">
                        <a class="my-0 font-weight-normal " style="font-size: 12px;"><b>{{$tanggalll}}</b></a>
                    </div>
                </div>
            </div>
            <div class="card-body" >

                <form id="send_perioderpt"  class="" action="{{ route('repot_ob') }}" method="GET">
                    @csrf

                    <input type="hidden" class="" name="dwnld_type" id="dwnld_type" />
                    <input type="hidden" name="kdotl" id="kdotl" value="{{$ikdoutlet}}">
                    <input type="hidden" name="kdakses" id="kdakses" value="{{$kdakses}}">
                    <input type="hidden" name="nip" id="nip" value="{{$nip}}">
                    <input type="hidden" name="kdoutlet" id="kdoutlet" value="{{$ikdoutlet}}">
                    @if ($kdakses != 'AVMS2')
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black; min-width: 115px;">Outlet</span>
                        </div>

                        <select class="form-control" name="toglekdotl" id="toglekdotl" onchange="pilihkdotl()">
                            @foreach ($dfotl as $otl)
                            <option value="{{ $otl['kdoutlet'] }}" @if ($ikdoutlet==$otl['kdoutlet'] ) selected @endif>{{$otl['sngktotl'] }} ({{ $otl['kdoutlet'] }})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black; min-width: 115px;">Tanggal
                            </span>
                        </div>

                        <input type="date" name="tanggal_ordbrg" id="tanggal_ordbrg" value="{{$itgl}}"
                            class="form-control date_now" style="font-size: 12px; color:black;" onchange="pilihkdotl()"
                            required>
                    </div>
                    @if($jmlkdord > 1)

                    <input type="hidden" name="txkdorgbrg" id="txkdorgbrg" value="{{$kdbrng}}">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black; min-width: 115px;">Pilih Kode Order
                            </span>
                        </div>
                        <select class="form-control" name="toglekdorgbrg" id="toglekdorgbrg" onchange="pilihkdorgbrg()">
                            @foreach ($dfkdbrng as $dfbrg)
                            <option value="{{ $dfbrg['kdordbarang'] }}" @if ($kdbrng==$dfbrg['kdordbarang'] ) selected
                                @endif>{{$dfbrg['kdordbarang'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <div class="form-group  mx-5">
                        @if(isset($detail))
                        <button class="btn btn-danger btn-sm col-md-3  float-right my-3" type="button"
                            onclick="periode_tgl('btn_pdf')"><i class="fa fa-file-pdf-o" title="Download PDF">
                                Export PDF</i></button>
                        @endif
                    </div>

                </form>

                {{-- Tabel content --}}
                <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">

                            @if(isset($detail))
                            <table id="tb_ordbrg" class="display nowrap " style="width:100%; ">
                                <thead>
                                    {{-- <tr style="background: #E99D03;"> --}}
                                    <tr>
                                        <th style="font-size: 12px !important">
                                            No.</th>
                                        <th style="font-size: 12px !important;">
                                            Kode</th>
                                        <th style="font-size: 12px !important;">
                                            Satuan</th>
                                        <th style="font-size: 12px !important;">
                                            Qty</th>
                                        <th style="font-size: 12px !important;">
                                            Nama</th>
                                        <th style="font-size: 12px !important;">
                                            Kode Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dford as $arrydetail)
                                    <tr>
                                        <td style="font-size: 12px !important;">
                                            {{$loop->iteration}}</td>
                                        <td style="font-size: 12px !important;">{{$arrydetail['kdbarang']}} </td>
                                        <td style="font-size: 12px !important;">{{$arrydetail['satuan']}} </td>
                                        <td style="font-size: 12px !important;">{{$arrydetail['qty']}} </td>
                                        <td style="font-size: 12px !important;">
                                            {{ucfirst(strtolower($arrydetail['nmbarang']))}}</td>
                                        <td style="font-size: 12px !important;">{{$arrydetail['kdorderbarang']}} </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            @else
                            <div class="text-center ">
                                <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}"
                                    background="transparent" speed="1"
                                    style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                                </lottie-player>
                                
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });

        function ii(){
            $('#kkk').attr('href','{{asset("resource/img/logo.png")}}'); 
            // $('#kkk').attr('href','{{asset('storage')}}/app/public/pdf/robots.txt'); 

            setTimeout(function(){ 
                    document.getElementById('kkk').click();
                }, 1000);
        }
        // ii();
</script>
<script>
    function pilihkdotl(){ 
    var toglekdotl = $('#toglekdotl').val();
    $('#kdotl').val(toglekdotl); 
    $('#dwnld_type').val('btn_periode');  
    $('#send_perioderpt').submit(); 
}
function pilihkdorgbrg(){ 
    var toglekdotl = $('#toglekdotl').val();
    $('#kdotl').val(toglekdotl); 
    $('#dwnld_type').val('btn_periode'); 
    var toglekdorgbrg = $('#toglekdorgbrg').val();
    $('#txkdorgbrg').val(toglekdorgbrg); 
    $('#send_perioderpt').submit();
}
function periode_tgl(diklik){
    
    loadingon();  
    setTimeout(hidee, 15000); 
        function hidee() {
            $('#loader').hide();
        }
            // 
    var toglekdotl = $('#toglekdotl').val();
    $('#kdotl').val(toglekdotl);  
    $('#dwnld_type').val(diklik);    
    $('#send_perioderpt').submit(); 
}
</script>

@endsection

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js">
</script> --}}