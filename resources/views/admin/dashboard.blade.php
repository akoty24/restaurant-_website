@extends('admin.layout.app')
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Home Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Home Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Default box -->

        <div class="card card-solid">
            <div class="card-body pb-0">
                <h3>New Book Table Orders</h3>
                <div class="row">

                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    <h4></h4>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="small"><span> <i class="fas fa-users"></i></span> Count of Guests
                                                :<b> </b></p>
                                            <p class="text-muted text-sm"><span class=><i class="fas fa-clock"></i></span>
                                                Date & time : <b>-jjj</b></p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li ><span class="fa-li"><i
                                                                class="fas fa-comment"></i></span><b>Message:</b>kjbbhbhjvjvvgv
                                                </li>
                                                <li ><span class="fa-li"><i
                                                                class="fas fa-lg fa-phone"></i></span> Phone:
hbhbhb                                                </li>
                                                <br>
                                                <li class="small">
                                                    Created at :vvghvhv
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <form action="" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                                            <a href=""
                                               class="btn btn-sm btn-primary">Details</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="float-right"></div>

            </div>
        </div>


        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bullhorn"></i>
                        Messages
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                        <div class="callout callout-danger">
                            <h5>jnjk</h5>
                            <h6>njjnk</h6>
                            <p>kmlml</p>
                            <p>mjnjknjk</p>
                            <a class="text-right" href="">see more</a>

                        </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
