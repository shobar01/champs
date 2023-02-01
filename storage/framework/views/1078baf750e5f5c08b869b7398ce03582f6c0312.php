<style>
    .accordion .card-header::before {
        font-family: 'FontAwesome';
        content: "\f13a";
        float: right;
        display: flex;
        align-items: center;
        padding-right: 10px;
    }

    /* .accordion .card-header.collapsed::before {
        content: "\f139";
    } */
</style>
<div class="modal " id="detailnoorder">
    <div class=" modal-xl w3-animate-bottom fixed-bottom m-0" role="document">
        <div class="modal-content color-card">
            <div class="modal-header pb-0">
                <h5 style="font-weight:bold; padding:0;">DAFTAR TRANSAKSI</h5>
                
                <button type="button" class="close"  onclick="document.getElementById('detailnoorder').style.display='none';"> 
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="card" style="height:450x;">
                            <div class="card-header" style="border-radius:12px;font-weight:bold">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"
                                            style="font-size: 14px; background:#cc1a0b; color:white; min-width: 80px;  font-weight: bold;">Pukul</span>
                                    </div>
                                    <select id="periodewaktu" class="form-control text-center"
                                        style="font-weight: bold;background:white; height: 35px !important;"
                                        onchange="pilihdfr('A')">
                                        <?php $__currentLoopData = $json['bagiwaktu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bagiwaktu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bagiwaktu['wktawal']); ?>,<?php echo e($bagiwaktu['wktakhir']); ?>">
                                            <?php echo e($bagiwaktu['wktawal']); ?> - <?php echo e($bagiwaktu['wktakhir']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                            </div>
                            

                                <div id="accordion" class="accordion md-accordion" role="tablist"
                                    aria-multiselectable="true">
                                    <ul id="nav-tab"
                                        style="overflow-x: hidden; height: 450px; list-style-type: none; padding: 5px;">
                                    </ul>
                                </div>

                                
                                
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/dfr_mobile/modal/detaildfr/noorder.blade.php ENDPATH**/ ?>