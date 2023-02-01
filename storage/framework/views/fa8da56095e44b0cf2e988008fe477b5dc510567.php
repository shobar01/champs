
<link href="<?php echo e(asset('public/resource/css/style_viewcogs.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.'); ?>
<?php $__env->startSection('content'); ?>

<div class="container" style="padding-top: 70px;">
    <div class="card-deck ">
        <div class="card shadow-sm">
            <div class="card-header">
                <div class="row">
                    <div class="col" style="padding: 0 5px 0 10px !important;">
                        
                        <a class="font-weight-normal  align-middle" style=" font-size: 14px; "><b>Log Kredit
                                (Sisa
                                <?php echo e($jsrsltlogk['sisa']); ?>)</b></a>
                    </div>
                    <div class="col text-right" style="padding: 0 10px 0 5px !important;">
                        <div id="gbl_rfrsh" type="button" style=" font-weight: bold; font-size: 14px;"
                            onclick="rfrsh()"><i class='fa fa-refresh' style='color: #000; margin: 0 5px 0 5px;'></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="padding: 0 10px 10px 10px !important;">

                
                <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">
                            <div class="input-group mb-3">
                                <input id="srch_krdt" type="text" class="form-control" placeholder="Searching"
                                    aria-label="Search" aria-describedby="basic-addon2">
                            </div>

                            <?php if(isset($jsrsltlogk['dtoutlet'])): ?>
                            <div class="table-responsive" style="overflow-x: hidden">

                                <div class="table-responsive" style="overflow-x: hidden; height: 450px; ">
                                    <table id="tbllogkredit" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="ftsize12l xxx">Outlet</th>
                                                <th class="ftsize12">IP</th>
                                                <th class="red">Sisa</th>
                                                <th class="ftsize12">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tblogkredit">
                                            <?php $__currentLoopData = $jsrsltlogk['dtoutlet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <tr>
                                                

                                                <td class="ftsize12l aaa" style=" max-width:70px !important">
                                                    <?php echo e(ucwords(strtolower(
                                                    $dfo['NmOutlet']))); ?>

                                                </td>
                                                <td class="ftsize12l" style=" max-width:50px">
                                                    <?php echo e($dfo['ip']); ?>

                                                </td>
                                                <td class="red" style=" max-width: 30px">
                                                    <?php echo e($dfo['sisa']); ?></td>
                                                <td class="ftsize12 " style=" max-width: 80px">

                                                    <a class='btn btn-sm btn-danger mr-1' title='Ip'><i
                                                            class='fa fa-database'
                                                            style='color: #fff; margin: 0 5px 0 5px; '
                                                            onclick="btndet('<?php echo e($dfo['ip']); ?>#<?php echo e($dfo['kdoutlet']); ?>')"></i></a>
                                                    <a class='btn btn-sm btn-primary ' title='Actionss'><i
                                                            class='fa fa-pencil'
                                                            style='color: #fff; margin: 0 5px 0 5px; '
                                                            onclick="btndetket('<?php echo e($dfo['kdoutlet']); ?>#<?php echo e(ucwords(strtolower($dfo['NmOutlet']))); ?>#<?php echo e($dfo['ip']); ?>#<?php echo e($dfo['sisa']); ?>')"></i></a>
                                                </td>

                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="text-center ">
                                <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>"
                                    background="transparent" speed="1"
                                    style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
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

<?php echo $__env->make('logkredit.m_dashupip', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('logkredit.m_dashupket', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    dkrdt=$('#tbllogkredit').DataTable({
            "bLengthChange": false, 
            "paging":false, 
            "info":true, 
            "lengthMenu": [30],  
            "dom":"lrtip" ,  
            "order": [[ 2, "desc" ]], 
            });
            $('#srch_krdt').keyup(function(){  
                dkrdt.search($(this).val()).draw();    
        }) ;   

    $.ajax({
        success: function () {
            $("#id_footerr").addClass('fixed-bottom');
        }
        }); 
</script>
<script>
    function btndet(isi){  
        var data = isi.split('#');
        var ipotl = data[0]; 
        var kdotl = data[1];  
      $('#tx_dashupip').val(ipotl);
      $('#tx_dashupkdotl').val(kdotl);

      document.getElementById('up_ip').style.display='block';  
    } 
    function btndetket(isi){   
        var data = isi.split('#');
        var kdotl = data[0]; 
        var nmotl = data[1]; 
        var ipotl = data[2]; 
        var sisal = data[3]; 
        $('#tx_ketdash').html(nmotl+' ('+kdotl+')');
        $('#tx_dashupketsisa').val(sisal);
        $('#tx_dashupketip').val(ipotl);
        $('#tx_dashupkdotl').val(kdotl);

        document.getElementById('up_ket').style.display='block';  
    }
</script>
<script>
    function senddash_upket(tipe){
        // kdoutlet,tanggal,nipcek,ket
        var totl =  $('#tx_dashupkdotl').val();  
        var tipp =  $('#tx_dashupketip').val(); 
        var tip =  $('#tx_dashupip').val(); 
        var tnip =  '<?php echo e($nip); ?>'; 
        var tket =  $('#tx_ket').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        if(tipe == 'A'){ 
                jsn_upket(tipe); 
        }else{
            if (tket == '' || tket == null) {
                $('#loader').hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Catatan tidak boleh kosong!',
                    confirmButtonColor: '#cc1a0b',
                    allowOutsideClick: false, 
                }) 
            } else { 
                $('#loader').hide(); 
                jsn_upket(tipe);
            }
        }
        
      } 
      function jsn_upket(tipe){
        
        var tipp,totl;
        if(tipe == 'A'){
            tipp =  $('#tx_dashupip').val();
            totl =  $('#tx_dashupkdotl').val();
            
        }else{
            tipp =  $('#tx_dashupketip').val();
            totl =  $('#tx_dashupkdotl').val(); 
        }
          
        var tnip =  '<?php echo e($nip); ?>'; 
        var tket =  $('#tx_ket').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
  
                console.log(totl+"=="+ tipp+"=="+ tnip+"=="+tket);
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("submit_upket")); ?>', 
             // kdoutlet,tanggal,nipcek,ket,ipdb
            data: {"_token": "<?php echo e(csrf_token()); ?>","tipe":tipe,"nipcek":'<?php echo e($nip); ?>',"kdoutlet":totl,"ket":tket,"tipp":tipp},
            dataType: 'json',
            success:function(data){
                
                console.log(data);
                $('#loader').hide();
                if(data['stupdate']==false){
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/logkredit/dash_logkredit.blade.php ENDPATH**/ ?>