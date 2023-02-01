@extends('layouts.layout')
@section('title', 'PT.Champ Resto Indonesia')
@section('content')
<style>
    .user {
        display: flex;
        margin-top: auto;
        min-width: 100%;
    }

    .user img {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

    .user-info h5 {
        margin: 0;
    }

    .user-info small {
        color: #545d7a;
    }

    .btn {
        font-size: 0.8rem !important;
    }

    .buttonoff:hover {
        background-color: green;
    }

    .buttonon {
        /* background-image: url('resource/img/mejaon.png'); */
        background-size: cover;
        background-color: transparent;
        width: 90px;
        height: 90px;
        font-size: 1.5rem;
        font-weight: bold;
        color: #000;
        border: none;
        margin: 0 10px;
    }

    .buttonon:hover {
        background-color: #000;
        border-radius: 50%;
    }

    .btn-circle.btn-xl {
        width: 100px;
        height: 100px;
        padding: 13px 18px;
        border-radius: 60px;
        font-size: 15px;
        text-align: center;
    }

    .br {
        display: block;
        margin-bottom: 0em;
    }

    .brmedium {
        display: block;
        margin-bottom: 1em;
    }

    .brlarge {
        display: block;
        margin-bottom: 2em;
    }

    .brxsmall {
        display: block;
        margin-bottom: -.4em;
    }
</style>


<div class="container" >
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal" style="font-size: 16px; ">Setting Meja ({{$ikdoutlet}})</h4>
            </div>
            <div class="card-body" style="padding: 10px 5px 10px 5px !important;">
                @if ($kdakses != 'AVMS2')

                <form id="send_kdotl" class="" action="{{ route('msetmeja') }}" method="GET">
                    @csrf

                    <input type="hidden" name="kdotlmj" id="kdotlmj" value="{{$ikdoutlet}}">
                </form>
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3"
                            style="font-size: 14px; color:black;">Outlet&nbsp;
                            &nbsp; : </span>
                    </div>

                    <select class="form-control " name="plhkdotl" id="plhkdotl" onchange="plhkdtl_meja()">
                        @foreach ($dfotl as $otl)
                        <option value="{{ $otl['kdoutlet'] }}" @if ($ikdoutlet==$otl['kdoutlet'] ) selected @endif>
                            {{$otl['sngktotl'] }} ({{ $otl['kdoutlet'] }})
                        </option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div class="text-left">
                    @if(isset($df_meja)) <div class="table-responsive" style="overflow-x: hidden; height: 460px;">
                        <div class="row">
                            @foreach($df_meja as $dfm)


                            <div class="col-3 m-2">
                                <button type="button" class="btn btn-dark btn-circle btn-xl"
                                    style="@if ($dfm['smokarea'] =='T') background: #cc1a0b; @endif "
                                    onclick="btn_upmeja('{{$dfm['nomeja']}}#{{$dfm['kapasitas']}}#{{$dfm['smokarea']}}')">
                                    <p class="m-0">
                                        <span
                                            style="font-size:30px; font-weight: bold; margin-bottom: 5px;">{{$dfm['nomeja']}}</span>
                                        <span class="brxsmall" style="font-size:9px;">@if ($dfm['smokarea']
                                            =='T')Smoking @else Non Smoking @endif</span>
                                        <span class="brxsmall" style="font-size:9px;">{{$dfm['kapasitas']}}
                                            Pax</span>
                                    </p>
                                </button>
                            </div>

                            {{-- <div class="col-md-12" style="padding: 0px  0px  0px  0px !important;">
                                <div class="card-header shadow mt-2"
                                    style="background-color: #FFFFFF !important; border-radius: 5px !important; padding: 5px 5px 5px 5px !important;">
                                    <div class="user">

                                        <div class="user-info">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="font-size: 12px; color:black;  min-width: 100px;">Meja
                                                        Number</span>
                                                </div>
                                                <input type="number" class="form-control" aria-label="Small"
                                                    aria-describedby="inputGroup-sizing-sm" style="font-weight: bold;"
                                                    value="{{$dfm['nomeja']}}" readonly>
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="font-size: 12px; color:black;  min-width: 100px;">Kapasitas</span>
                                                </div>
                                                <input type="number" class="form-control" aria-label="Small"
                                                    aria-describedby="inputGroup-sizing-sm"
                                                    value="{{$dfm['kapasitas']}}" id="idmj{{$dfm['nomeja']}}"
                                                    onkeypress="itknenter('{{$dfm['nomeja']}}#{{$dfm['smokarea']}}')">
                                            </div>
                                        </div>
                                        <div class=" img text-center" style="">
                                            <input type="hidden" name="hdidcxbx{{$dfm['nomeja']}}"
                                                id="hdidcxbx{{$dfm['nomeja']}}" value="{{$dfm['smokarea']}}">
                                            <input type="checkbox" id="idcxbx{{$dfm['nomeja']}}" data-toggle="toggle"
                                                data-on="Smoking" data-off="Non&nbsp;Smoking" data-onstyle="success"
                                                data-offstyle="danger" data-height="62" data-width="100"
                                                value="{{$dfm['smokarea']}}" @if($dfm['smokarea']=='T' ) checked @endif
                                                onchange="idcxbx('{{$dfm['nomeja']}}#hdidcxbx{{$dfm['nomeja']}}#{{$dfm['kapasitas']}}', this)">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-plugin" onclick="btn_tmbhmeja()">
        <a class="fixed-plugin-button text-white position-fixed px-3 py-2">
            <i class="material-icons py-2 fas fa fa-plus"></i>
            {{-- <i class="material-icons py-2">add</i> --}}
        </a>
    </div>
</div>

@include('mssettingmeja.m_upmeja')
@include('mssettingmeja.m_tmbhmeja')
<script>
    function btn_upmeja(isi){  
        // nomeja,kapasitas,smokarea
        var data = isi.split('#');
        var nomja = data[0]; 
        var kpsts = data[1];  
        var smoke = data[2];  
      $('#tx_ketupmeja').html('Setting Meja ('+nomja+')');
      $('#tx_kpsts').val(kpsts);
      $('#tx_nomeja').val(nomja);

      $(document).ready(()=>{
            $("#spin_areasmking").val(smoke);
        }); 
    //   $('#tx_dashupkdotl').val(kdotl);

      document.getElementById('up_meja').style.display='block';  
    } 
    function idcxbx(isi, thiss){ 
        var dataa       = isi.split('#');
        var idcxbx      = dataa[0]; 
        var hdidcxbx    = dataa[1]; 
        var kpsts       = dataa[2];  
        var cek = thiss.checked; 
        if(cek == true){
            $('#'+hdidcxbx).val('T');
        }else if(cek == false){
            $('#'+hdidcxbx).val('F');
        } 
        var smka = $('#'+hdidcxbx).val();
        jsn_sbmtupdt(idcxbx+'#'+kpsts+'#'+smka);
    } 
 

    function btn_tmbhmeja(){   
      document.getElementById('tmbh_meja').style.display='block';  
    } 
</script>
<script>
    $.ajax({
        success: function () {
            $("#id_footerr").addClass('fixed-bottom');
        }
        }); 
</script>

<script>
    function plhkdtl_meja(){ 
            var plhkdotl = $('#plhkdotl').val();
            $('#kdotlmj').val(plhkdotl);  
            $('#send_kdotl').submit();
        }
    function itknenter(isi){ 
        
        var dataa   = isi.split('#');
        var idmj    = dataa[0]; 
        var vlcxbx  = dataa[1]; 

        var input = document.getElementById('idmj'+idmj);

        input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            
        var inputaa =  document.getElementById('idmj'+idmj).value;
            jsn_sbmtupdt(idmj+'#'+inputaa+'#'+vlcxbx);
        }
        }); 
    }

