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



    <div class="card">
        <div class="container w-50"><a href="{{route('product.create')}}"><button
                    class="btn btn-block btn-success btn-lg">Add Item</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="float-right"> {{ $products->links() }}</div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10px">#</th>

                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>image</th>
                            <th>Added or last update by</th>
                            <th>Edite</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="text-center">

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->desc }}</td>
                                <td>{{ $product->categories?->name}}</td>
                                <td>{{ $product->price }}</td>

                                <td> <img style="width: 150px; height: 100px;" src="{{ url('admin/img/product/'.$product->image)}}"
                                          class="w-16 h-16 rounded"></td>
                                <td>{{ $product->user->name }}</td>
                                <td>
                                    <a href="{{ route('product.edit',$product->id) }}"  class="btn btn-primary btn-min-width box-shadow-3 mr-1 mb-1 btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ route('product.delete',$product->id) }}"
                                       class="btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1 btn-sm">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
