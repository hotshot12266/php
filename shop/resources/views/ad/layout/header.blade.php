<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        @if(Auth::user())
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>{{Auth::user()->full_name}}</a>
                        </li>
                        <li><a href="ad/users/sua/{{Auth::user()->id}}"><i class="fa fa-gear fa-fw"></i> Thông tin </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="ad/logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                        @endif
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
          @include('ad.layout.menu')
        </nav>
