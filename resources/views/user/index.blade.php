@extends('layouts.app')

@section('content')

<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <div class="row">
        <div class="col-lg-3">
           <h2 class="page-title">My Account</h2>
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
    <div class="main-content-wrap">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Update Your Profile</h3>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
              
                <form action="{{ route('user.update.information', Auth::id()) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <h5 class="mb-3 text-muted">Welcome back, <strong class="text-primary">{{ $user->name }}</strong>! Here’s your personal info 📋</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="mobile" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile', $user->mobile) }}" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Password Change</h5>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-12 mb-3">
                                <label for="old_password" class="form-label">Old Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="old_password" name="old_password">
                                <div class="form-text">Leave blank if you don't want to change password.</div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="new_password" class="form-label">New Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="new_password_confirmation" class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary" style="background-color: #3e3e3e">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    </section>
  </main>

@endsection 
