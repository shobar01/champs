
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia');?>
<?php $__env->startSection('content');?>

<style>
    @media  only screen and (min-width: 1366px) {
        .card-res {
            height: 530px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            position: fixed;
            top: 565px;
            right: 20px;
            font-size: 12px;
        }

        th {
            font-size: 12px !important;
        }

        td {
            font-size: 11px !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            color: #1d1c1a !important;
            text-align: left !important;
            font-size: 11px !important;
            padding-top: 0px !important;
            position: fixed !important;
            top: 580px !important;
        }

        #wilx {
            width: 1080px !important;
        }
    }

    @media  only screen and (min-width: 2049px) {
        .card-res {
            height: 840px !important;
        }

        .dataTables_filter input {
            height: 40px !important;
        }

        body {
            font-size: 18px !important;
        }

        div.dataTables_scrollBody {
            max-height: 650px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            position: fixed;
            top: 875px !important;
            right: 20px;
            font-size: 12px !important;
        }

        th {
            font-size: 18px !important;
            padding-right: 24px !important;
        }

        td {
            font-size: 16px !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            color: #1d1c1a !important;
            text-align: left !important;
            font-size: 18px !important;
            padding-top: 0px !important;
            position: fixed;
            top: 875px !important;
        }

        #wilx {
            width: 1670px !important;
        }
    }

    @media  only screen and (min-width: 4098px) {
        .card-res {
            height: 1760px !important;
        }

        .dataTables_filter input {
            height: 60px !important;
        }

        body {
            font-size: 34px !important;
        }

        div.dataTables_scrollBody {
            max-height: 1200px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            position: fixed;
            top: 1785px !important;
            right: 20px;
            font-size: 12px;
        }

        th {
            font-size: 34px !important;
        }

        td {
            font-size: 32px !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            color: #1d1c1a !important;
            text-align: left !important;
            font-size: 32px !important;
            padding-top: 0px !important;
            position: fixed;
            top: 1760px !important;
        }

        #wilx {
            width: 3400px !important;
        }
    }

    @media  only screen and (min-width: 5464px) {
        .card-res {
            height: 2390px !important;
        }

        .dataTables_filter input {
            height: 80px !important;
        }

        body {
            font-size: 44px !important;
        }

        div.dataTables_scrollBody {
            max-height: 1400px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            position: fixed;
            top: 2420px !important;
            right: 20px;
            font-size: 12px;
        }

        th {
            font-size: 44px !important;
        }

        td {
            font-size: 42px !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            color: #1d1c1a !important;
            text-align: left !important;
            font-size: 42px !important;
            padding-top: 0px !important;
            position: fixed;
            top: 4550px !important;
        }
    }

    .aaa:not([scope=row]) {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 2;
        background-color: azure;
    }

    .aaa2:not([scope=row]) {
        position: -webkit-sticky;
        position: sticky;
        left: 95px;
        z-index: 2;
        background-color: azure;
    }

    table.dataTable>thead>tr>th.napel {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 2;
        background-color: #ff3636;
    }

    table.dataTable>thead>tr>th.napel2 {
        position: -webkit-sticky;
        position: sticky;
        left: 95px;
        z-index: 2;
        background-color: #ff3636;
    }

    @media (min-width: 1200px) {

        .container,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl {
            max-width: 1540px;
        }
    }

    th {
        font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
        font-size: 12px;
    }

    td {
        /* padding: 6px 2px 0px 2px !important; */
        font-size: 11px;
    }

    /* Round Corner for TOP LEFT COLUMN */
    table thead tr:first-child th:first-child {
        border-top-left-radius: 7px;
    }

    /* Round Corner for TOP RIGHT COLUMN */
    table thead tr:first-child th:last-child {
        border-top-right-radius: 7px;
    }

    /* Round Corner for BOTTOM LEFT COLUMN */
    table tbody tr:last-child td:first-child {
        border-bottom-left-radius: 7px;
    }

    /* Round Corner for BOTTOM RIGHT COLUMN */
    table tbody tr:last-child td:last-child {
        border-bottom-right-radius: 7px;
    }

    .bb:not([scope=row]) {
        border-top: 1px solid #1d1c1a;
    }

    .sekrol-main::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.13) !important;
        background: transparent !important;
    }

    .sekrol-main::-webkit-scrollbar {
        width: 12px !important;
        background: transparent !important;
    }

    .sekrol-main::-webkit-scrollbar-thumb {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.432) !important;
        background-color: #FF3636 !important;
    }

    a {
        margin: 0px 8px 0px 0px !important;
    }

    td.details-control {
        text-align: center;
        color: forestgreen;
        cursor: pointer;
        font-size: 11px;
    }

    tr.shown td.details-control {
        text-align: center;
        color: #FF3636;
    }

    div.dataTables_wrapper div.dataTables_info {
        position: fixed;
        top: 580px;
    }

    div.dataTables_wrapper div.dataTables_paginate {
        position: fixed;
        top: 565px;
        right: 20px;
        font-size: 12px;
    }
