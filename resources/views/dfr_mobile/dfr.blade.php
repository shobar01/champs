@extends('layouts.layout_presence')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content')
<link href="{{asset('public/resource/css/style_viewcogs.css')}}" rel="stylesheet" type="text/css">

<style>
    hr.rounded {
        border-top: 5px solid #FEBD01;
        border-radius: 5px;
    }

    .inptklmjml {
        font-size: 14px;
        color: black;
        /* font-weight: bold; */
        background: white !important;
    }

    .inptklmjmlbld {
        font-size: 14px;
        color: black;
        font-weight: bold;
        background: white !important;
        font-weight: bold;
    }

    #chart {
        max-width: 650px;
        margin: 35px auto;
    }

    #chart_pie {
        max-width: 650px;
        margin: 35px auto;
    }

      /* The Modal (background) */
      .modal {
        display: none;
        position: fixed;
        z-index: 1031;
        left: 0;
        top: 0;
        width: 100%;
        /* height: 100%; */
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
        overflow: scroll;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        /* margin: 5% auto 15% auto; */
        border: 1px solid #888;
        /* width: 95%; */
        /* top: 10%; */
    }

    label {
        display: inline-block;
        margin-bottom: 0.2rem !important;
    }
    .input-group-text { 
        padding: 0rem 0.75rem !important; 
    }
    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }
</style>

<script>
    window.Promise ||
      document.write(
        '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
      )
    window.Promise ||
      document.write(
        '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
      )
    window.Promise ||
      document.write(
        '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
      )
</script>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>


<script>
    // Replace Math.random() with a pseudo-random number generator to get reproducible results in e2e tests
  // Based on https://gist.github.com/blixt/f17b47c62508be59987b
  var _seed = 42;
  Math.random = function() {
    _seed = _seed * 16807 % 2147483647;
    return (_seed - 1) / 2147483646;
  };
</script>

