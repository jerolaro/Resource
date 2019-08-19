<html>
<!DOCTYPE=HTML>
@include('includes.header')

    <body>
    @include('includes.nav')
    @foreach($project->project_images as $image)
        @if(str_contains($image->path, 'https://'))
            <!--<img class="card-img-top" src="{{$image->path}}" alt="">-->
            <style>
                #nav-container {
                background: url({{$image->path}});
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover; 
            }
            </style>
            @elseif(!empty($image->path))
            <style>
                #nav-container {
                background: url("{{ asset('storage/app/img'). '/' . $image->path = str_replace('img/', '', $image->path) }}");
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover; 
            }
            </style>
        @endif                
    @endforeach
        <div class="container" id="showcase-container">
            <h1>{{ $project->title }}</h1>
            <div class="project-detail">
                <div class="col-12"><h4>{{ $project->intro }}</h4></div>
                <div class="col-12"><p>{{ $project->content }}</p></div>
                @if(Carbon\Carbon::parse($project->finalTime)->greaterThan(Carbon\Carbon::now()))
                <small class="text-muted col-12">Project funding will end on {{ Carbon\Carbon::parse($project->finalTime)->format('d-m-Y h:i:s') }}</small>
                @else
                <div class="col-12">Funding ended</div>
                @endif    
                <div class="col-12 mt-4 mb-4">
                    <small class="text-muted">Total percentage funded (Goal: {{$project->credit_goal}} credits)</small>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$total}}%" aria-valuenow="{{ $total }}" aria-valuemin="0" aria-valuemax="100">{{$total}}%</div>
                    </div>
                </div>                   
            </div>

            <h2>Packages</h2>
            <div class="border">
            <div class="border">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">amount</th>
                    <th scope="col">Source</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($packages as $package)
                    @if(Carbon\Carbon::parse($project->finalTime)->greaterThan(Carbon\Carbon::now()))
                    <div class="row">
                        <!-- Prevent to fund own projects -->
                        @if ($project->userId == Auth::id())
                        <tr>
                        <td><h5>{{ $package->title }}</h5></td>
                        <td><h5> {{ $package->credit_amount }}</h5></td>
                        <td><a href="{{ route('add-project-funds') }}" class="btn btn-primary disabled" >Own project</a></td>
                        </tr>
                        @elseif (null != Auth::check())
                        <tr>
                        <td><h5>{{ $package->title }}</h5></td>
                        <td><h5>{{ $package->credit_amount }}</h5></td>
                        <td><form method="POST" action="{{route('add-project-funds') }}">
                            {{ csrf_field() }}
                            <input type="hidden" id="packageId" name="packageId" value="{{$package->packageId}}" >
                            <input type="hidden" id="projectId" name="projectId" value="{{$project->projectId}}" >
                            <div class="col-4"><button class="btn btn-primary" name="form{{ $package->packageId }}">Fund</button></div>
                        </form></td>
                        </tr>
                        @elseif (null == Auth::check())
                        <div class="col-4"><a href="" class="btn btn-primary disabled" >Fund</a></div>
                        @endif  
                    </div>
                    @else
                    <tr>
                        <td><h5>{{ $package->title }}</h5></td>
                        <td><h5>{{ $package->credit_amount}}</h5></td>
                        <td><a href="#" class="btn btn-primary disabled" >Funding ended</a></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            </div>
            </div>

            <div class="row">
                <div class="col-12">
                <h2>Comments</h2>
                <div class="chatContainer">
                    @foreach ($comments as $comment)
                        <li class="commentLi commentstep-1">
                            <table class="form-comments-table">
                                <tr>
                                    <td><span class="glyphicon glyphicon-user"></span></td>
                                    <td><div class="comment-user">{{ $comment->name}}</div></td>
                                <td>
                                </td>
                                <td>
                                    <div class="comment comment-step1">
                                    <p>{{ $comment->comment }}</p>
                                                                  
                                    </div>
                                </td>
                                </tr>
                            </table>
                        </li>

                    @endforeach
                <hr>
                    <form action="{{ route('store-comment') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="comment" id="comment" placeholder="Type a comment"></textarea>
                            <br>
                            <input type="hidden" id="projectId" name="projectId" value="{{$project->projectId}}" >
                            @if (Auth::check())
                            <button class="btn btn-primary" type="submit">Comment</button>
                            @else
                            <button class="btn btn-primary disabled" type="submit">Comment</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        @include('includes.footer')
    </body>
</html>
