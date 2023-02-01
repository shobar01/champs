@extends('layouts.layout')
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

                <div class="fw-container"
                    style="margin-top: 1%; overflow-x: hidden;  height: 70vh; list-style-type: none; padding: 5px;">
                    <div class="fw-body">
                        <div class="content">
                            
                            <div class="text-center ">
                                <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_AQcLsD.json"
                                    background="transparent" speed="1"
                                    style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                                </lottie-player>
                                <h5 class="text-center">BukuTamu Sudah tidak tersedia di sini, silahkan unistall aplikasi MS Bukutamu dan buka Fitur Antrian/BukuTamu pada aplikasi POSTAB!!!</h5>
                            </div> 


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> 
@endsection

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js">
</script> --}}