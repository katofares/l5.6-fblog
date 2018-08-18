<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row form-group">
                <div class="col col-md-2"><label for="name" class=" form-control-label">Name</label></div>
                <div class="col-12 col-md-10">
                    <input type="text" name="name" id="name" value="{{old('', $category->name)}}"
                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                    @if ($errors->has('name'))<span
                            class="invalid-feedback">{{ $errors->first('name') }}</span> @endif
                </div>
            </div>
        </div>
    </div>
</div>

