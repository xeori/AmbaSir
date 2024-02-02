	<!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
          <a href="#" class="sidebar-brand">
            Kasir<span>Ukk</span>
          </a>
          <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="sidebar-body">
          <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
              <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">Admin</li>
           
            <li class="nav-item">
              <a href="{{ route('admin.index') }}" class="nav-link">
                <i class="link-icon" data-feather="users"></i>
                <span class="link-title">Users</span>
              </a>
            </li>
          
            <li class="nav-item nav-category">Update</li>
            <li class="nav-item">
              <a href="{{ route('admin.kategori') }}" class="nav-link">
                <i class="link-icon" data-feather="grid"></i>
                <span class="link-title">Kategori</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.produk') }}" class="nav-link">
                <i class="link-icon" data-feather="archive"></i>
                <span class="link-title">Produk</span>
              </a>
            </li>
            <li class="nav-item nav-category">Transaksi</li>
            <li class="nav-item">
              <a href="{{ route('admin.transaksi') }}" class="nav-link">
                <i class="link-icon" data-feather="credit-card"></i>
                <span class="link-title">Transaksi</span>
              </a>
            </li>
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
              <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                <i class="link-icon" data-feather="hash"></i>
                <span class="link-title">Documentation</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>