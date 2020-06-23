@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a Job</div>
                <div class="card-body">
                    <form action="{{ route('job.store')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="title">Role:</label>
                            <textarea name="roles" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select name="category" class="form-control" id="">
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" name="position" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="type">Type:</label>
                            <select name="type" class="form-control" id="">
                                <option value="fulltime">fulltime</option>
                                <option value="parttime">parttime</option>
                                <option value="casual">casual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" id="">
                                <option value="1">live</option>
                                <option value="0">draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lastdate">Last date:</label>
                            <input type="date" name="last_date" class="form-control">
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
