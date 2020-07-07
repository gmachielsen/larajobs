@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Job</div>
                <div class="card-body">
                    <form action="{{ route('job.update', [$jobs->id])}}" method="POST">
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
                            <select name="category_id" class="form-control" id="">
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
                            <label for="number_of_vacancy">Number of vacancy:</label>
                            <input type="text" name="number_of_vacancy" class="form-control {{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}" value="{{ $jobs->number_of_vacancy }}">
                            @if ($errors->has('number_of_vacancy'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="experience">Year of experience:</label>
                            <input type="text" name="experience" class="form-control {{ $errors->has('experience') ? ' is-invalid' : '' }}" value="{{ $jobs->experience }}">
                            @if ($errors->has('experience'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('experience') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select name="gender" class="form-control" id="">
                                <option value="any"{{$jobs->gender=='any'?'selected':''}}>Any</option>
                                <option value="male"{{$jobs->gender=='male'?'selected':''}}>Male</option>
                                <option value="female"{{$jobs->gender=='female'?'selected':''}}>Female</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="salary">Salary/year:</label>
                            <select name="salary" class="form-control" id="">
                                <option value="negotiable"{{$jobs->salary=='negotiable'?'selected':''}}>Negotiable</option>
                                <option value="15000 min"{{$jobs->salary=='15000 min'?'selected':''}}>20.000 min</option>
                                <option value="20000-30000"{{$jobs->salary=='20000-30000'?'selected':''}}>20.000-30.000</option>
                                <option value="30000-40000"{{$jobs->salary=='30000-40000'?'selected':''}}>30.000-40.000</option>
                                <option value="40000-50000"{{$jobs->salary=='40000-50000'?'selected':''}}>40.000-50.000</option>
                                <option value="50000-70000"{{$jobs->salary=='50000-70000'?'selected':''}}>50.000-70.000</option>
                                <option value="70000-100000"{{$jobs->salary=='70000-100000'?'selected':''}}>70.000-100.000</option>
                                <option value="100000 plus"{{$jobs->salary=='100000 plus'?'selected':''}}>100.000 plus</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="level">Level:</label>
                            <select name="level" class="form-control" id="">
                                <option value="Any"{{$jobs->level=='Any'?'selected':''}}>Any</option>
                                <option value="Junior"{{$jobs->level=='Junior'?'selected':''}}>Junior</option>
                                <option value="Medior"{{$jobs->level=='Medior'?'selected':''}}>Medior</option>
                                <option value="Senior"{{$jobs->level=='Senior'?'selected':''}}>Senior</option>
                            </select>

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
