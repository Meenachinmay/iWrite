<!-- USER DASHBOARD -->
@extends('layouts.admin')

@section('title') User Dashboard @endsection

@section('content')
    <main class="app-content">

        <!-- content header -->
        <div class="app-title">

            <div>
                <h1 class="font-weight-light"><i class="fa fa-dashboard"></i> <strong>Dashboard</strong></h1>
                <p>iWrite User's Panel</p>
            </div>

            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Dashboard</li>
            </ul>

        </div>


        <div class="row">
            <!-- USERS
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>Users</h4>
                        <p><b>5</b></p>
                    </div>
                </div>
            </div> -->

            <!-- LIKES
            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
                    <div class="info">
                        <h4>Likes</h4>
                        <p><b>25</b></p>
                    </div>
                </div>
            </div> -->

            <div class="col-md-8 col-lg-6">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-comments-o fa-3x"></i>
                    <div class="info">
                        <h4 class="font-weight-light">Comments</h4>
                        <p><b>{{ Auth::user()->comments->count() }}</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-6">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-book fa-3x"></i>
                    <div class="info">
                        <h4 class="font-weight-light">Commented post</h4>
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
                        <div class="card-body" style="75%;">
                            {!! $chart->container() !!}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>
{!! $chart->script() !!}
@endsection