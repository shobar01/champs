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
    <link href="<?php echo e(asset('public/resource/css/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet" type="text/css">
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

<body id="mimin" class="dashboard" style="background-color: #f0f3f4 !important">
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

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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

    <?php if(session('succes')): ?>
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Berhasil Tersimpan.',
        confirmButtonColor: '#3085d6' 
    })
    
    </script>
    <?php endif; ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/layouts/layout.blade.php ENDPATH**/ ?>