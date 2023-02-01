
<?php $__env->startSection('title', 'PT.Champ Resto Indonesia Tbk.'); ?>
<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="<?php echo e(asset('public/resource/qr/easy.qrcode.min.js')); ?>" type="text/javascript" charset="utf-8"></script>
<style>
    .btn-sm {
        padding: 5px;
    }

    .card-header {
        padding: 0.45rem 1.25rem !important;
    }

    .table td,
    .table th {
        padding: 0.05rem !important;
        vertical-align: middle !important;
        border-top: 1px solid #dee2e6 !important;
    }

    .card-body {
        padding: 0.25rem !important;
    }

    .swal2-popup {
        font-size: 0.7rem !important;
        width: 30em !important;
        max-width: 100% !important;
    }

    .swal2-html-container {
        text-align: justify !important;
    }

    hr {
        margin-top: 0.5rem !important;
        margin-bottom: 0.5rem !important;
    }

    .imgblock {
        margin: 10px 0;
        text-align: center;
        /* float: left; */
        /* min-height: 420px; */
        /* border-top: 1px solid #B4B7B4;
    border-bottom: 1px solid #B4B7B4; */
    }

    #container {
        /* width: 1030px; */
        margin: 0px auto;
    }

    .notification {
        /* background-color: #555; */
        color: white;
        text-decoration: none;
        /* padding: 15px 26px; */
        position: relative;
        display: inline-block;
        border-radius: 2px;
    }

    /* .notification:hover {
  background: red;
} */

    .notification .badge {
        position: absolute;
        top: -14px;
        /* right: -10px; */
        padding: 5px 10px;
        border-radius: 50%;
        background-color: red;
        color: white;
        font-size: 12px;
    }

    .cardbadge {
        /* background-color: #555; */
        color: white;
        text-decoration: none;
        /* padding: 15px 26px; */
        position: relative;
        display: inline-block;
        border-radius: 2px;
    }

    /* .notification:hover {
  background: red;
} */

    .cardbadge .badge {
        position: absolute;
        top: -10px;
        right: -5px;
        padding: 5px 5px;
        border-radius: 20%;
        background-color: red;
        color: white;
        font-size: 12px;
    }

    .right {
        position: absolute;
        right: 0px;
        /* width: 300px;
  border: 3px solid #73AD21;
  padding: 10px; */
    }
</style>


