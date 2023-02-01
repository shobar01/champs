
<?php $__env->startSection('content'); ?>
<div class="card mt-5 main-card">
    <img src="<?php echo e(asset('public/resource/img/footer-logo.png')); ?>" class="opacity-img">
    <div class="card-body pt-1 ccb">
        <button type="button" class="btn btn-block btn-head">Request Add Menu -
            <?php echo e(\Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y')); ?></button>
        <div class="row mt-2">
            <div class="col-5 pr-0"><input type="text" class="text-left form-control search shadow" id="search"
                    placeholder="Search...">
            </div>
            <div class="col-4 px-1"><input type="date" name="" id="tglini"
                    class="form-control px-1 text-center tanggal shadow" onchange="ubahtgl()" value="<?php echo e($tanggal); ?>">
            </div>
            <div class="col-3 pl-1 nw">
                <i class="fa fa-sync" onclick="location.reload();"></i>
                <a href="<?php echo e(route('viewAlertMenu')); ?>">
                    <span class="spn-bell"><i class="fa fa-bell animate__animated <?php if($jmlmn != " 0"): ?> animate__headShake
                            animate__infinite <?php endif; ?>"></i>
                        <?php if($jmlmn != "0"): ?><button class="btn btn-rad" type="button"><?php echo e($jmlmn); ?></button><?php endif; ?>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="card-body pt-1" id="cbd">
        <?php if(count($menu) == 0): ?>
        <div class="text-center img-center">
            <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_EaOthPrBLy.json" background="transparent"
                speed="1" style="width: 300px; height: 300px;" loop
                autoplay>
            </lottie-player>
        </div>
        <?php endif; ?>
        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a>
            <div class="card shadow mt-2 crd" id="card<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>">
                <div class="card-body">
                    <i class="fa fa-bookmark" id="bm<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>"></i>
                    <span class="fw"><?php echo e($item['nmoutlet']); ?></span>
                    <div class="row">
                        <div class="col-10 pr-1">
                            <span> [<?php echo e($item['kdmenu']); ?>] </span> <span
                                id="nmmenu<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>"><?php echo e($item['nmmenu']); ?></span>
                            <hr>
                            <span class="info">
                                <span class="time">
                                    <i class="fa fa-clock"></i>
                                    <?php echo e(date('h:i:s', strtotime($item['wktrequest']))); ?>

                                </span>
                                <span class="clip">
                                    <i class="fa fa-clipboard"></i>
                                    <span id="note<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>"></span>
                                </span>
                            </span>
                            <span class="span-act">
                                <button class="btn btn-act btn-reject" type="button"
                                    id="rj<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>"
                                    onclick="rja('<?php echo e($item['kdmenu']); ?>,<?php echo e($item['kdoutlet']); ?>')"><i
                                        class="fa fa-times"></i></button>
                                <button class="btn btn-act btn-approve" type="button"
                                    id="ap<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>"
                                    onclick="apa('<?php echo e($item['kdmenu']); ?>,<?php echo e($item['kdoutlet']); ?>')"><i
                                        class="fa fa-check"></i></button>
                            </span>
                        </div>
                        <div class="col-2 px-0 text-center">
                            <span style="display: block"><img id="img<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>"
                                    onclick="bukaimg('<?php echo e($item['kdmenu']); ?>,<?php echo e($item['kdoutlet']); ?>')"
                                    src="<?php echo e($item['foto']); ?>"
                                    class="img-foto"></span>
                            <span class="text-center lbl-number"
                                id="lbl-number<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>">Rp
                                <?php echo e(number_format($item['harga'],0,'','.')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="harga<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>" value="<?php echo e($item['harga']); ?>">
            <input type="hidden" id="isapproval<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>">
            <input type="hidden" id="catatan<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>">
            <input type="hidden" id="nipreq<?php echo e($item['kdmenu']); ?><?php echo e($item['kdoutlet']); ?>" value="<?php echo e($item['niprequest']); ?>">
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <form action="<?php echo e(route('updatemenu')); ?>" method="post" id="formmenu"><?php echo csrf_field(); ?>
        </form>
        <button class="btn btn-update shadow" type="button" id="btn-update" onclick="simpanmn()"><i
                class="fa fa-save"></i> Update</button>
        <button class="btn btn-hist shadow" type="button" id="btn-hist" onclick="hist()"><i
                class="fa fa-history"></i></button>
    </div>
</div>

<?php echo $__env->make('addmenu.modalfoto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('addmenu.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('addmenu.confirm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('addmenu.note', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('addmenu.hist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('addmenu.tglhist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('addmenu.modalfoto2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php if(session('success')): ?>
<script>
    Swal.fire({
        icon : "success",
        title: "Success",
        text:"<?php echo e(session('success')); ?>"
    })
</script>
<?php elseif(session('error')): ?>
<script>
    Swal.fire({
        icon : "error",
        title: "Failed",
        text:"<?php echo e(session('error')); ?>"
    })
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('addmenu.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/addmenu/viewmenu.blade.php ENDPATH**/ ?>