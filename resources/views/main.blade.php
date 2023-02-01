@extends('layouts.layout')
@section('content')
<style>
    .color-card {
        background-color: #F2E3D5;
        border-radius: 50%;
    }

    .tb {
        background-color: transparent;
        border: none;
    }

    hr.style13 {
        height: 10px;
        border: 0;
        width: 50px;
        box-shadow: 0 10px 10px -10px #8c8b8b inset;
        margin-top: 8px;
        margin-bottom: 0;
        border-radius: 12px;
    }

    /* html,
    body {
        height: 97%;
        margin: 0;
    } */

    body {
        background-color: #594438;
    }

    .full-height {
        height: 510px;
        background: rgb(255, 255, 255);
        margin-top: 20px;
        border-radius: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .card-detail {
        border-radius: 12px;
    }

    .cokelat1 {
        background-color: #594438;
    }

    .cokelat2 {
        background-color: #261B14;
        color: white;
    }

    .buttonoff {
        background-image: url('resource/img/mejaoff.png');
        background-size: cover;
        background-color: transparent;
        width: 90px;
        height: 90px;
        font-size: 2rem;
        color: <?php echo $color1;
        ?>;
        border: none;
        margin: 0 10px;
    }

    .buttonwarning {
        background-image: url('resource/img/warning.png');
        background-size: cover;
        background-color: <?php echo $color4;
        ?>;
        width: 90px;
        height: 90px;
        font-size: 2rem;
        color: <?php echo $color1;
        ?> !important;
        border: none;
        margin: 0 10px;
    }

    .buttonpilih {
        background-image: url('resource/img/mejapilih.png');
        background-size: cover;
        background-color: <?php echo $color4;
        ?>;
        width: 90px;
        height: 90px;
        font-size: 2rem;
        color: <?php echo $color1;
        ?>;
        border: none;
        margin: 0 10px;
    }

    .buttonoff:hover {
        background-color: green;
    }

    .buttonon {
        background-image: url('resource/img/mejaon.png');
        background-size: cover;
        background-color: <?php echo $color4;
        ?>;
        width: 110px;
        height: 110px;
        font-size: 1.5rem;
        font-weight: bold;
        color: <?php echo $color2;
        ?>;
        border: none;
        margin: 0 10px;
    }

    .buttonon:hover {
        background-color: <?php echo $color3;
        ?>
    }
</style>
<div class="card mt-4 m-1 card-detail">
    <div class="card-body p-2 cokelat2 card-detail">
        <div class="float-left">{{$jsonMeja['nmoutlet']}}</div>
        <div class="float-right">{{$tglclosing}}</div>
    </div>
</div>
<div class="card full-height">
    <div class="text-center">
        <hr class="style13">
    </div>
    <div class="table-responsive" style="overflow-x: hidden;">
        <div class="row" style="margin-bottom:200px;">
            @foreach ($meja as $item)
            <div class="col-3 m-2">
                @if($item['noorder'] == 'OPEN')
                <button type="button" class="buttonoff"
                    onclick="pilihmeja('{{$item['nomeja']}}')">{{$item['nomeja']}}</button>
                {{-- </div> --}}
                @else
                <button type="button" @if(date('Y-m-d H:i:s',strtotime('+1 hours'))>= date('Y-m-d H:i:s',strtotime('+1
                    hours',strtotime($item['tglposting'])))) class="buttonwarning" @else
                    class="buttonon" @endif onclick="pilihbayar('{{$item['noorder']}}')"
                    id="btnmejabayar{{$item['noorder']}}">
                    <span class="mb-1">
                        <p class="m-0">{{$item['nomeja']}}</p>
                    </span>
                    @if(date('Y-m-d H:i:s',strtotime('+1 hours'))>= date('Y-m-d H:i:s',strtotime('+1
                    hours',strtotime($item['tglposting']))))
                    <span class="mb-1" style="font-size:9px;color:rgb(255, 255, 255);">
                        <p class="m-0">{{date('H:i:s', strtotime($item['tglposting']))}}</p>
                    </span>
                    <span style="font-size:9px;color:rgb(255, 255, 255);">
                        <p class="m-0">Rp. {{number_format($item['tjl'], 0, '', '.')}}</p>
                    </span>
                    @else
                    <span class="mb-1" style="font-size:9px;color:rgb(96, 105, 15);">
                        <p class="m-0">{{date('H:i:s', strtotime($item['tglposting']))}}</p>
                    </span>
                    <span style="font-size:9px;color:rgb(96, 105, 15);">
                        <p class="m-0">Rp. {{number_format($item['tjl'], 0, '', '.')}}</p>
                    </span>
                    @endif
                </button>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="card m-2 pl-5 pr-5 pt-1 pb-1 shadow mb-5 fixed-bottom" style="background-color: white;border-radius:80px;">
    <div class="text-center">
        <hr class="style13">
    </div>
    <div class="row">
        <div class="col p-2">
            <div class="card p-0 m-1 tb">
                <div class="card-body color-card p-2">
                    <a href="#" onclick="window.location.reload();">
                        <img class="img-fluid" src="{{asset('resource/img/di.png')}}" alt="">
                    </a>
                </div>
                <div class="card-footer text-center pt-1 p-0 tb">
                    DineIn
                </div>
            </div>
        </div>
        <div class="col p-2">
            <div class="card p-0 m-1 tb">
                <div class="card-body color-card p-2">
                    <a href="#" onclick="pesantakeaway()">
                        <img class="img-fluid" src="{{asset('resource/img/ta.png')}}" alt="">
                    </a>
                </div>
                <div class="card-footer text-center pt-1 p-0 tb">
                    TakeAway
                </div>
            </div>
        </div>
        <div class="col p-2">
            <div class="card p-0 m-1 tb">
                <div class="card-body color-card p-2">
                    <a href="#" data-toggle="modal" data-target="#pilihKurir"><img class="img-fluid"
                            src="{{asset('resource/img/kr.png')}}" alt=""></a>
                </div>
                <div class="card-footer text-center pt-1 p-0 tb">
                    Kurir
                </div>
            </div>
        </div>
    </div>
</div>
@endsection