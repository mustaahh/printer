@extends('user_template.layouts.sneat')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="card mb-3 mt-4">
                <div class="row g-0">
                    <div class="col-md-4 ">
                        <div class="card-body">
                            <h5 class="card-title">Welcome, {{ Auth::user()->name }}</h5>
                            <ul>
                                <li><a href="{{ route('user-profile') }}">Dashboard</a></li>
                                <li><a href="{{ route('pending-orders') }}">Pending Orders</a></li>
                                <li><a href="{{ route('history') }}">History</a></li>
                                <li><a href="">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            @yield('profile-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection