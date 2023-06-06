@extends('trash.main')
@section('breadcrumb', 'Business Unit Trash')
@section('list_trash')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="mb-0">{{__('Business Unit')}}</h3>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button onclick="restoreItem(this)" data-id="" data-url="business_unit/restore/" class="btn btn-sm btn-success"><Span>{{__('Restore All')}}</Span></button>
                            <button onclick="deleteItem(this)" data-id="" data-url="business_unit/delete/" class="btn btn-sm btn-youtube"><Span>{{__('Delete All')}}</Span></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>Image</th>
                                <th>Agency Code</th>
                                <th>Business Unit</th>
                                <th>Brand Name</th>
                                <th>Company</th>
                                <th style="text-align: center; width: 150px">{{ __('Action') }}</th>
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
                                <th style="text-align: center; width: 150px">{{ __('Action') }}</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($business_unit as $b)
                                <tr>
                                    <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                    <td style="vertical-align: middle">
                                        @if (strlen($b->gambar) > 0)
                                            <img src="{{ asset('img/business_unit/' . $b->gambar) }}" width="80px"
                                                class="mt-1" style="box-shadow: 3px 3px #d3d3d3; border-radius: 10px">
                                        @elseif($b->gambar == null)
                                            <img src="{{ asset('img/profile/user-default.png') }}" width="80px"
                                                class="mt-1" style="box-shadow: 3px 3px #d3d3d3; border-radius: 10px">
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle">{{ $b->agency_code }}</td>
                                    <td style="vertical-align: middle">{{ $b->business_unit }}</td>
                                    <td style="vertical-align: middle">{{ $b->brand_name }}</td>
                                    <td style="vertical-align: middle">{{ $b->company }}</td>
                                    @role('admin')
                                    <td style="vertical-align: middle;" align="center">
                                        <button onclick="restoreItem(this)" data-id="{{$b->id}}" data-url="business_unit/restore/" class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Restore"><i class="fa fa-undo"></i></button>
                                        <button onclick="deleteItem(this)" data-id="{{$b->id}}" data-url="business_unit/delete/" class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Delete Permanent"><i class="fa fa-trash"></i></button>
                                    </td>
                                    @endrole
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
@endsection
