@extends('layouts.app')

@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Shipping and Checkout</h2>
      <div class="checkout-steps">
        <a href="{{ route('cart.index') }}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Shipping and Checkout</span>
            <em>Checkout Your Items List</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Confirmation</span>
            <em>Review And Submit Your Order</em>
          </span>
        </a>
      </div>

      <form name="checkout-form" action="{{ route('cart.place.an.order') }}" method="POST">
        @csrf
        <div class="checkout-form">
          <div class="billing-info__wrapper">
            <div class="row">
              <div class="col-6">
                <h4>SHIPPING DETAILS</h4>
              </div>
              <div class="col-6">
              </div>
            </div>
            @if($address)

            <div class="row mt-3">
              <div class="col-md-12">
                 <div class="my-account__address-list">
                    <div class="my-account__address-list-item">
                        <div class="my-account__address-item_detail">
                          <p>{{ $address->name }},</p>
                          <p>{{ $address->address }},</p>
                          <p>{{ $address->landmark }},</p>
                          <p>{{ $address->city }}, {{ $address->state }}, {{ $address->country }},</p>
                          <p>{{ $address->zip }}.</p>
                          <br>
                          <p>Contact Number -: {{ $address->phone }}</p>
                        </div>
                    </div>
                 </div>
              </div>
            </div>

            @else
            <div class="row mt-5">
              <div class="col-md-11">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="name" required="" value="{{ old('name') }}" autocomplete="off">
                  <label for="name">Full Name *</label>
                @error('name')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="phone" required="" value="{{ old('phone') }}" autocomplete="off">
                  <label for="phone">Phone Number *</label>
                  @error('phone')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="zip" required="" value="{{ old('zip') }}" autocomplete="off">
                  <label for="zip">Pincode *</label>
                  @error('zip')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mt-3 mb-3">
                  <input type="text" class="form-control" name="state" required="" value="{{ old('state') }}" autocomplete="off">
                  <label for="state">State *</label>
                  @error('state')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="city" required="" value="{{ old('city') }}" autocomplete="off">
                  <label for="city">Town / City *</label>
                  @error('city')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="address" required="" value="{{ old('address') }}" autocomplete="off">
                  <label for="address">House no, Building Name *</label>
                  @error('address')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="locality" required="" value="{{ old('locality') }}" autocomplete="off">
                  <label for="locality">Road Name, Area, Colony *</label>
                  @error('locality')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="landmark" required="" value="{{ old('landmark') }}" autocomplete="off">
                  <label for="landmark">Landmark *</label>
                  @error('landmark')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>
            @endif
          </div>
          <div class="checkout__totals-wrapper">
            <div class="sticky-content">
              <div class="checkout__totals">
                <h3>Your Order</h3>
                <table class="checkout-cart-items">
                  <thead>
                    <tr>
                      <th>PRODUCT</th>
                      <th align="right">SUBTOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach (Cart::instance('cart') as $item)
                    <tr>
                      <td>
                       {{ $item->name }} x {{ $item->qty }}
                      </td>
                      <td align="right">
                        LKR {{ $item->subtotal }}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @if(Session::has('discounts'))
                <table class="checkout-totals">
                  <tbody>
                    <tr>
                      <th>Subtotal</th>
                      <td class="text-right">LKR {{ Cart::instance('cart')->subTotal() }}</td>
                    </tr>
                    <tr>
                      <th>Discount {{ Session::get('coupon')['code'] }}</th>
                      <td class="text-right">LKR {{ Session::get('discounts')['discount'] }}</td>
                    </tr>
                    <tr>
                      <th>Subtotal After Discount</th>
                      <td class="text-right">LKR {{ Session::get('discounts')['subtotal'] }}</td>
                    </tr>
                    <tr>
                      <th>Shipping</th>
                      <td class="text-right">Free</td>
                    </tr>
                    <tr>
                      <th>VAT</th>
                      <td class="text-right">LKR {{ Session::get('discounts')['tax'] }}</td>
                    </tr>
                    <tr>
                      <th>Total</th>
                      <td class="text-right">LKR {{ Session::get('discounts')['total'] }}</td>
                    </tr>
                  </tbody>
                </table>
                @else
                <table class="checkout-totals">
                  <tbody>
                    <tr>
                      <th>SUBTOTAL</th>
                      <td class="text-right">LKR {{ Cart::instance('cart')->subtotal() }}</td>
                    </tr>
                    <tr>
                      <th>SHIPPING</th>
                      <td class="text-right">Free shipping</td>
                    </tr>
                    <tr>
                      <th>VAT</th>
                      <td class="text-right">LKR {{ Cart::instance('cart')->tax() }}</td>
                    </tr>
                    <tr>
                      <th>TOTAL</th>
                      <td class="text-right">LKR {{ Cart::instance('cart')->total() }}</td>
                    </tr>
                  </tbody>
                </table>
                @endif
              </div>
              <div class="checkout__payment-methods">
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode1" value="card" disabled>
                  <label class="form-check-label" for="checkout_payment_method_2">
                    Debit or Credit Card
                    <p class="option-detail">
                      Pay securely using your debit or credit card through our encrypted payment gateway. We accept Visa, MasterCard, and other major cards. Your payment will be processed instantly and your order will be confirmed immediately.
                    </p>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode2" value="paypal" disabled>
                  <label class="form-check-label" for="checkout_payment_method_4">
                    Paypal
                    <p class="option-detail">
                      Choose PayPal to make a fast, secure payment using your PayPal account or a linked credit/debit card. You will be redirected to the PayPal site to complete your transaction, after which you'll be brought back to our website to confirm your order.
                    </p>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode3" value="cod">
                  <label class="form-check-label" for="checkout_payment_method_3">
                    Cash on delivery
                    <p class="option-detail">
                      With Cash on Delivery (COD), you can pay for your order in cash at the time it is delivered to your address. This method is convenient and secure, but please ensure that you have the exact amount ready, as the delivery personnel may not carry change.
                    </p>
                  </label>
                </div>
                <div class="policy-text">
                  Your personal data will be used to process your order, support your experience throughout this
                  website, and for other purposes described in our <a href="{{ route('privacy.index') }}" target="_blank">privacy
                    policy</a>.
                </div>
              </div>

              <button class="btn btn-primary btn-checkout">PLACE ORDER</button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>


@push('scripts')
<script>
     $(function () {
        $(window).on('pageshow', function (event) {
            if (event.originalEvent.persisted || performance.navigation.type === 2) {
                window.location.href = "{{ route('cart.checkout') }}";
            }
        });
    });
</script>
@endpush


@endsection
