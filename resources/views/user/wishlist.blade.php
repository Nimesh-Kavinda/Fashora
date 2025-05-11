@extends('layouts.app')

@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <div class="row">
        <div class="col-lg-3">
           <h2 class="page-title">Wishlist</h2>
           @include('user.account-nav')
        </div>
        <div class="col-lg-9">
          <div class="mb-4">
                    @if (Session::has('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session('status_fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('status_fail') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
         

      <div class="main-content-inner">
    <div class="col-lg-9">
          <div class="page-content my-account__wishlist">
            <div class="products-grid row row-cols-2 row-cols-lg-3" id="products-grid">
                @foreach ($items as $item)
              <div class="product-card-wrapper">
                <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                  <div class="pc__img-wrapper">
                    <div class="swiper-container background-img js-swiper-slider"
                      data-settings='{"resizeObserver": true}'>
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <img loading="lazy" src="{{ asset('uploads/products') }}/{{ $item->model->image }}" width="330" height="400"
                            alt="Cropped Faux leather Jacket" class="pc__img">
                        </div>
                        @foreach (explode(",",$item->model->images) as $gimg)
                        <div class="swiper-slide">
                          <img loading="lazy" src="{{ asset('uploads/products') }}/{{ $gimg }}" width="330" height="400" alt="Cropped Faux leather Jacket" class="pc__img"><img loading="lazy" src="{{ asset('uploads/products') }}/{{ $gimg }}" width="330" height="400"
                            alt="Cropped Faux leather Jacket" class="pc__img">
                        </div>
                        @endforeach
                      </div>
                      <span class="pc__img-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                          xmlns="http://www.w3.org/2000/svg">
                          <use href="#icon_prev_sm" />
                        </svg></span>
                      <span class="pc__img-next"><svg width="7" height="11" viewBox="0 0 7 11"
                          xmlns="http://www.w3.org/2000/svg">
                          <use href="#icon_next_sm" />
                        </svg></span>
                    </div>

                     <form action="{{ route('wishlist.item.remove',['rowId'=>$item->rowId]) }}" method="POST" class="d-grid">
                        @csrf
                        @method('DELETE')
                    <button class="btn-remove-from-wishlist">
                      <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_close" />
                      </svg>
                    </button>
                    </form>
                  </div>

                  <div class="pc__info position-relative">
                    <p class="pc__category">{{ $item->model->category->name }}</p>
                    <h6 class="pc__title">{{ $item->model->name }}</h6>
                    <div class="product-card__price d-flex">
                       @if($item->model->sale_price)
                        <s>LKR {{ $item->model->regular_price }} </s> <span class="mx-2">LKR {{ $item->model->sale_price }}</span>
                    @else
                    LKR {{ $item->model->regular_price }}
                    @endif
                    </div>

                     <form action="{{ route('wishlist.move.to.cart', ['rowId'=>$item->rowId]) }}" method="POST" class="d-grid">
                     @csrf
                    <button class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist text-danger bg-warning"
                      title="Move to Cart">
                      <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_cart" />
                      </svg>
                    </button>
                     </form>

                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
    </section>
  </main>

@endsection 

@push('scripts')
    <script>
      $(function(){

        $(".btn-remove-from-wishlist").on("click", function(){
          $(this).closest('form').submit();
        });

      });
    </script> 
@endpush
