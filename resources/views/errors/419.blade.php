@extends('errors::minimal')

@section('content')
<div class="text-center p-5">
    <img src="{{asset('msi/img/419.svg')}}" alt="Error" width="500px">
    <br>
    <a href="#" class="btn btn-lg btn-block" onclick="window.history.back()"
        style="background: #664E41; font-weight:bold; color:white">Back To Main</a>
</div>
@endsection