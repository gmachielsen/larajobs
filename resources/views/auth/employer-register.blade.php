@extends('layouts.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row">
         <h1>Werkgevers registratie</h1>   
         

    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       @if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

          <div class="col-md-12 col-lg-8 mb-5">
          
            <form method="POST" action="{{ route('emp.register')}}" class="p-5 bg-white">
                        @csrf

                        <input type="hidden" value="employer" name="user_type">
                        <div class="form-group row">
                    
                            <div class="col-md-12">Bedrijfsnaam</div>

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="bedrijfsnaam" class="form-control{{ $errors->has('cname') ? ' is-invalid' : '' }}" name="cname" value="{{ old('cname') }}" required autofocus>

                                @if ($errors->has('cname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cname') }}</strong>
                                    </span>
                                @endif
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
                    
                            <div class="col-md-12">Wachtwoord</div>

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="wachtwoord" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>

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
                                <input id="password-confirm" type="password" placeholder="bevestig wachtwoord" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>




              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Registreer als werkgever" class="btn btn-primary  py-2 px-5">
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
