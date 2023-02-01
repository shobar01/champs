
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.'); ?>
<?php $__env->startSection('content'); ?> 
<style>
    .icon {
        /* width: 60;
        height: 60;
        background-color: #eee;
        border-radius: 15px; */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px
    }

    .iconarrow {

        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px
    }

    .badge span {
        background-color: #fffbec;
        width: 60px;
        height: 25px;
        padding-bottom: 3px;
        border-radius: 5px;
        display: flex;
        color: #fed85d;
        justify-content: center;
        align-items: center
    }

    .tx16 {
        font-size: 12px;
        font-weight: 600
    }

    .text2 {
        color: #a5aec0
    }

    .card {
        /* border: none; */
        border-radius: 20px
    }

    .btn-danger {
        color: #fff !important;
        background-color: #cc1a0b !important;
        border-color: #cc1a0b !important;
    } 
    .rdimg{
        width: 50px; height:40px; border-radius:10px;
    }
</style>
 


<div class="container" style="padding-top: 70px; padding-right: 10px; padding-left: 10px;  ">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <div class="row ">

                    <div class="col" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>Master Adjust</b></a>
                    </div> 
                    <div class=" text-right" style="padding: 0 10px 0 5px !important;">
                        <div id="gbl_rfrsh" type="button"  style=" font-weight: bold; font-size: 14px;"  onclick="rfrsh()"><i class='fa fa-refresh'
                            style='color: #000; margin: 0 5px 0 5px;'></i></div>
                    </div>
                </div> 
            </div>  
            <div class="mx-1 my-2" style=" height:75vh;"> 
                <ul style="overflow-x: hidden; height: 75vh; list-style-type: none; padding: 5px;" id="ul_masteradjust">  
                    <li onclick="btn_link('ms')">
                        <div class="card mb-2 shadow-sm bg-white " style="border-radius: 10px !important;">
                            <div class="btn btn-sm" >
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="icon"> 
                                            <img src="http://api.champ-group.com/ptsoutlet/public/assets/img/mspik.jpg" class="img-circle center rdimg" /> 
                                            </div>
                                        <div class="ml-2 c-details">
                                            <a class="tx16">Adjust Bill MS/Croco/Dewata</a> 
                                        </div>
                                    </div>

                                    <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div> 
                                </div>
                            </div>
                        </div> 
                    </li> 
                    <li onclick="btn_sw('msbrg')">
                        <div class="card mb-2 shadow-sm bg-white "  style="border-radius: 10px !important;">
                            <div class="btn btn-sm"  >
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="icon"> 
                                            <img src="http://api.champ-group.com/ptsoutlet/public/assets/img/mspik.jpg" class="img-circle center rdimg"
                                                /> 
                                            </div>
                                        <div class="ml-2 c-details">
                                            <a class="tx16">Add Barang MS/Croco/Dewata</a> 
                                        </div>
                                    </div>

                                    <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div> 
                                </div>
                            </div>
                        </div> 
                    </li> 
                    <li onclick="btn_link('ad')">
                        <div class="card mb-2 shadow-sm bg-white "  style="border-radius: 10px !important;">
                            <div class="btn btn-sm"  >
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="icon"> 
                                            <img src="http://api.champ-group.com/ptsoutlet/public/assets/img/mspik.jpg" class="img-circle center rdimg"
                                                /> 
                                            </div>
                                        <div class="ml-2 c-details">
                                            <a class="tx16">Add Menu MS/Croco/Dewata</a> 
                                        </div>
                                    </div>

                                    <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div> 
                                </div>
                            </div>
                        </div> 
                    </li> 
                    <li onclick="btn_lncatms()">
                        <div class="card mb-2 shadow-sm bg-white "  style="border-radius: 10px !important;">
                            <div class="btn btn-sm"  >
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="icon"> 
                                            
                                            <img src="http://api.champ-group.com/ptsoutlet/public/assets/img/mspik.jpg" class="img-circle center rdimg"/>
                                            
                                            </div>
                                        <div class="ml-2 c-details">
                                            <a class="tx16">Loncat Closing MS</a> 
                                        </div>
                                    </div>

                                    <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div> 
                                </div>
                            </div>
                        </div> 
                    </li> 
                    <li onclick="btn_link('ds')">
                        <div class="card mb-2 shadow-sm bg-white "  style="border-radius: 10px !important;">
                            <div class="btn btn-sm"  >
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="icon"> 
                                            <img src="http://api.champ-group.com/ptsoutlet/public/assets/img/cri-brand-logo.jpg" class="img-circle center rdimg"
                                                /> 
                                            </div>
                                        <div class="ml-2 c-details">
                                            <a class="tx16">Direct Supply</a> 
                                        </div>
                                    </div>

                                    <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div> 
                                </div>
                            </div>
                        </div> 
                    </li> 
                    <li onclick="btn_link('md')">
                        <div class="card mb-2 shadow-sm bg-white "  style="border-radius: 10px !important;">
                            <div class="btn btn-sm"  >
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="icon"> 
                                            <img src="http://api.champ-group.com/champs-mobile/public/resource/img/masterdevice.jpeg" class="img-circle center rdimg"
                                                /> 
                                            </div>
                                        <div class="ml-2 c-details">
                                            <a class="tx16">Master Device</a> 
                                        </div>
                                    </div>

                                    <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div> 
                                </div>
                            </div>
                        </div> 
                    </li> 
                    <li onclick="btn_link('sw')">
                        <div class="card mb-2 shadow-sm bg-white "  style="border-radius: 10px !important;">
                            <div class="btn btn-sm"  >
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="icon"> 
                                            <img src="http://api.champ-group.com/champs-mobile/public/resource/img/switchserver.png" class="img-circle center rdimg"
                                                /> 
                                            </div>
                                        <div class="ml-2 c-details">
                                            <a class="tx16">Switch Server MS</a> 
                                        </div>
                                    </div>

                                    <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div> 
                                </div>
                            </div>
                        </div> 
                    </li> 
                   
                    <li onclick="btn_link('ft')">
                        <div class="card mb-2 shadow-sm bg-white "  style="border-radius: 10px !important;">
                            <div class="btn btn-sm"  >
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="icon"> 
                                            <img src="http://api.champ-group.com/champs-mobile/public/resource/img/ft.jpeg" class="img-circle center rdimg"
                                                /> 
                                            </div>
                                        <div class="ml-2 c-details">
                                            <a class="tx16">Adjust PosMobile FT</a> 
                                        </div>
                                    </div>

                                    <div class="iconarrow"> <i class="fa fa-angle-right" aria-hidden="true"></i></div> 
                                </div>
                            </div>
                        </div> 
                    </li> 
                </ul>
            </div>
        </div>  
    </div>
