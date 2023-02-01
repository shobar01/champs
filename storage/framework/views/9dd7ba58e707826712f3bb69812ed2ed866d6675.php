
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.'); ?>
<?php $__env->startSection('content'); ?>
<style> 
    .card-header {
        padding: 0.45rem 1.25rem !important;
    }

    .table td,
    .table th {
        padding: 0.05rem !important;
        vertical-align: middle !important;
        border-top: 1px solid #dee2e6 !important;
    }

    .card-body {
        padding: 0.25rem !important;
    }

    .swal2-popup {
        font-size: 0.7rem !important;
        width: 30em !important;
        max-width: 100% !important;
    }

    .swal2-html-container {
        text-align: justify !important;
    }

    hr {
        margin-top: 0.5rem !important;
        margin-bottom: 0.5rem !important;
    }

    .bootstrap-select .dropdown-toggle .filter-option { 
        font-size: 12px !important;
    }

    .dropdown-item {
        font-size: 12px !important;
    }
    .form-control { 
        font-size: 12px !important;
    }
</style>
<div class="container" style="padding-top: 60px; padding-right: 5px ; padding-left: 5px; height: 100vh;">
    <div class="card-deck mb-3 ">
        <div class="card shadow-sm" style="height:auto">
            <div class="card-header">
                <div class="row ">

                    <div class="col" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal" style="font-size: 12px;"><b>Adjust DS</b></a>
                    </div>

                    <div class="col text-right" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal " style="font-size: 12px;"><b><?php echo e($tanggalll); ?></b></a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form id="send_adjustds" class="" action="<?php echo e(route('adjustds')); ?>" method="GET">
                    <?php echo csrf_field(); ?> 
                    <input type="hidden" id="nip" name="nip" value="<?php echo e($nip); ?>"  />
                    <input type="hidden" id="kdakses" name="kdakses" value="<?php echo e($kdakses); ?>"  />
                    <input type="hidden" id="kdotl" name="kdotl" value="<?php echo e($kdotl); ?>"  />
                    <input type="hidden" id="nmotl" name="nmotl" value="<?php echo e($nmotl); ?>"  />
                    <div class="form-group">
                        
                    <div class="input-group ">
                        <select class="form-control  form-select selectpicker" id="select_otlds" data-live-search="true">  
                            <option value="<?php echo e($kdotl); ?>#<?php echo e($nmotl); ?>"><?php if($kdotl != 'F'): ?> <?php echo e($nmotl); ?> <?php else: ?> Pilih Outlet <?php endif; ?> </option>
                            <?php $__currentLoopData = $alloutlet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrotl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($arrotl['KdOutlet']); ?>#<?php echo e($arrotl['NmOutlet']); ?>"><?php echo e($arrotl['NmOutlet']." (".$arrotl['KdOutlet'].")"); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select> 
                    </div>
                    
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black; min-width: 90px;">Tgl Terima
                            </span>
                        </div>

                        <input type="date" name="tgl_terimads" id="tgl_terimads" value="<?php echo e($plh_tglds); ?>"
                            class="form-control date_now align-middle" style="font-size: 12px; color:black;" required>
                    </div> 
                    
                </div>
                </form>
                <div class="text-center px-1 pb-2 mt-3">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-lg btn-block btn-success" id="Searching"
                                onclick="cari_kodeds()" style="width:100%; font-weight: 500; font-size: 12px;">
                                Cari Kode Terima
                            </button>
                        </div>
                    </div>
                </div>
                 
                <div class="content"> 
                    <div class="card-deck mb-3 ">
                        <div class="card mb-4 shadow-sm"> 
                            <div class="card-body text-left"  style="padding: 0.15rem !important;">    
                               <?php if(isset($dfterima)): ?>
                              
                                
                                <div class="content"> 
                                    <ul style="overflow-x: hidden; height: 70vh;  list-style-type: none; padding: 5px;" id="ul_adjustds">
                                        <?php $__currentLoopData = $dfterima; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $df): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       
                                        <li id="li_<?php echo e($df['kdterima']); ?>" class="bg-white rounded mb-2"  <?php if($df['isbatal'] == 'T'): ?> style="background: rgb(238 153 153 / 81%) !important;" <?php endif; ?>> 
                                            
                                            <div class="card-header text-center mb-1" style=" padding:5px !important;"><a
                                                    style="font-size: 14px; color:black;"><b><?php echo e($df['nm_sup']); ?> </b></a>
                                            </div> 
                                            <div class="shadow-sm rounded-2 bg-white p-1"<?php if($df['isbatal'] == 'T'): ?> style="background: rgb(238 153 153 / 81%) !important;" <?php endif; ?>>
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="text-left" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 90px; padding:0px"><a
                                                                style="font-size: 12px; color:black; "><b>Kd Terima </b></b></a>
                                                        </span><b>: </b>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;"><b> &nbsp; <?php echo e($df['kdterima']); ?> </b></a>
                                                </div>  
                                               
                                                <div class="input-group ">
                                                    <div class="input-group-prepend">
                                                        <span class="text-left" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 90px; padding:0px"><a
                                                                style="font-size: 12px; color:black; "><b>Tgl Terima </b></b></a>
                                                        </span><b>: </b>
                                                    </div>
                                                    <a style="font-size: 12px; color:black;"><b> &nbsp; <?php echo e($df['tgltrima']); ?> </b></a>
                                                </div>
                                                <div class="input-group mb-1">
                                                    <div class="input-group-prepend">
                                                        <span class="text-left" id="basic-addon3"
                                                            style="font-size: 10px; color:black; min-width: 100px; padding:0px"><a
                                                                style="font-size: 12px; color:black; "><b>Jml/ Kirim/ Order
                                                                </b></b></a>
                                                        </span><b>: </b>
                                                        
                                                    <a style="font-size: 12px; color:black;"><b> &nbsp;
                                                        <?php echo e($df['jmlbarang']); ?> / <?php echo e($df['totalkirim']); ?> / <?php echo e($df['totalorder']); ?> </b></a>
                                                    </div>
                                                </div>  
                                                <?php if($df['isbatal'] == 'F'): ?> 
                                                <div class="col py-1 px-5">
                                                    <button type="button" class="btn btn-sm btn-block btn-danger" id="Searching"
                                                        onclick="dlt_adjstds('<?php echo e($df['kdterima']); ?>')" style="width:100%; font-weight: 500; font-size: 12px;">
                                                        Adjust DS
                                                    </button>
                                                </div>  
                                                <?php elseif($df['isbatal'] == 'T'): ?>  
                                                <div style="  color: white; opacity: 75%;font-size: 25px;
                                            font-weight: bold;text-align: center;text-transform: uppercase;line-height:1;">
                                                CANCEL</div> 
                                                <?php endif; ?>
                                            </div>  
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>  
                            </div>
                                <?php else: ?>
                               
                                <div class="text-center ">
                                    <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>"
                                        background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop
                                        autoplay>
                                    </lottie-player>
                                    
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                                </div>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
    </div>

    
