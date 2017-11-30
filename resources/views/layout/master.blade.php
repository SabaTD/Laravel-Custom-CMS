<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{URL::current()}}" />
  <meta property="og:title" content="@yield('title', env('APP_NAME', 'Toyota Center Tegeta'))"/>
  <meta property="og:image" content="@yield('img', asset('img/og_image.jpg'))"/>
  <meta property="og:site_name" content="{{env('APP_NAME', 'Toyota Center Tegeta')}}"/>
  <meta property="og:description" content="@yield('desc', env('APP_NAME', 'Toyota Center Tegeta'))"/>
  <link rel="stylesheet" href="{{asset('assets/client/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/fonts.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/bootstrap-select.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/responsive.css')}}">
  <link rel="stylesheet" href="{{asset('assets/client/css/owl.carousel.min.css')}}">


</head>
<body>
  <div class="container-fluid">
    @yield('content')
  </div>
  <!-- Scripts -->

  <script src="{{asset('assets/client/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/client/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/client/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/client/js/bootstrap-select.min.js')}}"></script>
  <script src="{{asset('assets/client/js/custom.js')}}"></script>
  <script src="https://apis.google.com/js/platform.js"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf8wHcO40pliXS8Yq7N0nChcqi_4soUY4&callback=initMap"></script>

  <script type="text/javascript">
    $('.ui-slider-handle').on('change',function(){
      alert({{$percent}});
    });

    $( function() {
      $( "#slider-range" ).slider({
        range: "min",
        value: 15000,
        min: 500,
        max: 30000,
       slide: function(event, ui) {
             $(".sliderValue").val(ui.value);
             var mon = $('.for_cal_mon').val();
             $("#price").html(((ui.value+(ui.value*{{$percent/100}}))/mon).toFixed(2));
          }
      });
       $( ".sliderValue" ).val($( "#slider-range" ).slider( "value" ));
     $("input.sliderValue").keyup(function() {
          var $this = $(this);
          var mon = $('.for_cal_mon').val();
          $("#slider-range").slider("value", $this.val());
          $("#price").html(((Number($this.val())+Number(($this.val()*{{$percent/100}})))/mon).toFixed(2));
      });
    });


  $( function() {
      $( "#slider-range2" ).slider({
        range: "min",
        value: 12,
        min: 1,
        max: 36,
        slide: function( event, ui ) {
        $( ".sliderVal1" ).val(ui.value);
        var num = $('.for_cal_num').val();
        $("#price").html(((Number(num)+Number(num*{{$percent/100}}))/ui.value).toFixed(2));
      }
      });
         $( ".sliderVal1" ).val($( "#slider-range2" ).slider( "value" ));
         $("input.sliderVal1").keyup(function() {
              var $this = $(this);
              var num = $('.for_cal_num').val();
              $("#slider-range2").slider("value", $this.val());
              $("#price").html($this.val()*{{$percent}});
              $("#price").html(((Number(num)+Number(num*{{$percent/100}}))/$this.val()).toFixed(2));
          });
    } );
    function change_model_wel(value) {
      var make_id = value;
      var token = $("meta[name='csrf-token']").attr("content");
    	$.ajax({
        url:"/changemodel",
        type:"post",
        data:"_token="+token+"&id="+make_id,
      })
      .done(function(data){
        if (data == 0) {
    			$('#model').html('');
          $('.selectpicker').selectpicker('refresh');
    		}else {
    			$('#model').html(data);
          $('.selectpicker').selectpicker('refresh');
    		}
      })
    }
  </script>
</body>
</html>
