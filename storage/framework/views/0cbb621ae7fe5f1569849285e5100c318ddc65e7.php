
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
                <h4 class="my-0 font-weight-normal" style="font-size: 14px;"><b>Hasil Stock Take</b></h4>
            </div>
            <div class="card-body" style="padding : 0.55rem !important;">
                <div class="col-md-12" style="padding : 0;">
                    <form action="<?php echo e(route('rptstkcc')); ?>" method="GET" id="formotl"
                        style="margin-bottom: 3px !important;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; color:black; min-width: 80px;">Outlet
                                </span>
                            </div>

                            <input type="hidden" name="kdotl" id="kdotl" value="<?php echo e($kdotl); ?>">
                            <select class="form-control form-control-sm " name="toglekdotl" id="toglekdotl"
                                onchange="pilihkdotl()">
                                <?php $__currentLoopData = $dfotl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($otl['kdoutlet']); ?>" <?php if($kdotl==$otl['kdoutlet'] ): ?> selected <?php endif; ?>>
                                    <?php echo e($otl['sngktotl']); ?> (<?php echo e($otl['kdoutlet']); ?>)
                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"
                                        style="font-size: 14px; color:black; min-width: 80px;">Tanggal</span>
                                </div>
                                <input type="date" name="tgl" id="tgl" value="<?php echo e($tgl); ?>" class="form-control date_now"
                                    style="font-size: 14px; color:black;" onchange="pilihkdotl()" required>
                            </div>
                        </div>
                    </form>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black; min-width: 80px;">Oleh
                            </span>
                        </div>
                        <input class="form-control form-control-sm " type="text" value="<?php echo e($nama); ?> (<?php echo e($nip); ?>)"
                            style="font-size: 14px; color:black;" readonly>
                    </div>
                </div>
                
                <div class=" fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">
                            <div class="input-group mb-3">
                                <input id="search_cogs" type="text" class="form-control" placeholder="Searching"
                                    aria-label="Search" aria-describedby="basic-addon2">
                            </div>

                            <div class="table-responsive" style="overflow-x: hidden">

                                <div class="table-responsive" style="overflow-y: hidden;">
                                    <table id="tblcogs" class="table table-striped table-bordered"
                                        style="min-width: 60% !important;">
                                        <thead>
                                            <tr>
                                                <th class="ftsize12l xxx" style="width: 50% !important;">Nama Barang
                                                </th>
                                                <th class="ftsize12" style="width: 10% !important;">Kode</th>
                                                <th class="ftsize12" tyle="width: 10% !important;">Jumlah</th>
                                                <th class="ftsize12" style="width: 10% !important;">Satuan</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbcogs">
                                            <?php if(isset($dftr_hsl)): ?>
                                            <?php $__currentLoopData = $dftr_hsl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td class="ftsize12l aaa">
                                                    <?php echo e(ucwords(strtolower( $dfh['nmbarang']))); ?>

                                                <td class="ftsize12l "><?php echo e($dfh['kdbarang']); ?></td>
                                                </td>
                                                <td class="ftsize12r">
                                                    <?php echo e(number_format( $dfh['jmladjcc'], 0, '', '.')); ?>

                                                </td>
                                                <td class="ftsize12r"><?php echo e($dfh['satuan']); ?>

                                                </td>
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
        </div>

    </div>
</div>
<script type="text/javascript">
    $.ajax({
        //other parameters
        success: function () {
            
        $('#id_footerr').addClass('fixed-bottom'); 
        }
        }); 
</script>
<script>
    function pilihkdotl(){ 
            var toglekdotl = $('#toglekdotl').val();
            $('#kdotl').val(toglekdotl); 
            $('#formotl').submit();
        }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//rptstocktake/hasilstkcc.blade.php ENDPATH**/ ?>