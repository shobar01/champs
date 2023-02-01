@extends('layouts.layout_presence')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content')
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

    .card-body {
        padding: 0.50rem !important;
    }

    .swal2-popup {
        font-size: 0.7rem !important;
        width: 30em !important;
        max-width: 100% !important;
    }

    .swal2-html-container {
        text-align: justify !important;
    }

    .fixed-plugin .fixed-plugin-button {
        bottom: 30px !important;
        right: 10px !important;
    }

    .card-header {
        padding: 0.40rem 1.25rem !important;
    }

    .form-control {
        height: calc(0.8em + 0.75rem + 2px) !important;
        padding: 0rem 0.75rem;
        font-size: 12px !important;
    }

    .input-group-text {
        padding: 0rem 0.75rem !important;
    }

    table.dataTable thead th,
    table.dataTable thead td {
        padding: 3px 10px !important;
        border-bottom: 1px solid #111;
        background: #cc1a0b !important;
        color: white !important;
    }

    table.dataTable tbody th,
    table.dataTable tbody td {
        padding: 3px 10px !important;
    }
</style>
<div class="container" style="padding-top: 70px; padding-right: 5px ; padding-left: 5px; ">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm" style="height:88vh">
            <div class="card-header">
                <div class="row ">

                    <div class="col" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal" style="font-size: 12px;"><b>Suara Karyawan</b></a>
                    </div>

                    <div class="col text-right" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal " style="font-size: 12px;"><b>{{$tanggalll}}</b></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="send_suarakaryawan" class="" action="{{ route('suara_krwn') }}" method="GET">
                    @csrf
                    <input type="text" id="tipe_suarakrwan" name="tipe_suarakrwan" value="" hidden />

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black; min-width: 130px;">Periode Tanggal
                            </span>
                        </div>

                        <input type="date" name="tgl_suarakrwan" id="tgl_suarakrwan" value="{{$itgl}}"
                            class="form-control date_now" style="font-size: 12px; color:black;" onchange="pilihtgl()"
                            required>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black;min-width: 130px;">Periode Bulan
                            </span>
                        </div>
                        <input type="month" id="bln_suarakrwan" name="bln_suarakrwan" min="2022-04" value="{{$ibln}}"
                            max="{{$maxbln}}" class="form-control " style="font-size: 12px; color:black;"
                            onchange="pilihbln()" required>
                        {{-- <input type="date" name="tgl_suarakrwan" id="tgl_suarakrwan" value="{{$itgl}}"
                            class="form-control date_now" style="font-size: 12px; color:black;" onchange="pilihtgl()"
                            required> --}}
                    </div>
                </form>

                {{-- Tabel content --}}
                <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">

                            @if(isset($df_suarak))

                            <div class="table-responsive" style="overflow-x: hidden; height: 400px; ">
                                <table id="tb_ordbrg" class="display nowrap " style="width:100%;  ">
                                    <thead>
                                        {{-- <tr style="background: #E99D03;"> --}}
                                        <tr>
                                            <th
                                                style="border-top: 1px solid #111 !important; font-size: 12px !important">
                                                No.</th>
                                            <th class="text-left"
                                                style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                                Nama</th>
                                            {{-- <th
                                                style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                                Nip</th> --}}
                                            {{-- <th
                                                style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                                Dept</th>
                                            <th
                                                style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                                Jabatan</th> --}}
                                            <th
                                                style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                                Waktu</th>
                                            <th
                                                style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                                Isi Pesan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($df_suarak as $df)
                                        <tr>
                                            <td style="font-size: 12px !important;">
                                                {{$loop->iteration}}</td>
                                            <td class="text-left" style="font-size: 12px !important;">
                                                {{Str::substr($df['nm_lengkap'],0,1)}}****
                                            </td>
                                            {{-- <td style="font-size: 12px !important;">{{$df['nip']}} </td> --}}
                                            {{-- <td style="font-size: 12px !important;">{{$df['dept']}} </td>
                                            <td style="font-size: 12px !important;">{{$df['jabatan']}} </td> --}}
                                            <td style="font-size: 12px !important;">{{$df['wktsrn']}} </td>
                                            <td style="font-size: 12px !important;">
                                                <i class="fa fa-eye"
                                                    onclick="isi_suara('{{Str::substr($df['nm_lengkap'],0,1)}}**** : {{$df['isisaran']}}')"></i>
                                            </td>
                                            {{-- {{ucfirst(strtolower($arrydetail['nmbarang']))}}</td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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

    <div class="fixed-plugin" onclick="pilihdwnd()">
        <a class="fixed-plugin-button text-white position-fixed px-3 py-2">
            <i class="material-icons py-2 fas fa fa-download"></i>
            {{-- <i class="material-icons py-2">add</i> --}}
        </a>
    </div>
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
    function pilihtgl(){  
        $('#tipe_suarakrwan').val('A');
        $('#send_suarakaryawan').submit();
    } 
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
</script>

@endsection

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js">
</script> --}}