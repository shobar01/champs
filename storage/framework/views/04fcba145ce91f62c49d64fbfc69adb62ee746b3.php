
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('modal.m_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container" style="padding-top: 100px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal"><b>Contact Us ICT Support</b></h4>
            </div>
            <div class="card-body">

                <div class="fw-container">

                    <div class="fw-body">

                        <div class="content">

                            <section id="contact">
                                <?php $__currentLoopData = $dfrcntact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrycntac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a
                                    href="https://api.whatsapp.com/send?phone=<?php echo e($arrycntac['NoHp']); ?>&text=Nama%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3A%0AOutlet%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3A%0ANo%20Tiket%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3A%0AYang%20di%20tanyakan%20%3A">
                                    <div class='info'>
                                        <div class='boxbari'
                                            style="padding-top: 10px !important; padding-bottom: 10px !important; ">
                                            <h3><i class='ion-social-whatsapp' style="margin-right: 10px;"></i><b>
                                                    <?php echo e($arrycntac['NmPic']); ?></b></h3>
                                        </div>
                                    </div>
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//kontak/kontak.blade.php ENDPATH**/ ?>