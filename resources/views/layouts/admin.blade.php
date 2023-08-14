<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Neddful admin dashbord">
    <meta name="keywords" content="trico, tricotage, nedfull">
    <meta name="robots" content="index,follow">
    <meta name="csrf-token" content="{{ csrf_token()  }}">
    <title>@yield('title') | Administration</title>
    @include('common/admin/head')
</head>
<body>
  <div class="container-scroller">
          <!-- partial:partials/_navbar.html -->
          @include('components/admin/partials/navbar')
          <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            @include('components/admin/partials/settings-panel')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('components/admin/partials/sidebar')
            <!-- partial -->    

            <div class="main-panel">
              <div class="content-wrapper">
             @if (session('success'))
                 <div class="alert alert-success">
                    {{session('success')}}
                 </div>
             @endif


             @if ($errors->any())
                 <div class="alert alert-danger">
                  <ul class="my-0">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                  </ul>
                 </div>
             @endif

                @yield('content')
              </div>
               <!-- content-wrapper ends -->
               <!-- partial:partials/_footer.html -->
               <footer class="footer">
                @include('components/admin/partials/footer')
               </footer>
            </div>
             <!-- main-panel ends -->
       </div>
   <!-- page-body-wrapper ends -->
  </div>  
  <!-- container-scroller -->

  <!-- plugins:js -->
    @include('common/admin/foot')
    <script>
      
    </script>
</body>
</html>