@extends('layouts.template')


@section('title')
wowbaccarat สูตรบาร์ที่ดีที่สุดและแม่นยำที่สุดในไทย อันดับ 1
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')

<div class="container-fluid">
    <div class="row" style="height: 100vh">
    <div class="col-lg-6 col-md-0 col-sm-0 p-0 d-none d-lg-block">
    <img id="bg-left" class="img-fluid w-100 h-100" src="{{ url('/assets/bg_login_l1-b502ab5bffac78b9595c04420ae5dd73033bcc9fc877d3d167f7efd6adca6445.png') }}">
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 p-0">
    <div class="login-container h-100">
    <div class="login-bg h-100">
    <img id="bg-right" class="img-fluid w-100 h-100" src="{{ url('/assets/bg_login_r3-c23de61326bb2b1a00ff852031ccd8c323f8264a9246856b6940274f23e94152.png') }}">
    </div>
    <div class="row h-100">
    <div class="col-1 my-auto"></div>
    <div class="col-10 my-auto">
    <div>
    <img class="mx-auto d-block" src="{{ url('/assets/wow_banner-24abf6f1f41bfde12615a4ff6fdc0afbae8476ec3245102d91d4bb21cfd83c0e.png') }}">
    </div>
    <div class="login-form" >
    <form class="new_user" id="new_user" action="{{ route('login') }}" accept-charset="UTF-8" method="post">
        {{ csrf_field() }}
    <div>
    <input autofocus="autofocus" class="login-input-1" type="text" name="username" value="{{ old('username') }}" id="user_username">
    </div>
    <div>
    <input autocomplete="off" class="login-input-2" type="password" name="password" id="user_password">
    </div>
    <input type="submit" name="commit" value="" class="login-button" >
    </form> </div>
    <div class="row error-message">
    <div class="col my-auto text-center">
    </div>
    </div>
    </div>
    <div class="col-1 my-auto"></div>
    </div>
    </div>
    </div>
    </div>
    </div>

@endsection

@section('scripts')

    <script>
        function myFunction() {
            document.getElementById("new_user").submit();
        }
</script>

<script type="text/javascript">

    $(document).ready(function () {
      var bgLeftRandom = getRandomInt(1, 4);
      if (bgLeftRandom == 1) {
        $("#bg-left").attr("src", "{{ url('/assets/bg_login_l1-b502ab5bffac78b9595c04420ae5dd73033bcc9fc877d3d167f7efd6adca6445.png') }}");
      } else if (bgLeftRandom == 2) {
        $("#bg-left").attr("src", "{{ url('/assets/bg_login_l2-58a3a55fc01f4ee5d983378dd952e5dc774082bddc70f16cc51e00f09c789232.png') }}");
      } else if (bgLeftRandom == 3) {
        $("#bg-left").attr("src", "{{ url('/assets/bg_login_l3-0f797c6e85053dd8da1d1843521f1eb0882792b2556941feef3d730f78a4304e.png') }}");
      }
  
      var bgRightRandom = getRandomInt(1, 4);
      if (bgRightRandom == 1) {
        $("#bg-right").attr("src", "{{ url('/assets/bg_login_r1-32f6a775b5574072c6ff5cd45df48d6d1a36f1c436ce6d9e04de4955b82b1fc2.png') }}");
      } else if (bgRightRandom == 2) {
        $("#bg-right").attr("src", "{{ url('/assets/bg_login_r2-fba817eb7e99b6fc5d99846e93bbe7ef19f25513db311505fd7e6266b666bd99.png') }}");
      } else if (bgRightRandom == 3) {
        $("#bg-right").attr("src", "{{ url('/assets/bg_login_r3-c23de61326bb2b1a00ff852031ccd8c323f8264a9246856b6940274f23e94152.png') }}");
      } else if (bgRightRandom == 4) {
        $("#bg-right").attr("src", "{{ url('/assets/bg_login_r4-873eaf815205b598022f51d2febe7facd34c6fca617ad9c2748acfab8284bc10.png') }}");
      }
    });
  
    function getRandomInt(min, max) {
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }
  
  </script>

  

@stop('scripts')