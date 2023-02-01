
<div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 52px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Pilih Tujuan</label>
                        <select class="form-control" id="idtujuantck" onchange="calldept()">
                            <?php $__currentLoopData = $piltujuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tujuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tujuan['kddept']); ?>" id="tuj<?php echo e($tujuan['kddept']); ?>"><?php echo e($tujuan['iddept']); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori" disabled>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pesan</label>
                        <textarea onkeyup="reg('pesan')" class="form-control" name="pesan" id="pesan"
                            disabled></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori Level <i class="fa fa-question-circle fa-lg"
                                style="color:rgb(5, 167, 167)" onclick="info()"></i></label>
                        <ul class="kurir-now text-center mt-0">
                            <li>
                                <input type="radio" id="levellow" name="level" class="levelx" value="T" hidden checked
                                    disabled>
                                <label class="ebel1" for="levellow" style="font-weight: bold; ">LOW</label>
                            </li>
                            <li>
                                <input type="radio" id="levelmid" name="level" class="levelx" value="T" hidden disabled>
                                <label class="ebel2" for="levelmid" style="font-weight: bold; ">MIDDLE</label>
                            </li>
                            <li>
                                <input type="radio" id="levelnow" name="level" class="levelx" value="T" hidden disabled>
                                <label class="ebel3" for="levelnow" style="font-weight: bold;  ">NOW</label>
                            </li>
                        </ul>
                    </div>
                </form>
                <div class="text-center" style="display: flex">
                    
                    <button type="button" class="btn btn-block btn-danger m-1" id="simpanreq" disabled
                        onclick="simpanreqq()" style="background:linear-gradient(#0dbb35,#1da73d);font-weight:bold;"><i
                            class="fa fa-paper-plane"></i>Simpan
                        Request</button>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/ticketing/modal/addreq.blade.php ENDPATH**/ ?>