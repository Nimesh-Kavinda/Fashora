@extends('layouts.admin')

@section('content')

<div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Users</h3>
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
                                            <div class="text-tiny">All User</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    
                                    <div class="wg-table table-all-user">

                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">User</th>
                                                        <th class="text-center">Phone</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Total Orders</th>
                                                        <th class="text-center">Update User Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $user)
                                                    <tr>
                                                        <td class="text-center">{{ $user->id }}</td>
                                                        <td class="text-center">
                                                            <div class="name text-center">
                                                                <a href="#" class="body-title-2">{{ $user->name }}</a>
                                                                <div class="text-tiny mt-3">@if($user->utype == 'ADM') Admin @else Customer @endif</div>
                                                                <div class="text-tiny mt-3">{{ $user->created_at }}</div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">{{ $user->mobile }}</td>
                                                        <td class="text-center">{{ $user->email }}</td>
                                                        <td class="text-center"><a href="#">{{ $user->orders->count() }}</a></td>
                                                        <td class="text-center">
                                                           <form action="{{ route('admin.users.updateType', $user->id) }}" method="POST" class="mt-3">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="select">
                                                                <select name="utype" onchange="this.form.submit()" class="text-dark">
                                                                    <option value="ADM" {{ $user->utype == 'ADM' ? 'selected' : '' }}>Admin</option>
                                                                    <option value="USR" {{ $user->utype == 'USR' ? 'selected' : '' }}>Customer</option>
                                                                </select>
                                                                </div>
                                                            </form> 
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                                    </div>
                                </div>
                            </div>
                        </div>


@endsection