<div class="container" style="padding-top: 70px; padding-right: 0px; padding-left: 0px;  overflow: scroll !importan;">
    <div class="card-deck mb-3 ">
        <div class="card  shadow-sm">
            <div class="card-header">
                <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>Daily Sales Report
                        ({{$json['nodfr']}})</b></a>
            </div>
            <div class="card-body" style="height:80vh; overflow:scroll !important;">
                <div class="col-md-12" style="padding : 0;">
                    <form action="{{ route('dfr_mobile') }}" method="GET" id="formotl" >
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; background:#cc1a0b; color:white; min-width: 80px;  font-weight: bold; ">Outlet
                                </span>
                            </div>

                            <input type="hidden" name="kdakses" id="kdakses" value="{{$kdakses}}">
                            <input type="hidden" name="nip" id="nip" value="{{$nip}}">
                            <input type="hidden" name="kdotl" id="kdotl" value="{{$kdotl}}">
                            <select class="form-control form-control-sm " name="toglekdotl" id="toglekdotl"
                                style=" font-weight: bold; color:black;" >
                                @foreach ($dfotl as $otl)
                                <option value="{{ $otl['kdoutlet'] }}" @if ($kdotl==$otl['kdoutlet'] ) selected @endif>
                                    {{$otl['sngktotl'] }} ({{ $otl['kdoutlet'] }})
                                </option>
                                @endforeach
                            </select>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"
                                        style="font-size: 14px; background:#cc1a0b; color:white; min-width: 80px;  font-weight: bold;">Tanggal</span>
                                </div>
                                <input type="date" name="tgl" id="tgl" value="{{$tgl}}" class="form-control date_now"
                                    style="font-size: 14px; color:black;  font-weight: bold;"  
                                    required>
                            </div>  
                        </div> 
                    </form>
                    <div class="card mb-2 mt-2 box-shadow  " style="background-color: rgba(0,0,0,.03);"> 
                        <div class="text-center px-1 pb-2 mt-2"> 
                            <button type="button" class="btn btn-lg btn-success"  
                                onclick="pilihkdotl()" style="font-size: 14px; color:white; width:80%; font-weight: 500; padding-left: 10px !important; ">
                                <i class="fa fa-search" style="margin-right: 5px;"></i> Cari
                            </button>  
                        </div>  
                    </div>
                    @if (isset($json['kdoutlet']))
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black; min-width: 150px;  font-weight: bold;">Target
                            </span>
                        </div>
                        <input class="form-control form-control-sm text-right inptklmjmlbld" type="text"
                            value="Rp.{{number_format( $json['target'], 0, '', '.') }}" readonly>
                    </div>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black;  min-width: 150px;">Accumulate
                                Sales
                            </span>
                        </div>
                        <input class="form-control form-control-sm text-right inptklmjml" type="text"
                            value="Rp.{{number_format( $json['akmjual'], 0, '', '.') }}" readonly>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black;  min-width: 150px;  font-weight: bold;">Subtotal
                                Sales
                            </span>
                        </div>
                        <input class="form-control form-control-sm text-right inptklmjmlbld" type="text"
                            value="Rp.{{number_format( $json['tjual'], 0, '', '.') }}" readonly>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black; min-width: 150px;">Total
                                Service
                            </span>
                        </div>
                        <input class="form-control form-control-sm text-right inptklmjml" type="text"
                            value="Rp.{{number_format( $json['tserv'], 0, '', '.') }}" readonly>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black;  min-width: 150px;">Total Pajak
                            </span>
                        </div>
                        <input class="form-control form-control-sm text-right inptklmjml" type="text"
                            value="Rp.{{number_format( $json['ttax'], 0, '', '.') }}" readonly>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black;  min-width: 150px;">Delivery
                                Charge
                            </span>
                        </div>
                        <input class="form-control form-control-sm text-right inptklmjml" type="text"
                            value="Rp.{{number_format( $json['tdlvcharge'], 0, '', '.') }}" readonly>
                    </div>
                    <div class="input-group mb-1">
                        {{-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black;  min-width: 150px;  font-weight: bold;">Total
                                Sales
                            </span>
                        </div> --}}
                        <button class="btn btn-sm btn-warning input-group-text" type="button" id="btn_tsales"
                            style="font-size: 14px; color:black;  min-width: 150px;  font-weight: bold; padding-left: 10px !important;"
                            onclick="detaildfr('A')">Total
                            Sales</button>
                        <input class="form-control form-control-sm text-right inptklmjmlbld" type="text"
                            value="Rp.{{number_format((int)$json['tjual']+(int)$json['ttax']+(int)$json['tserv']+(int)$json['tdlvcharge'], 0, '', '.') }}"
                            readonly>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black;  min-width: 150px;">Total Tunai
                            </span>
                        </div>
                        <input class="form-control form-control-sm text-right inptklmjml" type="text"
                            value="Rp.{{number_format( $json['ttunai'], 0, '', '.') }}" readonly>
                    </div>
                    <div class="input-group">
                        <button class="btn btn-sm btn-warning input-group-text" type="button" id="btn_tkartu"
                            style="font-size: 14px; color:black;  min-width: 150px;  font-weight: bold; border: 1px solid #ced4da; padding-left: 10px !important;"
                            onclick="detcard()">Non
                            Tunai<a style="font-size: 8px; padding-top: 3px; color: red;">&nbsp;*{{$json['jbkartu']}}
                                Terpakai</a></button>
                        <input class="form-control form-control-sm text-right inptklmjml" type="text"
                            value="Rp.{{number_format( $json['tkartu'], 0, '', '.') }}" readonly>
                    </div>
                    <div class="input-group">
                        <button class="btn btn-sm btn-warning input-group-text" type="button" id="btn_tvoucher"
                            style="font-size: 14px; color:black;  min-width: 150px;  font-weight: bold; border: 1px solid #ced4da; padding-left: 10px !important;"
                            onclick="detvoucher()">Voucher<a
                                style="font-size: 8px; padding-top: 3px; color: red;">&nbsp;*{{$json['jbvoucher']}}
                                Terpakai</a></button>
                        <input class="form-control form-control-sm text-right inptklmjml" type="text"
                            value="Rp.{{number_format( $json['tvoucher'], 0, '', '.') }}" readonly>
                    </div>
                    <div class="input-group">

                        <button class="btn btn-sm btn-warning input-group-text" type="button" id="btn_tdiskon"
                            style="font-size: 14px; color:black;  min-width: 150px;  font-weight: bold; border: 1px solid #ced4da; padding-left: 10px !important;"
                            onclick="detdiskon()">Diskon<a
                                style="font-size: 8px; padding-top: 3px; color: red;">&nbsp;*{{$json['jbdiskon']}}
                                Terpakai</a></button>
                        <input class="form-control form-control-sm text-right inptklmjml" type="text"
                            value="Rp.{{number_format( $json['tdiskon'], 0, '', '.') }}" readonly>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-sm btn-warning input-group-text" type="button"
                                style="font-size: 14px; color:black;  min-width: 150px;  font-weight: bold; border: 1px solid #ced4da; padding-left: 10px !important;"
                                onclick="detexpanse()">Total
                                Expense</button>
                        </div>
                        <input class="form-control form-control-sm text-right inptklmjml" type="text"
                            value="Rp.{{number_format($json['expense'], 0, '', '.') }}" readonly>
                    </div>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black;  min-width: 150px;">Total
                                Customer
                            </span>
                        </div>
                        <input class="form-control form-control-sm text-right inptklmjml" type="text"
                            value="{{number_format((int) $json['tcup'] + (int) $json['tcuw'], 0, '', '.') }} Customer"
                            readonly>
                    </div>
                    {{-- <div class="input-group">
                        <div class="input-group-prepend"> --}}

                            <div class="card flex-md-row mb-4 box-shadow h-md-250">

                                <div class="col-md-12" style="padding: 0px !important;">
                                    <div class="card-header text-center">
                                        <a class="my-0 font-weight-normal text-center" style="font-size: 14px;"><b>Tipe
                                                Jual</b></a>
                                    </div>
                                    @foreach ($hitung as $arryht)
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3"
                                                style="font-size: 14px; color:black;  min-width: 150px;"><b>{{$arryht['fmja']}}</b>
                                                <a style="font-size: 8px; padding-top: 3px; color: red;">&nbsp;*{{$arryht['fbanyak']}}
                                                    Transaksi</a>
                                            </span>
                                        </div>
                                        <input class="form-control form-control-sm text-right inptklmjml" type="text"
                                            value="Rp.{{number_format($arryht['fjual'], 0, '', '.') }}" readonly>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            {{--
                        </div>
                    </div> --}}
                    @else
                    <div class="text-center ">
                        <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}"
                            background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop
                            autoplay>
                        </lottie-player>
                        
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                    </div>
                    @endif

                </div>
                @if (isset($json['kdoutlet']))
                <div class="card mb-2 mt-2 box-shadow  " style="background-color: rgba(0,0,0,.03);"> 
                    <div class="text-center px-1 pb-2 mt-2"> 
                        <button type="button" class="btn btn-lg btn-success"  
                            onclick="detmenuterjual()" style="font-size: 14px; color:white; width:80%; font-weight: 500; padding-left: 10px !important; ">
                            <i class="fa fa-cutlery" style="margin-right: 5px;"></i> Menu Terjual
                        </button>  
                    </div>  
                </div> 
                @endif
                @if (isset($json['kdoutlet']))
                <div class="fw-container">

                    <div class="fw-body">
                        <div class="content">
                            <div id="app">
                                <div id="chart">
                                    <apexchart type="bar" height="380" :options="chartOptions" :series="series">
                                    </apexchart>
                                </div>
                            </div>
                            <div class="card flex-md-row mb-4 box-shadow h-md-250">

                                <div class="col-md-12" style="padding: 0px !important;">
                                    <div class="card-header text-center">
                                        <a class="my-0 font-weight-normal text-center"
                                            style="font-size: 14px;"><b>Persentase
                                                Sales</b></a>
                                    </div>
                                    <div id="app_pie">
                                        <div id="chart_pie">
                                            <apexchart type="pie" width="380" :options="chartOptions" :series="series">
                                            </apexchart>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>

    </div>
