<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="index-admin" title="Dashboard">
        <x-slot:icon>
            <i class="fas fa-home"></i>
        </x-slot:icon>
    </x-sidebar-menu-dashboard>

    <x-sidebar-menu-dropdown-dashboard routeName="produk.*" title="Manajemen Produk">
        <x-slot:icon>
            <i class="fas fa-box"></i>
        </x-slot:icon>
        <x-sidebar-menu-dropdown-item-dashboard routeName="produk.products.index" title="Produk">
            <x-slot:icon>
                <i class="fas fa-cube"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
        <x-sidebar-menu-dropdown-item-dashboard routeName="produk.categories.index" title="Kategori">
            <x-slot:icon>
                <i class="fas fa-tags"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
        <x-sidebar-menu-dropdown-item-dashboard routeName="produk.atribut.index" title="Atribut">
            <x-slot:icon>
                <i class="fas fa-sliders-h"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
    </x-sidebar-menu-dropdown-dashboard>

    <x-sidebar-menu-dropdown-dashboard routeName="stok.*" title="Manajemen Stok">
        <x-slot:icon>
            <i class="fas fa-warehouse"></i>
        </x-slot:icon>
        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.riwayat_transaksi.index" title="Riwayat Transaksi">
            <x-slot:icon>
                <i class="fas fa-history"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.stock_opname.index" title="Stok Opname">
            <x-slot:icon>
                <i class="fas fa-boxes"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.pengaturan_stok" title="Pengaturan Stok Minimum">
            <x-slot:icon>
                <i class="fas fa-cogs"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
    </x-sidebar-menu-dropdown-dashboard>

    <x-sidebar-menu-dashboard routeName="suppliers.index" title="Supplier">
        <x-slot:icon>
            <i class="fas fa-truck"></i>
        </x-slot:icon>
    </x-sidebar-menu-dashboard>

    <x-sidebar-menu-dashboard routeName="users.index" title="Users">
        <x-slot:icon>
            <i class="fas fa-users"></i>
        </x-slot:icon>
    </x-sidebar-menu-dashboard>

    <x-sidebar-menu-dropdown-dashboard routeName="admin.laporan.*" title="Laporan">
        <x-slot:icon>
            <i class="fas fa-chart-bar"></i>
        </x-slot:icon>
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin.laporan.laporan_stok" title="Laporan Stok Barang">
            <x-slot:icon>
                <i class="fas fa-chart-bar"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin.laporan.laporan_transaksi" title="Laporan Transaksi">
            <x-slot:icon>
                <i class="fas fa-receipt"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin.laporan.laporan_aktivitas" title="Laporan Aktivitas User">
            <x-slot:icon>
                <i class="fas fa-user-clock"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
    </x-sidebar-menu-dropdown-dashboard>
</x-sidebar-dashboard>
