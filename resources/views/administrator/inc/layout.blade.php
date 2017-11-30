<!DOCTYPE html>

<html >

@include('administrator.inc.head')

<body class="nav-md">

  <div class="container body">

    <div class="main_container">

        @include('administrator.inc.sidebar')

        <div class="top_nav">

          <div class="nav_menu">

            <nav>

              <div class="nav toggle">

                <a id="menu_toggle"><i class="fa fa-bars"></i></a>

              </div>



              <ul class="nav navbar-nav navbar-right">

              <li>

                  <a href="{{url('/')}}" target="_blank"> საიტზე გადასვლა <i class="fa fa-angle-right"></i></a>

                </li>

                <li class="">

                  <a href="{{url('administrator/profile')}}" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  @if(Auth::user()->avatar)
                    <img src="{{asset('files/'.Auth::user()->avatar)}}">
                  @else
                    <img src="{{asset('assets/admin/img/default_avatar.png')}}">
                  @endif
                    {{Auth::user()->name}} {{Auth::user()->surname}}

                    <span class=" fa fa-angle-down"></span>

                  </a>

                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    {{-- <li><a href="{{url('admin/admins/edit')}}/{{Auth::user()->id}}" data-remote="false" data-toggle="modal" data-target="#modal" ><i class="fa fa-user pull-right"></i> პროფილი</a></li> --}}

                    <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          <i class="fa fa-sign-out pull-right"></i> გასვლა
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>

                  </ul>

                </li>



                  </ul>

                </li>

              </ul>

            </nav>

          </div>

        </div>

        <!-- /top navigation -->



        <!-- page content -->

        <div class="right_col" role="main">

         @include('administrator.inc.errors')

         @yield('content')

        </div>

        </div>

        </div>

        </div>

        </div>
        </div>
        </div>
        </div>

        <!-- /page content -->

<footer>

  <div class="pull-right">

    <a href="https://smartweb.ge" target="_blank">Smart Web</a> Admin Panel

  </div>

  <div class="clearfix"></div>

</footer>



  </div>

</div>



@include('administrator.inc.footer')

<script type="text/javascript">

$(document).ready(function() {

$("#modal").on("show.bs.modal", function(e) {

    var link = $(e.relatedTarget);
    $(this).find(".modal-body").load(link.attr("href"));

  });



  $("#createModal").on("show.bs.modal", function(e) {

    var link = $(e.relatedTarget);

    $(this).find(".modal-body").load(link.attr("href"));

  });

});

</script>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">რედაქტირება</h4>

      </div>

      <div class="modal-body"></div>

    </div>

  </div>

</div>



<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">რედაქტირება</h4>

      </div>

      <div class="modal-body"></div>

    </div>

  </div>

</div>



</body>

</html>
