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
        z-index: 1031;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        /* padding-top: 60px; */
        overflow: hidden;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 0% auto 15% auto;
        border: 1px solid #888;
        width: 80%;
        /* top: 10%; */
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
        <div class="container">
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="" id="basic-addon3" style="font-size: 14px; color:black;"><b>Input Guest</b>
                    </span>
                </div>
            </div>
            <span onclick="document.getElementById('dpassword').style.display='none'" class="close"
                title="Close Modal">&times;</span>
        </div>
        </header>

        <div class="container modal-content">
            <div class="input-group">
                <table class="" style="width:100%; ">
                    <tr>
                        <td style="font-size: 12px !important; color : white; width: 48%;">
                            <div class="form-group">
                                <label for="no_wa" style="font-size: 14px !important; color : black; ">No WhatsApp
                                    &nbsp;</label>
                                <input type="number" name="no_wa" id="no_wa" value="" class="form-control"
                                    placeholder="example : 087888855156" onfocus="myFunction(this)" />
                            </div>
                        </td>
                        <td style="width: 2%;"></td>

                        <td style="font-size: 12px !important; color : white; width: 48%;">
                            <div class="form-group">
                                <label for="no_wa" style="font-size: 14px !important; color : black; ">Name
                                    &nbsp;</label>

                                <input type="text" name="nm_tmu" id="nm_tmu" value="" class="form-control"
                                    placeholder="Example : Bagus" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 12px !important; color : white; width: 48%;">
                            <div class="form-group">
                                <label for="no_wa" style="font-size: 14px !important; color : black; ">Note
                                    &nbsp;</label>

                                <input type="text" name="ket_tmu" id="ket_tmu" value="" class="form-control"
                                    placeholder="Example : Non Smoking" />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="side " style="padding-left: 100px; padding-right: 100px;">
                <button class=" btn btn-lg btn-block  btn-rounded mb-1 mt-2" type="button"
                    style="font-size: 14px; color:white; background-color: #26160D;  min-width: 150px;  font-weight: bold; padding-left: 10px !important; "
                    onclick="send()">Save Guest</button>
            </div>
        </div>
    </form>


</div>
<script>
    function myFunction(x) {
        $('#nm_tmu').val(''); 
    }
</script><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views/bukutamums/m_tmbhtamu.blade.php ENDPATH**/ ?>