<div class="container" style="padding-top: 60px; padding-right: 5px ; padding-left: 5px; height: 100vh; ">
    <div class="card-deck mb-3 ">
        <div class="card shadow-sm" style="height:auto">
            <div class="card-header">
                <div class="row ">



                    <div class="col" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <div class="btn btn-sm btn-success" onclick="btn_dfall()">
                            <a class="my-0 notification" style="font-size: 12px;">Approval PTS QA
                                <?php if($jmlrow != 0): ?>
                                <span class="badge"><?php echo e($jmlrow); ?></span>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>

                    
                    <div class=" text-right" style="padding: 0 5px 0 5px !important;">
                        <a type="button" style=" font-weight: bold; font-size: 16px;"><i class='fa fa-download'
                                style='color: #000; margin: 0 5px 0 5px;' onclick="btn_download()"></i></a>
                    </div>
                    <div class=" text-right" style="padding: 0 10px 0 5px !important;">
                        <div id="gbl_rfrsh" type="button" style=" font-weight: bold; font-size: 14px;"
                            onclick="rfrsh()"><i class='fa fa-refresh' style='color: #000; margin: 0 5px 0 5px;'></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form id="send_approvpts" class="" action="#" method="GET">
                    <?php echo csrf_field(); ?>
                    <input type="text" id="nip" name="nip" value="<?php echo e($nip); ?>" hidden />
                    <input type="text" id="kdakses" name="kdakses" value="<?php echo e($kdakses); ?>" hidden />

                    <div class="input-group mb-2 mt-1 px-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3"
                                style="font-size: 12px; color:black; min-width: 70px;">Tanggal
                            </span>
                        </div>
                        <input type="date" name="tgl_returpts" id="tgl_returpts" value="<?php echo e($plhtgl); ?>"
                            class="form-control date_nowpts align-middle" style="font-size: 12px; color:black;"
                            required>
                        <div class="input-group-append">
                            <button onclick="plh_tglpts()" class="btn btn-success" type="button"
                                style="font-size: 12px; color:white; min-width: 90px;"> Cari</button>
                        </div>
                    </div>
                </form>
                <ul style="overflow-x: hidden; height: 70vh; list-style-type: none; padding: 5px;" id="ul_dflist1">

                    <?php if($jsdfpts == []): ?>
                    <div class="text-center ">
                        <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>" background="transparent"
                            speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                        </lottie-player>
                        <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                    </div>
                    <?php else: ?>

                    <?php $__currentLoopData = $jsdfpts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $df): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="shadow p-1 mb-1 bg-white rounded "
                        onclick="btn_detailapprovalpts('<?php echo e($df['kdretur']); ?>#<?php echo e($df['nmoutlet']); ?>#<?php echo e($df['updateqa']); ?>')">

                        <div class="card  my-1 " style="margin-bottom:0px !important;">

                            <div class="btn-sm">
                                <label class="badge " style="padding: 0.4em 0.2em !important; position: absolute; left: 0; top: -1px; width:20px;  <?php if($df['updateqa'] === 'F' || $df['updateqa'] === null ): ?>
                                    background-color: #cc1a0b;
                                    line-height:76px;
                                    <?php else: ?> background-color: #28a745;line-height:92px; <?php endif; ?>">
                                    <span style="color:transparent; font-size:12px; ">|</span>
                                </label>
                                <div class="ml-4">
                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:black; ">Outlet</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                <?php if(strlen($df['nmoutlet']) > 25 ): ?>
                                                <?php echo e(substr($df['nmoutlet'], 0, 23)); ?>...
                                                <?php else: ?> <?php echo e(substr($df['nmoutlet'], 0, strlen($df['nmoutlet']))); ?> <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:black; ">User</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                <?php echo e($df['nama']); ?> </a>
                                        </div>
                                    </div>
                                    <?php if($df['updateqa'] === 'F' || $df['updateqa'] === null ): ?>
                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:black; ">Kode PTS</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                <?php echo e($df['kdretur']); ?> </a>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:black; ">Kode PTS</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                <?php echo e($df['kdretur']); ?> </a>
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:#cc1a0b;  ">Action QA</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:#cc1a0b;  padding-right:5px;"> :
                                                by. <?php echo e($df['updateqa']); ?> </a>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:black; ">Tgl PTS</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                <?php echo e($df['wktrequest']); ?> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
                <ul style="overflow-x: hidden; height: 70vh; list-style-type: none; padding: 5px;" id="ul_dflist2">

                    <?php if($jsdfpts2 == []): ?>
                    <div class="text-center ">
                        <lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>" background="transparent"
                            speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                        </lottie-player>
                        <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                    </div>
                    <?php else: ?>

                    <?php $__currentLoopData = $jsdfpts2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $df): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="shadow p-1 mb-1 bg-white rounded "
                        onclick="btn_detailapprovalpts('<?php echo e($df['kdretur']); ?>#<?php echo e($df['nmoutlet']); ?>#<?php echo e($df['updateqa']); ?>')">

                        <div class="card  my-1 " style="margin-bottom:0px !important;">

                            <div class="btn-sm">
                                <label class="badge " style="padding: 0.4em 0.2em !important; position: absolute; left: 0;line-height:76px; top: -1px; width:20px;  <?php if($df['updateqa'] === 'F' || $df['updateqa'] === null ): ?>
                                    background-color: #cc1a0b;
                                    <?php else: ?> background-color: #28a745; <?php endif; ?>">
                                    <span style="color:transparent; font-size:12px; ">|</span>
                                </label>
                                <div class="ml-4">
                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:black; ">Outlet</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                <?php if(strlen($df['nmoutlet']) > 25 ): ?>
                                                <?php echo e(substr($df['nmoutlet'], 0, 23)); ?>...
                                                <?php else: ?> <?php echo e(substr($df['nmoutlet'], 0, strlen($df['nmoutlet']))); ?> <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:black; ">User</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                <?php echo e($df['nama']); ?> </a>
                                        </div>
                                    </div>
                                    <?php if($df['updateqa'] === 'F' || $df['updateqa'] === null ): ?>
                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:black; ">Kode PTS</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                <?php echo e($df['kdretur']); ?> </a>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:black; ">Kode PTS</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                <?php echo e($df['kdretur']); ?> </a>
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:#cc1a0b;  ">Action QA</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:#cc1a0b;  padding-right:5px;"> :
                                                by. <?php echo e($df['updateqa']); ?> </a>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <div class="text-left">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="" id="basic-addon3"
                                                    style="font-size: 12px; color:black; min-width: 70px; padding:0px"><a
                                                        style="font-size: 12px; color:black; ">Tgl PTS</a>
                                                </span>
                                            </div>
                                            <a style="font-size: 12px; color:black;  padding-right:5px;"> :
                                                <?php echo e($df['wktrequest']); ?> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>