</div>

@if(isset($json['kdoutlet']))
@include('dfr_mobile.modal.detaildfr.card')
@include('dfr_mobile.modal.detaildfr.voucher')
@include('dfr_mobile.modal.detaildfr.diskon')
@include('dfr_mobile.modal.detaildfr.expanse')
@include('dfr_mobile.modal.detaildfr.menuterjual')
@include('dfr_mobile.modal.detaildfr.noorder')
@endif
 
<script src="{{asset('public/resource/js/lottie.js')}}"></script>
<script>
     
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });  
    function pilihkdotl(){ 
        
        loadingon();   
            var toglekdotl = $('#toglekdotl').val();
            $('#kdotl').val(toglekdotl); 
            $('#formotl').submit();   
        } 
</script>
<script>
    $(function(){
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate()+1;
        var year = dtToday.getFullYear();
        if(month < 10)
        month = '0' + month.toString();
        if(day < 10)
        day = '0' + day.toString();

        var minDate= year + '-' + month + '-' + day;

        $('.date_now').attr('max', minDate);

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+0; //January is 0 so need to add 1 to make it 1!
        var yyyy = today.getFullYear();
        if(dd<10){
        dd='0'+dd
        } 
        if(mm<10){
        mm='0'+mm
        }  
        today = yyyy+'-'+mm+'-'+dd;
        // document.getElementById("datefield").setAttribute("min", today);
        $('.date_now').attr('min', today);
        });
</script>

