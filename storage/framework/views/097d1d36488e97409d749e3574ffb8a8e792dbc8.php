<!doctype html>
<html lang="en">

<head>
    <title>Login Buku Tamu MS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="<?php echo e(asset('public/resource/img/logo.png')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo e(asset('public/resource/css/loader2.css')); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo e(asset('public/resource/logins/css/style.css')); ?>">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;

        }

        /* Center the image and position the close button */
        .img.container {
            text-align: center;
            margin: 0 0 24px 0;
            position: relative;

        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }


        .container2 {
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
    </style>
</head>

<body class="img js-fullheight"
    style="background-image: url(./public/resource/logins/images/bgbktm.jpg);height:auto !important">
    <div class="loading" id="loader"></div>
    <section class="ftco-section ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <div class="img text-center">
                            <img src="<?php echo e(asset('public/resource/img/logo.png')); ?>" alt="" width="50%">
                        </div>
                        <form action="<?php echo e(route('loginApp')); ?>" method="POST"><?php echo csrf_field(); ?>
                            <div class="form-group">
                                <input type="text" name="nip" id="nip" placeholder="Enter a valid your NIP"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="PassUser" id="PassUser" class="form-control"
                                    placeholder="Password" required>
                                <span toggle="#PassUser" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-dark submit px-3"
                                    style="border-radius: 20px !important; background-color: black; color:white; font-weight: bold;">Sign
                                    In</button>
                            </div>
                            <br>
                            <p class="  text-center mb-0" style="font-size: 10px;">PT.Champ Resto
                                Indonesia.<br>ICT
                                Departement
                                @2021<br>Version 1.0</p>
                            <br>
                        </form>

                    </div>
                </div>
            </div>

            <section id="clients">
                <div class="container" style="margin-top: 20px;">
                    <div class="container">
                        <ul class="list-unstyled list-inline text-center">
                            <li class="list-inline-item">
                                <a>
                                    <img src="<?php echo e(asset('public/resource/img/cm/bamiko.png')); ?>"
                                        class="img-circle avatar center" style="width: 50px; height: 50px;" />
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a>
                                    <img src="<?php echo e(asset('public/resource/img/cm/bmk.png')); ?>"
                                        class="img-circle avatar center" style="width: 50px; height: 50px;" />
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a>
                                    <img src="<?php echo e(asset('public/resource/img/cm/chopstix.png')); ?>"
                                        class="img-circle avatar center" style="width: 50px; height: 50px;" />
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a>
                                    <img src="<?php echo e(asset('public/resource/img/cm/gokana.png')); ?>"
                                        class="img-circle avatar center" style="width: 50px; height: 50px;" />
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a>
                                    <img src="<?php echo e(asset('public/resource/img/cm/gobar.png')); ?>"
                                        class="img-circle avatar center" style="width: 50px; height: 50px;" />
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a>
                                    <img src="<?php echo e(asset('public/resource/img/cm/kopilatinum.png')); ?>"
                                        class="img-circle avatar center" style="width: 50px; height: 50px;" />
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a>
                                    <img src="<?php echo e(asset('public/resource/img/cm/platinum.png')); ?>"
                                        class="img-circle avatar center" style="width: 50px; height: 50px;" />
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a>
                                    <img src="<?php echo e(asset('public/resource/img/LogoMS1.png')); ?>"
                                        class="img-circle avatar center" style="width: 50px; height: 50px;" />
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </section>
        </div>
    </section>

    <script src="<?php echo e(asset('public/resource/logins/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/resource/logins/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('public/resource/logins/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/resource/logins/js/main.js')); ?>"></script>

    <script>
        $(window).on('load', function () {
            $('#loader').delay(450).fadeOut('slow');
        });
        function loadingon(){
            $('#loader').show();
        }
    </script>
    <?php if(session('success')): ?>
    <script>
        Swal.fire({
        title: 'Success',
        text: "<?php echo e(session('success')); ?>",
        icon: 'success', 
        confirmButtonColor: '#008000',
        allowOutsideClick: false  
        })  
    </script>
    <?php elseif((session('error'))): ?>
    <script>
        Swal.fire({
        title: 'Sorry!!',
        text: "<?php echo e(session('error')); ?>",
        icon: 'error', 
        confirmButtonColor: '#8B0000',
        allowOutsideClick: false  
        })  
    $('#loader').hide();
    </script>
    <?php endif; ?>
</body>

</html><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/auth/login.blade.php ENDPATH**/ ?>