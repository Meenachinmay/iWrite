<!-- USER DASHBOARD -->
@extends('layouts.admin')

@section('title') Author Dashboard @endsection

@section('content')
    <main class="app-content">

        <!-- content header -->
        <div class="app-title">

            <div>
                <h1 class="font-weight-light"><i class="fa fa-dashboard"></i> <strong>Dashboard</strong></h1>
                <p>iWrite Author's Panel</p>
            </div>

            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Dashboard</li>
            </ul>

        </div>


        <div class="row">

            <!-- Posted today -->
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-reddit-alien fa-3x"></i>
                    <div class="info">
                        <h5 class="font-weight-normal">Posted Today</h5>
                        <p><b>5</b></p>
                    </div>
                </div>
            </div>

            <!-- Total posts -->
            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-book fa-3x"></i>
                    <div class="info">
                        <h5 class="font-weight-normal">Total Post</h5>
                        <p><b>25</b></p>
                    </div>
                </div>
            </div>

            <!-- Commented today -->
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-comments-o fa-3x"></i>
                    <div class="info">
                        <h5 class="font-weight-normal">Commented Today</h5>
                        <p><b>{{ Auth::user()->comments->count() }}</b></p>
                    </div>
                </div>
            </div>

            <!-- commented so far -->
            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-bars fa-3x"></i>
                    <div class="info">
                        <h5 class="font-weight-normal">Total Comments</h5>
                        <p><b>{{ Auth::user()->comments->unique('post_id')->count() }}</b></p>
                    </div>
                </div>
            </div>

        </div>

        <!-- comments by days chart will come here -->
        <div class="row">

            <div class="col-md-12">

                <div class="container">

                    <!-- card start -->
                    <div class="card">

                        <!-- card header -->
                        <div class="card-header">
                            Comments by Days
                        </div>

                        <!-- card body start -->
                        <div class="card-body">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>
@endsection