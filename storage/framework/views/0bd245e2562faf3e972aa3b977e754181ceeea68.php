<div class="modal slidein" id="detailtc" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="detailtcLabel" aria-hidden="true">
    <div class="modal-dialog modal-bottom">
        <div class="modal-content content-bottom">
            <div class="modal-header <?php echo e($bgcolor); ?> content-bottom">
                <h5 class="modal-title">
                    <span id="detailtcLabel">BE Detail Tiket</span>
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
                <button id="proses" onclick="proses()" type="button" class="btn <?php echo e($bgcolor); ?> prs"><i
                        class="fa fa-history"></i> Proses</button>
            </div>


        </div>
    </div>
</div><?php /**PATH G:\ChampApplication\xampp\htdocs\champs-mobile\resources\views/backend/modal/detailtick.blade.php ENDPATH**/ ?>