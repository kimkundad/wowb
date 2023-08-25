@extends('layouts.template')


@section('title')
Kingbar สูตรบาร์ที่ดีที่สุดและแม่นยำที่สุดในไทย อันดับ 1
@stop

@section('stylesheet')

<style>
    .col-4-new {
    padding-right: 2px !important;
    padding-left: 2px !important;
    min-height: 90px;
    margin-bottom: 15px;
}
.text-racking-room-p4 {
    font-size: 16px;
    color: #fff;
    top: 10%;
    left: 53%;
    transform: translate(-50%, 0);
    position: absolute;
    text-align: center;
    text-shadow: 2px 2px #000;
}
@media (max-width: 768px)
{
    .text-racking-room-p4 {
    font-size: 26px;
    color: #fff;
    top: 14%;
    left: 48%;
    position: absolute;
    text-align: center;
    text-shadow: 2px 2px #000;
    }
}
@media (max-width: 420px)
{
    .text-racking-room-p4 {
    font-size: 20px;
    color: #fff;
    top: 12%;
    left: 50%;
    position: absolute;
    text-align: center;
    text-shadow: 2px 2px #000;
}
}
.set-room-po1{
    position: relative;
}
</style>

@stop('stylesheet')

@section('content')

@php

                                            $now = time(); // or your date as well
                                            $your_date = strtotime(Auth::user()->birthday);
                                            $datediff = $your_date - $now;
                                            $sumday = round($datediff / (60 * 60 * 24));
                                            if($sumday < 0){
                                              $sumday = 0;
                                            }
                     @endphp

<div class="row header-image p-0 m-0">
    <div class="col-6 col-sm-6 col-md-4 p-0">
        <img style="top: 0; height: 75%" src="{{ url('/assets/wow_banner-24abf6f1f41bfde12615a4ff6fdc0afbae8476ec3245102d91d4bb21cfd83c0e.png') }}">
    </div>
    <div class="col-3 col-sm-3 col-md-4 text-center p-0 mt-1">
      <b>{{ Auth::user()->username }}</b><br>
    <b>เหลือ {{$sumday}} วัน</b>
    </div>
    <div class="col-3 col-sm-3 col-md-4 text-right p-0 m-0">
      <div class="dropdown">
        <img style="height: 55px" data-toggle="dropdown" src="{{ url('/assets/ic_menu-57f347d85a6b34c11226f70ef0f23e445706541f96c09ae47ce9fb0d2571058e.png') }}">
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a href="{{ url('rooms?casino='.$game->game_name_short.'&formula=1') }}" class="dropdown-item">สูตร เค้าไพ่ A</a>
          <a href="{{ url('rooms?casino='.$game->game_name_short.'&formula=2') }}" class="dropdown-item">สูตร เค้าไพ่ B</a>
          <a href="{{ url('rooms?casino='.$game->game_name_short.'&formula=3') }}" class="dropdown-item">สูตร เค้าไพ่ C</a>
        </div>
      </div>
    </div>
</div>

 
<div class="wrapper">


    <div id="content" class="active">
      

      @if($formula == 1)
      <div class="bg-f1">
        <div class="row p-0 m-0">
          <div class="col-6 p-0 m-0">
            <a  href="{{ url('/') }}">
              <img style="height: 40px" src="{{ url('/assets/ic_back_to_casino-6833567b632e183aa4518753dafc1b3abdfea8434cd5000b3418a19d181b39b1.png') }}">
            </a>
          </div>
        <div class="col-6">
        </div>
        </div>

        <div class="container h100">
          <div class="row" style="padding-top: 50px; padding-left: 50px; padding-right: 50px;">

            @if(isset($objs))
            @foreach($objs as $u)
              <div class="col-sm-12 col-md-4 col-lg-3">
                  <div class="image-container p-3">
                  <div id="room-percent-{{ $u->room }}" class="room-percent-center">{{ $u->percent }}%</div>
                  <a data-remote="true" class="onsendroom" data-casinox="{{$u->casino}}" data-roomx="{{$u->room}}">
                  <img class="w-100" src="{{ url('images/game/room/'.$game->room_image) }}">
                  <p class="text-racking-room-p4">{{ $u->room }} </p>
                  </a> 
                  </div>
              </div>
            @endforeach
            @endif

          </div>
        </div>
      </div>
      @endif


      @if($formula == 2)
      <div class="bg-f2">
        <div class="row p-0 m-0">
          <div class="col-6 p-0 m-0">
            <a  href="{{ url('/') }}">
              <img style="height: 40px" src="{{ url('/assets/ic_back_to_casino-6833567b632e183aa4518753dafc1b3abdfea8434cd5000b3418a19d181b39b1.png') }}">
            </a>
          </div>
        <div class="col-6">
        </div>
        </div>

        <div class="container h100">
          <div class="row" style="padding-top: 50px; padding-left: 50px; padding-right: 50px;">

            @if(isset($objs))
            @foreach($objs as $u)
              <div class="col-sm-12 col-md-4 col-lg-3">
                  <div class="image-container p-3">
                  <div id="room-percent-{{ $u->room }}" class="room-percent-center">{{ $u->percent }}%</div>
                  <a data-remote="true" class="onsendroom" data-casinox="{{$u->casino}}" data-roomx="{{$u->room}}">
                  <img class="w-100" src="{{ url('images/game/room/'.$game->room_image2) }}">
                  <p class="text-racking-room-p4">{{ $u->room }} </p>
                  </a> 
                  </div>
              </div>
            @endforeach
            @endif

          </div>
        </div>
      </div>
      @endif


      @if($formula == 3)
      <div class="bg-f3">
        <div class="row p-0 m-0">
          <div class="col-6 p-0 m-0">
            <a  href="{{ url('/') }}">
              <img style="height: 40px" src="{{ url('/assets/ic_back_to_casino-6833567b632e183aa4518753dafc1b3abdfea8434cd5000b3418a19d181b39b1.png') }}">
            </a>
          </div>
        <div class="col-6">
        </div>
        </div>

        <div class="container h100">
          <div class="row" style="padding-top: 50px; padding-left: 50px; padding-right: 50px;">

            @if(isset($objs))
            @foreach($objs as $u)
              <div class="col-sm-12 col-md-4 col-lg-3">
                  <div class="image-container p-3">
                  <div id="room-percent-{{ $u->room }}" class="room-percent-center">{{ $u->percent }}%</div>
                  <a data-remote="true" class="onsendroom" data-casinox="{{$u->casino}}" data-roomx="{{$u->room}}">
                  <img class="w-100" src="{{ url('images/game/room/'.$game->room_image3) }}">
                  <p class="text-racking-room-p4">{{ $u->room }} </p>
                  </a> 
                  </div>
              </div>
            @endforeach
            @endif

          </div>
        </div>
      </div>
      @endif

    </div>
