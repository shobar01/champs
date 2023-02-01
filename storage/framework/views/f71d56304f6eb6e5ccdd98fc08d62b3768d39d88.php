<div class="modal fade" id="modal_detrpt" role="dialog" aria-labelledby="ModalDetRpt" aria-hidden="true">

    <!--        <div class="vertical-align-center container">-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="lbl_tgl"></h4>

                <button id="btn_doneclose" type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <!--                    <div id="result"> </div>-->
            </div>
            <div class="modal-body">
                <table id="tb_rptbukutamudetail" class="display nowrap " style="width:100%">
                    <thead>
                        <tr>
                            <th style="border-top: 1px solid #111 !important;">No. Hp</th>
                            <th style="border-top: 1px solid #111 !important;">Nama</th>
                            <th style="border-top: 1px solid #111 !important;">Datang</th>
                            <th style="border-top: 1px solid #111 !important;">Pulang</th>
                            <th style="border-top: 1px solid #111 !important;">JmlOrang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $dfrbyOutlet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrybyotl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($arrybyotl['Tanggal'] == '28 March 2021'
                        && $arrybyotl['KdOutlet'] == 'RCJ07'): ?>
                        <?php $__currentLoopData = $arrybyotl['DaftarTamu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($detail['NoHp']); ?></td>
                            <td><?php echo e($detail['Nama']); ?></td>
                            <td><?php echo e($detail['Datang']); ?></td>
                            <td><?php echo e($detail['Pulang']); ?></td>
                            <td><?php echo e($detail['JmlOrang']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/bukutamu/m_detailrpt.blade.php ENDPATH**/ ?>