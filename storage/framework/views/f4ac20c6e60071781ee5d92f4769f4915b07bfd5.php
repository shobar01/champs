
<style>
    
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1031;
        left: 0;
        top: 0;
        width: 100%;
        height: 97vh;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 0px;
        /* overflow: scroll; */
        position: fixed;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 0%;
        border: 1px solid #888;
        width: 100%;
        /* top: 10%; */
    }

    label {
        display: inline-block;
        margin-bottom: 0.2rem !important;
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
    .dropdown-item { 
        font-size: 12px !important;
    } 
</style>

<link href="<?php echo e(asset('public/resource/css/style_viewcogs.css')); ?>" rel="stylesheet" type="text/css">
<div id="mdl_loncatms" class="modal" style="padding-top: 60px;">
    <div class="" >
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 8px;">
                    <b style="font-size: 14px;" >Loncat Closing MS</b>
                </span>

                <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_lncatms()"
                    class="close"></i> 
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">
                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm"> 
                                    <div class="card-body text-left"> 
                                            <div class="form-group">
                                                <label>Outlet</label>
                          
                                                <select class="form-control form-control-sm " name="toglekdotl_cls" id="toglekdotl_cls"
                                                    onchange="pilihkdotl()">
                                                    <?php $__currentLoopData = $dfotl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($otl['kdoutlet']); ?>"  >
                                                        <?php echo e($otl['sngktotl']); ?> (<?php echo e($otl['kdoutlet']); ?>)
                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="noorder">Tanggal</label>
                        
                                                <input type="date" name="tglloncat" id="tglloncat" value="<?php echo e($tgl); ?>" class="form-control date_now"
                                                    style="font-size: 14px; color:black;" onchange="pilihkdotl()" required>
                                                
                                            </div>
                                            <div class="text-center px-1 pb-2 mt-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-lg btn-block btn-success" id="btn_lnctcls"
                                                            onclick="submitt_lnctms()" style="width:100%; font-weight: 500; font-size: 12px;">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script> 
    function clos_lncatms(){   
        document.getElementById('mdl_loncatms').style.display='none';  
    }

    function pilihkdotl(){ 
            var toglekdotl = $('#toglekdotl_cls').val();
            $('#kdotl').val(toglekdotl);    
        } 

    function submitt_lnctms(){ 
        
        var toglekdotl = $('#toglekdotl_cls').val();
        var tglloncat = $('#tglloncat').val();
        
        var nmotl_html = $( "#toglekdotl_cls option:selected" ).text(); 
        Swal.fire({
            text: "Apakah anda yakin akan Merubah Tanggal CLosing "+nmotl_html+" ke "+tglloncat+"?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            customClass: 'swal-wide',
            cancelButtonText: "Tidak",
            confirmButtonText: 'Ya!' ,
            reverseButtons: true,
            allowOutsideClick: false 
        }).then((result) => {
            if (result.isConfirmed)
        { 
            event.preventDefault();   
            btnjsn_lnctclos(); 
        }
        }) 
        } 

        function btnjsn_lnctclos(){  
        
            var toglekdotl = $('#toglekdotl_cls').val();
            var tglloncat = $('#tglloncat').val();
        
                    loadingon(); 
                    $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo e(url("adjst_loncatclosing")); ?>', 
                        data: {"_token": "<?php echo e(csrf_token()); ?>","kdoutlet":toglekdotl,"tglloncat":tglloncat},
                        dataType: 'json',
                        success:function(data){
                            
                            console.log(data);
                            $('#loader').hide();
                            
                        if(data['msetout']==false){
                                swal.fire({
                                icon: 'error',
                                title: 'Opps!!',
                                text: 'Gagal Di Update.',
                                confirmButtonColor: '#cc1a0b',
                                allowOutsideClick: false,
                            }).then(function() { 
                                loadingon();
                                location.reload();
                            }); 
                        }else{
                                swal.fire({
                                icon: 'success',
                                title: '',
                                text: 'Berhasil Di Update.',
                                confirmButtonColor: '#cc1a0b',
                                allowOutsideClick: false,
                            }).then(function() { 
                                loadingon();
                                location.reload();
                            });
                        }
                                
                        },
                        error: function () {
                            $('#loader').hide();
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: "Server Kita Bermasalah!",
                                allowOutsideClick: false 
                            });
                        }
                    });  
        }
</script>  
 
 
<?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/msadjust/mdl_loncatms.blade.php ENDPATH**/ ?>