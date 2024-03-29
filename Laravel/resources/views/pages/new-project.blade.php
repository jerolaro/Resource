<html>
<!DOCTYPE=html>
@include('includes.header')
    <body>
    @include('includes.nav')
    <?php $page = 'dashboard';?>
    @include('includes.subnav')
        <div class="container" id="showcase-container">
            <div class="row">
                <div class="col-8"><h2>New Project</h2></div>
            </div>
            <form method="POST" action="{{ route('post-new-project') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control"  placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Description" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="intro">Introduction</label>
                    <textarea class="form-control" name="intro" placeholder="Enter Introduction" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control"  name="content" placeholder="Enter Content" rows="6"></textarea>
                </div>

                <div class="form-group">
                <label for="image">Add Images</label>
                    <input type="file" name="image[]" multiple>
                </div>
                
                <div class="form-group">
                    <label for="credits" >Funding Goal</label>
                    <input type="text" class="form-control" name="credits" placeholder="Credit Amount">
                </div>
                
                <div class="form-group">
                    <label for="time">Funding Ends On</label>
                    <input type="date" class="form-control" name="time" placeholder="time">
                </div>
                
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @include('includes.footer')
    </body>
</html>
