
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia'); ?>
<?php $__env->startSection('content'); ?>

<style>
    .card-body2 {
        -ms-flex: 1 1 auto !important;
        flex: 1 1 auto !important;
        min-height: 1px !important;
        padding: 0px 6px 5px !important;
    }

    hr {
        margin-top: 0.1rem;
        margin-bottom: 0.1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    .card2 {
        /* border: none; */
        border-radius: 5px !important;
    }

    .span-act {
        position: absolute;
        right: 15px;
        /* padding-top: 5px; */
        /* width: 67px; */
    }

    .fa {
        color: #28a745 !important;
        /* background: rgba(255, 0, 0, 0.21); */
    }

    .fa-bookmark {
        position: absolute;
        top: 0;
        color: red;
        font-size: 22px;
    }

    .form-control {
        height: calc(0.8em + 0.75rem + 2px) !important;
        padding: 0rem 0.75rem;
        font-size: 12px !important;
    }

    .btn-group-sm>.btn,
    .btn-sm {
        padding: 0rem 0.5rem;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 0.2rem;
    }
</style>

<div class="container" style="padding-top: 70px;">
    <div class=" mb-3 ">
        <div class="card mb-2 shadow-sm">
            <div class="card-header">
                <div class="row ">

                    <div class="col" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal" style="font-size: 12px;"><b>Presence</b></a>
                    </div>

                    
                </div>
            </div>
            <div class="card-body">

                <form id="send_periode" class="" action="<?php echo e(route('presence_periode')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" class="" name="perid_bln" id="perid_bln" />
                    <input type="hidden" class="" name="perid_thn" id="perid_thn" />
                    <div class="row">
                        <div class="col-5 " style="padding-right : 0px; !important">
                            <select class="form-control form-control-sm " id="bln_select">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-3" style="padding-right : 0px; !important">
                            <select class="form-control form-control-sm " id="thn_select">
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                        <div class="col-4 justify-content-end d-flex">
                            <button class="btn btn-success btn-sm btn-block" type="submit"
                                onclick="periode()">Periode</button>
                        </div>
                    </div>
                </form>
                
                <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">
                            <div class="input-group mb-2">
                                <input id="search_absen" onkeyup="SearchHistabsn()" type="text" class="form-control"
                                    placeholder="Searching" aria-label="Search" aria-describedby="basic-addon2">
                            </div>


                            <ul style="overflow-x: hidden; height: 70vh; list-style-type: none; padding: 0px;"
                                id="ul_dfhistabsen">

                                <?php if($absensi == []): ?>
                                <div class="text-center ">
                                    <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>"
                                        background="transparent" speed="1"
                                        style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                                    </lottie-player>

                                    <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                                </div>
                                <?php else: ?>
                                <?php $no2 = 1; ?>
                                <?php $__currentLoopData = $absensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arryabsensi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <li>
                                    <div class="card shadow-sm  mb-2"
                                        style=" <?php if(Str::length($arryabsensi['hdr']) == 5 ): ?> background: rgba(255, 0, 0, 0.21) !important; <?php endif; ?> border-radius: 13px !important;">
                                        <div class="card-body2">
                                            <div class="row ">
                                                <div class="col ">
                                                    <a
                                                        style=" position: absolute; top: 0; font-size: 10px; text-align: center; width: 15px; z-index: 1; color:white;">
                                                        <?php echo e($no2); ?> </a>
                                                    <i class="fa fa-bookmark  "
                                                        style=" <?php if(Str::length($arryabsensi['hdr']) == 5 ): ?> color : #cc1a0b !important; <?php endif; ?>"></i><span
                                                        style="margin-left:18px;"> </span>
                                                    <span><?php echo e($arryabsensi['otl']); ?> </span>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col ml-3">
                                                    <hr>
                                                    <i class="fa fa-clock-o mr-1"
                                                        style=" <?php if(Str::length($arryabsensi['hdr']) == 5 ): ?> color : #cc1a0b !important; <?php endif; ?>"></i><span>
                                                        Hadir : </span> <span id="nmmenu20147MSJ00"
                                                        style="right: 80px;"><?php echo e($arryabsensi['hdr']); ?></span>

                                                    <span class="span-act">
                                                        <span>Istirahat : </span> <span
                                                            style=" <?php if($arryabsensi['istrht'] == 'Tidak absen' ): ?> color : #cc1a0b !important; <?php endif; ?>"><?php echo e($arryabsensi['istrht']); ?>

                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col ml-3">
                                                    <i class="fa fa-calendar mr-1"
                                                        style=" <?php if(Str::length($arryabsensi['hdr']) == 5 ): ?> color : #cc1a0b !important; <?php endif; ?>"></i>
                                                    <span class="fw "><?php echo e($arryabsensi['tgl']); ?></span>
                                                    <span class="span-act">
                                                        <i class="fa fa-line-chart mr-1"
                                                            style=" <?php if(Str::length($arryabsensi['hdr']) == 5 ): ?> color : #cc1a0b !important; <?php endif; ?>"></i>
                                                        <span id="nmmenu20147MSJ00"><?php echo e($arryabsensi['dur1']); ?></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    </li>
                                    <?php $no2++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                            </ul>
                            
                                
                                
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- custom -->



    <script>
        $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
    });
    $("#bln_select option[value='<?php echo e(session('blncm')); ?>']").attr("selected", "selected"); 
    $("#thn_select option[value='<?php echo e(session('thncm')); ?>']").attr("selected", "selected");
    // $("div.bln_select select").val("09").change();
    function showmodal_done() {
    $('#modal_baking').modal('show');
    }
    function periode(){
    var sValbln = $("#bln_select option:selected").val(); 
    var sValthn = $("#thn_select option:selected").val();
    var sValues = sValbln +"#"+sValthn;  
    $('#loader').show();   
    
        $('#perid_bln').val(sValbln);
        $('#perid_thn').val(sValthn);
    }
    </script>
    <script type="text/javascript">
        // dPrsne=$('#tb_presence').DataTable({
        // "bLengthChange": false, 
        // "paging":false, 
        // "info":false, 
        // "lengthMenu": [30], 
        // "columnDefs": [
        // {"className": "dt-center", "targets": "_all"}  
        // ],
        // "dom":"lrtip" ,  
        // responsive: true
        // });
        // $('#search_absen').keyup(function(){  
        // dPrsne.search($(this).val()).draw();    
        // }) ;

        function SearchHistabsn() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("search_absen");
        filter = input.value.toUpperCase();
        ul = document.getElementById("ul_dfhistabsen");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("div")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_presence', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views//presence/presence.blade.php ENDPATH**/ ?>