        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
         <div class="navbar nav_title text-center" >
              <a href="{{url('admin')}}" class="site_title">
                <img src="{{asset('assets/img/logo.png')}}" width="100px">
              </a>
            </div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                @if(Auth::user()->avatar)
                  <img src="{{asset('files/'.Auth::user()->avatar)}}" class="img-circle profile_img">
                @else
                  <img src="{{asset('assets/admin/img/default_avatar.png')}}" class="img-circle profile_img">
                @endif
              </div>
              <div class="profile_info">
                <span>გამარჯობა,</span>
                <h2>{{Auth::user()->name}}!</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
          <div class="clearfix"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="{{url('admin')}}"><i class="fa fa-file-text-o"></i> გვერდები <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="{{url('admin/room?model=Room')}}"><i class="fa fa-home" aria-hidden="true"></i> ოთახები <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="{{url('admin/partner?model=Partner')}}"><i class="fa fa-rocket" aria-hidden="true"></i>პარტნიორები <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="{{url('admin/service?model=Service')}}"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> სერვისები <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="{{url('admin/gallery')}}"><i class="fa fa-picture-o" aria-hidden="true"></i> გალერეა <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="{{url('admin/video')}}"><i class="fa fa-play" aria-hidden="true"></i> ვიდეოსლაიდერი <span class="fa fa-chevron-right"></span></a></li>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
