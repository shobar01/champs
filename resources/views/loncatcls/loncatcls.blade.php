@extends('layouts.layout')
@section('title', 'PT.Champ Resto Indonesia')
@section('content')
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;

    }

    /* Center the image and position the close button */
    .img.container {
        text-align: center;
        margin: 0 0 24px 0;
        position: relative;
    }

    img.avatar {
        width: 30%;
        border-radius: 50%;
    }

    .swal-wide {
        /* width: 850px !important; */
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<nav class=" header  fixed-top" style="height: 30px !important; padding: 30px 0 30px 0 !important;">
    <div class="mx-auto my-2 order-0 order-md-1 position-relative">
        <img src="{{asset('public/resource/img/logo.png')}}" class="img-circle avatar center  fixed-top"
            style="width: 60px; height: 60px;" />
    </div>
</nav>

<div class="container" style="padding-top: 70px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h5 class="my-0 font-weight-bold">Loncat Closing</h5>
            </div>

            <div class="card-body text-left">

                <form id="form_loncatcls" action="{{route('loncat')}}" method="GET">
                    @csrf
                    <div class="form-group">
                        <label>Outlet</label>

                        <input type="hidden" name="kdotl" id="kdotl" value="{{$kdotl}}">
                        <input type="hidden" name="stts_lonctcls" id="stts_lonctcls" value="{{$ssion_sttslonctcls}}">
                        <select class="form-control form-control-sm " name="toglekdotl" id="toglekdotl"
                            onchange="pilihkdotl()">
                            @foreach ($dfotl as $otl)
                            <option value="{{ $otl['kdoutlet'] }}" @if ($kdotl==$otl['kdoutlet'] ) selected @endif>
                                {{$otl['sngktotl'] }} ({{ $otl['kdoutlet'] }})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="noorder">Tanggal</label>

                        <input type="date" name="tgl" id="tgl" value="{{$tgl}}" class="form-control date_now"
                            style="font-size: 14px; color:black;" onchange="pilihkdotl()" required>
                        {{-- <small class="form-text  text-danger">*untuk cek voucher tidak perlu input No
                            Order.</small> --}}
                    </div>
                    <div class="form-group mt-5">
                        <button class="btn btn-success btn-lg col-md-3 ml-2 mt-1 float-right " type="button"
                            onclick="submitt()">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js">
</script>

<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
</script>

<script>
    function pilihkdotl(){ 
            var toglekdotl = $('#toglekdotl').val();
            $('#kdotl').val(toglekdotl);    
        } 

    function submitt(){ 
        Swal.fire({
            text: "Apakah anda yakin akan Merubahnya?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            customClass: 'swal-wide',
            cancelButtonText: "Tidak",
            confirmButtonText: 'Ya!' ,
            reverseButtons: true,
            allowOutsideClick: false 
        }).then((result) => {
            if (result.isConfirmed)
        { 
            event.preventDefault();   
            
            $('#stts_lonctcls').val('T');
            $('#form_loncatcls').submit() 
        }
    })
        
        } 
</script>

@if ($ssion_sttslonctcls == 'T')
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!!',
        text: "Berhasil di Update",
        confirmButtonColor: '#28a745',
        allowOutsideClick: false  
    })  
</script>
@endif

@endsection