</div>

<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
</script>
<script>
     function cari_kodeds(){  
        var slctds = $('#select_otlds').val();
        var data = slctds.split('#');
        var kdotl = data[0];   
        var nmotl = data[1];  
        var tgalds = $('#tgl_terimads').val();
 
        if(kdotl == 'F' || kdotl == ''){
            Swal.fire({
            icon: 'info', 
            text: 'Outlet harus di pilih!!!',
            confirmButtonColor: '#cc1a0b',
            allowOutsideClick: false 
        }) 
        }else{
            loadingon(); 
            
             $("#kdotl").val(kdotl);
             $("#nmotl").val(nmotl);
            var inpt_tgl =   $("#select_otlds").val();
            var inpt_nor =   $("#tgl_terimads").val();
            console.log(inpt_nor+'===='+inpt_tgl); 
            $('#send_adjustds').submit();
                 
        }
    } 
    
    function dlt_adjstds(kdtrma){
        Swal.fire({
                    text: "Hapus Kode Terima "+kdtrma+"",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: "Tidak",
                    confirmButtonText: 'Ya, Kirim!' ,
                    reverseButtons: true,
                    allowOutsideClick: false 
                }).then((result) => {
                    if (result.isConfirmed){ 
                    loadingon(); 
                    $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo e(url("dltadjust_kodtrm")); ?>', 
                        data: {"_token": "<?php echo e(csrf_token()); ?>","nip":'<?php echo e($nip); ?>',"kdterima":kdtrma},
                        dataType: 'json',
                        success:function(data){
                            
                            console.log(data);
                            $('#loader').hide();
                            
                                swal.fire({
                                icon: 'success',
                                title: '',
                                text: 'Berhasil di hapus',
                                confirmButtonColor: '#cc1a0b',
                                allowOutsideClick: false 
                            }).then(function() { 
                                loadingon();
                                location.reload();
                            }); 
                                
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
            }) 
    }
</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_presence', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/msadjust/adjustdirectsply.blade.php ENDPATH**/ ?>