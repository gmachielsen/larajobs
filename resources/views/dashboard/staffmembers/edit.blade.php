@extends('layouts.dashboard.app')

@section('content')
    <h2>Staffmembers</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.staffmembers.index')}}">Staffmembers</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <form method="POST" action="{{ route('admin.staffmembers.update', $staffmember->id)}}" enctype="multipart/form-data">
            @csrf
            @include('dashboard.partials._errors')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $staffmember->name)}}">
            </div>

            <div class="form-group">
                <label>Function</label>
                <input type="text" name="function" class="form-control" value="{{ old('function', $staffmember->function )}}">
            </div>

            <div class="form-group">
                <label>Content</label>
                <input type="hidden" name="description" id="description" cols="30" rows="10" ></input>
                <input id="short_desc" type="hidden" name="description" value="{{ old('description', $staffmember->description)}}">
                <trix-editor input="short_desc" placeholder="Product short description"></trix-editor>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email', $staffmember->email )}}">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $staffmember->phone)}}">
            </div>

            <div class="form-group">
                <label>Phone2</label>
                <input type="text" name="phone2" class="form-control" value="{{ old('phone2', $staffmember->phone2)}}">
            </div>

            <div class="form-group">
                <a class="addphoto" style="width: 50%;" >
                    <!-- <i class="fas fa-plus fa-9x"></i> -->
                        <input id="" type="file" class="form-control foo {{ $errors->has('image') ? ' is-invalid' : '' }}" 
                        value="{{ old('iamge') }}" name="image" onchange="readURL(this);" >
                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
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
            <img id="blah" src="{{ asset('uploads/staffmemberImages') }}/{{ $staffmember->image }}" alt="your image" />
            <br><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection