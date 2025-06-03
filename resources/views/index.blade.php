@extends('layouts.app')
@section('content')


<style>

    .coupon-wrapper {
      position: relative;
      margin-bottom: 15px;
      padding: 10px 0;
    }


    .scissors-top, .scissors-bottom {
      position: absolute;
      left: -12px;
      font-size: 24px;
      color: #adb5bd;
      transform: rotate(-90deg);
      z-index: 2;
    }

    .scissors-top {
      top: -8px;
    }

    .scissors-bottom {
      bottom: -8px;
    }


    .coupon-card {
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: all 0.4s ease;
      overflow: hidden;
      position: relative;
      background: #fff;
    }

    .coupon-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 14px 30px rgba(0, 0, 0, 0.15);
    }


    .coupon-tag {
      position: absolute;
      top: 0;
      right: 20px;
      width: 40px;
      height: 40px;
      border-radius: 0 0 50% 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      z-index: 2;
    }

    .coupon-tag span {
      margin-top: 8px;
    }


    .coupon-header {
      border-radius: 0 0 50% 0;
      padding-bottom: 20px !important;
      margin-right: -50px;
      clip-path: polygon(0 0, 100% 0, 100% 60%, 80% 100%, 0 100%);
    }

    .letter-spacing-1 {
      letter-spacing: 1px;
    }


    .value-pill {
      display: inline-block;
      color: white;
      padding: 8px 20px;
      border-radius: 30px;
      font-weight: 700;
      font-size: 1.1rem;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }


    .code-container {
      width: 80%;
      margin-top: 15px;
      position: relative;
    }

    .coupon-code-display {
      background: #f8f9fa;
      padding: 10px 15px;
      border: 2px dashed #dee2e6;
      border-radius: 8px;
      position: relative;
      overflow: hidden;
    }

    .code-text {
      font-size: 1.3rem;
      letter-spacing: 2px;
      color: #333;
    }

    .scissors-icon {
      top: -13px;
      right: -15px;
      font-size: 24px;
      transform: rotate(90deg);
      opacity: 0.5;
    }


    .detail-item {
      margin-bottom: 12px;
    }

    .detail-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 15px;
    }

    .detail-text {
      display: flex;
      flex-direction: column;
    }

    .detail-label {
      font-size: 0.8rem;
      color: #6c757d;
      margin-bottom: 3px;
    }

    .detail-value {
      font-weight: 600;
      color: #333;
    }


    .copy-btn {
      border: none;
      background: linear-gradient(135deg, #FF4C61, #FF8181);
      color: white;
      padding: 12px 24px;
      border-radius: 8px;
      font-weight: 700;
      font-size: 0.9rem;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .copy-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
    }


    .circle-left, .circle-right {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      background-color: #f8f9fa;
      border-radius: 50%;
      z-index: 3;
    }

    .circle-left {
      left: -10px;
      box-shadow: inset 3px 0 5px rgba(0,0,0,0.06);
    }

    .circle-right {
      right: -10px;
      box-shadow: inset -3px 0 5px rgba(0,0,0,0.06);
    }


    .row {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -15px;
    }

    .col {
      flex: 0 0 33.333%;
      max-width: 33.333%;
      padding: 0 15px;
      margin-bottom: 30px;
    }


    @media (max-width: 992px) {
      .col {
        flex: 0 0 50%;
        max-width: 50%;
      }
    }

    @media (max-width: 768px) {
      .col {
        flex: 0 0 100%;
        max-width: 100%;
      }

      .scissors-top, .scissors-bottom {
        display: none;
      }

      .coupon-code-display {
        padding: 8px 12px;
      }

      .code-text {
        font-size: 1.1rem;
      }

      .value-pill {
        font-size: 1rem;
        padding: 6px 16px;
      }
    }

    .text-center {
      text-align: center;
    }
</style>


<main>


<section class="swiper-container js-swiper-slider swiper-number-pagination slideshow"  data-settings='{
    "autoplay": {
      "delay": 5000
    },
    "slidesPerView": 1,
    "effect": "fade",
    "loop": true
  }'>
  <div class="swiper-wrapper">
    @foreach($slides as $slide)

    <div class="swiper-slide container-fluid">
      <div class="overflow-hidden position-relative h-100">
        <div class="slideshow-character position-absolute bottom-0 pos_right-center">
          <img loading="lazy" src="{{ asset('uploads/slides') }}/{{ $slide->image }}" width="542" height="733"
            alt="Woman Fashion 1"
            class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 object-fit-cover w-100 h-100" />
          <div class="character_markup type2">
            <p
              class="text-uppercase font-sofia mark-grey-color animate animate_fade animate_btt animate_delay-10 mb-0">
              {{ $slide->tagline }}</p>
          </div>
        </div>
        <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
          <h6 class="text_dash text-uppercase fs-base fw-medium animate animate_fade animate_btt animate_delay-3">
            New Arrivals</h6>
          <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">{{ $slide->title }}</h2>
          <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">{{ $slide->subtitle }}</h2>
          <a href="{{ $slide->link }}"
            class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">Shop
            Now</a>
        </div>
      </div>
    </div>

    @endforeach

  </div>

  <div class="container">
    <div
      class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
    </div>
  </div>
