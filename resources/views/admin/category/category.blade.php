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
                    <h1 class="m-0">Menu Categories Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">Menu Categories Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.card -->
    <br><br><br>

    <div class="card">
        <div class="container w-50">
            <button type="button" class="btn btn-block btn-success" data-toggle="modal"
                data-target="#modal-lg">Add Category</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="float-right"> {{ $categories->links() }}</div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Added or last update by </th>
                        <th>Edite</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>

                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $category->name }}</td>
                            <td class="text-center">{{ $category->user->name }}</td>
                            <td>
                                <a href="{{ route('category.edit',$category->id) }}"  class="btn btn-primary btn-min-width box-shadow-3 mr-1 mb-1 btn-sm">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('category.delete',$category->id) }}"
                                   class="btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1 btn-sm">delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Add category --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <input type="text" name="name" class="form-control" id="exampleInputTitle"
                            value="{{ old('name') }}">
                        <label for="exampleInputTitle"></label>
                        <input type="text" name="user_id" class="form-control" id="exampleInputTitle"
                                                                      value="{{ Auth::user()->id }}" hidden>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
    </div>

@endsection
