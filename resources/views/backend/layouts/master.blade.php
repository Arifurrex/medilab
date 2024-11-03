<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Required meta tags -->
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('css/admn/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admn/medelabstyle.css') }}">
  <link rel="stylesheet" href="node_modules/simple-line-icons/css/simple-line-icons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/admin_style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/2.png" />
  
  <!--fontawosome-->
    <script
      src="https://kit.fontawesome.com/efa8ddcf76.js"
      crossorigin="anonymous"
    ></script>
    
  <!--ths s tnymce for text edtor-->
  <script src="https://cdn.tiny.cloud/1/cqsskizz77qcalb23ove7z2nbwmpfy98a70uylo8e6cfd6bn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   <script>
      tinymce.init({
        selector: '#mytextarea',
        height:300,
        manubar:'file edit format',
        plugins:'advlist lists link autolinkb autosave preview searchreplace wordcount media table emoicons image imagetools',
        toolbar:'bold italic underline| alignleft aligncenter alignright alignjustify | bullist numlist outdent indent|link image media| forecolor backcolor emoicon| code preview searchreplace',
        images_upload_url:'/',
        images_upload_handler:function(blobinfo, success, failure){
          // success(url)
        },
        relative_urls:false,
        automatic_uploads:true,
      });

    </script>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.partials.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
        @include('backend.partials.sidebar')
      <!-- partial -->
      
      
      @yield('content')
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
  <script src="js/maps.js"></script>
  <!-- End custom js for this page-->
</body>

</html>