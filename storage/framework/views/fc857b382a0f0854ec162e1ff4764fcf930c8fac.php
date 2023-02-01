
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
</style>


<div class="container" style="padding-top: 70px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal" style="font-size: 16px; ">Setting Meja (<?php echo e($ikdoutlet); ?>)</h4>
            </div>
            <div class="card-body">

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
                    <?php if(isset($df_meja)): ?>
                    <ul style="overflow-x: hidden; height: 450px; list-style-type: none; padding: 5px;">
                        <?php $__currentLoopData = $df_meja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12" style="padding: 0px  0px  0px  0px !important;">
                            <div class="card-header shadow mt-2"
                                style="background-color: #FFFFFF !important; border-radius: 5px !important; padding: 5px 5px 5px 5px !important;">
                                <div class="user">

                                    <div class="user-info">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    style="font-size: 12px; color:black;  min-width: 100px;">Meja
                                                    Number</span>
                                            </div>
                                            <input type="number" class="form-control" aria-label="Small"
                                                aria-describedby="inputGroup-sizing-sm" style="font-weight: bold;"
                                                value="<?php echo e($dfm['nomeja']); ?>" readonly>
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"
                                                    style="font-size: 12px; color:black;  min-width: 100px;">Kapasitas</span>
                                            </div>
                                            <input type="number" class="form-control" aria-label="Small"
                                                aria-describedby="inputGroup-sizing-sm" value="<?php echo e($dfm['kapasitas']); ?>"
                                                id="idmj<?php echo e($dfm['nomeja']); ?>"
                                                onkeypress="itknenter('<?php echo e($dfm['nomeja']); ?>#<?php echo e($dfm['smokarea']); ?>')">
                                        </div>
                                    </div>
                                    <div class=" img text-center" style="">
                                        <input type="hidden" name="hdidcxbx<?php echo e($dfm['nomeja']); ?>"
                                            id="hdidcxbx<?php echo e($dfm['nomeja']); ?>" value="<?php echo e($dfm['smokarea']); ?>">
                                        <input type="checkbox" id="idcxbx<?php echo e($dfm['nomeja']); ?>" data-toggle="toggle"
                                            data-on="Smoking" data-off="Non&nbsp;Smoking" data-onstyle="success"
                                            data-offstyle="danger" data-height="62" data-width="100"
                                            value="<?php echo e($dfm['smokarea']); ?>" <?php if($dfm['smokarea']=='T' ): ?> checked <?php endif; ?>
                                            onchange="idcxbx('<?php echo e($dfm['nomeja']); ?>#hdidcxbx<?php echo e($dfm['nomeja']); ?>#<?php echo e($dfm['kapasitas']); ?>', this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
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
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/mssettingmeja/msmeja.blade.php ENDPATH**/ ?>