@php
$route = Request::route()->getName();
$prefix = Request::route()->getPrefix();
@endphp
<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">

    <div class="user-profile">
      <div class="ulogo">
        <a href="index.html">
          <!-- logo for regular state and mobile devices -->
          <div class="d-flex align-items-center justify-content-center">
            <img src="../images/logo-dark.png" alt="">
            <h3><b>Sunny</b> Admin</h3>
          </div>
        </a>
      </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="{{$route === 'admin.dashboard' ? 'active': ''}}">
        <a href="{{ route('admin.dashboard') }}">
          <i data-feather="pie-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="treeview {{$prefix === '/brand' ? 'active': ''}}">
        <a href="#">
          <i data-feather="message-circle"></i>
          <span>Brand</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{$route === 'all.brand' ? 'active': ''}}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
          <li class="{{$route === 'add.brand' ? 'active': ''}}"><a href="{{ route('add.brand')}}"><i class="ti-more"></i>Add Brand</a></li>
        </ul>
      </li>

      <li class="header nav-small-cap">User Interface</li>

      <li class="header nav-small-cap">EXTRA</li>

      <li class="treeview">
        <a href="#">
          <i data-feather="layers"></i>
          <span>Multilevel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Level One</a></li>
          <li class="treeview">
            <a href="#">Level One
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Level Two</a></li>
              <li class="treeview">
                <a href="#">Level Two
                  <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#">Level Three</a></li>
                  <li><a href="#">Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#">Level One</a></li>
        </ul>
      </li>

      <li>
        <a href="auth_login.html">
          <i data-feather="lock"></i>
          <span>Log Out</span>
        </a>
      </li>

    </ul>
  </section>

  <div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
  </div>
</aside>