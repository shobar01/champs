<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('resource/img/logo.png')); ?>">
    <!-- Bootstrap CSS -->
    <!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"-->
    <!--          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->

    <link href="<?php echo e(asset('resource/css/plugins/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('resource/css/plugins/simple-line-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('resource/css/plugins/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('resource/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('resource/css/loader.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('resource/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!--    <link href="<?php echo e(asset('resource/css/bari.css')); ?>" rel="stylesheet">-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!--    Keyboard-->

    <link rel="stylesheet" href="<?php echo e(asset('resource/keyboard/dist/virtual-keyboard.css')); ?>">
    <script src="<?php echo e(asset('resource/keyboard/dist/virtual-keyboard.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('title'); ?>
</head>

<body id="mimin" class="dashboard">
    <div id="loader"></div>
    <?php echo $__env->yieldContent('content'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"-->
    <!--        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">-->
    <!--</script>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"-->
    <!--        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">-->
    <!--</script>-->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"-->
    <!--        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">-->
    <!--</script>-->


    <!-- start: Javascript -->
    <script src="<?php echo e(asset('resource/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/jquery.ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/bootstrap.min.js')); ?>"></script>


    <!-- plugins -->
    <script src="<?php echo e(asset('resource/js/plugins/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/plugins/fullcalendar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/plugins/jquery.nicescroll.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/plugins/jquery.vmap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/plugins/maps/jquery.vmap.world.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/plugins/jquery.vmap.sampledata.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/plugins/chart.min.js')); ?>"></script>

    <!--Datatable-->
    <script src="<?php echo e(asset('resource/js/plugins/jquery.datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/plugins/datatables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('resource/js/plugins/jquery.nicescroll.js')); ?>"></script>

    <!-- custom -->
    <script src="<?php echo e(asset('resource/js/main.js')); ?>"></script>

    <script>
        $(window).on('load', function () {
        $('#loader').delay(450).fadeOut('slow');
      });
    </script>
    <script>
        function loadingon(){
      $('#loader').show();
    }
        function alertLogout() {
        Swal.fire({
            text: "Are You Sure," + "<?php echo e(session('nm_lengkap')); ?>?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Logout!'
        }).then((result) = > {
            if (result.isConfirmed)
        {
            Swal.fire(
                'success logout!',
                'See You, <?php echo e(session('
            nm_lengkap
            ')); ?>',
                'success'
        )
            event.preventDefault();
            $('#logout-form').submit()
            // this submits the form
            //            document.getElementById('logout-form').submit();
        }
    }
    )

    }
    </script>
    <script type="text/javascript">
        function showmodal(isi) {
        var data = isi.split(',');
        var no = data[0];
        var nama = data[1]; 
        var kdbarang = data[2];
        var periode1 = data[3];
        console.log(kdbarang);
        $('#modal_inptqty').modal('show');
        $('#LabelMdlQty').html(nama + "==" + no);
        $('#kdbarang').val(kdbarang);   
        $('#periode1').val(periode1);  
    }
    function Click_tblmenu(x) {
//        alert("Row index is: " + x.rowIndex);
        $("#LabelMdlQty").html("Croisant =" + x.rowIndex);
    }
    function Click_baking(x) {
//        alert("Row index is: " + x.rowIndex);
        $("#myModalLabel").html("Croisant =" + x.rowIndex);
    }

    $(document).ready(function () {
        $('#tabel_listmenu').DataTable({
            /*Merubah posisi search*/
            lengthChange: true
        });
    });
    // $(document).ready(function () {
    //     $('#tabel_listmenu td').click(function () {

    //         var column_num = parseInt($(this).index()) + 1;
    //         var row_num = parseInt($(this).parent().index()) + 1;

    //         //            $("#myModalLabel").html( "On Proccess =" + row_num + "  ,  Rolumn_num ="+ column_num );
    //         // $("#LabelMdlQty").html("Croisant =" + row_num);
    //     });
    // });

    //    // Tabel Baking
    $(document).ready(function () {
        $('#tabel_baking').DataTable();
    });

    $(document).ready(function () {
        $("#tabel_baking td").click(function () {

            var column_num = parseInt($(this).index()) + 1;
            var row_num = parseInt($(this).parent().index()) + 1;

            //            $("#myModalLabel").html( "On Proccess =" + row_num + "  ,  Rolumn_num ="+ column_num );
            $("#myModalLabel").html("Croisant =" + row_num);
        });
    });


        function loadingon() {
            $('#loader').show();
        }
    </script>


</body>

</html><?php /**PATH C:\xampp\htdocs\wolaravel\resources\views/layouts/layout.blade.php ENDPATH**/ ?>