</style>

<div class="container" style="padding-top: 65px; padding-right: 0px ; padding-left: 0px; ">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">

            <div class="card-body" style="padding-top: 10px !important;">

                <form id="send_viewbuktamu" class="" action=" " method="GET">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="btn_kontak" id="btn_kontak" value="<?php echo e($btn_kontak); ?>">
                    <table class="" style="width:100%; ">

                        <tr>

                            <?php if ($btn_kontak == 'F'): ?>
                            <td style="font-size: 12px !important; color : white; width: 48%;">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3"
                                            style="font-size: 14px; color:black;">Tanggal :
                                        </span>
                                    </div>
                                    <input type="date" name="tanggal_vbktamu" id="tanggal_vbktamu" value="<?php echo e($tgl); ?>"
                                        class="form-control date_now" style="font-size: 14px; color:black; "
                                        onchange="periode_tgl()" required>
                                </div>
                            </td>
                            <td style="font-size: 12px !important; color : white; width: 2%;">
                            </td>
                            <?php endif;?>

                            <td style="font-size: 12px !important; color : white; width: 48%;">
                                <input id="search_bktm" type="text" class="form-control" placeholder="Searching"
                                    aria-label="Search" aria-describedby="basic-addon2">
                            </td>
                        </tr>
                    </table>




                </form>


                <div class="fw-container" style="margin-top: 1%;">
                    <div class="fw-body">
                        <div class="content">
                            <?php if (isset($df_tamunow)): ?>
                            <div class="table-responsive">
                                <table id="tb_viewbktm" class="display nowrap table table-striped " style="width:100%;">
                                    <thead>
                                        <tr style="background: #8C5E4D;">
                                            <th style="font-size: 12px !important; color : white;" class="text-center">
                                                Daftar Tamu.</th>
                                            <th style="font-size: 12px !important; color : white;" class="text-left">
                                                Name</th>
                                            <th style="font-size: 12px !important; color : white;" class="text-left">
                                                Contact</th>
                                            <?php if ($ttgl == 'F'): ?>
                                            <th style="font-size: 12px !important; color : white;" class="text-center">
                                                Visit</th>
                                            <?php endif;?>
                                            <th style="font-size: 12px !important; color : white;" class="text-center">
                                                Last Visit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="isimenu">
                                        <?php $__currentLoopData = $df_tamunow;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $dftm): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                                        <tr>
	                                            <td id="hd<?php echo e($dftm['kontak']); ?>" class="text-center"
	                                                onclick="tmpl_dt('<?php echo e($dftm['kontak']); ?>')">
	                                                <div class="action-buttons">
	                                                    <a href="#" class="green bigger-140 show-details-btn"
	                                                        title="Show Details">
	                                                        <i id="icon_id<?php echo e($dftm['kontak']); ?>"
	                                                            class=" fa fa-chevron-circle-down" style="color:green;"></i>
	                                                        <span class="sr-only">Details</span>
	                                                    </a>
	                                                </div>
	                                            </td>
	                                            <td style="font-size: 12px !important;" class="text-left">
	                                                <?php echo e(ucfirst(strtolower($dftm['nmcust']))); ?>

	                                            </td>
	                                            <td style="font-size: 12px !important;" class="text-left">
	                                                <?php echo e($dftm['kontak']); ?>

	                                            </td>
	                                            <?php if ($ttgl == 'F'): ?>
	                                            <td style="font-size: 12px !important;" class="text-center">
	                                                <?php echo e($dftm['urtn']); ?>x</td>
	                                            <?php endif;?>
                                            <td style="font-size: 12px !important;" class="text-center"><?php echo e($dftm['tgl']); ?>

                                                <?php echo e($dftm['wkt']); ?>

                                            </td>
                                        </tr>
                                        <tr class="detail-row" style="display: none; " id="det<?php echo e($dftm['kontak']); ?>">
                                            <td colspan="12" style="padding: 2px 50px 10px 50px;!important;">
                                                <div class="">
                                                    <table class="table table-striped shadow card-body  "
                                                        style="width:100%; border-radius: 20px;">
                                                        <thead>
                                                            <tr style="background: #e89f55; height: 10px;">
                                                                <th style="font-size: 10px !important; color : white;"
                                                                    class="text-center">
                                                                    Urutan</th>
                                                                <th style="font-size: 10px !important; color : white;"
                                                                    class="text-center">
                                                                    Visit</th>
                                                                <th style="font-size: 10px !important; color : white;"
                                                                    class="text-center">
                                                                    Note</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $dftm['detail'];
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $detail): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?>
	                                                            <tr>
	                                                                <td style="font-size: 10px !important;"
	                                                                    class="text-center"><?php echo e($detail['urutan']); ?></td>
	                                                                <td style="font-size: 10px !important;"
	                                                                    class="text-center"><?php echo e($detail['tgldatang']); ?>

	                                                                    <?php echo e($detail['jamdatang']); ?>

	                                                                </td>
	                                                                <td style="font-size: 10px !important;"
	                                                                    class="text-center"><?php echo e($detail['keterangan']); ?>

	                                                                </td>
	                                                            </tr>
	                                                            <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>
                                    </tbody>
                                </table>
                            </div>


                            <?php else: ?>
                            <div class="text-center ">
                                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_evqse4gh.json"
                                    background="transparent" speed="1"
                                    style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                                </lottie-player>
                                 <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                            </div>
                            <?php endif;?>



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('bukutamums.m_tmbhtamu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
        function tmpl_dt(idd){


            // $('#icon_id'+idd).removeClass('fa-chevron-circle-down');
            // $('#icon_id'+idd).addClass('fa-chevron-circle-up');
            $('.detail-row').hide();
            $('#det'+idd).show();
            $('#hd'+idd).removeAttr('onclick');
            $('#hd'+idd).attr('onclick','tmpl_dt2(\''+idd+'\')');
        }
        function tmpl_dt2(idd){
            // $('#icon_id'+idd).removeClass('fa-chevron-circle-up');
            // $('#icon_id'+idd).addClass('fa-chevron-circle-down');
            $('#det'+idd).hide();
            $('#hd'+idd).removeAttr('onclick');
            $('#hd'+idd).attr('onclick','tmpl_dt(\''+idd+'\')');
        }
</script>
<!-- Bootstrap 4 Autocomplete -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js"
    crossorigin="anonymous"></script>

<script>
    function send(){nm_tmu
        var nmcus = $('#nm_tmu').val();
        var nowa = $('#no_wa').val();
        var ketcu = $('#ket_tmu').val();
        // alert(nmcus+"===="+nowa);
    loadingon();
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("contacttamu")); ?>',
            data: {"_token": "<?php echo e(csrf_token()); ?>","tipe":"A","nmcust":nmcus,"kontak":nowa,"ketrngn":ketcu},
            dataType: 'json',
            success:function(data){
                $('#loader').hide();
                var len = data.length;
                console.log(data);
                for (let i = 0; i < len; i++) {
                    var nmcust = data[i]['nmcust'];
                    var kontak = data[i]['kontak'];
                }
                document.getElementById('dpassword').style.display='none';
                location.reload();
            },
            error: function () {
                $('#loader').hide();
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Server Kita Bermasalah nih!"
                });
            }
        });
    }
        var src = {<?php $__currentLoopData = $df_tamuall;
$__env->addLoop($__currentLoopData);foreach ($__currentLoopData as $dftam): $__env->incrementLoopIndices();
    $loop = $__env->getLastLoop();?> "<?php echo e($dftam['kontak']); ?>" : "<?php echo e($dftam['nmcust']); ?>", <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();?>};



         function onSelectItem(item, element) {
             $('#nm_tmu').val(item.value);
            //  $('#output').html(
            //      'Element <b>' + $(element).attr('id') + '</b> was selected<br/>' +
            //      '<b>Value:</b> ' + item.value + ' - <b>Label:</b> ' + item.label
            //  );
         }

         $('#no_wa').autocomplete({
             source: src,
             onSelectItem: onSelectItem,
             highlightClass: 'text-danger'
         });
