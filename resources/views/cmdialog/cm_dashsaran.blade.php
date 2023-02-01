@extends('layouts.layout_cmmodal')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content')
<style>
    .form-group {
        margin-bottom: 0.1rem !important;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 0.75rem !important;
    }
</style>
<div class="container" style="padding:5px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header" style="padding: 0.50rem 0.50rem !important;">

                <div class="row">
                    <div class="col">
                        <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>Suara Karyawan</b></a>
                    </div>

                    {{-- href="{{ route('cm_dashsaranHistory')}}?nip={{$nip}}&kdakses={{$kdakses}}" --}}
                    <div class="text-right" style="margin-right: 12px;">
                        <div type="button" id="btnhistsrn" onclick="btn_histsrn()" class="btn-sm btn-white shadow"
                            style="border-radius: 10px !important; background-color: white; 
                        color:red; font-weight: bold; font-size: 12px;">History</div>

                    </div>
                </div>
                {{-- <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>Suara Karyawan</b></a> --}}

            </div>
            @if($urllotti == "0")

            <div class="text-center ">
                <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}" background="transparent" speed="1"
                    style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                </lottie-player>
                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
            </div>
            @else
            <div class="card-body text-left">

                <div class="form-group">

                    <label style="font-size: 12px;">Subject</label>

                    <input type="text" class="form-control form-control-sm textleft inptklmjmlbld" id="tx_srnksubjct"
                        name="tx_srnksubjct" placeholder="contoh : pengaduan/keluh kesah/komplain/kritik & saran"
                        style="font-size: 12px;" value="">

                </div>
                <div class=" form-group">
                    <label style="font-size: 12px;">Pesan Anda </label>
                    <textarea id="tx_srnkritik" class="form-control form-control-sm textleft inptklmjmlbld" cols="40"
                        rows="5" placeholder="contoh : sangat bermanfaat dengan adanya fitur ini."
                        style="font-size: 12px;" required></textarea>
                    <small class="form-text  text-danger">*nama anda tidak akan di tampilkan.</small>
                </div>
                <div class="form-group mx-5 mt-2 pb-2">
                    <button type="button" class="form-control btn-lg btn-dark submit px-3 shadow" onclick="send_saran()"
                        style="border-radius: 5px !important; background-color: black; 
                            color:white; font-weight: bold; font-size: 14px;">Kirim</button>
                </div>
            </div>

            @endif
            <div class="row">
                <div class="input-group">
                    <div class="text-center" style="margin: auto">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_bmk.png"
                            alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_gokana.png"
                            alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_platinum.png"
                            alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_raacha.png"
                            alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_bmkKopi.png"
                            alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_chopstix.png"
                            alt="">
                        <img class="img-h"
                            src="http://api.champ-group.com/starlet/public/assets/img/logo_platinumGrill.png" alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_ms.png"
                            alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_dewata.png"
                            alt="">
                        <img class="img-h" src="http://api.champ-group.com/starlet/public/assets/img/logo_Croco.png"
                            alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    function btn_histsrn(){ 
        $('#btnhistsrn').css({'background':'rgba(0, 0, 0, 0.5)' }); 
        $('#loader').show(); 
            window.location.href='{{route('cm_dashsaranHistory')}}?nip={{$nip}}&kdakses={{$kdakses}}';
            $(document).ready(function () {  
            var refreshId = setInterval(function () {
                $('#loader').hide();
                }, 5000);
                $.ajaxSetup({ cache: false });
            });
    }
    function send_saran(){
    // spin_agm,spin_sttskel,spin_tglmnkh,spin_jmlank,spin_jnsklmn,spin_tgllhr,tx_tmptlhir,tx_nowa,tx_almtemail,tx_almt 
    
    var txsrn =  $('#tx_srnkritik').val().replace(/(?:\r\n|\r|\n)/g, ' ');  
            if (txsrn == "" || txsrn == null) {
                    $('#loader').hide();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Isi Kolom tidak boleh kosong',
                        confirmButtonColor: '#cc1a0b',
                        allowOutsideClick: false  
                    }) 
                } else { 
                    $('#loader').hide(); 
                    jsn_saran();
                }
            }
    function jsn_saran(){ 
        var txsrn =  $('#tx_srnkritik').val().replace(/(?:\r\n|\r|\n)/g, ' '); 
         var txsbj =  $('#tx_srnksubjct').val(); 
        Swal.fire({
                    text: "Apakah anda yakin akan Mengirim Kritik & Saran ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: "Tidak",
                    confirmButtonText: 'Ya, Kirim!' ,
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
                        url: '{{url("submit_dashsaran")}}', 
                        data: {"_token": "{{ csrf_token() }}","nip":'{{$nip}}',"idtittle":'{{$idtittle}}',"isisaran":txsrn,"subjctt":txsbj},
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
                                allowOutsideClick: false 
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
                                allowOutsideClick: false 
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
                                allowOutsideClick: false 
                            });
                        }
                    }); 
                }
            }) 
        }
            

</script>
@endsection