<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?php echo e(asset('resource/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    
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
        <div class="table-responsive ">
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
    
    
</body>

</html><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/rptorderbrg/areaPDF.blade.php ENDPATH**/ ?>