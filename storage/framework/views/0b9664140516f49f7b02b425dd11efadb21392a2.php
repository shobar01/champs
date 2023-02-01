
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
        border-top: 3px solid #d1e1ea !important;
    }

    .aaa:not([scope=row]) {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 2;
        background-color: #e9ecef;

        /*white-space: nowrap;*/
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100px;
        height: 35px;
        vertical-align: middle;
    }

    .aaa2:not([scope=row]) {
        position: -webkit-sticky;
        position: sticky;
        left: 50px;
        z-index: 2;
        background-color: #fff;
    }

    #tabel_dt_length {
        display: none;
    }

    #tblcogs_filter {
        float: right;
        margin-top: -25px;
        margin-bottom: 10px;
    }

    #tblcogs_filter {
        position: absolute;
        right: 0;
        margin-top: -40px;
        padding-right: 40px;
    }

    .table-bordered thead th.xxx {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 2;
        background-color: #e9ecef;
    }

    .table-bordered thead th.xxx2 {
        position: -webkit-sticky;
        position: sticky;
        left: 50px;
        z-index: 2;
        background-color: #fff;
    }

    .red {
        background-color: rgba(253, 204, 204, 0.808);
        font-weight: bold;
        font-size: 12px !important;
        padding: 5px 0 5px 0 !important;
        text-align: center;
        vertical-align: middle !important;
        width: 40px
    }

    .blue {
        background-color: #3f87ca57;
        font-weight: bold;
        font-size: 12px !important;
        padding: 5px 0 5px 0 !important;
        text-align: center;
        vertical-align: middle !important;
    }

    .orange {
        background-color: #eca02e57;
        font-weight: bold;
        font-size: 12px !important;
        padding: 5px 0 5px 0 !important;
        text-align: center;
        vertical-align: middle !important;
    }

    .cs {
        font-weight: bold;
    }

    .fsize {
        font-size: 12px !important;
    }

    .ftsize12 {
        font-size: 12px !important;
        background-color: rgba(0, 0, 0, .03);
        padding: 5px 0 5px 0 !important;
        text-align: center;
    }

    .ftsize12l {
        font-size: 12px !important;
        padding: 5px 3px 5px 3px !important;
        text-align: left;
    }

    .ftsize12r {
        font-size: 12px !important;
        padding: 5px 3px 5px 3px !important;
        text-align: right;
        vertical-align: middle !important;
    }

    .thkuning {
        font-size: 12px !important;
        padding: 5px 0 5px 0 !important;
        background: #FEBD01;
    }
