<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{asset('resource/css/bootstrap.css')}}" rel="stylesheet" type="text/css"> 
    <style>
        .table-bordered td,
        .table-bordered th {
            border: 2px solid black;
            padding: 2px;
        }
    </style>
</head>

<body> 
    <div class="">
        <div class="table-responsive ">
            <a style="width: 100%;" class="text-left"><b>Produk Tidak Standar</b></a>
            <table class="table table-striped table-bordered" style="width:100%;">

                <thead>
                    {{-- tr.kdretur, tr.kdoutlet, tr.niprequest,ll.nama, tr.updateqa, tr.wktupdate,
                    ta.kdbarang,mb.nmbarang, ta.qtyretur, ta.foto1,ta.foto2, ta.ketreq, ta.isapprove, ta.ketqa --}}
                    <tr>
                        <th class="text-left"><b>Produk Tidak Standar</b></th>
                    </tr>
                    <tr class="text-center" style=" background: #FEBD01;">
                        <th style="width: 5%; border-top: 1px solid #111 !important; font-size: 12px !important">
                            <b>No.</b>
                        </th>
                        <th style="width: 15%; border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Kode PTS</b>
                        </th>
                        <th style="width: 15%; border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Tanggal PTS</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Kode Outlet</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Nama Outlet</b>
                        </th>
                        
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Kode Barang</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Nama Barang</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Qty</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Penyebab</b>
                        </th> 
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>PIC Outlet</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>PIC QA</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Waktu Update</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Ket Approve</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Ket QA</b>
                        </th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($df_dwnld as $df)
                    <tr>
                        <td style="font-size: 12px !important;">
                            {{$loop->iteration}}</td>
                        <td style="font-size: 12px !important;"> {{$df['kdretur']}} </td>
                        <td style="font-size: 12px !important;"> {{$df['tgl']}} </td>
                        <td style="font-size: 12px !important;"> {{$df['kdoutlet']}}</td>
                        <td style="font-size: 12px !important;"> {{$df['nmoutlet']}}</td>
                        <td style="font-size: 12px !important;"> {{$df['kdbarang']}}</td>
                        <td style="font-size: 12px !important;"> {{$df['nmbarang']}}</td>
                        <td style="font-size: 12px !important;"> {{$df['qtyretur']}} {{$df['satuan']}}</td>
                        <td style="font-size: 12px !important;"> {{$df['ketreq']}}</td> 
                        <td style="font-size: 12px !important;"> {{$df['nama']}}</td>
                        <td style="font-size: 12px !important;"> {{$df['nmqa']}}</td>
                        <td style="font-size: 12px !important;"> {{$df['wktupdate']}}</td>
                        <td style="font-size: 12px !important;"> {{$df['isapprove']}}</td>
                        <td style="font-size: 12px !important;"> {{$df['ketqa']}}</td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>