@section('title','| Trash')
@extends('layouts.main')
@section('content')
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">{{ __('Trash') }}</h6>
                            {{-- <li class="breadcrumb-item"><a href="{{ route('clearall') }}"class="btn btn-sm btn-icon btn-warning" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                                <span class="btn-inner--text">Clear All</span></a></li> --}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                            <input type="text" name="trash" value="users" hidden>
                            <span class="h2 font-weight-bold mb-0">
                                @if ($users == 0)
                                {{__('Empty')}}
                                @else
                                {{__($users)}} {{__('trash')}}
                                @endif
                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="fas fa-trash"></i>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{route('list.trashs', 'users')}}"><small class="text-nowrap text-primary font-weight-600">Go to trash</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Business Unit</h5>
                            <input type="text" name="trash" value="business_unit" hidden>
                            <span class="h2 font-weight-bold mb-0">
                                @if ($business_unit == 0)
                                {{__('Empty')}}
                                @else
                                {{__($business_unit)}} {{__('trash')}}
                                @endif
                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="fas fa-trash"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{route('list.trashs', 'business_unit')}}"><small class="text-nowrap text-primary font-weight-600">Go to trash</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Product</h5>
                            <input type="text" name="trash" value="product" hidden>
                            <span class="h2 font-weight-bold mb-0">
                                @if ($product == 0)
                                {{__('Empty')}}
                                @else
                                {{__($product)}} {{__('trash')}}
                                @endif
                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="fas fa-trash"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="{{route('list.trashs', 'product')}}"><small class="text-nowrap text-primary font-weight-600">Go to trash</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('nav.footer')
</div>
@endsection