@if(isset($json['kdoutlet']))
<script>
    var options = {
      series: [{
      data: [@foreach ($json['jualkasir'] as $grpp)'{{ $grpp['jmlbill'] }}',@endforeach]
    }],
      chart: {
      type: 'bar',
      height: 380,
      toolbar: {
        show: false
    }                       
    },
    plotOptions: {
      bar: {
        barHeight: '100%',
        distributed: true,
        horizontal: true,
        dataLabels: {
          position: 'bottom'
        },
      }
    },
    colors: ['#cc1a0b', '#033E8C', '#FEBD01', '#F24405', '#A62103'
    ],
    dataLabels: {
      enabled: true,
      textAnchor: 'start',
      style: {
        colors: ['#fff']
      },
      formatter: function (val, opt) {
        return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
      },
      offsetX: 0,
      dropShadow: {
        enabled: true
      }
    },
    stroke: {
      width: 1,
      colors: ['#fff']
    },
    xaxis: {
      categories: [@foreach ($json['jualkasir'] as $grpp)'{{ $grpp['nama'] }}',@endforeach
      ],
    },
    yaxis: {
      labels: {
        show: false
      }
    },
    title: {
        text: 'Jumlah Transaksi {{ $json['tbill']}}',
        align: 'center',
        floating: true
    },
    subtitle: {
        text: '',
        align: 'center',
    },
    tooltip: {
      theme: 'dark',
      x: {
        show: false
      },
      y: {
        title: {
          formatter: function () {
            return ''
          }
        }
      }
    }, 
    legend: {
      show: false
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
<script>
    function detmenuterjual(){
        loadingon();
       
        $('#tablemmenu').empty();
        $('#tablemmod').empty();
        var tanggal = $('#tgl').val();
        var kdotll = $('#kdotl').val(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
            type: 'POST',
            url: '{{url("dfrmenuterjual")}}',
            data: {"_token": "{{ csrf_token() }}","tanggal":tanggal,"kdotl":kdotll},
            dataType: 'json',
            success:function(data){
                $('#loader').hide();
                var len = data.length;
                for (let i = 0; i < len; i++) {
                    var kdmenu = data[i]['kdmenu'];
                    var menu = data[i]['menu'];
                    var ismdf = data[i]['ismdf'];
                    var totalqty = data[i]['totalqty'];
                    var totalharga = data[i]['totalharga'];

                    if(ismdf == 'F'){
                        var rowmenu = '<li id="rm'+i+'" class="shadow p-2 mb-3 bg-white rounded" style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important;">'
                            +'<div class="ftsize12" >' 
                            +'<span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black;  padding:0px"><a style="font-size: 12px; color:black; "><b>'+menu.substring(0, 30) +' ('+kdmenu+')</b></a>'
                            +'</span>'  
                            +'</div>' 
                            +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                            +' <span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a style="font-size: 12px; color:black; "><b>Total Harga (Qty)</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black; min-width: 90px;"><b> : Rp.'+new Intl.NumberFormat('id-ID').format(totalharga)+' ('+totalqty+')</b></a>' 
                            +'</div>'
                            +'</li>';
                       
                        // var rowmenu = '<tr><td class="ftsize12l aaa" style="height: 35px !important;" width="35%" >'+menu+'</td><td class="ftsize12l">'+kdmenu+'</td><td class="ftsize12l"  >'+totalqty+'</td><td class="ftsize12r" >Rp.'+new Intl.NumberFormat('id-ID').format(totalharga)+'</td></tr>';
                        $('#tablemmenu').append(rowmenu);
                    }else{
                        var rowmod = '<li id="rmod'+i+'" class="shadow p-2 mb-3 bg-white rounded" style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important;">'
                            +'<div class="ftsize12" >' 
                            +'<span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black;  padding:0px"><a style="font-size: 12px; color:black; "><b>'+menu.substring(0, 30) +' ('+kdmenu+')</b></a>'
                            +'</span>'  
                            +'</div>' 
                            
                            +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                            +' <span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a style="font-size: 12px; color:black; "><b>Total Harga (Qty)</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black; min-width: 90px;"><b> : Rp.'+new Intl.NumberFormat('id-ID').format(totalharga)+' ('+totalqty+')</b></a>' 
                            +'</div>'
                            +'</li>';
                        // var rowmod = '<tr><td class="ftsize12l aaa" style="height: 20px !important;" width="30%">'+menu+'</td><td class="ftsize12l">'+kdmenu+'</td><td class="ftsize12">'+totalqty+'</td><td class="ftsize12r">Rp.'+new Intl.NumberFormat('id-ID').format(totalharga)+'</td></tr>';
                        $('#tablemmod').append(rowmod);
                    } 
                }
                
                dtmfdf=$('#table-mfdfterjual').DataTable({
                            "fixedHeader": true,
                            "bLengthChange": false, 
                            "paging":false, 
                            "info":true, 
                            "lengthMenu": [30],  
                            "dom":"lrtip" ,   
                            });  
                dtmfdf=$('#table-dfterjual').DataTable({
                            "fixedHeader": true,
                            "bLengthChange": false, 
                            "paging":false, 
                            "info":true, 
                            "lengthMenu": [30],  
                            "dom":"lrtip" ,   
                            });   
                document.getElementById('menuterjual').style.display='block';  
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
    function detcard(){
        loadingon();
        $('#detailkartu').empty();
         
        var tanggal = $('#tgl').val();
        var kdotll = $('#kdotl').val(); 
        var pw = $('#periodewaktu').val();
        var xx = pw.split(',');
        var wktawal = xx[0];
        var wktakhir = xx[1];
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
            type: 'POST',
            url: '{{url("dfrdet")}}',
            data: {"_token": "{{ csrf_token() }}","tipe":"B","tanggal":tanggal,"kdotl":kdotll,"wktawal":wktawal,"wktakhir":wktakhir},
            dataType: 'json',
            success:function(datas){
                // console.log(datas)
                $('#loader').hide();
                var data = datas['detailkartu'];
                var lencard = data.length;
                var banyakkartu = datas['banyakkartu'];
                if(banyakkartu > 0){
                    for (let i = 0; i < lencard; i++) {
                        var noorder = data[i]['noorder'];
                        var kdkartu = data[i]['kdkartu'];
                        var jumlah = data[i]['jumlah'];
                        var potongan = data[i]['potongan'];

                        // var rowCard = '<tr><td class="ftsize12l aaa" style="height: 20px !important;" width="25%" >'+noorder+'</td><td class="ftsize12l">'+kdkartu+'</td><td class="ftsize12l">Rp.'+new Intl.NumberFormat('id-ID').format(jumlah)+'</td><td class="ftsize12l">'+potongan+'</td></tr>';
                        // $('#detailkartu').append(rowCard);
                        // var rowCard ='<li class="shadow p-1 mb-2 bg-white rounded" >'
                        //     +'<p><a style="font-size: 12px; color:black; min-width: 90px !important;">No Order (Kartu)</a> '
                        //     +'<a style="font-size: 12px; color:black; min-width: 90px;"> : '+noorder+' ('+kdkartu+')</a></p>'
                        //     +'<a style="font-size: 12px; color:black; min-width: 90px;">Nominal(-%)</a> '
                        //     +'<a style="font-size: 12px; color:black; min-width: 90px;"> : '+new Intl.NumberFormat('id-ID').format(jumlah)+' (Rp.'+potongan+')</a>'
                        //     +'</li>'; 
                        var rowCard = '<li class="shadow p-2 mb-3 bg-white rounded" style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important;">'
                            +'<div class="input-group" id="aa'+i+'">'
                            +'<div class="input-group-prepend">'
                            +'<span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a style="font-size: 12px; color:black; "><b>No Order (Kartu)</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black; min-width: 90px;"><b> : '+noorder+' ('+kdkartu+')</b></a>'
                            +'</div>'
                            +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                            +' <span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a style="font-size: 12px; color:black; "><b>Nominal(-%)</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black; min-width: 90px;"><b> : Rp.'+new Intl.NumberFormat('id-ID').format(jumlah)+' (Rp.'+potongan+')</b></a>' 
                            +'</div>'
                            +'</li>';
                        // var rowCard =  '<div class="shadow p-1 mb-2 bg-white rounded">'
                        // +'<div class="table-responsive" style="overflow-y: hidden;">'
                        //     +'<table class="">'
                        //         +'<tbody>'
                        //             +'<trc>'
                        //                 +'<td style="font-size: 12px; color:black; min-width: 90px;"> No Order (Kartu)'
                        //                     +'</td>'
                        //                     +'<td style="font-size: 12px; font-weight: bold;">: '+noorder+' ('+kdkartu+')</td>'
                        //                     +'</trc>'
                        //                     +'<tr style=" height: 15px !important;" class="padding:0px">'
                        //                         +'<td style="font-size: 12px; color:black; min-width: 90px; ">Nominal(-%)'
                        //                     +'</td>'
                        //                     +'<td style="font-size: 12px;">: '+new Intl.NumberFormat('id-ID').format(jumlah)+'(Rp.'+potongan+')</td>'
                        //                     +'</tr>'
                        //                     +'</tbody>'
                        //                     +'</table>'
                        //                     +'</div>'
                        //                     +'</div>';
                                            
                        $('#table-card').append(rowCard);
                    }

                    dtcard=$('#table-card').DataTable({
                            "fixedHeader": true,
                            "bLengthChange": false, 
                            "paging":false, 
                            "info":true, 
                            "lengthMenu": [30],  
                            "dom":"lrtip" ,   
                            }); 
                    $('#search_tcard').keyup(function(){  
                        dtcard.search($(this).val()).draw();    
                    }) ;
                    
      document.getElementById('detailcard').style.display='block';  
                }else{
                    $('#table-card').html('<div class="text-center ">'+
                            '<lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>'+
                            '</lottie-player>'+
                            '<h5 class="text-center">Belum Ada Kartu yang Terpakai</h5>'+
                            '</div> ');  
                }
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
    function detvoucher(){
        loadingon();
        $('#detailisivoucher').empty(); 
        var tanggal = $('#tgl').val();
        var kdotll = $('#kdotl').val(); 
        var pw = $('#periodewaktu').val();
        var xx = pw.split(',');
        var wktawal = xx[0];
        var wktakhir = xx[1];
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
            type: 'POST',
            url: '{{url("dfrdet")}}',
            data: {"_token": "{{ csrf_token() }}","tipe":"E","tanggal":tanggal,"kdotl":kdotll,"wktawal":wktawal,"wktakhir":wktakhir},
            dataType: 'json',
            success:function(datas){
                // console.log(datas);
                $('#loader').hide();
                var data = datas['pakaivoucher'];
                var lenvoucher = data.length;
                if(lenvoucher > 0){
                    for (let i = 0; i < lenvoucher; i++) {
                        var kdvoucher = data[i]['kdvoucher'];
                        var jumlah = data[i]['jumlah'];

                        var rowvoucher = '<tr><td>'+kdvoucher+'</td><td class="text-right">'+new Intl.NumberFormat('id-ID').format(jumlah)+'</td></tr>';
                        $('#detailisivoucher').append(rowvoucher);
                    }
                }else{
                    $('#kosongvoucher').html('<div class="text-center ">'+
                            '<lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>'+
                            '</lottie-player>'+
                            '<h5 class="text-center">Belum Ada Voucher yang Terpakai</h5>'+
                            '</div> '); 
                } 
                document.getElementById('detaildfr').style.display='block'; 
            },
            error: function () {
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Server Kita Bermasalah nih!",
                    allowOutsideClick: false 
                });
            }
        });
    }
    function detdiskon(){
        loadingon();
        $('#detailisidiskon').empty(); 
        var tanggal = $('#tgl').val();
        var kdotll = $('#kdotl').val(); 
        
        var pw = $('#periodewaktu').val();
        var xx = pw.split(',');
        var wktawal = xx[0];
        var wktakhir = xx[1];
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
            type: 'POST',
            url: '{{url("dfrdet")}}',
            data: {"_token": "{{ csrf_token() }}","tipe":"C","tanggal":tanggal,"kdotl":kdotll,"wktawal":wktawal,"wktakhir":wktakhir},
            dataType: 'json',
            success:function(datas){
                // console.log(datas);
                $('#loader').hide();
                var data = datas['detaildiskon'];
                var lendiskon = data.length;
                var banyakdiskon = datas['banyakdiskon'];
                if(banyakdiskon > 0){
                    for (let i = 0; i < lendiskon; i++) {
                        var noorder = data[i]['noorder'];
                        var kddiskon = data[i]['kddiskon'];
                        var jumlah = data[i]['jumlah'];

                        var rowdiskon = '<tr><td>'+noorder+'</td><td>'+kddiskon+'</td><td class="text-right">'+new Intl.NumberFormat('id-ID').format(jumlah)+'</td></tr>';
                        $('#detailisidiskon').append(rowdiskon);
                    }
                }else{
                    
                    $('#kosongdiskon').html('<div class="text-center ">'+
                            '<lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>'+
                            '</lottie-player>'+
                            '<h5 class="text-center">Belum Ada Diskon yang Terpakai</h5>'+
                            '</div> ');  
                }
                
            document.getElementById('detaildiskon').style.display='block';  
            },
            error: function () {
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Server Kita Bermasalah nih!",
                    allowOutsideClick: false 
                });
            }
        });
    }
    function detexpanse(){
        loadingon();
        $('#detailisiexpense').empty();
        $('#dropbeli').empty(); 
        var tanggal = $('#tgl').val();
        var kdotll = $('#kdotl').val(); 
        var pw = $('#periodewaktu').val();
        var xx = pw.split(',');
        var wktawal = xx[0];
        var wktakhir = xx[1];
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
            type: 'POST',
            url: '{{url("dfrdet")}}',
            data: {"_token": "{{ csrf_token() }}","tipe":"D","tanggal":tanggal,"kdotl":kdotll,"wktawal":wktawal,"wktakhir":wktakhir},
            dataType: 'json',
            success:function(datas){
                // console.log(datas);
                $('#loader').hide();
                var data = datas['detailexpense'];
                var lenexpense = data.length;
                var banyakexpense = datas['banyakexpense'];
                if(banyakexpense > 0){
                    for (let i = 0; i < lenexpense; i++) {
                        var idbeli = data[i]['idbeli'];
                        var jenis = data[i]['jenis'];
                        var qtybeli = data[i]['qtybeli'];
                        var harga = data[i]['harga'];
                        var barket = data[i]['barket'];
                        // var str = "hello world";
                                // barket = barket.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                //     return letter.toUpperCase();
                                // });
                                jenis = jenis.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                                    return letter.toUpperCase();
                                });
                        var rowexpense = '<li class="shadow p-2 mb-3 bg-white rounded" style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important;">'
                            +'<div class="input-group" id="aa'+i+'">'
                            +'<div class="input-group-prepend">'
                            +'<span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; "><b>No Beli</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black; "><b> : '+idbeli+'</b></a>'
                            +'</div>'
                            +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                            +' <span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; "><b>Jenis</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black; "><b> : '+jenis+'</b></a>' 
                            +'</div>'
                            
                            +'<div class="input-group" id="aa'+i+'">'
                            +'<div class="input-group-prepend">'
                            +'<span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; "><b>Harga (Qty)</b></b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black;"><b> : Rp.'+new Intl.NumberFormat('id-ID').format(harga)+' ('+qtybeli+')</b></a>'
                            +'</div>'
                            +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                            +' <span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; "><b>Barang/Ket.</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black; "><b> : '+barket +'</b></a>' 
                            +'</div>'
                            +'</li>'; 
                        // var rowexpense = '<tr><td class="ftsize12l aaa" style="height: 20px !important;" width="20%" >'+idbeli+'</td><td class="ftsize12l">'+jenis+'</td><td class="ftsize12l">'+qtybeli+'</td><td class="ftsize12l">'+new Intl.NumberFormat('id-ID').format(harga)+'</td><td class="ftsize12l">'+barket+'</td></tr>';
                        $('#detailisiexpense').append(rowexpense); 
                    } 
                }else{
                    $('#detailisiexpense').html('<div class="text-center ">'+
                            '<lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>'+
                            '</lottie-player>'+
                            '<h5 class="text-center">Belum Ada Expense</h5>'+
                            '</div> ');
                     
                }
                
        document.getElementById('detailexpanse').style.display='block';  
            },
            error: function () {
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Server Kita Bermasalah nih!",
                    allowOutsideClick: false 
                });
            }
        });
    }
