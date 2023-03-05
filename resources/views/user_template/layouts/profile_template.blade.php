@extends('user_template.layouts.sneat')
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card mb-3 mt-4">
                    <div class="row g-0">
                        <div class="col-md-4 ">
                            <div class="card-body">
                                <h5 class="card-title ">Welcome To Dashboard, <span class="text-primary fw-bold">{{ Auth::user()->name }} !</span></h5>
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action @yield('dashboard-user')"
                                         href="{{ route('user-profile') }}">Dashboard</a>
                                    <a href="{{ route('pending-orders') }}" class="list-group-item list-group-item-action @yield('pending-orders')"
                                         >Pending Orders</a>
                                    <a class="list-group-item list-group-item-action @yield('history')"
                                         href="{{ route('history') }}">History</a>
                                    <form method="POST" action="{{ route('logout') }}" class="list-group-item list-group-item-action" >
                                        @csrf
                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" style="color :#F55050">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="flex-grow-1 " >Log Out</span>
                                          </x-dropdown-link>
                                    </form>
                                </div>
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
