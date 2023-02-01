<!-- Modalmastermenu -->
<div class="modal fade" id="menuterjual" tabindex="-1" role="dialog" aria-labelledby="menuterjualLabel"
    aria-hidden="true" style="margin-top: 70px;">
    <div class="modal-dialog w3-animate-bottom fixed-bottom m-0" role="document" style="margin-top: 100px !important;">
        <div class="modal-content color-card">
            <div class="modal-header ">
                <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>Daftar Menu/Modifier<br> Terjual Tgl.
                        <?php echo e($tanggal); ?></b></a>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times;</span>
                </button>
            </div>
            <div class="modal-body pt-0 pb-0">
                <div class="col pr-1 pl-1 mt-2">

                    <div class="card" style="border-radius:12px; ">
                        <div class="ftsize12"
                            style="border-radius:14px; font-size: 16px !important; color:white; background:#cc1a0b; height: 30px;">
                            <b>Menu
                                Terjual</b>
                        </div>
                        <ul id="tablemmenu"
                            style="overflow-x: hidden; height: 350px; list-style-type: none; padding: 5px;"> 
                        </ul>
                    </div>
                </div>


                <div class="col pr-1 pl-1 mt-2">

                    <div class="card" style="border-radius:12px; ">
                        <div class="ftsize12"
                            style="border-radius:12px;font-size: 16px !important;color:white; background:#FEBD01; height: 30px;">
                            <b>Modifier
                            Terjual</b></div>

                        <div class="card-body"
                            style="border-radius:12px; padding-left: 0px !important; padding-right: 0px !important;">
                            <div class="table-responsive " style="overflow-x: hidden; height: 450px; ">
                                <div class="table-responsive" style="overflow-y: hidden;">
                                    <ul id="tablemmod"
                                        style="overflow-x: hidden; height: 350px; list-style-type: none; padding: 5px;">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/dfr_mobile/modal/detaildfr/menuterjual.blade.php ENDPATH**/ ?>