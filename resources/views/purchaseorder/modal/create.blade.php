<div class="modal fade bd-add-product" id="bd-add-product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 100%">
        <div class="modal-content">
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
                    <h5 class="modal-title" style="text-align: start">{{ __('Add Product to Purchase Order') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('po.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Input groups with icon -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        {{-- <input class="form-control" placeholder="Search" type="text"
                                            name="search_product"> --}}
                                        {{-- <select class="form-control" data-toggle="select" multiple data-placeholder="Select multiple options" name="item_number">
                                            @foreach ($product as $k)
                                                <option value="{{ $k->id }}">{{ $k->item_number }}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-flush" id="table-product">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>Item Number</th>
                                    <th>Item Name</th>
                                    <th style="text-align: center; width: 50px">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $index => $prod)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $index + 1 }}</td>
                                        <td style="vertical-align: middle">{{ $prod->item_number }}</td>
                                        <td style="vertical-align: middle">{{ $prod->item_name }}</td>
                                        <td style="vertical-align: middle" align="center"
                                            data-json="{{ json_encode($prod) }}">
                                            <button id="btn-add-product"
                                                class="btn btn-sm btn-icon btn-primary btn-icon-only rounded-circle"
                                                data-toggle="tooltip" data-placement="top" title="Add Product">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                    <!--form end-->
                </div>
            </div>
        </div>
    </div>
</div>

