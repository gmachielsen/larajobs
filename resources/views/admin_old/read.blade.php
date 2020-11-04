@extends('layouts.app')
@section('content')

<div class="album text-muted">
	<div class="container">
		<div class="row" id="app">
			<div class="title" style="margin-top: 20px;">
				<h2>{{$post->title}}</h2>
			</div>
			<img src="{{asset('storage/'.$post->image)}}" style="width: 100%;" alt="">
				<div class="col-lg-8">
					<div class="p-4 mb-8 bg-white">

						<h3 class="h5 text-black mb-3">Created By: Admin &nbsp; {{date('d-m-Y', strtotime($post->created_at))}}</h3>
						<p>{{$post->content}}</p>
					</div>
				</div>
		</div>
	</div>

</div>

@endsection