@extends('layouts.admin')

@section('title') Admin Post @endsection
@section('content')

    @include('includes.Session_success')

    <main class="app-content" style="background-color: #f8fafc">

        <div class="row">

            <div class="col-md-12">

                <div class="container">

                    <!-- card start -->
                    <div class="card">

                        <!-- card header -->
                        <div class="card-header">
                            <strong>All Posts</strong>
                        </div>

                        <!-- card body start -->
                        <div class="card-body">
                            @include('includes.Session_success')
                            <div class="table-responsive">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td><a href="{{ route('singlePost', $post->id) }}" style="font-size: 15px">{{ $post->title }}</a></td>
                                            <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                                            <td>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</td>
                                            <td>{{ $post->comments()->count()  }}</td>
                                            <td>
                                                <form id="adminDeletePost-{{ $post->id }}"
                                                      action="{{ route('adminDeletePost', $post->id) }}" method="POST">@csrf</form>

                                                <!-- edit post link is here -->
                                                <a href="{{ route('adminEditPost', $post->id) }}"><i class="fa fa-edit mr-4"></i></a>

                                                <!-- delete post link is here -->
                                                <a href="#"
                                                   onclick="document.getElementById('adminDeletePost-{{ $post->id }}').submit()">
                                                    <i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

@endsection