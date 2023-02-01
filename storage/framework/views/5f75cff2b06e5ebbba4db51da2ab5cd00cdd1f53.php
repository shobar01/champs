<script>
    $(document).ready(function(){
        $("#searchtk").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#isiticket div.xxc").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        });
    });
    const months = [
        { 'id': 1, 'name': 'Jan' },
        { 'id': 2, 'name': 'Feb' },
        { 'id': 3, 'name': 'Mar' },
        { 'id': 4, 'name': 'Apr' },
        { 'id': 5, 'name': 'May' },
        { 'id': 6, 'name': 'Jun' },
        { 'id': 7, 'name': 'Jul' },
        { 'id': 8, 'name': 'Aug' },
        { 'id': 9, 'name': 'Sep' },
        { 'id': 10, 'name': 'Oct' },
        { 'id': 11, 'name': 'Nov' },
        { 'id': 12, 'name': 'Dec' },
    ];
    var currentYear = new Date().getFullYear();
    var currentMonth = new Date().getMonth() + 1;
    function letsCheck(year, month) {
        var daysInMonth = new Date(year, month, 0).getDate();
        var firstDay = new Date(year, month, 01).getUTCDay();
        var array = {
            daysInMonth: daysInMonth,
            firstDay: firstDay
        };
        return array;
    }
    function makeCalendar(year, month) {
        var getChek = letsCheck(year, month);
        getChek.firstDay === 0 ? getChek.firstDay = 7 : getChek.firstDay;
        $('#calendarList').empty();
        for (let i = 1; i <= getChek.daysInMonth; i++) {
            if (i === 1) {
                var div = '<li id="' + i + '" style="grid-column-start: ' + getChek.firstDay + ';">1</li>';
            } else {
                var div = '<li id="' + i + '" >' + i + '</li>'
            }
            $('#calendarList').append(div);
        }
        monthName = months.find(x => x.id === month).name;
        $('#yearMonth').text(year + ' ' + monthName);
    }
    makeCalendar(currentYear, currentMonth);
    function nextMonth() {
        currentMonth = currentMonth + 1;
        if (currentMonth > 12) {
            currentYear = currentYear + 1;
            currentMonth = 1;
        }
        $('#calendarList').empty();
        $('#yearMonth').text(currentYear + ' ' + currentMonth);
        makeCalendar(currentYear, currentMonth);
        $('#tgghist').val(currentYear + '-' + currentMonth+'-01')
        bukatglhist()
    }
    function prevMonth() {
        currentMonth = currentMonth - 1;
        if (currentMonth < 1) {
            currentYear = currentYear - 1;
            currentMonth = 12;
        }
        $('#calendarList').empty();
        $('#yearMonth').text(currentYear + ' ' + currentMonth);
        makeCalendar(currentYear, currentMonth);
        $('#tgghist').val(currentYear + '-' + currentMonth+'-01')
        bukatglhist()
    }
    function curMonth() {
        var x = "<?php echo e(date('Y-m-d')); ?>";
        $('#tgghist').val(x);
        currentMonth = currentMonth;
        if (currentMonth > 12) {
            currentYear = currentYear;
            currentMonth = 1;
        }
        $('#calendarList').empty();
        $('#yearMonth').text(currentYear + ' ' + currentMonth);
        makeCalendar(currentYear, currentMonth);
    }
    
   
    function bukatglhist(){
        var kdstatus = "<?php echo e($kdstatus); ?>";
        var tgg = $('#tgghist').val();
        $('#tglhist').modal('show');
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type: 'GET',
            url: '<?php echo e(url("ambiltgl")); ?>?tanggal='+tgg,
            dataType: 'json',
            success:function(data){
                console.log(data)
                for (let i = 0; i < data.length; i++) {
                    var tglmn = data[i]['tanggal'];
                    var jml = data[i]['jml'];                        
                    var d = new Date(tglmn);
                    var tgl = d.getFullYear()+'-'+("0" + (d.getMonth() + 1)).slice(-2)+'-'+("0" + d.getDate()).slice(-2);
                    // console.log(d.getDate())
                    $('#'+d.getDate()).addClass('lingkar')
                                .attr("onclick","cekdet('"+tgl+"','"+kdstatus+"')")
                                .append('<span id="lx'+d.getDate()+'" class="lx">'+jml+'</span>')
                }
            }
        });
    }
    function closetgl(){
        $('#tglhist').modal('hide')
    }
    function cekdet(tanggal,kd){
        window.location.href = "<?php echo e(route('ticketing')); ?>?tanggal="+tanggal+"&kdstatus="+kd;
    }
    function cekkd(kd){
        window.location.href = "<?php echo e(route('ticketing')); ?>?kdstatus="+kd;
    }
    function closebottom(){
        $('#detailtc').removeClass('slidein').addClass('slideout');
        setTimeout(() => {
            $('#detailtc').modal('hide')
        }, 800);
    }
    function copied(){
        var valueText = $(".titlereq").select().val();
        document.execCommand("copy");
        Swal.fire({
            position: 'bottom-end',
            html: '<p class="mb-0"><i class="fa fa-check-circle"></i> Copy To Clipboard</p>',
            showConfirmButton: false,
            timer: 1500
        })
    }
    function openticket(kdticket){
        $('#testobay').val('F')
        $('#detailtc').removeClass('slideout').addClass('slidein');
        $('#detailtc').modal('show');
        $('#mod-head').addClass('')
        $('#isidetail').empty();
        $('#reminder').hide();
        $('#terima').hide();
        $('#selesai').hide();
        $('#selesai').attr('onclick', 'rate(\''+kdticket+'\')'); 
        $('#keluarrate').attr('onclick','closerate(\''+kdticket+'\')'); 
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("openticket")); ?>',
            data: {"_token": "<?php echo e(csrf_token()); ?>","kdticket":kdticket},
            dataType: 'json',
            success:function(response){
                var data = response['dettrack'];
                var id_dept = response['id_dept'];
                var iddepttujuan = response['iddepttujuan'];
                var readby = response['readby'];
                var nmkat = response['nmkat'];
                var kdkat = response['kdkat'];
                console.log(response);
                $('.titlereq').val(kdticket);
                $('.kat').html(nmkat);
                $('#terimakdticket').val(kdticket);
                $('#kategoriter').val(kdkat);
                $('#txtujuan').val(iddepttujuan);
                $('#txmessage').val(data[0]['keterangan']);
                $('#nmoutlet').val(id_dept);
                for (let i = 0; i < data.length; i++) {
                    var kdstatus = data[i]['kdstatus'];
                    var image = data[i]['image'];
                    var nmstatus = data[i]['nmstatus'];
                    var wktupdate = data[i]['wktupdate'];
                    var newdate = new Date(wktupdate).toLocaleString('id-ID', { year:"numeric", month:"short", day:"numeric", hour: "2-digit", minute: "2-digit", second: "2-digit"});                
                    var nm_lengkap = data[i]['nm_lengkap'];
                    var keterangan = data[i]['keterangan'];
                    var sub = data[i]['keterangan'].substring(0,20)+'...';
                    var nama = data[i]['nm_lengkap'].substring(0,20)+'';
                    var dep = kdstatus == "T001" || kdstatus == "T009" || kdstatus == "T010" ? id_dept : iddepttujuan;
                    var bgcolor = data[i]['bgcolor'];
                    // var foto1 = data[i]['foto1'];
                    // var foto2 = data[i]['foto2'];
                    var xlat = data[i]['xlat'];
                    var xlong = data[i]['xlong'];
                    var alamat = data[i]['alamat'];
                    var ff = foto1=='F'?'pilih-ff':'';
                    var ff1 = foto1=='F'?'pilih-ff':'onclick="klikfoto(\''+foto1+','+kdticket+','+kdstatus+'\')"';
                    
                if(kdstatus == 'T001' || kdstatus == 'T010'){
                    var foto1 = data[i]['foto1'];
                    var ff = foto1=='F'?'pilih-ff':'';
                    var ff1 = foto1=='F'?'pilih-ff':'onclick="klikfoto(\''+foto1+','+kdticket+','+kdstatus+'\')"';
                }else{                           
                    var foto2 = data[i]['foto2'];
                    var ff = foto2=='F'?'pilih-ff':'';
                    var ff1 = foto2=='F'?'pilih-ff':'onclick="klikfoto(\''+foto2+','+kdticket+','+kdstatus+'\')"';
                } 
                    var gg = xlat=='F'?'pilih-ff':'';
                    var gg2 = xlat=='F'?'':'onclick="initialize(\''+xlat+'#'+xlong+'#'+nama+'#'+alamat+'\')"';
                    var hh = readby.length == 0?'pilih-ff':'';
                    var hh2 = readby.length == 0?'':'data-toggle="modal" data-target="#modread"';

                    var row ='<div class="row">'+
                                '<div class="col-4 nwdate px-1">'+
                                    '<p id="tglstatus" class="my-3 f-12 px-2 text-center"> '+newdate.replaceAll('.',':')+' </p>'+
                                    '<div class="text-center pilih">'+
                                        '<button class="btn btn-pilih '+ff+'" '+ff1+'><i class="fa fa-camera"></i></button>'+
                                        '<button class="btn btn-pilih '+gg+'" '+gg2+'><i class="fa fa-map-marker"></i></button>'+
                                        '<button class="btn btn-pilih '+hh+'" '+hh2+'><i class="fa fa-eye"></i></button>'+
                                    '</div>'+
                                    '<hr class="hr-pilih">'+
                                '</div>'+
                                '<div class="col-1">'+
                                    '<div class="mxz"></div>'+
                                    '<button class="'+bgcolor+' btn-status2">'+
                                    '<i class="fa '+image+' fa-2x"></i>'+
                                    '</button>'+
                                '</div>'+
                                '<div class="col-6 pt-2 pl-0">'+
                                    '<p class="mb-0 judul-tiket pl-4">'+nmstatus+'</p>'+
                                    '<p class="mb-0 subjudul pl-4" onclick="note_ket(\''+kdticket+','+kdstatus+'\')">'+sub+'</p><input type="hidden" id="note'+kdticket+kdstatus+'" value="'+data[i]['keterangan']+'">'+
                                    '<hr class="m-0"> <span class="f-10 pl-4">Oleh : '+nama+'</span><br>'+
                                    '<p class="pl-4 f-10">'+dep+'</p>'+
                                '</div>'+
                            '</div>';
                    $('#isidetail').append(row);

                    if (kdstatus == 'T008') {
                        $('#reminder').hide();
                        $('#selesai').show();
                        $('#terima').hide();
                        // $('#selesai').prop('disabled', false);
                    }else if (kdstatus == 'T009'){
                        $('#reminder').hide();
                        $('#selesai').hide();
                        $('#terima').hide();
                        // $('#selesai').prop('disabled', true);
                    }else if(kdstatus == 'T005'){
                        $('#reminder').show();
                        $('#selesai').hide();
                        $('#terima').show();
                    }else if (kdstatus == 'T006') {
                        $('#reminder').hide();
                        $('#selesai').hide();
                        $('#terima').hide();
                    }else if (kdstatus == 'T007'){
                        $('#reminder').hide();
                        $('#selesai').hide();
                        $('#terima').hide();
                    }else {
                        $('#selesai').hide();
                        $('#terima').hide();
                        $('#reminder').show();
                        // $('#selesai').prop('disabled', true);  
                    }

                   

                    $('#reads').empty();
                    if(readby.length > 0){
                        for (let j = 0; j < readby.length; j++) {
                            var nama = readby[j]["nama"];
                            var wktread = readby[j]["wktread"];
                            var foto = readby[j]["foto"]=='F'?"<?php echo e(asset('public/resource/img/user.png')); ?>":'https://api2.champ-group.com/champ_dev/asset/champs_api/images_user/'+ readby[j]["foto"];

                            var rr = '<div class="card card-rad shadow-lg">'+
                                        '<div class="card-body card-rad p-1">'+
                                            '<div class="media">'+
                                                '<img src="'+foto+'" class="mr-3 shadow">'+
                                                '<div class="media-body">'+
                                                    '<h5 class="mt-0 f-17">'+nama+'</h5>'+
                                                    '<p class="mb-0">'+wktread+'</p>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>';
                            $('#reads').append(rr);
                        }
                    }
                }
            }
        });
    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfFB3dsyGmzSihW3x1P1yAEyq3Kdp49NY"
    type="text/javascript">
