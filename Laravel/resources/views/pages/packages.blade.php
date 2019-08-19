<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
    <?php $page = 'packages';?>
    @include('includes.subnav')
        <div class="container" id="showcase-container">
            @foreach ($packages as $package)
            <div class="border">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><h5>{{ $package->title }}</h5></td>
                    <td><a href="./edit-package/{{ $package->packageId }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="./delete-package/{{ $package->packageId }}" class="btn btn-primary">Delete</a></td>
                    </tr>
                </tbody>
            </table>
            </div>
            @endforeach
            <div class="row">
            <div class="col-4 new_button"><a href="./new-package/" class="btn btn-primary">Create Package</a></div>
        </div>
        </div>
        @include('includes.footer')
    </body>
</html>
