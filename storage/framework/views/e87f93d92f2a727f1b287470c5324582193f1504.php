
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('rptorderbrg.m_dwonldf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    .form-control{
        height: calc(0.8em + 0.75rem + 2px) !important;
        padding: 0rem 0.75rem;
        font-size: 12px !important;
    } 
    .input-group-text { 
        padding: 0rem 0.75rem !important;
    }
    table.dataTable thead th, table.dataTable thead td {
        padding: 3px 10px !important;
        border-bottom: 1px solid #ced4da;
        border-top: 1px solid #ced4da;
        background: #f1f1f1 !important;
        color: black !important;
    }
    table.dataTable tbody th, table.dataTable tbody td {
        /* padding: 6px 10px !important; */
    }
    .input-group-text { 
    background-color: #f1f1f1 !important;   
    }
    table.dataTable.no-footer {
    border-bottom: 1px solid #ced4da !important;
    }
    .btn-danger {
    color: #fff;
    background-color: #cc1a0b !important;
    border-color: #cc1a0b !important;
    } 
</style>
<div class="container" style="padding-top: 70px; padding-right: 0px ; padding-left: 0px; ">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">

                <div class="row ">

                    
                    
                    
                    <div class="col-md-6">
                        <a class="my-0 font-weight-normal " style="font-size: 12px;"><b>Report Order Barang
                                (<?php echo e($kdbrng); ?>)</b></a>
                    </div>

                    <div class="col-md-6">
                        <a class="my-0 font-weight-normal " style="font-size: 12px;"><b><?php echo e($tanggalll); ?></b></a>
                    </div>
                </div>
            </div>
            <div class="card-body" >

                <form id="send_perioderpt"  class="" action="<?php echo e(route('repot_ob')); ?>" method="GET">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" class="" name="dwnld_type" id="dwnld_type" />
                    <input type="hidden" name="kdotl" id="kdotl" value="<?php echo e($ikdoutlet); ?>">
                    <input type="hidden" name="kdakses" id="kdakses" value="<?php echo e($kdakses); ?>">
                    <input type="hidden" name="nip" id="nip" value="<?php echo e($nip); ?>">
                    <input type="hidden" name="kdoutlet" id="kdoutlet" value="<?php echo e($ikdoutlet); ?>">
                    <?php if($kdakses != 'AVMS2'): ?>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black; min-width: 115px;">Outlet</span>
                        </div>

                        <select class="form-control" name="toglekdotl" id="toglekdotl" onchange="pilihkdotl()">
                            <?php $__currentLoopData = $dfotl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($otl['kdoutlet']); ?>" <?php if($ikdoutlet==$otl['kdoutlet'] ): ?> selected <?php endif; ?>><?php echo e($otl['sngktotl']); ?> (<?php echo e($otl['kdoutlet']); ?>)
                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <?php endif; ?>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black; min-width: 115px;">Tanggal
                            </span>
                        </div>

                        <input type="date" name="tanggal_ordbrg" id="tanggal_ordbrg" value="<?php echo e($itgl); ?>"
                            class="form-control date_now" style="font-size: 12px; color:black;" onchange="pilihkdotl()"
                            required>
                    </div>
                    <?php if($jmlkdord > 1): ?>

                    <input type="hidden" name="txkdorgbrg" id="txkdorgbrg" value="<?php echo e($kdbrng); ?>">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black; min-width: 115px;">Pilih Kode Order
                            </span>
                        </div>
                        <select class="form-control" name="toglekdorgbrg" id="toglekdorgbrg" onchange="pilihkdorgbrg()">
                            <?php $__currentLoopData = $dfkdbrng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfbrg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($dfbrg['kdordbarang']); ?>" <?php if($kdbrng==$dfbrg['kdordbarang'] ): ?> selected
                                <?php endif; ?>><?php echo e($dfbrg['kdordbarang']); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <?php endif; ?>

                    <div class="form-group  mx-5">
                        <?php if(isset($detail)): ?>
                        <button class="btn btn-danger btn-sm col-md-3  float-right my-3" type="button"
                            onclick="periode_tgl('btn_pdf')"><i class="fa fa-file-pdf-o" title="Download PDF">
                                Export PDF</i></button>
                        <?php endif; ?>
                    </div>

                </form>

                
                <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">

                            <?php if(isset($detail)): ?>
                            <table id="tb_ordbrg" class="display nowrap " style="width:100%; ">
                                <thead>
                                    
                                    <tr>
                                        <th style="font-size: 12px !important">
                                            No.</th>
                                        <th style="font-size: 12px !important;">
                                            Kode</th>
                                        <th style="font-size: 12px !important;">
                                            Satuan</th>
                                        <th style="font-size: 12px !important;">
                                            Qty</th>
                                        <th style="font-size: 12px !important;">
                                            Nama</th>
                                        <th style="font-size: 12px !important;">
                                            Kode Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $dford; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrydetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="font-size: 12px !important;">
                                            <?php echo e($loop->iteration); ?></td>
                                        <td style="font-size: 12px !important;"><?php echo e($arrydetail['kdbarang']); ?> </td>
                                        <td style="font-size: 12px !important;"><?php echo e($arrydetail['satuan']); ?> </td>
                                        <td style="font-size: 12px !important;"><?php echo e($arrydetail['qty']); ?> </td>
                                        <td style="font-size: 12px !important;">
                                            <?php echo e(ucfirst(strtolower($arrydetail['nmbarang']))); ?></td>
                                        <td style="font-size: 12px !important;"><?php echo e($arrydetail['kdorderbarang']); ?> </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </tbody>
                            </table>
                            <?php else: ?>
                            <div class="text-center ">
                                <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>"
                                    background="transparent" speed="1"
                                    style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                                </lottie-player>
                                
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                            </div>
                            <?php endif; ?>
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

        function ii(){
            $('#kkk').attr('href','<?php echo e(asset("resource/img/logo.png")); ?>'); 
            // $('#kkk').attr('href','<?php echo e(asset('storage')); ?>/app/public/pdf/robots.txt'); 

            setTimeout(function(){ 
                    document.getElementById('kkk').click();
                }, 1000);
        }
        // ii();
</script>
<script>
    function pilihkdotl(){ 
    var toglekdotl = $('#toglekdotl').val();
    $('#kdotl').val(toglekdotl); 
    $('#dwnld_type').val('btn_periode');  
    $('#send_perioderpt').submit(); 
}
function pilihkdorgbrg(){ 
    var toglekdotl = $('#toglekdotl').val();
    $('#kdotl').val(toglekdotl); 
    $('#dwnld_type').val('btn_periode'); 
    var toglekdorgbrg = $('#toglekdorgbrg').val();
    $('#txkdorgbrg').val(toglekdorgbrg); 
    $('#send_perioderpt').submit();
}
function periode_tgl(diklik){
    
    loadingon();  
    setTimeout(hidee, 15000); 
        function hidee() {
            $('#loader').hide();
        }
            // 
    var toglekdotl = $('#toglekdotl').val();
    $('#kdotl').val(toglekdotl);  
    $('#dwnld_type').val(diklik);    
    $('#send_perioderpt').submit(); 
}
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout_presence', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/rptorderbrg/rptorderbrgf.blade.php ENDPATH**/ ?>