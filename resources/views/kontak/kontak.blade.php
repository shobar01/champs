@extends('layouts.layout')
@section('title', 'PT.Champ Resto Indonesia')
@section('content')
@include('modal.m_master')

<div class="container" style="padding-top: 70px;">
    <div class="card-deck mb-3 ">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal"><b>Contact Us ICT Support</b></h4>
            </div>
            <div class="card-body">

                <div class="fw-container">

                    <div class="fw-body">

                        <div class="content">

                            <section id="contact">
                                @foreach ($dfrcntact as $arrycntac)
                                <a
                                    href="https://api.whatsapp.com/send?phone={{$arrycntac['NoHp']}}&text=Nama%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3A%0AOutlet%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3A%0ANo%20Tiket%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3A%0AYang%20di%20tanyakan%20%3A">
                                    <div class='info'>
                                        <div class='boxbari'
                                            style="padding-top: 10px !important; padding-bottom: 10px !important; ">
                                            <h3><i class='ion-social-whatsapp' style="margin-right: 10px;"></i><b>
                                                    {{$arrycntac['NmPic']}}</b></h3>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection