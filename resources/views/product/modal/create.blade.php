<div class="modal fade bd-create-sekolah" id="bd-create-sekolah" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                    <h5 class="modal-title" style="text-align: start">{{ __('Create New Product') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Input groups with icon -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('Business Unit')}}</label>
                                    <div class="input-group input-group-merge">
                                        <select class="form-control" data-toggle="select" name="bussines_unit_id" required>
                                            <option value="" selected>{{__('Choose Business Unit')}}</option>
                                            @foreach ($bu as $k)
                                                <option value="{{ $k->id }}">{{ $k->business_unit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('business_unit_id')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('Item Number')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Item Number" type="text" name="item_number"
                                            required>
                                    </div>
                                    @error('item_number')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('SKU DCH')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="SKU DCH" type="text" name="sku_dch"
                                            required>
                                    </div>
                                    @error('sku_dch')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('Item Name')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Item Name" type="text" name="item_name"
                                            required>
                                    </div>
                                    @error('item_name')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('UOM')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="UOM" type="number" name="uom"
                                            required>
                                    </div>
                                    @error('uom')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('CBM')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="CBM" type="number" step="0.000001" name="cbm"
                                            required>
                                    </div>
                                    @error('cbm')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('KGS')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="KGS" type="number" step="0.000001" name="kgs"
                                            required>
                                    </div>
                                    @error('kgs')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('Price')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Price" type="text" name="price"
                                            id="currency-field" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency"
                                            required>
                                    </div>
                                    @error('price')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" href="{{ route('business-unit.index') }}" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                    <!--form end-->
                </div>
            </div>
        </div>
    </div>
</div>
