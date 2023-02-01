
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.');?>
<?php $__env->startSection('content');?>
<div class="container" style="padding: 5px;">
    <div class="card-deck ">
        <div class="" style="border-radius: 10%; height: 96vh !important; overflow-y:scroll; overflow-x:hidden;">
            <div class="card-body">

                <?php if ($urllotti == "0"): ?>

                <div class="text-center ">
                    <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_evqse4gh.json"
                        background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop
                        autoplay>
                    </lottie-player>
                     <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                </div>
                <?php else: ?>
                <div class="col-md-12" style="padding: 0px !important;">

                    <div class="card-header shadow"
                        style="background-color: #FFFFFF !important; border-radius: 5px !important;">
                        <div class="row">
                            <div class="col">
                                <a class="my-0 font-weight-normal" style="font-size: 12px;"><b>Kritik &
                                        Saran</b></a>
                            </div>
                            <div class="col text-right">
                                <a class="my-0 font-weight-normal" style="font-size: 14px;"
                                    href="<?php echo e(route('cm_dashsaranHistory')); ?>?urllotti=<?php echo e($urllotti); ?>&nip=<?php echo e($nip); ?>&kdoutlet=<?php echo e($kdoutlet); ?>&kdakses=<?php echo e($kdakses); ?>&idtittle=<?php echo e($idtittle); ?>">
                                    <b><i class="fa fa-history"></i></b></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class=" img text-center" style="margin: 15px 0 5px 0;">
                    <lottie-player class="shadow" src="<?php echo e($urllotti); ?>" background="transparent" speed="1"
                        style="margin: 0 auto; width: 80px; height: 80px;  border-radius: 5px;" loop autoplay>
                    </lottie-player>
                </div>
                <div class="fw-container">

                    <div class="fw-body">
                        <div class="content">

                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-4">
                                    <div class="login-wrap p-0">


                                        <div class="flex-md-row mb-2 mt-2">




                                            <textarea id="tx_srnkritik"
                                                class="form-control form-control-sm textleft inptklmjmlbld" cols="40"
                                                rows="5" placeholder="Isi kolom. . . " style="font-size: 12px;"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="form-control btn-lg btn-dark submit px-3"
                                            onclick="send_saran()" style="border-radius: 20px !important; background-color: black;
                                            color:white; font-weight: bold; font-size: 12px;">Kirim</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif;?>


        </div>
    </div>
</div>
<script>
    function send_saran(){
    // spin_agm,spin_sttskel,spin_tglmnkh,spin_jmlank,spin_jnsklmn,spin_tgllhr,tx_tmptlhir,tx_nowa,tx_almtemail,tx_almt
    var txsrn =  $('#tx_srnkritik').val().replace(/(?:\r\n|\r|\n)/g, ' ');
            if (txsrn == "" || txsrn == null) {
                    $('#loader').hide();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Isi Kolom tidak boleh kosong',
                        confirmButtonColor: '#cc1a0b'
                    })
                } else {
                    $('#loader').hide();
                    jsn_saran();
                }
            }
    function jsn_saran(){
        var txsrn =  $('#tx_srnkritik').val().replace(/(?:\r\n|\r|\n)/g, ' ');
        Swal.fire({
                    text: "Apakah anda yakin akan Mengirim Kritik & Saran ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: "Tidak",
                    confirmButtonText: 'Ya, Kirim!' ,
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
                        url: '<?php echo e(url("submit_dashsaran")); ?>',
                        data: {"_token": "<?php echo e(csrf_token()); ?>","nip":'<?php echo e($nip); ?>',"idtittle":'<?php echo e($idtittle); ?>',"isisaran":txsrn},
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
<?php $__env->stopSection();?>
<?php echo $__env->make('layouts.layout_cmmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views//cmdialog/cm_dashsaran.blade.php ENDPATH**/?>