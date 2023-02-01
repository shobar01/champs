<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{asset('resource/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    {{--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    --}}
    <style>
        .table-bordered td,
        .table-bordered th {
            border: 2px solid black;
            padding: 2px;
        }
    </style>
</head>

<body>
    {{-- <a href="{{ route('rptord_periode',['download'=>'pdf']) }}">Download PDF</a> --}}
    {{-- <a class="btn btn-primary" href="{{ URL::to('/rptord_periode') }}">Export to PDF</a> --}}

    <div class="">
        <div class="table-responsive ">
            <table class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th class="text-left"><b>Nama Outlet :</b></th>
                        <th class="text-left"><b>{{$nmotl}}</b></th>
                    </tr>
                    <tr>
                        <th class="text-left"><b>Kode Outlet :</b></th>
                        <th class="text-left"><b>{{$kdotl}}</b></th>
                    </tr>
                    <tr>
                        <th class="text-left"><b>Tanggal :</b></th>
                        <th class="text-left"><b>{{$tanggal}}</b></th>
                    </tr>
                    <tr>
                        <th class="text-left"><b>Nip :</b></th>
                    </tr>
                    <tr>
                        <th class="text-left"><b>Nama :</b></th>
                    </tr>
                    <tr class="text-center" style=" background: #FEBD01;">
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important">
                            No.</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Kode</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Nama Barang</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Satuan</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allbrgbk as $arbrg)
                    <tr>
                        <td style="font-size: 12px !important;">
                            {{$loop->iteration}}</td>
                        <td style="font-size: 12px !important;">{{$arbrg['kdbarang']}} </td>
                        <td style="font-size: 12px !important;">
                            {{ucfirst(strtolower($arbrg['nmbarang']))}}</td>
                        <td style="font-size: 12px !important;">{{$arbrg['satuan']}} </td>
                        <td style="font-size: 12px !important;">0</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script> --}}
    {{-- <script>
        window.print();
    </script> --}}
</body>

</html>