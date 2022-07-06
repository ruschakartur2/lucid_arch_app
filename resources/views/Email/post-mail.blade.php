@component('mail::message')
    <div>
        <img src="{{$post->post_image}}" width="130px">
        <h2 class="section-heading">{{ $post->title }}</h2>
        <h5>Slug: {{$post->slug}}</h5>
        <h6>Status: {{$post->status}}</h6>
        <a href="#!"><img class="img-fluid" src="{{ asset('img/post-sample-image.jpg') }}" alt="..."/></a>
        <p>
            {{ $post->description }}
        </p>
    </div>

    {{ config('app.name') }}
@endcomponent
