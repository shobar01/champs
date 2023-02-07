

<?php $__env->startSection('content'); ?>
<div class="text-center p-5">
    <img src="<?php echo e(asset('msi/img/419.svg')); ?>" alt="Error" width="500px">
    <br>
    <a href="#" class="btn btn-lg btn-block" onclick="window.history.back()"
        style="background: #664E41; font-weight:bold; color:white">Back To Main</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\ChampApplication\xampp\htdocs\champs-mobile\resources\views/errors/419.blade.php ENDPATH**/ ?>