@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maak vacature</div>
                <div class="card-body">
                    <form action="{{ route('job.store')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="title">Functie:</label>
                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title')}}">
                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Beschrijving</label>
                            <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ old('description')}}" id="" cols="30" rows="10"></textarea>
                            @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title">Rol:</label>
                            <textarea name="roles" class="form-control {{ $errors->has('roles') ? ' is-invalid' : '' }}" value="{{ old('roles')}}" id="" cols="30" rows="10"></textarea>
                            @if ($errors->has('roles'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('roles') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Vereisten voor deze functie</label>
                            <textarea name="requirements" class="form-control {{ $errors->has('requirements') ? ' is-invalid' : '' }}" value="{{ old('requirements')}}" id="" cols="30" rows="10"></textarea>
                            @if ($errors->has('requirements'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('requirements') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="minimum_salary">Minimumsalaris</label>
                            <input name="minimum_salary" type="number">
                            @if ($errors->has('minimum_salary'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('minimum_salary') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="maximum_salary">Maximumsalaris</label>
                            <input name="maximum_salary" type="number">
                            @if ($errors->has('maximum_salary'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('maximum_salary') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category">Categorie:</label>
                            <select name="category" class="form-control" id="">
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="position">Taken:</label>
                            <input type="text" name="position" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" value="{{ old('position')}}">
                            @if ($errors->has('position'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('position') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Adres:</label>
                            <input type="text" name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address')}}">
                            @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Plaats:</label>
                            <input type="text" name="city" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city')}}">
                            @if ($errors->has('city'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Provincie:</label>
                            <input type="text" name="province" class="form-control {{ $errors->has('province') ? ' is-invalid' : '' }}" value="{{ old('province')}}">
                            @if ($errors->has('province'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('province') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="number_of_vacancy">Vacature nummber:</label>
                            <input type="text" name="number_of_vacancy" class="form-control {{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}" value="{{ old('number_of_vacancy')}}">
                            @if ($errors->has('number_of_vacancy'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="experience">Gewenst aantal jaar ervaring:</label>
                            <input type="text" name="experience" class="form-control {{ $errors->has('experience') ? ' is-invalid' : '' }}" value="{{ old('experience')}}">
                            @if ($errors->has('experience'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('experience') }}</strong>
                            </span>
                            @endif
                        </div>
                        <!-- <div class="form-group">
                            <label for="gender">G:</label>
                            <select name="gender" class="form-control" id="">
                                <option value="any">Any</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="salary">Salarisschaal</label>
                            <select name="salary" class="form-control" id="">
                                <option value="negotiable">Onderhandelbaar</option>
                                <option value="15000 min">20.000 min</option>
                                <option value="20000-30000">20.000-30.000</option>
                                <option value="30000-40000">30.000-40.000</option>
                                <option value="40000-50000">40.000-50.000</option>
                                <option value="50000-70000">50.000-70.000</option>
                                <option value="70000-100000">70.000-100.000</option>
                                <option value="100000 plus">100.000 plus</option>
                            </select>
                        </div> -->

                        <div class="form-group">
                            <label for="level">Level:</label>
                            <select name="level" class="form-control" id="">
                                <option value="Any">Any</option>
                                <option value="Junior">Junior</option>
                                <option value="Medior">Medior</option>
                                <option value="Senior">Senior</option>
                            </select>
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
                            <label for="lastdate">Uiterste datum om te reageren op deze vacature:</label>
                            <input type="date" name="last_date" class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}" value="{{ old('last_date')}}">
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
