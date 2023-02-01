<div class="modal fade" id="detailnoorder_tab" tabindex="-1" role="dialog" aria-labelledby="detailnoorderLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content color-card">
            <div class="modal-header pb-0">
                <h5 style="font-weight:bold; padding:0;">Detail TRANSAKSI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <?php $__currentLoopData = $json['daftarjual']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="tab-pane fade" id="<?php echo e($jual['noorder']); ?>" role="tabpanel"
                            aria-labelledby="nav<?php echo e($jual['noorder']); ?>">
                            <div class="card" style="height:100px;">
                                <div class="card-header" style="border-radius:12px;font-weight:bold">
                                    Detail Transaksi</div>
                                <div class="card-body" style="border-radius:12px;height:100px;overflow-y:hidden">
                                    <div class="table-responsive">
                                        <table class="table" width="100%">
                                            <tr>
                                                <th>No. Order / No. Meja</th>
                                                <th>:</th>
                                                <th><?php echo e($jual['noorder']); ?></th>
                                            </tr>
                                            <tr>
                                                <th>Tgl. Posting</th>
                                                <th>:</th>
                                                <th><?php echo e($jual['tglposting']); ?></th>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Customer</th>
                                                <th>:</th>
                                                <th><?php echo e($jual['jmcu']); ?> Orang</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card" style="border-radius:12px;">
                                <div class="card-body" style="border-radius:12px;">
                                    <div class="scroll-2" style="height:125px;overflow-y:scroll;overflow-x:hidden;">
                                        <table class="table" width="100%" style="">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">MENU</th>
                                                    <th scope="col">QTY</th>
                                                    <th scope="col">HARGA</th>
                                                    <th scope="col">TOTAL</th>
                                                    <th scope="col">T</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $jual['jualdet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($det['nmmenu']); ?></td>
                                                    <td><?php echo e($det['qtyjual']); ?></td>
                                                    <td><?php echo e(number_format($det['harga'], 0, '', '.')); ?></td>
                                                    <td><?php echo e(number_format($det['harga']*$det['qtyjual'], 0, '', '.')); ?>

                                                    </td>
                                                    <td><?php echo e($det['tipejual']); ?></td>
                                                </tr>
                                                <?php if($det['modifier'] != null): ?>
                                                <tr>
                                                    <td colspan="3"><?php echo e($det['nmmenu']); ?></td>
                                                    <td><?php echo e(number_format($det['harga'], 0, '', '.')); ?></td>
                                                    <td></td>
                                                </tr>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="height:5px;"></div>
                                    <div class="card" id="hi-right" style="height:100px;">
                                        <div class="card-body">
                                            <div class="form-group text-white">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group text-center">
                                                            <label class="text-white" for="subtotal1">SUBTOTAL</label>
                                                            <input class="form-control black text-center"
                                                                name="subtotal1" id="subtotalbayar" readonly
                                                                style="font-weight:bold;">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group text-center">
                                                            <label class="text-white" for="service">SERVICE</label>
                                                            <input class="form-control black text-center" name="service"
                                                                id="servicebayar" readonly style="font-weight:bold;">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group text-center">
                                                            <label class="text-white" for="taxes">TAX</label>
                                                            <input class="form-control black text-center" name="taxes"
                                                                id="taxbayar" readonly style="font-weight:bold;">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group text-center">
                                                            <label class="text-white" for="tot_penjualan">TOTAL</label>
                                                            <input class="form-control black text-center"
                                                                name="tot_penjualan" id="totalbayar" readonly
                                                                style="font-weight:bold;"
                                                                value="<?php echo e(number_format($jual['jmtotal'], 0, '', '.')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/dfr_mobile/modal/detaildfr/noorderdet.blade.php ENDPATH**/ ?>