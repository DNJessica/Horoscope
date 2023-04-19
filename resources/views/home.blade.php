@extends('layout')
@section('title') Home page @endsection
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<div class="container-fluid pt-5 px-3 px-sm-5 my-5 text-center">
    <h4 class="mb-5 font-weight-bold">Horoscope for today</h4>
    <div class="owl-carousel owl-theme">
        <div class="item first prev">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/pisces.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Pisces</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Pisces"]}}</p>
          </div>
        </div>
        <div class="item show">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/aries.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Aries</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Aries"]}}</p>
          </div>
        </div>
        <div class="item next">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/taurus.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Taurus</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Taurus"]}}</p>
          </div>
        </div>
        <div class="item next">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/gemini.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Gemini</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Gemini"]}}</p>
          </div>
        </div>
        <div class="item next">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/cancer.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Cancer</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Cancer"]}}</p>
          </div>
        </div>
        <div class="item next">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/leo.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Leo</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Leo"]}}</p>
          </div>
        </div>
        <div class="item next">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/virgo.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Virgo</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Virgo"]}}</p>
          </div>
        </div>
        <div class="item next">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/libra.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Libra</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Libra"]}}</p>
          </div>
        </div>
        <div class="item next">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/scorpio.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Scorpio</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Scorpio"]}}</p>
          </div>
        </div>
        <div class="item next">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/sagittarius.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Sagittarius</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Sagittarius"]}}</p>
          </div>
        </div>
        <div class="item next">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/capricorn.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Capricorn</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Capricorn"]}}</p>
          </div>
        </div>
        <div class="item last">
          <div class="card border-0 py-3 px-4">
              <div class="row justify-content-center">
              <img src="{{asset('/images/aquarius.png')}}"  style="height: 30vh; width: auto">
              </div>
              <h6 class="mb-3 mt-2">Aquarius</h6>
              <p class="content mb-2 mx-2 lines">{{$horoscope["Aquarius"]}}</p>
          </div>
        </div>
    </div>
    <a href="https://www.flaticon.com/free-icons/libra" title="libra icons">images by  max.icons - Flaticon</a>
</div>
<script type="text/javascript">
  $(document).ready(function() {

  $('.owl-carousel').owlCarousel({
      mouseDrag:false,
      loop:true,
      margin:2,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:3
          }
      }
  }); 

  $('.owl-prev').click(function() {
      $active = $('.owl-item .item.show');
      $('.owl-item .item.show').removeClass('show');
      $('.owl-item .item').removeClass('next');
      $('.owl-item .item').removeClass('prev');
      $active.addClass('next');
      if($active.is('.first')) {
          $('.owl-item .last').addClass('show');
          $('.first').addClass('next');
          $('.owl-item .last').parent().prev().children('.item').addClass('prev');
      }
      else {
          $active.parent().prev().children('.item').addClass('show');
          if($active.parent().prev().children('.item').is('.first')) {
              $('.owl-item .last').addClass('prev');
          }
          else {
              $('.owl-item .show').parent().prev().children('.item').addClass('prev');
          }
      }
  });

  $('.owl-next').click(function() {
      $active = $('.owl-item .item.show');
      $('.owl-item .item.show').removeClass('show');
      $('.owl-item .item').removeClass('next');
      $('.owl-item .item').removeClass('prev');
      $active.addClass('prev');
      if($active.is('.last')) {
          $('.owl-item .first').addClass('show');
          $('.owl-item .first').parent().next().children('.item').addClass('prev');
      }
      else {
          $active.parent().next().children('.item').addClass('show');
          if($active.parent().next().children('.item').is('.last')) {
              $('.owl-item .first').addClass('next');
          }
          else {
              $('.owl-item .show').parent().next().children('.item').addClass('next');
          }
      }
  });

  });
</script>
@endsection
