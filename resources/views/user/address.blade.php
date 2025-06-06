@extends('layouts.app')

@section('content')

 <main class="pt-90">
  <div class="mb-4 pb-4"></div>
  <section class="my-account container">
    <div class="row">

      <div class="col-lg-3">
        <h2 class="page-title">Addresses</h2>
        @include('user.account-nav')
      </div>


      <div class="col-lg-9">
        <div class="d-flex justify-content-between align-items-start mb-3">
          <p class="notice mb-3">
            The following addresses will be used on the checkout page by default.
          </p>
        </div>

        <div class="my-account__address-list row">
          <h5>Shipping Address</h5>
           @if (Session::has('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
            @endif
          <hr>
          @if($address)
          <div class="my-account__address-item col-md-6">
            <div class="my-account__address-item__title">
              <h5>{{ $address->name }} <i class="fa fa-check-circle text-primary"></i></h5>
              <a href="{{ route('user.address.edit', $address->id) }}">Edit</a>
            </div>
            <div class="my-account__address-item__detail">
              <p>{{ $address->address }},</p>
              <p>{{ $address->locality }},</p>
              <p>{{ $address->city }}, {{ $address->state }}, {{ $address->country }},</p>
              <p>{{ $address->landmark }},</p>
              <p>{{ $address->zip }}.</p>
              <br>
              <p>Mobile : {{ $address->phone }}</p>
            </div>
          </div>
          @else
          <div class="my-account__address-item col-md-6">
            <div class="my-account__address-item__title">
              <h5>No Address Found</h5>
            </div>
            <p>You can conveniently <span class="fw-bold text-primary">Add your address during the checkout process</span> when placing your first order.</p>
            <p>Thank you for choosing us!</p>
          </div>
          @endif

          <hr>
        </div>
      </div>
    </div>
  </section>
</main>



@endsection
