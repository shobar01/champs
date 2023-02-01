<div class="modal slidein" id="prosesbe" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="detailtcLabel" aria-hidden="true">
    <div class="modal-dialog modal-bottom">
        <div class="modal-content content-bottom">
            <div class="modal-header <?php echo e($bgcolor); ?> content-bottom">
                <h5 class="modal-title">
                    <span id="detailtcLabel"><?php echo e($nmstatus); ?></span>
                    <input type="text" class="titlereq" readonly><i class="fa fa-copy fa-1x cps" onclick="copied()"></i>
                    <p class="kat pkat"></p>
                </h5>
                <button type="button" class="close" aria-label="Close" onclick="closeproses()">
                    <i class="fa fa-times-circle fa-lg tms"></i>
                </button>
            </div>
            <div class="modal-body body-bottom pt-2" id="backendp">
                <form action="<?php echo e(route('simpan_ubahstatus')); ?>" method="POST" id="simpanstatus">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="kdticket" id="kdticketku" value="">
                    <input type="hidden" name="nipreq" id="nipreq" value="">
                    <input type="hidden" name="nmstatus" id="nmstatus" value="">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Ubah Status</label>
                        <select class="form-control" name="ubahstatus" id="ubahstatus" onchange="cekproses()">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kategori</label>
                        <select class="form-control" name="kategoribe" id="kategoribe">
                            <?php $__currentLoopData = $lskat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kateg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($kateg['kdkat']); ?>" id="kt<?php echo e($kateg['kdkat']); ?>">
                                <?php echo e($kateg['nmkat']); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Keterangan</label>
                        <textarea onkeyup="reg('ket')" class="form-control" placeholder="Isi Keterangan" name="ket"
                            id="ket" rows="3">
                        </textarea>
                        <textarea onkeyup="reg('ket')" class="form-control" placeholder="Isi Keterangan1" name="ket1"
                            id="ket1" rows="3">
                        </textarea>

                        </textarea>
                        <span id="error" class="err"></span>
                        <div class="modal-footer" style="justify-content: space-between;">
                            <img id="cthfoto2" class="imgc none" onclick="tfoto2()">
                            <input type="hidden" name="backendfoto" id="backendfoto" />
                        </div>
                    </div>


                    <div>
                        <button id="status" type="button" class="btn btn-cepmek cepmek1 <?php echo e($bgcolor); ?>"
                            onclick="simpanstat()"><i class="fa fa-plus"></i> Simpan</button>
                    </div>
                    <div>
                        <button onclick="bukafoto()" type="button" class="btn btn-cepmek cepmek2"><i
                                class="fa fa-camera"></i> Ambil Foto</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/backend/modal/proses.blade.php ENDPATH**/ ?>