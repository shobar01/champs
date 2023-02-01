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
            <a style="width: 100%;" class="text-left"><b>Suara Karyawan</b></a>
            <table class="table table-striped table-bordered" style="width:100%;">

                <thead>

                    <tr>
                        <th class="text-left"><b>Suara Karyawan</b></th>
                    </tr>
                    <tr class="text-center" style=" background: #FEBD01;">
                        <th style="width: 5%; border-top: 1px solid #111 !important; font-size: 12px !important">
                            <b>No.</b>
                        </th>
                        <th style="width: 15%; border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Nama</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Waktu</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Pesan</b>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $df_suarak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $df): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="width: 5%; font-size: 12px !important;">
                            <?php echo e($loop->iteration); ?></td>
                        <td style="width: 15%; font-size: 12px !important;"> <?php echo e(Str::substr($df['nm_lengkap'],0,1)); ?>****
                        </td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['wktsrn']); ?></td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['isisaran'],0,1); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/hris/exprt_suarakaryawan.blade.php ENDPATH**/ ?>