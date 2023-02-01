
<link href="<?php echo e(asset('public/resource/css/style_viewcogs.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.'); ?>
<?php $__env->startSection('content'); ?>

<div class="container" style="padding-top: 70px; padding-right: 5px; padding-left: 5px;">
    <div class="card-deck ">
        <div class="card shadow-sm">
            <div class="card-header">
                <div class="row">
                    <div class="col" style="padding: 0 5px 0 10px !important;">
                        
                        <a class="font-weight-normal  align-middle" style=" font-size: 14px; "><b>Direct Supply</b></a>
                    </div>
                    <div class="col text-right" style="padding: 0 10px 0 5px !important;">
                        <div id="gbl_rfrsh" type="button" style=" font-weight: bold; font-size: 14px;"
                            onclick="rfrsh()"><i class='fa fa-refresh' style='color: #000; margin: 0 5px 0 5px;'></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="padding: 0 5px 10px 5px !important;">

                
                <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">
                            <form action="<?php echo e(route('dashdirecsupply')); ?>" method="GET" id="form_ds">

                                <input type="hidden" name="kdakses" id="kdakses" value="<?php echo e($kdakses); ?>">
                                <input type="hidden" name="nip" id="nip" value="<?php echo e($nip); ?>">
                                <input type="hidden" name="nipam" id="nipam" value="<?php echo e($nip); ?>">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text form-control-sm" id="basic-addon3"
                                            style="font-size: 12px; background:#cc1a0b; color:white; min-width: 80px;  font-weight: bold; ">Pilih
                                            AM
                                        </span>
                                    </div>
                                    <?php if($kdakses == 'AVXXX' || $kdakses == 'AVXX3'): ?>
                                    <select class="form-control form-control-sm" name="nipam" id="amnips"
                                        onchange="piliham()"
                                        style=" background:transparent; font-size: 12px;  color:black;  font-weight: bold;">
                                        <?php $__currentLoopData = $am; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($sam['nip']); ?>" <?php if($nip==$sam['nip'] ): ?> selected <?php endif; ?>>
                                            <?php echo e($sam['nmarea']); ?> (<?php echo e($sam['nip']); ?>)
                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php endif; ?>
                                </div>


                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text form-control-sm" id="basic-addon3"
                                            style="font-size: 12px; background:#cc1a0b; color:white; min-width: 80px;  font-weight: bold; ">Tanggal
                                        </span>
                                    </div>
                                    <input type="date" name="spin_tglds" id="spin_tgldss" value="<?php echo e($ttgl); ?>"
                                        class="form-control form-control-sm"
                                        style="font-size: 12px; color:black;  font-weight: bold;" max="<?php echo e($date_max); ?>"
                                        min="<?php echo e($date_min); ?>" onchange="pilihtgl()">
                                </div>

                            </form>

                            <?php if($jsrsltds['lsoutlet']==null): ?>
                            <div class="text-center ">
                                <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>"
                                    background="transparent" speed="1"
                                    style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                                </lottie-player>
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                            </div>
                            <?php else: ?>
                            <div class="input-group mb-3">
                                <input id="srch_direct" type="text" class="form-control" placeholder="Searching"
                                    aria-label="Search" aria-describedby="basic-addon2">
                            </div>
                            <div class="table-responsive" style="overflow-x: hidden">

                                <div class="table-responsive" style="overflow-x: hidden; height: 450px; ">
                                    <table id="tbldirects" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="ftsize12l xxx">Outlet</th>
                                                <th class="red">Supplier</th>
                                                <th class="ftsize12">Order</th>
                                                <th class="ftsize12">Terima</th>
                                                <th class="ftsize12">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody id="">
                                            <?php $__currentLoopData = $jsrsltds['lsoutlet']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <tr>
                                                

                                                <td class="ftsize12l aaa" style=" max-width:50px !important">
                                                    <?php echo e(ucwords(strtolower(
                                                    $dfo['nmoutlet']))); ?>

                                                </td>
                                                <td class="ftsize12l" style=" max-width:30px !important">
                                                    <?php echo e(ucwords(strtolower(
                                                    $dfo['nmsup']))); ?>

                                                </td>
                                                <td class="ftsize12" style=" max-width: 5px">
                                                    <?php echo e($dfo['jmlorder']); ?></td>
                                                <td class="ftsize12" style=" max-width: 3px">
                                                    <?php echo e($dfo['jmlterima']); ?></td>
                                                <td class="ftsize12 " style=" max-width: 10px">
                                                    <a class='btn btn-sm btn-danger mr-1' title='Ip'><i
                                                            class='fa fa-eye' style='color: #fff; margin: 0 0px 0 0px; '
                                                            onclick="btndet('<?php echo e(ucwords(strtolower($dfo['nmoutlet']))); ?>#<?php echo e($dfo['kdoutlet']); ?># <?php echo e(ucwords(strtolower($dfo['nmsup']))); ?>#<?php echo e($dfo['kdsup']); ?>')"></i></a>
                                                </td>

                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<?php echo $__env->make('directsuply.m_dsdet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    dkrdt=$('#tbldirects').DataTable({
            "bLengthChange": false, 
            "paging":false, 
            "info":true, 
            "lengthMenu": [30],  
            "dom":"lrtip" ,  
            "order": [[ 2, "desc" ]], 
            });
            $('#srch_direct').keyup(function(){  
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
        loadingon();
        var data = isi.split('#');
        var nmotl = data[0]; 
        var kdotl = data[1];  
        var nmsup = data[2];  
        var kdsup = data[3];   
      $('#ds_nmotl').html('Detail <br>'+nmotl);
      $('#ds_nmsup').html(nmsup); 
      $('#tbl_detsup').empty();
      console.log(data);
      
        // $('#ds_det').modal('show');
      $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("dfdet_dsuplier")); ?>',
            data: {"_token": "<?php echo e(csrf_token()); ?>","tanggal":'<?php echo e($ttgl); ?>',"nipam":'<?php echo e($nip); ?>',"kdoutlet":kdotl,"kdsup":kdsup},
            dataType: 'json',
            success:function(data){
                $('#loader').hide();
                var len = data.length;
                for (let i = 0; i < len; i++) {
                    var kdoutlet    = data[i]['kdoutlet'];
                    var nmoutlet    = data[i]['nmoutlet'];
                    var kdsup       = data[i]['kdsup'];
                    var nmsup       = data[i]['nmsup'];
                    var kdbarang    = data[i]['kdbarang']; 
                    var nmbarang    = data[i]['nmbarang']; 
                    var jmlorder    = data[i]['jmlorder']; 
                    var jmlterima   = data[i]['jmlterima']; 
                    var satuan      = data[i]['satuan']; 
                        var rowmenu = '<li id="rm'+i+'" class="shadow p-2 mb-3 bg-white rounded" style="box-shadow: 0 0.5rem 0.5rem rgb(0 0 0 / 15%) !important;">'
                            +'<div class="ftsize12" >' 
                            +'<span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black;  padding:0px"><a style="font-size: 12px; color:black; "><b>'+nmbarang+'</b></a>'
                            +'</span>'  
                            +'</div>' 
                            +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                            +' <span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 50px; padding:0px"><a style="font-size: 12px; color:black; "><b>Order</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<div class="input-group-prepend">'
                            +'<a style="font-size: 12px; color:black; min-width: 50px;"><b> : '+jmlorder+'</b></a>' 
                            +' <span class="" id="basic-addon3"'
                            +'style="font-size: 10px; color:black; min-width: 50px; padding:0px"><a style="font-size: 12px; color:black; "><b>Terima</b></a>'
                            +'</span>' 
                            +'</div>' 
                            +'<a style="font-size: 12px; color:black; min-width: 50px;"><b> : '+jmlterima+'</b></a>' 
                            +'</div>'
                            +'</li>';
                       
                        // var rowmenu = '<tr><td class="ftsize12l aaa" style="height: 35px !important;" width="35%" >'+menu+'</td><td class="ftsize12l">'+kdmenu+'</td><td class="ftsize12l"  >'+totalqty+'</td><td class="ftsize12r" >Rp.'+new Intl.NumberFormat('id-ID').format(totalharga)+'</td></tr>';
                        $('#tbl_detsup').append(rowmenu); 
                }  
                
      document.getElementById('ds_det').style.display='block';  
            },
            error: function () {
                $('#loader').hide();
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Server Kita Bermasalah nih!",
                    allowOutsideClick: false 
                });
            }
        });
    }  

    function pilihtgl(){ 
        loadingon();
            $('#form_ds').submit();
        }
    function piliham(){ 
        loadingon();
        $('#form_ds').submit();
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
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/directsuply/dash_ds.blade.php ENDPATH**/ ?>