</script>
<script>
    function jsn_sbmtupdt(isi){
        var dataa = isi.split('#');
        var nmeja=dataa[0]; 
        var kpsts=dataa[1]; 
        var smoke=dataa[2]; 
        var kdotlmj; 
        if ('{{$kdakses}}' == 'AVMS2'){
            kdotlmj= '{{$ikdoutlet}}'; 
        }else{
            kdotlmj= $('#kdotlmj').val(); 
        }
          
        console.log('Bari '+nmeja+'==='+kpsts+'==='+smoke+'===');  
        loadingon(); 
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            type: 'POST',
            url: '{{url("sbt_updtsetmja")}}',
            // kdotl, kdakses, nomeja, kapasitas, smokarea
            data: {"_token": "{{ csrf_token() }}","kdotl":kdotlmj,"kdakses":'{{$kdakses}}',"nomeja":nmeja,"kapasitas":kpsts,"smokarea":smoke},
            dataType: 'json',
            success:function(data){
                console.log(data);
                $('#loader').hide(); 
                if(data['UpdtB']==false){
                    swal.fire({
                    icon: 'error',
                    title: 'Opps!!',
                    text: 'Gagal Update data.',
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
                    text: 'Berhasil Update data.',
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
                    allowOutsideClick: false
                });
            }
        });    
    }
</script>

@endsection