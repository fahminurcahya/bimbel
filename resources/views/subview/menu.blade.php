<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li>
        <a href="{{route('dashboard')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->level == "admin")
    <li class="treeview">
      <a href="#">
        <i class="fa fa-sitemap"></i> <span>Master</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{route('user.index')}}"><i class="fa fa-circle-o"></i> Administrator</a></li>
        <li><a href="{{route('staff.index')}}"><i class="fa fa-circle-o"></i> Staff Akademik</a></li>
        <li><a href="{{route('guru.index')}}"><i class="fa fa-circle-o"></i> Guru</a></li>
        <li><a href="{{route('kelas.index')}}"><i class="fa fa-circle-o"></i> Kelas</a></li>
        <li><a href="{{route('siswa.index')}}"><i class="fa fa-circle-o"></i> Siswa</a></li>
      </ul>
    </li>
    @endif
    <li class="treeview">
        <a href="#">
          <i class="fa fa-sitemap"></i> <span>Kelola Tryout</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('topik.index')}}"><i class="fa fa-circle-o"></i> Modul soal</a></li>
          <li><a href="{{route('jadwal.index')}}"><i class="fa fa-circle-o"></i> Jadwal</a></li>
          <li><a href="{{route('evaluasi.index')}}"><i class="fa fa-circle-o"></i> Evaluasi Essay</a></li>
          <li><a href="{{route('hasil.index')}}"><i class="fa fa-circle-o"></i> Hasil Tes</a></li>
          <li><a href="{{route('report')}}"><i class="fa fa-circle-o"></i> Report Hasil TO</a></li>
          <li><a href="{{route('publish.index')}}"><i class="fa fa-circle-o"></i> Upload Hasil TO</a></li>
        </ul>
      </li>
    @if(Auth::user()->level == "admin")
    <li>
        <a href="{{route('produk.index')}}">
          <i class="fa fa-tasks"></i> <span>Produk</span>
        </a>
    </li>
    <li>
        <a href="{{route('diskon.index')}}">
          <i class="fa fa-tags"></i> <span>Discount</span>
        </a>
    </li>
    <li>
        <a href="{{route('setwhyus.index')}}">
          <i class="fa fa-question-circle"></i> <span>Why Us</span>
        </a>
    </li>
    <li>
        <a href="{{route('pendaftar.index')}}">
          <i class="fa fa-users"></i> <span>Pendaftar</span>
        </a>
    </li>
    <li>
        <a href="{{route('profil.index')}}">
          <i class="fa fa-cog"></i> <span>Profil</span>
        </a>
    </li>
    @endif
</ul>
