@section('title', '| List Purchase Order')
@extends('layouts.main')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">{{ __('Purchase Order') }}</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('po.create') }}">{{ __('Purchase Order') }}</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    @can('purchase-create')
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('po.index') }}" class="btn btn-sm btn-neutral">{{ __('List Business Units') }}</a>
                    </div>
                    @endcan
                    <a href="{{ route('sendMail') }}" class="btn btn-sm btn-secondary">Send Email</a>
                    <a href="{{ route('testExport') }}" class="btn btn-sm btn-secondary">Export Excel</a>
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
                        <h3 class="mb-0">{{ __('Purchase Order') }}</h3>
                    </div>
                    <div class="table-responsive py-2">
                        <table class="table table-flush" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>Order Number</th>
                                    <th>Customer Name</th>
                                    <th>Business Unit</th>
                                    <th>Sales Name</th>
                                    <th>Order Type</th>
                                    <th>Approval</th>
                                    <th style="text-align: center; width: 100px">Total Price</th>
                                    <th style="text-align: center; width: 100px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>Order Number</th>
                                    <th>Customer Name</th>
                                    <th>Business Unit</th>
                                    <th>Sales Name</th>
                                    <th>Order Type</th>
                                    <th>Approval</th>
                                    <th style="text-align: center; width: 100px">Total Price</th>
                                    <th style="text-align: center; width: 100px">{{ __('Action') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    function idr($p)
                                    {
                                        $result = 'Rp. ' . number_format($p, 2, ',', '.');
                                        return $result;
                                    }
                                    $pofilter = $pov
                                        ->where('sales', Auth::user()->fullname)
                                        ->groupBy('no_order');
                                @endphp
                                @foreach ($pov as $p)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                        <td style="vertical-align: middle">{{ $p->no_order }}</td>
                                        <td style="vertical-align: middle">{{ $p->customer_name }}</td>
                                        <td style="vertical-align: middle">
                                            <span class="badge badge-pill badge-primary">
                                                {{ $p->bu->business_unit }}
                                            </span>
                                        </td>
                                        <td style="vertical-align: middle">{{ $p->sales }}</td>
                                        <td style="vertical-align: middle">{{ $p->order_type }}</td>
                                        <td style="vertical-align: middle">
                                            @if ($p->approval == 'true')
                                                <span class="badge badge-pill badge-success"><i class="fa fa-check"
                                                        aria-hidden="true"></i></span>
                                            @else
                                                <span class="badge badge-pill badge-danger"><i class="fa fa-times"
                                                        aria-hidden="true"></i></span>
                                            @endif
                                        </td>
                                        <td style="vertical-align: middle; text-align: center; width: 100px">
                                            {{ idr($p->grand_total) }}</td>
                                        <td style="vertical-align: middle" align="center">
                                            <a href="#"
                                                class="btn btn-sm btn-icon btn-default btn-icon-only rounded-circle mdl-detail"
                                                data-toggle="modal" data-id="{{ $p->id_po }}"
                                                data-target="#sekolah-show-{{ $p->id_po }}">
                                                <span class="btn-inner--icon" data-toggle="tooltip" data-placement="top"
                                                    title="Show"><i class="fas fa-eye"></i>
                                                </span>
                                            </a>
                                            @can('purchase-delete')
                                            <button onclick="deleteItem(this)" data-id="{{ $p->id }}"
                                                class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle"
                                                data-toggle="tooltip" data-placement="top" title="Remove">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            @endcan
                                            @include('purchaseorder.modal.show')
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
    @include('purchaseorder.remove_script')
@endsection
