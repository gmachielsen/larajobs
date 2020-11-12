@extends('layouts.app')
@section('content')

<div class="album text-muted">
	<div class="container">
		<div class="row" id="app">
			<div class="title" style="margin-top: 20px;">
				<h2>{{$blog->title}}</h2>
			</div>
            <img src="{{ asset('uploads/blogImages') }}/{{ $blog->image }}" width="100px" style="width: 100px" alt="">
				<div class="col-lg-8">
					<div class="p-4 mb-8 bg-white">

						<h3 class="h5 text-black mb-3">Created By: Admin &nbsp; {{date('d-m-Y', strtotime($blog->created_at))}}</h3>
						<p>{!! $blog->content !!}</p>
					</div>
				</div>
		</div>
	</div>

</div>

@endsection