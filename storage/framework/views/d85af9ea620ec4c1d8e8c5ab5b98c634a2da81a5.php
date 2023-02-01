
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('rptorderbrg.m_dwonld', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
</style>




<div class="container" style="padding-top: 100px; padding-right: 0px ; padding-left: 0px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>Report Order Barang (<?php echo e($kdbrng); ?>)</b></a>
            </div>
            <div class="card-body">

                <form id="send_perioderpt" class="" action="<?php echo e(URL::to('rptord_periode')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="text" class="" name="perid_tgl" id="perid_tgl" />
                    <input type="text" class="" name="perid_kdotl" id="perid_kdotl" />
                    <input type="text" class="" name="dwnld_type" id="dwnld_type" />
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black;">Outlet&nbsp;
                                &nbsp; : </span>
                        </div>
                        <select class="form-control " id="slct_kdotl" data-live-search="true" required>
                            <option value="MSJ01" style="font-size: 14px; color:black;">MSJ01</option>
                            
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black;">Tanggal : </span>
                        </div>
                        <input type="date" name="tanggal_ordbrg " id="tanggal_ordbrg" value="<?php echo e($tanggals); ?>"
                            class="form-control date_now" style="font-size: 14px; color:black;" required>
                    </div>

                    <div class="row" style="margin-bottom: 10px;">

                        <div class="col-12 justify-content-end d-flex">
                            <button class="btn btn-primary btn-lg btn-block" type="submit"
                                onclick="periode_tgl('btn_periode')"
                                style="font-size: 14px; color:white;"><b>Periode</b></button>
                        </div>

                    </div>
                    <hr style="border-top: 1px solid #111 !important;">

                    
                    <div class="fw-container" style="margin-top: 1%;">
                        <div class="fw-body">
                            <div class="content">

                                <div class="input-group" style="margin-bottom: 10px;">
                                    <span class="input-group-text form-control"
                                        style="font-size: 14px; color:black;"><b>Download</b></span>
                                    
                                    <div class="input-group-append">
                                        <button class="btn btn-danger" style="font-size: 14px; color:white;"
                                            type="button" onclick="periode_tgl('btn_pdf')"><i class="fa fa-file-pdf-o"
                                                title="Download PDF">
                                                PDF</i></button>
                                        <button class="btn btn-success" style="font-size: 14px; color:white;"
                                            type="button" onclick="periode_tgl('btn_excel')"><i
                                                class="fa fa-file-excel-o" title="Download Excel">
                                                Excel</i></button>
                                    </div>
                                </div>

                </form>

                <div class="input-group mb-3">
                    <input id="search_ordbrg" type="text" class="form-control" placeholder="Searching"
                        aria-label="Search" aria-describedby="basic-addon2" style="font-size: 14px; color:black;">
                </div>

                <table id="tb_ordbrg" class="display nowrap " style="width:100%; ">
                    <thead>
                        
                        <tr>
                            <th style="border-top: 1px solid #111 !important; font-size: 12px !important">
                                No.</th>
                            <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                Kode</th>
                            <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                Satuan</th>
                            <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                Qty</th>
                            <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrydetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="font-size: 12px !important;">
                                <?php echo e($loop->iteration); ?></td>
                            <td style="font-size: 12px !important;"><?php echo e($arrydetail['kdbarang']); ?> </td>
                            <td style="font-size: 12px !important;"><?php echo e($arrydetail['satuan']); ?> </td>
                            <td style="font-size: 12px !important;"><?php echo e($arrydetail['qty']); ?> </td>
                            <td style="font-size: 12px !important;">
                                <?php echo e(ucfirst(strtolower($arrydetail['nmbarang']))); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tfoot>
                        <tr>
                            <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                No.</th>
                            <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                Kode</th>
                            <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                Satuan</th>
                            <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                Qty</th>
                            <th style="border-top: 1px solid #111 !important; font-size: 12px !important;">
                                Nama</th>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>

</div>
</div>
<script>
    function periode_tgl(diklik){
    var sValOtl = $("#slct_kdotl option:selected").val();   
    var sValTgl = $('#tanggal_ordbrg').val()
        $('#loader').show(); 
        $('#perid_kdotl').val(sValOtl); 
        $('#perid_tgl').val(sValTgl)
        $('#dwnld_type').val(diklik);
        $('#send_perioderpt').submit();
    }
</script>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//rptorderbrg/rptorderbrg.blade.php ENDPATH**/ ?>