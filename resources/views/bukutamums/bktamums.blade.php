@extends('layouts.layout_ms')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content')

<style>
    @media only screen and (min-width: 1366px) {
        .card-res {
            height: 530px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            position: fixed;
            top: 565px;
            right: 20px;
            font-size: 12px;
        }

        th {
            font-size: 12px !important;
        }

        td {
            font-size: 11px !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            color: #1d1c1a !important;
            text-align: left !important;
            font-size: 11px !important;
            padding-top: 0px !important;
            position: fixed !important;
            top: 580px !important;
        }

        #wilx {
            width: 1080px !important;
        }
    }

    @media only screen and (min-width: 2049px) {
        .card-res {
            height: 840px !important;
        }

        .dataTables_filter input {
            height: 40px !important;
        }

        body {
            font-size: 18px !important;
        }

        div.dataTables_scrollBody {
            max-height: 650px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            position: fixed;
            top: 875px !important;
            right: 20px;
            font-size: 12px !important;
        }

        th {
            font-size: 18px !important;
            padding-right: 24px !important;
        }

        td {
            font-size: 16px !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            color: #1d1c1a !important;
            text-align: left !important;
            font-size: 18px !important;
            padding-top: 0px !important;
            position: fixed;
            top: 875px !important;
        }

        #wilx {
            width: 1670px !important;
        }
    }

    @media only screen and (min-width: 4098px) {
        .card-res {
            height: 1760px !important;
        }

        .dataTables_filter input {
            height: 60px !important;
        }

        body {
            font-size: 34px !important;
        }

        div.dataTables_scrollBody {
            max-height: 1200px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            position: fixed;
            top: 1785px !important;
            right: 20px;
            font-size: 12px;
        }

        th {
            font-size: 34px !important;
        }

        td {
            font-size: 32px !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            color: #1d1c1a !important;
            text-align: left !important;
            font-size: 32px !important;
            padding-top: 0px !important;
            position: fixed;
            top: 1760px !important;
        }

        #wilx {
            width: 3400px !important;
        }
    }

    @media only screen and (min-width: 5464px) {
        .card-res {
            height: 2390px !important;
        }

        .dataTables_filter input {
            height: 80px !important;
        }

        body {
            font-size: 44px !important;
        }

        div.dataTables_scrollBody {
            max-height: 1400px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            position: fixed;
            top: 2420px !important;
            right: 20px;
            font-size: 12px;
        }

        th {
            font-size: 44px !important;
        }

        td {
            font-size: 42px !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            color: #1d1c1a !important;
            text-align: left !important;
            font-size: 42px !important;
            padding-top: 0px !important;
            position: fixed;
            top: 4550px !important;
        }
    }

    .aaa:not([scope=row]) {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 2;
        background-color: azure;
    }

    .aaa2:not([scope=row]) {
        position: -webkit-sticky;
        position: sticky;
        left: 95px;
        z-index: 2;
        background-color: azure;
    }

    table.dataTable>thead>tr>th.napel {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 2;
        background-color: #ff3636;
    }

    table.dataTable>thead>tr>th.napel2 {
        position: -webkit-sticky;
        position: sticky;
        left: 95px;
        z-index: 2;
        background-color: #ff3636;
    }

    @media (min-width: 1200px) {

        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl {
            max-width: 1540px;
        }
    }

    th {
        font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
        font-size: 12px;
    }

    td {
        /* padding: 6px 2px 0px 2px !important; */
        font-size: 11px;
    }

    /* Round Corner for TOP LEFT COLUMN */
    table thead tr:first-child th:first-child {
        border-top-left-radius: 7px;
    }

    /* Round Corner for TOP RIGHT COLUMN */
    table thead tr:first-child th:last-child {
        border-top-right-radius: 7px;
    }

    /* Round Corner for BOTTOM LEFT COLUMN */
    table tbody tr:last-child td:first-child {
        border-bottom-left-radius: 7px;
    }

    /* Round Corner for BOTTOM RIGHT COLUMN */
    table tbody tr:last-child td:last-child {
        border-bottom-right-radius: 7px;
    }

    .bb:not([scope=row]) {
        border-top: 1px solid #1d1c1a;
    }

    .sekrol-main::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.13) !important;
        background: transparent !important;
    }

    .sekrol-main::-webkit-scrollbar {
        width: 12px !important;
        background: transparent !important;
    }

    .sekrol-main::-webkit-scrollbar-thumb {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.432) !important;
        background-color: #FF3636 !important;
    }

    a {
        margin: 0px 8px 0px 0px !important;
    }

    td.details-control {
        text-align: center;
        color: forestgreen;
        cursor: pointer;
        font-size: 11px;
    }

    tr.shown td.details-control {
        text-align: center;
        color: #FF3636;
    }

    div.dataTables_wrapper div.dataTables_info {
        position: fixed;
        top: 580px;
    }

    div.dataTables_wrapper div.dataTables_paginate {
        position: fixed;
        top: 565px;
        right: 20px;
        font-size: 12px;
    }

    .imgbulat {
        width: 20px;
        height: 20px;
        overflow: hidden;
        border-radius: 50%;
        color: white !important;
        /* border: 2px solid #fff; */
        background: green;
        vertical-align: middle;
        /* box-shadow: 0 3px 2px rgb(0 0 0 / 40%);*/
    }

    .circle {
        background: #e89f55;
        border-radius: 50%;
        color: white;
        height: 20px;
        font-weight: bold;
        width: 20px;
        display: table;
        margin: 2px auto;
    }

    .circle a {
        vertical-align: middle;
        display: table-cell;
    }

    .table td,
    .table th {
        padding: 0.4rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
</style>

<div class="" style="padding-top: 65px !important; padding-right: 0px !important ; padding-left: 0px !important;">

    <div class="card-deck ">
        <div class="card shadow-sm">
            <div class="card-body" style="padding-top: 10px !important;">

                <form id="send_viewbuktamu" class="" action=" " method="GET">
                    @csrf

                    <input type="hidden" name="btn_kontak" id="btn_kontak" value="{{$btn_kontak}}">
                    <input type="hidden" name="kdoutlet" id="kdoutlet" value="{{$kdoutlet}}">
                    <input type="hidden" name="nmoutlet" id="nmoutlet" value="{{$nmoutlet}}">
                    <table class="" style="width:100%; ">
                        {{-- <tr style="background: #E99D03;"> --}}
                        <tr>

                            @if ($btn_kontak == 'F')
                            <td style="font-size: 12px !important; color : white; width: 48%;">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"
                                            style="font-size: 14px; color:black;">Tanggal :
                                        </span>
                                    </div>
                                    <input type="date" name="tanggal_vbktamu" id="tanggal_vbktamu" value="{{$tgl}}"
                                        class="form-control date_now" style="font-size: 14px; color:black; "
                                        onchange="periode_tgl()" max="{{$date_max}}" min="{{$date_minplgtgl}}" required>
                                </div>
                            </td>
                            <td style="font-size: 12px !important; color : white; width: 2%;">
                            </td>
                            @endif

                            <td style="font-size: 12px !important; color : white; width: 48%;">
                                <input id="search_bktm" type="text" class="form-control" placeholder="Searching"
                                    aria-label="Search" aria-describedby="basic-addon2">
                            </td>
                        </tr>
                    </table>

                </form>
                <div class="fw-container"
                    style="margin-top: 1%; overflow-x: hidden;  height: 70vh; list-style-type: none; padding: 5px;">
                    <div class="fw-body">
                        <div class="content">
                            @if(isset($df_tamunow))
                            @if($btn_kontak == 'R')
                            <div class="table-responsive">
                                <table id="tb_viewbktm" class="display nowrap table table-striped "
                                    style="width:100%; ">
                                    <thead>
                                        <tr style="background: #8C5E4D;">
                                            <th style="font-size: 12px !important; color : white;" class="text-center">
                                                List Guest</th>
                                            <th style="font-size: 12px !important; color : white;" class="text-left">
                                                Name</th>
                                            <th style="font-size: 12px !important; color : white;" class="text-left">
                                                Contact</th>
                                            @if($tgl == $date_min && $btn_kontak != 'T')
                                            <th style="font-size: 12px !important; color : white;" class="text-center">
                                                Visit (Customer Pax)</th>
                                            @endif
                                            <th style="font-size: 12px !important; color : white;" class="text-center">
                                                Reservation</th>
                                            <th style="font-size: 12px !important; color : white;" class="text-center">
                                                No Table</th>
                                        </tr>
                                    </thead>
                                    <tbody id="isimenu">
                                        @foreach ($df_tamunow as $dftm)
                                        <tr>
                                            <td id="hd{{$dftm['kontak']}}" class="text-center"
                                                onclick="tmpl_dt('{{$dftm['kontak']}}')">
                                                <div class="action-buttons">
                                                    <a href="#" class="green bigger-140 show-details-btn"
                                                        title="Show Details" style="font-size: 14px;">
                                                        <i id="icon_id{{$dftm['kontak']}}"
                                                            class=" fa fa-chevron-circle-down"
                                                            style="color:#8C5E4D;"></i>
                                                        <span class="sr-only">Details</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td style="font-size: 12px !important;" class="text-left">
                                                {{ucfirst(strtolower($dftm['nmcust']))}}
                                            </td>
                                            <td style="font-size: 12px !important;" class="text-left">
                                                {{$dftm['kontak']}}
                                            </td>
                                            @if($tgl == $date_min && $btn_kontak != 'T')
                                            <td style="font-size: 12px !important;" class="text-center">
                                                {{$dftm['urtn']}}x ({{$dftm['paxcu']}} Pax)</td>
                                            @endif
                                            <td style="font-size: 12px !important;" class="text-center">
                                                {{$dftm['tgl']}}
                                                {{-- {{$dftm['wkt']}} --}}
                                            </td>
                                            <td style="font-size: 12px !important;" class="text-center">
                                                <button type="button" class="btn  btn-success btn-sm "
                                                    onclick="btn_update('{{$dftm['kontak']}},{{$dftm['tgl']}},{{$dftm['wkt']}},{{$dftm['nmcust']}},{{$dftm['urtn']}},{{$dftm['meja']}},{{$dftm['paxcu']}},{{$dftm['tglrsr']}}')"
                                                    style="padding: 2px !important;
                                                    font-size: 10px !important; @if($dftm['meja'] =='F') background-color: #28a745;
                                                    @elseif($dftm['meja'] =='R') background-color:#cc1a0b; border-color: #cc1a0b; @else background-color:#8C5E4D; border-color: #8C5E4D;  @endif "
                                                    @if($dftm['tglrsr'] !=$date_min) disabled @endif>
                                                    <i
                                                        class="@if($dftm['meja'] =='F') ion-edit @else ion-android-restaurant @endif "></i>
                                                    @if($dftm['meja'] =='F') Waitinglist @elseif($dftm['meja'] =='R')
                                                    Reservation @else {{$dftm['meja']}}@endif</button>
                                            </td>
                                        </tr>
                                        <tr class="detail-row" style="display: none; " id="det{{$dftm['kontak']}}">
                                            <td colspan="12" style="padding: 2px 50px 10px 50px;!important;">
                                                <div class="">
                                                    <table class="table table-striped shadow card-body  "
                                                        style="width:100%; border-radius: 20px;">
                                                        <thead>
                                                            <tr style="background: #e89f55; height: 10px;">
                                                                <th style="font-size: 10px !important; color : white;"
                                                                    class="text-center">
                                                                    No <a style="font-size: 10px !important;"
                                                                        class="text-center" hidden>
                                                                        {{$dftm['nmcust']}}{{$dftm['kontak']}} </a>
                                                                </th>
                                                                <th style="font-size: 10px !important; color : white;"
                                                                    class="text-center">
                                                                    Visit</th>
                                                                <th style="font-size: 10px !important; color : white;"
                                                                    class="text-center">
                                                                    Note</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dftm['detail'] as $detail)
                                                            <tr>
                                                                <td style="font-size: 10px !important;"
                                                                    class="text-center">{{$detail['urutan']}}
                                                                    <a style="font-size: 10px !important;"
                                                                        class="text-center" hidden>
                                                                        {{$detail['nmcust']}}{{$detail['kontak']}}
                                                                    </a>
                                                                </td>
                                                                <td style="font-size: 10px !important;"
                                                                    class="text-center">{{$detail['tgldatang']}}
                                                                    {{$detail['jamdatang']}}
                                                                </td>
                                                                <td style="font-size: 10px !important;"
                                                                    class="text-center">{{$detail['keterangan']}}
                                                                </td>
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
                            @else
                            <div class="table-responsive">
                                <table id="tb_viewbktm" class="display nowrap table table-striped "
                                    style="width:100%; ">
                                    <thead>
                                        <tr style="background: #8C5E4D;">
                                            <th style="font-size: 12px !important; color : white;" class="text-center">
                                                List Guest</th>
                                            <th style="font-size: 12px !important; color : white;" class="text-left">
                                                Name</th>
                                            <th style="font-size: 12px !important; color : white;" class="text-left">
                                                Contact</th>
                                            @if($tgl == $date_min && $btn_kontak != 'T')
                                            <th style="font-size: 12px !important; color : white;" class="text-center">
                                                Visit (Customer Pax)</th>
                                            @endif
                                            <th style="font-size: 12px !important; color : white;" class="text-center">
                                                Last Visit</th>
                                            @if($tgl == $date_min && $btn_kontak != 'T')
                                            <th style="font-size: 12px !important; color : white;" class="text-center">
                                                No Table</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody id="isimenu">
                                        @foreach ($df_tamunow as $dftm)
                                        <tr>
                                            <td id="hd{{$dftm['kontak']}}" class="text-center"
                                                onclick="tmpl_dt('{{$dftm['kontak']}}')">
                                                <div class="action-buttons">
                                                    <a href="#" class="green bigger-140 show-details-btn"
                                                        title="Show Details" style="font-size: 14px;">
                                                        <i id="icon_id{{$dftm['kontak']}}"
                                                            class=" fa fa-chevron-circle-down"
                                                            style="color:#8C5E4D;"></i>
                                                        <span class="sr-only">Details</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td style="font-size: 12px !important;" class="text-left">
                                                {{ucfirst(strtolower($dftm['nmcust']))}}
                                            </td>
                                            <td style="font-size: 12px !important;" class="text-left">
                                                {{$dftm['kontak']}}
                                            </td>
                                            @if($tgl == $date_min && $btn_kontak != 'T')
                                            <td style="font-size: 12px !important;" class="text-center">
                                                {{$dftm['urtn']}}x ({{$dftm['paxcu']}} Pax)</td>
                                            @endif
                                            <td style="font-size: 12px !important;" class="text-center">
                                                {{$dftm['tgl']}}
                                                {{$dftm['wkt']}}
                                            </td>

                                            @if($tgl == $date_min && $btn_kontak != 'T')
                                            <td style="font-size: 12px !important;" class="text-center">
                                                <button type="button" class="btn  btn-success btn-sm "
                                                    @if($dftm['meja']=='R' ) onclick="btn_nav('reservation')" @else
                                                    onclick="btn_update('{{$dftm['kontak']}},{{$dftm['tgl']}},{{$dftm['wkt']}},{{$dftm['nmcust']}},{{$dftm['urtn']}},{{$dftm['meja']}},{{$dftm['paxcu']}},F')"
                                                    @endif
                                                    style="padding: 2px !important;
                                                    font-size: 10px !important; @if($dftm['meja'] =='F') background-color: #28a745;
                                                    @elseif($dftm['meja'] =='R') background-color:#cc1a0b; border-color: #cc1a0b; @else background-color:#8C5E4D; border-color: #8C5E4D;  @endif ">
                                                    <i
                                                        class="@if($dftm['meja'] =='F') ion-edit @else ion-android-restaurant @endif "></i>
                                                    @if($dftm['meja'] =='F') Waitinglist @elseif($dftm['meja'] =='R')
                                                    Reservation @else {{$dftm['meja']}}@endif</button>
                                                {{-- <div class="circle"><a class="">100</a>
                                                </div> --}}
                                            </td>
                                            @endif
                                        </tr>
                                        <tr class="detail-row" style="display: none; " id="det{{$dftm['kontak']}}">
                                            <td colspan="12" style="padding: 2px 50px 10px 50px;!important;">
                                                <div class="">
                                                    <table class="table table-striped shadow card-body  "
                                                        style="width:100%; border-radius: 20px;">
                                                        <thead>
                                                            <tr style="background: #e89f55; height: 10px;">
                                                                <th style="font-size: 10px !important; color : white;"
                                                                    class="text-center">
                                                                    No <a style="font-size: 10px !important;"
                                                                        class="text-center" hidden>
                                                                        {{$dftm['nmcust']}}{{$dftm['kontak']}} </a>
                                                                </th>
                                                                <th style="font-size: 10px !important; color : white;"
                                                                    class="text-center">
                                                                    Visit</th>
                                                                <th style="font-size: 10px !important; color : white;"
                                                                    class="text-center">
                                                                    Note</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dftm['detail'] as $detail)
                                                            <tr>
                                                                <td style="font-size: 10px !important;"
                                                                    class="text-center">{{$detail['urutan']}}
                                                                    <a style="font-size: 10px !important;"
                                                                        class="text-center" hidden>
                                                                        {{$detail['nmcust']}}{{$detail['kontak']}}
                                                                    </a>
                                                                </td>
                                                                <td style="font-size: 10px !important;"
                                                                    class="text-center">{{$detail['tgldatang']}}
                                                                    {{$detail['jamdatang']}}
                                                                </td>
                                                                <td style="font-size: 10px !important;"
                                                                    class="text-center">{{$detail['keterangan']}}
                                                                </td>
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
                            @endif
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
@include('bukutamums.m_tmbhtamu')
@include('bukutamums.m_updtemeja')