</div>

<?php echo $__env->make('msadjust.mdl_addbrgms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('msadjust.mdl_loncatms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('public/resource/js/lottie.js')); ?>"></script>
<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });   

        function btn_link(isi){ 
            var linkkk ;
             if(isi == 'ms'){
                linkkk = "http://api.champ-group.com/champs-mobile/adjustms?kdakses=<?php echo e($kdakses); ?>&nip=<?php echo e($nip); ?>";
             }else if(isi == 'ds'){
                linkkk = "http://api.champ-group.com/champs-mobile/adjustds?kdakses=<?php echo e($kdakses); ?>&nip=<?php echo e($nip); ?>";
             }else if(isi == 'md'){
                linkkk = "http://api.champ-group.com/champs-mobile/master?kdakses=<?php echo e($kdakses); ?>&nip=<?php echo e($nip); ?>";
             }else if(isi == 'ft'){
                linkkk = "http://api.champ-group.com/new_posmobile/DashHome?kdakses=<?php echo e($kdakses); ?>&nip=<?php echo e($nip); ?>";
             } else if(isi == 'sw'){
                linkkk = "http://api.champ-group.com/champs-mobile/masterswitch?kdakses=<?php echo e($kdakses); ?>&nip=<?php echo e($nip); ?>";
             }  else if(isi == 'ad'){
                linkkk = "http://api.champ-group.com/champs-mobile/viewAddMenu?kdakses=<?php echo e($kdakses); ?>&nip=<?php echo e($nip); ?>";
             } 

            $('#loader').show(); 
            window.location.href=linkkk;
            $(document).ready(function () {  
            var refreshId = setInterval(function () {
                $('#loader').hide();
                }, 5000);
                $.ajaxSetup({ cache: false });
            });
            // alert(linkk);
             
        }
        function btn_sw(isi){ 
            if(isi == 'sw'){ 
                var nm = '<?php echo e($dflog[0]['nama']); ?> (<?php echo e($dflog[0]['wktupdate']); ?>)';
                $('#tx_msswitchupdt').val(nm);
                document.getElementById('mdl_switch').style.display='block'; 
            }else if(isi == 'msbrg'){ 
                document.getElementById('mdl_addbrg').style.display='block'; 
            }  
        }
        function btn_lncatms(){  
            document.getElementById('mdl_loncatms').style.display='block';   
        }
</script> 
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_presence', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/msadjust/masterdash.blade.php ENDPATH**/ ?>