</div>


<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">กรุณากรอกรายละเอียด</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <input type="hidden" id="selectedRoom">
              <div class="form-group">
              <label for="funding" class="col-form-label">ใส่เงินทุน:</label>
              <input type="number" id="funding" class="form-control" min="0" data-bind="value:replyNumber">
              </div>
              <div class="form-group">
              <label for="profit" class="col-form-label">ใส่กำไร:</label>
              <input type="number" id="profit" class="form-control" min="0" data-bind="value:replyNumber">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" id="formModalSubmit">ข้าม</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-primary" id="formModalSubmit">ตกลง</button>
          </div>
        </div>
    </div>
</div>


<div class="modal fade" id="loadingModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style="background-color: transparent;">
            <div class="modal-body" id="modalBody">
                <div class="row">
                  <div class="col-12">
                    <div class="loader">Loading...</div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="white text-center">
                            <span id="loadingMessage">กำลังวิเคราะห์ผลห้อง 1 ...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="notReadyModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style="background-color: transparent;">
            <div class="modal-body" id="modalBody">
                <div class="row">
                  <div class="col-12">
                    <div class="loader">ปรับปรุงระบบ...</div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">

var selectedRoom = 0;
var room = '';

$(document).ready(function() {
  randomPercent();
  setInterval(function() {
    randomPercent();
  }, 60 * 1000);

  let mycasinoz
  let myroomz
  
  $('.onsendroom').on('click', function () {
    var $el = $(this);
    console.log($el.data('casinox'), $el.data('roomx'));

    mycasinoz = $el.data('casinox')
    myroomz = $el.data('roomx')

    $('#formModal').modal('show');

    // $("#loadingMessage").text("กำลังวิเคราะห์ผลห้อง " + $el.data('roomx') + " ...");
    // $('#loadingModal').modal('show');
    // setTimeout(function() {
    //   hideModal('#loadingModal');
    //   window.location = '{{ url('/')}}/game-room-' + $el.data('casinox') + '-' + $el.data('roomx')
    // }, 5000);

  });

  $('#formModal').on('click', '#formModalSubmit', function (e) {
    let funding = $('#funding').val();
    let profit = $('#profit').val();
    hideModal('#formModal');

    let casino = "{{$game->game_name_short}}";

    $("#loadingMessage").text("กำลังวิเคราะห์ผลห้อง " + myroomz + " ...");
    $('#loadingModal').modal('show');
    setTimeout(function() {
      hideModal('#loadingModal');
      window.location = '{{ url('/')}}/game-room-' + mycasinoz + '-' + myroomz + '?formula={{$formula}}'
    }, 5000);
});

function randomPercent() {
  $.ajax("{{ url('/rooms/room_percents?casino='.$game->game_name_short) }}", {
    contentType: 'application/json',
    dataType: 'json',
    success: function (data) {
      console.log(data);
      let roomIds = $("[id^='room-percent-']").map(function() {
        return this.id;
      }).get();
      for (var i = 0; i < roomIds.length; i++) {
        let percent = getRandomInt(75,100)
        $('#' + roomIds[i]).html('' + percent + '%');
      }
    },
  });
}

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function hideModal(id) {
  $(id).modal('hide');
  $('body').removeClass('modal-open');
  $('.modal-backdrop').remove();
}
});

</script>


@stop('scripts')