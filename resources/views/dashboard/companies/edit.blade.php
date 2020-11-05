@extends('layouts.dashboard.app')

@section('content')
    <h2>Employers</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.news.index')}}">Companies</a></li>
            <li class="breadcrumb-item active">Update</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <form method="POST" action="{{ route('admin.company.update', [$company->id])}}" enctype="multipart/form-data">
            @csrf
            @include('dashboard.partials._errors')

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->company->address }}">
                            @if($errors->has('address'))
                                <div class="error" style="color: red;">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->company->phone }}">
                            @if($errors->has('address'))
                                <div class="error" style="color: red;">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" class="form-control" name="website" value="{{ Auth::user()->company->website }}">
                            @if($errors->has('address'))
                                <div class="error" style="color: red;">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Slogan</label>
                            <input type="text" class="form-control" name="slogan" value="{{ Auth::user()->company->slogan }}">
                            @if($errors->has('address'))
                                <div class="error" style="color: red;">{{ $errors->first('address') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" value="{{ Auth::user()->company->description }}"></textarea>
                        </div>
               

            <div class="form-group">
                <a class="addphoto" style="width: 50%;" >
                    <!-- <i class="fas fa-plus fa-9x"></i> -->
                        <input id="" type="file" class="form-control foo {{ $errors->has('cover_photo') ? ' is-invalid' : '' }}" 
                        value="{{ old('cover_photo') }}" name="cover_photo" onchange="readURL(this);" >
                        @if ($errors->has('cover_photo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cover_photo') }}</strong>
                            </span>
                        @endif
                        <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#blah')
                                        .attr('src', e.target.result)
                                        .width(250)
                                        .height(250)
                                        .css('object-fit', 'cover');
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>                            
                </a>

            </div>
            <img id="blah" src="{{asset('uploads/logo')}}/{{$company->logo}}" alt="your image" />
            
            <br><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection