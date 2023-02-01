<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .table-bordered td,
        .table-bordered th {
            border: 2px solid black;
            padding: 2px;
        }
    </style>
    <title>Download PDF</title>
</head>

<body>
    <div class=""><b>Report Order Barang (<?php echo e($kdbrng); ?>)</b></h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr class="text-center" style="background-color: yellow;">
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important">
                            No.</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Kode</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Nama Barang</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Satuan</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Qty</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrydetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="font-size: 12px !important;">
                            <?php echo e($loop->iteration); ?></td>
                        <td style="font-size: 12px !important;"><?php echo e($arrydetail['kdbarang']); ?> </td>
                        <td style="font-size: 12px !important;">
                            <?php echo e(ucfirst(strtolower($arrydetail['nmbarang']))); ?></td>
                        <td style="font-size: 12px !important;"><?php echo e($arrydetail['satuan']); ?> </td>
                        <td style="font-size: 12px !important;"><?php echo e($arrydetail['qty']); ?> </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//rptorderbrg/areaPDF.blade.php ENDPATH**/ ?>