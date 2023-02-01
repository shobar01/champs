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
            url: '<?php echo e(url("ambiltgl2")); ?>?tanggal='+tgg,
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
        window.location.href = "<?php echo e(route('backend')); ?>?tanggal="+tanggal+"&kdstatus="+kd;
    }
    function cekkd(kd){
        window.location.href = "<?php echo e(route('backend')); ?>?kdstatus="+kd;
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
            // Get the text field
  
        })
    }
    function openticketbe(kdticket){
        $('#showpil').show();
        $('#kdticketku').val(kdticket);
        $('#kdticketpil').val(kdticket);
        $('#detailtc').removeClass('slideout').addClass('slidein');
        $('#detailtc').modal('show');
        $('#mod-head').addClass('')
        $('#proses').hide();
        $('#isidetail').empty();
        $('#ubahstatus').empty();
         $('#ket').val('');
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("openticketbe")); ?>',
            data: {"_token": "<?php echo e(csrf_token()); ?>","kdticket":kdticket},
            dataType: 'json',
            success:function(data){
                var response = data['lstrack'];
                var statuss = data['lsstatus'];
               
                for (let y = 0; y < statuss.length; y++) {
                    var kdstatus = statuss[y]['kdstatus'];
                    var nmstatus = statuss[y]['nmstatus'];
                    var rs = '<option value="'+kdstatus+'">'+nmstatus+'</option>';
                    $('#ubahstatus').append(rs);
                }
                console.log(data)
                
                var nip = response['nip'];
                $('#nipreq').val(nip);
                var data = response['dettrack'];
                var id_dept = response['id_dept'];
                
                var kddept = response['kddept'];
                $('#deptawal').val(kddept);
                var iddepttujuan = response['iddepttujuan'];
                console.log(kddept);
                $('#pilihan'+kddept).hide();
                var nmkat = response['nmkat'];
                var kdkat = response['kdkat'];
                var laststatus = response['laststatus'];
                var readby = response['readby'];
                $('#kt'+kdkat).attr('selected','selected');
                console.log(response);
                  $('.titlereq').val(kdticket);
                  $('.kat').html(nmkat);
                if (laststatus == 'T008') {
                    $('#proses').hide();
                } else if (laststatus == 'T009'){
                    $('#proses').hide();
                }else if(laststatus == 'T005'){
                    $('#proses').hide();
                } else{
                    $('#proses').show();
                }
              
                for (let i = 0; i < data.length; i++) {
                    var kdstatus = data[i]['kdstatus'];
                    var image = data[i]['image'];
                    var nmstatus = data[i]['nmstatus'];
                    var wktupdate = data[i]['wktupdate'];
                    var newdate = new Date(wktupdate).toLocaleString('id-ID', { year:"numeric", month:"short", day:"numeric", hour: "2-digit", minute: "2-digit", second: "2-digit"});                
                    var nm_lengkap = data[i]['nm_lengkap'];
                    var keterangan = data[i]['keterangan'];
                    var bgcolor = data[i]['bgcolor'];
                    var dep = kdstatus == "T001" ? id_dept : kdstatus == "T009" ? id_dept : iddepttujuan;
                    var sub = data[i]['keterangan'].substring(0,20)+'...';
                    var nama = data[i]['nm_lengkap'].substring(0,20)+'';
                    // var foto1 = data[i]['foto1'];
                    // var foto2 = data[i]['foto2'];
                    var xlat = data[i]['xlat'];
                    var xlong = data[i]['xlong'];
                    var alamat = data[i]['alamat'];
                    var ff = foto2=='F'?'pilih-ff':'';
                    var ff2 = foto2=='F'?'pilih-ff':'onclick="klikfotobe(\''+foto2+','+kdticket+','+kdstatus+'\')"';
                    
                 if(kdstatus == 'T001' || kdstatus == 'T010'){
                    var foto1 = data[i]['foto1'];
                    var ff = foto1=='F'?'pilih-ff':'';
                    var ff2 = foto1 =='F'?'pilih-ff':'onclick="klikfotobe(\''+foto1+','+kdticket+','+kdstatus+'\')"';
                 }else{                            
                    var foto2 = data[i]['foto2'];
                    var ff = foto2=='F'?'pilih-ff':'';
                    var ff2 = foto2 =='F'?'pilih-ff':'onclick="klikfotobe(\''+foto2+','+kdticket+','+kdstatus+'\')"';
                } 
                    var gg = xlat=='F'?'pilih-ff':'';
                    var gg2 = xlat=='F'?'':'onclick="initialize(\''+xlat+'#'+xlong+'#'+nama+'#'+alamat+'\')"';
                    var hh = readby.length == 0?'pilih-ff':'';
                    var hh2 = readby.length == 0?'':'data-toggle="modal" data-target="#modread"';
                   
                    
                    var row ='<div class="row">'+
                                '<div class="col-4 nwdate px-1">'+
                                    '<p id="tglstatus" class="my-3 f-12 px-2 text-center"> '+newdate.replaceAll('.',':')+' </p>'+
                                    '<div class="text-center pilih">'+
                                        '<button class="btn btn-pilih '+ff+'" '+ff2+'><i class="fa fa-camera"></i></button>'+
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
    console.log(longlat)
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

</script>

<script>
    function simpanstat() {
		var ket = document.getElementById("ket").value;
		if (ket != "" ) {
            Swal.fire({
            title: 'Simpan Status?',
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Cancel',
            reverseButtons: true
            }).then((result) => {
        if (result.isConfirmed) {
            $('#status').attr('disabled','disabled')
			$('#simpanstatus').submit()
        }
        })
		}else{
            var ket = document.getElementById("error");
            error.innerHTML = "*Keterangan tidak boleh kosong";
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
    function reg(id){
        var textarea = $('#'+id).val();
        var c = textarea.replace(/[^a-zA-Z0-9:,. ]/g, '');
        $('#'+id).val(c);
        if(textarea != ""){
        $('#error').hide();  
        }else{
        $('#error').show();  
        }
    }
   
    function proses(){
        $('#prosesbe').modal('show');
        $('#detailtc').modal('hide');
        // $('#ket').val('');
        cekproses()

    }

    function closeproses(){
        $('#prosesbe').modal('hide');
        $('#detailtc').modal('show');
    }
    
    function bukafoto(){        
        $('#befoto').modal('show');
        $('#prosesbe').modal('hide');
        startVideo()
    }

    function closebukafoto(){        
        $('#befoto').modal('hide');
        $('#prosesbe').modal('show');
        startVideo()
    }

    function klikfoto(){
		$('#klikfoto').modal('show');
        $('#keluarfoto').html('onclick','cklikfoto()');
    }

    function cklikfoto(){
        $('#klikfoto').modal('hide'); 
        $('#keluarfoto').html();
    }

    function klikfotobe(y){
        var a = y.split(',');
        var x = a[0];
        var ticket = a[0];
        var kdstatus = a[1];
        $('#idfotobe').attr('src',ticket);
        $('#fotobe').modal('show');
    }

    function tfoto2(){
        var foto = $('').val();
        $('#tampilfoto2').attr('src',foto);
        $('#tfoto2').modal('show'); 
        $('#prosesbe').modal('hide');
    }
    function ctfoto2(){
        $('#tfoto2').modal('hide'); 
        $('#prosesbe').modal('show');
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
    function addkateg(){
        $('#addkategori').modal('show'); 
    }

    function delkat(x){
        Swal.fire({
        title: 'Yakin Ingin Menghapus Kategori ini ?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            // var nmkat = $('#isikatbaru').val();
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url("hapus_kategori")); ?>',
                    data: {"_token": "<?php echo e(csrf_token()); ?>","kdkat":x},
                    dataType: 'json',
                    success:function(data){  
                        if(data['ress'] == true){
                        $('#xx'+x).remove();
                        swal.fire({
                                icon : "success",
                                title : "Kategori berhasil dihapus!",
                       
                            })
                        }
                    }
                });
    }
    })
    }

    function adkat(){
        Swal.fire({
            title: 'Yakin Tambah Kategori ?',
            // text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, tambah!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var nmkat = $('#inmkat').val();
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url("simpan_kategori")); ?>',
                    data: {"_token": "<?php echo e(csrf_token()); ?>","nmkat":nmkat},
                    dataType: 'json',
                    success:function(data){
                        if(data['ress'] == true){
                            $('#barunich').remove();
                            $('#ickirim').removeClass('fa-paper-plane').addClass('fa-spinner')
                            var kdkat = data['kdkat'];
                            var nmkat = data['nmkat'];

                            swal.fire({
                                icon : "success",
                                title : "Kategori berhasil ditambahkan!",
                       
                            })
                            var rowbaru = '<tr id="xx'+kdkat+'"> '+
                                '<td width="90%"> '+
                                    '<div class="form-group"> '+
                                        '<span class="btn btn-block btnkat"> '+
                                            nmkat+
                                        '</span> '+
                                    '</div> '+
                               ' </td> '+
                                '<td width="10%"> '+
                                    '<button onclick="delkat(\''+kdkat+'\')" type="button" class="btn btkateg"> '+
                                        '<i class="fa fa-close fa-1x"></i> '+
                                    '</button> '+
                                '</td> '+
                            '</tr>';
                            $('#isikatbaru').append(rowbaru)
                        }
                    }
                });
            }
        })
    }

    function tambahkateg(){
        if($('.btkategcek')[0]){
            Swal.fire({
                title : "Opps",
                icon : "warning",
                text : "Data Yang Ditambahkan Belum Disimpan!!"
            })
        }else{
            var test = '<tr id="barunich"> <td width="90%"> <div class="form-group"><input id="inmkat" type="text" class="form-control btnkat btkategcek text-center"> </div> </td> <td width="10%"> <button type="button" id="simpankat" onclick="adkat()" class="btn btkateg btkategcek"><i class="fa fa-paper-plane fa-1x" id="ickirim"></i></button> </td> </tr>'; 
        $('#obay').append(test)
        }
        
        var objDiv = document.getElementById("barunich");
        objDiv.scrollTop = objDiv.scrollHeight;
    }




