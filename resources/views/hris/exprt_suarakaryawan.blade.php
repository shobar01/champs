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
            <a style="width: 100%;" class="text-left"><b>Suara Karyawan</b></a>
            <table class="table table-striped table-bordered" style="width:100%;">

                <thead>

                    <tr>
                        <th class="text-left"><b>Suara Karyawan</b></th>
                    </tr>
                    <tr class="text-center" style=" background: #FEBD01;">
                        <th style="width: 5%; border-top: 1px solid #111 !important; font-size: 12px !important">
                            <b>No.</b>
                        </th>
                        <th style="width: 15%; border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Nama</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Waktu</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Pesan</b>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($df_suarak as $df)
                    <tr>
                        <td style="width: 5%; font-size: 12px !important;">
                            {{$loop->iteration}}</td>
                        <td style="width: 15%; font-size: 12px !important;"> {{Str::substr($df['nm_lengkap'],0,1)}}****
                        </td>
                        <td style="font-size: 12px !important;"> {{$df['wktsrn']}}</td>
                        <td style="font-size: 12px !important;"> {{$df['isisaran'],0,1}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>