@extends('layouts.admin')

@section('title') Admin Users @endsection

@section('content')

    <main class="app-content" style="background-color: #f8fafc">

        <div class="row">

            <div class="col-md-12">

                <div class="container">

                    <!-- card start -->
                    <div class="card">

                        <!-- card header -->
                        <div class="card-header">
                            <strong>ALl Users</strong>
                        </div>

                        <!-- card body start -->
                        <div class="card-body">
                            @include('includes.Session_success')
                            <div class="table-responsive">

                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Posts</th>
                                        <th>Comments</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                        <th>Permission</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>

                                            <td><a style="font-size: 15px">{{ $user->name }}</a></td>

                                            <td>{{ $user->email }}</td>

                                            <td>{{ $user->posts()->count() }}</td>

                                            <td>{{ $user->comments()->count() }}</td>

                                            <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                            {{--<td>--}}
                                            {{--<form id="deleteComment-{{ $comment->id }}"--}}
                                            {{--action="{{ route('deleteComment', $comment->id) }}" method="POST">@csrf</form>--}}
                                            {{--<a href="#"--}}
                                            {{--onclick="document.getElementById('deleteComment-{{ $comment->id }}').submit()">--}}
                                            {{--<i class="fa fa-edit"></i></a>--}}
                                            {{--</td>--}}
                                            <td>
                                                @if(Auth::user()->id != $user->id && $user->name != "Chinmay Anand")
                                                <form id="adminDeleteUser-{{ $user->id }}"
                                                      action="{{ route('adminDeleteUser', $user->id) }}" method="POST">@csrf</form>
                                                <a href="#"
                                                   onclick="document.getElementById('adminDeleteUser-{{ $user->id }}').submit()">
                                                    <i class="fa fa-trash-o"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->admin == true && $user->name == "Chinmay Anand")

                                                    <i class="fa fa-superpowers"></i><p style="display: inline" class="ml-1">Admin</p>

                                                @elseif ($user->author == true)

                                                    <i class="fa fa-book"></i><p style="display: inline" class="ml-1">Author</p> -

                                                    <p style="display: inline" class="ml-1">Make</p>

                                                    <a href="{{ route('removeAuthor', $user->id) }}"><i class="fa fa-user ml-2"></i></a>

                                                @else

                                                    <i class="fa fa-user"></i><p style="display: inline" class="ml-1">User</p> -

                                                    <p style="display: inline" class="ml-1">Make</p>

                                                    <a href="{{ route('makeAuthor', $user->id) }}"><i class="fa fa-book ml-2"></i></a>

                                                @endif
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