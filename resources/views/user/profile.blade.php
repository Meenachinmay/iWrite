@extends('layouts.admin')


@section('content')

    <main class="app-content">
        <div class="row user">

            <!-- Header Profile  (Profile image, cover image, bio)-->
            <div class="col-md-12">
                <div class="profile">
                    <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
                        <h4>{{ Auth::user()->name }}</h4>
                        <p>FrontEnd Developer</p>
                    </div>
                    <div class="cover-image"></div>
                </div>
            </div>

            <!-- Setting tab goes from here -->
            <div class="col-md-10" style="margin-left: 6rem;">
                <div class="tab-content">
                    <!-- SETTING TIMELINE -->
                    <!-- setting tab start from here -->
                        <div class="tile user-settings">
                            <h4 class="line-head">{{ Auth::user()->name }} 's  Profile Settings</h4>

                            <!-- form starts from here-->
                            <form class="login-form" method="POST" action="{{ route('userProfilePost') }}">
                                @csrf
                                @include('includes.errors')
                                <div class="row mb-4">
                                    <!-- First name form here -->
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input name="name" class="form-control" type="text" value="{{ Auth::user()->name }}">
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-4">
                                        <label>Email</label>
                                        <input name="email" class="form-control" type="email" value="{{ Auth::user()->email }}">
                                        <small><p style="font-size: 10px">
                                                <strong>We never share your email with any third party.</strong></p></small>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-md-6 mb-4">
                                        <label>Current Password</label>
                                        <input name="password" class="form-control" type="password">
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-md-6 mb-4">
                                        <label>New Password</label>
                                        <input name="new_password" class="form-control" type="password">
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="col-md-6 mb-4">
                                        <label>Confirmed New Password</label>
                                        <input name="new_password_confirmed" class="form-control" type="password">
                                    </div>

                                </div>
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                </div>
            </div>
        </div>
    </main>
@endsection