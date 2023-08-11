<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                <h1 class="page_title">All Post</h1>
            </div>
            @if(session()->has('message'))

            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
            @endif

            <div>

                <table class="table table-responsive table-striped table-bordered" style="color: white;text-align:center;">
                    <tr style="background-color: rgb(106, 104, 194)">
                        <th>Post_Titie</th>
                        <th>Description</th>
                        <th>User_Name</th>
                        <th>User_Type</th>
                        <th>Post_Status</th>
                        <th>Post_Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>

                @foreach ($post as $post )
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->user_type }}</td>
                        <td>{{ $post->post_status }}</td>
                        <td>
                            <img src="/post_image/{{ $post->image }}" alt="" width="200px;" height="200px;">
                        </td>
                        <td>
                            <a onclick="confirmation(event)" href="{{ url('delete_post', $post->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ url('update_page', $post->id) }}">Update</a>
                        </td>
                        
                    </tr>
                @endforeach 
                </table>
            </div>
            
        </div>

        @include('admin.footer')
      
    </div>
    <!-- JavaScript files-->
    @include('admin.script')


    <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to Delete this post",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  


        });

        
    }
</script>
  </body>
</html>