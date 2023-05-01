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
                    <h1 class="m-0">footer items </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">footer items</li>
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
                <tr>
                    <th style="width: 10px">#</th>
                    <th>address</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>open at</th>
                    <th>close at</th>
                    <th>facebook </th>
                    <th>linkedin </th>
                    <th>instagram </th>

                </tr>
                </thead>
                <tbody>
                @foreach ($footer as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->open_at }}</td>
                        <td>{{ $item->close_at }}</td>
                        <td>{{ $item->facebook }}</td>
                        <td>{{ $item->linkedin }}</td>
                        <td>{{ $item->instagram }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <h4 style="text-align: center" class="m-0">Update footer</h4>

    <div class="container w-50">
        <form action="{{ route('footer.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($footer as $item)
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputAddress1">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputAddress1"
                               value="{{ $item->address }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                               value="{{ $item->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone1">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputPhone1"
                               value="{{ $item->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone1">open_at</label>
                        <input type="time" name="open_at" class="form-control" id="exampleInputPhone1"
                               value="{{ $item->open_at }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone1">close_at</label>
                        <input type="time" name="close_at" class="form-control" id="exampleInputPhone1"
                               value="{{ $item->close_at }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress1">facebook</label>
                        <input type="text" name="facebook" class="form-control" id="exampleInputAddress1"
                               value="{{ $item->facebook }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress1">instagram</label>
                        <input type="text" name="instagram" class="form-control" id="exampleInputAddress1"
                               value="{{ $item->instagram }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress1">linkedin</label>
                        <input type="text" name="linkedin" class="form-control" id="exampleInputAddress1"
                               value="{{ $item->linkedin }}">
                    </div>

                    @endforeach
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">update</button>
                </div>
        </form>
    </div>
    <!-- /.card -->
    <br><br><br>
@endsection
