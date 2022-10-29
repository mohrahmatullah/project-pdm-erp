<div class="sidebar transition overlay-scrollbars animate__animated animate__slideInLeft">
  <div class="sidebar-content">
    <div id="sidebar">
      <!-- Logo -->
      <div class="logo">
        <h2 class="mb-0"><img src="{{url('assets/images/logo.png')}}">PDM</h2>
      </div>
      <ul class="side-menu">
        {{--<li>
          <a href="{{ route('dashboard' )}}" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard </a>
        </li>
        <!-- Divider-->
        <li class="divider" data-text="STARTER">MASTER</li>
        --}}
        @foreach($menu as $row)
          <li>
            <a href="{{ isset($row->menu_link) && !empty($row->menu_link) ? route($row->menu_link) : '#' }}">
              <i class='bx bx-columns icon'></i> {{ $row->menu_name }} 
              @if(count($row->sub) > 0)
              <i class='bx bx-chevron-right icon-right'></i>
              @endif
            </a>

            @if(count($row->sub) > 0)
              <ul class="side-dropdown">
                @foreach($row->sub as $val)
                <li>
                  <a href="{{ isset($val->menu_link) && !empty($val->menu_link) ? route($val->menu_link) : '#' }}">{{ $val->menu_name }}</a>
                </li>
                @endforeach
              </ul>
              @endif
            @endforeach

          </li>

        {{--
        <li>
          <a href="{{ route('list-user') }}"><i class='bx bx-columns icon'></i> User Management</a>
          <a href="{{ route('list-menu') }}"><i class='bx bx-columns icon'></i> Menu Management</a>
        </li>
        <!-- Divider-->
        <li class="divider" data-text="Atrana">Transaction</li>
        <li>
          <a href="#"><i class='bx bx-columns icon'></i> Post <i class='bx bx-chevron-right icon-right'></i></a>
          <ul class="side-dropdown">
            <li>
              <a href="">Post List</a>
            </li>
          </ul>
        </li>--}}
      </ul>
      <div class="ads">
        <div class="wrapper">
          <div class="help-icon">
            <i class="fa fa-sign-out-alt size-icon-1 text-white"></i>
          </div>
          <a class="btn-upgrade" href="{{ route('logout')}}">Sign Out</a>
        </div>
      </div>
    </div>
  </div>
</div>