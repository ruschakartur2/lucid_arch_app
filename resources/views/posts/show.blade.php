@extends('layouts.app')

@section('content')
    <header class="masthead" style="background-image: url('img/post-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>Blog Post</h1>
                        <h2 class="subheading">{{ $post->title }}</h2>
                        <span class="meta">
                        Posted by
                        <a href="#!">{{ $post->user->name }}</a>
                        on {{ $post->created_at }}
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <img src="{{$post->post_image}}" width="130px">
                    <h2 class="section-heading">{{ $post->title }}</h2>
                    <h5>Slug: {{$post->slug}}</h5>
                    <h6>Status: {{$post->status}}</h6>
                    <a href="#!"><img class="img-fluid" src="{{ asset('img/post-sample-image.jpg') }}" alt="..."/></a>
                    <p>
                        {{ $post->description }}
                    </p>
                    @if ($post->user->id == auth()->user()->id)
                        <div class="d-flex justify-content-end">

                            <div>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </div>
                        </div>
                    @endif
                    <div class="mb-3 mt-2">
                        @forelse ($post->comments as $comment)
                            <h2>{{$comment->comment}}</h2>
                            <b>{{$comment->user->email}}</b>
                            <i>{{$comment->created_at}}</i>

                            @if ($comment->user->id == auth()->user()->id)
                                <div class="d-flex justify-content-end">
                                    <div>
                                        <form
                                            action="{{ route('posts.comments.destroy', ['post' => $post->id, 'comment' => $comment->id]) }}"
                                            method="DELETE">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-primary"
                                               id="comment_edit_button">Edit</a>

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                    </div>
                                </div>
                            @endif
                            <div class="my-5 update_form" id="update_form" style="display:none">
                                <form action="{{ route('posts.comments.update', ['post' => $post->id, 'comment' => $comment->id]) }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-floating">
                                        <input class="form-control @error('comment') is-invalid @enderror"
                                               name="comment"
                                               value="{{$comment->comment}}"
                                               type="text" placeholder="Enter comment..." required/>
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"/>

                                        <label>Comment</label>
                                        @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <br/>
                                    <button class="btn btn-success text-uppercase" type="submit">Publish</button>
                                </form>
                            </div>
                            <hr>
                        @empty
                            <h4 class="text-center">No Blog post available</h4>
                        @endforelse
                    </div>
                    <div class="my-5">
                        <form action="{{ route('posts.comments.store', ['post' => $post])}}" method="POST">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control @error('comment') is-invalid @enderror" name="comment"
                                       type="text" placeholder="Enter comment..." required/>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"/>
                                <label for="comment">Comment</label>
                                @error('comment')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <br/>
                            <button class="btn btn-success text-uppercase" type="submit">Publish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <script>
        const editButton = document.getElementById('comment_edit_button');
        const updateForm = document.getElementById('update_form');
        editButton.onclick = () => {
            if (updateForm.style.display !== "none") {
                updateForm.style.display = "none";
            } else {
                updateForm.style.display = "block";
            }
        }
    </script>
@endsection


