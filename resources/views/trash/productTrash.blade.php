@extends('trash.main')
@section('breadcrumb', 'Product Trash')
@section('list_trash')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="mb-0">{{__('Product')}}</h3>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button onclick="restoreItem(this)" data-id="" data-url="product/restore/" class="btn btn-sm btn-success"><Span>{{__('Restore All')}}</Span></button>
                            <button onclick="deleteItem(this)" data-id="" data-url="product/delete/" class="btn btn-sm btn-youtube"><Span>{{__('Delete All')}}</Span></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>Image</th>
                                <th>Business Unit</th>
                                <th>Item Number</th>
                                <th>SKU DCH</th>
                                <th>Item Name</th>
                                <th>UOM</th>
                                <th>CBM</th>
                                <th>KGS</th>
                                <th>Price</th>
                                <th style="text-align: center; width: 200px">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>Image</th>
                                <th>Business Unit</th>
                                <th>Item Number</th>
                                <th>SKU DCH</th>
                                <th>Item Name</th>
                                <th>UOM</th>
                                <th>CBM</th>
                                <th>KGS</th>
                                <th>Price</th>
                                <th style="text-align: center; width: 200px">{{ __('Action') }}</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                function idr($p)
                                {
                                    $result = 'Rp. ' . number_format($p, 2, ',', '.');
                                    return $result;
                                }
                            @endphp
                            @foreach ($product as $p)
                                <tr>
                                    <td style="vertical-align: middle">{{ $loop->iteration }}</td>
                                    <td style="vertical-align: middle">
                                        @if (strlen($p->gambar) > 0)
                                        <img src="{{ asset('img/product/' . $p->gambar) }}" width="80px"
                                            class="mt-1" style="box-shadow: 3px 3px #d3d3d3; border-radius: 10px">
                                        @elseif($p->gambar == null)
                                            <img src="{{ asset('img/profile/user-default.png') }}" width="80px"
                                                class="mt-1" style="box-shadow: 3px 3px #d3d3d3; border-radius: 10px">
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle">{{ $p->bu->business_unit }}</td>
                                    <td style="vertical-align: middle">{{ $p->item_number }}</td>
                                    <td style="vertical-align: middle">{{ $p->sku_dch }}</td>
                                    <td style="vertical-align: middle">{{ $p->item_number }}</td>
                                    <td style="vertical-align: middle">{{ $p->uom }}</td>
                                    <td style="vertical-align: middle">{{ $p->cbm }}</td>
                                    <td style="vertical-align: middle">{{ $p->kgs }}</td>
                                    <td style="vertical-align: middle">{{ idr($p->price) }}</td>
                                    @role('admin')
                                    <td style="vertical-align: middle;" align="center">
                                        <button onclick="restoreItem(this)" data-id="{{$p->id}}" data-url="product/restore/" class="btn btn-sm btn-icon btn-success btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Restore"><i class="fa fa-undo"></i></button>
                                        <button onclick="deleteItem(this)" data-id="{{$p->id}}" data-url="product/delete/" class="btn btn-sm btn-icon btn-youtube btn-icon-only rounded-circle" data-toggle="tooltip" data-placement="top" title="Delete Permanent"><i class="fa fa-trash"></i></button>
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