</script>
<script>
    // fungsi initialize untuk mempersiapkan peta
function initialize(longlat) {
    $('#maps').modal('show');
    var a = longlat.split('#')
    var latt = a[0];
    var longg = a[1];
    var nm = a[2];
    var alamat = a[3];
    const ll = { lat: parseFloat(latt), lng: parseFloat(longg) };

    // console.log(latt);
    var propertiPeta = {
        center:new google.maps.LatLng(latt,longg),
        zoom:13,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    TestMarker(latt,longg,nm,alamat)
}

function addMarker(location) {
    marker = new google.maps.Marker({
        position: location,
        map: peta
    });
}
function TestMarker(latt,longg,nm,alamat) {
    CentralPark = new google.maps.LatLng(latt,longg);
    const contentString =
    '<div id="content">' +
    '<div id="siteNotice">' +
    '</div>' +
    '<h5 id="firstHeading" class="firstHeading">'+nm+'</h5>' +
    '<div id="bodyContent">' +
    '<p>'+alamat+'</p>' +
    '</div>' +
    '</div>';
    const infowindow = new google.maps.InfoWindow({
        content: contentString,
        ariaLabel: nm,
    });
    const marker = new google.maps.Marker({
        position: CentralPark,
        map : peta,
        title: nm,
    });
    // marker.addListener("click", () => {
        infowindow.open({
        anchor: marker,
        map : peta,
        });
    // });
    // addMarker(CentralPark);
}

function simpanrating(){
        Swal.fire({
        title: 'Kirim Rating?',
        showCancelButton: true,
        confirmButtonText: 'Kirim',
        cancelButtonText: 'Cancel',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
           $('#simpan_rate').submit()
        }
        })
    }

