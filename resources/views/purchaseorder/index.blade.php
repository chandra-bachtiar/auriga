@section('title', '| Purchase Order')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Transaksi') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('po.index') }}">{{ __('Purchase Order') }}</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">{{ __('Business Unit') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>Image</th>
                                    <th>Agency Code</th>
                                    <th>Business Unit</th>
                                    <th>Brand Name</th>
                                    <th>Company</th>
                                    <th style="text-align: center; width: 200px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>Image</th>
                                    <th>Agency Code</th>
                                    <th>Business Unit</th>
                                    <th>Brand Name</th>
                                    <th>Company</th>
                                    <th style="text-align: center; width: 200px">{{ __('Action') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($bu as $b)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">
                                            <div class="media align-items-center">
                                                @if (strlen($b->gambar) > 0)
                                                    <img src="{{ asset('img/business_unit/' . $b->gambar) }}"
                                                        width="80px" class="mt-1"
                                                        style="box-shadow: 3px 3px #d3d3d3; border-radius: 10px">
                                                @elseif($b->gambar == null)
                                                    <img src="{{ asset('img/brand/image.png') }}" width="80px"
                                                        class="mt-1"
                                                        style="box-shadow: 3px 3px #d3d3d3; border-radius: 10px">
                                                @endif
                                            </div>
                                        </td>
                                        <td style="vertical-align: middle">{{ $b->agency_code }}</td>
                                        <td style="vertical-align: middle">{{ $b->business_unit }}</td>
                                        <td style="vertical-align: middle">{{ $b->brand_name }}</td>
                                        <td style="vertical-align: middle">{{ $b->company }}</td>
                                        <td style="vertical-align: middle" align="center">
                                            <a href="{{ route('po.create', $b->id) }}"
                                                class="btn btn-sm btn-icon btn-primary">
                                                <span class="btn-inner--icon" data-toggle="tooltip" data-placement="top"
                                                    title="List Purchase Order"><i
                                                        class="fas fa-shopping-cart"></i>&nbsp;&nbsp;List Purchase Order
                                                </span>
                                            </a>
                                            @include('businessunit.modal.show')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('nav.footer')
    </div>
    </div>
    @include('businessunit.remove_script')
@endsection
