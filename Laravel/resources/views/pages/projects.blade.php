<!doctype=html>
<html lang="{{ app()->getLocale() }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('includes.header')


    <body>
    @include('includes.nav')

        <div class="container" id="showcase-container">
        
                <div class="col"><h2>All Projects</h2></div>
                <div class="row">
                <div class="col">
                    <form action="{{ route('search-project') }}" method="POST" novalidate="novalidate">
                        @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row searchbar">
                                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <input type="text" name="search" id="search" class="form-control search-slt" placeholder="Search project">
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <select class="form-control search-slt" name="orderBy" id="orderBy">
                                                <option value="title">Project Title</option>
                                                <option value="final_time">Date</option>
                                                <option value="category_id">Category</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <select class="form-control search-slt" name="order" id="order">
                                                <option value="ASC">Ascending</option>
                                                <option value="DESC">Descending</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                            <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            
            
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
            
            
            
        </div>
        @include('includes.footer')
    </body>
</html>
