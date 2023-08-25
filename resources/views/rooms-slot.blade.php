@extends('layouts.template')


@section('title')
สูตรบาคาร่า5ดาว
@stop

@section('stylesheet')

<style>
    .col-4-new {
    padding-right: 2px !important;
    padding-left: 2px !important;
    min-height: 90px;
    margin-bottom: 15px;
}
</style>

@stop('stylesheet')

@section('content')


<div class="container-fluid bg-casino">


    <div id="content">
    <div class="row">
    <div class="col-6">
    <img style="height: 80px" src="{{ url('img/logo-2fd1fc0bbf766da18a075f6a6a866ae0ede623df9077e5e6fbdb2616ac07995c.png') }}" alt="Logo">
    </div>
    <div class="col-6"></div>
    </div>
    <div class="row p-0 m-0">
    <div class="col-6">
    <a href="{{ url('/') }}">
    <img style="height: 40px" src="{{ url('img/ic_back_to_casino-e77bb4bc46f17174a7f7f10e01880028fd6acc6fd8e28d8546a4347fe7642ca2.png') }}" alt="Ic back to casino">
    </a>
    </div>
    <div class="col-6">
    </div>
    </div>
    <div class="container h100">
    <div class="row">
        <div class="col-0 col-sm-0 col-md-3 col-lg-4 p-0"></div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 p-0">
            <img class="img-fluid w-100 animate__animated animate__zoomIn" src="{{ url('images/game/game/'.$game->game_image) }}" alt="{{$game->game_name}}">
        </div>
        <div class="col-0 col-sm-0 col-md-3 col-lg-4 p-0"></div>
    </div>
    <div class="row mt-3">

    <div class="col-12 col-sm-12 col-md-6 col-lg-3 p-0 animate__animated animate__slideInLeft" style="animation-delay: 0.0s;">
        <div id="room-percent-E01" class="room-percent-right">87%</div>
        <div class="image-container m-3">
            <a data-remote="true" href="/rooms/check_credit?casino=sa&amp;room=E01">
                <img class="w-100" src="/assets/r_sa_E01-7f0a846035838d6ac96c2f3b9502bb83b872d0ed0c336a1304590882eeb171a7.png" alt="R sa e01">
            </a> 
        </div>
    </div>
    
    </div>
    </div>
    </div>
    </div>


@endsection

@section('scripts')

@stop('scripts')