<li>
    <a href=" {{ route('admin.dashboard') }} "><i class="fa fa-home"></i>Dashboard</a>
</li>

<li><a><i class="fa fa-building-o"></i>Manajemen Parameter <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href=" {{ route('admin.parameter') }} ">Parameter</a></li>
        <li><a href=" {{ route('admin.sub_parameter') }} ">Sub Parameter</a></li>
    </ul>
</li>

<li><a><i class="fa fa-building-o"></i>Manajemen Daerah <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href=" {{ route('admin.kecamatan') }} ">Kecamatan</a></li>
        <li><a href=" {{ route('admin.kelurahan') }} ">Kelurahan</a></li>
    </ul>
</li>

<li style="padding-left:2px;">
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off "></i>{{__('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
