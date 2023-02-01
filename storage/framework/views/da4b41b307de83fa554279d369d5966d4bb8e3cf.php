
<div class="modal fade" id="detailtc" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="detailtcLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header header_ict">
                <h5 class="modal-title" id="detailtcLabel">ICT-221101-4EV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" onclick="note('note_menunggu')">
                    <div class="col-3 m-auto" style="font-size:9px">07 Nov 2022 15:57</div>
                    <div class="col-2 m-auto" style="margin-top:0!important;margin-bottom:0!important;"><img
                            src="<?php echo e(asset('public/resource/img/ticketing/mp.png')); ?>" width="70px"
                            style="margin-top:-10px;max-width:125%;"></div>
                    <div class="col-7">
                        <p class="m-0" style="font-size:12px; font-weight: bold;">Menunggu Di Proses </p>
                        <p class="m-0" style="font-size:11px">Ada 1 Kabel....</p>
                        <hr class="m-0">
                        <span style="font-size:9px">Request By :</span>
                        <br><br>
                    </div>
                </div>
                <div class="row" onclick="note('note_proses')">
                    <div class="col-3 m-auto" style="font-size:9px">07 Nov 2022 15:57</div>
                    <div class="col-2 m-auto" style="margin-top:0!important;margin-bottom:0!important;"><img
                            src="<?php echo e(asset('public/resource/img/ticketing/pr.png')); ?>" width="70px"
                            style="margin-top:-10px;max-width:125%;"></div>
                    <div class="col-7">
                        <p class="m-0" style="font-size:12px; font-weight: bold;">Sedang Di Proses </p>
                        <p style="font-size:11px">PC sudah rusak bagian....</p>
                        <hr class="m-0">
                        <span style="font-size:9px">Follow Up By :</span>
                        <br><br>
                    </div>
                </div>
                <div class="row" onclick="note('note_selesai')">
                    <div class="col-3 m-auto" style="font-size:9px">07 Nov 2022 15:57</div>
                    <div class="col-2 m-auto" style="margin-top:0!important;margin-bottom:0!important;"><img
                            src="<?php echo e(asset('public/resource/img/ticketing/sll.png')); ?>" width="70px"
                            style="margin-top:-18px;max-width:125%;"></div>
                    <div class="col-7">
                        <p class="m-0" style="font-size:12px; font-weight: bold;">Selesai</p>
                        <p style="font-size:11px">Terima kasih telah membuat....</p>
                        <hr class="m-0">
                        <span style="font-size:9px">Follow Up By :</span>
                    </div>
                </div>
            </div>
            <div class="text-center" style="display: flex">
                <button type="button" class="btn btn-block m-2" onclick="next()"
                    style="background: red; color: white">LANJUTKAN</button>
                <button type="button" class="btn btn-block btn-success m-2" style="background: #0dbb35;"
                    onclick="rate()">SELESAI</button>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/ticketing/modal/detail.blade.php ENDPATH**/ ?>