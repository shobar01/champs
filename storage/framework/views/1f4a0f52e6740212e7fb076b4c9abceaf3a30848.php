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

<div id="m_downloadrptorder" class="modal">

    <div class="modal-content animate" class="d-none">

        <header class="imgcontainer" style="background: url(<?php echo e(asset('resource/img/banner_delivery.png')); ?>);
        height: 100px; border-radius: .3rem;">
            <div class="container">
                <span onclick="document.getElementById('m_downloadrptorder').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <img src="<?php echo e(asset('resource/img/logo.png')); ?>" class="img-circle avatar center" alt="user name"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
            </div>
        </header>

        <div class="container modal-content">
            <div class="row">
                <div class="col text-center">
                    <a href=" #" class="btn btn-danger " style="margin: 0px 5px 0px 5px;" data-toggle="modal"
                        data-target="#areapdf"><i class="fa fa-file-pdf-o" style="margin: 5px 0px 5px 0px; "
                            title="Download PDF"> PDF</i></a>
                    <a href="#" class="btn btn-success " style="margin: 0px 5px 0px 0px; " data-toggle="
                        modal" data-target="#areaexcel"><i class="fa fa-file-excel-o" style="margin: 5px 0px 5px 0px; "
                            title="Download Excel"> Excel</i></a>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/rptorderbrg/m_dwonldf.blade.php ENDPATH**/ ?>