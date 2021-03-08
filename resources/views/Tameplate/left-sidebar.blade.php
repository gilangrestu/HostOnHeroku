<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{ ('/sekdin') }}" class="d-block">Dashboard</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{ ('/laporankebudayaan') }} class="nav-link">
                  <p>Bidang Kebudayaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href={{ ('/laporanpariwisata') }} class="nav-link">
                  <p>Bidang Pariwisata</p>
                </a>
              </li>
              <li class="nav-item">
                <a href={{ ('/laporankesekertariatan') }} class="nav-link">
                  <p>Bidang Kesekertariatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href={{ ('/laporanpemasaran') }} class="nav-link">
                  <p>Bidang Pemasaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Total Kupon
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{ ('/perhari') }} class="nav-link">
                  <p>Perhari</p>
                </a>
              </li>
              <li class="nav-item">
                <a href={{ ('/perbulan') }} class="nav-link">
                  <p>Perbulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href={{ ('/pertahun') }} class="nav-link">
                  <p>Pertahun</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <li class="nav-item">
                <a href={{ ('/perawatan') }} class="nav-link">
                  <p>Perawatan</p>
                </a>
              </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
