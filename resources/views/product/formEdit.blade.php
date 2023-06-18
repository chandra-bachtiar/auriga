<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Business Unit') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group input-group-merge">
                    <select class="form-control" data-toggle="select" name="business_unit_id" required>
                        <option value="{{ $product->business_unit_id }}" selected>{{ $product->bu->business_unit }}
                        </option>
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
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Item Number') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-font"></i></span>
                    </div>
                    <input class="form-control" value="{{ $product->item_number }}" placeholder="Item Number"
                        type="text" name="item_number" required>
                </div>
                @error('item_number')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('SKU DCH') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-font"></i></span>
                    </div>
                    <input class="form-control" value="{{ $product->sku_dch }}" placeholder="SKU DCH" type="text"
                        name="sku_dch" required>
                </div>
                @error('sku_dch')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="form-group">
            <label class="form-control-label">{{ __('Item Name') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-font"></i></span>
                    </div>
                    <input class="form-control" value="{{ $product->item_name }}" placeholder="Item Name"
                        type="text" name="item_name" required>
                </div>
                @error('item_name')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label float-left">{{ __('UOM') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-font"></i></span>
                </div>
                <input class="form-control" value="{{ $product->uom }}" placeholder="UOM" type="number" name="uom"
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
            <label class="form-control-label float-left">{{ __('CBM') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-font"></i></span>
                </div>
                <input class="form-control" value="{{ $product->cbm }}" placeholder="CBM" type="number"
                    step="0.00000000001" name="cbm" required>
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
            <label class="form-control-label float-left">{{ __('KGS') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-font"></i></span>
                </div>
                <input class="form-control" value="{{ $product->kgs }}" placeholder="KGS" type="number"
                    step="0.000001" name="kgs" required>
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
            <label class="form-control-label float-left">{{ __('Price') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-font"></i></span>
                </div>
                <input class="form-control" value="{{ $product->price }}" placeholder="Price" type="number"
                    name="price" required>
            </div>
            @error('price')
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
            <label class="form-control-label float-left">{{ __('Image') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-picture"></i></span>
                </div>
                <input type="file" value="{{ $product->gambar }}" class="form-control" name="gambar" required>
            </div>
            @if (strlen($product->gambar) > 0)
                <br>
                <img src="{{ asset('img/product/' . $product->gambar) }}" width="80px" class="mt-2"
                    style="box-shadow: 3px 3px #d3d3d3; border-radius: 10px">
            @endif
            @error('gambar')
                <small class="text-danger" role="alert">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
</div>

<a href="{{ route('product.index') }}" class="btn btn-default" type="submit">{{ __('Back') }}</a>
<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
