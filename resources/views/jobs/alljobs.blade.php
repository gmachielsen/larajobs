@extends('layouts.main')
@section('content')


@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-3">
            <form action="{{ route('alljobs')}}" method="get">


                    <div class="form-group">
                        <label>category</label>
                        <select name="category_id" class="form-control" id="">
                                <option value="0">-select-</option>
                            @foreach(App\Category::all() as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>        
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                    </div>
            </form>
          </div>
        @if(count($jobs)>0)
        <div class="col-md-9">
              <div class="row">

        @foreach($jobs as $job)
              <div class="col-md-6 col-lg-4">
                <a href="{{route('jobs.show', [$job->id, $job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                      <div class="card">
                      <div class="logo">
                        <img src="{{asset('uploads/logo')}}/{{ $job->company->logo }}" alt="Image" class="img-fluid mx-auto">
                      </div>
                      <div class="card-body">
                      <div class="align-self-center">
                        <h3>{{ $job->position }}</h3>
                          <div{{ $job->company->cname }}</div>
                          <div class="mr-3"><span class="icon-room mr-1"></span> {{ str_limit($job->city, 15) }}</div>
                          <div><span class="icon-money mr-1"></span>{{ $job->salary }}</div>
                          <div><span class="fa fa-clock-o mr-1"></span>{{$job->created_at->diffForHumans()}}</div>
                      </div>
                      </div>
                      <div class="job-category align-self-center">
                      @if($job->type=='fulltime')
                      <div class="p-3">
                        <span class="text-info p-2 rounded border border-info">{{ $job->type }}</span>
                      </div>
                      @elseif($job->type=='partime')
                      <div class="p-3">
                        <span class="text-danger p-2 rounded border border-danger">{{ $job->type }}</span>
                      </div>
                      @else 
                      <div class="p-3">
                        <span class="text-warning p-2 rounded border border-warning">{{ $job->type }}</span>
                      </div>
                      @endif
                    </div>
                    </div>
                </a>
                <br>
              </div>
              @endforeach
              </div>
              

              </div>
              @else
              No jobs found
              @endif 

    </div>
</div>





@endsection
<!-- <style>
.fa {
    color: #4183D7;
}
</style> -->