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
</head>

<body>
    
    

    <div class="">
        <div class="table-responsive ">
            <table class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th class="text-left"><b>Nama Outlet :</b></th>
                        <th class="text-left"><b><?php echo e($nmotl); ?></b></th>
                    </tr>
                    <tr>
                        <th class="text-left"><b>Kode Outlet :</b></th>
                        <th class="text-left"><b><?php echo e($kdotl); ?></b></th>
                    </tr>
                    <tr>
                        <th class="text-left"><b>Tanggal :</b></th>
                        <th class="text-left"><b><?php echo e($tanggal); ?></b></th>
                    </tr>
                    <tr>
                        <th class="text-left"><b>Nip :</b></th>
                    </tr>
                    <tr>
                        <th class="text-left"><b>Nama :</b></th>
                    </tr>
                    <tr class="text-center" style=" background: #FEBD01;">
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important">
                            No.</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Kode</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Nama Barang</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Satuan</th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $allbrgbk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arbrg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="font-size: 12px !important;">
                            <?php echo e($loop->iteration); ?></td>
                        <td style="font-size: 12px !important;"><?php echo e($arbrg['kdbarang']); ?> </td>
                        <td style="font-size: 12px !important;">
                            <?php echo e(ucfirst(strtolower($arbrg['nmbarang']))); ?></td>
                        <td style="font-size: 12px !important;"><?php echo e($arbrg['satuan']); ?> </td>
                        <td style="font-size: 12px !important;">0</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    
</body>

</html><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//rptstocktake/exprt_stckcc.blade.php ENDPATH**/ ?>