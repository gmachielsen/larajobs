@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Employers</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Companies</li>
        {{--<li class="breadcrumb-item active">Data</li>--}}
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile mb-4">

                <div class="row">

                    <div class="col-12">

                        <form action="">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="search" autofocus class="form-control" placeholder="search" value="{{ request()->search }}">
                                    </div>
                                </div><!-- end of col -->

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                    
                                        <!-- <a href="{{ route('admin.blogs.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a> -->

                                </div>
                            </div><!-- end of row -->

                        </form><!-- end of form -->

                    </div><!-- end of col 12 -->

                </div><!-- end of row -->
        
                <div class="row">
                    <div class="col-md-12">
                        @if ($companies->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Action</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($companies as $index=>$company)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        @if(!empty($company->logo))
                                        <td><img width="50" src="{{asset('uploads/logo')}}/{{$company->logo}}"></td>
                                        @else
                                        <td><img width="50" src="{{asset('avatar/man.jpg')}}"></td>
                                        @endif
                                        <td>{{ $company->cname }}</td>
                                        <td>{{ $company->phone }}</td>
                                        <td>{{ $company->email }}</td>


                                        <td>
                                                <a href="{{ route('admin.company.edit', [$company->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> View</a>
                                                
                                                <!-- <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i> Delete</button> -->
                                        </td>
                                    </tr>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete {{ $company->cname }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>You are going to delete {{ $company->cname }}. Are you sure?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="POST" action="{{ route('admin.company.delete', [ $company->id])}}">
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
                                @endforeach

                                </tbody>
                            </table>
                            {{ $companies->appends(request()->query())->links() }}
                        @else
                            <h3 style="font-weight: 400;">Sorry no records found</h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->




@endsection