<div class="modal fade" id="hist" tabindex="-1" aria-labelledby="histLabel" aria-hidden="true" data-backdrop="static"
    data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px">
            <button type="button" class="btn btn-block btn-head">History Approval - <span id="ttltgl"></span>
                <i class="fa fa-times-circle fa-2x closemod" data-dismiss="modal"
                    style="right: 5px;top: 2px;color: #000000;"></i>
            </button>
            <div class="modal-body p-3 text-center tbr">
                <div class="loading2" id=""></div>
                <input type="hidden" id="tanggalhist" value="<?php echo e(date('Y-m-d')); ?>">
                
                <div id="accordion"></div>

                <div class="pilihan">
                    <button class="btn date-hist shadow" type="button" id="date-hist" onclick="bukatglhist()"><i
                            class="fa fa-calendar"></i> Pilih Tanggal</button>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/addmenu/hist.blade.php ENDPATH**/ ?>