@extends('layouts.layout')
@section('title', 'PT.Champ Resto Indonesia')
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
        border-top: 3px solid #d1e1ea !important
    }
</style>

<div class="container-fluid" style="padding-top: 70px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Report Buku Tamu</h4>
            </div>
            <div class="card-body" style="padding-left: 0.5rem; padding-right: 0.5rem;">

                <div class="fw-container">

                    <div class="fw-body">

                        <div class="content">
                            <div class="input-group mb-3">
                                <input id=" " type="text" class="form-control" placeholder="Searching"
                                    aria-label="Search Anything here" aria-describedby="basic-addon2">
                                {{-- <div class="input-group-append">
                                    <button onclick="document.getElementById('dpassword').style.display='block'"
                                        class="btn btn-success" type="button">Reset
                                        Password</button>
                                </div> --}}
                            </div>
                            <div class="table-responsive">
                                <table id="tb_rptbukutamu" class="display nowrap table table-striped table-bordered"
                                    style="width:100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Daftar Tamu</th>
                                            <th>Kode Outlet</th>
                                            <th>Nama Outlet</th>
                                            <th>Area</th>
                                            <th>Tanggal</th>
                                            <th>Total Pengunjung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dfrbyOutlet as $otl)
                                        <tr>
                                            <td class="text-center">
                                                <div class="action-buttons">
                                                    <a href="#" class="green bigger-140 show-details-btn"
                                                        title="Show Details">
                                                        <i class="ace-icon fa fa-angle-double-down"
                                                            style="color:green;"></i>
                                                        <span class="sr-only">Details</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">{{$otl['KdOutlet']}}</td>
                                            <td>{{$otl['NmOutlet']}}</td>
                                            <td>{{$otl['Area']}}</td>
                                            <td>{{$otl['Tanggal']}}</td>
                                            <td>{{$otl['TotalPengunjung']}}</td>
                                        </tr>
                                        <tr class="detail-row">
                                            <td colspan="12">
                                                <div class="table-detail" style="padding-top: 5px;">
                                                    <table class="table table-striped table-bordered"
                                                        style="width:100%;">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th>No. Hp</th>
                                                                <th>Nama</th>
                                                                <th>Datang</th>
                                                                <th>Pulang</th>
                                                                <th>JmlOrang</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($otl['DaftarTamu'] as $detail)
                                                            <tr>
                                                                <td>{{$detail['NoHp']}}</td>
                                                                <td>{{$detail['Nama']}}</td>
                                                                <td>{{$detail['Datang']}}</td>
                                                                <td>{{$detail['Pulang']}}</td>
                                                                <td>{{$detail['JmlOrang']}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- <table id="tb_rptbukutamu" class="display nowrap " style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="border-top: 1px solid #111 !important;">No.</th>
                                        <th style="border-top: 1px solid #111 !important;">Kode Outlet</th>
                                        <th style="border-top: 1px solid #111 !important;">Tanggal</th>
                                        <th style="border-top: 1px solid #111 !important;">Nama Outlet</th>
                                        <th style="border-top: 1px solid #111 !important;">Area</th>
                                        <th style="border-top: 1px solid #111 !important;">Pengunjung</th>
                                        <th style="border-top: 1px solid #111 !important;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dfrbyOutlet as $arrybyotl)
                                    <tr>

                                        <td>{{$loop->iteration}}</td>
                            <td>
                                {{$arrybyotl['KdOutlet']}}
                            </td>
                            <td style="text-align: left !important;">{{$arrybyotl['Tanggal']}}</td>

                            <td style="text-align: left !important;">
                                {{$arrybyotl['NmOutlet']}}
                            </td>
                            <td>{{"Bpk. ".$arrybyotl['Area']}}</td>
                            <td>{{$arrybyotl['TotalPengunjung']}}</td>
                            <td><a class='btn btn-sm btn-success ' title='detailreport'><i class='fa fa-eye'
                                        style='color: #fff ' onclick="btn_detrpt('{{$arrybyotl['Tanggal']}}')"></i></a>
                            </td>
                            </tr>
                            @endforeach

                            </tbody>
                            </table> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function btn_detrpt(isi) { 
        // alert(isi);
        
        $('#modal_detrpt').modal('show');
        document.getElementById('modal_detrpt').style.display = 'block';  
        
        $('#lbl_tgl').html(isi);
        // When the user clicks anywhere outside of the modal, close it


    }
 
</script>