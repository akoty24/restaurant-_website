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
                    <h1 class="m-0">Menu Items Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">Menu Items Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container w-50">
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputTitle">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputTitle"
                        value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputDescription">Description</label>
                    <textarea class="form-control" name="desc" id="exampleInputDescription" cols="30" rows="5">{{ old('desc') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputDescription">Category</label>

                    <select class="form-control select2" name="category_id" style="width: 100%;">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" selected="selected">{{ $loop->iteration }} -
                                {{ $category->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="exampleInputPrice">Price</label>
                    <input type="number" name="price" class="form-control" id="exampleInputPrice" min="1"
                        value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">product Photo</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile" value="{{ old('image') }}">
                        <label class="custom-file-label" for="exampleInputFile" >{{ old('image') }}</label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputTitle" hidden>User</label>
                    <input type="text" name="user_id" class="form-control" id="exampleInputTitle"
                        value="{{ Auth::user()->id }}" hidden>
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Add menuItem</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
