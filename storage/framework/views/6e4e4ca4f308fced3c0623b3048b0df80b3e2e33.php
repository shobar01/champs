<?php $__env->startSection('content'); ?>
<div class="text-center p-5">
    <lottie-player  src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>" alt="img" background="transparent"
        speed="1" loop style="width: auto; height: 300px;" autoplay>
    </lottie-player>
    <h5>404 Not Found, Silahkan hubungi ICT !!</h5>

    <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;"> 
        <div class="fw-container">
            <div class="fw-body"> 
                <div class="col-md-12 col-lg-4 ">
                    <div class="card  shadow p-2 mb-2  my-5" style="background: #cc1a0b;" onclick="btn_wanow()"> 
                        <div class="text-center ">
                            <div class="d-flex flex-row align-items-center">
                                <div class="input-group-prepend">
                                    <div class="icon "> 
                                        <lottie-player
                                            src="https://assets7.lottiefiles.com/packages/lf20_5gezzxwi.json"
                                            background="transparent" speed="0.6"
                                            style="width: 40px; height: 40px;" loop autoplay>
                                        </lottie-player>
                                    </div>
                                </div>
                                
                                <b id="tx_kettolak" style=" color:white; font-size:14px;"> Hubungi Sekarang !!</b>
                            </div>
                        </div> 
                    </div> 
                </div>

            </div>
         </div>

    </div> 
</div>




<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/errors/404.blade.php ENDPATH**/ ?>