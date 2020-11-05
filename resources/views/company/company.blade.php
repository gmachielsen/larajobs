@extends('layouts.main')
@section('content')
<div class="container">
    <h2>Werkgevers</h2>
    <div class="row">
        @foreach($companies as $company)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                @if(!empty($company->logo))
                <img src="{{asset('avatar/man.jpg')}}" alt="Image" class="img-fluid mx-auto">
                @else
                <img src="{{asset('uploads/logo')}}/{{$company->logo}}" alt="Image" class="img-fluid mx-auto">
                @endif              
                <div class="card-body">
                <h5 class="card-title">{{$company->cname}}</h5>
                <center><a href="{{route('company.index', [$company->id, $company->slug])}}" style="width: 100%;" class="btn btn-primary">Bekijk bedrijfspagina</a></center>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br><br>
    {{$companies->links()}}
</div>
@endsection