function validasi() {
		var pesan = document.getElementById("pesan").value;
		if (pesan != "" ) {
            Swal.fire({
            title: 'Kirim Request?',
            showCancelButton: true,
            confirmButtonText: 'Kirim',
            cancelButtonText: 'Cancel',
            reverseButtons: true
            }).then((result) => {
        if (result.isConfirmed) {
            $('#simpanreq').attr('disabled','disabled')
			$('#simpan_ticket').submit()
        }
        })
		}else{
            var pesan = document.getElementById("errorpesan");
            errorpesan.innerHTML = "*Pesan tidak boleh kosong";
            Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Anda harus mengisi pesan terlebih dahulu!',
            denyButtonText: 'OK',    
            showDenyButton: true,
            showConfirmButton:false,
            })
		}
  
	}

    function reg(id){
        var text = $('#'+id).val();
        var c = text.replace(/[^a-zA-Z0-9:,. ]/g, '');
        $('#'+id).val(c);

        if(text != ""){
        $('#errorpesan').hide();  
        }else{
        $('#errorpesan').show();  
        }    
    }

    function reg2(id){
        var text = $('#'+id).val();
        var c = text.replace(/[^a-zA-Z0-9:,. ]/g, '');
        $('#'+id).val(c);

        if(text != ""){
        $('#errorulasan').hide();  
        }else{
        $('#errorulasan').show();  
        }    
    }


    function calldept(){
        $('#kategori').empty();
        let dept = $('#idtujuantck').val();
        if(dept == '-'){
            $("#kategori").prop('disabled', true);
            $("#pesan").prop('disabled', true).val("");
            $("#bukti").prop('disabled', true);
            $(".levelx").prop('disabled', true);
            $("#simpanreq").prop('disabled', true);
            swal.fire({
                icon: 'warning',
                title: 'Maaf, Harus Memilih Departmen!',
                denyButtonText: 'OK',
                showDenyButton: true,
                showConfirmButton:false
            })
        }
        let nmdept = $('#tuj'+dept).html();
        $('#namatxtujuan').val(nmdept)
       
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type: 'GET',
            url: '<?php echo e(url("datatujuan")); ?>?dept='+dept,
            dataType: 'json',
            success:function(data){
             
                let katdept = data['katdept'];
                for (let i = 0; i < katdept.length; i++) {
                    let kdkat = katdept[i]['kdkat'];
                    let nmkat = katdept[i]['nmkat'];
                    let rowkat = '<option value="'+kdkat+'">'+nmkat+'</option>';
                    $('#kategori').append(rowkat)
                       console.log(data)
                }
                if(katdept.length < 1){
                    $("#kategori").prop('disabled', true);
                    $("#pesan").prop('disabled', true).val("");
                    $("#bukti").prop('disabled', true);
                    $(".levelx").prop('disabled', true);
                    $("#simpanreq").prop('disabled', true);
                    swal.fire({
                        icon : "warning",
                        title : "Maaf, Belum Bisa Request ke Departmen "+nmdept,
                        html : '<div class="text-center">Silahkan Pilih Tujuan Yang lain</div>',
                        denyButtonText: 'OK',
                        showDenyButton: true,
                        showConfirmButton:false,
                    })
                }else{
                    $("#kategori").prop('disabled', false);
                    $("#pesan").prop('disabled', false);
                    $("#bukti").prop('disabled', false);
                    $(".levelx").prop('disabled', false);
                    $("#simpanreq").prop('disabled', false);
                }
            },error: function () {
            }
        }); 
    }

    function info(){
        $('#infokat').modal('show');
        $('#exampleModal').modal('hide');
    }
    function cinfo(){
        $('#infokat').modal('hide');
        $('#exampleModal').modal('show');
    }

    function note_ket(x){
        var a = x.split(',');
        var ticket = a[0];
        var kdstatus = a[1];
        var note = $('#note'+ticket+kdstatus).val();
        console.log(note);
        console.log(ticket);
        console.log(kdstatus);
        $('#keterangan').html(note);
        $('#note_menunggu').modal('show'); 
        // $('#detailtc').modal('hide');
        $('#keluar').attr('onclick','closenote_ket()');
    }
    
     function closenote_ket(){
        $('#note_menunggu').modal('hide'); 
        $('#detailtc').modal('show');
        $('#keluar').html();
    }

    function rate(kdticket){
        $('#rate').modal('show');
        $('#detailtc').modal('hide');  
        $('#ratekdticket').val(kdticket);
    }

    function closerate(kdticket){
        $('#detailtc').modal('show'); 
        $('#rate').modal('hide'); 
    }

    function bukafoto(){        
        $('#fototick').modal('show');
        $('#prterima').modal('hide'); 
        startVideo()
    }
    function cbukafoto(){        
        $('#fototick').modal('hide');
        $('#prterima').modal('show'); 
        startVideo()
    }

    function klikfoto(y){
        var a = y.split(',');
        var x = a[0];
        var ticket = a[0];
        var kdstatus = a[1];
        $('#idfoto').attr('src',ticket);
        $('#fotofe').modal('show');
    }

    function cklikfoto(){
        $('#klikfoto').modal('hide'); 
        $('#keluarfoto').html();
    }

    function klikfoto(y){
        var a = y.split(',');
        var x = a[0];
        var ticket = a[0];
        var kdstatus = a[1];
        $('#idfoto').attr('src',ticket);
        $('#fotofe').modal('show');
    }

    function tfoto(){
        var foto = $('').val();
        $('#tampilfoto').attr('src',foto);
        $('#tfoto').modal('show'); 
    }
    function ctfoto(){
        $('#tfoto').modal('hide'); 
    }

    function tfototer(){
        var foto = $('').val();
        $('#tampilfotoku').attr('src',foto);
        $('#tfototerima').modal('show'); 
        $('#prterima').modal('hide'); 
    }
    function cterimafoto(){
        $('#tfototerima').modal('hide'); 
        $('#prterima').modal('show'); 
    }

    function reminder(){
        var deptujuan = $('#txtujuan').val();
        Swal.fire({
        title: "Ingatkan Departmen "+deptujuan+" jika tiket belum juga di proses?",

        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, ingatkan!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            // var kdkat = $('#isikatbaru').val();
            var deptujuan = $('#txtujuan').val();
            var message = $('#txmessage').val();
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                $.ajax({
                    type: 'GET',
                    url: '<?php echo e(url("reminder")); ?>?txtujuan='+deptujuan+'&txmessage='+message,
                    data: {"_token": "<?php echo e(csrf_token()); ?>"},
                    dataType: 'json',
                    success:function(data){  
                        swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: "Berhasil di Reminder",
                        confirmButtonColor: '#008000'
                    });
                        console.log(data)
                    }
                });
    }
    })
    }

    function terima(){
        var ulasan = document.getElementById("ulasanku").value;
		if (ulasan != "" ) {
            Swal.fire({
            title: 'Kirim Bukti Terima?',
            showCancelButton: true,
            confirmButtonText: 'Kirim',
            cancelButtonText: 'Cancel',
            reverseButtons: true
            }).then((result) => {
        if (result.isConfirmed) {
            $('#simpanter').attr('disabled','disabled')
			$('#simpan_terima').submit()
        }
        })
		}else{
            var ulasan = document.getElementById("errorulasan");
            errorulasan.innerHTML = "*Keterangan tidak boleh kosong";
            Swal.fire({
            icon: 'error',
            title: 'Gagal...',
            text: 'Anda harus mengisi keterangan terlebih dahulu!',
            denyButtonText: 'OK',
            showDenyButton: true,
            showConfirmButton:false,
            })
		}
    }

    function detterima(){
    $('#testobay').val('T')
    $('#prterima').modal('show'); 
     console.log($('#testobay').val())
}

