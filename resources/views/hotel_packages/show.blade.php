@extends('layouts.frontend')

@section('content')
 <!--==================== HOME ====================-->
 <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
          @foreach($hotel_package->hotel_galleries as $gallery)
            <section class="islands swiper-slide">
              <img src="{{ Storage::url($gallery->images) }}" alt="" class="islands__bg" />

              <div class="islands__container container">
                <div class="islands__data">
                  <h2 class="islands__subtitle">Explore</h2>
                  <h1 class="islands__title">{{ $gallery->name }}</h1>
                </div>
              </div>
            </section>
          @endforeach
          </div>
        </div>

        <!--========== CONTROLS ==========-->
        <div class="controls gallery-thumbs">
          <div class="controls__container swiper-wrapper">
           @foreach($hotel_package->hotel_galleries as $gallery)
            <img
              src="{{ Storage::url($gallery->images) }}"
              alt=""
              class="controls__img swiper-slide"
            />
           @endforeach
          </div>
        </div>
      </section>

      <section class="blog section" id="blog">
        <div class="blog__container container">
          <div class="content__container">
            <div class="blog__detail">
            {!! $hotel_package->description !!}
            </div>
            <div class="package-travel">
              <h3>Booking Now</h3>
              <div class="card">
                <form action="{{ route('hotel_booking.store') }}" method="post">
                  @csrf
                  <input type="hidden" name="hotel_package_id" value="{{ $hotel_package->id }}">
                  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                  <input type="hidden" name="name" placeholder="Your Name" value="{{Auth::user()->name}}"/>
                  <input type="hidden" name="email" placeholder="Your Email" value="{{Auth::user()->email}}"/>
                  <input type="number" name="number_phone" placeholder="Your Number" />
                  <input
                    placeholder="Pick Your Date"
                    class="textbox-n"
                    type="text"
                    name="date"
                    onfocus="(this.type='date')"
                    id="date"
                  />
                  <button type="submit" class="button button-booking">Send</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section" id="popular">
        <div class="container">
          <span class="section__subtitle" style="text-align: center"
            >Package Travel</span
          >
          <h2 class="section__title" style="text-align: center">
            The Best Tour For You
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
                  <h2 class="popular__price"><span>$</span>{{ number_format($hotel_package->price,2) }}</h2>
                  <h3 class="popular__title">{{ $hotel_package->location }}</h3>
                  <p class="popular__description">{{ $hotel_package->type }}</p>
                </div>
              </a>
            </article>
            @endforeach
          </div>
        </div>
      </section>

      <section class="customer review" id="review">
        <a href="{{ route('reviews.show') }}">Customer Reviews</a>
        @if ($errors->any())
        <div class="alert alert-danger">
             <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
             </ul>
        </div>
        @endif

    <form class="comment-form" action="{{ route('reviews.store') }}" method="post">
         @csrf

         <div class="form-group" style="margin-top: 20px;">
            <textarea id="comment" name="comment" rows="4" required placeholder="Leave your comment here">{{ old('comment') }}</textarea>
        </div>


         <button type="submit">Submit Review</button>
    </form>
        <div style="margin-top: 50px;">
            <a>Ratings & Reviews</a>
            @if($reviews->isEmpty())
            <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                <p>No rating and review yet</p>
            </div>
        @endif
        </div>
            <ul class="review-list">
                @foreach ($reviews as $review)
                <li>
                    <p class="reviewer">{{ $review->user->name }}</p>
                    <p>{{ $review->comment }}</p>
                </li>
            @endforeach
            </ul>
    </section>

    @if(session()->has('message'))
      <div id="alert" class="alert">
        {{ session()->get('message') }}
        <i class='bx bx-x alert-close' id="close"></i>
      </div>
    @endif
@endsection

@push('style-alt')
<style>
  .alert {
    position:absolute;
    top: -300px;
    left:0;
    right:0;
    background-color: var(--second-color);
    color: white;
    padding: 1rem;
    width: 70%;
    z-index: 99;
    margin: auto;
    border-radius: .25rem;
    text-align: center;
  }

  .alert-close {
    font-size: 1.5rem;
    color: #090909;
    position: absolute;
    top: .25rem;
    right: .5rem;
    cursor: pointer;
  }
  blockquote {
    border-left: 8px solid #b4b4b4;
    padding-left: 1rem;
  }
  .blog__detail ul li {
    list-style: initial;
  }

  .customer.review {
  left: 50%;
  transform: translateX(20%);
  width: 70%;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
}

/* Link for "Customer Reviews" */
.customer.review a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
}

/* Styling for error messages */
.alert.alert-danger {
  background-color: #f2dede;
  border-color: #eed3d7;
  color: #a94442;
  padding: 15px;
  margin-bottom: 20px;
}

/* Form styling */
.comment-form {
  width: 100%;
}

.comment-form label {
  display: block;
  margin-bottom: 5px;
}

.comment-form textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: none; /* Prevent resizing */
}

.comment-form button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

@media (max-width: 768px) {
  .comment-form textarea {
    width: 80%;
  }
}

.review-list {
  list-style: none;
  padding: 0;
  margin-bottom: 20px;
}

.review-list li {
  margin-bottom: 15px;
  padding: 15px;
  border-radius: 5px;
  background-color: #f5f5f5;
}

.review-list p {
  margin-bottom: 5px;
  font-size: 16px;
  line-height: 1.5;
}

.review-list p:last-child {
  margin-bottom: 0;
}

#review {
  opacity: 0;
  transition: opacity 1s ease-in-out;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
</style>
@endpush

@push('script-alt')
<script>
      let galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 0,
        slidesPerView: 0,
      });

      let galleryTop = new Swiper('.gallery-top', {
        effect: 'fade',
        loop: true,

        thumbs: {
          swiper: galleryThumbs,
        },
      });

      const close = document.getElementById('close');
      const alert = document.getElementById('alert');
      if(close) {
        close.addEventListener('click', function() {
          alert.style.display = 'none';
        })
      }

      window.onload = function() {
        document.getElementById('review').style.opacity = 1;
        };

    </script>
@endpush
