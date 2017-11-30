function initMap() {
    var latlng = new google.maps.LatLng(41.717562,44.7343701);
    var options = {
        zoom: 15,
        center: latlng,
        scrollwheel: 0,
        navigationControl: 0,
        mapTypeControl: 0,
        scaleControl: 0
    };
    var map = new google.maps.Map(document.getElementById("map"), options);
    
    var marker = new google.maps.Marker(  {
        position: latlng,
        map: map
   });
}

$(document).ready(function(){




// contact-form
   $('.contact_form .form-group input').focus(function () {
    $(this).parent().addClass('contact_inp_bg');
      }).blur(function () {
          $(this).parent().removeClass('contact_inp_bg');
      });
  
  var window_width=$(window).width();
  if(window_width<991){
    $(".category_list h3").click(function(){
        $(".category_list ul").slideToggle();
    });
  }
    $(".search").click(function(){
        $(".search_input").toggleClass("search_input_show");
    });

 $(".news_box_title").hover(function() {
        $(this).siblings("a").addClass("news_hover");
    }, function() {
        $(this).siblings("a").removeClass("news_hover");
    });

   $(".carousel-inner").swiperight(function() {  
          $(this).parent().carousel('prev');  
          });  
       $(".carousel-inner").swipeleft(function() {  
          $(this).parent().carousel('next');  
     });  

     $('.scroll_top').on("click", function () {
        $('html, body').animate({ scrollTop: 0 }, 'fast');
        });
     
$(function() {
  $('#ChangeToggle').click(function() {
    $('#navbar-hamburger').toggleClass('hidden');
    $('#navbar-close').toggleClass('hidden');  
  });
});

  $("#navbar ul").find('> li').click(
            function() {
              
                $(this).find('> ul').slideToggle();
            }
        );

          $("#navbar ul > li  > ul").find('> li').click(
              function(e) { 
                  e.stopPropagation()
                  $(this).find('> ul').slideToggle();   
          });
});
$('#partners_carusel').owlCarousel({
    loop:true,
    margin:20,
   stagePadding:20,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },

        1000:{
            items:5,
            nav:true

        },
        1400:{
            items:6,
            nav:true
        }
    }
});

//zoom image gallery
$('.category-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      
    }
  });
$('#sliderMin').owlCarousel({
    loop:true,
    nav:true,
    margin:20,
    responsiveClass:true,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            
        },
        600:{
            items:2,
          
        },
        1000:{
            items:2,
           
        },
         1200:{
            items:3,
           
        }
    }
})
// gallery
$('#galleryMin').owlCarousel({
    loop:true,
    nav:true,
    margin:15,
    dots: false,
      stagePadding: 15,
    responsiveClass:true,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            
        },
        600:{
            items:2,
          
        },
        1000:{
            items:3,
           
        }
    }
})

$('#imageMin').owlCarousel({
    loop:true,
    nav:true,
    margin:15,
    dots: false,
      stagePadding: 15,
    responsiveClass:true,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            
        },
        600:{
            items:2,
          
        },
        1000:{
            items:3,
           
        }
    }
})


$('#products').owlCarousel({
    loop:false,
    margin:15,
    responsive:{
        0:{
            items:1,
            stagePadding: 15,
            nav:true
        },
        600:{
            items:2,
            nav:true
        },
        1000:{
            items:3,
            touchDrag  : true,
            mouseDrag  : true,
             nav:true
        },
         1200:{
            items:4,
            touchDrag  : false,
            mouseDrag  : false
        }
    }
})