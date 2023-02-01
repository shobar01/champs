@extends('layouts.layout')
@section('title', 'Dashboard')
@section('content')
@include('modal.m_dashboard')
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;

    }
</style>


<nav class="navbar navbar-default header navbar-fixed-top">
    <div class="col-md-12 nav-wrapper">
        <div class="navbar-header" style="width:100%;">

            <a href="index.html" class="navbar-brand">
                <b>Work Order</b>
            </a>

            <ul class="nav navbar-nav navbar-right user-nav">

                <li class="user-name"><span>{{ session('nm_lengkap') }}</span></li>
                <li class="dropdown avatar-dropdown" style="margin-right: 20px;">
                    @php
                    if(empty(session('fotoqu'))){
                    @endphp
                    <img src="{{asset('resource/img/logo.png')}}" class="img-circle avatar center" alt="user name"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
                    @php
                    }else{
                    @endphp
                    <img src="{{'data:image/png;base64,'.session('fotoqu')}}" class="img-circle avatar center"
                        alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
                    @php
                    }
                    @endphp


                    <ul class="dropdown-menu user-dropdown">
                        <li><a href="#"><span class="fa fa-user"></span> My Profile</a></li>
                        <li><a href="#"><span class="fa fa-calendar"></span> My Calendar</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="more">
                            <ul>
                                <li><a href=""><span class="fa fa-cogs"></span></a></li>
                                <li><a href=""><span class="fa fa-lock"></span></a></li>
                                <li><a onclick="alertLogout();"><span class="fa fa-power-off "></span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid mimin-wrapper">
    <div id="content">
        <div class="panel" style="margin:0px 30px 0 30px;">
            <div class="panel-body">
                <div class="col-md-6 col-sm-6">
                    <h3 class="animated fadeInLeft">{{substr(session('outlet'), 0 ,15)}}</h3>
                    <h4 class="animated fadeInLeft">{{substr(session('outlet'), 15).' ('.session('kd_dept').')'}}</h4>

                    <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> {{session('posisi')}},
                        Indonesia</p>

                </div>
                <div class="col-md-6 col-sm-6">
                    <div class=" text-right" style="padding-right:50px;">
                        <div class="time">
                            <div id="timestamp" class='animated fadeInLeft'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 padding-0" style="padding-top: 10px;">
            <div class="col-md-6">
                <div class="panel box-v1">
                    <div class="col-md-12 ">
                        <div class="panel-heading bg-green row ">
                            <h3 class="text-white col-md-9">List Menu
                            </h3>

                            <div class="text-white col-md-3" style="margin-top: 15px">
                                <button class="btn ripple btn-round btn-sm btn-danger" data-toggle="tooltip"
                                    data-placement="top" title="" style="margin:5px;" data-original-title="Tambah">
                                    <i class="fa fa-plus"> Tambah </i>
                                </button>
                            </div>

                        </div>
                        <div class="panel top-20">
                            <div class="responsive-table">
                                <table id="tabel_listmenu" class="table table-striped table-bordered" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!--                                        <th class=" col-md-1 text-center ">No</th>-->
                                            <th class=" col-md-4 text-center ">Name</th>
                                            <th class=" col-md-3 text-center ">Periode</th>
                                            <th class=" col-md-1 text-center ">Stok</th>
                                            <th class=" col-md-1 text-center ">Kurang</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no = 1; ?>
                                        @foreach ($arrybrgwo as $arry)
                                        <!--                                      <tr onclick="Click_tblmenu(this)"> -->
                                        <tr>
                                            <!--                                        <td class=" col-md-1 text-center ">--><?php //echo $no; ?>
                                            <!--</td>-->
                                            <td class=" col-md-4 text-left ">{{$arry['nmbarang']}}
                                                ({{$arry['kdbarang']}})
                                            </td>
                                            <td class=" col-md-3 text-center ">{{substr($arry['periode1'],0,5)}}
                                                - {{substr($arry['periode2'],0,5)}}
                                            </td>
                                            <td class=" col-md-1 text-center ">{{$arry['jmlawal']}}</td>
                                            <td class=" col-md-1 text-center ">
                                                <button id="btn_done" class=" btn btn-round btn-sm btn-warning"
                                                    onclick="showmodal('{{$no}},{{$arry['nmbarang']}},{{$arry['kdbarang']}},{{$arry['periode1']}}')">
                                                    {{$arry['jmltarget']}}/{{$arry['jmlbutuh']}}
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body text-center">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel box-v1">
                    <div class="col-md-12">
                        <div class="panel-heading bg-blue row ">
                            <h3 class="text-white col-md-9">On Process Baking
                            </h3>

                            <div class="text-white col-md-3" style="margin-top: 15px">
                                <button class="btn ripple btn-round btn-sm btn-danger" data-toggle="tooltip"
                                    data-placement="top" title="" style="margin:5px;" data-original-title="History">
                                    <i class="fa fa-history"> History</i>
                                </button>
                            </div>

                        </div>
                        <div class="panel top-20">
                            <div class="responsive-table">
                                <table id="tabel_baking" class="table table-striped table-bordered" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!--                                            <th class="col-md-1 text-center">No</th>-->
                                            <th class="col-md-4 text-center">Name</th>
                                            <th class="col-md-1 text-center">Qty</th>
                                            <th class="col-md-1 text-center">Clock</th>
                                            <th class="col-md-3 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no2 = 1; ?>
                                        @foreach ($arryhtmsk as $arrymsk)
                                        <tr onclick="Click_baking(this)">
                                            <!--                                            <td class="col-md-1 text-center">--><?php //echo $no2; ?>
                                            <!--</td>-->
                                            <td class="col-md-4">{{$arrymsk['nmbarang']}}
                                                ({{$arrymsk['kdbarang']}})</td>
                                            <td class="col-md-1 text-center">{{$arrymsk['jmlmasak']}}</td>
                                            <td class="col-md-1 text-center">{{Str::substr($arrymsk['wktmasak'],11)}}
                                            </td>
                                            <td class="col-md-3 text-center" data-toggle="modal"
                                                data-target="#modal_view">
                                                <button class=" btn-round btn-sm btn-success">
                                                    &nbsp;&nbsp;<i class="fas fa fa-edit"></i>&nbsp;&nbsp;</button>
                                            </td>
                                        </tr>
                                        <?php $no2++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body text-center">
                    </div>
                </div>
            </div>
        </div>

        <!-- end: content -->


        <!-- start: right menu -->
        <!-- end: right menu -->
    </div>

</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<script>
    setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
    //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
    function timestamp() {
        $.ajax({
            url: "{{asset('resource/php/ajax_timestamp.php')}}",
            success: function (data) {
                $('#timestamp').html(data);
            }
        });
    }
</script>
@endsection