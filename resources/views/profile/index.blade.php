@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset('avatar/man.jpg') }}" width="100" alt="">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Your Profile</div>
                <form action="{{ route('profile.create')}}" method="POST">
                @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->profile->address }}">
                        </div>

                        <div class="form-group">
                            <label for="">Experience</label>
                            <textarea type="text" class="form-control" name="experience">
                            {{ Auth::user()->profile->experience }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Bio</label>
                            <textarea type="text" class="form-control" name="bio">
                            {{ Auth::user()->profile->bio }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </div>
               
            </div>
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message')}}
                </div>
            @endif
            </v-container>
        </div>
        </form>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Your information</div>
                <div class="card-body">
                    <p>Name: {{ Auth::user()->name }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <p>Address: {{ Auth::user()->profile->address }}</p>
                    <p>Gender: {{ Auth::user()->profile->gender }}</p>
                    <p>Experience: {{ Auth::user()->profile->experience }}</p>
                    <p>Bio: {{ Auth::user()->profile->bio }}</p>
                    <p>Member On: {{ date('F d Y', strtotime(Auth::user()->created_at ))}}</p>
                </div>
            </div>
        <form action="{{ route('cover.letter')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="card">
                <div class="card-header">Update coverletter</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="cover_letter">
                    <br>
                    <button class="btn btn-success float-right" type="submit">Update</button>
                </div>
            </div>
        </form>
        <br>
        <form action="{{ route('resume')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="card">
                <div class="card-header">Update resume</div>
                <div class="card-body">
                    <input type="file" class="form-control" name="resume">
                    <br>
                    <button class="btn btn-success float-right" type="submit">Update</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
