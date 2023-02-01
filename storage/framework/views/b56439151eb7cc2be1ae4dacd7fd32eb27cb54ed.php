<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?php echo e(asset('resource/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css"> 
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
            <a style="width: 100%;" class="text-left"><b>Produk Tidak Standar</b></a>
            <table class="table table-striped table-bordered" style="width:100%;">

                <thead>
                    
                    <tr>
                        <th class="text-left"><b>Produk Tidak Standar</b></th>
                    </tr>
                    <tr class="text-center" style=" background: #FEBD01;">
                        <th style="width: 5%; border-top: 1px solid #111 !important; font-size: 12px !important">
                            <b>No.</b>
                        </th>
                        <th style="width: 15%; border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Kode PTS</b>
                        </th>
                        <th style="width: 15%; border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Tanggal PTS</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Kode Outlet</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Nama Outlet</b>
                        </th>
                        
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Kode Barang</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Nama Barang</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Qty</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Penyebab</b>
                        </th> 
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>PIC Outlet</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>PIC QA</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Waktu Update</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Ket Approve</b>
                        </th>
                        <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                            <b>Ket QA</b>
                        </th>  
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $df_dwnld; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $df): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="font-size: 12px !important;">
                            <?php echo e($loop->iteration); ?></td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['kdretur']); ?> </td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['tgl']); ?> </td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['kdoutlet']); ?></td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['nmoutlet']); ?></td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['kdbarang']); ?></td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['nmbarang']); ?></td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['qtyretur']); ?> <?php echo e($df['satuan']); ?></td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['ketreq']); ?></td> 
                        <td style="font-size: 12px !important;"> <?php echo e($df['nama']); ?></td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['nmqa']); ?></td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['wktupdate']); ?></td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['isapprove']); ?></td>
                        <td style="font-size: 12px !important;"> <?php echo e($df['ketqa']); ?></td> 
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/pts/exprt_pts.blade.php ENDPATH**/ ?>