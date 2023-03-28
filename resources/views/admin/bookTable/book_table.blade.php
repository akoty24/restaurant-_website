@extends('admin.layout.app')
@section('content')
    <!-- form start -->
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Show Booked Table </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                    <li class="breadcrumb-item active">Show Booked Table </li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card" >
    <div class="container w-50"><a href="{{route('book_table.create')}}"><button
        class="btn btn-block btn-success btn-lg">Add Book Table</button></a>
</div>    <div class="card-body">
        <div class="float-right">{{ $bookTables->links() }}</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>No. People</th>
                    <th>Message</th>
                    <th>added or last updated by</th>
                    <th>Confirm</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Booked at</th>

                </tr>
            </thead>
            <tbody>
                    @foreach ($bookTables as $book )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->email }}</td>
                    <td>{{ $book->phone }}</td>
                    <td>{{ $book->date }}</td>
                    <td>{{ $book->time }}</td>
                    <td>{{ $book->people }}</td>
                    <td>{{ $book->message }}</td>
                    <td>{{$book->user->name}}</td>
                    <td>
                        <form action="{{ route('ConfirmedBookTable.confirmFromHome',$book->id) }}" method="POST" >
                            @csrf
                            <input type="hidden" name="id" value="{{$book->id}}">
                        <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                        </form>
                    </td>

                    <td>
                        <a href="{{ route('book_table.edit',$book->id) }}"  class="btn btn-primary btn-min-width box-shadow-3 mr-1 mb-1 btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('book_table.delete',$book->id) }}"
                           class="btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1 btn-sm">delete</a>
                    </td>
                    <td>{{ $book->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection



