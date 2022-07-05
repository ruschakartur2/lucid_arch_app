        <div class="col-12">
            <div class="blog-card blog-card-blog">
                <div class="blog-card-image">
                    <a href="#"> <img class="img" src="{{$post->getFirstMediaUrl('img')}}"> </a>
                    <div class="ripple-cont"></div>
                </div>
                <div class="blog-table">
                    <h6 class="blog-category blog-text-success"><i class="far fa-newspaper"></i>{{$post->status}}</h6>
                    <h4 class="blog-card-caption">
                        <a href="#">{{$post->title}}</a>
                    </h4>
                    <p class="blog-card-description">{{ $post->description }}</p>
                    <div class="ftr">
                        <div class="author">
                            <span>{{$post->user->email}}</span>
                        </div>
                        <div class="stats"> <i class="far fa-clock"></i> {{ $post->created_at }} </div>
                    </div>
                </div>
            </div>
        </div>
