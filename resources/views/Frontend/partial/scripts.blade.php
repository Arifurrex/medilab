<script src="{{asset('js/jquery-3.4.1.slim.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="owl/owl.carousel.min.js"></script>

  <script>
 
        $("#team-carousel").owlCarousel({
             loop:true,
        margin:15,
        // nav:true,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        responsive:{
          0:{
            items:1
          },
          600:{
            items:4
          },
          1000:{
            items:5
          }
        }
        });
      $('.owl-carousel').owlCarousel({
        loop:true,
        margin:15,
        // nav:true,
        autoplay:true,
        autoplayTimeout:7000,
        autoplayHoverPause:true,
        responsive:{
          0:{
            items:1
          },
          600:{
            items:4
          },
          1000:{
            items:5
          }
        }
      });
     
  
    </script>
 



