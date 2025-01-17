<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="index-manajer_gudang.index" title="Dashboard">
        <x-slot:icon>
            <i class="fas fa-home"></i>
        </x-slot:icon>
    </x-sidebar-menu-dashboard>

    <x-sidebar-menu-dashboard routeName="product_manajer.index" title="Daftar Produk">
        <x-slot:icon>
            <i class="fas fa-box"></i>
        </x-slot:icon>
    </x-sidebar-menu-dashboard>

    <x-sidebar-menu-dropdown-dashboard routeName="stok.*" title="Manajemen Stok">
        <x-slot:icon>
            <i class="fas fa-warehouse"></i>
        </x-slot:icon>

        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.barang_masuk.index" title="Transaksi Barang Masuk">
            <x-slot:icon>
                <i class="fas fa-arrow-down"></i> 
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.barang_keluar.index" title="Transaksi Barang Keluar">
            <x-slot:icon>
                <i class="fas fa-arrow-up"></i> 
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>

        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.stock_opname.index" title="Stok Opname">
            <x-slot:icon>
                <i class="fas fa-boxes"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
    </x-sidebar-menu-dropdown-dashboard>

    <x-sidebar-menu-dashboard routeName="manajer_suppliers.index" title="Supplier">
        <x-slot:icon>
            <i class="fas fa-truck"></i>
        </x-slot:icon>
    </x-sidebar-menu-dashboard>

    <x-sidebar-menu-dropdown-dashboard routeName="manajer.laporan*" title="Laporan">
        <x-slot:icon>
            <i class="fas fa-chart-bar"></i>
        </x-slot:icon>

        <x-sidebar-menu-dropdown-item-dashboard routeName="manajer.laporan.laporan_stok.index" title="Laporan Stok Barang">
            <x-slot:icon>
                <i class="fas fa-clipboard-list"></i> 
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
        <x-sidebar-menu-dropdown-item-dashboard routeName="manajer.laporan.laporan_barang.index" title="Laporan Barang Masuk dan Keluar">
            <x-slot:icon>
                <i class="fas fa-exchange-alt"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>

    </x-sidebar-menu-dropdown-dashboard>
</x-sidebar-dashboard>
