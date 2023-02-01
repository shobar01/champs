@extends('layouts.layout_presence')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content') 
<style>
    .icon {
        /* width: 60;
        height: 60;
        background-color: #eee;
        border-radius: 15px; */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px
    }

    .iconarrow {

        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px
    }

    .badge span {
        background-color: #fffbec;
        width: 60px;
        height: 25px;
        padding-bottom: 3px;
        border-radius: 5px;
        display: flex;
        color: #fed85d;
        justify-content: center;
        align-items: center
    }

    .tx16 {
        font-size: 16px;
        font-weight: 600
    }

    .text2 {
        color: #a5aec0
    }
 
    .btn-danger {
        color: #fff !important;
        background-color: #cc1a0b !important;
        border-color: #cc1a0b !important;
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
     
    .multiselect {
  width: 100%;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

label { 
    margin-bottom: 0.1rem !important    ;
}
#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
    font-size: 10px;
    font-weight: bold;
  display: block;
}

#checkboxes label:hover {
  background-color: #cc1a0bb5;
}               
            
</style>
 
<link href="{{asset('public/resource/css/style_viewcogs.css')}}" rel="stylesheet" type="text/css">
 
<div class="container" style="padding-top: 70px; padding-right: 10px; padding-left: 10px; height:100vh;">
    
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <div class="row ">

                    <div class="col" style="padding-right: 5px !important; padding-left: 5px !important;">
                        <a class="my-0 font-weight-normal" style="font-size: 14px;"><b>Switch Server MS</b></a>
                    </div> 
                    <div class=" text-right" style="padding: 0 10px 0 5px !important;">
                        <div id="gbl_rfrsh" type="button"  style=" font-weight: bold; font-size: 14px;"  onclick="rfrsh()"><i class='fa fa-refresh'
                            style='color: #000; margin: 0 5px 0 5px;'></i></div>
                    </div>
                </div> 
            </div>   
                <div class="card-body" >  
                        <form id="form_amstrswitc" action="{{route('submit_switchms')}}" method="POST" enctype="multipart/form-data" onkeypress="return event.keyCode !=13">
                            @csrf   
                            <input type="hidden" id="mstswt_nm" name="mstswt_nm"value="{{$nm}}"   required> 
                            <input type="hidden" id="mstswt_kdakses" name="mstswt_kdakses" value="{{$kdakses}}"/>
                            <input type="hidden" id="mstswt_nip" name="mstswt_nip" value="{{$nip}}"/>
                            
                            <div class="input-group "> 
                                <div class="multiselect">
                                    <div class="selectBox" onclick="showCheckboxes()">
                                        {{-- <select>
                                        <option>Select an option</option>
                                        </select> --}}
                                        <select class="form-control  form-select" id="select_otlmstr"  onclick="showCheckboxes()">   
                                        <option readonly>Pilih Outlet</option>
                                    </select> 
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes">
                                        @foreach ($dfotl as $arrotl) 
                                        {{-- <div class="col">
                                    
                                            <input type="text" name="SearchSwitch" id="SearchSwitch"  placeholder="Searching"
                                            class="form-control date_nowpts align-middle" style="font-size: 12px; color:black;" required>
                                            </div> --}}

                                            <label for="{{$arrotl['kdoutlet']}}">
                                            <input class="form-select" type="checkbox" id="{{$arrotl['kdoutlet']}}" name="mstswt_pilihotl[]" value="{{$arrotl['kdoutlet']}}#{{$arrotl['valuesetting']}}"/>
                                            {{$arrotl['kdoutlet'].' - '.$arrotl['nmoutlet']}}</label> 
                                        @endforeach
                                        </div>
                                    </div> 
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
                        <div class="content" id="contn"> 
                            
                        <div class="text-center  px-3 pb-2 mt-2 ">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-lg btn-block btn-success" id="Searching"
                                        onclick="switch_url()" style="width:100%; font-weight: 500; font-size: 12px;">
                                        Switch URL 
                                    </button>
                                </div>
                            </div>
                        </div> 
                        <div class="text-center">
                            <div class="row">
                                <div class="col">
                                    
                                <input type="text" name="SearchSwitch" id="SearchSwitch"  placeholder="Searching"
                                class="form-control date_nowpts align-middle" style="font-size: 12px; color:black;" required>
                                </div>
                            </div>
                        </div>
                            <div class="card-deck ">
                                <div class="mb-1 shadow-sm"> 
                                    <div class=" text-left"  style="padding: 0.15rem !important;">    
                                        @if(isset($dflinkurl))
                                        <div class="content"> 
                                            <div class="table-responsive" style="overflow-x: hidden; height: 55vh; ">
    
                                                <div class=" table-responsive" style="overflow-y: hidden;">
                                                    <table id="tbl_switch" class="table table-striped table-bordered"
                                                    style="min-width: 500px !important; ">
                                                        <thead>
                                                            <tr>
                                                                <th class="ftsize12l xxx">Outlet</th>
                                                                <th class="ftsize12 red">URL</th>
                                                                <th class="ftsize12l ">Tgl. Update</th>  
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($dflinkurl as $dfo)
                                                            {{-- tgl,kdoutlet,NmOutlet,ip sisa --}}
                                                            <tr>
                                                                {{-- <td class="ftsize12l aaa">{{$dfo['nmoutlet']}} --}}
                
                                                                <td class="ftsize12l aaa" style=" max-width:10px !important">
                                                                    {{ucwords(strtolower(
                                                                    $dfo['nmoutlet']))}} ({{$dfo['kdoutlet']}})
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
                                    </div>
                                </div>
                            </div>
                        </div> 

                </div> 
        </div>   
