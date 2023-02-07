<div class="modal slidein" id="detailtc" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="detailtcLabel" aria-hidden="true">
    <div class="modal-dialog modal-bottom">
        <div class="modal-content content-bottom">
            <div class="modal-header <?php echo e($bgcolor); ?> content-bottom">
                <input type="hidden" id="txtujuan">
                <input type="hidden" id="txmessage">
                <input type="hidden" id="tiket">
                <h5 class="modal-title">
                    <span id="detailtcLabel">Detail Tiket</span>
                    <input type="text" class="titlereq" readonly><i class="fa fa-copy fa-1x cps" onclick="copied()"></i>
                    <p class="kat pkat"></p>
                </h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <i class="fa fa-times-circle fa-lg tms"></i>
                </button>
            </div>
            <div class="modal-body body-bottom pt-0" id="isidetail">
            </div>

            <div>
                <button id="reminder" onclick="reminder()" type="button" class="btn <?php echo e($bgcolor); ?> bremind"><i
                        class="fa fa-phone" aria-hidden="true"></i>
                    Reminder</button>
                <button id="selesai" type="button" class="btn bselesai"><i class="fa fa-check"></i>
                    Selesai</button>
                <button id="terima" onclick="detterima()" type="button" class="btn <?php echo e($bgcolor); ?> prs"><i
                        class="fa fa-check-square-o"></i> Terima</button>
            </div>
        </div>
    </div>
</div><?php /**PATH G:\ChampApplication\xampp\htdocs\champs-mobile\resources\views/ticketing/modal/detailtick.blade.php ENDPATH**/ ?>