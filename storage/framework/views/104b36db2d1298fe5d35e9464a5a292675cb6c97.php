<style>
    .btn-bukti {
        position: inherit;
        color: white;
        border-radius: 12px;
    }

    .bukti {
        right: 15px;
        background: #495057;
    }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 52px;">
            <div class="modal-header">
                <h5 class="modal-title-req" id="exampleModalLabel">Request Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('simpan_ticketing')); ?>" method="POST" id="simpan_ticket">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Pilih Tujuan</label>
                        <select class="form-control" name="tujuan" id="idtujuantck" onchange="calldept()">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori" disabled>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pesan</label>
                        <textarea onkeyup="reg('pesan')" class="form-control" placeholder="Tulis pesan" name="pesan"
                            id="pesan" disabled></textarea>
                        <span id="errorpesan" style="color:red; font-weight:bold; font-size: 10px;"></span>
                        <div class="modal-footer" style="justify-content: space-between;">
                            <img src="" id="cthfoto" name="cthfoto" style="width: 50px;" onclick="tfoto()">
                            <input type="hidden" name="idfoto" id="idfoto">
                            <button disabled type="button" class="btn btn-bukti bukti" name="bukti" id="bukti"
                                onclick="bukafoto()"><i class="fa fa-camera"></i>
                                Ambil Foto</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Kategori Level <i class="fa fa-question-circle fa-lg"
                                style="color:rgb(5, 167, 167)" onclick="info()"></i></label>
                        <ul class="kurir-now text-center mt-0">
                            <li>
                                <input type="radio" id="levellow" name="level" class="levelx" value="A" hidden checked
                                    disabled>
                                <label class="ebel1" for="levellow" style="font-weight: bold; ">LOW</label>
                            </li>
                            <li>
                                <input type="radio" id="levelmid" name="level" class="levelx" value="B" hidden disabled>
                                <label class="ebel2" for="levelmid" style="font-weight: bold; ">MIDDLE</label>
                            </li>
                            <li>
                                <input type="radio" id="levelnow" name="level" class="levelx" value="C" hidden disabled>
                                <label class="ebel3" for="levelnow" style="font-weight: bold;  ">NOW</label>
                            </li>
                        </ul>
                    </div>
                </form>
                <div class="text-center" style="display: flex">
                    <button type="submit" class="btn btn-block btn-danger m-1" id="simpanreq" disabled
                        onclick="validasi()" style="background:linear-gradient(#0dbb35,#1da73d);font-weight:bold;"><i
                            class="fa fa-paper-plane"></i> Kirim
                        Request</button>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/backend/modal/addreq.blade.php ENDPATH**/ ?>