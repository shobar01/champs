<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{asset('public/resource/img/logo.png')}}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    {{--
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600'
        rel='stylesheet' type='text/css'> --}}

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    {{--
    <link href="{{asset('public/resource/css/bootstrap.css')}}" rel="stylesheet" type="text/css"> --}}
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
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js">
    </script>
    {{-- select search --}}
    

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
            margin: 0 0 24px 0;
            position: relative;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .fixed-plugin .fixed-plugin-button {
            background: #cc1a0b !important;
            font-size: 0.25rem !important;
        }

        .fixed-plugin .fixed-plugin-button {
            background: #fff;
            border-radius: 50%;
            bottom: 50px;
            right: 20px;
            font-size: 1.25rem;
            z-index: 990;
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.16);
            cursor: pointer;
        }

        .fixed-plugin .fixed-plugin-button i {
            pointer-events: none;
        }

        .fixed-plugin .card {
            position: fixed !important;
            right: -360px;
            top: 0;
            height: 100%;
            left: auto !important;
            transform: unset !important;
            width: 360px;
            border-radius: 0;
            padding: 0 10px;
            transition: .2s ease;
            z-index: 1020;
        }

        .fixed-plugin .badge {
            border: 1px solid #fff;
            border-radius: 50%;
            cursor: pointer;
            display: inline-block;
            height: 23px;
            margin-right: 5px;
            position: relative;
            width: 23px;
            transition: all 0.2s ease-in-out;
        }

        .fixed-plugin .badge:hover,
        .fixed-plugin .badge.active {
            border-color: #344767;
        }

        .fixed-plugin .btn.bg-gradient-dark:not(:disabled):not(.disabled) {
            border: 1px solid transparent;
        }

        .fixed-plugin .btn.bg-gradient-dark:not(:disabled):not(.disabled):not(.active) {
            background-color: transparent;
            background-image: none;
            border: 1px solid #344767;
            color: #344767;
        }

        .fixed-plugin.show .card {
            right: 0;
        }

        .material-icons {
            font-size: 20px !important;
        }

        body.swal2-shown>[aria-hidden="true"] {
            transition: 0.1s filter;
            filter: blur(10px);
        }

        .swal2-popup {
            font-size: 0.7rem !important;
            width: 20em !important;
            max-width: 100% !important;
        }

        .swal2-html-container {
            text-align: justify !important;
        }

        .form-control:focus {
            border-color: #cc1a0b;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5);
        }
        html, body {
        /* height: 100% !important; */
        margin: 0 !important;
        background: #cc1a0b !important
        }

        .full-height {
        /* height: 100%; */
        width: 100%;
        background: #f0f3f4; 
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
        margin-top: 60px;
        /* position: fixed; */
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;

            
        }
        .container {
            width: 100%;
            padding-right: 10px !important; 
            padding-left: 10px !important;
            margin-right: auto;
            margin-left: auto;
            padding-top: 10px !important;
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
        .card {
            /* border: none; */
            border-radius: 20px
        }
        .card-header {
            padding: 0.4rem 1.25rem !important;
            margin-bottom: 0;
            background-color: rgba(0,0,0,.03);
            border-bottom: 1px solid rgba(0,0,0,.125);
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
        }
        
        .card-body {
            padding: 0.50rem !important;
        }
    </style>
</head>

<body id="mimin" >
    <div id="loader"></div>

    <nav class=" header  fixed-top" style="height: 30px !important; padding: 30px 0 30px 0 !important;">
        <div class="mx-auto my-2 order-0 order-md-1 position-relative">
            <img src="{{asset('public/resource/img/logo.png')}}" class="img-circle avatar center  fixed-top"
                style="width: 60px; height: 60px;" />
        </div>
    </nav>
    <div class="full-height">
        @yield('content')
    </div>

    <footer class=" " id="id_footerr">
        <div class="row">
            <div class="input-group card shadow">
                <div class="text-center mt-1" style="margin: auto">
                    <img class="img-h" src="http://api.champ-group.com/champs-mobile/public/resource/img/cm/brand/bmk.png" alt="">
                    <img class="img-h" src="http://api.champ-group.com/champs-mobile/public/resource/img/cm/brand/gokana.png" alt="">
                    <img class="img-h" src="http://api.champ-group.com/champs-mobile/public/resource/img/cm/brand/platinum.png" alt="">
                    <img class="img-h" src="http://api.champ-group.com/champs-mobile/public/resource/img/cm/brand/raacha.png" alt="">
                    <img class="img-h" src="http://api.champ-group.com/champs-mobile/public/resource/img/cm/brand/bamiko.png" alt="">
                    <img class="img-h" src="http://api.champ-group.com/champs-mobile/public/resource/img/cm/brand/chopstix.png" alt="">
                    <img class="img-h" src="http://api.champ-group.com/champs-mobile/public/resource/img/cm/brand/kopilatinum.png" alt="">
                    <img class="img-h" src="http://api.champ-group.com/champs-mobile/public/resource/img/cm/brand/ms.png" alt="">
                    <img class="img-h" src="http://api.champ-group.com/champs-mobile/public/resource/img/cm/brand/dewata.png" alt="">
                    <img class="img-h" src="http://api.champ-group.com/champs-mobile/public/resource/img/cm/brand/croco.png" alt="">
                </div> 
                {{-- <a style="font-size: 12px; color: #cccccc;  position: fixed; bottom: 0; right: 0;" class="mr-2"> V1.2</a>  --}}
                   
                {{-- <div class="input-group-prepend">
                    <div class=" col copyright text-left ml-2" style="font-size: 10px;">PT. Champ Resto Indonesia Tbk.
                    </div>
                </div>--}}
                
            </div>
        </div>
 
    </footer>
    <script src="{{asset('public/resource/js/lottie.js')}}"></script>
    {{-- <script src="https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/lottie-player.js"></script> --}} 
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
    <script>
        // Get the modal
            var modal = document.getElementById('dpassword');
        
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
    </script>
    <script>
        // Get the modal
            var modal = document.getElementById('drlogin');
        
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
    </script>



  
    <script type="text/javascript">
        dTable=$('#tb_master').DataTable({
        "bLengthChange": false,
        "lengthMenu": [10],
        "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
        ],
        "dom":"lrtip" ,
        rowReorder: {
        selector: 'td:nth-child(2)'
        },
        responsive: true
        });
        $('#myCustomSearchBox').keyup(function(){
        dTable.search($(this).val()).draw();
        }) ;
    </script>


    <script type="text/javascript">
        dJdwal=$('#tb_jadwal').DataTable({
        "bLengthChange": false, 
        "paging":false, 
        "info":false, 
        "lengthMenu": [30], 
        "columnDefs": [
        {"className": "dt-center", "targets": "_all"}  
        ],
        "dom":"lrtip" ,  
        responsive: true
        });
        $('#search_jadwal').keyup(function(){  
            dJdwal.search($(this).val()).draw();    
        }) ;
    </script>

    {{-- Report Buku tamu --}}
    <script type="text/javascript">
        $('tb_rptbukutamu').dataTable();
        dPrsness=$('#tb_rptbukutamu').DataTable({
        "bLengthChange": true, 
        "paging":false, 
        "info":true, 
        "lengthMenu": [30], 
        "columnDefs": [
        {"className": "dt-center", "targets": "_all"}  
        ],
        "dom":"lrtip" , 
        rowReorder: {
        selector: 'td:nth-child(2)'
        },
        responsive: true
        });
        $('#search_rptbt').keyup(function(){  
        dPrsness.search($(this).val()).draw();    
        }) ;
    </script>
    <script type="text/javascript">
        $('#tb_rptbukutamudetail').DataTable( {
        "bLengthChange": true, 
        "paging":false, 
        "info":true, 
        "lengthMenu": [30], 
        "columnDefs": [
        {"className": "dt-center", "targets": "_all"}  
        ],
        "dom":"lrtip" , 
        rowReorder: {
        selector: 'td:nth-child(2)'
        },
        responsive: true
        } );
    </script>


    <script>
        $('.show-details-btn').on('click', function(e) {
        e.preventDefault();
        $(this).closest('tr').next().toggleClass('open');
        $(this).find('i').toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });

    </script>

    {{-- Report Order Barang--}}
    <script>
        dOrdbrg=$('#tb_ordbrg').DataTable({
                "bLengthChange": false, 
                "paging":false, 
                "info":false, 
                "lengthMenu": [30], 
                "columnDefs": [
                {"className": "dt-center", "targets": "_all"}  
                ],
                "dom":"lrtip" , 
                // rowReorder: {
                // selector: 'td:nth-child(2)'
                // },
                responsive: true
                });
                $('#search_ordbrg').keyup(function(){  
                    dOrdbrg.search($(this).val()).draw();    
            }) ;  

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

    <script>
        dOrdbrg=$('#tb_ordbrgpdf').DataTable({
        "bLengthChange": false, 
        "paging":false, 
        "info":false, 
        "lengthMenu": [30], 
        "columnDefs": [
        {"className": "dt-center", "targets": "_all"}  
        ],
        "dom":"lrtip" , 
        rowReorder: {
        selector: 'td:nth-child(2)'
        },
        responsive: true
        }); 

    </script>


    {{-- View COGS --}}

    <script>
        dcogs=$('#tblcogs').DataTable({
                "bLengthChange": false, 
                "paging":false, 
                "info":true, 
                "lengthMenu": [30],  
                "dom":"lrtip" ,   
                });
                $('#search_cogs').keyup(function(){  
                    dcogs.search($(this).val()).draw();    
            }) ;  

    </script>

    @if (session('succes'))
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Berhasil Tersimpan.',
        confirmButtonColor: '#3085d6',
        allowOutsideClick: false  
    })
    
    </script>
    @endif
 {{-- Refresh page --}}
    <script>
    function rfrsh(){
        $('#loader').show();  
        $('#gbl_rfrsh').css({'background':'rgba(0, 0, 0, 0.5)' }); 
        history.go(0)
        $(document).ready(function () {  
        var refreshId = setInterval(function () {
            $('#loader').hide();
            }, 5000);
            $.ajaxSetup({ cache: false });
        });
    }
    </script>
</body>

</html>