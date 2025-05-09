@extends('layouts.admin')

@section('content') 

 <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Settings</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{ route('admin.index') }}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Settings</div>
                                        </li>
                                    </ul>
                                </div>



                                <div class="wg-box">
                                    <div class="col-lg-12">
                                        <div class="page-content my-account__edit">
                                            <div class="my-account__edit-form">
                                            <div class="my-3">
                                                @if (Session::has('status'))
                                                    <p class="alert alert-success">{{ Session::get('status') }}</p>
                                                @elseif (session('status_fail'))
                                                    <p class="alert alert-danger">{{ Session::get('status_fail') }}</p>
                                                @endif
                                            </div> 
                                                <form action="{{ route('admin.settings.update', Auth::id()) }}" method="POST" class="form-new-product form-style-1 needs-validation" novalidate>
                                                    @csrf
                                                    @method('PUT')

                                                    <fieldset class="name">
                                                        <div class="body-title">Name <span class="tf-color-1">*</span></div>
                                                        <input class="flex-grow" type="text" placeholder="Full Name" name="name" value="{{ old('name', $user->name) }}" required>
                                                    </fieldset>

                                                    <fieldset class="name">
                                                        <div class="body-title">Mobile Number <span class="tf-color-1">*</span></div>
                                                        <input class="flex-grow" type="text" placeholder="Mobile Number" name="mobile" value="{{ old('mobile', $user->mobile) }}" required>
                                                    </fieldset>

                                                    <fieldset class="name">
                                                        <div class="body-title">Email Address <span class="tf-color-1">*</span></div>
                                                        <input class="flex-grow" type="email" placeholder="Email Address" name="email" value="{{ old('email', $user->email) }}" required>
                                                    </fieldset>

                                                    <div class="my-3">
                                                        <h5 class="text-uppercase mb-0">Password Change</h5>
                                                    </div>

                                                    <fieldset class="name">
                                                        <div class="body-title pb-3">Old password <span class="tf-color-1">*</span></div>
                                                        <input class="flex-grow" type="password" placeholder="Old password" name="old_password">
                                                    </fieldset>

                                                    <fieldset class="name">
                                                        <div class="body-title pb-3">New password <span class="tf-color-1">*</span></div>
                                                        <input class="flex-grow" type="password" placeholder="New password" name="new_password">
                                                    </fieldset>

                                                    <fieldset class="name">
                                                        <div class="body-title pb-3">Confirm new password <span class="tf-color-1">*</span></div>
                                                        <input class="flex-grow" type="password" placeholder="Confirm new password" name="new_password_confirmation">
                                                    </fieldset>

                                                    <div class="my-3">
                                                        <button type="submit" class="btn btn-primary tf-button w208">Save Changes</button>
                                                    </div>
                                                    
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



@endsection