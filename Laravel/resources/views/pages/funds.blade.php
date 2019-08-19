<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
    <?php $page = 'funds';?>
    @include('includes.subnav')
        <div class="container" id="showcase-container">
            <h2>My funds</h2>
            <div class="card">
                <div class="card-header">
                    <h2>Balance</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Balance: {{ $funds->credits }}</h5>
                    <a href="" data-toggle="modal" data-target="#reloadModal" class="btn btn-primary">Credits Kopen</a>
                </div>
            </div>
            <h2>Funded Projects</h2>
            <div class="box">
            @isset($fundedProjects)
            <div class="row">
                <div class="col-12">No projects funded yet</div>
            </div>
            @endisset
            <div class="box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Package</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Link</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($fundedProjects as $fundedProject)
                    <tr>
                    <td><h5>{{ $fundedProject->projectTitle }}</h5></td>
                    <td><h5>{{ $fundedProject->packageTitle }}</h5></td>
                    <td><h5>{{ $fundedProject->packageCredits }}</h5></td>
                    <td><a href="./project/" class="btn btn-primary">View project</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                
            
            </div>

        <h2>Advertise Projects</h2>
            <div class="border">
                <div class="row">
                    <div class="col-12"><p>The advertising feature is still in progress </p></div>
                </div>
            </div>

        </div>
        </div>
        @include('includes.footer')
        
        <!-- Reload Modal -->
        <div class="modal fade" id="reloadmodal" tabindex="-1" role="dialog" aria-labelledby="reloadModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reloadModal">Herladen Acoount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="{{route('add-funds')}}">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="funds">Amount of credits to add</label>
                    <input type="text" name="funds" class="form-control"  placeholder="Amount">
                </div>
                <button type="submit" class="btn btn-primary">Add funds</button>
            </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>


    </body>
</html>