</script>

<script>
    feather.replace();
    const controls = document.querySelector('.controls');
    const cameraOptions = document.querySelector('.video-options>select');
    const video = document.querySelector('video');
    const canvas2 = document.getElementById('canvas2');
    const fefoto = document.getElementById('fefoto');
    const bayz = document.getElementById('bayz');
    const cthfoto = document.getElementById('cthfoto');
    const screenshotImage = document.getElementById('ssimage');
    const buttons = [...controls.querySelectorAll('button')];
    let streamStarted = false;


    const [play, pause, screenshot] = buttons;
    const videoConstraints = {};
    if (cameraOptions.value === '') {
      videoConstraints.facingMode = 'environment';
    } else {
      videoConstraints.deviceId = { exact: cameraOptions.value };
    }
   const constraints = {
    video: videoConstraints,
    audio: false
   };

    const getCameraSelection = async () => {
      const devices = await navigator.mediaDevices.enumerateDevices();
      const videoDevices = devices.filter(device => device.kind === 'videoinput');
      const options = videoDevices.map(videoDevice => {
          return '<option value="'+videoDevice.deviceId+'">'+videoDevice.label+'</option>';
      });
      cameraOptions.innerHTML = options.join('');
    };

    // const getCameraSelection2 = async () => {
    //   const devices = await navigator.mediaDevices.enumerateDevices();
    //   const videoDevices = devices.filter(device => device.kind === 'videoinput');
    //   const options = videoDevices.map(videoDevice => {
    //       return '<option value="'+videoDevice.deviceId+'">'+videoDevice.label+'</option>';
    //   });
    //   cameraOptions.innerHTML = options.join('');
    // };

    function ereun(){
        video.pause();
        play.classList.remove('d-none');
        pause.classList.add('d-none');
    }
    function startVideo() {
      if (streamStarted) {
        video.play();
        play.classList.add('d-none');
        pause.classList.add('d-none');
        return;
      }
      if ('mediaDevices' in navigator && navigator.mediaDevices.getUserMedia) {
        const updatedConstraints = {
          ...constraints,
          deviceId: {
                      exact: cameraOptions.value
                    }
        };
        startStream(updatedConstraints);
      }
    };
    const startStream = async (constraints) => {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        handleStream(stream);
    };
    const handleStream = (stream) => {
        video.srcObject = stream;
        play.classList.add('d-none');
        pause.classList.add('d-none');
        screenshot.classList.remove('d-none');
        streamStarted = true;
    };
    
    const doScreenshot = () => {
        
        canvas2.width = video.videoWidth;
        canvas2.height = video.videoHeight;
        canvas2.getContext('2d').drawImage(video, 0, 0);
        screenshotImage.src = canvas2.toDataURL('image/webp');
        document.getElementById('tampilfoto').src = canvas2.toDataURL('image/webp');
        document.getElementById('tampilfotoku').src = canvas2.toDataURL('image/webp');
        screenshotImage.classList.remove('d-none');
        bayz.value = canvas2.toDataURL('image/webp');
        fefoto.value = canvas2.toDataURL('image/webp');
        cthfoto.src = canvas2.toDataURL('image/webp');
        cthfototer.src = canvas2.toDataURL('image/webp');
        $('#fototick').modal('hide');
        if($('#testobay').val() == 'T'){
        detterima()
        }
        setTimeout(function(){ 
          canvas2.remove();
          video.pause();
          video.currentTime = 0;
        }, 1000);
    };
    screenshot.onclick = doScreenshot;


    // function startVideo2() {
    //     if (streamStarted2) {
    //       video2.play();
    //       play.classList.add('d-none');
    //       pause.classList.add('d-none');
    //       return;
    //     }
    //     if ('mediaDevices' in navigator && navigator.mediaDevices.getUserMedia) {
    //       const updatedConstraints2 = {
    //         ...constraints,
    //         deviceId: {
    //                     exact: cameraOptions.value
    //                   }
    //       };
    //       startStream2(updatedConstraints2);
    //     }
    // };
    // const startStream2 = async (constraints) => {
    //     const stream2 = await navigator.mediaDevices.getUserMedia(constraints);
    //     handleStream2(stream2);
    // };
    // const handleStream2 = (stream2) => {
    //     video2.srcObject = stream2;
    //     play.classList.add('d-none');
    //     pause.classList.add('d-none');
    //     screenshot2.classList.remove('d-none');
    //     streamStarted2 = true;
    // };
    // const doScreenshot2 = () => {
    //     canvas3.width = video2.videoWidth;
    //     canvas3.height = video2.videoHeight;
    //     canvas3.getContext('2d').drawImage(video2, 0, 0);
    //     screenshotImage2.src = canvas3.toDataURL('image/webp');
    //     screenshotImage2.classList.remove('d-none');
    //     idfoto2.value = canvas3.toDataURL('image/webp');
    //     setTimeout(function(){ 
    //       isiketerangan();
    //       canvas3.remove();
    //       video2.pause();
    //       video2.currentTime = 0;
    //     }, 1000);
    // };
    // screenshot2.onclick = doScreenshot2;

    getCameraSelection();
    // getCameraSelection2();
</script>


<?php /**PATH G:\ChampApplication\xampp\htdocs\champs-mobile\resources\views/ticketing/script.blade.php ENDPATH**/ ?>