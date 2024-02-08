<nav class="sidebar">
    <div class="sidebar-header">
      <a href="{{ route('dashboard') }}" class="sidebar-brand">
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
        @if(auth()->user()->role!="pengguna")
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        @endif
        @if(auth()->user()->role!="pengguna")
        <li class="nav-item nav-category">users</li>
      
        <li class="nav-item">
          <a href="{{ route('index') }}" class="nav-link" Route::currentRouteName() == 'index' ? 'active' : '' }}>
            <i class="link-icon" data-feather="users"></i>
            <span class="link-title">Users</span>
          </a>
        </li>
        @endif
        @if(auth()->user()->role!="pengguna")
        <li class="nav-item nav-category">Item</li>
        <li class="nav-item">
            <li class="nav-item">
                <a href="{{ route('kategori') }}" class="nav-link" Route::currentRouteName() == 'kategori' ? 'active' : '' }}>
                  <i class="link-icon" data-feather="server"></i>
                  <span class="link-title">Kategori</span>
                </a>
              </li>
             @endif
             @if(auth()->user()->role!="pengguna")
              <li class="nav-item">
                <a href="{{ route('produk') }}" class="nav-link" Route::currentRouteName() == 'produk' ? 'active' : '' }}>
                  <i class="link-icon" data-feather="archive"></i>
                  <span class="link-title">Produk</span>
                </a>
              </li>
        </li>
        @endif
        <li class="nav-item nav-category">Transaksi</li>
        <li class="nav-item">
            <li class="nav-item">
                <a href="{{ route('transaksi') }}" class="nav-link" Route::currentRouteName() == 'transaksi' ? 'active' : '' }}>
                  <i class="link-icon" data-feather="credit-card"></i>
                  <span class="link-title">Transaksi</span>
                </a>
              </li>
        
      
      </ul>
    </div>
  </nav>