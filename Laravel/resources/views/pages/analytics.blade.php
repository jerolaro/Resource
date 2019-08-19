<html>
<!DOCTYPE=HTML>
@include('includes.header')
    <body>
    @include('includes.nav')
    <?php $page = 'analytics';?>
    @include('includes.subnav')
        <div class="container" id="showcase-container">
            @foreach ($projects as $project)
            <div class="border">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Progress</th>
                    <th scope="col">PDF</th>
                    <th scope="col">Funders</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><a href="./project/{{ $project->id }}" class=""><h5>{{ $project->title}}</h5></a></td>
                    <td><a href="" data-toggle="modal" data-target="#progressModal{{ $project->id }}" class="btn btn-primary">View Progress</a></td>
                    <td><a href="{{ route('show-pdf', ['id' => $project->id]) }}" class="btn btn-primary" style="margin-right:10px;">Show PDF</a><a href="{{ route('download-pdf', ['id' => $project->id]) }}" class="btn btn-primary">Download PDF</a></td>
                    <td><a href="" data-toggle="modal" data-target="#fundersModal{{ $project->id }}" class="btn btn-primary">Funders</a></td>
                    </tr>
                </tbody>
            </table>
            </div>
            @endforeach


        @foreach($projects as $project)
         <!-- Funders Modal -->
         <div class="modal fade" id="fundersModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="fundersModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fundersModalLabel{{ $project->id }}"> funders on {{ $project->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="border">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Package</th>
                            <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($project->packages as $package)
                            @foreach($package->sponsors as $sponsor)
                                <tr>
                                    <td>{{ App\User::find($sponsor->user_id)->name }}</td>
                                    <td>{{ $package->title }}</td>
                                    <td>{{ $package->credit_amount }} credits</td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
            @endforeach

            @foreach($projects as $project)
            <!-- Progress Modal -->
            <div class="modal fade" id="progressModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="progressModalLabel{{ $project->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="progressModalLabel{{ $project->id }}">{{ $project->title }} progress</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="display:none">{{ $total = 0 }}</p>
                    @foreach($project->sponsors as $sponser)
                    <p style="display:none">{{ $total = $total + $sponsor->fundings->credit_amount }}</p>
                    @endforeach
                    <p>Total fundings = {{ $total }}</p>
                    @if($total > 0)
                    <p>Project has reached {{ round(($total / $project->credit_goal) * 100, 1) }}% of the funding goal</p>
                    <div id="chart-div"></div>
                        // With Lava class alias
                        <?= Lava::render('PieChart', 'Resourced', 'chart-div') ?>
                    @else
                    <p>Projects hasn't received any funding yet</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
            </div>
            @endforeach
            @linechart('Stocks', 'stocks-div')
        </div>
        @include('includes.footer')
    </body>
</html>
