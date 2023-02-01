@extends('addmenu.layout')
@section('content')
<div class="card mt-5 main-card">
    <img src="{{asset('public/resource/img/footer-logo.png')}}" class="opacity-img">
    <div class="card-body pt-1 ccb">
        <button type="button" class="btn btn-block btn-head">Request Add Menu -
            {{\Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y')}}</button>
        <div class="row mt-2">
            <div class="col-5 pr-0"><input type="text" class="text-left form-control search shadow" id="search"
                    placeholder="Search...">
            </div>
            <div class="col-4 px-1"><input type="date" name="" id="tglini"
                    class="form-control px-1 text-center tanggal shadow" onchange="ubahtgl()" value="{{$tanggal}}">
            </div>
            <div class="col-3 pl-1 nw">
                <i class="fa fa-sync" onclick="location.reload();"></i>
                <a href="{{route('viewAlertMenu')}}">
                    <span class="spn-bell"><i class="fa fa-bell animate__animated @if($jmlmn != " 0") animate__headShake
                            animate__infinite @endif"></i>
                        @if($jmlmn != "0")<button class="btn btn-rad" type="button">{{$jmlmn}}</button>@endif
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="card-body pt-1" id="cbd">
        @if(count($menu) == 0)
        <div class="text-center img-center">
            <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_EaOthPrBLy.json" background="transparent"
                speed="1" style="width: 300px; height: 300px;" loop
                autoplay>
            </lottie-player>
        </div>
        @endif
        @foreach ($menu as $item)
        <a>
            <div class="card shadow mt-2 crd" id="card{{$item['kdmenu']}}{{$item['kdoutlet']}}">
                <div class="card-body">
                    <i class="fa fa-bookmark" id="bm{{$item['kdmenu']}}{{$item['kdoutlet']}}"></i>
                    <span class="fw">{{$item['nmoutlet']}}</span>
                    <div class="row">
                        <div class="col-10 pr-1">
                            <span> [{{$item['kdmenu']}}] </span> <span
                                id="nmmenu{{$item['kdmenu']}}{{$item['kdoutlet']}}">{{$item['nmmenu']}}</span>
                            <hr>
                            <span class="info">
                                <span class="time">
                                    <i class="fa fa-clock"></i>
                                    {{date('h:i:s', strtotime($item['wktrequest']))}}
                                </span>
                                <span class="clip">
                                    <i class="fa fa-clipboard"></i>
                                    <span id="note{{$item['kdmenu']}}{{$item['kdoutlet']}}"></span>
                                </span>
                            </span>
                            <span class="span-act">
                                <button class="btn btn-act btn-reject" type="button"
                                    id="rj{{$item['kdmenu']}}{{$item['kdoutlet']}}"
                                    onclick="rja('{{$item['kdmenu']}},{{$item['kdoutlet']}}')"><i
                                        class="fa fa-times"></i></button>
                                <button class="btn btn-act btn-approve" type="button"
                                    id="ap{{$item['kdmenu']}}{{$item['kdoutlet']}}"
                                    onclick="apa('{{$item['kdmenu']}},{{$item['kdoutlet']}}')"><i
                                        class="fa fa-check"></i></button>
                            </span>
                        </div>
                        <div class="col-2 px-0 text-center">
                            <span style="display: block"><img id="img{{$item['kdmenu']}}{{$item['kdoutlet']}}"
                                    onclick="bukaimg('{{$item['kdmenu']}},{{$item['kdoutlet']}}')"
                                    src="{{$item['foto']}}"
                                    class="img-foto"></span>
                            <span class="text-center lbl-number"
                                id="lbl-number{{$item['kdmenu']}}{{$item['kdoutlet']}}">Rp
                                {{number_format($item['harga'],0,'','.')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="harga{{$item['kdmenu']}}{{$item['kdoutlet']}}" value="{{$item['harga']}}">
            <input type="hidden" id="isapproval{{$item['kdmenu']}}{{$item['kdoutlet']}}">
            <input type="hidden" id="catatan{{$item['kdmenu']}}{{$item['kdoutlet']}}">
            <input type="hidden" id="nipreq{{$item['kdmenu']}}{{$item['kdoutlet']}}" value="{{$item['niprequest']}}">
        </a>
        @endforeach

        <form action="{{route('updatemenu')}}" method="post" id="formmenu">@csrf
        </form>
        <button class="btn btn-update shadow" type="button" id="btn-update" onclick="simpanmn()"><i
                class="fa fa-save"></i> Update</button>
        <button class="btn btn-hist shadow" type="button" id="btn-hist" onclick="hist()"><i
                class="fa fa-history"></i></button>
    </div>
</div>

@include('addmenu.modalfoto')
@include('addmenu.script')
@include('addmenu.confirm')
@include('addmenu.note')
@include('addmenu.hist')
@include('addmenu.tglhist')
@include('addmenu.modalfoto2')


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