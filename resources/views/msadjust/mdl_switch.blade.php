
<style>
    
    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1031;
        left: 0;
        top: 0;
        width: 100%;
        height: 97vh;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 0px;
        /* overflow: scroll; */
        position: fixed;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 0%;
        border: 1px solid #888;
        width: 100%;
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

    .form-control { 
        font-size: 12px !important; 
    }
    .dropdown-item { 
        font-size: 12px !important;
    } 
</style>

<link href="{{asset('public/resource/css/style_viewcogs.css')}}" rel="stylesheet" type="text/css">
<div id="mdl_switch" class="modal" style="padding-top: 60px;">
    <div class="" >
        <div class="modal-content animate">
            <div class="modal-header"
                style="color: black; padding-top: 5px !important; padding-bottom: 5px !important;">
                <span class="center" style="font-weight: 500;  margin-top: 8px;">
                    <b style="font-size: 14px;" >Switch Server MS</b>
                </span>

                <i class="ion-close-circled end-0" style="color: red;   font-size: 25px;" onclick="clos_switch()"
                    class="close"></i> 
            </div>
            <div class="modal-body" style="overflow-x: hidden; list-style-type: none; padding: 5px;">
                <div class="fw-container">
                    <div class="fw-body">
                        <div class="content">
                            <div class="card-deck mb-3 ">
                                <div class="card mb-4 shadow-sm"> 
                                    <div class="card-body text-left">
                                        
                                        <form id="send_adjust" class="" action="#" method="GET">
                                            @csrf 
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3"
                                                        style="font-size: 12px; color:black; min-width: 90px;">Outlet
                                                    </span>
                                                </div>
                                                <select class="form-control  form-select selectpicker" id="select_otlmstr" data-live-search="true">  
                                                    {{-- <option value="{{$kdotl}}#{{$nmotl}}">@if($kdotl != 'F') {{$nmotl}} @else Pilih Outlet @endif </option> --}}
                                                    @foreach ($dfotl as $arrotl)
                                                    <option value="{{$arrotl['kdoutlet']}}">{{$arrotl['kdoutlet'].' - '.$arrotl['nmoutlet']}}
                                                    </option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                            <div class="input-group ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3"
                                                        style="font-size: 12px; color:black; min-width: 90px;">Switch URL
                                                    </span>
                                                </div>
                                                <select class="form-control " id="tx_urllink"
                                                    name="tx_urllink" data-live-search="true" required
                                                    style=" font-size: 12px;">
                                                    @foreach ($dfswitch as $df)
                                                    <option value="{{$df['link']}}" style="font-size:12px !important">{{$df['nmlink'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3"
                                                        style="font-size: 12px; color:black;min-width: 90px;">Last Update
                                                    </span>
                                                </div>
                                                <input type="text" id="tx_msswitchupdt" name="tx_msswitchupdt" class="form-control "
                                                    style="font-size: 12px; color:black;" 
                                                    placeholder="contoh : MSJXX-22050600000XXX" readonly>
                                            </div>
                                        </form>

                                        <div class="text-center px-1 pb-2 mt-3">
                                            <div class="row">
                                                <div class="col">
                                                    <button type="button" class="btn btn-lg btn-block btn-success" id="Searching"
                                                        onclick="switch_url()" style="width:100%; font-weight: 500; font-size: 12px;">
                                                        Switch URL 
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-deck mt-3 ">
                                            <div class="card mb-4 shadow-sm">

                                                @if(isset($dflinkurl))
                                                <div class="table-responsive" style="overflow-x: hidden;  ">
                    
                                                    <div class=" table-responsive" style="overflow-y: hidden;">
                                                        <table id="tbl_switch" class="table table-striped table-bordered"
                                                        style="min-width: 500px !important; ">
                                                            <thead>
                                                                <tr>
                                                                    <th class="ftsize12l xxx">Outlet</th>
                                                                    <th class="ftsize12 red">URL</th>
                                                                    <th class="ftsize12l ">Tgl. Update</th>  
                                                            </thead>
                                                            <tbody  >
                                                                @foreach ($dflinkurl as $dfo)
                                                                {{-- tgl,kdoutlet,NmOutlet,ip sisa --}}
                                                                <tr>
                                                                    {{-- <td class="ftsize12l aaa">{{$dfo['nmoutlet']}} --}}
                    
                                                                    <td class="ftsize12l aaa" style=" max-width:10px !important">
                                                                        {{ucwords(strtolower(
                                                                        $dfo['nmoutlet']))}}
                                                                    </td>
                                                                    <td class="ftsize12l red" style=" max-width:50px">
                                                                        {{$dfo['valuesetting']}}
                                                                    </td>
                                                                    <td class="ftsize12l" style=" max-width: 30px">
                                                                        {{$dfo['wktupdate']}}</td> 
                    
                                                                </tr>
                                                                @endforeach
                    
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="text-center ">
                                                    <lottie-player src="{{asset('public/resource/lottie/kosong.json')}}"
                                                        background="transparent" speed="1"
                                                        style="margin: 0 auto; width: 300px; height: 300px;" loop autoplay>
                                                    </lottie-player>
                                                    
                                <a class="text-center" style="font-size:14px;color: #c3c3c4;">Tidak ada data</a>
                                                </div>
                                                @endif
                                                
                                                {{-- <input type="text" value="{{$nip}}" />
                                                <input type="text" value="{{$kdakses}}" />  --}}
                                                
                                            {{-- <form id="send_ptsdwnld" class="" action="{{ route('pts_approvalqa') }}" method="GET">
                                                @csrf
                                                <div class="card-body text-left">  
                                                    <div class="input-group mb-3"> 
                                                        <input type="month" id="bln_dwldpts" name="bln_dwldpts" min="{{$minbln}}" value="{{$nowbln}}"
                                                            max="{{$nowbln}}" class="form-control " style="font-size: 12px; color:black;"  required> 
                                                    </div> 
                                                </div> 
                                            </form>

                                                <div class="text-center px-1 mb-5"> 
                                                        <button type="button" class="btn btn-lg btn-success" id="btn_sbmtdownload"
                                                            onclick="btn_sbmtdownload()" style="width:80%; font-weight: 600; font-size: 16px; ">
                                                            Download
                                                        </button>  
                                                    </div>  --}}
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
    function clos_switch(){   
        document.getElementById('mdl_switch').style.display='none';  
    }

    dkrdt=$('#tbl_switch').DataTable({
            "bLengthChange": false, 
            "paging":false, 
            "info":true, 
            "lengthMenu": [30],  
            "dom":"lrtip" ,  
            "order": [[ 2, "desc" ]], 
            });
        //     $('#belumada').keyup(function(){  
        //         dkrdt.search($(this).val()).draw();    
        // }) ;   

    function switch_url(){   
        var url_link = $('#tx_urllink').val(); 

        Swal.fire({
                    text: "Apakah anda yakin akan merubahnya?",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: "Tidak",
                    confirmButtonText: 'Ya, Ubah!' ,
                    reverseButtons: true,
                    allowOutsideClick: false 
                }).then((result) => {
                    if (result.isConfirmed)
                { 
                    event.preventDefault(); 
                    jsn_switch(); 
                }
            }) 

        // document.getElementById('mdl_switch').style.display='none';  
    }

    function jsn_switch(){ 
           
           var nm = '{{$dfuser[0]['nm_lengkap']}}';
           var kdakses = '{{$kdakses}}';
           var nip = '{{$nip}}';
           var aflink = $('#tx_urllink').val();
           var bflink = '{{$dflinkurl[1]['valuesetting']}}';
           var kdoutlet = $('#select_otlmstr').val(); 
           var nmlinkk = $( "#tx_urllink option:selected" ).text();   
     
            console.log(nm+"=="+ kdakses+"=="+ nip+"=="+aflink+"==="+nmlinkk+"==="+kdoutlet+"==="+nmlinkk);
           loadingon(); 
           $.ajaxSetup({
               headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                   });
           $.ajax({
               type: 'POST',
               url: '{{url("submit_switchms")}}', 
                // kdoutlet,tanggal,nipcek,ket,ipdb
               data: {"_token": "{{ csrf_token() }}","nip":nip,"kdakses":kdakses,"tipe":'B',"nama":nm,"kdoutlet":kdoutlet,"aflink":aflink,"bflink":bflink,"nmlinkk":nmlinkk},
               dataType: 'json',
               success:function(data){
                   
                   console.log(data);
                   $('#loader').hide();
                   if(data['upset']==false){
                           swal.fire({
                           icon: 'error',
                           title: 'Opps!!',
                           text: 'Gagal Di Update.',
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
                           text: 'Berhasil Di Update.',
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
 
