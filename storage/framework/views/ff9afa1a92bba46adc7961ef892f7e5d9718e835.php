
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.');?>
<?php $__env->startSection('content');?>
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
</style>
<div class="container" style="padding: 5px;">
    <div class="" style="border-radius: 10%; height: 96vh !important; overflow-y:scroll;overflow-x:hidden;">
        <div class="card-body">

            <?php if (isset($dfhis_mood)): ?>
            <div class="col-md-12" style="padding: 0px !important;">

                <div class="card-header shadow"
                    style="background-color: #FFFFFF !important; border-radius: 5px !important;">
                    <div class="row">
                        <div class="col">
                            <a class="my-0 font-weight-normal" style="font-size: 12px;"><b>History</b></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php $__currentLoopData = $dfhis_mood;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $dfmood): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	            <div class="col-md-12" style="padding: 0px  0px  0px  0px !important;">

	                <div class="card-header shadow mt-2"
	                    style="background-color: #FFFFFF !important; border-radius: 5px !important; padding: 5px 5px 5px 5px !important;">
	                    <div class="user">
	                        <div class=" img text-center" style="">
	                            <lottie-player class="shadow" src="<?php echo e($dfmood['UrlCat']); ?>" background="transparent" speed="1"
	                                style="margin: 0 auto; width: 25px; height: 25px; border-radius: 5px;" loop autoplay>
	                            </lottie-player>
	                            <span class=" " id="basic-addon3" style="color:black; height: 17px; font-size: 12px;  ">
	                                <?php echo e($dfmood['Tittle']); ?>

	                            </span>
	                        </div>
	                        <div class="user-info" style="padding-left: 10px; min-width: 95%;">
	                            <div class="input-group input-group-sm ">
	                                <span class=" " id="basic-addon3"
	                                    style="color:black;min-width: 90%; margin: 0px 10px 0px 0px;   font-size: 12px;  ">
	                                    <?php echo e($dfmood['isisaran']); ?>

	                                </span>
	                            </div>
	                            <div class="row">

	                                <div class=" text-right"
	                                    style="height: 17px; color:black; min-width: 90%; margin: 10px 10px 0px 0px;  font-size: 10px;">
	                                    <?php echo e($dfmood['wktsrn']); ?>

	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>

            <?php else: ?>
            <div class="text-center ">
                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_evqse4gh.json"
                    background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop
                    autoplay>
                </lottie-player>
                 <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
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
                        data: {"_token": "<?php echo e(csrf_token()); ?>","nip":'',"idtittle":'',"isisaran":txsrn},
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
<?php echo $__env->make('layouts.layout_cmmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views//cmdialog/cm_dashsaranhistory.blade.php ENDPATH**/?>