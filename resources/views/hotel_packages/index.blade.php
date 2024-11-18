@extends('layouts.frontend')

@section('content')
 <!--==================== HOME ====================-->
 <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
            <section class="islands swiper-slide">
              <img src="{{ asset('frontend/assets/img/hotel.jpg') }}" alt="" class="islands__bg" />
            <div class="bg__overlay">
              <div class="islands__container container">
                <div class="islands__data">
                  <h2 class="islands__subtitle">Explore</h2>
                  <h1 class="islands__title">Our Hotel Prices</h1>
                </div>
              </div>
            </div>
            </section>
          </div>
        </div>
      </section>

      <!--==================== POPULAR ====================-->
      <section class="section" id="popular">
        <div class="container">
          <span class="section__subtitle" style="text-align: center">All</span>
          <h2 class="section__title" style="text-align: center">
            Hotel Options
          </h2>

          <div class="popular__all">
            @foreach($hotel_packages as $hotel_package)
                <article class="popular__card">
                <a href="{{ route('hotel_package.show', $hotel_package->slug) }}">
                    <img
                    src="{{ Storage::url($hotel_package->hotel_galleries->first()->images) }}"
                    alt=""
                    class="popular__img"
                    />
                    <div class="popular__data">
                    <h2 class="popular__price"><span>RM </span>{{ number_format($hotel_package->price,2) }}</h2>
                    <h3 class="popular__title">{{ $hotel_package->location }}</h3>
                    <p class="popular__description">{{ $hotel_package->type }}</p>
                    </div>
                </a>
                </article>
            @endforeach
          </div>
        </div>
      </section>
@endsection
