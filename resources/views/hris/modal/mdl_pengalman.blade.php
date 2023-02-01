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
<div id="mdl_tmbhpenglmn" class="modal">
    <div class="modal-dialog" style="height: 100%; max-width: 100% !important;">
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 8px;">
                    <b style="font-size: 14px;" id="tx_tittlepnlmn"> </b>
                </span>

                <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_tmbhpenglmn()"
                    class="close"></i>
                {{-- <i class="ion-android-close" style="color: black; margin-right: 10px; font-size: 20px;"
                    type="button" onclick="clos_tmbhmdlactvty()" class="close"></i> --}}
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">

                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm"  data-role='fieldcontain' > 
                                    <input type="hidden" id="tx_urtanpnglmn" name="tx_urtanpnglmn" />
                                    <input type="hidden" id="tx_typepnglmn" name="tx_typepnglmn" /> 

                                    <div class="card-body text-left">
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Perusahaan*</label>
                                            <input class="form-control" id="tx_pnglmnpt" name="tx_pnglmnpt"
                                                style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Jabatan</label>
                                            <input class="form-control" id="tx_pnglmnjbtn" name="tx_pnglmnjbtn"
                                                style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Masa Kerja</label>
                                            <input type="text" class="form-control" id="tx_pnglmnmskerja"
                                                name="tx_pnglmnmskerja" style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Total Gaji</label>
                                            <input type="number" class="form-control" id="tx_pnglmngji"
                                                name="tx_pnglmngji" style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Alamat Perusahaan</label>
                                            <input class="form-control" id="tx_pnglmnalmtprshan"
                                                name="tx_pnglmnalmtprshan" style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="form-group">
                                            <label style="font-size: 12px;">Alasan Keluar </label>
                                            <input class="form-control" id="tx_pnglmnalsn" name="tx_pnglmnalsn"
                                                style="height: 30px; font-size: 12px;" />
                                        </div>
                                        <div class="text-center px-1 py-3">
                                            <div class="row">
                                                <div class="col-6"> 
                                                    <button type="button" id="btn_pnglmndelt" 
                                                    class=" btn btn-lg btn-danger  px-3 shadow"
                                                    style="border-radius: 5px !important; color:white; f font-weight: 500; font-size: 12px; 
                                                    width: 100%;
                                                    height: calc(1.5em + 0.75rem + 2px);"
                                                    onclick="dlt_pnglmn()">Hapus</button> 
                                                </div>
                                                <div class="col-6">
                                                    <button type="button" class="  px-3 shadow btn btn-lg   btn-success" id="btn_submtpnglmn"
                                                    style="border-radius: 5px !important; color:white;  font-weight: 500; font-size: 12px; 
                                                    width: 100%;
                                                    height: calc(1.5em + 0.75rem + 2px);"
                                                    onclick="sbt_tmbhpnglmn()"> Tambah
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
    function clos_tmbhpenglmn(){
        
        // location.reload();
            $('#tx_pnglmnpt').val('');
            $('#tx_pnglmnjbtn').val('');
            $('#tx_pnglmnmskerja').val('');
            $('#tx_pnglmngji').val('');
            $('#tx_pnglmnalmtprshan').val('');
            $('#tx_pnglmnalsn').val('');
            $('#tx_urtan').val('');
        document.getElementById('mdl_tmbhpenglmn').style.display='none'; 
      } 
      function sbt_tmbhpnglmn(){
        //tx_pnglmnpt,tx_pnglmnjbtn,tx_pnglmnmskerja,tx_pnglmngji,tx_pnglmnalmtprshan,tx_pnglmnalsn
        var prshn = $('#tx_pnglmnpt').val();
        var jbtan = $('#tx_pnglmnjbtn').val();
        var mskrj = $('#tx_pnglmnmskerja').val();
        var gajih = $('#tx_pnglmngji').val();
        var gajihtmbh = 'Rp. '+new Intl.NumberFormat('id-ID').format($('#tx_pnglmngji').val()) ;
        var almat = $('#tx_pnglmnalmtprshan').val();
        var alsan = $('#tx_pnglmnalsn').val(); 
        var urutan = $('#tx_urtanpnglmn').val();
        var txtype = $('#tx_typepnglmn').val();
        if(txtype == 'Tambah'){
            if (prshn == '')  {
                $('#loader').hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nama Perusahaan tidak boleh kosong!',
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
                    console.log(urutan);
                    $('#empt_pnglmn').remove();  
                    var rw ='<li class="shadow p-1 mb-1 bg-white rounded"  id="'+prshn.replaceAll(" ","")+'" >' 
                        +'<input type="hidden" name="pnglmn_nmpt[]" value="'+prshn+'" required>'
                        +'<input type="hidden" name="pnglmn_jbtn[]" value="'+jbtan+'" required>'
                        +'<input type="hidden" name="pnglmn_mskrj[]" value="'+mskrj+'" required>'
                        +'<input type="hidden" name="pnglmn_gajih[]" value="'+gajih+'" required>'
                        +'<input type="hidden" name="pnglmn_almat[]" value="'+almat+'" required>'
                        +'<input type="hidden" name="pnglmn_alsan[]" value="'+alsan+'" required>' 
                            +'<div class="card p-2 mb-2">'
                                +'<div class="d-flex justify-content-between">'
                                    +'<div class="d-flex flex-row align-items-center">'
                                        +'<div class="icon"> <img src="{{asset('public/resource/img/hris/pengalaman.png')}}" class="img-circle avatar center" style="width: 50px; height: 50px;" /></div>'
                                        +'<div class="text-left col">'
                                            +'<h3 class="mb-0" >'+prshn+'</h3>'
                                            +'<span>'+jbtan+'</span>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="" onclick="dlt_pnglmn_tmbh(\''+prshn.replaceAll(" ","")+'\')">'
                                        +' <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_tmbhkk()" class="close"></i>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Gaji</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+gajihtmbh+'</a>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Kota</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;" > : '+almat+'</a>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="text-left">'
                                    +'<div class="input-group ">'
                                        +'<div class="input-group-prepend">'
                                            +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px">'
                                                +'<a style="font-size: 12px; color:black; ">Masa Kerja</a>'
                                            +'</span>'
                                        +'</div> <a style="font-size: 12px; color:black;  padding-right:5px;"> :  '+mskrj+' Tahun</a>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="row">'
                                    +'<div class="text-left col">'
                                        +'<div class="input-group ">'
                                            +'<div class="input-group-prepend">'
                                                +'<span class="" id="basic-addon3" style="font-size: 10px; color:black; min-width: 80px; padding:0px"><a style="font-size: 12px; color:black; ">Alasan Keluar</a>'
                                                +'</span>'
                                            +'</div> <a style="font-size: 12px; color:black; min-width: 90px;"> : '+alsan+'</a>'
                                        +'</div>'
                                    +'</div>'
                                +'</div>'   
                            +'</div>'
                        +'</li>';    
                    $('#ul_pnglmn').append(rw); 
                    clos_tmbhpenglmn();
                }
            })
           
                // Jsn_Sbmtpnglmn();
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
                    // nmpt,jbtn,mskrj,gajih,almat,alsan
                    $('#nmpt'+urutan+'').val(prshn);
                    $('#jbtn'+urutan+'').val(jbtan);
                    $('#mskrj'+urutan+'').val(mskrj);
                    $('#gajih'+urutan+'').val(gajih);
                    $('#almat'+urutan+'').val(almat);
                    $('#alsan'+urutan+'').val(alsan); 

                    $('#html_nmpt'+urutan+'').html(prshn);
                    $('#html_jbtn'+urutan+'').html(jbtan);
                    $('#html_mskrj'+urutan+'').html(' : '+mskrj);
                    $('#html_gajih'+urutan+'').html(' : Rp. '+new Intl.NumberFormat('id-ID').format(gajih));
                    $('#html_almat'+urutan+'').html(' : '+almat);
                    $('#html_alsan'+urutan+'').html(' : '+alsan);   
                    clos_tmbhpenglmn();
                }
            })
        }
        } 

        function dlt_pnglmn() {
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

                    var prshn = $('#tx_pnglmnpt').val();
                    console.log('li_pt'+prshn.replaceAll(" ", ""));   
                    $('#li_pt'+prshn.replaceAll(" ", "")).remove();
                    clos_tmbhpenglmn();
                }
            })
        
        }

        function dlt_pnglmn_tmbh(idd) {
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
                    clos_tmbhpenglmn();
                }
            }) 
         
         }

      
        function Jsn_Sbmtpnglmn(){ 
        var prshn = $('#tx_pnglmnpt').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var jbtan = $('#tx_pnglmnjbtn').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var mskrj = $('#tx_pnglmnmskerja').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var gajih = $('#tx_pnglmngji').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var almat = $('#tx_pnglmnalmtprshan').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        var alsan = $('#tx_pnglmnalsn').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
        
        
            // nip,type,prshn,jbtan,mskrj,gajih,almat,alsan,nmanip
        console.log('prshn '+prshn+'jbtan '+jbtan+'mskrj '+mskrj+'gajih '+gajih+'almat '+almat+'alsan '+alsan);
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '{{url("tmbhpenglaman")}}',  
            data: {"_token": "{{ csrf_token() }}","nip":'{{$nip}}',"type":'Tambah',"prshn":prshn,"jbtan":jbtan,"mskrj":mskrj,"gajih":gajih,"almat":almat,
            "alsan":alsan,"nmanip":'{{$nm_lengkap}}' },
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