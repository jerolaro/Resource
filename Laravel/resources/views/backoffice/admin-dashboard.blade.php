@include('includes.header')
    <body class="backoffice">
    @include('includes.backoffice-nav')
        <!--
        <a href="{{ route('mail-page') }}">Send welcome mail</a>
        -->

        <div class="container" id="content-container">
            <div class="row">
                <div class="col">
                    <h2>Projects</h2>
                </div>
            </div>
<!--
            <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
                <div class="input-group">
                    <label for="search">Search Projects</label>
                    <input type="text" class="form-control col-6" name="search">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
-->
            <div class="border mb-4">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($projects as $project)
                    <tr>
                    <td><a href="/project/{{ $project->projectId }}" class=""><h5>{{ $project->title}}</h5></a></td>
                    <td><a href="{{ route('edit-project', ['projectId' => $project->projectId]) }}" class="btn btn-primary">Edit Project</a></td>
                    <td><a href="{{ route('delete-project', ['projectId' => $project->projectId]) }}" class="btn btn-danger">Delete project</a></td>
                    </tr>
            @endforeach
                </tbody>
            </table>    
            </div>
            {{ $projects->links() }}
            
        </div>
    </body>
</html>
