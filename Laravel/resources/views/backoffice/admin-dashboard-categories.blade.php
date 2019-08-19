@include('includes.header')
    <body class="backoffice">
    @include('includes.backoffice-nav')
        <div class="container" id="content-container">
            <div class="row">
                <div class="col">
                    <h2>Categories</h2>
                </div>
                <div class="col">
                    <a href="#" data-toggle="modal" data-target="#categoryModal" class="btn btn-primary">Add Category</a>
                </div>
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                        <tr>
                        <td><h5>{{ $category->name }}</h5></td>
                        <td><a href="{{ route('admin-delete-category', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                @endforeach
                </tbody>
            </table>    
        </div>
        {{ $categories->links() }}
    </body>
</html>
