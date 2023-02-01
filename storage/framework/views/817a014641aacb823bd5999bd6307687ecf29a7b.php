<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>PT. Champ Resto Indonesia</title>
    <link rel="shortcut icon" href="<?php echo e(asset('public/resource/img/logo.png')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Bootstrap CSS -->
    
    <style>
        .table-bordered td,
        .table-bordered th {
            padding: 2px !important;
        }

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

        img {
            max-width: 100%;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }
    </style>
    <title>Download PDF</title>
</head>

<body>
    
        <div style=" background: #FEBD01; height: 50px;">
            <img src="<?php echo e(asset('public/resource/img/logo.png')); ?>" class="img img-circle avatar center"
                style="width: 100px; height: 100px;" />
        </div>
        
    <div class="container" style="padding-top: 30px; padding-right: 0px ; padding-left: 0px;">
        <div class="card-deck mb-3 ">
            <div class="card mb-4 shadow-sm">
                <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="my-0 font-weight-normal" style="font-size: 26px;"><b>Report Order Barang
                                    (<?php echo e($kdbrng); ?>)</b></a>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class="my-0 font-weight-normal" style="font-size: 26px;"><b><?php echo e($tanggalll); ?></b></a>
                        </div>
                    </div>
                </div>
                <div class="">

                    
                    <div class="fw-container" style="">
                        <div class="fw-body">
                            <div class="content">
                                <div class="table-responsive ">

                                    <table id="tb_ordbrgpdf" class="table table-striped table-bordered"
                                        style="width:100%;">

                                        <tbody>
                                            <tr class="text-center">
                                                <th
                                                    style="border: 1px solid #111 !important; font-size: 26px !important;  font-weight: 500; width:5%; background: #FEBD01 !important;">
                                                    No.</th>
                                                <th
                                                    style="border: 1px solid #111 !important; font-size: 26px !important;  font-weight: 500; width:10%; background: #FEBD01 !important;">
                                                    Kode</th>
                                                <th
                                                    style="border: 1px solid #111 !important; font-size: 26px !important;  font-weight: 500; width:50%;background: #FEBD01 !important;">
                                                    Nama Barang</th>
                                                <th
                                                    style="border: 1px solid #111 !important; font-size: 26px !important; font-weight: 500; width:10%; background: #FEBD01 !important;">
                                                    Satuan</th>
                                                <th
                                                    style="border: 1px solid #111 !important; font-size: 26px !important; width:10%;background: #FEBD01 !important;">
                                                    Qty</th>
                                            </tr>
                                            <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrydetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center"
                                                    style="font-size: 26px !important; font-weight: 500; width:5%; border: 1px solid #111 !important; ">
                                                    <?php echo e($loop->iteration); ?></td>
                                                <td class="text-center"
                                                    style="font-size: 26px !important;  font-weight: 500; width:10%; border: 1px solid #111 !important; ">
                                                    <?php echo e($arrydetail['kdbarang']); ?>

                                                </td>
                                                <td
                                                    style="font-size: 26px !important;  font-weight: 500; width:50%;border: 1px solid #111 !important;">
                                                    <?php echo e(ucfirst(strtolower($arrydetail['nmbarang']))); ?></td>
                                                <td class="text-center"
                                                    style="font-size: 26px !important;  font-weight: 500; width:10%;border: 1px solid #111 !important; ">
                                                    <?php echo e($arrydetail['satuan']); ?> </td>
                                                <td class="text-center"
                                                    style="font-size: 26px !important;  font-weight: 500; width:10%; border: 1px solid #111 !important;">
                                                    <?php echo e($arrydetail['qty']); ?> </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/rptorderbrg/headpdf.blade.php ENDPATH**/ ?>