</div>
 
<script src="{{asset('public/resource/js/lottie.js')}}"></script>
<script src="{{asset('public/resource/js/multiselect-bs4.js')}}"></script>
 
<script>
    var expanded = false;
    function showCheckboxes() { 
        var checkboxes = document.getElementById("checkboxes");
        var contn = document.getElementById("contn");
        if (!expanded) {
            checkboxes.style.display = "block";
            contn.style.display = "none";
            expanded = true; 
        } else {
            checkboxes.style.display = "none";
            contn.style.display = "block";
            expanded = false;
        }
    }  
</script>
<script>  

var nm = '{{$dflog[0]['nama']}} ({{$dflog[0]['wktupdate']}})';
        $('#tx_msswitchupdt').val(nm);
    dfswitch=$('#tbl_switch').DataTable({
            "bLengthChange": false, 
            "paging":false, 
            "info":true, 
            "lengthMenu": [30],  
            "dom":"lrtip" ,  
            "order": [[ 2, "desc" ]], 
            });
            $('#SearchSwitch').keyup(function(){  
                dfswitch.search($(this).val()).draw();    
        }) ;   

    function switch_url(){   
      
        var aflink = $('#tx_urllink').val(); 
        var kdoutlet = $('#select_otlmstr').val(); 
        var nmlinkk = $( "#tx_urllink option:selected" ).text();  

        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();   
          
        var data        = $(this).val().split('#');
        var plhkdotl    = data[0]; 
        var bflink    = data[1]; 
        
          $('#form_amstrswitc').append('<input type="hidden" name="mstswt_sndpilihot[]" value="'+ plhkdotl+'"/>');  
          $('#form_amstrswitc').append('<input type="hidden" name="mstswt_sndpilihbflink[]" value="'+ bflink+'"/>');  
        }); 

        var inputplhotl = document.getElementsByName('mstswt_sndpilihot[]');
        var hslisotl;
        for (var i = 0; i < inputplhotl.length; i++) {
                hslisotl = inputplhotl[i].value;  
            } 
        console.log(hslisotl+'===');   
        if(hslisotl == null ){
            swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Anda belum memilih OUTLET !",
                    confirmButtonColor: '#cc1a0b',
                    allowOutsideClick: false,
                });
        }else{
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
                    loadingon(); 
                    $('#form_amstrswitc').submit() 
                    // jsn_switch(); 
                }
            }) 
        }

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
@endsection