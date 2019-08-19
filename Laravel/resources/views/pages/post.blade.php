<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
    <style>
    #nav-container {
        background: url({{$post->image_path}});
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover; 
    }
    </style>

        <div class="container" id="showcase-container">
            <h2>{{ $post->title }}</h2>
            <small class="text-muted ml-2">{{ $post->created_at }}</small>

                <div class="row">
                    <div class="col-12"><p>{{ $post->content }}</p></div>
                    <div class="col-12"><img class="postImg" src="{{ asset('storage/') . $post->image_path }}" alt=""></div>
                </div>

        </div>
        @include('includes.footer')
    </body>
</html>
