@include('includes.header')
    <body class="backoffice">
    @include('includes.backoffice-nav')
        <div class="container" id="content-container">
            <div class="row">
                <div class="col">
                    <h2>Users</h2>
                </div>
            </div>
            <div class="border mb-4">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">User Projects</th>
                    <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($users as $user)
                    <tr>
                    <td><h5>{{ $user->name }}</h5></td>
                    <td><a href="" data-toggle="modal" data-target="#UPModal{{ $user->id }}" class="btn btn-primary">View User Projects</a></td>
                    <td><a href="{{ route('admin-delete-user', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
            @endforeach
                </tbody>
            </table>    
            </div>
            {{ $users->links() }}
            
        </div>

        
         <!-- UP Modal -->
         <div class="modal fade" id="UPModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="UPModalLabel{{ $user->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fundersModalLabel{{ $user->id }}">{{ $user->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        View all projects of this user
                        <table>
                            <th>Name</th>
                            

                                <tr>
                                    <td>{{ $user->title }}</td>
                                </tr>
                                 
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
