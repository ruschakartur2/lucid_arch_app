@extends('layouts.app')

@section('content')
    <header class="masthead">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Edit Post</h1>
                        <span class="subheading">Keep your post up to date</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Want to share knowledge? Enter the title and content then publish</p>
                    <div class="my-5">
                        <form action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-floating">
                                <input class="form-control @error('title') is-invalid @enderror" name="title"
                                       type="text" value="{{ $post->title }}" placeholder="Enter post title..."
                                       required/>
                                <label for="title">Title</label>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-floating">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                      placeholder="Enter your post here..." style="height: 12rem" required>{{ $post->description }}</textarea>
                                <label for="message">Description</label>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                                <div class="mb-2">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="" disabled>Choose status</option>
                                        @foreach($status_list as $keyStatus => $status)
                                            <option {{$status == $post->status ? 'selected' : ''}} value="{{$keyStatus}}">{{$status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label>Post Image</label>
                                    <input type="file" value="{{$post->getFirstMediaUrl('img')}}" name="img" class="form-control">
                                </div>
                            </div>
                            <br/>
                            <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Publish
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
