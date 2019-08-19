@include('includes.header')
    <body class="backoffice">
    @include('includes.backoffice-nav')
        <div class="container" id="content-container">
            <div class="row">
                <div class="col">
                    <h2>Posts</h2>
                    <a href="{{ route('admin-new-post') }}" class="btn btn-primary mb-4">Create new post</a>
                </div>
            </div>
            <div class="border mb-4">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Post</th>
                    <th scope="col">Author</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                    <td><h5>{{ $post->title }}</h5></td>
                    <td><h5>{{ $post->name }}</h5></td>
                    <td><a href="./edit-post/{{ $post->postId }}" class="btn btn-primary">Edit Post</a></td>
                    <td><a href="./delete-post/{{ $post->postId }}" class="btn btn-danger">Delete Post</a></td>
                    </tr>
            @endforeach
                </tbody>
            </table>
                
            {{ $posts->links() }}
            
        </div>
    </body>
</html>
