@extends('layouts.master')
@section('content')

<!-- Page Header -->
<header class="masthead" style="background-image: url('{{ asset('assets/img/post-bg.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>
                    <h2 class="subheading">{{ $post->sub_title }}</h2>
                    <span class="meta">Posted by
              <a href="#">{{ $post->user->name }}</a>
              on {{ date_format($post->created_at, 'F d, Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              {!! nl2br($post->content) !!}
            </div>
        </div>

        <!-- comments section -->
        <div class="row">

            <div class="col-lg-10 col-md-10 mx-auto">
                <hr>
                <h2>Comments</h2>
                <hr>
                @foreach( $post->comments as $comment)
                    <p> {{ $comment->content }}</p>
                    <p><small>by <a href="#"><strong>{{ $comment->user->name }}</strong></a>, on {{ date_format( $comment->created_at, 'F d, Y') }}</small></p>
                    <hr>
                @endforeach
            </div>

        </div>

        <!-- make comment box-->
        <div class="row">

            <div class="col-lg-10 col-md-10 mx-auto">

                @if(Auth::check())
                    <form action="{{ route('newComment') }}" method="POST">
                        @csrf
                        <div class="form-gruop">
                            <textarea class="form-control" placeholder="Comment..." name="comment" id="" cols="10" rows="3"></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary mt-3" type="submit">Comment</button>
                        </div>

                    </form>
                @endif

            </div>
        </div>

    </div>
</article>

@endsection