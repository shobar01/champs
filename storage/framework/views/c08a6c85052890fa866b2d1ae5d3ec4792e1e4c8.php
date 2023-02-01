
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('public/resource/css/style_viewcogs.css')); ?>" rel="stylesheet" type="text/css">

<style>
    hr.rounded {
        border-top: 5px solid #FEBD01;
        border-radius: 5px;
    }

    .inptklmjml {
        font-size: 14px;
        color: black;
        /* font-weight: bold; */
        background: white !important;
    }

    .inptklmjmlbld {
        font-size: 14px;
        color: black;
        font-weight: bold;
        background: white !important;
        font-weight: bold;
    }

    #chart {
        max-width: 650px;
        margin: 35px auto;
    }

    #chart_pie {
        max-width: 650px;
        margin: 35px auto;
    }
</style>

<script>
    window.Promise ||
      document.write(
        '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
      )
    window.Promise ||
      document.write(
        '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
      )
    window.Promise ||
      document.write(
        '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
      )
</script>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>



<div class="container" style="padding-top: 70px; padding-right: 0px; padding-left: 0px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>Permohonan Perubahan Data
                        Karyawan</b></a>
            </div>
            <div class="card-body">
                <form>
                    <div class="col-md-12" style="padding : 0;">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; background:#cc1a0b; color:white; min-width: 120px;  font-weight: bold; ">Agama
                                </span>
                            </div>
                            <select class="form-control form-control-sm " name="spin_agm" id="spin_agm"
                                style=" font-weight: bold; color:black;">
                                <?php $__currentLoopData = $dfagma; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfagm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($dfagm['agama']); ?>" <?php if($df_user['agama']==$dfagm['agama'] ): ?> selected
                                    <?php endif; ?>>
                                    <?php echo e($dfagm['agama']); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; background:#cc1a0b; color:white; min-width: 120px;  font-weight: bold; ">Status
                                </span>
                            </div>
                            <select class="form-control form-control-sm " name="spin_sttskel" id="spin_sttskel"
                                style=" font-weight: bold; color:black;">
                                <?php $__currentLoopData = $df_kwin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfkwin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($dfkwin['status_kel']); ?>"
                                    <?php if($df_user['status_kel']==$dfkwin['status_kel'] ): ?> selected <?php endif; ?>>
                                    <?php echo e($dfkwin['status_kel']); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; background:#cc1a0b; color:white; min-width: 120px;  font-weight: bold;">Tgl
                                    Menikah</span>
                            </div>
                            <input type="date" name="spin_tglmnkh" id="spin_tglmnkh" value="<?php echo e($df_user['tgl_menikah']); ?>"
                                class="form-control form-control-sm date_now"
                                style="font-size: 14px; color:black;  font-weight: bold;" required>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; background:#cc1a0b; color:white; min-width: 120px;  font-weight: bold; ">Jumlah
                                    Anak
                                </span>
                            </div>
                            <select class="form-control form-control-sm " name="spin_jmlank" id="spin_jmlank"
                                style=" font-weight: bold; color:black;">
                                <?php for($x = 0; $x <= 10; $x++): ?> { <option value="<?php echo e($x); ?>" <?php if($x==$df_user['jml_anak'] ): ?>
                                    selected <?php endif; ?>>
                                    <?php echo e($x); ?> Anak
                                    </option>
                                    }
                                    <?php endfor; ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; background:#cc1a0b; color:white; min-width: 120px;  font-weight: bold; ">Jenis
                                    Kelamin
                                </span>
                            </div>

                            <select class="form-control form-control-sm " name="spin_jnsklmn" id="spin_jnsklmn"
                                style=" font-weight: bold; color:black;">
                                <?php $__currentLoopData = $df_jnsklm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dfklm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($dfklm['klm']); ?>" <?php if($df_user['jns_kelamin']==$dfklm['klm'] ): ?>
                                    selected <?php endif; ?>>
                                    <?php echo e($dfklm['klm']); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; background:#cc1a0b; color:white; min-width: 120px;  font-weight: bold;">Tgl
                                    Lahir</span>
                            </div>
                            <input type="date" name="spin_tgllhr" id="spin_tgllhr" value="<?php echo e($df_user['tgl_lahir']); ?>"
                                class="form-control form-control-sm date_now"
                                style="font-size: 14px; color:black;  font-weight: bold;" required>
                        </div>
                        <div class="input-group pt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; color:black; min-width: 120px;  font-weight: bold;">Tempat
                                    Lahir
                                </span>
                            </div>
                            <input id="tx_tmptlhir" class="form-control form-control-sm textleft inptklmjmlbld"
                                type="text" value="<?php echo e($df_user['tpt_lahir']); ?>">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; color:black; min-width: 120px;  font-weight: bold;">WhatsApp
                                </span>
                            </div>
                            <input id="tx_nowa" class="form-control form-control-sm textleft inptklmjmlbld"
                                type="number" value="<?php echo e($df_user['telepon']); ?>" required>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3"
                                    style="font-size: 14px; color:black; min-width: 120px;  font-weight: bold;">Email
                                </span>
                            </div>
                            <input id="tx_almtemail" class="form-control form-control-sm textleft inptklmjmlbld"
                                type="text" value="<?php echo e($df_user['alm_email']); ?>" required>
                        </div>

                        <div class="flex-md-row mb-2 mt-2">

                            <div class="col-md-12" style="padding: 0px !important;">
                                <div class="input-group-text">
                                    <span id="basic-addon3"
                                        style="font-size: 14px; color:black;  font-weight: bold;">Alamat
                                    </span>
                                </div>
                                

                                <textarea id="tx_almt" class="form-control form-control-sm textleft inptklmjmlbld"
                                    cols="40" rows="5" required><?php echo e($df_user['alamat1']); ?></textarea>
                            </div>
                        </div>

                    </div>
                </form>


                <div class="card flex-md-row mb-4 box-shadow h-md-250">

                    <div class="col-md-12" style="padding: 0px !important;">
                        <div class="card-header text-center">

                            <button class=" col-md-12 btn btn-lg btn-rounded mb-1 mt-2" type="button"
                                style="font-size: 14px; color:white;  min-width: 150px;  font-weight: bold; padding-left: 10px !important; background: #cc1a0b ;"
                                onclick="send_permohonan()">Kirim Permohonan</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>