</div>

<div id="mdl_dwnldtglpts" class="modal">
    <div class="" style="height: 100%; max-width: 100% !important; margin-top:60px;">
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 8px;">
                    <b style="font-size: 14px;">Pilih Periode</b>
                </span>

                <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="btn_closedwldpts()"
                    class="close"></i>
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">
                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm">
                                    

                                    <form id="send_ptsdwnld" class="" action="<?php echo e(route('pts_approvalqa')); ?>"
                                        method="GET">
                                        <?php echo csrf_field(); ?>
                                        <div class="card-body text-left">
                                            <div class="input-group mb-3">
                                                <input type="month" id="bln_dwldpts" name="bln_dwldpts"
                                                    min="<?php echo e($minbln); ?>" value="<?php echo e($nowbln); ?>" max="<?php echo e($nowbln); ?>"
                                                    class="form-control " style="font-size: 12px; color:black;"
                                                    required>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="text-center px-1 mb-5">
                                        <button type="button" class="btn btn-lg btn-success" id="btn_sbmtdownload"
                                            onclick="btn_sbmtdownload()"
                                            style="width:80%; font-weight: 600; font-size: 16px; ">
                                            Download
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('pts.mdl_ptsdet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('pts.mdl_updateketqa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    document.getElementById('ul_dflist2').style.display='none'; 
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
       
        $(function(){
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate()+0;
            var year = dtToday.getFullYear();
            if(month < 10)
            month = '0' + month.toString();
            if(day < 10)
            day = '0' + day.toString();

            var minDate= year + '-' + month + '-' + day;

            $('.date_nowpts').attr('max', minDate);

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
            $('.date_nowpts').attr('min', today);
            });
</script>
<script>
    function btn_dfall(){ 
        document.getElementById('ul_dflist1').style.display='none';
        document.getElementById('ul_dflist2').style.display='block';
    }
    function btn_sbmtdownload(){
       var aas = $('#bln_dwldpts').val();
       
       $('#send_ptsdwnld').submit();
        console.log(aas);
    }
    function btn_download(){
        document.getElementById('mdl_dwnldtglpts').style.display='block';   
    }
    function btn_closedwldpts(){
        document.getElementById('mdl_dwnldtglpts').style.display='none';   
    }
    function btn_detailapprovalpts(isi){   
        
        console.log(isi+'===='); 
            
        var data        = isi.split('#');
        var kdretur     = data[0]; 
        var nmoutlet    = data[1];  
        var updateqa    = data[2];  
        var tgl_returpts = $('#tgl_returpts').val();

        
        var datefrmt        = tgl_returpts.split('-');
        $('#tx_headtgl').html(' /'+datefrmt[2]+'-'+datefrmt[1]+'-'+datefrmt[0]);  
        $('#tx_tittlepts').html(nmoutlet);

        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("pts_approvalqadet")); ?>',  
            data: {"_token": "<?php echo e(csrf_token()); ?>","plhtgl":tgl_returpts,"kdretur":kdretur},
            dataType: 'json',
            success:function(data){ 
                console.log(data);
                $('#loader').hide();
                var datas = data['detail'];
                var detail = datas.length;
                if(detail > 0){
                   var nomer = 0;
                    for (let i = 0; i < detail; i++) {
                        nomer++;
                        var kdretur         = datas[i]['kdretur'];
                        var kdverifikasi    = datas[i]['kdverifikasi'];
                        var kdbarang        = datas[i]['kdbarang'];
                        var nmbarang        = datas[i]['nmbarang'];
                        var qtyretur        = datas[i]['qtyretur'];
                        var foto1           = datas[i]['foto1'];
                        var foto2           = datas[i]['foto2'];
                        var ketreq          = datas[i]['ketreq'];
                        var nmjenis          = datas[i]['nmjenis'];
                        var nmsubjenis          = datas[i]['nmsubjenis'];
                        var satuan          = datas[i]['satuan'];
                        var tglterima          = datas[i]['tglterima'];
                        var isapprove, nmisapprove, ketqa, aaprvcolor  ; 
                        if(foto2 == 'F'){
                            foto2 = 'http://api.champ-group.com/champs-mobile/public/resource/img/cm/placeholder.jpg' ;
                        }
                        if(i == 0){ 
                            $('#tx_noretur').html(kdretur);
                            $('#tx_jnspts').html(nmjenis+' - '+nmsubjenis);
                        } 

                        if(datas[i]['isapprove'] === null){
                            isapprove  = '-'; 
                            nmisapprove = '-';
                            aaprvcolor='#000'; 
                        }else{
                            isapprove = datas[i]['isapprove'];
                            if (isapprove == 'F'){
                                nmisapprove = 'Reject';
                                aaprvcolor='#cc1a0b'; 
                            }else{   
                                nmisapprove = 'Approve';
                                aaprvcolor='#28a745';
                            }
                        }
                        if(datas[i]['ketqa'] === null){
                            ketqa  = '-'; 
                        }else{
                            ketqa = datas[i]['ketqa'];
                        }
                        var idli = "li_"+kdbarang;
                        //  onclick="btn_editdetpt(\''+kdbarang+'#'+nmbarang+'#'+qtyretur+'#'+foto1+'#'+foto2+'#'+isapprove+'#'+ketqa+'\')"
                        var rw ='<li class="   bg-white rounded"  id="'+i+'-'+kdretur+'_'+kdbarang+'" >'   
                            +'<input type="hidden" id="pts_kdretur[]" name="pts_kdretur[]" value="'+kdretur+'" required>'
                            +'<input type="hidden" id="pts_kdverifikasi[]" name="pts_kdverifikasi[]" value="'+kdverifikasi+'" required>'
                            +'<input type="hidden" id="pts_kdbarang[]" name="pts_kdbarang[]" value="'+kdbarang+'" required>'
                            +'<input type="hidden" id="pts_nmbarang[]" name="pts_nmbarang[]" value="'+nmbarang+'" required>'
                            +'<input type="hidden" id="pts_qtyretur[]"name="pts_qtyretur[]"  value="'+qtyretur+'" required>'
                            +'<input type="hidden" id="pts_foto1[]" name="pts_foto1[]" value="'+foto1+'" required>'
                            +'<input type="hidden" id="pts_foto2[]" name="pts_foto2[]" value="'+foto2+'" required>'
                            +'<input type="hidden" id="pts_ketreq[]" name="pts_ketreq[]" value="'+ketreq+'" required>'
                            +'<input type="hidden" id="'+i+'pts_isapprove'+kdbarang+'" name="pts_isapprove[]" value="'+isapprove+'" required>'
                            +'<input type="hidden" id="'+i+'pts_ketqa'+kdbarang+'" name="pts_ketqa[]" value="'+ketqa+'" required>'
                            +'<div class=" pr-2 pl-2 py-2" id="card'+i+'-'+kdretur+'_'+kdbarang+'" >'  

                                +'<div class="input-group mt-1" >' 
                                    +'<a  class=" col align-middle "  style="font-size: 12px; color:black;  padding-right:0px !important; padding-left:0px !important" ><b>'+kdbarang+' - '+nmbarang+'</b></a>'
                                        +'<div class="input-group-append">'
                                            +'<a class="my-0 cardbadge" style="font-size: 12px;"  >' 
                                                +'<span class="badge">'+nomer+'</span>' 
                                            +'</a>'
                                        +'</div>'
                                +'</div>' 
                                +'<div class="text-left" style=" padding-top: 2px;">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 87px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Qty</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+qtyretur+' '+satuan+'</a>'
                                        +'<div onclick="btn_editdetpt(\''+kdbarang+'#'+nmbarang+'#'+qtyretur+'#'+foto1+'#'+foto2+'#'+isapprove+'#'+ketqa+'\')" >'
                                            +'<div class="right" style="padding-right:30px;"> <img src="'+foto1+'" class="img-circle avatar " style="width: 25px; height: 25px;" /></div>'    
                                            +'<div class="right"> <img src="'+foto2+'" class="img-circle avatar " style="width: 25px; height: 25px;" /></div>'    
                                        +'</div>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left" style=" padding-top: 2px;">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 87px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Penyebab PTS</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+ketreq+'</a>'
                                    +'</div>'
                                +'</div>' 
                                +'<div class="text-left" style=" padding-top: 2px;" id="rw_tglterima'+i+'-'+kdbarang+'" >'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 87px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Tgl Terima</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black; padding-right:5px;" > : '+tglterima+'</a>'
                                    +'</div>'
                                +'</div>'  ;  
                                var rww =  
                                
                                '<div id="row_apprvlbtn_'+kdbarang+'">'
                                    
                                +'<div class="text-left" >'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 87px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Action QA</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : </a>'
                                        +'<div class="radio m-0 mx-2" onclick="radioApprv(\''+i+'#'+'slctapprv#'+kdbarang+'#'+kdretur+'\')">'
                                            +'<input name="'+i+'-apprv-'+kdbarang+'" id="'+i+'-slctapprv-'+kdbarang+'" value="T" type="radio" >'
                                            +'<label class="radio-label" for="'+i+'-slctapprv-'+kdbarang+'" style=" margin-left:5px !important; vertical-align:top !important; font-size : 12px !important;" > Approve</label>'
                                        +'</div>'
                                        +'<div class="radio  m-0 ml-2" onclick="radioApprv(\''+i+'#'+'slctrjct#'+kdbarang+'#'+kdretur+'\')">'
                                            +'<input type="radio" name="'+i+'-apprv-'+kdbarang+'" id="'+i+'-slctrjct-'+kdbarang+'" value="F" >'
                                            +'<label class="radio-label" for="'+i+'-slctrjct-'+kdbarang+'" style=" margin-left:5px !important; vertical-align:top !important; font-size : 12px !important;"> Reject</label>'
                                        +'</div>' 
                                    +'</div>'
                                +'</div>'  
                                +'<div class="text-left" style="margin-top: -8px !important;">' 
                                +'<span   style="font-size: 12px; color:black; min-width: 87px; padding:0px">'
                                    +'<a style="font-size: 12px; color:black; ">Keterangan QA</a>'
                                +'</span>'
                                +'<div class="input-group mb-2 mt-1">' 
                                    +'<textarea id="'+i+'-tx_ketqa-'+kdbarang+'" name="'+i+'-tx_ketqa-'+kdbarang+'" class="form-control align-middle " cols="40" rows="2" placeholder="contoh : Di setujui oleh Tim QA" style="font-size: 12px;"  ></textarea>'
                                        +'<div class="input-group-append" >'
                                            +'<button class="btn btn-success" id="'+i+'-btn_ketqa-'+kdbarang+'" name="'+i+'-btn_ketqa-'+kdbarang+'" type="button"  style="font-size: 12px; color:white; min-width: 30px;"> <i class="fa fa-paper-plane-o" style=" font-size: 20px;" onclick="btn_simpandetqa(\''+i+'#'+kdretur+'#'+kdbarang+'#'+nmbarang+'\')"  ></i> </button>'
                                    +'</div>'
                                +'</div>'
                                +'</div>'

                                    +'</div>'
                                    +'<div id="row_apprvlket_'+kdbarang+'">'
                                        +'<div class="text-left">'
                                            +'<div class="input-group ">'
                                                +'<div class="input-group-prepend">'
                                                    +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 87px; padding:0px">'
                                                        +'<b style="font-size: 12px; color:'+aaprvcolor+'; ">Action QA</b>'
                                                    +'</span>'
                                                +'</div> <b style="font-size: 12px;  color:'+aaprvcolor+';  padding-right:5px;" id="'+i+'htmlpts_isapprove'+kdbarang+'"> : '+nmisapprove+'</b>'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="text-left"  id="approve'+i+'-'+kdretur+'_'+kdbarang+'">'
                                            +'<div class="input-group ">'
                                                +'<div class="input-group-prepend">'
                                                    +'<span class="" id="basic-addon3" style="font-size: 12px; color:black; min-width: 87px; padding:0px">'
                                                        +'<b style="font-size: 12px; color:'+aaprvcolor+'; ">Ket QA</b>'
                                                    +'</span>'
                                                    +'<b style="font-size: 12px; color:'+aaprvcolor+'; padding-right:5px;"   > : </b>'
                                                +'</div> <b style="font-size: 12px; color:'+aaprvcolor+'; padding-right:5px;" id="'+i+'htmlpts_ketqa'+kdbarang+'" > '+ketqa+'  </b>'
                                            +'</div>'
                                        +'</div>' 
                                    +'</div>'  
                                    +'</div>'
                                +'</li><hr>';

                                // var id_lcal = i+'-'+kdretur+'_'+kdbarang;
                                // var KeyName = window.localStorage.key(i);
                                
                                // console.log('xxx'+KeyName+'==='+id_lcal);
                                // if (KeyName == id_lcal) {
                                //     var aa = JSON.parse(localStorage.getItem(id_lcal))[0];
                                //     // console.log('xx'+KeyName);
                                //     $('#ul_approvpts').append(aa);
                                // }else{  
                                    // console.log('xxx'+KeyName);
                                    $('#ul_approvpts').append(rw+rww);     
                                    if(isapprove == '-' ){ 
                                        document.getElementById('row_apprvlket_'+kdbarang).style.display='none';  
                                    }else if(isapprove == 'F'){ 
                                        document.getElementById('row_apprvlbtn_'+kdbarang).style.display='none';     
                                        document.getElementById('approve'+i+'-'+kdretur+'_'+kdbarang).style.display='block';  
                                    }else{ 
                                        document.getElementById('row_apprvlbtn_'+kdbarang).style.display='none';  
                                        document.getElementById('approve'+i+'-'+kdretur+'_'+kdbarang).style.display='none'; 
                                    }
                                    
                                    // console.log('xxx'+nmjenis);
                                    if(nmjenis != 'Spoiled'){ 
                                        document.getElementById('rw_tglterima'+i+'-'+kdbarang).style.display='none'; 
                                    }
                                // } 

                    }
                    
                        
                }else{
                    $('#detailptskosong').html('<div class="text-center ">'+
                            '<lottie-player src="<?php echo e(asset('public/resource/lottie/kosong.json')); ?>" background="transparent" speed="1" style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>'+
                            '</lottie-player>'+
                            ' <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>'+
                            '</div> '); 
                } 

            if(updateqa == ''){ 
                document.getElementById('btn_simpanapproval').style.display='block';   
            } else {
                document.getElementById('btn_simpanapproval').style.display='none';  
            }          
              
            document.getElementById('mdl_detailpts').style.display='block';  
            },
            error: function () {
                $('#loader').hide();
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Server Kita Bermasalah!",
                    confirmButtonColor: '#cc1a0b',
                    allowOutsideClick: false,
                });
            }
        }); 
    }

     
