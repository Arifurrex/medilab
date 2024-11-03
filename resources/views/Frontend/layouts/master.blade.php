<html>
<head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> @yield('title','MediLab') </title>
    @include('Frontend.partial.styles')
    @include('Frontend.partial.wow')

</head>
<body>
        @include('Frontend.partial.nav2')
        @include('Frontend.partial.massages') 
        
        @yield('content')
        @include('Frontend.partial.footer')
        @include('Frontend.partial.scripts')
        @yield('script')
       

</body>
</html>



