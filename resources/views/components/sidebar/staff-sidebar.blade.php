<x-sidebar-dashboard>
    <!-- Dashboard Menu with Icon -->
    <x-sidebar-menu-dashboard routeName="index-staff_gudang" title="Dashboard">
        <x-slot:icon>
            <i class="fas fa-home"></i>
        </x-slot:icon>
    </x-sidebar-menu-dashboard>

    <x-sidebar-menu-dropdown-dashboard routeName="stok.*" title="Manajemen Stok">
        <x-slot:icon>
            <i class="fas fa-warehouse"></i>
        </x-slot:icon>

        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.konfirmasi_masuk.index" title="Konfirmasi Barang Masuk">
            <x-slot:icon>
                <i class="fas fa-exchange-alt"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.konfirmasi_keluar.index" title="Konfirmasi Barang Keluar">
            <x-slot:icon>
                <i class="fas fa-exchange-alt"></i>
            </x-slot:icon>
        </x-sidebar-menu-dropdown-item-dashboard>
    </x-sidebar-menu-dropdown-dashboard>
    
    <!-- Supplier Menu with Icon -->
    <x-sidebar-menu-dashboard routeName="stok_staff" title="Stok">
        <x-slot:icon>
            <i class="fas fa-warehouse"></i>
        </x-slot:icon>
    </x-sidebar-menu-dashboard>
</x-sidebar-dashboard>
