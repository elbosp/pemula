<!--header end-->
<header class="header dark-bg">
  <div class="toggle-nav">
    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
  </div>

  <!--logo start-->
  <a class="logo">Banana<span class="lite">Latte</span></a>
  <!--logo end-->
  <div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
    <ul class="nav pull-right top-menu">
      <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <!-- <i class="fa fa-sign-out"> Selamat Datang di PEMULA</i> -->
          <span class="username">{{ Auth::user()->nama_pengguna }}</span>
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu extended logout">
          <div class="log-arrow-up"></div>
          <!-- <li>
            <a href="#"><i class="icon_chat_alt"></i> Chats</a>
          </li> -->
          <li>
            <a href="{{route('akun.logout')}}" onclick="return confirm('Apakah anda yakin?')"><i class="icon_key_alt"></i> Log Out</a>
          </li>
        </ul>
      </li>
      <!-- user login dropdown end -->
    </ul>
    <!-- notificatoin dropdown end-->
  </div>
</header>
<!--header end-->
