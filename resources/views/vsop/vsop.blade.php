@extends('layouts.layout')
@section('title', 'PT.Champ Resto Indonesia')
@section('content')

{{-- <iframe src="{{ asset('/laraview/#../pdf/test.pdf') }}" width="1000px" height="600px"></iframe> --}}
{{-- <iframe
    src="https://docs.google.com/gview?url=http://api.champ-group.com/champs-mobile/public/storage/soppdf/IP. COOK PDF/SOP IP. PEMASAKAN BEEF TERIYAKI & CHICKEN TERIYAKI.pdf&embedded=true"
    width="1000px" height="600px" frameborder="0"></iframe> --}}

{{-- <iframe
    src="https://docs.google.com/gview?url=http://api.champ-group.com/champs-mobile/public/storage/soppdf/OTHER/HOLDING%20TIME%20GOKANA%20UPDATE%202019.pdf&embedded=true"
    style="width:600px; height:500px;" frameborder="0"></iframe> --}}
{{--<embed src="{{str_replace('storage','public/storage',asset('storage'))}}{{$datta[0]}}" type="application/pdf"
    width="100%" height="600px">
</embed>--}}
<div class="container" style="padding: 70px 0 0 0;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal" style="font-size: 14px;"><b>View SOP PDF</b></h4>
                {{-- <a href="{{str_replace('storage','public/storage',asset('storage'))}}{{$datta[0]}}"
                    target="_self">{{str_replace('storage','public/storage',asset('storage'))}}{{$datta[0]}}</a> --}}
            </div>
            <div class="card-body" style="padding: 0px 5px 0px 5px;">
                {{-- <div class="row"> --}}
                    <div class="fw-container" style="margin-top: 1%;">
                        <div class="fw-body">
                            <div class="content">
                                <iframe
                                    src="https://docs.google.com/gview?url=http://api.champ-group.com/champs-mobile/storage/app/public/soppdf/OTHER/HOLDING%20TIME%20GOKANA%20UPDATE%202019.pdf&embedded=true"
                                    width="1000px" height="600px" frameborder="0"></iframe>
                                <div class="input-group mb-3">
                                    <input id="search_vsop" onkeyup="SrchVsop()" type="text" class="form-control"
                                        placeholder="Searching" aria-label="Search" aria-describedby="basic-addon2">
                                    {{-- <input id="search_vsop" type="text" class="form-control"
                                        placeholder="Searching" aria-label="Search" aria-describedby="basic-addon2">
                                    --}}
                                </div>

                                <ul id="table-vsop"
                                    style="overflow-x: hidden; height: 450px; list-style-type: none; padding: 5px;">
                                    @foreach ($datta as $df)
                                    <a href="{{str_replace('storage','public/storage',asset('storage'))}}{{$df}}"
                                        target="_blank">
                                        <li class="shadow p-2 mb-3 bg-white rounded"
                                            style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important;">
                                            <div class="input-group" id="aa'+i+'">
                                                <div class="input-group-prepend">
                                                    <i class="fa fa-file-pdf-o" title="Download PDF"
                                                        style="color: red; padding-right: 5px"> </i>
                                                    <span style="color: black;">
                                                        {{str_replace('/soppdf/','',str_replace('.pdf','',$df))}}</span>


                                                    {{-- <span class="" id="basic-addon3"
                                                        style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a
                                                            style="font-size: 12px; color:black; ">
                                                            <a href="{{str_replace('storage','public/storage',asset('storage'))}}{{$df}}"
                                                                target="_blank"><b>{{str_replace('/soppdf/','',str_replace('.pdf','',$df))}}</b></a>

                                                        </a>
                                                    </span> --}}
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                    @endforeach
                                </ul>
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
    </script>
    <script>
        function SrchVsop() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("search_vsop");
        filter = input.value.toUpperCase();
        ul = document.getElementById("table-vsop");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("div")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
    </script>
    @endsection