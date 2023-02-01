<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('resource/img/logo.png')); ?>">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600'
        rel='stylesheet' type='text/css'>
    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/slicknav.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/gijgo.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/animated-headline.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/fontawesome-all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/chart.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resource/css/layout2/selectsearch.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    

    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="<?php echo e(asset('resource/css/loader.css')); ?>" rel="stylesheet">
</head>

<body id="mimin" class="dashboard" style="background-color: #f0f3f4 !important">
    <div id="loader"></div>
    <?php echo $__env->yieldContent('content'); ?>
    <footer class="footer ">
        <div class="">
            <span class="copyright">PT.Champ Resto Indonesia</span>
            <span class="copyright">©ICT Department 2021 - Version 1.1</span>

        </div>
    </footer>
    <!-- JS here -->
    <script src="<?php echo e(asset('resource/js/layout2/vendor/modernizr-3.5.0.min.js')); ?>"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?php echo e(asset('resource/js/layout2/vendor/jquery-1.12.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/layout2/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/layout2/bootstrap.min.js')); ?>"></script>

    <script src="<?php echo e(asset('resource/js/layout2/selectsearch.min.js')); ?>"></script>

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
        dPrsne=$('#tb_presence').DataTable({
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
                $('#search_absen').keyup(function(){  
                    dPrsne.search($(this).val()).draw();    
            }) ;
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
            rowReorder: {
            selector: 'td:nth-child(2)'
            },
            responsive: true
            });
            $('#search_jadwal').keyup(function(){  
                dJdwal.search($(this).val()).draw();    
        }) ;
    </script>

    <script>
        $('.show-details-btn').on('click', function(e) {
    e.preventDefault();
    $(this).closest('tr').next().toggleClass('open');
    $(this).find('i').toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
});
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/layouts/layout_web.blade.php ENDPATH**/ ?>