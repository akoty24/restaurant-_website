@extends('admin.layout.app')
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0">Home Page</h3>
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
                                        <div class="col-6">
                                         <h3>Booked Table</h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <span style="float: left;font-size: 20px">Total Items :</span>
                                                @if(\App\Models\BookTable::class)
                                                    <span style="margin-right: 20px;font-size: 20px;color: blue">{{\App\Models\BookTable::all()->count()}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                <h4></h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-6">
                                        <h3>Confirmed Booked Table</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <span style="float: left;font-size: 20px">Total Items :</span>
                                            @if(\App\Models\ConfirmedBookTable::class)
                                                <span style="margin-right: 20px;font-size: 20px;color: blue">{{\App\Models\ConfirmedBookTable::all()->count()}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    <h4></h4>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-6">
                                         <h3>Categories</h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <span style="float: left;font-size: 20px">Total Items :</span>
                                                @if(\App\Models\Category::class)
                                                    <span style="margin-right: 20px;font-size: 20px;color: blue">{{\App\Models\Category::all()->count()}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                <h4></h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-6">
                                        <h3>Products</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <span style="float: left;font-size: 20px">Total Items :</span>
                                            @if(\App\Models\Product::class)
                                                <span style="margin-right: 20px;font-size: 20px;color: blue">{{\App\Models\Product::all()->count()}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                <h4></h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-6">
                                        <h3>Messages </h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <span style="float: left;font-size: 20px">messages_number :</span>
                                            @if(\App\Models\SendMessage::class)
                                                <span style="margin-right: 20px;font-size: 20px;color: blue">{{\App\Models\SendMessage::all()->count()}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    <h4></h4>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-6">
                                         <h3>users</h3>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <span style="float: left;font-size: 20px">users_number :</span>
                                                @if(\App\Models\User::class)
                                                    <span style="margin-right: 20px;font-size: 20px;color: blue">{{\App\Models\User::all()->count()}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                <h4></h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-6">
                                        <h3>chefs</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <span style="float: left;font-size: 20px">chefs_number :</span>
                                            @if(\App\Models\Chef::class)
                                                <span style="margin-right: 20px;font-size: 20px;color: blue">{{\App\Models\Chef::all()->count()}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
