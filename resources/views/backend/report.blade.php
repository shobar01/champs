<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Report Ticketing</title>
</head>

<body>
    <table class="table table-bordered" width="100%">
        <tr>
            <th>Outlet</th>
            <th>: [{{$json['kdoutlet']}}] {{$json['nmoutlet']}}</th>
        </tr>

        <tr>
            <th>Periode</th>
            <th>: {{$periode}}</th>
        </tr>
    </table>
    <div class="table-responsive">
        <table class="table table-bordered" width="100%">

            <tr>
                <th>Kode Tiket</th>
                <th>NIP Request</th>
                <th>Nama Request</th>
                <th>Tujuan</th>
                <th>Status Terakhir</th>
                <th>Waktu Request</th>
                <th>Kategori</th>
                <th>Bintang</th>
                <th>Poin</th>
                <th>Detail Tracking</th>
            </tr>
            @foreach ($json['listrpt'] as $item)
            <tr>
                <td>{{$item['kdticket']}}</td>
                <td>{{$item['nipreq']}}</td>
                <td>{{$item['nmreq']}}</td>
                <td>{{$item['depttujuan']}}</td>
                <td>{{$item['nmstatus']}}</td>
                <td>{{$item['wktreq']}}</td>
                <td>{{$item['nmkat']}}</td>
                <td>{{$item['bintang']}}</td>
                <td>{{$item['poin']}}</td>
                <td>
                    {{$item['dettrack'][0]['kdticket']}}
                    {{$item['dettrack'][0]['kdtracking']}}
                    {{$item['dettrack'][0]['nmstatus']}}
                    {{$item['dettrack'][0]['nip']}}
                    {{$item['dettrack'][0]['nama']}}
                    {{$item['dettrack'][0]['wktupdate']}}
                    {{$item['dettrack'][0]['keterangan']}}
                    {{$item['dettrack'][0]['foto1']}}
                    {{$item['dettrack'][0]['foto2']}}
                    {{$item['dettrack'][0]['xlat']}}
                    {{$item['dettrack'][0]['xlong']}}
                </td>

            </tr>
            @endforeach
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>


</body>

</html>