</script>
<script>
    function detaildfr(tipe){
        $('#nav-tab').empty(); 
        $('#nav-tabContent').empty();
        
        pilihdfr(tipe);
    }
    
    function pilihdfr(tipe){
        // alert(tipe);
        loadingon();
        $('#nav-tab').empty(); 
        $('#nav-tabContent').empty();
        var pw = $('#periodewaktu').val();
        var xx = pw.split(',');
        var wktawal = xx[0];
        var wktakhir = xx[1];
        var tanggal = $('#tgl').val();
        var kdotll = $('#kdotl').val(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
            type: 'POST',
            url: '{{url("dfrdet")}}',
            data: {"_token": "{{ csrf_token() }}","tipe":tipe,"tanggal":tanggal,"kdotl":kdotll,"wktawal":wktawal,"wktakhir":wktakhir},
            dataType: 'json',
            success:function(datas){    
                var data = datas['daftarjual'];
                
                $('#loader').hide();
                // $('#nav'+data[0]['noorder']).click();
                var len = data.length;
                
                if(len > 0){
                for (let i = 0; i < len; i++) {
                var noorder = data[i]['noorder'];
                var tglposting = data[i]['tglposting'];
                var jmcu = data[i]['jmcu'];
                var jmtotal = data[i]['jmtotal'];
                var byrkartu = data[i]['byrkartu'];
                var byrvoucher = data[i]['byrvoucher'];
                var byrdiskon = data[i]['byrdiskon'];
                var byrtunai = data[i]['byrtunai'];
                var nipkasir = data[i]['nipkasir'];
                var nomeja = data[i]['nomeja'];
                var jualdet = data[i]['jualdet'];
                var carddet  = data[i]['carddet'];
                var lencard = carddet.length; 

                // console.log(byrkartu); 
                            if (byrkartu == '0'){
                                var tt = 'Tunai';
                                var tc = byrtunai;
                            } else{ 
                                
                            for (let w = 0; w < lencard; w++) {
                                var kdkartubyr = carddet[w]['kdkartu'];
                                var jumlahbyr = carddet[w]['jumlah'];
                                var potonganbyr = carddet[w]['potongan']; 
                                var tt = 'Card'; 
                                var tc = new Intl.NumberFormat('id-ID').format(jumlahbyr)+' ('+kdkartubyr+')'; 
                                // var tc = byrkartu+' ('+kdkartu+')'; 
                            } 
                        }    
               
                var rowjual = '<li id="ii'+noorder+'" class="shadow p-2 mb-3 bg-white rounded " style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important;" data-toggle="collapse" >'
                    +'<div>'
                            +'<div class="ftsize12 card-header"  data-toggle="collapse"  data-target="#detjualclps'+noorder+'" aria-expanded="false" >' 
                            +'<span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black;  padding:0px"><a style="font-size: 12px; color:black; "><b>'+noorder+' ('+nomeja+')</b></a>'
                            +'</span>'  
                            +'</div>'

                            +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                            +'<span class="text-left" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; "><b>Kasir</b></b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black;"><b> : '+nipkasir+'</b></a>'
                            +'</div>'
                            +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                            +' <span class="text-left" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; "><b>Tanggal</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black; "><b> : '+tglposting+'</b></a>' 
                            +'</div>' 

                            +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                            +'<span class="text-left" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; "><b>Total</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black;"><b> :  Rp.'+new Intl.NumberFormat('id-ID').format(jmtotal)+'</b></a>'
                            +'</div>'
                            +'</div>'
                            +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                            +'<span class="text-left" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; "><b>'+tt+'</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black;"><b> :  Rp.'+tc+'</b></a>'
                            +'</div>'  
                            +'<table id="detjualclps'+noorder+'" class="collapse shadow p-2 mb-3 bg-white rounded table-striped" data-parent="#accordion" style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important; " width="100%" >' 
                            +'</table>'
                            +'</li>'; 
                // var rowjual ='<table width="100%" class="shadow p-3 mb-2 bg-white rounded"><thead>'
                //     +'<th class="ftsize12" style="height: 20px ;" colspan="2" >'+noorder+' ('+nomeja+')</th>'
                //     +'</thead><tbody><tr>'
                //         +'<td class="ftsize12l " style="height: 20px ; font-size:8px !important;">'+tglposting+'</td>'
                //         +'<td class="ftsize12r " style="height: 20px ;"> Rp.'+new Intl.NumberFormat('id-ID').format(jmtotal)+'</td>'
                //         +'</tr></tbody></table>';
                $('#nav-tab').append(rowjual);  
                if(jualdet.length > 0){
                        var lenj = jualdet.length;
                        for (let j = 0; j < lenj; j++) {
                            var nmmenu = jualdet[j]['nmmenu'];
                            var qtyjual = jualdet[j]['qtyjual'];
                            var harga = parseFloat(jualdet[j]['harga']);
                            var tipejual =jualdet[j]['tipejual'];
                            var total = harga*qtyjual;
                            
                            // var tul = '<ul id="mody'+j+'" class="shadow p-2 mb-3 bg-white rounded" style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important; "></ul>';
                            
                            var rowdetj = '<tr id="rd'+j+'" style="height:20px"><td class="ftsize12l" width="70%">'+nmmenu+'</td><td class="ftsize12r" width="5%"> x'+qtyjual+'</td> <td class="ftsize12r" width="25%">'+new Intl.NumberFormat('id-ID').format(total)+'</td> </tr>';

                            // var rowdetj = '<li id="rm'+i+'" >'
                            // +'<div class="ftsize12" >' 
                            // +'<span class="" id="basic-addon3"'
                            // +'style="font-size: 10px; color:black;  padding:0px"><a style="font-size: 12px; color:black; "><b>'+nmmenu+'</b></a>'
                            // +'</span>'  
                            // +'</div>' 
                            // +'<div class="input-group">'
                            // +'<div class="input-group-prepend">'
                            // +' <span class="text-left" id="basic-addon3"'
                            // +'style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a style="font-size: 12px; color:black; "><b>Total (Qty) </b></a>'
                            // +'</span>' 
                            // +'</div>' 
                            // +'<a style="font-size: 12px; color:black; min-width: 90px;"><b> : Rp.'+new Intl.NumberFormat('id-ID').format(total)+' ('+qtyjual+')</b></a>' 
                            // +'</div>'
                            // +'</li>';
                            $('#detjualclps'+noorder).append(rowdetj);

                            var modifier = jualdet[j]['modifier'];
                            if(modifier.length > 0){
                                for (let x = 0; x < modifier.length; x++) {
                                    var nmmod = modifier[x]['nmmenu'];
                                    var harga = parseFloat(modifier[x]['harga']);
                                    var mods = '<tr><td class="ftsize12l"> &nbsp; &nbsp;+ '+nmmod+'</td><td></td><td class="ftsize12r">'+new Intl.NumberFormat('id-ID').format(harga)+'</td></tr>';
                                    $('#detjualclps'+noorder).append(mods);
                                }
                            }
                        }
                    }
                
                // var rowtab ='<div class="tab-pane fade" id="'+noorder+'" role="tabpanel" aria-labelledby="nav'+noorder+'"> <div class="card" style="border-radius:12px;height:426px;"> <div class="card-header" style="border-radius:12px;font-weight:bold"> Detail Transaksi '+noorder+' / '+nomeja+' / '+jmcu+' Orang <span class="float-right"><a href="#" onclick="printb(\''+noorder+','+tglposting+'\')"><i class="fa fa-print text-white"></i></a></span></div> <div class="card-body" style="border-radius:12px;height:372px;overflow-y:hidden"><div class="card" style="border-radius:12px;"> <div class="card-body" style="border-radius:12px;"> <div class="scroll-2" style="height:215px;overflow-y:scroll;overflow-x:hidden; "> 
                    //<table class="table" width="100%" style=""> <thead> <tr class="text-center"> <th scope="col">MENU</th> <th scope="col">QTY</th> <th scope="col">HARGA</th> <th scope="col">TOTAL</th> <th scope="col">T</th> </tr> </thead> <tbody id="detjuu'+noorder+'"></tbody></table>
                    //</div><div style="height:5px;"></div><div class="card" id="hi-right" style="height:110px;"><div class="card-body"><div class="form-group text-white"><div class="table-responsive"><table class="table table-borderless" width="100%"><tr><td><label class="text-white" for="tot_penjualan">KASIR</label></td><td><input class="form-control black text-center" readonly style="font-weight:bold;padding-bottom:3px;padding-top:3px;" value="'+nipkasir+'"></td><td><label class="text-white" for="tot_penjualan">CARD</label></td><td><input class="form-control black text-center" readonly style="font-weight:bold;padding-bottom:3px;padding-top:3px;" value="'+byrkartu+'"'+(lencard>0?'onclick="klikcardt(\''+noorder+'\')"':'')+'></td></tr><tr><td><label class="text-white" for="tot_penjualan">TOTAL</label></td><td><input class="form-control black text-center" name="tot_penjualan" id="totalbayar" readonly style="font-weight:bold;padding-bottom:3px;padding-top:3px;" value="'+new Intl.NumberFormat('id-ID').format(jmtotal)+'"></td><td><label class="text-white" for="tot_penjualan">VOUCHER</label></td><td><input class="form-control black text-center" readonly style="font-weight:bold;padding-bottom:3px;padding-top:3px;" value="'+byrvoucher+'"></td></tr><tr><td><label class="text-white" for="tot_penjualan">TUNAI</label></td><td><input class="form-control black text-center" readonly style="font-weight:bold;padding-bottom:3px;padding-top:3px;" value="'+new Intl.NumberFormat('id-ID').format(byrtunai)+'"></td><td><label class="text-white" for="tot_penjualan">DISCOUNT</label></td><td><input class="form-control black text-center" readonly style="font-weight:bold;padding-bottom:3px;padding-top:3px;" value="'+byrdiskon+'"></td></tr></table></div></div></div></div></div></div></div></div></div>'; 
            }
            
        
        document.getElementById('detailnoorder').style.display='block';   
        }else{
                    $('#nav-tab').html('<div class="text-center ">'+
                            '<lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>'+
                            '</lottie-player>'+
                            '<h5 class="text-center">Belum Ada Transaksi Pukul '+wktawal.substring(0,5) +' - '+wktakhir.substring(0,5) +'</h5>'+
                            '</div> ');  
                }
            },
            error: function () {
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Server Kita Bermasalah nih!",
                    allowOutsideClick: false 
                });
            }
        });
    }
</script>
<script>
    var options = {
          series: [{{$json['pssales']}}, {{$krgpssales}}], 
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Sales', 'Target' ], 
    colors: ['#cc1a0b',  '#FEBD01'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 320
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart_pie"), options);
        chart.render();
</script>
@endif
@endsection