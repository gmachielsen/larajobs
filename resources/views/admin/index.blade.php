@extends('layouts.app')
@section('content')

<div class="container">


    <div class="row">
        <div class="col-md-4">
        @include('admin.left-menu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <table class="table table-striped">
                <thead>
                <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Satus</th>
                <th>Date</th>
                <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                <td><img src="" width="80"></td>
                <td><a href="" target="_blank" ></a></td>
                <td></td>
                <td>
  
                <a href="" class="badge badge-primary"> Draft</a>
                
                <a href="" class="badge badge-success"> Live</a>
                
                </td>
                <td></td>
                <td>
                <a href=""><button class="btn btn-primary">Edit</button></a>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Delete
                </button>

                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Do you want to delete?
                    </div>
                    <form action="" method="POST">@csrf
                    <div class="modal-footer">
                    <input type="hidden" name="id" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">delete</button>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>




                </td>
                </tr>
                

                </tbody>
                </table>
                

                </div>
            </div>
        </div>
    </div>
</div>


@endsection