@extends('layouts.layout_presence')
@section('title', 'PT.Champ Resto Indonesia')
@section('content')

<style>
    .card-body2 {
        -ms-flex: 1 1 auto !important;
        flex: 1 1 auto !important;
        min-height: 1px !important;
        padding: 0px 6px 5px !important;
    }

    hr {
        margin-top: 0.1rem;
        margin-bottom: 0.1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    .card2 {
        /* border: none; */
        border-radius: 5px !important;
    }

    .span-act {
        position: absolute;
        right: 15px;
        /* padding-top: 5px; */
        /* width: 67px; */
    }

    .fa {
        color: #28a745 !important;
        /* background: rgba(255, 0, 0, 0.21); */
    }

    .fa-bookmark {
        position: absolute;
        top: 0;
        color: red;
        font-size: 22px;
    }

    .form-control {
        height: calc(0.8em + 0.75rem + 2px) !important;
        padding: 0rem 0.75rem;
        font-size: 12px !important;
    }

    .btn-group-sm>.btn,
    .btn-sm {
        padding: 0rem 0.5rem;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 0.2rem;
    }
</style>

<div class="container" style="padding-top: 70px;">
    <div class=" mb-3 ">
        <div class="card mb-2 shadow-sm">
            <div class="card-header">
                <div class="row ">

                    <div class="col" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal" style="font-size: 12px;"><b>Presence</b></a>
                    </div>

                    {{-- <div class="col text-right"
                        style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal " style="font-size: 12px;"><b>{{$tanggalll}}</b></a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">

                <form id="send_periode" class="" action="{{route('presence_periode')}}" method="POST" class="d-none">
                    @csrf

                    <input type="hidden" class="" name="perid_bln" id="perid_bln" />
                    <input type="hidden" class="" name="perid_thn" id="perid_thn" />
                    <div class="row">
                        <div class="col-5 " style="padding-right : 0px; !important">
                            <select class="form-control form-control-sm " id="bln_select">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-3" style="padding-right : 0px; !important">
                            <select class="form-control form-control-sm " id="thn_select">
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                        <div class="col-4 justify-content-end d-flex">
                            <button class="btn btn-success btn-sm btn-block" type="submit"
                                onclick="periode()">Periode</button>
                        </div>
                    </div>
                </form>
                {{-- Tabel content --}}
                <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">
                            <div class="input-group mb-2">
                                <input id="search_absen" onkeyup="SearchHistabsn()" type="text" class="form-control"
                                    placeholder="Searching" aria-label="Search" aria-describedby="basic-addon2">
                            </div>


                            <ul style="overflow-x: hidden; height: 70vh; list-style-type: none; padding: 0px;"
                                id="ul_dfhistabsen">

                                @if($absensi == [])
                                <div class="text-center ">
                                    <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}"
                                        background="transparent" speed="1"
                                        style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                                    </lottie-player>

                                    <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                                </div>
                                @else
                                <?php $no2 = 1; ?>
                                @foreach ($absensi as $arryabsensi)
                                {{-- @for ($i = 0; $i < 5; $i++) --}} <li>
                                    <div class="card shadow-sm  mb-2"
                                        style=" @if (Str::length($arryabsensi['hdr']) == 5 ) background: rgba(255, 0, 0, 0.21) !important; @endif border-radius: 13px !important;">
                                        <div class="card-body2">
                                            <div class="row ">
                                                <div class="col ">
                                                    <a
                                                        style=" position: absolute; top: 0; font-size: 10px; text-align: center; width: 15px; z-index: 1; color:white;">
                                                        {{$no2}} </a>
                                                    <i class="fa fa-bookmark  "
                                                        style=" @if (Str::length($arryabsensi['hdr']) == 5 ) color : #cc1a0b !important; @endif"></i><span
                                                        style="margin-left:18px;"> </span>
                                                    <span>{{$arryabsensi['otl']}} </span>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col ml-3">
                                                    <hr>
                                                    <i class="fa fa-clock-o mr-1"
                                                        style=" @if (Str::length($arryabsensi['hdr']) == 5 ) color : #cc1a0b !important; @endif"></i><span>
                                                        Hadir : </span> <span id="nmmenu20147MSJ00"
                                                        style="right: 80px;">{{$arryabsensi['hdr']}}</span>

                                                    <span class="span-act">
                                                        <span>Istirahat : </span> <span
                                                            style=" @if ($arryabsensi['istrht'] == 'Tidak absen' ) color : #cc1a0b !important; @endif">{{$arryabsensi['istrht']}}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col ml-3">
                                                    <i class="fa fa-calendar mr-1"
                                                        style=" @if (Str::length($arryabsensi['hdr']) == 5 ) color : #cc1a0b !important; @endif"></i>
                                                    <span class="fw ">{{$arryabsensi['tgl']}}</span>
                                                    <span class="span-act">
                                                        <i class="fa fa-line-chart mr-1"
                                                            style=" @if (Str::length($arryabsensi['hdr']) == 5 ) color : #cc1a0b !important; @endif"></i>
                                                        <span id="nmmenu20147MSJ00">{{$arryabsensi['dur1']}}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endfor --}}
                                    </li>
                                    <?php $no2++; ?>
                                    @endforeach
                                    @endif
                            </ul>
                            {{-- <div class=" " style="overflow-x: hidden; height: 450px; "> --}}
                                {{-- <table id="tb_presence" class="display nowrap   ">
                                    <thead>
                                        <tr>
                                            <th style="border-top: 1px solid #111 !important;">No.</th>
                                            <th style="border-top: 1px solid #111 !important;">Tanggal</th>
                                            <th style="border-top: 1px solid #111 !important;">Hadir</th>
                                            <th style="border-top: 1px solid #111 !important;">Istirahat</th>
                                            <th style="border-top: 1px solid #111 !important;">Lokasi</th>
                                            <th style="border-top: 1px solid #111 !important;">Durasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no2 = 1; ?>
                                        @foreach ($absensi as $arryabsensi)
                                        <tr>
                                            <td>
                                                <?php echo $no2; ?>
                                            </td>
                                            <td>{{$arryabsensi['tgl']}}</td>
                                            <td>{{$arryabsensi['hdr']}} </td>
                                            <td>{{$arryabsensi['istrht']}} </td>
                                            <td>{{$arryabsensi['otl']}} </td>
                                            <td>{{$arryabsensi['dur1']}} </td>
                                        </tr>
                                        <?php $no2++; ?>
                                        @endforeach
                                    <tfoot>
                                        <tr>
                                            <th style="border-bottom: 1px solid #111 !important;">No.</th>
                                            <th style="border-bottom: 1px solid #111 !important;">Tanggal</th>
                                            <th style="border-bottom: 1px solid #111 !important;">Hadir</th>
                                            <th style="border-bottom: 1px solid #111 !important;">Istirahat</th>
                                            <th style="border-bottom: 1px solid #111 !important;">Lokasi</th>
                                            <th style="border-bottom: 1px solid #111 !important;">Durasi</th>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                </table> --}}
                                {{-- </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- custom -->
{{-- <footer @if ($no2 < 9) class="footer fixed-bottom " @else class="footer" @endif> --}}


    <script>
        $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
    });
    $("#bln_select option[value='{{session('blncm')}}']").attr("selected", "selected"); 
    $("#thn_select option[value='{{session('thncm')}}']").attr("selected", "selected");
    // $("div.bln_select select").val("09").change();
    function showmodal_done() {
    $('#modal_baking').modal('show');
    }
    function periode(){
    var sValbln = $("#bln_select option:selected").val(); 
    var sValthn = $("#thn_select option:selected").val();
    var sValues = sValbln +"#"+sValthn;  
    $('#loader').show();   
    
        $('#perid_bln').val(sValbln);
        $('#perid_thn').val(sValthn);
    }
    </script>
    <script type="text/javascript">
        // dPrsne=$('#tb_presence').DataTable({
        // "bLengthChange": false, 
        // "paging":false, 
        // "info":false, 
        // "lengthMenu": [30], 
        // "columnDefs": [
        // {"className": "dt-center", "targets": "_all"}  
        // ],
        // "dom":"lrtip" ,  
        // responsive: true
        // });
        // $('#search_absen').keyup(function(){  
        // dPrsne.search($(this).val()).draw();    
        // }) ;

        function SearchHistabsn() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("search_absen");
        filter = input.value.toUpperCase();
        ul = document.getElementById("ul_dfhistabsen");
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