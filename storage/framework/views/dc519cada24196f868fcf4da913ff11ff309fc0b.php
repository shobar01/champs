<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('public/resource/img/logosplash.png')); ?>">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600'
        rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS -->
    
    <link href="<?php echo e(asset('public/resource/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/resource/css/style_ms.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/resource/css/font-awesome.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/resource/css/responsive.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/resource/css/magnific-popup.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/resource/css/animate.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/resource/css/stylesapexcharts.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/resource/css/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/resource/css/rsponsive.datatables.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    


    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src=" https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js">
    </script>
    
    

    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="<?php echo e(asset('public/resource/css/loader.css')); ?>" rel="stylesheet">


    <!--    Keyboard-->
    <link rel="stylesheet" href="<?php echo e(asset('public/resource/keyboard/dist/virtual-keyboard.css')); ?>">
    <script src="<?php echo e(asset('public/resource/keyboard/dist/virtual-keyboard.min.js')); ?>"></script>

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

        .active {
            background: #8C5E4D;
            border-radius: 50px;
        }

        table.dataTable thead .sorting_asc {
            background-image: url(./public/resource/img/sort_asc.png);
            /* background-image: none; */
        }

        table.dataTable thead .sorting_desc {
            background-image: url(./public/resource/img/sort_desc.png);
            /* background-image: url(none); */
        }

        body.swal2-shown>[aria-hidden="true"] {
            transition: 0.1s filter;
            filter: blur(10px);
        }
    </style>
</head>

<body class="dashboard" style="background-color: #f0f3f4 !important; overflow: hidden; height: 100vh; ">
    <div id="loader"></div>

    
    <header>
        <nav class="navbar navbar-icon-top navbar-expand-sm  fixed-top"
            style="height: 30px !important; padding: 30px 0 30px 0 !important; background-color: #26160D;">


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="nav-item" id="li_logo">
                    <img src="<?php echo e(asset('public/resource/img/logoMS1.png')); ?>" class="img-circle avatar center "
                        style="width: 55px; height: 55px; margin-left: 25px;" />
                </div>
                <ul class="navbar-nav mr-auto" style="padding-left: 10px;">

                    <li class="nav-item ">
                        <a class="nav-link" onclick="btn_nav('home')" style="color: #26160D; background: #fff;
                    border-radius: 10px ; font-size: 12px;"><b id="nm_tittle" class=""></b>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav " style="padding-right: 25px;">
                    <?php if($btn_kontak == 'T' || $btn_kontak == 'R' ): ?>
                    <?php if($btn_kontak == 'R'): ?>
                    <li class="nav-item ">
                        <a class="nav-link" style="color: #fff; 
                    font-size: 12px;" onclick="btn_shwtmbh()">
                            <i class="fa fa-user-plus" style="color: #fff; 
                        font-size: 1.2em;"></i> add Guest Reservation
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item " id="li_back">
                        <a class="nav-link" onclick="btn_nav('home')" style="color: #fff; 
                    font-size: 12px;">
                            <i class="fa fa-arrow-left" style="color: #fff; 
                        font-size: 1.2em; margin-right: 10px;"></i>Back
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if($btn_kontak == 'F'): ?>
                    <li class="nav-item " id="li_contact">
                        <a class="nav-link" onclick="btn_nav('contact')" style="color: #fff; 
                    font-size: 12px;">
                            
                            <i class="fa fa-address-book-o" style="color: #fff; 
                        font-size: 1.2em;"></i> Contact
                        </a>
                    </li>

                    <li class="nav-item " id="li_reservation">
                        <a class="nav-link" onclick="btn_nav('reservation')" style="color: #fff; 
                    font-size: 12px;">
                            <i class="fa  fa-bookmark" style="color: #fff; 
                        font-size: 1.2em;"></i> Reservation
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" style="color: #fff; 
                    font-size: 12px;" onclick="btn_shwtmbh()">
                            <i class="fa fa-user-plus" style="color: #fff; 
                        font-size: 1.2em;"></i> add Guest
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" style="color: #fff; 
                        font-size: 12px;">
                            <i class="fa fa-user-circle-o "></i>
                            
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#"> <i class="fa fa-user-circle-o"></i>
                                <?php echo e(session('nm_lengkap')); ?></a>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();loadingon();"> <i class="fa fa-power-off"></i>
                                Logout</a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                    <?php endif; ?>

                </ul>

            </div>
        </nav>
    </header>
    <?php echo $__env->yieldContent('content'); ?>
    <footer class="footer fixed-bottom" id="id_footerr" style="padding-bottom: 5px !important;">

        <div class="row">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class=" col text-white text-left ml-4" style="font-size: 10px;">PT. Champ Resto Indonesia Tbk.
                    </div>
                </div>
                
                    <div class=" col text-white text-right mr-3" style="font-size: 10px;">©ICT Department 2022 -
                        Version
                        1.2
                    </div>
                    
            </div>
        </div>


        
    </footer>
    <script type="text/javascript"> 
        
        $(document).ready(function(){
      $("#search_bktm").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#isimenu tr ").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    }); 
    </script>
    <script>
        $(".nav a").on("click", function(){
        $(".nav").find(".active").removeClass("active");
        $(this).parent().addClass("active");
        });
        $(window).on('load', function () {
            $('#loader').delay(450).fadeOut('slow'); 
        });
    </script>

    <script>
        function loadingon() {
        $('#loader').show();   
        }
    </script>
    <?php if(session('success')): ?>
    <script>
        Swal.fire({
         title: 'Success',
         text: "<?php echo e(session('success')); ?>",
         icon: 'success', 
         confirmButtonColor: '#008000',
         allowOutsideClick: false  
         })  
    </script>
    <?php elseif((session('error'))): ?>
    <script>
        Swal.fire({
         title: 'Sorry!!',
         text: "<?php echo e(session('error')); ?>",
         icon: 'error', 
         confirmButtonColor: '#8B0000',
         allowOutsideClick: false  
         })  
     $('#loader').hide();
    </script>
    <?php endif; ?>
</body>

</html><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/layouts/layout_ms.blade.php ENDPATH**/ ?>