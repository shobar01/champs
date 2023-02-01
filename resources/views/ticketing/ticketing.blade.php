@extends('ticketing.layout.layout')
@section('content')

<button type="button" class="btn btn-info btn-topright shadow" data-toggle="modal" data-target="#info"><i
        class="fa fa-info"></i></button>
<div class="card mt-5 main-card">
    <img src="{{asset('public/resource/img/footer-logo.png')}}" class="opacity-img">
    <div class="card-body pt-1 ccb">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item nvpilih" role="presentation">
                <a class="nav-link active {{$bgcolor}}2" id="pills-home-tab" data-toggle="pill"
                    data-target="#pills-home" role="tab" aria-controls="pills-home"
                    aria-selected="true">{{$nmstatus}}</a>
            </li>
            <li class="nav-item nvpilih" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Kategori</a>
            </li>
        </ul>
        <div class="row mt-2">
            <div class="col-6 pr-0"><input type="text" class="text-left form-control search shadow" id="searchtk"
                    placeholder="Search...">
            </div>
            <div class="col-6 pl-1 pr-2 bold text-right">
                <button class="btn btn-tanggal shadow" type="button" onclick="bukatglhist()">
                    <i class="fa fa-calendar"></i> {{\Carbon\Carbon::parse($tanggal)->translatedFormat('d M Y')}}
                </button>
                <button class="btn btn-tanggal shadow" type="button" onclick="window.location.reload();loadingon();">
                    <i class="fa fa-refresh"></i>
                </button>
                <input type="hidden" id="tanggalhist" value="{{date('Y-m-d')}}">
            </div>
        </div>
    </div>

    <div class="card-body pt-0" id="cbd">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @if(count($lstrack) == 0)
                <div class="text-center img-center">
                    <lottie-player src="{{asset('public/resource/js/found3.json')}}" background="transparent" speed="1"
                        style="width: 300px; height: 300px;" loop autoplay>
                    </lottie-player>
                </div>
                @else
                <div class="row" id="isiticket">
                    @foreach ($lstrack as $item)
                    <div class="col-6 col-xs-6 col-sm-3 col-lg-3  p-1 xxc">
                        <div class="card shadow m-1 card-rad" onclick="openticket('{{$item['kdticket']}}')">
                            <div class="card-body card-rad p-0">
                                <div class="row">
                                    <div class="col-3">
                                        <button type="button" class="btn {{$item['bgcolor']}} card-rad btn-status">
                                            <i class="fa {{$item['image']}} text-white"></i>
                                        </button>
                                    </div>
                                    <div class="col-9">
                                        <span class="fon">{{$item['iddepttujuan']}}</span>
                                        <p class="bold txtnama mb-0">{{$item['nmreq']}}</p>
                                        <p class="f-10 mb-0">
                                            {{$item['kdticket']}}
                                        </p>
                                        <p class="f-10 mb-1 spket">
                                            {{\Carbon\Carbon::parse($item['wktupdate'])->translatedFormat('H:i')}}
                                        </p>
                                        <p class="f-10 mb-1">
                                            {{Str::limit($item['keterangan'],16)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                <div class="btnx">
                    <button class="btn btn-add" type="button" data-toggle="modal" data-target="#exampleModal"><i
                            class="fa fa-plus fa-2x"></i></button>
                    <span class="title">Add Request</span>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="panel p-3">
                    <div class="card-body p-0">
                        <div class="row" id="mstatus">
                            @foreach ($df_status as $df)
                            <div class="col-3 text-center p-1">
                                <button onclick="cekkd('{{$df['kdstatus']}}')"
                                    class="box-kat shadow {{$df['bgcolor']}}">
                                    <i class="fa {{$df['image']}} fa-2x text-white">
                                        @if($df['jml'] != '0')
                                        <span class="shadow jml-alert">{{$df['jml']}}</span>
                                        @endif
                                    </i>
                                </button>
                                <p class="f-label">{{$df['nmstatus']}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

</div>

@include('ticketing.modal.informasi')
@include('ticketing.modal.infokat')
@include('ticketing.modal.tglhist')
@include('ticketing.modal.detailtick')
@include('ticketing.modal.note')
@include('ticketing.modal.maps')
@include('ticketing.modal.readby')
@include('ticketing.modal.addreq')
@include('ticketing.modal.rate')
@include('ticketing.modal.klikfoto')
@include('ticketing.modal.mdfoto')
@include('ticketing.modal.tfoto')
@include('ticketing.modal.terima')
@include('ticketing.modal.tfototer')
{{-- @include('ticketing.modal.mdfototerima')
@include('ticketing.modal.terfoto') --}}
@include('ticketing.script')
<input type="hidden" id="testobay" value="F">

@if (session('success'))
<script>
    Swal.fire({
        icon : "success",
        title: "Success",
        text:"{{session('success')}}"
    })
</script>
@elseif (session('error'))
<script>
    Swal.fire({
        icon : "error",
        title: "Failed",
        text:"{{session('error')}}"
    })
</script>
@endif
@endsection