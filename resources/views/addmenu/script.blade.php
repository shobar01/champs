<script>
    function bukaimg(z){
        var a = z.split(',');
        var kdmenu = a[0]; 
        var kdoutlet = a[1];
        var x = kdmenu+kdoutlet;
        $('#detfoto').modal('show');
        var img = $('#img'+x).attr('src');
        var harga = $('#harga'+x).val();
        var namamn = $('#nmmenu'+x).html();
        $('#hargaedit').val(harga).attr('onkeyup',"ubahharga('"+x+"')");
        $('#detailfoto').html('<img src="'+img+'" width="100%" class="fotodet">');
        $('.lbl-foto').html('#'+namamn);
        $('#btn-rr').removeAttr('onclick').attr('onclick',"rja('"+kdmenu+","+kdoutlet+"')");
        $('#btn-aa').removeAttr('onclick').attr('onclick',"apa('"+kdmenu+","+kdoutlet+"')");
    }
    function ubahharga(x){
        var harga = $('#hargaedit').val();
        $('#harga'+x).val(harga);
        $('#lbl-number'+x).html('Rp '+new Intl.NumberFormat('id-ID').format(harga));
    }
    function ubahtgl(){
        loadingon();
        var tgl = $('#tglini').val();
        window.location.href = "{{route('viewAddMenu')}}?tanggal="+tgl;
    }
    function rja(x){
        var a = x.split(',');
        var kdmenu = a[0]; 
        var kdoutlet = a[1];
        $('#rj'+kdmenu+kdoutlet).addClass('active').removeAttr('onclick').attr('onclick',"rjx('"+x+"')");
        $('#ap'+kdmenu+kdoutlet).removeClass('active');
        apx(x);note(x);
        $('#card'+kdmenu+kdoutlet).css('background','#ff000036');
        $('#bm'+kdmenu+kdoutlet).css('color','red');
        $('#detfoto').modal('hide');
        $('#isapproval'+kdmenu+kdoutlet).val('F');
    }
    function rjx(x){
        var a = x.split(',');
        var kdmenu = a[0]; 
        var kdoutlet = a[1];
        $('#rj'+kdmenu+kdoutlet).removeClass('active').removeAttr('onclick').attr('onclick',"rja('"+x+"')");
        $('#card'+kdmenu+kdoutlet).css('background','');
        $('#bm'+kdmenu+kdoutlet).css('color','red');
        $('#detfoto').modal('hide');
        $('#note').modal('hide');
        $('#note'+kdmenu+kdoutlet).html('');
        $('#isapproval'+kdmenu+kdoutlet).val('');
        hapuscollect(x)
    }
    
    function apa(x){
        var a = x.split(',');
        var kdmenu = a[0]; 
        var kdoutlet = a[1];
        $('#ap'+kdmenu+kdoutlet).addClass('active').removeAttr('onclick').attr('onclick',"apx('"+x+"')");
        $('#rj'+kdmenu+kdoutlet).removeClass('active');
        rjx(x);
        $('#card'+kdmenu+kdoutlet).css('background','#00800036');
        $('#bm'+kdmenu+kdoutlet).css('color','green');
        $('#note'+kdmenu+kdoutlet).html('Approved By ICT');
        $('#catatan'+kdmenu+kdoutlet).val('Approved By ICT');
        $('#isapproval'+kdmenu+kdoutlet).val('T');
        collectdata(x)
    }
    function apx(x){
        var a = x.split(',');
        var kdmenu = a[0]; 
        var kdoutlet = a[1];
        $('#ap'+kdmenu+kdoutlet).removeClass('active').removeAttr('onclick').attr('onclick',"apa('"+x+"')");
        $('#card'+kdmenu+kdoutlet).css('background','');
        $('#bm'+kdmenu+kdoutlet).css('color','red');
        $('#note'+kdmenu+kdoutlet).html('');
        $('#isapproval'+kdmenu+kdoutlet).val('');
        hapuscollect(x)
    }
    function simpanmn(){
        if($('.fs').length > 0){
            $('#btn-update').html("").removeClass('btncx').addClass('btncs');
            setTimeout(() => {
                $('#confirm').modal('show')
            }, 700);
        }else{
            Swal.fire({
                icon : "warning",
                title : "Failed",
                text : "Pilih Minimal 1 Menu Yang Akan di Update!"
            })
        }
    }

    function batalsimpan(){
        $('#confirm').modal('hide');
        $('#btn-update').removeClass('btncs').addClass('btncx');
        setTimeout(() => {
            $('#btn-update').html('<i class="fa fa-save"></i> Update');
        }, 700);
    }
    function note(x){
        $('#note').modal('show');
        $('#btnnote').removeAttr('onclick').attr('onclick',"simpannote('"+x+"')");
        $('#clsnote').removeAttr('onclick').attr('onclick',"rjx('"+x+"')");
    }
    function simpannote(x){
        var a = x.split(',');
        var note = $('#noteedit').val();
        if(note == "" || note == " "|| note == "  "){
            Swal.fire({
                icon : "warning",
                title: "Catatan Tidak Boleh Kosong!",
            })
        }else{
            $('#note').modal('hide');
            $('#note'+a[0]+a[1]).html(note);
            $('#catatan'+a[0]+a[1]).val(note);
            collectdata(x);
        }
    }
    function collectdata(x){
        var a = x.split(',');
        var kdmenu = a[0];
        var kdoutlet = a[1];
        var harga = $('#harga'+kdmenu+kdoutlet).val();
        var note = $('#catatan'+kdmenu+kdoutlet).val();
        var nipreq = $('#nipreq'+kdmenu+kdoutlet).val();
        var isapproval = $('#isapproval'+kdmenu+kdoutlet).val();
        var rw = ' <div id="f'+kdmenu+kdoutlet+'" class="fs"> <input type="hidden" name="kdoutlet[]" value="'+kdoutlet+'"> <input type="hidden" name="kdmenu[]" value="'+kdmenu+'"> <input type="hidden" name="harga[]" value="'+harga+'"> <input type="hidden" name="isapproval[]" value="'+isapproval+'"> <input type="hidden" name="note[]" value="'+note+'"> <input type="hidden" name="nipreq[]" value="'+nipreq+'"></div>';
        $('#formmenu').append(rw);
    }
    function hapuscollect(x){
        var a = x.split(',');
        var kdmenu = a[0];
        var kdoutlet = a[1];
        $('#f'+kdmenu+kdoutlet).remove();
    }
    function oksimpan(){
        $('#formmenu').submit();
    }
    
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
        $('#tanggalhist').val(currentYear + '-' + currentMonth+'-01')
        hist()
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
        $('#tanggalhist').val(currentYear + '-' + currentMonth+'-01')
        hist()
    }
    function curMonth() {
        currentMonth = currentMonth;
        if (currentMonth > 12) {
            currentYear = currentYear;
            currentMonth = 1;
        }
        $('#calendarList').empty();
        $('#yearMonth').text(currentYear + ' ' + currentMonth);
        makeCalendar(currentYear, currentMonth);
    }
    
    function hist(){
        loadingon2();
        $('#accordion').empty();
        var tanggal =$('#tanggalhist').val();
        var newdate = new Date(tanggal).toLocaleString('id-ID', { year:"numeric", month:"short", day:"numeric"})
        $('#ttltgl').html(newdate);
        curMonth()
        $('#hist').modal('show');
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type: 'POST',
            url: '{{url("histmenu")}}',
            data: {"_token": "{{ csrf_token() }}","tanggal":tanggal},
            dataType: 'json',
            success:function(data){
                loadingoff2();
                var menu = data.daftarhist;
                if(menu.length == 0){
                    var ltt = '<div class="text-center img-center"> <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_EaOthPrBLy.json" background="transparent" speed="1" style="width: 250px; height: 250px;" loop autoplay> </lottie-player> </div>';
                    $('#accordion').html(ltt)
                }else{
                    for (let s = 0; s < menu.length; s++) {
                       var kdoutlet = menu[s]['kdoutlet'];
                       var nmoutlet = menu[s]['nmoutlet'];
                       var detmenu = menu[s]['detail'];
                       var xx = ' <button class="btn btn-block collapsed btn-collp mb-1" type="button" data-toggle="collapse" data-target="#'+kdoutlet+'" aria-expanded="false" aria-controls="'+kdoutlet+'"> '+kdoutlet+' - '+nmoutlet+' <span class="spanmn">'+detmenu.length+'</span></button> <div class="table-responsive collapse tbres" id="'+kdoutlet+'" data-parent="#accordion" style="border-radius:12px;border-bottom: 1px solid black;"><table class="table table-hover table-striped" width="100%"> <thead> <tr> <th>Menu</th> <th class="text-right">Harga</th><th>Oleh</th> <th>Waktu</th> </tr> </thead> <tbody id="isihist'+kdoutlet+'"></tbody> </table></div>';
                       $('#accordion').append(xx);
                       for (let i = 0; i < detmenu.length; i++) {
                            var kdmenu = detmenu[i]['kdmenu'];
                            var Menu = detmenu[i]['nmmenu'];
                            var Status = detmenu[i]['isapprove'];
                            var wkt = detmenu[i]['wktapproval'];
                            var Harga = detmenu[i]['harga'];
                            var Note = detmenu[i]['note'];
                            var foto = detmenu[i]['foto'];
                            var nmreq = detmenu[i]['nmreq'];
                            var Update = detmenu[i]['namaapprov'].substring(0,5);
                            if(Status =='T'){
                                var ic = '<i class="fa fa-check-circle grn"></i>';
                                var rw2 = '';
                            }else{
                                var ic = '<i class="fa fa-times-circle rd"></i>';
                                var rw2 = '<tr class="trx"><td colspan="4" class="text-left pl-3"><i class="fa fa-clipboard"></i> '+Note+'</td></tr>';
                            }
                            var row = '<tr class="trx" onclick="bukaimg2(\''+kdmenu+','+kdoutlet+','+foto+','+nmreq+'\')"> <td class="text-left">'+ic+'<span id="nmmenu'+kdmenu+kdoutlet+'"> '+Menu+'</span></td><td class="text-right" id="harga'+kdmenu+kdoutlet+'">'+new Intl.NumberFormat('id-ID').format(Harga)+'</td><td>'+Update+'</td><td>'+wkt+'</td>  </tr>'+rw2;
                            $('#isihist'+kdoutlet).append(row);
                        }
                    }
                }
                // console.log(data)
                var infomn = data.infomn;
                for (let i = 0; i < infomn.length; i++) {
                    var tglmn = infomn[i]['tanggal'];
                    var jml = infomn[i]['jml'];                        
                    var d = new Date(tglmn);
                    var tgl = d.getFullYear()+'-'+("0" + (d.getMonth() + 1)).slice(-2)+'-'+("0" + d.getDate()).slice(-2);
                    // console.log(d.getDate())
                    $('#'+d.getDate()).addClass('lingkar')
                                .attr("onclick","cekdet('"+tgl+"')")
                                .append('<span id="lx'+d.getDate()+'" class="lx">'+jml+'</span>')
                }
            },error: function () {
                loadingoff2();
            }
        }); 
    }
    
    function cekdet(tgl){
        loadingon2();
        $('#tanggalhist').val(tgl);
        // var newdate = new Date(tgl).toLocaleString('id-ID', { year:"numeric", month:"short", day:"numeric", hour: "2-digit", minute: "2-digit", second: "2-digit"})
        var newdate = new Date(tgl).toLocaleString('id-ID', { year:"numeric", month:"short", day:"numeric"})
        $('#ttltgl').html(newdate);
        $('#accordion').empty();
        closetgl()
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            type: 'POST',
            url: '{{url("histmenu")}}',
            data: {"_token": "{{ csrf_token() }}","tanggal":tgl},
            dataType: 'json',
            success:function(data){
                loadingoff2();
                var menu = data.daftarhist;
                if(menu.length == 0){
                    var ltt = '<div class="text-center img-center"> <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_EaOthPrBLy.json" background="transparent" speed="1" style="width: 250px; height: 250px;" loop autoplay> </lottie-player> </div>';
                    $('#accordion').html(ltt)
                }else{
                    for (let s = 0; s < menu.length; s++) {
                       var kdoutlet = menu[s]['kdoutlet'];
                       var nmoutlet = menu[s]['nmoutlet'];
                       var detmenu = menu[s]['detail'];
                       var xx = ' <button class="btn btn-block collapsed btn-collp mb-1" type="button" data-toggle="collapse" data-target="#'+kdoutlet+'" aria-expanded="false" aria-controls="'+kdoutlet+'"> '+kdoutlet+' - '+nmoutlet+' <span class="spanmn">'+detmenu.length+'</span></button> <div class="table-responsive collapse tbres" id="'+kdoutlet+'" data-parent="#accordion" style="border-radius:12px;border-bottom: 1px solid black;"> <div class="table-responsive"> <table class="table table-hover table-striped" width="100%"> <thead> <tr> <th>Menu</th> <th class="text-right">Harga</th><th>Oleh</th> <th>Waktu</th> </tr> </thead> <tbody id="isihist'+kdoutlet+'"></tbody> </table> </div> </div>';
                       $('#accordion').append(xx);
                       for (let i = 0; i < detmenu.length; i++) {
                            var kdmenu = detmenu[i]['kdmenu'];
                            var Menu = detmenu[i]['nmmenu'];
                            var Status = detmenu[i]['isapprove'];
                            var wkt = detmenu[i]['wktapproval'];
                            var Harga = detmenu[i]['harga'];
                            var Note = detmenu[i]['note'];
                            var foto = detmenu[i]['foto'];
                            var nmreq = detmenu[i]['nmreq'];
                            var Update = detmenu[i]['namaapprov'].substring(0,5);
                            if(Status =='T'){
                                var ic = '<i class="fa fa-check-circle grn"></i>';
                                var rw2 = '';
                            }else{
                                var ic = '<i class="fa fa-times-circle rd"></i>';
                                var rw2 = '<tr><td colspan="4" class="text-left pl-3"><i class="fa fa-clipboard"></i> '+Note+'</td></tr>';
                            }
                            var row = '<tr class="trx" onclick="bukaimg2(\''+kdmenu+','+kdoutlet+','+foto+','+nmreq+'\')"> <td class="text-left">'+ic+'<span id="nmmenu'+kdmenu+kdoutlet+'"> '+Menu+'</span></td><td class="text-right" id="harga'+kdmenu+kdoutlet+'">'+new Intl.NumberFormat('id-ID').format(Harga)+'</td><td>'+Update+'</td><td>'+wkt+'</td> </tr>'+rw2;
                            $('#isihist'+kdoutlet).append(row);
                        }
                    }
                }
            },error: function () {
                loadingoff2();
            }
        }); 
    }
    function bukaimg2(z){
        var a = z.split(',');
        var kdmenu = a[0]; 
        var kdoutlet = a[1];
        var img = a[2];
        var nmreq = a[3];
        var x = kdmenu+kdoutlet;
        $('#detfoto2').modal('show');
        var namamn = $('#nmmenu'+x).html();
        var harga = $('#harga'+x).html();
        $('#detailfoto2').html('<img src="'+img+'" width="100%" class="fotodet">');
        $('.lbl-foto').html('#'+namamn+' ('+harga+')');
        $('#nmreq').html(nmreq);
    }
    function bukatglhist(){
        $('#hist').modal('hide')
        $('#tglhist').modal('show')
    }
    function closetgl(){
        $('#hist').modal('show')
        $('#tglhist').modal('hide')
    }
</script>