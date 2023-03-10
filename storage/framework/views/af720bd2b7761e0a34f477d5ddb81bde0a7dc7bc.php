
<?php $__env->startSection('content'); ?>

<button type="button" class="btn btn-info btn-topright shadow" data-toggle="modal" data-target="#info"><i
        class="fa fa-info"></i></button>
<div class="card mt-5 main-card">
    <img src="<?php echo e(asset('public/resource/img/footer-logo.png')); ?>" class="opacity-img">
    <div class="card-body pt-1 ccb">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item nvpilih" role="presentation">
                <a class="nav-link active <?php echo e($bgcolor); ?>2" id="pills-home-tab" data-toggle="pill"
                    data-target="#pills-home" role="tab" aria-controls="pills-home"
                    aria-selected="true"><?php echo e($nmstatus); ?></a>
            </li>
            <li class="nav-item nvpilih" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Kategori</a>
            </li>
        </ul>
        <div class="row mt-2">
            <div class="col-6 pr-0"><input type="text" class="text-left form-control search shadow" id="searchtk"
                    placeholder="Search...">
            </div>
            <div class="col-6 pl-1 pr-2 bold text-right">
                <button class="btn btn-tanggal shadow" type="button" onclick="bukatglhist()">
                    <i class="fa fa-calendar"></i> <?php echo e(\Carbon\Carbon::parse($tanggal)->translatedFormat('d M Y')); ?>

                </button>
                <button class="btn btn-tanggal shadow" type="button" onclick="window.location.reload();loadingon();">
                    <i class="fa fa-refresh"></i>
                </button>
                <input type="hidden" id="tanggalhist" value="<?php echo e(date('Y-m-d')); ?>">
            </div>
        </div>
    </div>

    <div class="card-body pt-0" id="cbd">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <?php if(count($lstrack) == 0): ?>
                <div class="text-center img-center">
                    <lottie-player src="<?php echo e(asset('public/resource/js/found3.json')); ?>" background="transparent" speed="1"
                        style="width: 300px; height: 300px;" loop autoplay>
                    </lottie-player>
                </div>
                <?php else: ?>
                <div class="row" id="isiticket">
                    <?php $__currentLoopData = $lstrack; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-xs-6 col-sm-3 col-lg-3  p-1 xxc">
                        <div class="card shadow m-1 card-rad" onclick="openticket('<?php echo e($item['kdticket']); ?>')">
                            <div class="card-body card-rad p-0">
                                <div class="row">
                                    <div class="col-3">
                                        <button type="button" class="btn <?php echo e($item['bgcolor']); ?> card-rad btn-status">
                                            <i class="fa <?php echo e($item['image']); ?> text-white"></i>
                                        </button>
                                    </div>
                                    <div class="col-9">
                                        <span class="fon"><?php echo e($item['iddepttujuan']); ?></span>
                                        <p class="bold txtnama mb-0"><?php echo e($item['nmreq']); ?></p>
                                        <p class="f-10 mb-0">
                                            <?php echo e($item['kdticket']); ?>

                                        </p>
                                        <p class="f-10 mb-1 spket">
                                            <?php echo e(\Carbon\Carbon::parse($item['wktupdate'])->translatedFormat('H:i')); ?>

                                        </p>
                                        <p class="f-10 mb-1">
                                            <?php echo e(Str::limit($item['keterangan'],16)); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>

                <?php if($long == null): ?>
                <script>
                    function alert(){
                    Swal.fire({
                        icon: 'warning',
                        title:'Lokasi Tidak di Temukan',
                        showCancelButton: false,
                        confirmButtonText: 'Kembali',
                        reverseButtons: true,
                        allowOutsideClick: false
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.close()
                        }
                        })
                }alert()
                </script>
                <?php else: ?>
                <div class="btnx">
                    <button class="btn btn-add" type="button" data-toggle="modal" data-target="#exampleModal"><i
                            class="fa fa-plus fa-2x"></i></button>
                    <span class="title">Add Request</span>
                </div>
                <?php endif; ?>

            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="panel p-3">
                    <div class="card-body p-0">
                        <div class="row" id="mstatus">
                            <?php $__currentLoopData = $df_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $df): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-3 text-center p-1">
                                <button onclick="cekkd('<?php echo e($df['kdstatus']); ?>')"
                                    class="box-kat shadow <?php echo e($df['bgcolor']); ?>">
                                    <i class="fa <?php echo e($df['image']); ?> fa-2x text-white">
                                        <?php if($df['jml'] != '0'): ?>
                                        <span class="shadow jml-alert"><?php echo e($df['jml']); ?></span>
                                        <?php endif; ?>
                                    </i>
                                </button>
                                <p class="f-label"><?php echo e($df['nmstatus']); ?></p>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

</div>

<?php echo $__env->make('ticketing.modal.informasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.infokat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.tglhist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.detailtick', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.note', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.maps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.readby', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.addreq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.rate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.klikfoto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.mdfoto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.tfoto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.terima', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.tfototer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.modal.uniform', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('ticketing.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<input type="hidden" id="testobay" value="F">

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
<?php echo $__env->make('ticketing.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\ChampApplication\xampp\htdocs\champs-mobile\resources\views/ticketing/ticketing.blade.php ENDPATH**/ ?>