<style>
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1031;
        left: 0;
        top: 0;
        width: 100%;
        /* height: 100%; */
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
        overflow: scroll;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        /* margin: 5% auto 15% auto; */
        border: 1px solid #888;
        /* width: 95%; */
        /* top: 10%; */
    }

    label {
        display: inline-block;
        margin-bottom: 0.2rem !important;
    }

    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }

    .form-group {
        margin-bottom: 0.1rem !important;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 0.75rem !important;
    }

    .bootstrap-select .dropdown-toggle .filter-option {
        font-size: 12px !important;
    }
</style>
<div id="mdl_tmbhpendidikan" class="modal">
    <div class="" style="height: 100%; max-width: 100% !important; margin-top:60px;">
        <div class="modal-content animate" style="height: 90% !important;">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 8px;">
                    <b style="font-size: 14px;" id="tx_tittlepddkn"></b>
                </span>

                <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;"
                    onclick="clos_tmbhpendidikan()" class="close"></i>
                {{-- <i class="ion-android-close" style="color: black; margin-right: 10px; font-size: 20px;"
                    type="button" onclick="clos_tmbhmdlactvty()" class="close"></i> --}}
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm">

                                    <input type="hidden" id="tx_urtanpddkn" name="tx_urtanpddkn" />
                                    <input type="hidden" id="tx_typepddkn" name="tx_typepddkn" />

                                    <div class="card-body text-left">
                                        <div class="form-group">

                                            <label style="font-size: 12px;">Tingkat Pendidikan*</label>
                                            <select class="form-control selectpicker" id="tx_tngktpddkn"
                                                name="tx_tngktpddkn" data-live-search="true" required
                                                style=" font-size: 12px;">
                                                @foreach ($df_tkpddkn1 as $df)
                                                <option value="{{$df['tk_pendidikan']}}"
                                                    style="font-size:12px !important">
                                                    {{$df['tk_pendidikan'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Nama Pendidikan*</label>
                                            <input class="form-control" id="tx_nmpddkn" name="tx_nmpddkn"
                                                style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Jurusan Studi</label>
                                            <input class="form-control" id="tx_jrsnpddkn" name="tx_jrsnpddkn"
                                                style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Tahun Ijazah*</label>
                                            <input type="number" class="form-control" id="tx_thnijzhpddkn"
                                                name="tx_thnijzhpddkn" style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Lokasi</label>
                                            <input class="form-control" id="tx_lokasipddkn" name="tx_lokasipddkn"
                                                style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class=" form-group">
                                            <label style="font-size: 12px;">Keterangan </label>
                                            <textarea id="tx_ketpddkn" name="tx_ketpddkn"
                                                class="form-control form-control-sm textleft inptklmjmlbld" cols="40"
                                                rows="5" placeholder="contoh : Berijazah." style="font-size: 12px;"
                                                required></textarea>
                                        </div>
                                        <div class="form-group mx-5 py-3 pb-2">
                                            <button type="button" id="btn_tmbah"
                                                class="form-control btn-lg btn-danger submit px-3 shadow"
                                                style="border-radius: 5px !important; background-color: black; color:white; font-weight: bold; font-size: 14px;"
                                                onclick="sbt_tmbhpddknaa()">Kirim</button>
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
</div>
<script>
    function clos_tmbhpendidikan(){
            $('#tx_tngktpddkn').val('');   
            $('#tx_nmpddkn').val('');
            $('#tx_jrsnpddkn').val('');
            $('#tx_thnijzhpddkn').val('');
            $('#tx_lokasipddkn').val('');
            $('#tx_ketpddkn').val('');   
        // location.reload();
        document.getElementById('mdl_tmbhpendidikan').style.display='none';
      } 
      function sbt_tmbhpddknaa(){
        //tx_tngktpddkn,tx_nmpddkn,tx_jrsnpddkn,tx_thnijzhpddkn,tx_lokasipddkn,tx_ketpddkn
        var tngkt = $('#tx_tngktpddkn').val();
        var nmpdk = $('#tx_nmpddkn').val();
        var jrsnp = $('#tx_jrsnpddkn').val();
        var thniz = $('#tx_thnijzhpddkn').val();
        var loksi = $('#tx_lokasipddkn').val();
        var ketrg = $('#tx_ketpddkn').val();
 
        var logo_ppdkn; 
        if(tngkt == "SD/Sederajat"){ 
            logo_ppdkn = 'http://api.champ-group.com/champs-mobile/public/resource/img/hris/sd.png'; 
        }else if(tngkt == "SMP/Sederajat") {
            logo_ppdkn = 'http://api.champ-group.com/champs-mobile/public/resource/img/hris/smp.png'; 
        }else if( tngkt =="SMK/Sederajat" || tngkt == "SMA/Sederajat") {
            logo_ppdkn = 'http://api.champ-group.com/champs-mobile/public/resource/img/hris/smk.png'; 
        }else {
            logo_ppdkn = 'http://api.champ-group.com/champs-mobile/public/resource/img/hris/kuliah.png'; 
        }   

        var urutan = $('#tx_urtanpddkn').val(); 
        var typepddkn = $('#tx_typepddkn').val(); 

       
            if (tngkt == '' || nmpdk == '' ||  thniz == '')  {
                $('#loader').hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Tingkat Pendidikan, Nama Pendidikan atau Tahun Pendidikan tidak boleh kosong!',
                    confirmButtonColor: '#cc1a0b',
                    allowOutsideClick: false, 
                }) 
            } else {  
                if(typepddkn == 'Tambah'){ 
                        Swal.fire({
                            text: "Pastikan kembali data yang anda kirim sudah benar! Kirim sekarang ?",
                            icon: 'warning',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            confirmButtonColor: '#3085d6',
                            cancelButtonText: "Tidak",
                            confirmButtonText: 'Ya, Kirim!' ,
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed)
                        { 
                        event.preventDefault();  
                        $('#loader').hide();   
                        // Jsn_Sbmtkk(); 
                        // $('#empt_kel').remove();
                        var idpk = "li_pendidikan"+tngkt.replaceAll(" ", ""); 
                        var rw ='<li class="shadow p-1 mb-1 bg-white rounded"  id="'+idpk+'" >' 
                                     +'<input type="hidden" name="pddkn_tksklh[]" value="'+tngkt+'" required>'
                                    +'<input type="hidden" name="pddkn_sklh[]" value="'+nmpdk+'" required>'
                                    +'<input type="hidden" name="pddkn_lksi[]" value="'+loksi+'" required>'
                                    +'<input type="hidden" name="pddkn_thnijzh[]" value="'+thniz+'" required>'
                                    +'<input type="hidden" name="pddkn_jurusan[]" value="'+jrsnp+'" required>'
                                    +'<input type="hidden" name="pddkn_ketrngn[]" value="'+ketrg+'" required>' 
                                    +'<div class="card p-2 mb-2">'
                                        +'<div class="d-flex justify-content-between">'
                                            +'<div class="d-flex flex-row align-items-center">'
                                                +'<div class="icon"> <img src="'+logo_ppdkn+'" class="img-circle avatar center" style="width: 50px; height: 50px;" /></div>'
                                                +'<div class="text-left col">'
                                                    +'<h3 class="mb-0" >'+tngkt+'</h3>'
                                                    +'<span>'+nmpdk+'</span>'
                                                +'</div>'
                                            +'</div>'
                                            +'<div class="" onclick="dlt_pnglmn_tmbh(\''+idpk+'\')">'
                                                +' <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_tmbhkk()" class="close"></i>'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="row">' 
                                            +'<div class="text-left col">'
                                                +'<div class="input-group ">'
                                                    +'<div class="input-group-prepend">'
                                                        +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                            +'<a style="font-size: 12px; color:black; ">Kota</a>'
                                                        +'</span>'
                                                    +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+loksi+'</a>'
                                                +'</div>'
                                            +'</div>'
                                            +'<div class="text-right"  style="padding: 0 10px 0 5px !important;">'
                                                +'<div class="input-group ">'
                                                    +'<div class="input-group-prepend">'
                                                        +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                            +'<a style="font-size: 12px; color:black; ">Tahun</a>'
                                                        +'</span>'
                                                    +'</div> <a style="font-size: 12px; color:black; min-width: 40px; padding-right:5px;" > : '+thniz+'</a>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="text-left">'
                                            +'<div class="input-group ">'
                                                +'<div class="input-group-prepend">'
                                                    +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                        +'<a style="font-size: 12px; color:black; ">Jurusan</a>'
                                                    +'</span>'
                                                +'</div> <a style="font-size: 12px; color:black; min-width: 40px;  padding-right:5px;"> :  '+jrsnp+'</a>'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="text-left">'
                                            +'<div class="input-group ">'
                                                +'<div class="input-group-prepend">'
                                                    +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                        +'<a style="font-size: 12px; color:black; ">Keterangan</a>'
                                                    +'</span>'
                                                +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+ketrg+'</a>'
                                            +'</div>'
                                        +'</div>' 
                                    +'</div>'
                                +'</li>';   
                                $('#ul_pnddkn').append(rw); 
                                clos_tmbhpendidikan();
                            }
                        }) 
                }else{
                    Swal.fire({
                            text: "Pastikan kembali data yang anda kirim sudah benar! Kirim sekarang ?",
                            icon: 'warning',
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            confirmButtonColor: '#3085d6',
                            cancelButtonText: "Tidak",
                            confirmButtonText: 'Ya, Kirim!' ,
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed)
                        { 
                            event.preventDefault();  
                        
                        
                        $('#tksklh_'+urutan+'').val(tngkt); 
                        $('#sklh_'+urutan+'').val(nmpdk); 
                        $('#lksi_'+urutan+'').val(loksi); 
                        $('#thnijzh_'+urutan+'').val(thniz); 
                        $('#jurusan_'+urutan+'').val(jrsnp); 
                        $('#ketrngn_'+urutan+'').val(ketrg); 

                        $('#html_tksklh_'+urutan+'').html(tngkt); 
                        $('#html_sklh_'+urutan+'').html(nmpdk); 
                        $('#html_lksi_'+urutan+'').html(' : '+loksi); 
                        $('#html_thnijzh_'+urutan+'').html(' : '+thniz); 
                        $('#html_jurusan_'+urutan+'').html(' : '+jrsnp); 
                        $('#html_ketrngn_'+urutan+'').html(' : '+ketrg); 



                        $('#loader').hide();   
                        $('#tx_tngktpddkn').val('');
                        $('#tx_nmpddkn').val('');
                        $('#tx_jrsnpddkn').val('');
                        $('#tx_thnijzhpddkn').val('');
                        $('#tx_lokasipddkn').val('');
                        $('#tx_ketpddkn').val('');  
                        clos_tmbhpendidikan();
                        }
                    })
                    } 
        }
      }
      function Jsn_Sbmtpnddkn(){ 
        var tngkt = $('#tx_tngktpddkn').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var nmpdk = $('#tx_nmpddkn').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var jrsnp = $('#tx_jrsnpddkn').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var thniz = $('#tx_thnijzhpddkn').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var loksi = $('#tx_lokasipddkn').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var ketrg = $('#tx_ketpddkn').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var typepdk = $('#tx_typepddkn').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        
        
            // nip,type,tksklh,nmsklh,lokasi,thnjzh,jurusn,ktrngn,nmanip
        console.log('tngkt '+tngkt+'nmpdk '+nmpdk+'jrsnp '+jrsnp+'thniz '+thniz+'loksi '+loksi+'ketrg '+ketrg);
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '{{url("tmbhpendidikan")}}',  
            data: {"_token": "{{ csrf_token() }}","nip":'{{$nip}}',"type":typepdk,"tksklh":tngkt,"nmsklh":nmpdk,"lokasi":loksi,"thnjzh":thniz,"jurusn":jrsnp,
            "ktrngn":ketrg,"nmanip":'{{$nm_lengkap}}' },
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
                        allowOutsideClick: false,
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
                    confirmButtonColor: '#cc1a0b',
                    allowOutsideClick: false,
                });
            }
        });  
      }
</script>