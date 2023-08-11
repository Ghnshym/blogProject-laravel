<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
        .page_title{
            font-size: 30px;
            color: white;
            font-weight: bold;
            padding: 20px;
            text-align: center;
        }
    </style>
  </head>
  <body>
    
    @include('admin.header')


    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      
        <div class="page-content">
            <div>
                <h1 class="page_title">Add Post</h1>
            </div>
            @if(session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>

            @endif
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <form action="{{ url('create_post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Post Title :</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Post Description:</label>
                                <textarea name="description" class="form-control" required></textarea >
                            </div>
                            <div class="form-group">
                                <label for="image">Post Image :</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                            
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

        @include('admin.footer')
      
    </div>
    <!-- JavaScript files-->
    @include('admin.script')
  </body>
</html>