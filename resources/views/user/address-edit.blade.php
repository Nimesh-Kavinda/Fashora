@extends('layouts.app')

@section('content')

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
        <form action="{{ route('user.address.update'), $address->id }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
        <div class="row mt-5">
              <div class="col-md-11">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="name" required="" value="{{ $address->name }}" autocomplete="off">
                  <label for="name">Full Name *</label>
                @error('name')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="phone" required="" value="{{ $address->phone }}" autocomplete="off">
                  <label for="phone">Phone Number *</label>
                  @error('phone')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="zip" required="" value="{{ $address->zip }}" autocomplete="off">
                  <label for="zip">Pincode *</label>
                  @error('zip')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mt-3 mb-3">
                  <input type="text" class="form-control" name="state" required="" value="{{ $address->state }}" autocomplete="off">
                  <label for="state">State *</label>
                  @error('state')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="city" required="" value="{{ $address->city }}" autocomplete="off">
                  <label for="city">Town / City *</label>
                  @error('city')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="address" required="" value="{{ $address->address }}" autocomplete="off">
                  <label for="address">House no, Building Name *</label>
                  @error('address')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="locality" required="" value="{{ $address->locality }}" autocomplete="off">
                  <label for="locality">Road Name, Area, Colony *</label>
                  @error('locality')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="landmark" required="" value="{{ $address->landmark }}" autocomplete="off">
                  <label for="landmark">Landmark *</label>
                  @error('landmark')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #3e3e3e">Update</button>
            </form>

    </div>
  </section>
</main>



@endsection

@endsection
