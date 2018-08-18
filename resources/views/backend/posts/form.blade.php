<div class="col-lg-8">
    <div class="card">
        <div class="card-body">
            <div class="row form-group">
                <div class="col col-md-2"><label for="title" class=" form-control-label">Title</label></div>
                <div class="col-12 col-md-10">
                    <input type="text" name="title" id="title" value="{{old('', $blog->title)}}"
                           class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
                    @if ($errors->has('title'))<span
                            class="invalid-feedback">{{ $errors->first('title') }}</span> @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2"><label for="slug" class=" form-control-label">Slug</label></div>
                <div class="col-12 col-md-10">
                    <input type="text" id="slug" name="slug" value="{{old('', $blog->slug)}}"
                           class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}">
                    @if ($errors->has('slug'))<span class="invalid-feedback">{{ $errors->first('slug') }}</span> @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2"><label for="excerpt" class=" form-control-label">Excerpt</label></div>
                <div class="col-12 col-md-10">
                    <textarea id="excerpt" name="excerpt" class="form-control" cols="10"
                              rows="10">{{old('', $blog->excerpt)}}</textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2"><label for="body" class=" form-control-label">Body</label></div>
                <div class="col-12 col-md-10">
                    <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}"
                              cols="10" rows="10">{{old('', $blog->body)}}</textarea>
                    @if ($errors->has('body'))<span class="invalid-feedback">{{ $errors->first('body') }}</span> @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="form-group">
            <div class="card-header">
                <label for="published_at" class=" form-control-label">Publication Date</label>
            </div>
            <div class="card-body">
                {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon"><i class="fa fa-calendar"></i></div>--}}
                    {{--<input class="form-control {{ $errors->has('published_at') ? ' is-invalid' : '' }}"--}}
                           {{--name="published_at" value="{{ old('', $blog->published_at) }}">--}}
                    {{--@if ($errors->has('published_at'))<span--}}
                            {{--class="invalid-feedback">{{ $errors->first('published_at') }}</span> @endif--}}
                {{--</div>--}}
                <div class="form-group">
                    <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                        <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input type="text" name="published_at" value="{{ old('', $blog->published_at) }}" class="form-control datetimepicker-input {{ $errors->has('published_at') ? ' is-invalid' : '' }}" data-target="#datetimepicker1"/>
                        @if ($errors->has('published_at'))
                            <span class="invalid-feedback">{{ $errors->first('published_at') }}</span>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card">
        <div class="form-group">
            <div class="card-header">

                <label for="category">Select Category:</label>
            </div>
            <div class="card-body">
                <select name="category_id" class="form-control" id="category">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($blog->category)
                                @if($category->id == $blog->category->id)
                                selected
                                @endif
                                @endif
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="form-group">
            <div class="card-header">
                <label for="image" class="form-control-label">Featured image:</label>
            </div>
            <div class="card-body">
                <div class="input-group">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 250px; height: 200px;">
                            <img src="{{ $blog->image_thumb or 'http://via.placeholder.com/200x150?text=No+Image' }}">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; height: 200px;"></div>
                        <div>
                            <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image" class="from-control"></span>
                            <a href="#" class="btn btn-outline-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                        @if ($errors->has('image'))<span
                                class="invalid-feedback">{{ $errors->first('image') }}</span> @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
