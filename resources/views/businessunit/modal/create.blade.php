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
                    <h5 class="modal-title" style="text-align: start">{{ __('Create New Business Unit') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form action="{{ route('business-unit.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Input groups with icon -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('Agency Code')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Agency Code" type="text" name="agency_code"
                                            required>
                                    </div>
                                    @error('agency_code')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('Business Unit')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Business Unit" type="text" name="business_unit"
                                            required>
                                    </div>
                                    @error('business_unit')
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
                                    <label class="form-control-label float-left">{{__('Brand Name')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Brand Name" type="text" name="brand_name"
                                            required>
                                    </div>
                                    @error('brand_name')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('Company')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-font"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Company" type="text" name="company"
                                            required>
                                    </div>
                                    @error('company')
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
                                    <label class="form-control-label float-left">{{__('Image')}}</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-picture"></i></span>
                                        </div>
                                        <input type="file" class="form-control" name="gambar">
                                    </div>
                                    @error('gambar')
                                        <small class="text-danger" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label float-left">{{__('User Business')}}</label>
                                    <div class="input-group input-group-merge">
                                        <select class="form-control" data-toggle="select" multiple name="user_id[]">
                                            @foreach ($user as $k)
                                                <option value="{{ $k->id }}">{{ $k->fullname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('user_id')
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
