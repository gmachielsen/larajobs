@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row">
         <h1>Werkzoekende registratie</h1>   
         

    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       @if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

          <div class="col-md-12 col-lg-8 mb-5">
          
            <form method="POST" action="{{ route('register') }}" class="p-5 bg-white">

                        @csrf

                        <input type="hidden" value="seeker" name="user_type">
                        <div class="form-group row">
                    
                            <div class="col-md-12">Naam</div>

                            <div class="col-md-12">
                              <input id="name" type="text" placeholder="naam" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                    
                            <div class="col-md-12">E-mail</div>

                            <div class="col-md-12">
                                <input id="email" type="text" placeholder="e-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                    
                            <div class="col-md-12">Geboortedatum</div>

                            <div class="col-md-12">
                            <input id="dob" type="date" placeholder="geboortedatum" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="email">

                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                    
                            <div class="col-md-12">Wachtwoord</div>

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="wacthtwoord" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">Bevestig wachtwoord</div>

                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="bevestig wachtwoord" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        
                        <div class="form-group row">
                    
                            <div class="col-md-12">Geslacht</div>

                            <div class="col-md-12">
                            <input type="radio" name="gender" value="male" required="">Man
                                <input type="radio" name="gender" value="female" required="">Vrouw

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Registreer als werkzoekenden" class="btn btn-primary  py-2 px-5">
                </div>
              </div>

  
            </form>
          </div>

          <div class="col-lg-4">
            
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Meer informatie</h3>
              <p>Zodra je bij ons registreert ontvangt u een link in uw mailbox om uw account te verifiëren.</p>
              <p><a href="#" class="btn btn-primary  py-2 px-4">Meer weten?</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>



     </div>
   </div>
@endsection