</script>
<script>
    function periode_tgl(diklik){

    var toglekdotl = $('#toglekdotl').val();
    $('#kdotl').val(toglekdotl);
    $('#dwnld_type').val(diklik);
    $('#send_viewbuktamu').submit();
    }
    function btn_shwtmbh(){
        document.getElementById('dpassword').style.display='block';
    $("#li_home").removeClass("active");
    $("#li_contact").removeClass("active");
    }
</script>
<script>
    function btn_nav(isi){
      if(isi == 'contact'){
        $('#btn_kontak').val('T')
        // $('#li_home').addClass("active");
        // $('#nm_tittle').html('Kontak Tamu Kokas');
      }else if(isi == 'home'){
        $('#btn_kontak').val('F');
        // $('#li_contact').addClass("active");
        // $('#nm_tittle').html('Buku Tamu Kokas')
      }
    $('#send_viewbuktamu').submit();
    }
</script>
<?php if ($btn_kontak == 'F'): ?>
<script>
    // function btn_nav(){

    // $('#btn_kontak').val('T');
    // $('#send_viewbuktamu').submit();
    // }

    //     $('#klikbtn').html('<button class=" col-md-4 btn btn-lg  btn-rounded mb-1 mt-2" type="button" style="font-size: 14px; color:white; background-color: #8C5E4D;  min-width: 150px;  font-weight: bold; padding-left: 10px !important; " onclick="btn_()">Kontak Tamu</button>');
    $('#li_home').addClass("active");
    $('#nm_tittle').html('Buku Tamu Kokas');
    //     function btn_(){
    //     $('#btn_kontak').val('T')
    //     $('#send_viewbuktamu').submit();
    // }
</script>
<?php else: ?>
<script>
    // function btn_nav(){

    // $('#btn_kontak').val('F');
    // $('#send_viewbuktamu').submit();
    // }
    //     $('#klikbtn').html('<button class=" col-md-4 btn btn-lg  btn-rounded mb-1 mt-2" type="button" style="font-size: 14px; color:white; background-color: #262626;  min-width: 150px;  font-weight: bold; padding-left: 10px !important; "onclick="btn_()">Buku Tamu</button>');
        $('#li_contact').addClass("active");
        $('#nm_tittle').html('Kontak Tamu Kokas');
    //     function btn_(){
    //     $('#btn_kontak').val('F')

    //     $('#send_viewbuktamu').submit();
    // }
</script>
<?php endif;?>

<?php $__env->stopSection();?>


<?php echo $__env->make('layouts.layout_ms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\champs-mobile\resources\views//bukutamums/bktamums.blade.php ENDPATH**/?>