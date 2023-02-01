
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia');?>
<?php $__env->startSection('content');?>
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
<div class="container" style="padding-top: 70px; padding-right: 0px ; padding-left: 0px; ">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">

                <div class="row ">

                    <div class="col-md-6">
                        <a class="my-0 font-weight-normal " style="font-size: 14px;"><b>Report Order Barang
                                (<?php echo e($kdbrng); ?>)</b></a>
                    </div>

                    <div class="col-md-6">
                        <a class="my-0 font-weight-normal " style="font-size: 14px;"><b><?php echo e($tanggalll); ?></b></a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form id="send_perioderpt" class="" action="<?php echo e(route('repot_ob')); ?>" method="GET">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" class="" name="dwnld_type" id="dwnld_type" />
                    <input type="hidden" name="kdotl" id="kdotl" value="<?php echo e($ikdoutlet); ?>">
                    <input type="hidden" name="kdakses" id="kdakses" value="<?php echo e($kdakses); ?>">
                    <input type="hidden" name="nip" id="nip" value="<?php echo e($nip); ?>">
                    <input type="hidden" name="kdoutlet" id="kdoutlet" value="<?php echo e($ikdoutlet); ?>">
                    <?php if ($kdakses != 'AVMS2'): ?>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black;">Outlet&nbsp;
                                &nbsp; : </span>
                        </div>

                        <select class="form-control form-control-sm " name="toglekdotl" id="toglekdotl"
                            onchange="pilihkdotl()">
                            <?php $__currentLoopData = $dfotl;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $otl): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                            <option value="<?php echo e($otl['kdoutlet']); ?>" <?php if ($ikdoutlet == $otl['kdoutlet']): ?> selected <?php endif;?>>
                                <?php echo e($otl['sngktotl']); ?> (<?php echo e($otl['kdoutlet']); ?>)
                            </option>
                            <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>
                        </select>
                    </div>
                    <?php endif;?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 14px; color:black;">Tanggal :
                            </span>
                        </div>

                        <input type="date" name="tanggal_ordbrg" id="tanggal_ordbrg" value="<?php echo e($itgl); ?>"
                            class="form-control date_now" style="font-size: 14px; color:black;" onchange="pilihkdotl()"
                            required>
                    </div>
                    <div class="form-group ">

                        <?php if (isset($detail)): ?>
                        <button class="btn btn-danger btn-lg col-md-3 mt-1 float-right mb-1" type="button"
                            onclick="periode_tgl('btn_pdf')"><i class="fa fa-file-pdf-o" title="Download PDF">
                                Export PDF</i></button>
                        <?php endif;?>
                    </div>

                </form>


                <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">

                            <?php if (isset($detail)): ?>
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
                                    <?php $__currentLoopData = $detail;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $arrydetail): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                                    <tr>
	                                        <td style="font-size: 12px !important;">
	                                            <?php echo e($loop->iteration); ?></td>
	                                        <td style="font-size: 12px !important;"><?php echo e($arrydetail['kdbarang']); ?> </td>
	                                        <td style="font-size: 12px !important;"><?php echo e($arrydetail['satuan']); ?> </td>
	                                        <td style="font-size: 12px !important;"><?php echo e($arrydetail['qty']); ?> </td>
	                                        <td style="font-size: 12px !important;">
	                                            <?php echo e(ucfirst(strtolower($arrydetail['nmbarang']))); ?></td>
	                                    </tr>
	                                    <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>
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
                            <?php else: ?>
                            <div class="text-center ">
                                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_evqse4gh.json"
                                    background="transparent" speed="1"
                                    style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                                </lottie-player>
                                 <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
</script>
<script>
    function pilihkdotl(){
var toglekdotl = $('#toglekdotl').val();
$('#kdotl').val(toglekdotl);
$('#dwnld_type').val('btn_periode');
$('#send_perioderpt').submit();
}
function periode_tgl(diklik){

var toglekdotl = $('#toglekdotl').val();
$('#kdotl').val(toglekdotl);
$('#dwnld_type').val(diklik);
$('#send_perioderpt').submit();
}
</script>

<?php $__env->stopSection();?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views//rptorderbrg/rptorderbrg.blade.php ENDPATH**/?>