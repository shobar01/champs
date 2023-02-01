<style>
    .accordion .card-header::before {
        font-family: 'FontAwesome';
        content: "\f13a";
        float: right;
        display: flex;
        align-items: center;
        padding-right: 10px;
    }

    /* .accordion .card-header.collapsed::before {
        content: "\f139";
    } */
</style>
<div class="modal " id="detailnoorder">
    <div class=" modal-xl w3-animate-bottom fixed-bottom m-0" role="document">
        <div class="modal-content color-card">
            <div class="modal-header pb-0">
                <h5 style="font-weight:bold; padding:0;">DAFTAR TRANSAKSI</h5>
                
                <button type="button" class="close"  onclick="document.getElementById('detailnoorder').style.display='none';"> 
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="card" style="height:450x;">
                            <div class="card-header" style="border-radius:12px;font-weight:bold">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"
                                            style="font-size: 14px; background:#cc1a0b; color:white; min-width: 80px;  font-weight: bold;">Pukul</span>
                                    </div>
                                    <select id="periodewaktu" class="form-control text-center"
                                        style="font-weight: bold;background:white; height: 35px !important;"
                                        onchange="pilihdfr('A')">
                                        @foreach ($json['bagiwaktu'] as $bagiwaktu)
                                        <option value="{{$bagiwaktu['wktawal']}},{{$bagiwaktu['wktakhir']}}">
                                            {{$bagiwaktu['wktawal']}} - {{$bagiwaktu['wktakhir']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            {{-- <div class="card-body" style="border-radius:12px;height:450px;overflow-y:scroll"> --}}

                                <div id="accordion" class="accordion md-accordion" role="tablist"
                                    aria-multiselectable="true">
                                    <ul id="nav-tab"
                                        style="overflow-x: hidden; height: 450px; list-style-type: none; padding: 5px;">
                                    </ul>
                                </div>

                                {{-- <div id="nav-tab">
                                    @foreach($json['daftarjual'] as $noorderx)
                                    <a class="col-md-12" id="nav{{$noorderx}}" data-toggle="tab" href="#{{$noorderx}}"
                                        role="tab" aria-controls="{{$noorderx}}" aria-selected="true"
                                        style="border-radius:12px;width:100%;margin-bottom:7px;">
                                        {{$noorderx}}
                                    </a>
                                    @endforeach
                                </div> --}}
                                {{--
                            </div> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        @foreach($json['daftarjual'] as $jual)
                        <div class="tab-pane fade" id="{{$jual['noorder']}}" role="tabpanel"
                            aria-labelledby="nav{{$jual['noorder']}}">
                            <div class="card" style="height:100px;">
                                <div class="card-header" style="border-radius:12px;font-weight:bold">
                                    Detail Transaksi</div>
                                <div class="card-body" style="border-radius:12px;height:100px;overflow-y:hidden">
                                    <div class="table-responsive">
                                        <table class="table" width="100%">
                                            <tr>
                                                <th>No. Order / No. Meja</th>
                                                <th>:</th>
                                                <th>{{$jual['noorder']}}</th>
                                            </tr>
                                            <tr>
                                                <th>Tgl. Posting</th>
                                                <th>:</th>
                                                <th>{{$jual['tglposting']}}</th>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Customer</th>
                                                <th>:</th>
                                                <th>{{$jual['jmcu']}} Orang</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card" style="border-radius:12px;">
                                <div class="card-body" style="border-radius:12px;">
                                    <div class="scroll-2"
                                        style="height:125px;overflow-y:scroll;overflow-x:hidden;background: {{$color2}};">
                                        <table class="table" width="100%" style="color: {{$color1}};">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">MENU</th>
                                                    <th scope="col">QTY</th>
                                                    <th scope="col">HARGA</th>
                                                    <th scope="col">TOTAL</th>
                                                    <th scope="col">T</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($jual['jualdet'] as $det)
                                                <tr>
                                                    <td>{{$det['nmmenu']}}</td>
                                                    <td>{{$det['qtyjual']}}</td>
                                                    <td>{{number_format($det['harga'], 0, '', '.')}}</td>
                                                    <td>{{number_format($det['harga']*$det['qtyjual'], 0, '', '.')}}
                                                    </td>
                                                    <td>{{$det['tipejual']}}</td>
                                                </tr>
                                                @if ($det['modifier'] != null)
                                                <tr>
                                                    <td colspan="3">{{$det['nmmenu']}}</td>
                                                    <td>{{number_format($det['harga'], 0, '', '.')}}</td>
                                                    <td></td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="height:5px;"></div>
                                    <div class="card" id="hi-right" style="height:100px;background:{{$color5}};">
                                        <div class="card-body">
                                            <div class="form-group text-white">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group text-center">
                                                            <label class="text-white" for="subtotal1">SUBTOTAL</label>
                                                            <input class="form-control black text-center"
                                                                name="subtotal1" id="subtotalbayar" readonly
                                                                style="font-weight:bold;">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group text-center">
                                                            <label class="text-white" for="service">SERVICE</label>
                                                            <input class="form-control black text-center" name="service"
                                                                id="servicebayar" readonly style="font-weight:bold;">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group text-center">
                                                            <label class="text-white" for="taxes">TAX</label>
                                                            <input class="form-control black text-center" name="taxes"
                                                                id="taxbayar" readonly style="font-weight:bold;">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group text-center">
                                                            <label class="text-white" for="tot_penjualan">TOTAL</label>
                                                            <input class="form-control black text-center"
                                                                name="tot_penjualan" id="totalbayar" readonly
                                                                style="font-weight:bold;"
                                                                value="{{number_format($jual['jmtotal'], 0, '', '.')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</div>