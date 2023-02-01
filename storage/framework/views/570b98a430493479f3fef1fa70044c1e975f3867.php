<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('public/resource/img/logo.png')); ?>">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600'
        rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS -->
    
    <link href="<?php echo e(asset('public/resource/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('public/resource/css/style.css')); ?>" rel="stylesheet" type="text/css">
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
    </style>
</head>

<body class="dashboard" style="background-color: #f0f3f4 !important">
    <div id="loader"></div>

    <nav class=" header  fixed-top" style="height: 30px !important; padding: 30px 0 30px 0 !important;">
        <div class="mx-auto my-2 order-0 order-md-1 position-relative">
            <img src="<?php echo e(asset('public/resource/img/logo.png')); ?>" class="img-circle avatar center  fixed-top"
                style="width: 100px; height: 100px;" />
        </div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>
    <footer class="footer " id="id_footerr">
        <span class="copyright">PT.Champ Resto Indonesia</span>
        <span class="copyright">©ICT Department 2021 - Version 1.2</span>
        
    </footer>
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

</html><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/layouts/layout_cmdash.blade.php ENDPATH**/ ?>