<script src="{{asset('public/resource/js/lottie.js')}}"></script>
<script>
    var field = document.createElement('input');
    field.setAttribute('type', 'text');
    document.body.appendChild(field);

    setTimeout(function() {
        field.focus();
        setTimeout(function() {
            field.setAttribute('style', 'display:none;');
        }, 50);
    }, 50);
  
        function tmpl_dt(idd){  
            $('.detail-row').hide();
            $('#det'+idd).show();
            $('#hd'+idd).removeAttr('onclick');
            $('#hd'+idd).attr('onclick','tmpl_dt2(\''+idd+'\')');
        }
        function tmpl_dt2(idd){  
            $('#det'+idd).hide();
            $('#hd'+idd).removeAttr('onclick');
            $('#hd'+idd).attr('onclick','tmpl_dt(\''+idd+'\')');
        }
</script>
<!-- Bootstrap 4 Autocomplete -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js"
    crossorigin="anonymous"></script>

<script>
    function send(){
        var nmcus       = $('#nm_tmu').val();
        var nowa        = $('#no_wa').val();
        var ketcu       = $('#ket_tmu').val();
        var no_table    = $('#no_table').val();
        var pax_tmu     = $('#pax_tmu').val();
        var txdate      = $('#tx_date').val();
        var txjam       = $('#tx_jam').val();
        var kdotl       = '{{$kdoutlet}}'; 
        var txdate1;
        if ('{{$btn_kontak}}' == 'R'){ 
            txdate1 = txdate+' '+txjam+':00';
        }else{
            txdate1= null;
        }

        console.log('========='+txdate1);
    loadingon(); 
    if (nmcus == "" || nowa== "") {
            $('#loader').hide();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No WhatsApp/ Nama Tidak Boleh Kosong!',
                confirmButtonColor: '#3085d6',
                allowOutsideClick: false  
            })
            // alert('Tidak Boleh Kosong');
        } else { 
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
            type: 'POST',
            url: '{{url("contacttamu")}}',
            data: {"_token": "{{ csrf_token() }}","tipe":"A","nmcust":nmcus,"kontak":nowa,"ketrngn":ketcu,"kdoutlet":kdotl,"meja":no_table,"pax_tmu":pax_tmu,"tglreservasi":txdate1},
            dataType: 'json',
            success:function(data){
                $('#loader').hide();
                var len = data.length;
                console.log(data);
                for (let i = 0; i < len; i++) {
                    var nmcust = data[i]['nmcust'];
                    var kontak = data[i]['kontak']; 
                }  
                document.getElementById('dpassword').style.display='none';
                location.reload();
            },
            error: function () {
                $('#loader').hide();
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Server Kita Bermasalah nih!",
                    allowOutsideClick: false 
                });
            }
        });
        }
       
    } 
        var src = {@foreach ($df_tamuall as $dftam) "{{$dftam['kontak'] }}" : "{{$dftam['nmcust'] }}", @endforeach}; 
                
   
 
         function onSelectItem(item, element) {
             $('#nm_tmu').val(item.value);
             $('#nm_tmu').attr("disabled", true); 
         }
 
         $('#no_wa').autocomplete({
             source: src,
             onSelectItem: onSelectItem,
             highlightClass: 'text-danger'
         }); 
