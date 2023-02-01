<?php $__env->startSection('content'); ?>
<style xmlns="http://www.w3.org/1999/html">
    body {

        background-image: url("../resource/img/bgms.jpg") !important;
        background-size: auto;
        background-repeat: no-repeat;

        height: 100%;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        /*background-size: cover;*/
    }

    .bg {
        /* The image used */
        background-image: url("../resource/img/bgms.jpg");
        ;
        /* Full height */
        height: 100%;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .container {
        margin: 0 auto !important;
        border-radius: 10px !important;
        /*height: 325px !important;*/
        max-width: 400px !important;
        width: 100% !important;
        text-align: center !important;
        background-color: rgba(236, 240, 241, 0.29) !important;
        border: 2px solid rgba(236, 240, 241, 0.8) !important;
        margin-top: 150px !important;
        text-align: center !important;
    }

    .container img {
        height: auto !important;
        max-width: 190px !important;
        margin-top: -100px !important;
        margin-bottom: 10px !important;
    }
</style>
<form action="<?php echo e(route('loginApp')); ?>" method="POST"><?php echo csrf_field(); ?>
    <div class="container">
        <div class="">
            <img class="mb-4" src="<?php echo e(asset('resource/img/logo.png')); ?>">
            <label for="inputEmail" class="sr-only">Nip</label>
            <input type="text" name="nip" placeholder="Enter a valid your NIP" id="nip" required class="form-control"
                autofocus><br>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="PassUser" id="password" class="form-control" placeholder="Password" required>
            <br>
            <button class="btn btn-lg btn-primary btn-block " type="submit">Sign in</button>
            <br>
            <p class="text-muted mb-0">PT.Champ Resto Indonesia.<br>ICT Departement @2021<br>Version 1.0</p>
            <br>
        </div>
    </div>
</form>
<script>
    function loadingon() {
        $('#loader').show();
    }
    function otomatis() {
        $('#nip').val('18192021');
        $('#password').val('18192021');
    }
</script>
<?php if(session('success')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "<?php echo e(session('success')); ?>"
    })
</script>
<?php elseif((session('error'))): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Sorry!!',
        text: "<?php echo e(session('error')); ?>"
    })
    $('#loader').hide();
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/auth/login.blade.php ENDPATH**/ ?>