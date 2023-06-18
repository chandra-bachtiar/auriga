<div class="row">
    <div class="col-xl-12">
        <div class="form-group">
            <label class="form-control-label">{{ __('Email') }}</label>
            <div class="input-group input-group-merge">
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-font"></i></span>
                    </div>
                    <input class="form-control" value="{{ $mail->email }}" placeholder="Email" type="email" required name="email"
                        required>
                </div>
                @error('email')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
            </div>
        </div>
    </div>
</div>
<a href="{{ route('mailtoauriga.index') }}" class="btn btn-default" type="submit">{{ __('Back') }}</a>
<button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
