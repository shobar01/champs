<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Report Ticketing</title>
</head>

<body>
    <table class="table table-bordered" width="100%">
        <tr>
            <th>Outlet</th>
            <th>: [<?php echo e($json['kdoutlet']); ?>] <?php echo e($json['nmoutlet']); ?></th>
        </tr>

        <tr>
            <th>Periode</th>
            <th>: <?php echo e($periode); ?></th>
        </tr>
    </table>
    <div class="table-responsive">
        <table class="table table-bordered" width="100%">

            <tr>
                <th>Kode Tiket</th>
                <th>NIP Request</th>
                <th>Nama Request</th>
                <th>Tujuan</th>
                <th>Status Terakhir</th>
                <th>Waktu Request</th>
                <th>Kategori</th>
                <th>Bintang</th>
                <th>Poin</th>
                <th>Detail Tracking</th>
            </tr>
            <?php $__currentLoopData = $json['listrpt']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item['kdticket']); ?></td>
                <td><?php echo e($item['nipreq']); ?></td>
                <td><?php echo e($item['nmreq']); ?></td>
                <td><?php echo e($item['depttujuan']); ?></td>
                <td><?php echo e($item['nmstatus']); ?></td>
                <td><?php echo e($item['wktreq']); ?></td>
                <td><?php echo e($item['nmkat']); ?></td>
                <td><?php echo e($item['bintang']); ?></td>
                <td><?php echo e($item['poin']); ?></td>
                <td>
                    <?php echo e($item['dettrack'][0]['kdticket']); ?>

                    <?php echo e($item['dettrack'][0]['kdtracking']); ?>

                    <?php echo e($item['dettrack'][0]['nmstatus']); ?>

                    <?php echo e($item['dettrack'][0]['nip']); ?>

                    <?php echo e($item['dettrack'][0]['nama']); ?>

                    <?php echo e($item['dettrack'][0]['wktupdate']); ?>

                    <?php echo e($item['dettrack'][0]['keterangan']); ?>

                    <?php echo e($item['dettrack'][0]['foto1']); ?>

                    <?php echo e($item['dettrack'][0]['foto2']); ?>

                    <?php echo e($item['dettrack'][0]['xlat']); ?>

                    <?php echo e($item['dettrack'][0]['xlong']); ?>

                </td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>


</body>

</html><?php /**PATH G:\ChampApplication\xampp\htdocs\champs-mobile\resources\views/backend/report.blade.php ENDPATH**/ ?>