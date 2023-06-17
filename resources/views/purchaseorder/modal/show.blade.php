@foreach ($pov as $p)
    <div class="modal fade ModalShow" id="sekolah-show-{{ $p->id_po }}" tabindex="-1" role="dialog" aria-hidden="true">
        
        <div class="modal-dialog modal-xl" style="width: 100%; height: 100%">
            <div class="modal-content">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h5 class="modal-title" style="text-align: start">{{ __('Detail Purchase Order') }}</h5>
                        <button type="button" href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        {{-- <img src="{{ asset('img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder"
                            class="card-img-top"> --}}
                        <div class="card-body pt-0">
                            <div class="row mb--4">
                                <div class="col-sm-6 text-left">
                                    <input type="hidden" id="idKu">
                                    <table class="tb1">
                                        <tr>
                                            <td class="tb1">Order Number</td>
                                            <td class="tb1">:</td>
                                            <td class="tb1">{{ $p->no_order }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tb1">Business Unit</td>
                                            <td class="tb1">:</td>
                                            <td class="tb1">{{ $p->bu->business_unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tb1">Customer Name</td>
                                            <td class="tb1">:</td>
                                            <td class="tb1">{{ $p->customer_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tb1">Address</td>
                                            <td class="tb1">:</td>
                                            <td class="tb1">{{ $p->address }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tb1">Phone</td>
                                            <td class="tb1">:</td>
                                            <td class="tb1">{{ $p->phone }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <table class="tb2">
                                        <tr>
                                            <td class="tb1">Sales</td>
                                            <td class="tb1">:</td>
                                            <td class="tb1">{{$p->sales}}</td>
                                        </tr>
                                        <tr>
                                            <td class="tb1">Order Date</td>
                                            <td class="tb1">:</td>
                                            <td class="tb1">{{$p->date}}</td>
                                        </tr>
                                        <tr>
                                            <td class="tb1">Order Type</td>
                                            <td class="tb1">:</td>
                                            <td class="tb1">{{$p->order_type}}</td>
                                        </tr>
                                        <tr>
                                            <td class="tb1">Remarks</td>
                                            <td class="tb1">:</td>
                                            <td class="tb1">{{$p->remarks}}</td>
                                        </tr>
                                        <tr>
                                            <td class="tb1">Grand Total</td>
                                            <td class="tb1">:</td>
                                            <td class="tb1">{{idr($p->grand_total)}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="card-header">
                                    <h3 class="mb-0">{{ __('Item Purchase Order') }}</h3>
                                </div>
                                <div class="table-responsive py-2">
                                    <table class="table table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Number Item</th>
                                                <th>Item Name</th>
                                                <th>SKU DCH</th>
                                                <th>UOM</th>
                                                <th>Price Exclude</th>
                                                <th>Price Include</th>
                                                <th>Quantity</th>
                                                <th>Discount</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Number Item</th>
                                                <th>Item Name</th>
                                                <th>SKU DCH</th>
                                                <th>UOM</th>
                                                <th>Price Exclude</th>
                                                <th>Price Include</th>
                                                <th>Quantity</th>
                                                <th>Discount</th>
                                                <th>Value</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($p->po_detail as $i)
                                                    <tr>
                                                        {{-- <td>{{$p->po_detail->number_item}}</td> --}}
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{ $i->number_item }}</td>
                                                        <td>{{ $i->item_name }}</td>
                                                        <td>{{ $i->sku_dch }}</td>
                                                        <td>{{ $i->uom }}</td>
                                                        <td>{{ idr($i->price_exclude) }}</td>
                                                        <td>{{ idr($i->price_include) }}</td>
                                                        <td>{{ $i->qty }}</td>
                                                        <td>{{ $i->disc . "%" }}</td>
                                                        <td>{{ idr($i->value )}}</td>
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
