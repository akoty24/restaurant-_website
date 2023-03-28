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

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">About Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">About Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- form start -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <thead >
                <tr>
                    <th >Title 1</th>
                    <th>Description 1</th>
                    <th>Title 2</th>
                    <th>Description 2</th>
                    <th>Title 3</th>
                    <th>Description 3</th>
                    <th>Title 4</th>
                    <th>Description 4</th>
                    <th>Updated by</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($wcys as $wcy )
                    <tr>

                        <td>{{ $wcy->title1 }}</td>
                        <td>{{ $wcy->desc1 }}</td>

                        <td>{{ $wcy->title2 }}</td>
                        <td>{{ $wcy->desc2 }}</td>

                        <td>{{ $wcy->title3 }}</td>
                        <td>{{ $wcy->desc3 }}</td>

                        <td>{{ $wcy->title4 }}</td>
                        <td>{{ $wcy->desc4 }}</td>
                        <td>{{ $wcy->user->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card -->
    <br>

    <h4 style="text-align: center" class="m-0">Update Page</h4>
    <div class="container w-50">
        <form action="{{ route('WhyChooseYummy.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @foreach ($wcys as $wcy )

                    <div class="form-group">
                        <label for="exampleInputTitle">Title</label>
                        <input type="text" name="title1" class="form-control" id="exampleInputTitle"
                               value="{{ $wcy->title1 }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Description</label>
                        <textarea class="form-control" name="desc1" id="exampleInputDescription" cols="30" rows="5">{{ $wcy->desc1}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputTitle">Title</label>
                        <input type="text" name="title2" class="form-control" id="exampleInputTitle"
                               value="{{ $wcy->title2}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Description</label>
                        <textarea class="form-control" name="desc2" id="exampleInputDescription" cols="30" rows="5">{{ $wcy->desc2}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputTitle">Title</label>
                        <input type="text" name="title3" class="form-control" id="exampleInputTitle"
                               value="{{ $wcy->title3 }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Description</label>
                        <textarea class="form-control" name="desc3" id="exampleInputDescription" cols="30" rows="5">{{ $wcy->desc3}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputTitle">Title</label>
                        <input type="text" name="title4" class="form-control" id="exampleInputTitle"
                               value="{{ $wcy->title4 }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Description</label>
                        <textarea class="form-control" name="desc4" id="exampleInputDescription" cols="30" rows="5">{{ $wcy->desc4}}</textarea>
                    </div>

                @endforeach

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">update</button>
            </div>
        </form>
    </div>
    <br><br><br>
@endsection
