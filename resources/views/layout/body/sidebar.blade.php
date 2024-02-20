<nav class="sidebar">
    <div class="sidebar-header">
      <a href="{{ route('dashboard') }}" class="sidebar-brand">
        Amba<span>Sir</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        @if(auth()->user()->role!="karyawan")
        <li class="nav-item nav-category">Main</li>
      
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="link-icon" data-feather="box"></i>
                <span class="link-title">Dashboard</span>
            </a>
        </li>
        
        @endif
        @if(auth()->user()->role!="karyawan")
        <li class="nav-item nav-category">Users</li>
      
        <li class="nav-item">
            <a href="{{ route('index') }}" class="nav-link">
                <i class="link-icon" data-feather="users"></i>
                <span class="link-title">Users</span>
            </a>
        </li>
        
        @endif
        @if(auth()->user()->role != "pemilik" && auth()->user()->role != "karyawan")
        <li class="nav-item nav-category">Item</li>
        <li class="nav-item">
            <a href="{{ route('kategori') }}" class="nav-link">
                <i class="link-icon" data-feather="server"></i>
                <span class="link-title">Kategori</span>
            </a>
        </li>
        
             
             <li class="nav-item">
              <a href="{{ route('produk') }}" class="nav-link">
                  <i class="link-icon" data-feather="archive"></i>
                  <span class="link-title">Produk</span>
              </a>
          </li>
        @endif
        

        @if(auth()->user()->role != "admin" && auth()->user()->role != "pemilik")

        <li class="nav-item nav-category">Kasir</li>
       
        <li class="nav-item">
            <a href="{{ route('transaksi') }}" class="nav-link">
                <i class="link-icon" data-feather="credit-card"></i>
                <span class="link-title">Transaksi</span>
            </a>
        </li>
        @endif

        @if(auth()->user()->role != "admin" && auth()->user()->role != "karyawan")
        <li class="nav-item">
            <a href="{{ route('riwayat') }}" class="nav-link">
                <i class="link-icon" data-feather="database"></i>
                <span class="link-title">Database</span>
            </a>
        </li>
        @endif
        

        
      
      </ul>
    </div>
  </nav>