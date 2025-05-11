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
          <p class="notice mb-0">
            The following addresses will be used on the checkout page by default.
          </p>
          <a href="#" class="btn btn-sm btn-info">Add New</a>
        </div>

        <div class="my-account__address-list row">
          <h5>Shipping Address</h5>

          <div class="my-account__address-item col-md-6">
            <div class="my-account__address-item__title">
              <h5>Sudhir Kumar <i class="fa fa-check-circle text-success"></i></h5>
              <a href="#">Edit</a>
            </div>
            <div class="my-account__address-item__detail">
              <p>Flat No - 13, R. K. Wing - B</p>
              <p>ABC, DEF</p>
              <p>GHJ, </p>
              <p>Near Sun Temple</p>
              <p>000000</p>
              <br>
              <p>Mobile : 1234567891</p>
            </div>
          </div>

          <hr>
        </div>
      </div>
    </div>
  </section>
</main>



@endsection