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
    </style>
</head>

<body class="dashboard" style="background-color: #f0f3f4 !important">
    <div id="loader"></div>

    
    <nav class="navbar navbar-icon-top navbar-expand-sm  fixed-top"
        style="height: 30px !important; padding: 30px 0 30px 0 !important; background-color: #26160D;">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="nav-item" id="li_logo">
                <img src="<?php echo e(asset('public/resource/img/logoms2.png')); ?>" class="img-circle avatar center "
                    style="width: 55px; height: 55px; margin-left: 25px;" />
            </div>
            <ul class="navbar-nav mr-auto" style="padding-left: 10px;">

                <li class="nav-item ">
                    <a class="nav-link" onclick="btn_nav('home')" style="color: #26160D; background: #fff;
                    border-radius: 10px ;
                    font-size: 0.7 rem; font-size: 14px;"><b id="nm_tittle" class=""></b>
                    </a>
                </li>
                
            </ul>
            <ul class="nav navbar-nav " style="padding-right: 25px;">
                <?php if($btn_kontak == 'T'): ?>
                <li class="nav-item " id="li_back">
                    <a class="nav-link" onclick="btn_nav('home')" style="color: #fff; 
                    font-size: 0.7 rem;">
                        <i class="fa fa-arrow-left" style="color: #fff; 
                        font-size: 1.2em; margin-right: 10px;"></i>Back
                    </a>
                </li>
                <?php endif; ?>
                <?php if($btn_kontak == 'F'): ?>
                <li class="nav-item " id="li_contact">
                    <a class="nav-link" onclick="btn_nav('contact')" style="color: #fff; 
                    font-size: 0.7 rem;">
                        
                        <i class="fa fa-address-book-o" style="color: #fff; 
                        font-size: 1.2em;"></i> Contact
                    </a>
                </li>


                <li class="nav-item ">
                    <a class="nav-link" style="color: #fff; 
                    font-size: 0.7 rem;" onclick="btn_shwtmbh()">
                        <i class="fa fa-user-plus" style="color: #fff; 
                        font-size: 1.2em;"></i> add Guest
                    </a>
                </li>
                <?php endif; ?>
            </ul>

        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>
    <footer class="footer " id="id_footerr" style="padding-bottom: 5px !important;">

        <div class="row">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class=" col text-white text-left ml-4" style="font-size: 10px;">PT.Champ Resto Indonesia
                    </div>
                </div>
                
                    <div class=" col text-white text-right mr-3" style="font-size: 10px;">©ICT Department 2021 -
                        Version
                        1.2
                    </div>
                    
            </div>
        </div>


        
    </footer>
    <script type="text/javascript">
        /* dVbktm=$('#tb_viewbktm').DataTable({
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
        }); */
        
        $(document).ready(function(){
      $("#search_bktm").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#isimenu tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
        // $('#search_bktm').keyup(function(){  
        //     dVbktm.search($(this).val()).draw();    
        // }) ;

        
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

</body>

</html><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/layouts/layout_ms.blade.php ENDPATH**/ ?>