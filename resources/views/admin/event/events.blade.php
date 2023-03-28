@extends('admin.layout.app')


@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <!-- form start -->
        <!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Events Page</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
        <li class="breadcrumb-item active">Events Page</li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="card" >
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>

                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>image</th>
                <th>Added or last update by</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $event )
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->desc }}</td>
                    <td>{{ $event->price }}</td>

                    <td> <img style="width: 150px; height: 100px;" src="{{ url('admin/img/event/'.$event->image)}}"
                              class="w-16 h-16 rounded"></td>
                    <td>{{ $event->user->name }}</td>
                    <td>
                        <a href="{{ route('event.edit',$event->id) }}"  class="btn btn-primary btn-min-width box-shadow-3 mr-1 mb-1 btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('event.delete',$event->id) }}"
                           class="btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1 btn-sm">delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- /.card -->
<br>
<div class="container w-50">
    <form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputTitle">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputTitle ">
            </div>
            <div class="form-group">
                <label for="exampleInputDescription">Description</label>
                <textarea  class="form-control" name="desc" id="exampleInputDescription" cols="30" rows="5" ></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPrice">Price</label>
                <input type="number" name="price" class="form-control" id="exampleInputPrice" min="1" value="">
            </div>

            <div class="form-group">
                <label for="exampleInputFile">About Photo</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile"></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputTitle" hidden>User</label>
                <input type="text" name="user_id" class="form-control" id="exampleInputTitle" value="{{ Auth::user()->id}}" hidden>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Add Event</button>
            </div>
        </div>
    </form>
</div>

<br><br><br>
@endsection


