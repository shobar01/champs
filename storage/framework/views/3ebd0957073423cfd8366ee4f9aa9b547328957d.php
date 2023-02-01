<style>
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        overflow: scroll;
        padding-top: 50px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        border: 1px solid #888;
        width: 100%;
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
</style>
<div id="ds_det" class="modal">
    <div style="height: 100%; max-width: 100% !important;">
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="left" style="font-weight: 500; font-size: 14px;">
                    <a class="my-0 font-weight-normal" style="font-size: 12px;"><b name="ds_nmotl"
                            id="ds_nmotl"></b></a>
                </span>
                <i class="ion-android-close" style="color: black; margin-right: 10px; font-size: 24px;" type="button"
                    onclick="clos_mdldah()" class="close"></i>
            </div>
            <div class="modal-body pt-0" style="height: 550px;">
                <div class="col pr-1 pl-1 mt-2">

                    <div class="card" style="border-radius:12px; ">
                        <div class="ftsize12"
                            style="border-radius:10px; font-size: 12px !important; color:white; background:#cc1a0b; height: 30px;">
                            <a name="ds_nmsup" id="ds_nmsup"></a>
                        </div>
                        <ul id="tbl_detsup"
                            style="overflow-x: hidden; height: 450px; list-style-type: none; padding: 5px;">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function clos_mdldah(){
        document.getElementById('ds_det').style.display='none';
        $('#tx_ket').val('');
      }
      
</script><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/directsuply/m_dsdet.blade.php ENDPATH**/ ?>