</section>





<div class="container mw-1620 bg-white border-radius-10">
  <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
  <section class="category-carousel container">
    <h2 class="section-title text-center mb-3 pb-xl-2 mb-xl-4">You Might Like</h2>

    <div class="position-relative">
      <div class="swiper-container js-swiper-slider" data-settings='{
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": 8,
          "slidesPerGroup": 1,
          "effect": "none",
          "loop": true,
          "navigation": {
            "nextEl": ".products-carousel__next-1",
            "prevEl": ".products-carousel__prev-1"
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 2,
              "slidesPerGroup": 2,
              "spaceBetween": 15
            },
            "768": {
              "slidesPerView": 4,
              "slidesPerGroup": 4,
              "spaceBetween": 30
            },
            "992": {
              "slidesPerView": 6,
              "slidesPerGroup": 1,
              "spaceBetween": 45,
              "pagination": false
            },
            "1200": {
              "slidesPerView": 8,
              "slidesPerGroup": 1,
              "spaceBetween": 60,
              "pagination": false
            }
          }
        }'>
        <div class="swiper-wrapper">
          @foreach($categories as $category)

          <div class="swiper-slide">
            <img loading="lazy" class="w-100 h-auto mb-3" src="{{ asset('uploads/categories') }}/{{ $category->image }}" width="124"
              height="124" alt="{{ $category->image }}" />
            <div class="text-center">
              <a href="{{ route('shop.index', ['categories' => $category->id]) }}" class="menu-link fw-medium">{{ $category->name }}</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div
        class="products-carousel__prev products-carousel__prev-1 position-absolute top-50 d-flex align-items-center justify-content-center">
        <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_prev_md" />
        </svg>
      </div>
      <div
        class="products-carousel__next products-carousel__next-1 position-absolute top-50 d-flex align-items-center justify-content-center">
        <svg width="25" height="25" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg">
          <use href="#icon_next_md" />
        </svg>
      </div>
    </div>
  </section>

  <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

  <section class="hot-deals container">
    <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Hot Deals</h2>
    <div class="row">
      <div
        class="col-md-6 col-lg-4 col-xl-20per d-flex align-items-center flex-column justify-content-center py-4 align-items-md-start">
        <h2>Summer Sale</h2>
        <h2 class="fw-bold">Up to 60% Off</h2>

        <div class="position-relative d-flex align-items-center text-center pt-xxl-4 js-countdown mb-3"
          data-date="18-3-2024" data-time="06:50">
          <div class="day countdown-unit">
            <span class="countdown-num d-block"></span>
            <span class="countdown-word text-uppercase text-secondary">Days</span>
          </div>

          <div class="hour countdown-unit">
            <span class="countdown-num d-block"></span>
            <span class="countdown-word text-uppercase text-secondary">Hours</span>
          </div>

          <div class="min countdown-unit">
            <span class="countdown-num d-block"></span>
            <span class="countdown-word text-uppercase text-secondary">Mins</span>
          </div>

          <div class="sec countdown-unit">
            <span class="countdown-num d-block"></span>
            <span class="countdown-word text-uppercase text-secondary">Sec</span>
          </div>
        </div>

        <a href="{{ route('shop.index') }}" class="btn-link default-underline text-uppercase fw-medium mt-3">View All</a>
      </div>
      <div class="col-md-6 col-lg-8 col-xl-80per">
        <div class="position-relative">
          <div class="swiper-container js-swiper-slider" data-settings='{
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 4,
              "slidesPerGroup": 4,
              "effect": "none",
              "loop": false,
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 2,
                  "spaceBetween": 14
                },
                "768": {
                  "slidesPerView": 2,
                  "slidesPerGroup": 3,
                  "spaceBetween": 24
                },
                "992": {
                  "slidesPerView": 3,
                  "slidesPerGroup": 1,
                  "spaceBetween": 30,
                  "pagination": false
                },
                "1200": {
                  "slidesPerView": 4,
                  "slidesPerGroup": 1,
                  "spaceBetween": 30,
                  "pagination": false
                }
              }
            }'>
            <div class="swiper-wrapper">

              @foreach($sproducts as $sproduct)
              <div class="swiper-slide product-card product-card_style3">
                <div class="pc__img-wrapper position-relative">


                  @php
                  $categoryName = $sproduct->category->name;
                  $hash = substr(md5($categoryName), 5, 8); // Use first 6 chars of hash as hex color
                  $color = '#' . $hash;
                  @endphp

                  <div class="position-absolute top-0 start-0 text-white px-1 py-1 rounded-end-2 fw-semibold text-uppercase small shadow-sm"
                  style="background-color: {{ $color }}; margin: 0px 0; z-index: 2;">
                  {{ $categoryName }}
                  </div>



                  <a href="{{ route('shop.product.details', ['product_slug' => $sproduct->slug]) }}">
                    <img loading="lazy" src="{{ asset('uploads/products') }}/{{ $sproduct->image }}" width="258" height="313"
                      alt="{{ $sproduct->name }}" class="pc__img">
                      @foreach (explode(",",$sproduct->images) as $gimg)
                  <img loading="lazy" src="{{ asset('uploads/products') }}/{{ $gimg }}" width="330" height="400"
                    alt="{{ $gimg }}" class="pc__img pc__img-second">
                    @endforeach
                  </a>
                </div>

                <div class="pc__info position-relative">
                  <h6 class="pc__title"><a href="{{ route('shop.product.details', ['product_slug' => $sproduct->slug]) }}">{{ $sproduct->name }}</a></h6>
                  <div class="product-card__price d-flex">
                    <span class="money price text-secondary">
                      @if($sproduct->sale_price)
                      <s>LKR {{ $sproduct->regular_price }}</s> LKR {{ $sproduct->sale_price }}
                      @else
                         LKR {{ $sproduct->regular_price }}
                      @endif
                    </span>
                  </div>
                </div>
              </div>
              @endforeach
            </div><!-- /.swiper-wrapper -->
          </div><!-- /.swiper-container js-swiper-slider -->
        </div><!-- /.position-relative -->
      </div>
    </div>
  </section>

  <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

  <section class="category-banner container">
    <div class="row">
      <div class="col-md-6">
        <div class="category-banner__item border-radius-10 mb-5">
          <img loading="lazy" class="h-auto" src="{{ asset('assets/images/home/demo3/category_9.jpg') }}" width="690" height="665"
            alt="" />
          <div class="category-banner__item-mark">
            Just Dropped
          </div>
          <div class="category-banner__item-content">
            <h3 class="mb-0">Women</h3>
            <a href="{{ route('shop.index') }}" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="category-banner__item border-radius-10 mb-5">
          <img loading="lazy" class="h-auto" src="{{ asset('assets/images/home/demo3/category_10.jpg') }}" width="690" height="665"
            alt="" />
          <div class="category-banner__item-mark bg-secondary">
            Limited Time Deal
          </div>
          <div class="category-banner__item-content">
            <h3 class="mb-0">Mens</h3>
            <a href="{{ route('shop.index') }}" class="btn-link default-underline text-uppercase fw-medium">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

  <section class="products-grid container">
    <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Featured Products</h2>

    <div class="row">
      @foreach ($fproducts as $fproduct)
      <div class="col-6 col-md-4 col-lg-3">
        <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
          <div class="pc__img-wrapper position-relative">
            <!-- Category Label -->
            @php
            $categoryName = $fproduct->category->name;
            $hash = substr(md5($categoryName), 5, 8); // Use first 6 chars of hash as hex color
            $color = '#' . $hash;
            @endphp

            <div class="position-absolute top-0 start-0 text-white px-3 py-1 rounded-end-2 fw-semibold text-uppercase small shadow-sm"
            style="background-color: {{ $color }}; margin: 0px 0; z-index: 2;">
            {{ $categoryName }}
            </div>

            <a href="{{ route('shop.product.details', ['product_slug' => $fproduct->slug]) }}">
              <img loading="lazy" src="{{ asset('uploads/products') }}/{{ $fproduct->image }}" width="330" height="400"
                alt="Cropped Faux leather Jacket" class="pc__img">
            </a>
          </div>


          <div class="pc__info position-relative">
            <h6 class="pc__title"><a href="details.html">{{ $fproduct->name }}</a></h6>
            <div class="product-card__price d-flex align-items-center">
              <span class="money price text-secondary">
                @if($fproduct->sale_price)
                      <s>LKR {{ $fproduct->regular_price }}</s> LKR {{ $fproduct->sale_price }}
                      @else
                         LKR {{ $fproduct->regular_price }}
                      @endif
              </span>
            </div>

            {{-- <div
              class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
              <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-add-cart js-open-aside"
                data-aside="cartDrawer" title="Add To Cart">Add To Cart</button>
              <button class="btn-link btn-link_lg me-4 text-uppercase fw-medium js-quick-view"
                data-bs-toggle="modal" data-bs-target="#quickView" title="Quick view">
                <span class="d-none d-xxl-block">Quick View</span>
                <span class="d-block d-xxl-none"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_view" />
                  </svg></span>
              </button>
              <button class="pc__btn-wl bg-transparent border-0 js-add-wishlist" title="Add To Wishlist">
                <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#icon_heart" />
                </svg>
              </button>
            </div> --}}

          </div>
        </div>
      </div>
      @endforeach
    </div><!-- /.row -->

    <div class="text-center mt-2">
      <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="{{ route('shop.index') }}">Load More</a>
    </div>
  </section>