</script>
<script>
    function periode_tgl(diklik){

    var toglekdotl = $('#toglekdotl').val();
    var tanggal_vbktamu = $('#tanggal_vbktamu').val();
   
    console.log(tanggal_vbktamu+'========='+'{{$date_min}}')
    // btn_kontak=F
    $('#kdotl').val(toglekdotl);  
    $('#dwnld_type').val(diklik);
    $('#send_viewbuktamu').submit();
    } 
    function btn_shwtmbh(){
        document.getElementById('dpassword').style.display='block';
    $("#li_home").removeClass("active");
    $("#li_contact").removeClass("active"); 
    }
    function btn_update(isi){
        var data = isi.split(',');
        var nowa = data[0]; 
        var tgl = data[1];
        var wkt = data[2]; 
        var nm = data[3];  
        var urt = data[4];
        var meja = data[5];
        var pxtm = data[6];    
        var tglrsr = data[7]; 
        // $('#modal_baking').modal('show');
        // $('#upmej_no_wa').html(nama); 
        $('#upmej_no_wa').val(nowa);
        $('#upmej_nm_tmu').val(nm); 
        $('#upmej_lvisit').val(tgl+' '+wkt);   
        $('#upmej_jmlvst').val(urt);   
        $('#no_table2').val(meja); 

        if(tglrsr != 'F'){   
        console.log('tglrsr '+tglrsr+'======='+tgl+'====='+tgl.substring(tgl.length,-5));
        //  $('#tx_dateup').val(tglrsr); 
         $('#tx_jamup').val(tgl.substring(tgl.length,-5)); 
        } 

        $('#upmej_pax_tmu').val(pxtm);     
        $('.selectpicker').selectpicker('refresh');  
      document.getElementById('upmeja').style.display='block';   
    }
</script>
<script>
    function btn_nav(isi){ 
      if(isi == 'contact'){    
        loadingon(); 
        $('#btn_kontak').val('T');  
      }else if(isi == 'home'){
        $('#btn_kontak').val('F');  
        location.reload();
      }else if( isi == 'reservation'){
        loadingon(); 
        $('#btn_kontak').val('R');   
      } 
    $('#send_viewbuktamu').submit();
    } 
</script>
@if ($btn_kontak == 'F')
<script>
    $('#li_home').addClass("active");    
    $('#nm_tittle').html('Buku Tamu '); 
</script>
@elseif ($btn_kontak == 'T')
<script>
    $('#li_contact').addClass("active");
    $('#nm_tittle').html('Kontak Tamu '); 
</script>
@else
<script>
    $('#li_reservation').addClass("active");
    $('#nm_tittle').html('Reservation '); 
</script>


@endif
@endsection

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js">
</script> --}}