    @include('includes.header')
    <body>
    @include('includes.nav')
        
        <!-- <a href="{{ route('welcome-mail') }}">Send welcome mail</a> -->
       

        <div class="container" id="content-container">
            <!--<div class="row">
                <div class="col">
                    <h2>Start exploring projects or pitch your own idea</h2>
                </div>
            </div>

            <div class="row actions">
                <div class="col-4 text-center"><a href="{{ route('new-project') }}" class="btn btn-primary">Get your project funded</a></div>
                <div class="col-4 text-center"><a href="/projects" class="btn btn-secondary">Browse current projects</a></div>
            </div>

        </div>-->
        
        <div class="container" id="showcase-container">
        <h2>Featured</h2>
        <div class="container-fluid">
            
            <div class="row equal">
            @foreach ($projects as $project)
                <div class="col-sm-4 d-flex pb-3">
                    <div class="card flex" style="width: 18rem;">
                    @foreach($project->project_images as $image)
                        @if(str_contains($image->path, 'https://'))
                            <img class="card-img-top" src="{{$image->path}}" alt="">
                            @break
                        @else
                            <img class="card-img-top" src="{{ asset('storage/'). '/' . $image->path = str_replace('img/', '', $image->path) }}" alt="">
                        @endif
                    @endforeach

                        <div class="card-body">
                            <h4 class="card-title">{{$project->title}}</h4>
                            <p class="card-text">{{$project->intro}}</p>
                            <p class="card-text">{{$project->description}}</p>
                            <a class="btn btn-danger" href="/project/{{ $project->id }}">Source</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Project created on {{ $project->created_at }} by {{ $project->name}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
            
            </div>
        </div>
        
        </div>

        <div class="container" id="showcase-container">
            <h2>News</h2>

           
            <div class="container-fluid">
            <div class="row equal">
            @foreach($news as $post)
                <div class="col-sm-4 d-flex pb-3">
                    <div class="card flex align-items-stretch" style="width: 18rem;">
                        @if(str_contains($image->path, 'https://'))
                            <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">
                            @break
                        @else
                            <img class="card-img-top" src="{{ asset('storage/'). '/' . $image->path = str_replace('img/', '', $image->path) }}" alt="">
                        @endif
                        
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
    

        </div>
        </div>
    </body>
    @include('includes.footer')
</html>
