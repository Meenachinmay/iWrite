<!-- USER DASHBOARD -->
@extends('layouts.admin')

@section('title') Author Dashboard @endsection

@section('content')
    <main class="app-content">

        <!-- content header -->
        <div class="app-title">

            <div>
                <h1 class="font-weight-light"><i class="fa fa-dashboard"></i> <strong>Dashboard</strong></h1>
                <p>iWrite Admin's Panel</p>
            </div>

            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Dashboard</li>
            </ul>

        </div>


        <div class="row">

            <!-- Total Posts -->
            <div class="col-md-6 col-lg-4">
                <div class="widget-small warning coloured-icon"><i class="icon fa fa-reddit-alien fa-3x"></i>
                    <div class="info">
                        <h5 class="font-weight-normal">Posts</h5>
                        <p><b>{{ \App\Post::all()->count() }}</b></p>
                    </div>
                </div>
            </div>

            <!-- Total comments -->
            <div class="col-md-6 col-lg-4">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-comments-o fa-3x"></i>
                    <div class="info">
                        <h5 class="font-weight-normal">Comments</h5>
                        <p><b>{{ \App\Comment::all()->count() }}</b></p>
                    </div>
                </div>
            </div>

            <!-- Users -->
            <div class="col-md-6 col-lg-4">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-user fa-3x"></i>
                    <div class="info">
                        <h5 class="font-weight-normal">Users</h5>
                        <p><b>{{  \App\User::all()->count() }}</b></p>
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
                            Posts by Days
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