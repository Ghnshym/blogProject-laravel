<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    
    @include('admin.header')


    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      
      {{-- main content  --}}
      @include('admin.content')

      {{-- end main content  --}}

        @include('admin.footer')
      
    </div>
    <!-- JavaScript files-->
    @include('admin.script')
  </body>
</html>