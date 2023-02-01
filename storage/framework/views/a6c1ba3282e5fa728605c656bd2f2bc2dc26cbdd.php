

<style>
    #accordion {
        margin: 20px 0;
    }
    
    #accordion #faq .shadow {
      margin-bottom: 10px;
      /* border: 0; */
    }
    
    #accordion #faq .shadow .card-header {
      border: 0;
      -webkit-box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
              box-shadow: 0 0 20px 0 rgba(213, 213, 213, 0.5);
      border-radius: 2px; 
      
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0,0,0,.03);
        border-bottom: 1px solid rgba(0,0,0,.125);
        
        /* border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0; */
    }
    
    #accordion #faq .shadow .card-header .btn-header-link {
      color: #000;
      display: block;
      text-align: left;
      /* background: #FFE472; */
      color: #222;
      padding: 0px;
      
    }
    
    #accordion #faq .shadow .card-header .btn-header-link:after {
      content: "\f139";
      font-family: 'Font Awesome 5 Free';
      font-weight: 900;
      float: right;
    }
    
    #accordion #faq .shadow .card-header .btn-header-link.collapsed {
      /* background: #A541BB; */
      color: #000;
    }
    
    #accordion #faq .shadow .card-header .btn-header-link.collapsed:after {
      content: "\f13a";
    } 
    
    #accordion #faq .shadow .collapsing {
      /* background: #FFE472; */
      /* line-height: 30px;
    }
    
    #accordion #faq .shadow .collapse {
      /* border: 0; */
    }
    
    #accordion #faq .shadow .collapse.show {
      /* background: #FFE472; */
      /* line-height: 30px; */
      color: #222;
    }
    
    .btn.focus, .btn:focus {
        outline: 0;
        box-shadow: 0 0 0 0 rgb(0 123 255 / 25%) !important;
    }
    .btn-group-lg>.btn, .btn-lg {
        padding: 5px !important;
        font-size: 14px !important;
        line-height: 1.5 !important;
        border-radius: 0.3rem !important; 
        margin-left: 15px !important;
        margin-right: 15px !important;
    }
    </style>
    
<style>
    
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1031;
        left: 0;
        top: 0;
        width: 100%;
        /* height: 100%; */
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
        overflow: scroll;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        /* margin: 5% auto 15% auto; */
        border: 1px solid #888;
        /* width: 95%; */
        /* top: 10%; */
    }

    
    label {
        /* display: inline-block; */
        margin-bottom: 0rem !important;
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

    .form-group {
        margin-bottom: 0.1rem !important;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 0.75rem !important;
    }

    .bootstrap-select .dropdown-toggle .filter-option {
        font-size: 12px !important;
    }

    .form-control { 
        font-size: 12px !important; 
    }
    
</style>
<div id="mdl_detailpts" class="modal">
    <div class="" style="height: 100%; max-width: 100% !important; margin-top:60px; ">
        <div class="modal-content animate" style="">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="col text-center" style="font-weight: 500;  margin-top: 8px; padding-right: 15px!important; padding-left: 0px !important;">
                    <b style="font-size: 14px;" id="tx_tittlepts">Detail PTS  Nama Outlet</b>
                    <br>
                    <a class="text-center" style="font-size: 14px;" id="tx_noretur">No Retur XXX</a>
                    <br>
                    <a class="text-center" style="font-size: 14px;" id="tx_jnspts">Detail PTS  Nama Outlet</a>
                    <a class="text-center" style="font-size: 14px;" id="tx_headtgl"> Tanggal</a>
                </span>

                <i class="ion-close-circled end-0" style="color: red; font-size: 25px;" onclick="clos_ptsdet()"
                    class="close"></i> 
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

            <form id="form_approval" action="<?php echo e(route('simpan_approval')); ?>" method="POST" enctype="multipart/form-data" onkeypress="return event.keyCode !=13">
                <?php echo csrf_field(); ?>  
                
                <input type="hidden" name="tgl_returptsdet" id="tgl_returptsdet" value="<?php echo e($plhtgl); ?>"   required> 
                <input type="hidden" id="nipdet" name="nipdet" value="<?php echo e($nip); ?>"/>
                <input type="hidden" id="kdaksesdet" name="kdaksesdet" value="<?php echo e($kdakses); ?>"/>

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm"> 
                                    <div class="card-body text-left"  style="padding: 0.15rem !important;">    
                                        <div id="detailptskosong"></div>
                                    <ul style="overflow-x: hidden; height: 60vh; list-style-type: none; padding: 5px;" id="ul_approvpts">
                                      
                                    </ul> 
                                    <div class="text-center px-1 pb-2"> 
                                        <button type="button" class="btn btn-lg  btn-success" id="btn_simpanapproval"
                                            onclick="btn_submitapproval()" style="width:90%; font-weight: 600; font-size: 16px; ">
                                            Simpan Approval
                                        </button>  
                                    </div>
                                </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
                
        </div>
    </div>
</div>
</div>

<script> 
    function clos_ptsdet(){  
        
        $('#ul_approvpts').empty() ;
        $('#detailptskosong').empty() ;
        document.getElementById('btn_simpanapproval').style.display='block';  
        document.getElementById('mdl_detailpts').style.display='none';  
    }

    
</script>
 
<?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/pts/mdl_ptsdet.blade.php ENDPATH**/ ?>