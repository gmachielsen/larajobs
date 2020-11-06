@extends('layouts.dashboard.app')

@section('content')
    <h2>Employers</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.company.index')}}">Companies</a></li>
            <li class="breadcrumb-item active">Update</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <form method="POST" action="{{ route('admin.company.update', [$company->id])}}" enctype="multipart/form-data">
            @csrf
            @include('dashboard.partials._errors')
                        <div class="form-group">
                            <label for="">Company name</label>
                            <input type="text" class="form-control" name="cname" value="{{ $company->cname }}">
                            @if($errors->has('cname'))
                                <div class="error" style="color: red;">{{ $errors->first('cname') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $company->address }}">
                            @if($errors->has('address'))
                                <div class="error" style="color: red;">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Street</label>
                            <input type="text" class="form-control" name="street" value="{{ $company->street }}">
                            @if($errors->has('street'))
                                <div class="error" style="color: red;">{{ $errors->first('street') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Housenumber</label>
                            <input type="text" class="form-control" name="housenumber" value="{{ $company->housenumber }}">
                            @if($errors->has('housenumber'))
                                <div class="error" style="color: red;">{{ $errors->first('housenumber') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Postalcode</label>
                            <input type="text" class="form-control" name="postalcode" value="{{ $company->postalcode }}">
                            @if($errors->has('postalcode'))
                                <div class="error" style="color: red;">{{ $errors->first('postalcode') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="city" value="{{ $company->city }}">
                            @if($errors->has('city'))
                                <div class="error" style="color: red;">{{ $errors->first('city') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Province</label>
                            <input type="text" class="form-control" name="province" value="{{ $company->province }}">
                            @if($errors->has('province'))
                                <div class="error" style="color: red;">{{ $errors->first('province') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $company->phone }}">
                            @if($errors->has('phone'))
                                <div class="error" style="color: red;">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $company->email }}">
                            @if($errors->has('email'))
                                <div class="error" style="color: red;">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" class="form-control" name="website" value="{{ $company->website }}">
                            @if($errors->has('website'))
                                <div class="error" style="color: red;">{{ $errors->first('website') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Slogan</label>
                            <input type="text" class="form-control" name="slogan" value="{{ $company->slogan }}">
                            @if($errors->has('slogan'))
                                <div class="error" style="color: red;">{{ $errors->first('slogan') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" value="{{ $company->description }}">{{ $company->description }}</textarea>
                        </div>
               

            <div class="form-group">
                <a class="addphoto" style="width: 50%;" >
                    <!-- <i class="fas fa-plus fa-9x"></i> -->
                        <input id="" type="file" class="form-control foo {{ $errors->has('logo') ? ' is-invalid' : '' }}" 
                        value="{{ old('logo') }}" name="logo" onchange="readURL(this);" >
                        @if ($errors->has('logo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('logo') }}</strong>
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