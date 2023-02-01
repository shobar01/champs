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
<div id="mdl_tmbhkk" class="modal">
    <div class="" style="height: 100%; max-width: 100% !important; margin-top:60px;">
        <div class="modal-content animate" style="height: 90% !important;">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 8px;">
                    <b style="font-size: 14px;" id="tx_tittle"> </b>
                </span>

                <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_tmbhkk()"
                    class="close"></i>
                {{-- <i class="ion-android-close" style="color: black; margin-right: 10px; font-size: 20px;"
                    type="button" onclick="clos_tmbhmdlactvty()" class="close"></i> --}}
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm">
                                    
                                    <input type="hidden" id="tx_urtankel" name="tx_urtankel" />
                                    <input type="hidden" id="tx_typekel" name="tx_typekel" /> 
                                    <div class="card-body text-left">
                                        <div class="form-group">

                                            <label style="font-size: 12px;">Status Keluarga*</label>
                                            <select class="form-control selectpicker" id="tx_sttkk" name="tx_sttkk"
                                                data-live-search="true" required style=" font-size: 12px;" >

                                                @foreach ($df_sttsklrga as $df)
                                                <option value="{{ $df['kk']}}" style="font-size:12px !important">
                                                    {{substr($df['kk'],2)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">No. Kartu Keluarga</label>
                                            <input type="number" class="form-control" id="tx_kknkk" name="tx_kknkk"
                                                style="height: 30px; font-size: 12px;" maxlength="16" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">NIK*</label>
                                            <input type="number" class="form-control" id="tx_kknik" name="tx_kknik"
                                                style="height: 30px; font-size: 12px;" maxlength="16"/>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Nama Anggota Kel*</label>
                                            <input class="form-control" id="tx_agtkk" name="tx_agtkk"
                                                style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Tempat Lahir* </label>
                                            <input type="text" class="form-control" id="tx_tmptkk" name="tx_tmptkk"
                                                style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Tanggal Lahir* </label>
                                            <input type="date" class="form-control" id="tx_tglkk" name="tx_tglkk"
                                                placeholder="yyyy-mm-dd" onchange="getAge()"
                                                style="height: 30px; font-size: 12px;" max="{{$date_max}}"
                                                min="{{$date_min}}" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Jenis Kelamin*</label>
                                            <select class="form-control  selectpicker" id="tx_jkkk" name="tx_jkkk"
                                                data-live-search="true" required style=" font-size: 12px;">
                                                @foreach ($df_jnsklmn as $df)
                                                <option value="{{$df['jnsklmn']}}" style="font-size:12px !important">
                                                    {{substr($df['jnsklmn'],2)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Umur/ Usia</label>
                                            <input type="number" class="form-control" id="tx_usiakk" name="tx_usiakk"
                                                style="height: 30px; font-size: 12px;" disabled />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Telepon/ HP</label>
                                            <input type="number" class="form-control" id="tx_hpkk" name="tx_hpkk"
                                                style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Profesi</label>
                                            <input type="text" class="form-control" id="tx_profesi" name="tx_profesi"
                                                style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">

                                            <label style="font-size: 12px;">Tingkat Pendidikan*</label>
                                            <select class="form-control selectpicker" id="tx_tngktpddknkk"
                                                name="tx_tngktpddknkk" data-live-search="true" required
                                                style=" font-size: 12px;">
                                                
                                                <option value="Belum Sekolah" style="font-size:12px !important">
                                                    Belum Sekolah</option>
                                                @foreach ($df_tngktpddkn as $df)
                                                <option value="{{$df['pddkn']}}" style="font-size:12px !important">
                                                    {{$df['pddkn'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class=" form-group">
                                            <label style="font-size: 12px;">Alamat Rumah</label>
                                            <textarea id="tx_almtkk" name="tx_almtkk"
                                                class="form-control form-control-sm textleft inptklmjmlbld" cols="40"
                                                rows="5" placeholder="contoh : Jl. Cihanjuang KM 4.5."
                                                style="font-size: 12px;" required></textarea>
                                        </div>
                                        <div class="text-center py-3 pb-1">
                                            <div class="row">
                                                <div class="col-6"> 
                                                    <button type="button" id="btn_keldelt" ß
                                                    class=" btn btn-lg btn-danger  px-3 shadow"
                                                    style="border-radius: 5px !important; color:white; f font-weight: 500; font-size: 12px; 
                                                    width: 100%;
                                                    height: calc(1.5em + 0.75rem + 2px);"
                                                    onclick="dlt_kk()">Hapus</button> 
                                                </div>
                                                <div class="col-6">
                                                    <button type="button" class="  px-3 shadow btn btn-lg   btn-success" id="btn_submitkk"
                                                    style="border-radius: 5px !important; color:white;  font-weight: 500; font-size: 12px; 
                                                    width: 100%;
                                                    height: calc(1.5em + 0.75rem + 2px);"
                                                    onclick="sbt_tmbhkk()"> 
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
        </div>
    </div>
</div>
<script>
    
	
    function getAge() {
	var date = document.getElementById('tx_tglkk').value;
 
        if(date === ""){
                alert("Please complete the required field!");
            }else{
                var today = new Date();
                var birthday = new Date(date);
                var year = 0;
                if (today.getMonth() < birthday.getMonth()) {
                    year = 1;
                } else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
                    year = 1;
                }
                var age = today.getFullYear() - birthday.getFullYear() - year;
        
                if(age < 0){
                    age = 0;
                }
                $('#tx_usiakk').val(age);
            }
    }
    function clos_tmbhkk(){
        
        // location.reload(); 
            $('#tx_sttkk').val('1-Suami');
            $('#tx_kknkk').val('');
            $('#tx_kknik').val('');
            $('#tx_agtkk').val('');
            $('#tx_tmptkk').val('');
            $('#tx_tglkk').val('');
            $('#tx_jkkk').val('1-Laki-Laki');
            $('#tx_usiakk').val('');
            $('#tx_hpkk').val('');
            $('#tx_almtkk').val(''); 
            $('#tx_profesi').val(''); 
            $('#tx_tngktpddknkk').val(''); 
            
        document.getElementById("tx_sttkk").disabled = false;  
        $('.selectpicker').selectpicker('refresh');   
        document.getElementById('mdl_tmbhkk').style.display='none';
      } 
      function sbt_tmbhkk(){   
        var stskl = $('#tx_sttkk').val();
        var nikkk = $('#tx_kknkk').val();
        var ktpkk = $('#tx_kknik').val();
        var anggt = $('#tx_agtkk').val();
        var tplhr = $('#tx_tmptkk').val();
        var tglhr = $('#tx_tglkk').val();
        var jklmn = $('#tx_jkkk').val(); 
        var pddkn = 'F';
        var umurk = $('#tx_usiakk').val();
        var tlpon = $('#tx_hpkk').val();
        var almat = $('#tx_almtkk').val();  
        var profesi = $('#tx_profesi').val(); 
        var tkpddkn = $('#tx_tngktpddknkk').val(); 
        console.log('==='.tkpddkn);
        var tx_typekel = $('#tx_typekel').val();  
        var urutan = $('#tx_urtankel').val();  
        var logo_kel ; 
        if(jklmn == '1-Laki-Laki'){
            logo_kel = 'http://api.champ-group.com/champs-mobile/public/resource/img/hris/lakilaki.png'; 
        }else{
            logo_kel = 'http://api.champ-group.com/champs-mobile/public/resource/img/hris/perempuan.png'; 
        }
 

        if(tx_typekel == 'Tambah'){
            if (stskl == '' || anggt == '' ||  tplhr == '')  {
                $('#loader').hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Tanda simbol * wajib di terisi!',
                    confirmButtonColor: '#cc1a0b',
                    allowOutsideClick: false, 
                }) 
            } else { 
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
                $('#empt_kel').remove();
                var idli = "li_kel"+anggt.replaceAll(" ", "");
                var rw ='<li class="shadow p-1 mb-1 bg-white rounded"  id="'+idli+'" >' 
                            +'<input type="hidden" name="kel_sttuskel[]" value="'+stskl+'" required>'
                            +'<input type="hidden" name="kel_nmanggt[]" value="'+anggt+'" required>'
                            +'<input type="hidden" name="kel_kk[]" value="'+nikkk+'" required>'
                            +'<input type="hidden" name="kel_niik[]" value="'+ktpkk+'" required>'
                            +'<input type="hidden" name="kel_jnsklmn[]" value="'+jklmn+'" required>'
                            +'<input type="hidden" name="kel_tmptlhr[]" value="'+tplhr+'" required>'
                            +'<input type="hidden" name="kel_tgllhr[]" value="'+tglhr+'" required>'
                            +'<input type="hidden" name="kel_umur[]" value="'+umurk+'" required>'
                            +'<input type="hidden" name="kel_tlpon[]" value="'+tlpon+'" required>'
                            +'<input type="hidden" name="kel_profesi[]" value="'+profesi+'" required>'
                            +'<input type="hidden" name="kel_tngktpddknkk[]" value="'+tkpddkn+'" required>'
                            +'<input type="hidden" name="kel_rmh[]" value="'+almat+'" required>'
                            +'<div class="card p-2 mb-2">'
                                +'<div class="d-flex justify-content-between">'
                                    +'<div class="d-flex flex-row align-items-center">'
                                        +'<div class="icon"> <img src="'+logo_kel+'" class="img-circle avatar center" style="width: 50px; height: 50px;" /></div>'
                                        +'<div class="text-left col">'
                                            +'<h3 class="mb-0" >'+stskl+'</h3>'
                                            +'<span>'+anggt+'</span>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="" onclick="dlt_kk_tmbh(\''+idli+'\')">'
                                        +' <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_tmbhkk()" class="close"></i>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">No KK</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+nikkk+'</a>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">No NIK</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+ktpkk+'</a>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Jenis Kelamin</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+jklmn.substring(2)+'</a>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="row">'
                                    +'<div class="text-left col">'
                                        +'<div class="input-group ">'
                                            +'<div class="input-group-prepend">'
                                                +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; ">TTL</a>'
                                                +'</span>'
                                            +'</div> <a style="font-size: 12px; color:black; min-width: 90px;"> : '+tplhr+', '+tglhr+'</a>'
                                        +'</div>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="row">'
                                    +'<div class="text-left col">'
                                        +'<div class="input-group ">'
                                            +'<div class="input-group-prepend">'
                                                +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; ">Umur/Usia</a>'
                                                +'</span>'
                                            +'</div> <a style="font-size: 12px; color:black; min-width: 90px;"> : '+umurk+' Tahun</a>'
                                        +'</div>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">No Hp</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+tlpon+'</a>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Profesi</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+profesi+'</a>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Pendidikan</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+tkpddkn+'</a>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Alamat</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> : '+almat+'</a>'
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                        +'</li>';   
                        $('#ul_kel').append(rw);
                        clos_tmbhkk(); 
                    }
                })
            } 
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
                 
                    $('#sttuskel_'+urutan+'').val(stskl);
                    $('#nmanggt_'+urutan+'').val(anggt);
                    $('#kk_'+urutan+'').val(nikkk);
                    $('#niik_'+urutan+'').val(ktpkk);
                    $('#jnsklmn_'+urutan+'').val(jklmn);
                    $('#tmptlhr_'+urutan+'').val(tplhr);
                    $('#tgllhr_'+urutan+'').val(tglhr);
                    $('#umur_'+urutan+'').val(umurk);
                    $('#tlpon_'+urutan+'').val(tlpon);
                    $('#profesi_'+urutan+'').val(profesi);
                    $('#tngktpddknkk_'+urutan+'').val(tkpddkn);
                    $('#rmh_'+urutan+'').val(almat);    

                    $('#html_sttuskel_'+urutan+'').html(stskl);
                    $('#html_nmanggt_'+urutan+'').html(anggt.substring(2));
                    $('#html_kk_'+urutan+'').html(' : '+nikkk);
                    $('#html_niik_'+urutan+'').html(' : '+ktpkk);
                    $('#html_jnsklmn_'+urutan+'').html(' : '+jklmn.substring(2));
                    $('#html_ttl_'+urutan+'').html(' : '+tplhr+', '+tglhr); 
                    $('#html_umur_'+urutan+'').html(' : '+ umurk);
                    $('#html_tlpon_'+urutan+'').html(' : '+tlpon);
                    $('#html_profesi_'+urutan+'').html(' : '+profesi);
                    $('#html_tngktpddknkk_'+urutan+'').html(' : '+tkpddkn);
                    $('#html_rmh_'+urutan+'').html(' : '+almat);   
                    clos_tmbhkk();
                }
            })
        }  
     
      }
      function dlt_kk() {
        Swal.fire({
                    text: "Apakah anda yakin akan menghapusnya! Hapus sekarang ?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: "Tidak",
                    confirmButtonText: 'Ya, Hapus!' ,
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed)
                { 
                    event.preventDefault();  

                    var anggt = $('#tx_agtkk').val();
                    console.log('li_kel'+anggt.replaceAll(" ", ""));   
                    $('#li_kel'+anggt.replaceAll(" ", "")).remove();
                    clos_tmbhkk();
                }
            })
        
        }
        function dlt_kk_tmbh(idd) {
             
            console.log('====='+idd);   
            Swal.fire({
                        text: "Apakah anda yakin akan menghapusnya! Hapus sekarang ?",
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonColor: '#d33',
                        confirmButtonColor: '#3085d6',
                        cancelButtonText: "Tidak",
                        confirmButtonText: 'Ya, Hapus!' ,
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed)
                    { 
                        event.preventDefault();   
                        console.log(idd);   
                        $('#'+idd).remove();
                        clos_tmbhkk();
                    }
                })
        
        }
      function Jsn_Sbmtkk(){ 
        var stskl = $('#tx_sttkk').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var nikkk = $('#tx_kknkk').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var ktpkk = $('#tx_kknik').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var anggt = $('#tx_agtkk').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var tplhr = $('#tx_tmptkk').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var tglhr = $('#tx_tglkk').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var jklmn = $('#tx_jkkk').val(); 
        var pddkn = 'F';
        var umurk = $('#tx_usiakk').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var tlpon = $('#tx_hpkk').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var almat = $('#tx_almtkk').val().replace(/(?:\r\n|\r|\n)/g, ' ');  
     
        var stskl1 = $('#tx_sttkk1').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var nikkk1 = $('#tx_kknkk1').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var ktpkk1 = $('#tx_kknik1').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var anggt1 = $('#tx_agtkk1').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var tplhr1 = $('#tx_tmptkk1').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var tglhr1 = $('#tx_tglkk1').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var jklmn1 = $('#tx_jkkk1').val();
        var umurk1 = $('#tx_usiakk1').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var tlpon1 = $('#tx_hpkk1').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var almat1 = $('#tx_almtkk1').val().replace(/(?:\r\n|\r|\n)/g, ' ');  
     
        var tx_type= $('#tx_type').val();
        
        var  stskl2, nikkk2, ktpkk2, anggt2,tplhr2 ,tglhr2,jklmn2 ,pddkn2,umurk2, tlpon2 ,almat2  ;
        var n=null; 
              
        stskl2 = stskl; // primary
        anggt2 = anggt;
        // if(tx_type == 'Update'){  
       
        // if (nikkk == nikkk1 ){ nikkk2 = n; }else{ nikkk2 = nikkk; }
        // if (ktpkk == ktpkk1 ){ ktpkk2 = n; }else{ ktpkk2 = ktpkk; } 
        // if (tplhr == tplhr1 ){ tplhr2 = n; }else{ tplhr2 = tplhr; }
        // if (tglhr == tglhr1 ){ tglhr2 = n; }else{ tglhr2 = tglhr; }
        // if (jklmn == jklmn1 ){ jklmn2 = n; }else{ jklmn2 = jklmn; }
        // if (umurk == umurk1 ){ umurk2 = n; }else{ umurk2 = umurk; }
        // if (tlpon == tlpon1 ){ tlpon2 = n; }else{ tlpon2 = tlpon; }
        // if (almat == almat1 ){ almat2 = n; }else{ almat2 = almat; }
        // }else{ 
             nikkk2 = nikkk; 
             ktpkk2 = ktpkk; 
             tplhr2 = tplhr;
             tglhr2 = tglhr;
             jklmn2 = jklmn; 
             umurk2 = umurk; 
             tlpon2 = tlpon; 
             almat2 = almat;  
        // }
        // ===================
     
        // $type, $nip, $nmnip , $ktpkk , $nikkk, $anggt , $stskl , $jklmn, $umurk , $pddkn , $almat, $tplhr , $tglhr, $tlpon
        console.log('tx_type'+tx_type+'ktpkk '+ktpkk2+' nikkk '+nikkk2+' anggt '+anggt2+' stskl '+stskl2+' jklmn '+jklmn2+' umurk '+umurk2+' pddkn '+pddkn+' almat '+almat2+' tplhr '+tplhr2+' tglhr '+tglhr2+' tlpon '+tlpon2);
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '{{url("tmbhkk")}}',  
            data: {"_token": "{{ csrf_token() }}","nip":'{{$nip}}',"type":tx_type,"ktpkk":ktpkk2,"nikkk":nikkk2,"anggt":anggt2,"stskl":stskl2,"jklmn":jklmn2,
            "umurk":umurk2,"pddkn":pddkn,"almat":almat2,"tplhr":tplhr2,"tglhr":tglhr2,"tlpon":tlpon2,"nmanip":'{{$nm_lengkap}}' },
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