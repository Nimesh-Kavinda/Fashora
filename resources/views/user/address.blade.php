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
          <hr>

          <div class="my-account__address-item col-md-6">
            <div class="my-account__address-item__title">
              <h5>{{ $address->name }} <i class="fa fa-check-circle text-success"></i></h5>
              <a href="#">Edit</a>
            </div>
            <div class="my-account__address-item__detail">
              <p>{{ $address->address }},</p>
              <p>{{ $address->city }}, {{ $address->state }}, {{ $address->country }},</p>
              <p>{{ $address->landmark }},</p>
              <p>{{ $address->zip }}.</p>
              <br>
              <p>Mobile : {{ $address->phone }}</p>
            </div>
          </div>

          <hr>
        </div>
      </div>
    </div>
  </section>
</main>



@endsection