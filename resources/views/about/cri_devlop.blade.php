@extends('layouts.layout_presence')
@section('title', 'PT.Champ Resto Indonesia Tbk.')
@section('content')
<style>
    hr.rounded {
        border-top: 5px solid #FEBD01;
        border-radius: 5px;
    }
</style>
<div class="container" style="padding-top: 70px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal"><b>Under Devlopment</b></h4>
            </div>
            <div class="card-body">

                <div class="fw-container">

                    <div class="fw-body">
                        <div class="content">

                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-lg-4 col-md-5 features-img">
                                        <img src="{{asset('public/resource/img/cm/under_develop.png')}}" alt="" class="wow fadeInLeft"
                                             style="visibility: visible; animation-name: fadeInLeft;">
                                    </div>

                                </div>

                            </div>
                            <section id="clients">
                                <div class="container">
                                    <footer class="page-footer font-small special-color-dark pt-4">
                                        <div class="container">
                                            <ul class="list-unstyled list-inline text-center">
                                                <li class="list-inline-item">
                                                    <a class="btn-floating btn-fb mx-1">
                                                        <img src="{{asset('public/resource/img/cm/bamiko.png')}}"
                                                            class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" />
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="btn-floating btn-fb mx-1">
                                                        <img src="{{asset('public/resource/img/cm/bmk.png')}}"
                                                            class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" />
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="btn-floating btn-fb mx-1">
                                                        <img src="{{asset('public/resource/img/cm/chopstix.png')}}"
                                                            class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" />
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="btn-floating btn-fb mx-1">
                                                        <img src="{{asset('public/resource/img/cm/gokana.png')}}"
                                                            class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" />
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="btn-floating btn-fb mx-1">
                                                        <img src="{{asset('public/resource/img/cm/gobar.png')}}"
                                                            class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" />
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="btn-floating btn-fb mx-1">
                                                        <img src="{{asset('public/resource/img/cm/kopilatinum.png')}}"
                                                            class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" />
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="btn-floating btn-fb mx-1">
                                                        <img src="{{asset('public/resource/img/cm/platinum.png')}}"
                                                            class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" />
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="btn-floating btn-fb mx-1">
                                                        <img src="{{asset('public/resource/img/cm/ms.png')}}"
                                                            class="img-circle avatar center"
                                                            style="width: 50px; height: 50px;" />
                                                    </a>
                                                </li>
                                            </ul>

                                        </div>
                                    </footer>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<script>
    $.ajax({
        //other parameters
        success: function () {
        $("#id_footerr").addClass('fixed-bottom');
        }
        });
</script>

@endsection