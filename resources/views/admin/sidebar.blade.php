<li>
    <a href=" {{ route('admin.dashboard') }} "><i class="fa fa-home"></i>Dashboard</a>
</li>

{{-- <li><a><i class="fa fa-building-o"></i>Manajemen Waktu <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href=" {{ route('admin.tahun') }} ">Data Tahun</a></li>
        <li><a href=" {{ route('admin.bulan') }} ">Data Bulan</a></li>
    </ul>
</li> --}}

<li><a><i class="fa fa-building-o"></i>Manajemen Daerah <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href=" {{ route('admin.kecamatan') }} ">Kecamatan</a></li>
        <li><a href=" {{ route('admin.kelurahan') }} ">Kelurahan</a></li>
        <li><a href=" {{ route('admin.koordinat') }} ">Koordinat Kelurahan</a></li>
    </ul>
</li>

<li><a><i class="fa fa-building-o"></i>Manajemen Parameter <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href=" {{ route('admin.parameter') }} ">Parameter</a></li>
        <li><a href=" {{ route('admin.sub_parameter') }} ">Sub Parameter</a></li>
    </ul>
</li>

<li><a><i class="fa fa-building-o"></i>Manajemen Nilai  <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href=" {{ route('admin.nilai_parameter') }} ">Nilai Parameter / Kel & Bulan</a></li>
        <li><a href=" {{ route('admin.nilai_sub_parameter') }} ">Nilai Sub Parameter / Kel & Bulan</a></li>
    </ul>
</li>

<li><a><i class="fa fa-calculator"></i>Nilai Fuzzy  <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href=" {{ route('admin.fuzzy.pemukiman') }} ">Fuzzy Pemukiman</a></li>
        <li><a href=" {{ route('admin.fuzzy.curah_hujan') }} ">Fuzzy Curah Hujan</a></li>
        <li><a href=" {{ route('admin.fuzzy.topografi') }} ">Fuzzy Topografi</a></li>
        <li><a href=" {{ route('admin.fuzzy.bantaran') }} ">Fuzzy Bantaran Sungai</a></li>
    </ul>
</li>

<li><a><i class="fa fa-calculator"></i>Nilai SAW  <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href=" {{ route('admin.saw.kandidat') }} ">Matriks Kandidat</a></li>
        <li><a href=" {{ route('admin.saw.normalisasi') }} ">Matriks Normalisasi</a></li>
        <li><a href=" {{ route('admin.saw.pembobotan') }} ">Matriks Pembobotan</a></li>
        <li><a href=" {{ route('admin.saw.clustering') }} ">Matriks Clustering</a></li>
    </ul>
</li>

<li><a><i class="fa fa-calculator"></i>Tren Non Linear  <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
        <li><a href=" {{ route('admin.linear.januari') }} ">Januari</a></li>
        <li><a href=" {{ route('admin.linear.februari') }} ">Februari</a></li>
        <li><a href=" {{ route('admin.linear.maret') }} ">Maret</a></li>
        <li><a href=" {{ route('admin.linear.april') }} ">April</a></li>
        <li><a href=" {{ route('admin.linear.mei') }} ">Mei</a></li>
        <li><a href=" {{ route('admin.linear.juni') }} ">Juni</a></li>
        <li><a href=" {{ route('admin.linear.juli') }} ">Juli</a></li>
        <li><a href=" {{ route('admin.linear.agustus') }} ">Agustus</a></li>
        <li><a href=" {{ route('admin.linear.september') }} ">September</a></li>
        <li><a href=" {{ route('admin.linear.oktober') }} ">Oktober</a></li>
        <li><a href=" {{ route('admin.linear.november') }} ">November</a></li>
        <li><a href=" {{ route('admin.linear.desember') }} ">Desember</a></li>
    </ul>
</li>

<li>
    <a href=" {{ route('admin.hasil_linear') }} "><i class="fa fa-home"></i>Nilai A, B, dan C</a>
</li>

<li>
    <a href=" {{ route('admin.clustering_linear') }} "><i class="fa fa-home"></i>Hasil Akhir Trend Non Linier</a>
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
