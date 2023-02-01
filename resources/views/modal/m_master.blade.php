<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;

    }


    /* Extra styles for the cancel button */
    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    /* Center the image and position the close button */
    .imgcontainer {
        text-align: center;
        margin: 0 0 24px 0;
        position: relative;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* The Modal (background) */
    .modal1 {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
        overflow: scroll;
    }

    /* Modal Content/Box */
    .modal-content1 {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
        width: 80% ;
        top: 10%;
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
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

    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
    }

    .alert.success {
        background-color: #4CAF50;
    }

    .alert.info {
        background-color: #2196F3;
    }

    .alert.warning {
        background-color: #ff9800;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }

    /* .swal-wide {
        width: 50% !important; 
    } */
</style>

<div id="dpassword" class="modal1">
    <div   class="modal-content1 animate"  
    class="d-none">
        <header class="imgcontainer" style="background: url({{asset('public/resource/img/banner_delivery.png')}});
        height: 100px; border-radius: .3rem;">
            <div class="container">
                <span onclick="document.getElementById('dpassword').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <img src="{{asset('public/resource/img/logo.png')}}" class="img-circle avatar center" alt="user name"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
            </div>
        </header>

        <div class="container modal-content1">
            <input type="text" name="pass_nip" class="form-control input-text" id="pass_nip" placeholder="NIP"
            minlength="8" maxlength="8"
                data-rule="minlen:8" data-msg="Nip harus 8 digit" required />
            <div class="px-4">
                <button  onclick="reset_pswrd('paswrd');" class="btn btn-block btn-primary btn-sm">Reset Password<i
                        class="pl-2 fa fa-paper-plane"></i></button>
            </div>
            <div class="px-4 pt-2">
                <button   onclick="reset_pswrd('device');" class="btn btn-block btn-danger btn-sm">Reset Ganti Device<i
                        class="pl-2 fa fa-mobile"></i></button>
            </div>
        </div> 
    </div>
</div>


<div id="modl_imei" class="modal1">
    <form id="send_gntiimei" class="modal-content1 animate" action="{{route('master_gantiimei')}}" method="POST"
        class="d-none">
        @csrf

        <header class="imgcontainer" style="background: url({{asset('public/resource/img/banner_delivery.png')}});
        height: 100px; border-radius: .3rem;">
            <div class="container">
                <span onclick="document.getElementById('modl_imei').style.display='none'" class="close"
                    title="Close Modal">&times;</span>
                <img src="{{asset('public/resource/img/logo.png')}}" class="img-circle avatar center" alt="user name"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
            </div>
        </header>

        <div class="container modal-content1">
            <span id="isi_modal">©ICT Department 2022</span>
            <!--                <input  class="form-control input-text" id="rpassword" value="rpassword"-->
            <!--                       placeholder="NIP" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />-->
            <input type="hidden" class="form-control input-text" name="a_nmapprove" id="a_nmapprove"
                value="{{session('nmapprove')}}" />
            <input type="hidden" class="form-control input-text" name="a_id" id="a_id" />
            <input type="hidden" class="form-control input-text" name="a_nip" id="a_nip" />
            <input type="hidden" class="form-control input-text" name="a_dvcimei" id="a_dvcimei" />
            <input type="hidden" class="form-control input-text" name="a_dvchp" id="a_dvchp" />
            <input type="hidden" class="form-control input-text" name="a_nm" id="a_nm" />
            <input type="hidden" class="form-control input-text" name="a_con" id="a_con" />
        </div>
        <div class="container ">
            <div class="side">
                <button type="submit" onclick="loadingon();" class="btn btn-block btn-primary">Update device <i
                        class="fa fa-paper-plane"></i></button>
            </div>
            {{-- <button type="submit" name="BtnResetImei" id="BtnResetImei" class="btnmerah">Update device</button>
            --}}
        </div>
    </form>
</div>

<script>
    function reset_pswrd(isi){
        var pass_nip = $('#pass_nip').val();     

       

            if(pass_nip == '-' || pass_nip == '' ){
                swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "Nip tidak boleh kosong!",
                        confirmButtonColor: '#cc1a0b',
                        allowOutsideClick: false,
                    });
            }else{  
                if(isi == 'paswrd'){ 
                    // setResetGandtidevice, setResetPass
                    jsn_gantipswrd('setResetPass'); 
                    console.log(pass_nip);
                }else{ 
                    jsn_gantipswrd('setResetGandtidevice'); 
                }
            }  
    }
    function jsn_gantipswrd(isitype){  
         
        var pass_nip = $('#pass_nip').val();  
        Swal.fire({
                    text: "Apakah anda yakin akan Merubahnya?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: "Tidak",
                    confirmButtonText: 'Ya, Ubah!' ,
                    reverseButtons: true,
                    allowOutsideClick: false 
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
                        url: '{{url("master_resetpass")}}', 
                        data: {"_token": "{{ csrf_token() }}","pass_nip":pass_nip,"type":isitype},
                        dataType: 'json',
                        success:function(data){
                            
                            console.log(data);
                            $('#loader').hide();
                            
                                swal.fire({
                                icon: 'success',
                                title: '',
                                text: data['message'],
                                confirmButtonColor: '#cc1a0b',
                                allowOutsideClick: false 
                            }).then(function() { 
                                loadingon();
                                location.reload();
                            }); 
                                
                        },
                        error: function () {
                            $('#loader').hide();
                            swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: "Server Kita Bermasalah!",
                                allowOutsideClick: false 
                            });
                        }
                    }); 
                }
            }) 
        }
</script>