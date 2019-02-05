@extends('layouts.admin')

@section('title') Edit post @endsection

@section('content')

    <main class="app-content">
        <div class="row user">

            <!-- Setting tab goes from here -->
            <div class="col-md-11" style="margin-left: 3rem;">
                <div class="tab-content">
                    <!-- SETTING TIMELINE -->
                    <!-- setting tab start from here -->
                    <div class="tile user-settings">
                        <h4 class="line-head">Edit a Post</h4>

                        <!-- form starts from here-->
                        <form class="login-form" method="POST" action="{{ route('editPostSave', $post->id) }}">
                        @csrf
                        <!-- get success -->
                        @include('includes.Session_success')

                        <!-- get errors -->
                            @include('includes.errors')

                            <div class="row mb-4">

                                <!-- Title form here -->
                                <div class="col-md-6">
                                    <label>Title of your Post</label>
                                    <input name="title" class="form-control" type="text" value="{{ $post->title }}">
                                </div>

                            </div>

                            <!--  sub title form here -->
                            <div class="row mb-4">

                                <div class="col-md-8">
                                    <label>Sub Title of your Post</label>
                                    <input name="sub_title" class="form-control" type="text" value="{{ $post->sub_title }}">
                                </div>

                            </div>

                            <!-- content -->
                            <div class="row">

                                <div class="col-md-8 mb-4">
                                    <label>Content</label>
                                    <textarea name="content" class="form-control" type="text" cols="6" rows="10">{!! $post->content !!}</textarea>
                                </div>

                                <div class="clearfix"></div>

                            </div>

                            <div class="row mb-10">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update </button>
                                </div>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>
    </main>

@endsection