</script>
<script>
    feather.replace();
    const controls = document.querySelector('.controls');
    const cameraOptions = document.querySelector('.video-options>select');
    const video = document.querySelector('video');
    const canvas3 = document.getElementById('canvas3');
    const backendfoto = document.getElementById('backendfoto');
    const cthfoto2 = document.getElementById('cthfoto2');
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
        canvas3.width = video.videoWidth;
        canvas3.height = video.videoHeight;
        canvas3.getContext('2d').drawImage(video, 0, 0);
        screenshotImage.src = canvas3.toDataURL('image/webp');
        document.getElementById('tampilfoto2').src = canvas3.toDataURL('image/webp');
        screenshotImage.classList.remove('d-none');
        proses()
        backendfoto.value = canvas3.toDataURL('image/webp');
        cthfoto2.src = canvas3.toDataURL('image/webp');
        $('#befoto').modal('hide');
        $('#cthfoto2').removeClass('none');
        setTimeout(function(){ 
          ask();
          canvas3.remove();
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

    function cekproses(){
    var status = $('#ubahstatus').val();
    var aa = document.getElementById("ubahstatus");
    var selectedIndex = aa.selectedIndex;
    var nmstt = aa.options[aa.selectedIndex].text;
        if(status == 'T004'){
            $('#modeskalasi').modal('show');
            $('#prosesbe').modal('hide');
        }
    $('#nmstatus').val(nmstt);
    }
    function batalcek(){
        $('#modeskalasi').modal('hide');
        $('#prosesbe').modal('show');
        $('#ubahstatus').val('T002')
    }
    function piltuj(kddept){
        $('.piltuj').css({"background":"white","color":"red"})
        $('#pil'+kddept).css({"background":"#f9000085","color":"white"})
        $('#pil2'+kddept).css({"background":"#f9000085","color":"white"})
        $('#deptku').val(kddept)
        $('#nipku').val('F')
    }
    function pilihdepteska(){
        var a = $('#mdept').val();
        var x = a.split('#');
        var kddept = x[0];
        var dept = x[1]; 
        $('#kddepp').val(kddept);
        $('#isinip').empty();
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("nipeska")); ?>',
            data: {"_token": "<?php echo e(csrf_token()); ?>","dept":dept},
            dataType: 'json',
            success:function(data){
                console.log(data)
                for (let i = 0; i < data.length; i++) {
                  var nip = data[i]['nip'];
                  var nama = data[i]['nama'];
                  var foto = data[i]["foto"]=='F'?"<?php echo e(asset('public/resource/img/champs.png')); ?>":'https://api2.champ-group.com/champ_dev/asset/champs_api/images_user/'+ data[i]["foto"];
                  var row ='<tr id="pilihan'+nip+'" class="showpil"> ' +
                    '<td width="10%" onclick="pilihfotonip(\''+nip+'\')">' +
                        '<img id="ft'+nip+'" src="'+foto+'" class="ftt">' +
                    '</td>' + 
                    '<td width="80%" onclick="pilnip(\''+nip+'\')">' +
                        '<div class="form-group"> ' +
                            '<span class="btn btn-block btnkat piltuj text-left" id="pil'+nip+'">' +
                                nama +
                            '</span>' +
                        '</div>' +
                    '</td>' +                    
                    '<td width="10%" onclick="pilnip(\''+nip+'\')">' +
                        '<button id="pil2'+nip+'" type="button"' +
                            'class="btn btkateg piltuj"><i class="fa fa-check fa-1x"></i>' +
                        '</button>' +
                    '</td>' + 
                  '</tr>';
                $('#isinip').append(row);
                }
            }
        });
    }
    function pilihfotonip(x){
        $('#fotobe').modal('show');
        var ft = $('#ft'+x).attr('src');
        var nm = $('#pil'+x).html();
        $('#idfotobe').removeAttr('src').attr('src',ft);
        $('#pilbe').html('<span class="btn ftpl" onclick="pilnip(\''+x+'\')">Pilih '+nm+' <i class="fa fa-check-circle"></i></span>')
    }
    function pilnip(nip){
        $('#fotobe').modal('hide');
        $('.piltuj').css({"background":"white","color":"red"})
        $('#pil'+nip).css({"background":"#f9000085","color":"white"})
        $('#pil2'+nip).css({"background":"#f9000085","color":"white"})
        var kddept = $('#kddepp').val();
        $('#deptku').val(kddept)
        $('#nipku').val(nip)
    }
    function simpaneska(){
        var dept = $('#deptku').val()
        var nip = $('#nipku').val()
        var nmdept = $('#pil'+dept).html()
        if(dept == 'F'){
            Swal.fire({
                title : "Opps",
                icon : "warning",
                text : "Pilih Minimal 1 Department atau NIP!"
            })
        }else{
            var xx ='';
            if(nip != 'F'){
                var xx = $('#pil'+nip).html()+ ' - '+ nmdept;
            }else{
                var xx = nmdept;
            }
            Swal.fire({
                html: '<p style="font-weight:bold;font-size:20px">Simpan Eskalasi</p> <p style="font-weight:bold;font-size:20px">Ke</p><p style="font-weight:bold;font-size:25px;"> '+xx+' ?</p><label for="keteska">Keterangan (optional)</label><input onkeyup="ketiket()" id="keteska" class="form-control" rows="2">',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Cancel',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    loadingon()
                    $('#simpeska').submit()
                }
            })
        }
    }
    function ketiket(){
        var text = $('#keteska').val();
        var c = text.replace(/[^a-zA-Z0-9:,. ]/g, '');
        $('#keteska').val(c);
        $('#keteska2').val(c);
    }
</script><?php /**PATH D:\ChampApplication\xampp\htdocs\api\champs-mobile\resources\views/backend/script.blade.php ENDPATH**/ ?>