<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });   
</script>
<script>
    function send_permohonan(){
        // spin_agm,spin_sttskel,spin_tglmnkh,spin_jmlank,spin_jnsklmn,spin_tgllhr,tx_tmptlhir,tx_nowa,tx_almtemail,tx_almt
        var agm =  $('#spin_agm').val();
        var stk =  $('#spin_sttskel').val();
        var tkh =  $('#spin_tglmnkh').val();
        var jlk =  $('#spin_jmlank').val();
        var jnk =  $('#spin_jnsklmn').val();
        var tlh =  $('#spin_tgllhr').val();
        var tlr =  $('#tx_tmptlhir').val().replace(/(?:\r\n|\r|\n)/g, ' ');
        var twa =  $('#tx_nowa').val().replace(/(?:\r\n|\r|\n)/g, ' ');
        var tem =  $('#tx_almtemail').val().replace(/(?:\r\n|\r|\n)/g, ' ');
        var tat =  $('#tx_almt').val().replace(/(?:\r\n|\r|\n)/g, ' ');
       
             
                if ('<?php echo e($df_user['agama']); ?>'==agm && '<?php echo e($df_user['status_kel']); ?>'==stk && '<?php echo e($df_user['tgl_menikah']); ?>'==tkh && '<?php echo e($df_user['jml_anak']); ?>'==jlk
                    && '<?php echo e($df_user['jns_kelamin']); ?>'==jnk && '<?php echo e($df_user['tgl_lahir']); ?>'==tlh && '<?php echo e($df_user['tpt_lahir']); ?>'==tlr
                    && '<?php echo e($df_user['telepon']); ?>'==twa && '<?php echo e($df_user['alm_email']); ?>'==tem&& '<?php echo e($df_user['alamat1']); ?>'==tat) {
                        $('#loader').hide();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Data tidak ada yang di rubah!',
                            confirmButtonColor: '#cc1a0b' 
                        }) 
                    } else { 
                        $('#loader').hide();
                        jsn_permohonan();
                    }
      }

      function jsn_permohonan(){
        var agm =  $('#spin_agm').val();
        var stk =  $('#spin_sttskel').val();
        var tkh =  $('#spin_tglmnkh').val();
        var jlk =  $('#spin_jmlank').val();
        var jnk =  $('#spin_jnsklmn').val();
        var tlh =  $('#spin_tgllhr').val();
        var tlr =  $('#tx_tmptlhir').val().replace(/(?:\r\n|\r|\n)/g, ' ');
        var twa =  $('#tx_nowa').val().replace(/(?:\r\n|\r|\n)/g, ' ');
        var tem =  $('#tx_almtemail').val().replace(/(?:\r\n|\r|\n)/g, ' ');
        var tat =  $('#tx_almt').val().replace(/(?:\r\n|\r|\n)/g, ' ');
        Swal.fire({
                    text: "Apakah anda yakin akan Mengajukan permohonan ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: "Tidak",
                    confirmButtonText: 'Ya, Ajukan!' ,
                    reverseButtons: true
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
                        url: '<?php echo e(url("submit_pengajuan")); ?>',
                        // nip, jeniskelamin, agama, alm_domisili, telepon, tgl_lahir, tpt_lahir, alm_email, nama, status_kel,tgl_menikah,jml_anak
                        data: {"_token": "<?php echo e(csrf_token()); ?>","nip":'<?php echo e($nip); ?>',"jeniskelamin":jnk,"agama":agm,"alm_domisili":tat,"telepon":twa,"tgl_lahir":tlh,"tpt_lahir":tlr,"alm_email":tem,"nama":'<?php echo e($df_user['nm_lengkap']); ?>',"status_kel":stk,"tgl_menikah":tkh,"jml_anak":jlk},
                        dataType: 'json',
                        success:function(data){
                            
                            console.log(data);
                            $('#loader').hide();
                            if(data['success']==0){
                                swal.fire({
                                icon: 'error',
                                title: 'Opps!!',
                                text: data['message'],
                                confirmButtonColor: '#cc1a0b',
                            }).then(function() { 
                                loadingon();
                                location.reload();
                            }); 
                            }else{
                                swal.fire({
                                icon: 'success',
                                title: '',
                                text: data['message'],
                                confirmButtonColor: '#cc1a0b',
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
                                text: "Server Kita Bermasalah!"
                            });
                        }
                    }); 
                  }
            }) 
      }
</script>
<script>
    $(function(){
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate()+1;
        var year = dtToday.getFullYear();
        if(month < 10)
        month = '0' + month.toString();
        if(day < 10)
        day = '0' + day.toString();

        var minDate= year + '-' + month + '-' + day;

        $('.date_now').attr('max', minDate);

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+0; //January is 0 so need to add 1 to make it 1!
        var yyyy = today.getFullYear();
        if(dd<10){
        dd='0'+dd
        } 
        if(mm<10){
        mm='0'+mm
        }  
        today = yyyy+'-'+mm+'-'+dd;
        // document.getElementById("datefield").setAttribute("min", today);
        $('.date_now').attr('min', today);
        });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views//hris/edit_karyawan.blade.php ENDPATH**/ ?>