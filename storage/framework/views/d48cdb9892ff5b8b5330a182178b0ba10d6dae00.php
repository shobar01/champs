<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;

    }


    /* Extra styles for the cancel button */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
        text-align: center;
        margin: 0 0 24px 0;
        position: relative;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
        overflow: scroll;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
        width: 80%;
        top: 10%;
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes  animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media  screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }

    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
    }

    .alert.success {
        background-color: #4CAF50;
    }

    .alert.info {
        background-color: #2196F3;
    }

    .alert.warning {
        background-color: #ff9800;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }

    /* .swal-wide {
        width: 50% !important; 
    } */
</style>

<div id="dpassword" class="modal">

    <form id="send_restpass" class="modal-content animate" action="<?php echo e(route('master_resetpass')); ?>" method="POST"
        class="d-none">
        <?php echo csrf_field(); ?>

        <header class="imgcontainer" style="background: url(<?php echo e(asset('resource/img/banner_delivery.png')); ?>);
        height: 100px; border-radius: .3rem;">
            <div class="container">
                <span onclick="document.getElementById('dpassword').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <img src="<?php echo e(asset('resource/img/logo.png')); ?>" class="img-circle avatar center" alt="user name"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
            </div>
        </header>

        <div class="container modal-content">
            <input type="text" name="pass_nip" class="form-control input-text" id="pass_nip" placeholder="NIP"
                data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
            <div class="side">
                <button type="submit" onclick="loadingon();" class="btn btn-block btn-primary">Reset Password<i
                        class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </form>
</div>


<div id="modl_imei" class="modal">
    <form id="send_gntiimei" class="modal-content animate" action="<?php echo e(route('master_gantiimei')); ?>" method="POST"
        class="d-none">
        <?php echo csrf_field(); ?>

        <header class="imgcontainer" style="background: url(<?php echo e(asset('resource/img/banner_delivery.png')); ?>);
        height: 100px; border-radius: .3rem;">
            <div class="container">
                <span onclick="document.getElementById('modl_imei').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <img src="<?php echo e(asset('resource/img/logo.png')); ?>" class="img-circle avatar center" alt="user name"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
            </div>
        </header>

        <div class="container modal-content">
            <span id="isi_modal">©ICT Department 2018</span>
            <!--                <input  class="form-control input-text" id="rpassword" value="rpassword"-->
            <!--                       placeholder="NIP" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />-->
            <input type="hidden" class="form-control input-text" name="a_nmapprove" id="a_nmapprove"
                value="<?php echo e(session('nmapprove')); ?>" />
            <input type="hidden" class="form-control input-text" name="a_id" id="a_id" />
            <input type="hidden" class="form-control input-text" name="a_nip" id="a_nip" />
            <input type="hidden" class="form-control input-text" name="a_dvcimei" id="a_dvcimei" />
            <input type="hidden" class="form-control input-text" name="a_dvchp" id="a_dvchp" />
            <input type="hidden" class="form-control input-text" name="a_nm" id="a_nm" />
            <input type="hidden" class="form-control input-text" name="a_con" id="a_con" />
        </div>
        <div class="container ">
            <div class="side">
                <button type="submit" onclick="loadingon();" class="btn btn-block btn-primary">Update device <i
                        class="fa fa-paper-plane"></i></button>
            </div>
            
        </div>
    </form>
</div><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/modal/m_master.blade.php ENDPATH**/ ?>