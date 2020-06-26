@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Job</div>
                <div class="card-body">
                    <form action="{{ route('job.store')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $jobs->title }}">
                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="" cols="30" rows="10">{{ $jobs->description }}</textarea>
                            @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title">Role:</label>
                            <textarea name="roles" class="form-control {{ $errors->has('roles') ? ' is-invalid' : '' }}" id="" cols="30" rows="10">{{ $jobs->roles }}</textarea>
                            @if ($errors->has('roles'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('roles') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category" class="form-control" id="">
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id==$jobs->category_id?'selected':''}}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" name="position" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" value="{{ $jobs->position }}">
                            @if ($errors->has('position'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('position') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ $jobs->address }}">
                            @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="type">Type:</label>
                            <select name="type" class="form-control" id="">
                                <option value="fulltime"{{$jobs->type=='fulltime'?'selected':''}}>fulltime</option>
                                <option value="parttime"{{$jobs->type=='parttime'?'selected':''}}>parttime</option>
                                <option value="casual"{{$jobs->type=='casual'?'selected':''}}>casual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" id="">
                                <option value="1"{{ $jobs->status=='1'?'selected':''}}>Live</option>
                                <option value="0"{{ $jobs->status=='0'?'selected':''}}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lastdate">Last date:</label>
                            <input type="date" name="last_date" class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}" value="{{ $jobs->last_date }}">
                            @if ($errors->has('last_date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_date') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message')}}
                                </div>
                            @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection