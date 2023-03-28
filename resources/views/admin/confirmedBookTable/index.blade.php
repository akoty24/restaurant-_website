@extends('admin.layout.app')
@section('content')
    <!-- form start -->
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Show Confirmed Booked Table </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                    <li class="breadcrumb-item active">Show Confirmed Booked Table </li>
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
        <div class="float-right">{{ $confirmedBookTables->links() }}</div>
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
                    <th>Delete</th>
                    <th>Confirmed at</th>

                </tr>
            </thead>
            <tbody>
                    @foreach ($confirmedBookTables as $confirmedBookTable )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $confirmedBookTable->name }}</td>
                    <td>{{ $confirmedBookTable->email }}</td>
                    <td>{{ $confirmedBookTable->phone }}</td>
                    <td>{{ $confirmedBookTable->date }}</td>
                    <td>{{ $confirmedBookTable->time }}</td>
                    <td>{{ $confirmedBookTable->people }}</td>
                    <td>{{ $confirmedBookTable->message }}</td>
                    <td>{{$confirmedBookTable->user->name }}</td>
                    <td>
                    <a href="{{ route('ConfirmedBookTable.delete',$confirmedBookTable->id) }}"  class="btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1 btn-sm">Delete</a>
                    </td>
                    <td>{{ $confirmedBookTable->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
<br>
<br>
@endsection



