@include('includes.header')
    <body>
    @include('includes.nav')
        <!--
        <a href="{{ route('mail-page') }}">Send welcome mail</a>
        -->

        <div class="container" id="content-container">
            <div class="row">
                <div class="col">
                    <h2>Find out all our news here</h2>
                </div>
            </div>

        </div>
        

        <div class="container" id="showcase-container">
            <div class="row equal">
            @foreach($news as $post)
                <div class="col-sm-4 d-flex pb-3">
                    <div class="card flex align-items-stretch" style="width: 18rem;">
                        <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">{{$post->title}}</h4>
                            <p class="card-text">{{$post->content}}</p>
                            <p class="card-text">{{$post->description}}</p>
                            <a class="btn btn-danger" href="/news/{{ $post->id }}">Source</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Posted on {{ $post->created_at }} by {{ $post->name}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

        </div>
        @include('includes.footer')
    </body>
</html>
