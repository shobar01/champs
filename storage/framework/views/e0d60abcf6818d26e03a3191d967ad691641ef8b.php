
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.'); ?>
<?php $__env->startSection('content'); ?>
<style>
    .user {
        display: flex;
        margin-top: auto;
        min-width: 100%;
    }

    .user img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

    .user-info h5 {
        margin: 0;
    }

    .user-info small {
        color: #545d7a;
    }
</style>
<div class="container" style="padding:5px;">
    <div class=" mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header" style="padding: 0.50rem 0.50rem !important;">
                <div class="row">
                    <div class=" text-right" style="padding: 0 5px 0 15px !important;">
                        <div id="btnbacksrn" type="button" style=" font-weight: bold; font-size: 14px;" 
                        onclick="btn_backhistsrn()"><i class='fa fa-arrow-left'
                                style='color: #000; margin: 0 5px 0 5px;' ></i></div>
                    </div>
                    <div class="col" style="padding-left: 0px !important;">
                        <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>History</b></a>
                    </div>
                    
                </div>  
            </div>
            <?php if(isset($dfhis_mood)): ?>
            <div class="card-body text-left">
                <ul style="overflow-x: hidden; height: 255px; list-style-type: none; padding: 5px;">
                    <?php $__currentLoopData = $dfhis_mood; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfmood): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-12" style="padding: 0px  0px  0px  0px !important;">

                        <div class="card shadow mt-2"
                            style="background-color: #FFFFFF !important; border-radius: 15px !important; padding: 5px 5px 5px 5px !important;">
                            <div class="user">
                                <div class=" img text-center" style="">
                                    <lottie-player class="shadow" src="<?php echo e($dfmood['UrlCat']); ?>" background="transparent"
                                        speed="1" style="margin: 0 auto; width: 25px; height: 25px; border-radius: 5px;"
                                        loop autoplay>
                                    </lottie-player>
                                    <span class=" " id="basic-addon3"
                                        style="color:black; height: 17px; font-size: 12px;  ">
                                        <?php echo e($dfmood['Tittle']); ?>

                                    </span>
                                </div>
                                <div class="user-info" style="padding-left: 10px; min-width: 95%;">
                                    <div class="input-group input-group-sm ">
                                        <span class=" " id="basic-addon3"
                                            style="color:black;min-width: 90%; margin: 0px 10px 0px 0px;   font-size: 12px;  ">
                                            <?php echo e($dfmood['isisaran']); ?>

                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class=" text-right"
                                            style="height: 17px; color:black; min-width: 90%; margin: 10px 10px 0px 0px;  font-size: 10px;">
                                            <?php echo e($dfmood['wktsrn']); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php else: ?>

            <div class="text-center ">
                <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>"
                    background="transparent" speed="1" style="margin: 0 auto; width: 200px; height: 200px;" loop
                    autoplay>
                </lottie-player>
                <a class="text-center" style="font-size: 12px;">Tidak Ada data</a>
            </div>

            <?php endif; ?>
            <div class="row">
                <div class="input-group">
                   <div class="text-center" style="margin: auto">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_bmk.png" alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_gokana.png" alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_platinum.png" alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_raacha.png" alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_bmkKopi.png" alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_chopstix.png" alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_platinumGrill.png" alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_ms.png" alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_dewata.png" alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_Croco.png" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
   
</div>

<script>
     function btn_backhistsrn(){ 
        $('#btnbacksrn').css({'background':'rgba(0, 0, 0, 0.5)', 'border-radius':'5px' }); 
        $('#loader').show(); 
            window.location.href='<?php echo e(route('cm_dashsaran')); ?>?nip=<?php echo e($nip); ?>&kdakses=<?php echo e($kdakses); ?>';
            $(document).ready(function () {  
            var refreshId = setInterval(function () {
                $('#loader').hide();
                }, 5000);
                $.ajaxSetup({ cache: false });
            });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_cmmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/cmdialog/cm_dashsaranhistory.blade.php ENDPATH**/ ?>