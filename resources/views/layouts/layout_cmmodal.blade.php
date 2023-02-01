<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PT. Champ Resto Indonesia Tbk.</title>
    <link rel="shortcut icon" href="{{asset('public/resource/img/logo.png')}}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600'
        rel='stylesheet' type='text/css'>
    <link href="{{asset('public/resource/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/resource/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/resource/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/resource/css/responsive.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/resource/css/magnific-popup.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/resource/css/animate.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/resource/css/ionicons/css/ionicons.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/resource/css/rsponsive.datatables.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script> --}}

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src=" https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>



    {{-- Loader --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{asset('public/resource/css/loader.css')}}" rel="stylesheet">

    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;

        }

        /* Center the image and position the close button */
        .img.container {
            text-align: center;
            margin: 10px 0 10px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .input-group-text {
            color: #FEBD01 !important;
            background-color: #FEBD01 !important;
            border: #FEBD01 !important;
        }

        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #0C9;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float {
            margin-top: 22px;
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 0.25rem 0.25rem 0.25rem 0.25rem !important;
        }

        .swal2-popup {
            font-size: 0.7rem !important;
            width: 20em !important;
            max-width: 100% !important;
        }

        body.swal2-shown>[aria-hidden="true"] {
            transition: 0.1s filter;
            filter: blur(10px);
        }
        @media only screen and (max-width: 992px){
            .img-h {
                height: 6vw;
            }
        }
        @media only screen and (max-width: 1115px){
            .img-h {
                height: 8vw;
            }
        }   
        .img-h {
            height: 6vw;
        }
    </style>
</head>

<body id="mimin" class="dashboard" style="background-color: #FFFFFF !important;  overflow-y: hidden;
overflow-x: hidden;">
    <div id="loader"></div>

    @yield('content')


    <script src="{{asset('public/resource/js/lottie.js')}}"></script>
    {{-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> --}}
    <script>
        $(window).on('load', function () {
            $('#loader').delay(450).fadeOut('slow'); 
        });
    </script>

    <script>
        function loadingon() {
        $('#loader').show();   
        }
    </script>

</body>

</html>