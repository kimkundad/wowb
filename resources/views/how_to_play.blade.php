@extends('layouts.template')


@section('title')
Kingbar สูตรบาร์ที่ดีที่สุดและแม่นยำที่สุดในไทย อันดับ 1
@stop

@section('stylesheet')

<style>
    .parent-flex {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding: 40px calc((100% - (355px * 3)) / 2);
}

.flex-item {
   flex: 0 0 300px;
   margin-bottom: 5px;
}
</style>

@stop('stylesheet')

@section('content')

<div class="bg-game-container" style="">
    <div class="row">
    <div class="col-6 pt-0 mt-0">
    <a href="{{ url('/') }}">
    <img style="height: 40px" src="{{ url('/assets/ic_back_to_casino-6833567b632e183aa4518753dafc1b3abdfea8434cd5000b3418a19d181b39b1.png') }}">
    </a>
    </div>
    </div>
    <div class="text-center mt-3">
    <img style="width: 100%;" src="{{ url('/assets/how_to_play1-2b46f91015bde555e5987fde8df2750bcff4a9c65cf9d49ece941352352a4ed2.jpg') }}">
    </div>
    <div class="text-center">
    <img style="width: 100%;" src="{{ url('/assets/how_to_play2-4aba72eda9820d0f9e5b4530644c846a21a132871a6689ff769f912715510600.jpg') }}">
    </div>
    </div>


@endsection

@section('scripts')

<script type="text/javascript">
    var slider = tns({
      container: '#my-slider',
      // items: 1
      // items: 2.9,
      // gutter: 30,
      // edgePadding: 40,
      // "speed": 500,
      "swipeAngle": false,
      // "autoplay": true,
      // rewind: true,
      // "startIndex": 1,
      // controls: false,
      nav: false,
      // mouseDrag: true,
      // prevButton: document.getElementById('#previous'),
      // nextButton: document.getElementById('#next'),
      prevButton: '#previous',
      nextButton: '#next',
      center: true,
      responsive: {
        500: {
          items: 1
        },
        640: {
          gutter: 20,
          items: 1
        },
        900: {
          items: 1
        }
      }
    });
  </script>

@stop('scripts')