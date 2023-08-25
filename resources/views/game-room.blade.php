@extends('layouts.template')


@section('title')
Kingbar สูตรบาร์ที่ดีที่สุดและแม่นยำที่สุดในไทย อันดับ 1
@stop

@section('stylesheet')

<style>
    .progress {
    border-radius: 0.25rem;
    overflow: visible;
    background-color: rgb(255 255 255);
}
.text-racking-room-p4 {
    font-size: 16px;
    color: #fff;
    top: 15%;
    left: 53%;
    transform: translate(-50%, 0);
    position: absolute;
    text-align: center;
    text-shadow: 2px 2px #000;
}
.room-small{
  font-size: 23px;
    color: #fff;
    top: 5%;
    left: 50%;
    transform: translate(-50%, 0);
    position: absolute;
    text-align: center;
    text-shadow: 2px 2px #000;
}
@media (max-width: 580px)
{
  .room-small{
  font-size: 18px;
    color: #fff;
    top: 5%;
    left: 50%;
    transform: translate(-50%, 0);
    position: absolute;
    text-align: center;
    text-shadow: 2px 2px #000;
}
}
@media (max-width: 420px)
{
  .room-small{
  font-size: 14px;
    color: #fff;
    top: 5%;
    left: 50%;
    transform: translate(-50%, 0);
    position: absolute;
    text-align: center;
    text-shadow: 2px 2px #000;
}
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

.box-game {
    color: #fff;
    padding-top: 8px;
    padding-bottom: 8px;
    padding-left: 5px;
    padding-right: 5px;
    background-size: 100% 100%;
    height: 100px;
    width: 70px;
}
</style>

@stop('stylesheet')

@section('content')
<audio loop="" id="sound">

  <source src="{{ url('/assets/song2.mp3') }}" type="audio/mp3">
  
  
  </audio>

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
        <a class="dropdown-item" rel="nofollow" data-method="delete" href="{{ url('/logout') }}">ออกจากระบบ</a>
      </div>
    </div>
  </div>
</div>


@if($formula == 1)
<div class="bg-f1 h100">
@endif
@if($formula == 2)
<div class="bg-f2 h100">
@endif
@if($formula == 3)
<div class="bg-f3 h100">
@endif

    <div class="bg-game-container h100">
        <div class="row">
          <div class="col-6 pt-0 mt-0">
            <a href="{{ url('rooms?casino='.$game->game_name_short.'&formula=1') }}">
              <img style="height: 40px" src="{{ url('/assets/ic_back-ba319d415f91d52b251fc785b6768e18ba9a434d4fa0ebaaa8d5d41cc7afe097.png') }}">
            </a>
          </div>
          <div class="col-6 text-right">
            <button id="song" type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" onclick=" togglePlayMusic()">
            Play Song
            </button>
            <a class="btn btn-primary" href="{{ url('/how_to_play') }}">
              วิธีการใช้สูตร
            </a>
          </div>
        </div>

  <div class="row" style="margin-top: 50px;">
      <div class="col-4">
      </div>
        <div class="col-7 text-right">
          <button id="back-button" type="button" class="btn btn-link" style="color: white; font-size: 16px;">
            <img style="height: 30px; width: 30px;" src="{{ url('/assets/ic_online_dot-85b57b34151a8ed6191a1bba9d073566f5ed0ac29e41d4045fb6c47d9dc29db9.png') }}">
            <b id="online-user"> ออนไลน์ (0 คน)</b>
          </button>
        </div>
  <div class="col-1"></div>
  </div>
  
  <div class="row mt-3">
  <div class="col-0 col-md-1 text-center"></div>
  <div class="col-12 col-md-4 text-center">
  
  <div class="row">
  <div class="col-2 col-md-2 p-0"></div>
  <div class="col-5 col-md-5 p-0">
  <img id="coin" class="coin mx-auto flip" src="{{ url('/assets/ic_b-e32e48e93401c9528e867ba4e89811613f1c01064298bc19bb3ad9e922bf15f2.png') }}">
  </div>
  <div class="col-1 col-md-1 p-0"></div>
  <div class="col-3 col-md-2 p-0 my-auto">
  <div class="row justify-content-center mr-1">
  <div class="box-game justify-content-center text-center">
  <div style="font-size: 10px">
  sexy 02
  </div>
  <div id="round-count" style="font-size: 10px; margin-top: 20px">ครั้งที่ 3</div>
  <div id="round" style="font-size: 10px; margin-top: 20px">รอบที่ 1</div>
  </div>
  </div>
  
  </div>
  </div>
  <div class="row">
  <div class="col-12">
  <img id="ecoin1" src="{{ url('/assets/ic_pp_d-ec1ca28ff5c5fb98d30c38564ec83870c413603e7c7b90c87821dcb8579db7ca.png') }}">
  <img id="ecoin2" src="{{ url('/assets/ic_bb_d-010e78bc0f2f6a6a58bbb51ee0e88591ef927b0dfcc066ed63d1997ab040553c.png') }}">
  <img id="ecoin3" src="{{ url('/assets/ic_tie_d-ac25c2344fd4c35d32b3174f634608566fe0f849837ef71de92ea214fe2430e0.png') }}">
  <img id="ecoin4" src="{{ url('/assets/ic_9_d-5914c9e4cf6416418c0f1b172bda7e3ada3542a3e0a3b16aaa596419cce61d18.png') }}">
  <img id="ecoin5" src="{{ url('/assets/ic_9_d-5914c9e4cf6416418c0f1b172bda7e3ada3542a3e0a3b16aaa596419cce61d18.png') }}">
  </div>
  </div>
  
  
  <div class="progresss" style="margin-top: 32px; margin-bottom: 55px; margin-left: 40px; margin-right: 40px;">
  <div class="progress-bar" style="width: 93%; background: yellow;" aria-valuenow="93">
  <span class="progress-icon fa fa-check" style="border-color: yellow; color: yellow;"></span>
  <div class="progress-value">93%</div>
  </div>
  </div>
  
    <div class="row p-0" style="margin-left: 40px; margin-right: 40px;">
      <div class="col pl-0">
          <img onclick=" nextCoin()" class="img-fluid w-100 h-100" src="{{ url('/assets/next-ff83cc85b42ded6108d66c35dec1b757573c1b926eedf1872e8519ca7a0f11f6.png') }}">
      </div>
      <div class="col p-0 m-0">
          <img onclick=" equal()" class="img-fluid w-100 h-100" src="{{ url('/assets/equal-4ebfd4770389edc6150b218f1192a7054452afbb1ee1598453a9e60e3cd21b40.png') }}">
      </div>
      <div class="col pr-0">
          <img onclick=" win()" class="img-fluid w-100 h-100" src="{{ url('/assets/success-ff17868c802c02ce0f868719c995db47ad1eea6f1b510d7c28e2deb958fa8801.png') }}">
      </div>
    </div>

  </div>
  <div class="col-0 col-md-1 p-0"></div>
  
  
  
  <div class="col-1 d-md-none"></div>
  <div class="col-10 col-md-3">
  <div class="row justify-content-center">
  <label class="white">สถิติ</label>
  </div>
  <div class="col-1 col-md-3"></div><div class="modal fade" id="winModal" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content align-items-center" style="background-color: transparent;">
  <img style="width: 350px; height: auto;" src="{{ url('/assets/win-cd7d9fd492988711d4e420eb22f905bd18bd5f6c8dcfade335394687a9b14c01.png') }}">
  <div class="row">
  <button id="back-button" type="button" class="btn btn-warning" data-dismiss="modal" style="color: white; font-size: 16px;">ไปต่อ &gt;</button>
  </div>
  </div>
  </div>
  </div><div class="modal fade" id="loseModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content align-items-center" style="background-color: transparent;">
  <img style="width: 200px; height: 200px;" src="{{ url('/assets/lose-0332fb8243f71ee2b94e612e05eb012375ffc429be0a865e1e43a7c990253d52.gif') }}">
  <div class="row">
  <button id="back-button" type="button" class="btn btn-warning" data-dismiss="modal" style="color: white; font-size: 16px;" onclick=" playMusic()">ไปต่อ &gt;</button>
  </div>
  </div>
  </div>
  </div>
  
  <table class="table" id="tableResults" style="border-color: transparent;">
  <tbody>
      
    </tbody>
    </table>
  </div>
</div>
</div>
</div>
  
  
  
  
  


  <div class="modal fade" id="winModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content align-items-center" style="background-color: transparent; border: 0">
            <img class="modal-result-win" src="{{ url('img/win-9ce8ea56315187a530eb4add5a04748ba10fe656545124070cd1068ee68d5cb3.png') }}" alt="Win">
        </div>
      </div>
  </div>


  <div class="modal fade" id="loseModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content align-items-center" style="background-color: transparent;">
            <img class="modal-result-lose" onclick="forceReset()" src="{{ url('img/reset-c4d864fb1105e9afaf36dd5a7d8e4d7aa264c7b21e91a3d82d6a190fe7297488.png') }}" alt="Reset">
            <img class="modal-result-lose" onclick="restart()" src="{{ url('img/restart-6586febbec0d90aba184ff042f34eca245e6f3875fbcd292f374ede190483e16.png') }}" alt="Restart">
          </div>
        </div>
  </div>


  <div class="modal fade" id="loadingModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
          <div class="modal-content" style="background-color: transparent; border: 0">
            <div class="modal-body" id="modalBody">
              <div class="row">
                <div class="col-12">
                  <div class="loader">Loading...</div>
                </div>
              </div>
            <div class="row">
              <div class="col-12">
                <div class="white text-center">
                  <h1 id="loadingMessage">กำลังวิเคราะห์ผลห้อง 1 ...</h1>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
  </div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>


<script type="text/javascript">



  var casino = "";
  var room = 1;
  var round = 1;
  var coinRound = 1;
  var resultRound = undefined;
  var coin = '';
  var numberOfCoin = 5;
  var shouldIgnore = false;
  var previousCoin = '';
  var sameCoinCount = 0;

  $(document).ready(function() {

    randomOnlinePercent();
    setInterval(function(){ 
      randomOnlinePercent();
    }, 60 * 1000);

    $("#wait").hide();

    casino = "sexy";
    $('#sidebar').toggleClass('active');
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $('#bet').val("");
    calculateBet();
    randomCoin();
    randomPercent();
  });

  function randomOnlinePercent() {
    $.ajax("{{ url('/api/game/online_user') }}", {
      contentType: 'application/json',
      dataType: 'json',
      success: function (data) {
        $("#online-user").html('จำนวนผู้ใช้งาน ' + data.count);
        $("#m-online-user").html('จำนวนผู้ใช้งาน ' + data.count);
      },
    });
  }

  function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  function win() {
    $('#winModal').modal('show');
    addRow('WIN');
    reset();
    nextRound();
    // randomExtraCoin();
  }

  function lose() {
    if (coinRound == 4) {
      $('#loseModal').modal('show');
      reset();
      addRow('LOSE');
      nextRound();
      // randomExtraCoin();
    }
  }

  function equal() {
    randomCoin();
    randomPercent();
  }

  function nextRound() {
    // playMusic();
    if (!shouldIgnore) {
      round += 1;
      randomExtraCoin();
    } else {
      shouldIgnore = false;
    }
  }

  function nextCoin() {
    if (coinRound < 4) {
      coinRound += 1;

      var obj = $('#round').text('รอบที่ ' + coinRound);
      // obj.html(obj.html().replace(/\n/g,'<br/>'));

      randomCoin();
      randomPercent();
    } else {
      coinRound = 1;
      reset();
      addRow('LOSE');
      nextRound();
      $('#loseModal').modal('show');
    }
  }

  function randomCoin() {
    // var randomHasExtraCoin = getRandomInt(1, 100);
    // if (randomHasExtraCoin % 10 == 0) {
    //   shouldIgnore = true;
    //   $("#coin").attr("src" , "/assets/ic_w-7db086323a58a2bafe9d11fd1906b9b6bb7ae0740fe97bc6762e43f64cc2b913.png" );
    //   $("#wait").show();
    // } else {
    //   $("#wait").hide();
      if (this.casino == "m168_2" || this.casino == "m168_3") {
        var random = Math.floor(Math.random() * numberOfCoin) + 1;
        if (previousCoin == random) {
          sameCoinCount += 1;
          if (sameCoinCount == 4) {
            random = Math.floor(Math.random() * numberOfCoin) + 1;
            previousCoin = random;
            sameCoinCount = 0;
          }
        } else {
          previousCoin = random;
          sameCoinCount = 0;
        }
        if (random == 1) {
          $('#coin').attr("src" , "{{ url('/assets/one-f141c683e00a13511c5e4ee18ce8bd96c75a413d292e986ed4d56016c6ea5b5a.png') }}" );
        } else if (random == 2) {
          $('#coin').attr("src" , "{{ url('/assets/two-b84aa6699477bd66ff7c94c06e0ac822a8d38cde300fcbf46e553e8260ee0661.png') }}" );
        } else if (random == 3) {
          $('#coin').attr("src" , "{{ url('/assets/three-9575cc88960f2876ef73cdb164b1870711dda1ec8341581a3cb2fcc41269ed9d.png') }}" );
        } else if (random == 4) {
          $('#coin').attr("src" , "{{ url('/assets/four-43ae6dbb272717fb63d7a08811f3630ead6f1e881fde7b3106d1c25a851de05b.png') }}" );
        } else if (random == 5) {
          $('#coin').attr("src" , "{{ url('/assets/five-846fb922c794a470d83055f229f8d02ded52c85c91d520a04946bb787c8fb3d2.png') }}" );
        }
      } else {
        var random = Math.floor(Math.random() * 10)
        coin = random % 2 == 0 ? 'B' : 'P';
        if (previousCoin == coin) {
          sameCoinCount += 1;
          if (sameCoinCount == 4) {
            if (coin == 'B') {
              coin = 'P';
            } else {
              coin = 'B';
            }
            previousCoin = coin;
            sameCoinCount = 0;
          }
        } else {
          previousCoin = coin;
          sameCoinCount = 0;
        }
        if (coin == 'B') {
          $('#coin').attr("src" , "{{ url('/assets/ic_b-e32e48e93401c9528e867ba4e89811613f1c01064298bc19bb3ad9e922bf15f2.png') }}" );
        } else {
          $('#coin').attr("src" , "{{ url('/assets/ic_p-6775e3f4c6e216c0dfd57271356c528114f15def28fabdce7ccc935d771ec772.png') }}" );
        }
      }
    // }
  }

  function randomExtraCoin() {
    $("#ecoin1").attr("src" , "{{ url('/assets/ic_pp_d-ec1ca28ff5c5fb98d30c38564ec83870c413603e7c7b90c87821dcb8579db7ca.png') }}" );
    $("#ecoin2").attr("src" , "{{ url('/assets/ic_bb_d-010e78bc0f2f6a6a58bbb51ee0e88591ef927b0dfcc066ed63d1997ab040553c.png') }}" );
    $("#ecoin3").attr("src" , "{{ url('/assets/ic_tie_d-ac25c2344fd4c35d32b3174f634608566fe0f849837ef71de92ea214fe2430e0.png') }}" );
    $("#ecoin4").attr("src" , "{{ url('/assets/ic_9_d-5914c9e4cf6416418c0f1b172bda7e3ada3542a3e0a3b16aaa596419cce61d18.png') }}" );
    $("#ecoin5").attr("src" , "{{ url('/assets/ic_9_d-5914c9e4cf6416418c0f1b172bda7e3ada3542a3e0a3b16aaa596419cce61d18.png') }}" );

    var randomHasExtraCoin = getRandomInt(1, 100);
    if (randomHasExtraCoin % 5 == 0) {
      var randomExtraCoin = getRandomInt(1, 5);
      if (randomExtraCoin == 1 && coin != 'P') {
        $("#ecoin1").attr("src" , "{{ url('/assets/ic_pp-0116f8503855c875da1d884ee5a0e965f6cbc844b3df456a6642e0d9d8ef0df7.png') }}" );
      } else if (randomExtraCoin == 2 && coin != 'B') {
        $("#ecoin2").attr("src" , "{{ url('/assets/ic_bb-5eae9c0b16ac0aa779c5a22461cd3c45aedefd6a7bc09374fbe9aa301165fdb5.png') }}" );
      } else if (randomExtraCoin == 3) {
        $("#ecoin3").attr("src" , "{{ url('/assets/ic_tie-79b57425c0f8f08aae2605dc48313a21cb4b113a7bf0c0eccda77fdd91fefb51.png') }}" );
      } else if (randomExtraCoin == 4 && coin != 'P') {
        $("#ecoin4").attr("src" , "{{ url('/assets/ic_9_red-b134660d2d90da6333ac6d87b967ef4fde2b6c89a83e1bc17782fa9afecc8de8.png') }}" );
      } else if (randomExtraCoin == 5 && coin != 'B') {
        $("#ecoin5").attr("src" , "{{ url('/assets/ic_9_blue-c23c953747508f13f258da2fd049c1c813124a55b05197348010f1906d44f316.png') }}" );
      }
    }
  }

  function randomPercent() {
    var random = getRandomInt(75, 99);
    // $('#percent').text(random + '%');
    $('.progress-bar').attr('aria-valuenow', random).css('width', random + '%');
    $('.progress-value').text(random + '%');
  }

  function addRow(status) {
    if (casino == "sexy" || casino == "gtm") {
      var newRow = $('<tr id="row' + round + '" class="' + (status == 'WIN' ? 'box-win-pink' : 'box-lose') + '">');
    } else if (casino == 'm168') {
      var newRow = $('<tr id="row' + round + '" class="' + (status == 'WIN' ? 'box-win-m168' : 'box-lose') + '">');
    } else if (casino == 'allbet') {
      var newRow = $('<tr id="row' + round + '" class="' + (status == 'WIN' ? 'box-win-allbet' : 'box-lose') + '">');
    } else if (casino == 'ebet') {
      var newRow = $('<tr id="row' + round + '" class="' + (status == 'WIN' ? 'box-win-ebet' : 'box-lose') + '">');
    } else if (casino == 'wm') {
      var newRow = $('<tr id="row' + round + '" class="' + (status == 'WIN' ? 'box-win-wm' : 'box-lose') + '">');
    } else if (casino == 'world' || casino == 'bg') {
      var newRow = $('<tr id="row' + round + '" class="' + (status == 'WIN' ? 'box-win-blue' : 'box-lose') + '">');
    } else if (casino == 'm168_2' || casino == 'm168_3') {
      var newRow = $('<tr id="row' + round + '" class="' + (status == 'WIN' ? 'bg-win-m168' : 'box-lose') + '">');
    } else {
      var newRow = $('<tr id="row' + round + '" class="' + (status == 'WIN' ? 'box-win' : 'box-lose') + '">');
    }
    var cols = "<td class='text-center' style='border: 0px'><img src='{{ url('/assets/ic_spade-eb6cc1e60a4a18eeffa1e32fa718ab877774e14d16f8a6f71bdda343e1cc1fe7.gif') }}' style='width: 22px; height: 22px;'> ผลการลงทุนรอบที่ " + round + " <img src='{{ url('/assets/ic_spade-eb6cc1e60a4a18eeffa1e32fa718ab877774e14d16f8a6f71bdda343e1cc1fe7.gif') }}' style='width: 22px; height: 22px;'></td>";
    // cols += '<td class="text-left"><b>' + coin + '</b></td>';
    cols += '<td class="text-center" style="border: 0px"><b>' + status + '</b></td>'
          + '</td></tr>';
    newRow.append(cols);
    // newRow.prependTo("table > tbody");
    $('#tableResults > tbody').append(newRow);

    $('#round-count').text('ครั้งที่ ' + (round + 1));
  }

  function reset() {
    coinRound = 1;
    var obj = $('#round').text('รอบที่ ' + coinRound);
    // obj.html(obj.html().replace(/\n/g,'<br/>'));

    randomCoin();
    randomPercent();
  }

  function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  function calculateBet() {
    var bet = $('#bet').val();
    bet = bet * 0.1;
    bet = Math.floor(bet);
    bet = bet * 10;
    var round1 = Math.floor(bet / 15);
    var round2 = round1 * 2;
    var round3 = round2 * 2;
    var round4 = round3 * 2;
    $('#round1').val(round1);
    $('#round2').val(round2);
    $('#round3').val(round3);
    $('#round4').val(round4);
  }

</script>


<script type="text/javascript">

  $(document).ready(function() {
     $('body').bind('copy',function(e) { e.preventDefault(); return false; });
     $('body').bind('paste',function(e) { e.preventDefault(); return false; });

      $('#sidebar').addClass('hidden');
      $('#content').addClass('active');

      $('#sidebarCollapse').on('click', function () {
          $('#sidebar').toggleClass('hidden');
          $('#content').toggleClass('active');
      });
    // var audio = new Audio('/assets/song.mp3');
    // audio.addEventListener('ended', function() {
    //     this.currentTime = 0;
    //     this.play();
    // }, false);
    // var promise = audio.play();
    // if (promise) {
    //     //Older browsers may not return a promise, according to the MDN website
    //     promise.catch(function(error) { console.log(error); });
    // }
    // openSlider('first_luanch')

    // setTimeout(function() {
    //     console.log('112');
    //     var music = document.querySelector('audio');
    //     music.pause();
    //     music.src = "/assets/song.mp3";
    //     music.load();
    //     music.play();
    // }, 3 * 60 * 1000);
  });


  function togglePlayMusic() {
    var song = $('#song').text().trim();
    if (song == 'Play Song' ) {
        playMusic();
        $('#song').text('Stop Song');
      } else {
        stopMusic();
        $('#song').text('Play Song');
      }
  }

  function playMusic() {
    var promise = document.querySelector('audio').play();
    if (promise !== undefined) {
        promise.then(_ => {
            // Autoplay started!
        }).catch(error => {
            // Autoplay was prevented. Show a "Play" button so that user can start playback.
            console.log(error);
        });
        // setTimeout(function() {
        //     console.log('111');
        //     var music = document.querySelector('audio');
        //     music.pause();
        //     music.src = "/assets/song.mp3";
        //     music.load();
        //     music.play();
        // }, 3 * 60 * 1000);
    }
  }

  function stopMusic() {
    var promise = document.querySelector('audio').pause();
    if (promise !== undefined) {
        promise.then(_ => {
            // Autoplay started!
        }).catch(error => {
            // Autoplay was prevented. Show a "Play" button so that user can start playback.
            console.log(error);
        });
    }
  }

  // function openSlider(id) {
  //   const viewer = new Viewer(document.getElementById(id), {
  //     title: false,
  //     toolbar: {
  //       prev: 3,
  //       next: 3,
  //     },
  //   });
  //   viewer.show();
  // }

</script>

@stop('scripts')