function radioApprv(stts){
    var data        = stts.split('#');
    var urtan       = data[0]; 
    var nm          = data[1]; 
    var kdbarang    = data[2]; 
    var kdretur     = data[3]; 

    var id_li =  urtan+'-'+kdretur+'_'+kdbarang;  
    // let id_ilhtml = $('#'+id_li).html(); 
    // console.log(id_ilhtml)
    var x =[];
    // if (localStorage.getItem(id_li)===null){
    //     x = [];
    // }else{
    //     x = JSON.parse(localStorage.getItem(id_li));
    // }


    if(nm == 'slctapprv'){
        var v = urtan+'-slctapprv-'+kdbarang;
        var aa= $('#'+v).val();
        console.log(v+'==='+aa);

        $('#'+urtan+'pts_isapprove'+kdbarang+'').val(aa);  
        $('#'+urtan+'htmlpts_isapprove'+kdbarang+'').html(': Approve');

        document.getElementById(urtan+'-btn_ketqa-'+kdbarang).style.display='none';   

        $('#'+urtan+'pts_ketqa'+kdbarang).val('Di setujui oleh QA');    
        $('#'+urtan+'-tx_ketqa-'+kdbarang+'').val('Di setujui oleh QA');  
        $('#'+urtan+'pts_ketqa'+kdbarang+'').attr('readonly', true);
        $('#'+urtan+'-tx_ketqa-'+kdbarang+'').attr('readonly', true); 
        $("#card"+id_li).css({"background": "rgba(153, 238, 203, 0.808)"}); 
        $("#"+urtan+'-slctrjct-'+kdbarang).attr("checked", false);
        $("#"+v).attr('checked', 'checked');
        // document.getElementById(id_li).style.background='rgba(153, 238, 203, 0.808)'; 
        // localStorage.removeItem(id_li);
        
        // x.push($('#'+id_li).html());	 
        // localStorage.setItem(id_li,JSON.stringify(x));    
    }else if(nm == 'slctrjct'){ 
        var v = urtan+'-slctrjct-'+kdbarang;
        var aa= $('#'+v).val();
        console.log(v+'==='+aa);
        
        $('#'+urtan+'pts_isapprove'+kdbarang+'').val(aa);  
        $('#'+urtan+'htmlpts_isapprove'+kdbarang+'').html(': Reject');

        document.getElementById(urtan+'-btn_ketqa-'+kdbarang).style.display='block'; 

        $('#'+urtan+'pts_ketqa'+kdbarang+'').val('');    
        $('#'+urtan+'-tx_ketqa-'+kdbarang+'').val('');  
        $('#'+urtan+'pts_ketqa'+kdbarang+'').attr('readonly', false);
        $('#'+urtan+'-tx_ketqa-'+kdbarang+'').attr('readonly', false);   
        $("#card"+id_li).css({"background": "#FFF"}); 
        $("#"+urtan+'-slctapprv-'+kdbarang).attr("checked", false);   
        $("#"+v).attr('checked', 'checked');
        // localStorage.removeItem(id_li);
        
        // x.push($('#'+id_li).html());	 
        // localStorage.setItem(id_li,JSON.stringify(x));  
    } 
     
    }

 
    function plh_tglpts(){    
       
        $('#send_approvpts').submit();  
        $('#loader').show();  
            $(document).ready(function () {  
            var refreshId = setInterval(function () {
                $('#loader').hide();
                }, 5000);
                $.ajaxSetup({ cache: false });
            });
    }

    function btn_editdetpt(isi){   
        // kdbarang+'#'+nmbarang+'#'+qtyretur+'#'+foto1+'#'+foto2
        console.log('=='+isi);

        var data        = isi.split('#');
        var kdbarang    = data[0]; 
        var nmbarang    = data[1]; 
        var qtyretur    = data[2]; 
        var foto1       = data[3]; 
        var foto2       = data[4]; 
        var isapprove   = data[5]; 
        var ketqa       = data[6]; 


        $('#tx_optnqadet').val(isapprove);
        $('#inpt_kdbrng').val(kdbarang);
        $('#tx_upketqa').html(nmbarang+' / Qty '+qtyretur);
        if(ketqa != 'null'){ 
            $('#tx_ketqa').val(ketqa);
        }
        // slideimg
        // if(foto1 == 'F'){
        //     $('#img_ft1').attr("src", 'http://api.champ-group.com/champs-mobile/public/resource/img/cm/placeholder.jpg'); 
        //     $('#img_mdlft1').attr("src", 'http://api.champ-group.com/champs-mobile/public/resource/img/cm/placeholder.jpg'); 
        // }else{ 
        //     $('#img_ft1').attr("src", foto1); 
        //     $('#img_mdlft1').attr("src", foto1); 
        // }
        // if(foto2 == 'F'){
        //     $('#img_ft2').attr("src", 'http://api.champ-group.com/champs-mobile/public/resource/img/cm/placeholder.jpg'); 
        //     $('#img_mdlft2').attr("src", 'http://api.champ-group.com/champs-mobile/public/resource/img/cm/placeholder.jpg'); 
        // }else{ 
        //     $('#img_ft2').attr("src", foto2); 
        //     $('#img_mdlft2').attr("src", foto2); 
        // } 
        console.log('====foto1==='+foto1);
        console.log('====foto2==='+foto2);
        if(foto1 !== 'F'){  
            $('#img_ft1').attr("src", foto1); 
            $('#img_mdlft1').attr("src", foto1);
            if(foto2 !== 'F'){
                $('#img_ft2').attr("src", foto2); 
                $('#img_mdlft2').attr("src", foto2); 
            }
            document.getElementById('mdl_updateketqa').style.display='block';
        }   
    }

    function btn_submitapproval(){  

        //validasi array kosong
        var input = document.getElementsByName('pts_isapprove[]');
        var inputketqa = document.getElementsByName('pts_ketqa[]');
        var hslisparrv;

            for (var i = 0; i < inputketqa.length; i++) {
                var ketqa = inputketqa[i].value;

                if(ketqa == '-' || ketqa == ''){
                    hslisparrv = ketqa; 
                    console.log(ketqa+'==='+i);
                }
                // var a = pts_isapprove[i];
                // k = k + "array[" + i + "].value= "
                //                     + a.value + " ";
            }

            console.log('=========='+hslisparrv);
        if(hslisparrv == '-' || hslisparrv == ''){
            swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Approve dan Keterangan QA Harus di terisi semua!",
                    confirmButtonColor: '#cc1a0b',
                    allowOutsideClick: false,
                });
        }else{
            Swal.fire({
                    text: "Apakah anda yakin akan menyimpannya?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: "Tidak",
                    confirmButtonText: 'Ya, Simpan!' ,
                    reverseButtons: true,
                    allowOutsideClick: false 
                }).then((result) => {
                    if (result.isConfirmed)
                { 
                    event.preventDefault(); 
                    loadingon(); 
                    $('#form_approval').submit() 
                }
            }) 
        } 
    }

    function btn_simpandetqa(isi){ 

        var data        = isi.split('#');
        var urtan       = data[0]; 
        var kdretur     = data[1]; 
        var kdbarang    = data[2]; 
        var nmbarang    = data[3]; 

        var id_li = 'card'+urtan+'-'+kdretur+'_'+kdbarang; 
        var ptsapprv = $('#'+urtan+'pts_isapprove'+kdbarang+'').val();  
        var ptsktrng = $('#'+urtan+'-tx_ketqa-'+kdbarang+'').val();     

       

        if(ptsapprv == '-' || ptsapprv == '' ){
            swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Approve QA ("+nmbarang+") harus di pilih!",
                    confirmButtonColor: '#cc1a0b',
                    allowOutsideClick: false,
                });
        }else{  
            if(ptsapprv == 'T'){
                document.getElementById(id_li).style.background='rgba(153, 238, 203, 0.808)';   
            }else{
                if(ptsktrng == '-' || ptsktrng == '' ){
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "Keterangan Reject QA tidak boleh kosong!",
                        confirmButtonColor: '#cc1a0b',
                        allowOutsideClick: false,
                    });
                }else{ 
                    document.getElementById(id_li).style.background='rgba(238, 153, 153, 0.808)';  
                }
            } 
            $('#'+urtan+'pts_ketqa'+kdbarang+'').val(ptsktrng.replace(/(?:\r\n|\r|"|\n)/g, ' '));    
            $('#'+urtan+'pts_isapprove'+kdbarang+'').val(ptsapprv);   
        } 
    } 

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout_presence', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/pts/approvalqa.blade.php ENDPATH**/ ?>