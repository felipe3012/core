  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
      <div class="top-left-part hidden-xs"><a class="logo" href="{{url('/')}}"><b>
      {!!Html::image('theme/plugins/images/logos/6.jpg',null,['width'=>'150','class'=>'responsive'])!!}
     </a></div>
      <ul class="nav navbar-top-links navbar-left hidden-xs">
        <li>
          <div style="margin-top: 24px;">
           <a href="{!!url('entidad_cambiar')!!}" class="iframe" title="Cambiar entidad" data-icon="fa fa-sitemap"> <h4 style="color: white;">@if(Auth::check()) {{Auth::user()->entidad()}} @endif
            <i class="fa fa-sitemap" style="color: white;"></i></h4></a>
          </div>
        </li>
      </ul>
      <ul class="nav navbar-top-links navbar-right pull-right">
        <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-note"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
          <ul class="dropdown-menu dropdown-tasks animated slideInUp">
            <li> <a href="#">
              <div>
                <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span> </p>
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                </div>
              </div>
              </a> </li>
            <li class="divider"></li>
            <li> <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a> </li>
          </ul>
          <!-- /.dropdown-tasks -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">  {!!Html::image('theme/plugins/images/users/user.ico',null,['width'=>"36", 'class'=>"img-circle"])!!}<b class="hidden-xs">@if(Auth::check()) {{Auth::user()->realname}} @endif</b> </a>
          <ul class="dropdown-menu dropdown-user animated flipInY">
            <li><a href="#"><i class="ti-user"></i> Mi perfil</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{!!url('auth/logout')!!}"><i class="fa fa-power-off"></i> Salir</a></li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
        <!-- /.dropdown -->
      </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
  </nav>