</div>

<div class="mb-3 mb-xl-5 pt-1 pb-4"></div>


    @php
      $hasValidCoupons = $coupons->contains(function($coupon) {
          return \Carbon\Carbon::parse($coupon->expiry_date)->isFuture();
      });
    @endphp

<section class="products-grid container mt-5">
  <h2 class="section-title text-center mb-4 pb-2">Available Coupons</h2>

  @if (! $hasValidCoupons)
    <div class="text-center text-muted mb-4 pb-2">
      <h6 class="text-muted">No coupons available now!</h6>
    </div>
  @endif

  <div class="row g-4">
    @foreach ($coupons as $coupon)
      @php
        $validCoupon = \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($coupon->expiry_date));
      @endphp
      @if ($validCoupon)
        @php
          $colorMap = [
            'fixed' => ['#b59b63', '#c9ad7f'],
            'precent' => ['#5a6240', '#818c62']
          ];
          $iconMap = [
            'fixed' => 'cash-coin',
            'precent' => 'percent'
          ];
          $gradient = $colorMap[$coupon->type] ?? ['#6c5ce7', '#a29bfe'];
          $icon = $iconMap[$coupon->type] ?? 'ticket-alt';
        @endphp

        <div class="col-12 col-sm-6 col-lg-3">
          <div class="coupon-wrapper">
            <div class="scissors-top">
              <i class="bi bi-scissors text-muted"></i>
            </div>

            <div class="coupon-card position-relative overflow-hidden" style="border-top: 5px solid {{ $gradient[0] }};">
              <div class="coupon-tag" style="background: linear-gradient(135deg, {{ $gradient[0] }}, {{ $gradient[1] }});">
                <span><i class="bi bi-{{ $icon }}"></i></span>
              </div>

              <div class="coupon-header text-center p-3 text-white" style="background: linear-gradient(135deg, {{ $gradient[0] }}, {{ $gradient[1] }});">
                <h5 class="mb-0 text-uppercase text-white fw-bold letter-spacing-1 text-start">
                  <i class="bi bi-{{ $icon }} me-2"></i>{{ ucfirst($coupon->type) }} Coupon
                </h5>
              </div>

              <div class="coupon-body p-4 bg-white">
                <div class="text-center mb-4">
                  <div class="value-pill mb-2" style="background: linear-gradient(135deg, {{ $gradient[0] }}, {{ $gradient[1] }});">
                    @if($coupon->type === 'fixed')
                      LKR {{ number_format($coupon->value, 2) }} OFF
                    @elseif($coupon->type === 'precent')
                      {{ $coupon->value }}% OFF
                    @else
                      Free Shipping
                    @endif
                  </div>

                  <div class="code-container mx-auto position-relative">
                    <div class="coupon-code-display position-relative">
                      <span class="code-text fw-bold">{{ $coupon->code }}</span>
                      <div class="scissors-icon position-absolute" style="color: {{ $gradient[0] }};">
                        <i class="bi bi-scissors"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="coupon-details mb-4">
                  <div class="detail-item d-flex align-items-center mb-3">
                    <div class="detail-icon" style="background: {{ $gradient[0] }}20;">
                      <i class="bi bi-cart" style="color: {{ $gradient[0] }};"></i>
                    </div>
                    <div class="detail-text">
                      <span class="detail-label">Minimum Purchase</span>
                      <span class="detail-value">LKR {{ number_format($coupon->cart_value, 2) }}</span>
                    </div>
                  </div>

                  <div class="detail-item d-flex align-items-center">
                    <div class="detail-icon" style="background: {{ $gradient[0] }}20;">
                      <i class="bi bi-calendar-event" style="color: {{ $gradient[0] }};"></i>
                    </div>
                    <div class="detail-text">
                      <span class="detail-label">Valid Until</span>
                      <span class="detail-value">{{ \Carbon\Carbon::parse($coupon->expiry_date)->format('M d, Y') }}</span>
                    </div>
                  </div>
                </div>

                <div class="coupon-footer d-grid">
                  <button class="copy-btn" style="background: linear-gradient(135deg, {{ $gradient[0] }}, {{ $gradient[1] }});" onclick="copyCouponCode('{{ $coupon->code }}', this)">
                    <span>COPY CODE</span>
                    <i class="bi bi-clipboard ms-2"></i>
                  </button>
                </div>
              </div>

              <div class="circle-left"></div>
              <div class="circle-right"></div>
            </div>

            <div class="scissors-bottom">
              <i class="bi bi-scissors"></i>
            </div>
          </div>
        </div>
      @endif
    @endforeach
  </div>
</section>

</main>

@endsection

@push('scripts')

<script>
  function copyCouponCode(code, btn) {

    const tempInput = document.createElement("input");
    tempInput.value = code;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);


    const originalHTML = btn.innerHTML;
    btn.innerHTML = '<span class = "text-white">Copied!</span> <i class="bi bi-check-circle ms-2 text-white"></i>';
    btn.classList.add('btn-success');

    setTimeout(() => {
      btn.innerHTML = originalHTML;
      btn.classList.remove('btn-success');
    }, 2000);
  }





</script>


@endpush
