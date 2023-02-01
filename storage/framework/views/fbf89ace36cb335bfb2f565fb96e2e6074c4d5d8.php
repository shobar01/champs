
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>
<style>
    .btn-sm {
        padding: 5px;
    }

    .table-bordered td,
    .table-bordered th {
        padding-top: 0;
        padding-bottom: 0;
        font-size: 14px;
    }

    tr.detail-row {
        display: none
    }

    tr.detail-row.open {
        display: block;
        display: table-row;
        background-color: #febf014b;
    }

    tr.detail-row.open:hover {
        background-color: #FEBD01;
    }

    tr.detail-row>td {
        border-top: 3px solid #d1e1ea !important
    }
</style>

<div class="container-fluid" style="padding-top: 100px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Report Buku Tamu</h4>
            </div>
            <div class="card-body" style="padding-left: 0.5rem; padding-right: 0.5rem;">

                <div class="fw-container">

                    <div class="fw-body">

                        <div class="content">
                            <div class="input-group mb-3">
                                <input id=" " type="text" class="form-control" placeholder="Searching"
                                    aria-label="Search Anything here" aria-describedby="basic-addon2">
                                
                            </div>
                            <div class="table-responsive">
                                <table id="tb_rptbukutamu" class="display nowrap table table-striped table-bordered"
                                    style="width:100%;">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Daftar Tamu</th>
                                            <th>Kode Outlet</th>
                                            <th>Nama Outlet</th>
                                            <th>Area</th>
                                            <th>Tanggal</th>
                                            <th>Total Pengunjung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $dfrbyOutlet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center">
                                                <div class="action-buttons">
                                                    <a href="#" class="green bigger-140 show-details-btn"
                                                        title="Show Details">
                                                        <i class="ace-icon fa fa-angle-double-down"
                                                            style="color:green;"></i>
                                                        <span class="sr-only">Details</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center"><?php echo e($otl['KdOutlet']); ?></td>
                                            <td><?php echo e($otl['NmOutlet']); ?></td>
                                            <td><?php echo e($otl['Area']); ?></td>
                                            <td><?php echo e($otl['Tanggal']); ?></td>
                                            <td><?php echo e($otl['TotalPengunjung']); ?></td>
                                        </tr>
                                        <tr class="detail-row">
                                            <td colspan="12">
                                                <div class="table-detail" style="padding-top: 5px;">
                                                    <table class="table table-striped table-bordered"
                                                        style="width:100%;">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th>No. Hp</th>
                                                                <th>Nama</th>
                                                                <th>Datang</th>
                                                                <th>Pulang</th>
                                                                <th>JmlOrang</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $otl['DaftarTamu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($detail['NoHp']); ?></td>
                                                                <td><?php echo e($detail['Nama']); ?></td>
                                                                <td><?php echo e($detail['Datang']); ?></td>
                                                                <td><?php echo e($detail['Pulang']); ?></td>
                                                                <td><?php echo e($detail['JmlOrang']); ?></td>
                                                            </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function btn_detrpt(isi) { 
        // alert(isi);
        
        $('#modal_detrpt').modal('show');
        document.getElementById('modal_detrpt').style.display = 'block';  
        
        $('#lbl_tgl').html(isi);
        // When the user clicks anywhere outside of the modal, close it


    }
 
</script>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//bukutamu/rptbukutamu.blade.php ENDPATH**/ ?>