</style>
<div class="container" style="padding: 100px 0 0 0;">
    <div class="card-deck mb-3 ">
        <div class="card mb-12 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal" style="font-size: 14px;"><b>Import Hasil Stock Take </b></h4>
            </div>
            <form action="<?php echo e(route('simpanimprt')); ?>" method="POST" id="formotl" style="margin-bottom: 3px !important;"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-body" style="padding : 0.55rem !important;">
                    <div class="col-md-12" style="padding : 0;">


                        <?php if(isset($nmotl)): ?>
                        <div class="input-group">
                            <div class="input-group-prepend ">
                                <span class="input-group-text font-weight-bold" id="basic-addon3"
                                    style="font-size: 14px; color:black; min-width: 80px; ">Outlet
                                </span>
                            </div>
                            <input class="form-control form-control-sm  font-weight-bold" type="text"
                                value="<?php if(isset($kdotl)): ?><?php echo e($nmotl); ?> (<?php echo e($kdotl); ?>)<?php endif; ?>"
                                style="font-size: 14px; color:black;" readonly>
                            <input id="tx_kdotl" name="tx_kdotl" class="form-control form-control-sm  font-weight-bold"
                                type="hidden" value="<?php if(isset($kdotl)): ?><?php echo e($kdotl); ?><?php endif; ?>"
                                style="font-size: 14px; color:black;" readonly>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold" id="basic-addon3"
                                    style="font-size: 14px; color:black; min-width: 80px;">Tanggal
                                </span>
                            </div>
                            <input id="tx_tgl" name="tx_tgl" class="form-control form-control-sm font-weight-bold "
                                type="text" value="<?php if(isset($tanggal)): ?><?php echo e($tanggal); ?> <?php endif; ?>"
                                style="font-size: 14px; color:black;" readonly>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold" id="basic-addon3"
                                    style="font-size: 14px; color:black; min-width: 80px;">Oleh
                                </span>
                            </div>
                            <input id="tx_nip" name="tx_nip" class="form-control form-control-sm font-weight-bold "
                                type="hidden" value="<?php if(isset($nip)): ?><?php echo e($nip); ?><?php endif; ?>"
                                style="font-size: 14px; color:black;" readonly>
                            <input id="tx_nmnip" name="tx_nmnip" class="form-control form-control-sm font-weight-bold "
                                type="text" value="<?php if(isset($nama)): ?><?php echo e($nama); ?> (<?php echo e($nip); ?>)<?php endif; ?>"
                                style="font-size: 14px; color:black;" readonly>
                        </div>
                        <?php endif; ?>

                        <div class="form-group mt-1">
                            <button type="button" data-toggle="modal" data-target="#import"
                                class="btn btn-success btn-lg col-md-3 mt-1 float-right"><i class="fa fa-file-excel-o"
                                    title="Download Excel">
                                    Import Excel</i></button>
                            <?php if(isset($nmotl)): ?>
                            <button class="btn btn-primary btn-lg col-md-3 mt-1 float-right" type="button"
                                onclick="simpankeserver()"><i class="fa fa-save" title="Download Excel">
                                    Simpan</i></button>
                            <?php endif; ?>
                        </div>

                    </div>
                    
                    <div class=" fw-container" style="margin-top: 1%;">
                        <div class="fw-body">
                            <div class="content">
                                <div class="input-group mb-3">
                                    <input type="hidden" class="form-control" placeholder="Searching"
                                        aria-label="Search" aria-describedby="basic-addon2">
                                </div>

                                <div class="table-responsive" style="overflow-x: hidden">

                                    <div class="table-responsive" style="overflow-y: hidden;">
                                        <table id="tblcogs" class="table table-striped table-bordered"
                                            style="min-width: 60% !important;">
                                            <thead>
                                                <tr>
                                                    <th class="ftsize12l xxx" style="width: 5% !important;">No.
                                                    </th>
                                                    <th class="ftsize12l xxx" style="width: 50% !important;">Nama Barang
                                                    </th>
                                                    <th class="ftsize12" style="width: 10% !important;">Kode</th>
                                                    <th class="ftsize12" tyle="width: 10% !important;">Satuan</th>

                                                    <th class="ftsize12" style="width: 10% !important;">Jumlah</th>

                                                </tr>
                                            </thead>
                                            <tbody id="tbcogs">
                                                <?php if(isset($hasilimprt)): ?>
                                                <?php $__currentLoopData = $hasilimprt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <?php if( is_numeric($dfh[0]) == true ): ?> <td class="ftsize12l aaa">
                                                        <input type="hidden" id='urutan<?php echo e($dfh[0]); ?>' name="urutan[]"
                                                            value="<?php echo e($dfh[0]); ?>">
                                                        <?php echo e($dfh[0]); ?>

                                                    </td>
                                                    <td class="ftsize12l aaa">
                                                        <?php echo e(ucwords(strtolower($dfh[2]))); ?>

                                                    </td>
                                                    <td class="ftsize12l "> <input type="hidden" id='kdbrg<?php echo e($dfh[1]); ?>'
                                                            name="kdbrg[]" value="<?php echo e($dfh[1]); ?>"><?php echo e($dfh[1]); ?></td>
                                                    </td>
                                                    <td class="ftsize12l ">
                                                        <input type="hidden" id='satuan<?php echo e($dfh[3]); ?>' name="satuan[]"
                                                            value="<?php echo e($dfh[3]); ?>"><?php echo e($dfh[3]); ?>

                                                    </td>
                                                    </td>
                                                    <td class="ftsize12l ">
                                                        <input type="hidden" id='jumlah<?php echo e($dfh[4]); ?>' name="jumlah[]"
                                                            value="<?php echo e($dfh[4]); ?>"><?php echo e($dfh[4]); ?>

                                                    </td>
                                                    </td>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- modal -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">IMPORT DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('importstkcc')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>PILIH FILE</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">IMPORT</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function simpankeserver(){ 
        Swal.fire({
            text: "Apakah anda yakin akan menyimpannya?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            cancelButtonText: "Tidak",
            confirmButtonText: 'Ya, Simpan!' ,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed)
        { 
            event.preventDefault(); 
        
            $('#tx_submit').val('T'); 
            $('#formotl').submit() 
        }
    })
        
        } 
</script>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//rptstocktake/imprt_stckcc.blade.php ENDPATH**/ ?>