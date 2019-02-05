@extends('layouts.admin')

@section('title') Author Comments @endsection

@section('content')

    <main class="app-content" style="background-color: #f8fafc">

        <div class="row">

            <div class="col-md-12">

                <div class="container">

                    <!-- card start -->
                    <div class="card">

                        <!-- card header -->
                        <div class="card-header">
                            <strong>Comments by Days</strong>
                        </div>

                        <!-- card body start -->
                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Post</th>
                                        <th>Content</th>
                                        <th>Created At</th>
                                        {{--<th>Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $comments as $comment)
                                        <tr>
                                            <td>{{ $comment->id }}</td>
                                            <td><a href="{{ route('singlePost', $comment->post->id) }}" style="font-size: 15px">{{ $comment->post->title }}</a></td>
                                            <td>{{ $comment->content }}</td>
                                            <td>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</td>
                                            {{--<td>--}}
                                            {{--<form id="deleteComment-{{ $comment->id }}"--}}
                                            {{--action="{{ route('deleteComment', $comment->id) }}" method="POST">@csrf</form>--}}
                                            {{--<a href="#"--}}
                                            {{--onclick="document.getElementById('deleteComment-{{ $comment->id }}').submit()">--}}
                                            {{--<i class="fa fa-edit"></i></a>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<form id="deleteComment-{{ $comment->id }}"--}}
                                                      {{--action="{{ route('deleteComment', $comment->id) }}" method="POST">@csrf</form>--}}
                                                {{--<a href="#"--}}
                                                   {{--onclick="document.getElementById('deleteComment-{{ $comment->id }}').submit()">--}}
                                                    {{--<i class="fa fa-trash-o"></i></a>--}}
                                            {{--</td>--}}
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