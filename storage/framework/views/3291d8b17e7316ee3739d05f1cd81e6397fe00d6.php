
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>
<style>
    .user {
        display: flex;
        margin-top: auto;
        min-width: 100%;
    }

    .user img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

    .user-info h5 {
        margin: 0;
    }

    .user-info small {
        color: #545d7a;
    }

    .btn {
        font-size: 0.8rem !important;
    }

    .buttonoff:hover {
        background-color: green;
    }

    .buttonon {
        /* background-image: url('resource/img/mejaon.png'); */
        background-size: cover;
        background-color: transparent;
        width: 90px;
        height: 90px;
        font-size: 1.5rem;
        font-weight: bold;
        color: #000;
        border: none;
        margin: 0 10px;
    }

    .buttonon:hover {
        background-color: #000;
        border-radius: 50%;
    }

    .btn-circle.btn-xl {
        width: 100px;
        height: 100px;
        padding: 13px 18px;
        border-radius: 60px;
        font-size: 15px;
        text-align: center;
    }

    .br {
        display: block;
        margin-bottom: 0em;
    }

    .brmedium {
        display: block;
        margin-bottom: 1em;
    }

    .brlarge {
        display: block;
        margin-bottom: 2em;
    }

    .brxsmall {
        display: block;
        margin-bottom: -.4em;
    }
</style>


<div class="container" >
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal" style="font-size: 16px; ">Setting Meja (<?php echo e($ikdoutlet); ?>)</h4>
            </div>
            <div class="card-body" style="padding: 10px 5px 10px 5px !important;">
                <?php if($kdakses != 'AVMS2'): ?>

                <form id="send_kdotl" class="" action="<?php echo e(route('msetmeja')); ?>" method="GET">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="kdotlmj" id="kdotlmj" value="<?php echo e($ikdoutlet); ?>">
                </form>
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3"
                            style="font-size: 14px; color:black;">Outlet&nbsp;
                            &nbsp; : </span>
                    </div>

                    <select class="form-control " name="plhkdotl" id="plhkdotl" onchange="plhkdtl_meja()">
                        <?php $__currentLoopData = $dfotl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($otl['kdoutlet']); ?>" <?php if($ikdoutlet==$otl['kdoutlet'] ): ?> selected <?php endif; ?>>
                            <?php echo e($otl['sngktotl']); ?> (<?php echo e($otl['kdoutlet']); ?>)
                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <?php endif; ?>
                <div class="text-left">
                    <?php if(isset($df_meja)): ?> <div class="table-responsive" style="overflow-x: hidden; height: 460px;">
                        <div class="row">
                            <?php $__currentLoopData = $df_meja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                            <div class="col-3 m-2">
                                <button type="button" class="btn btn-dark btn-circle btn-xl"
                                    style="<?php if($dfm['smokarea'] =='T'): ?> background: #cc1a0b; <?php endif; ?> "
                                    onclick="btn_upmeja('<?php echo e($dfm['nomeja']); ?>#<?php echo e($dfm['kapasitas']); ?>#<?php echo e($dfm['smokarea']); ?>')">
                                    <p class="m-0">
                                        <span
                                            style="font-size:30px; font-weight: bold; margin-bottom: 5px;"><?php echo e($dfm['nomeja']); ?></span>
                                        <span class="brxsmall" style="font-size:9px;"><?php if($dfm['smokarea']
                                            =='T'): ?>Smoking <?php else: ?> Non Smoking <?php endif; ?></span>
                                        <span class="brxsmall" style="font-size:9px;"><?php echo e($dfm['kapasitas']); ?>

                                            Pax</span>
                                    </p>
                                </button>
                            </div>

                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-plugin" onclick="btn_tmbhmeja()">
        <a class="fixed-plugin-button text-white position-fixed px-3 py-2">
            <i class="material-icons py-2 fas fa fa-plus"></i>
            
        </a>
    </div>
</div>

<?php echo $__env->make('mssettingmeja.m_upmeja', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('mssettingmeja.m_tmbhmeja', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    function btn_upmeja(isi){  
        // nomeja,kapasitas,smokarea
        var data = isi.split('#');
        var nomja = data[0]; 
        var kpsts = data[1];  
        var smoke = data[2];  
      $('#tx_ketupmeja').html('Setting Meja ('+nomja+')');
      $('#tx_kpsts').val(kpsts);
      $('#tx_nomeja').val(nomja);

      $(document).ready(()=>{
            $("#spin_areasmking").val(smoke);
        }); 
    //   $('#tx_dashupkdotl').val(kdotl);

      document.getElementById('up_meja').style.display='block';  
    } 
    function idcxbx(isi, thiss){ 
        var dataa       = isi.split('#');
        var idcxbx      = dataa[0]; 
        var hdidcxbx    = dataa[1]; 
        var kpsts       = dataa[2];  
        var cek = thiss.checked; 
        if(cek == true){
            $('#'+hdidcxbx).val('T');
        }else if(cek == false){
            $('#'+hdidcxbx).val('F');
        } 
        var smka = $('#'+hdidcxbx).val();
        jsn_sbmtupdt(idcxbx+'#'+kpsts+'#'+smka);
    } 
 

    function btn_tmbhmeja(){   
      document.getElementById('tmbh_meja').style.display='block';  
    } 
</script>
<script>
    $.ajax({
        success: function () {
            $("#id_footerr").addClass('fixed-bottom');
        }
        }); 
</script>

<script>
    function plhkdtl_meja(){ 
            var plhkdotl = $('#plhkdotl').val();
            $('#kdotlmj').val(plhkdotl);  
            $('#send_kdotl').submit();
        }
    function itknenter(isi){ 
        
        var dataa   = isi.split('#');
        var idmj    = dataa[0]; 
        var vlcxbx  = dataa[1]; 

        var input = document.getElementById('idmj'+idmj);

        input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            
        var inputaa =  document.getElementById('idmj'+idmj).value;
            jsn_sbmtupdt(idmj+'#'+inputaa+'#'+vlcxbx);
        }
        }); 
    }

</script>
<script>
    function jsn_sbmtupdt(isi){
        var dataa = isi.split('#');
        var nmeja=dataa[0]; 
        var kpsts=dataa[1]; 
        var smoke=dataa[2]; 
        var kdotlmj; 
        if ('<?php echo e($kdakses); ?>' == 'AVMS2'){
            kdotlmj= '<?php echo e($ikdoutlet); ?>'; 
        }else{
            kdotlmj= $('#kdotlmj').val(); 
        }
          
        console.log('Bari '+nmeja+'==='+kpsts+'==='+smoke+'===');  
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("sbt_updtsetmja")); ?>',
            // kdotl, kdakses, nomeja, kapasitas, smokarea
            data: {"_token": "<?php echo e(csrf_token()); ?>","kdotl":kdotlmj,"kdakses":'<?php echo e($kdakses); ?>',"nomeja":nmeja,"kapasitas":kpsts,"smokarea":smoke},
            dataType: 'json',
            success:function(data){
                console.log(data);
                $('#loader').hide(); 
                if(data['UpdtB']==false){
                    swal.fire({
                    icon: 'error',
                    title: 'Opps!!',
                    text: 'Gagal Update data.',
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
                    text: 'Berhasil Update data.',
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/mssettingmeja/msmejabulet.blade.php ENDPATH**/ ?>