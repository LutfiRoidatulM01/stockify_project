<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="index-admin" title="Dashboard"/>
    <x-sidebar-menu-dropdown-dashboard routeName="produk.*" title="Manajemen Produk">
        <x-sidebar-menu-dropdown-item-dashboard routeName="produk.products.index" title="Produk"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="produk.categories.index" title="Kategori" />
        {{-- <x-sidebar-menu-dropdown-item-dashboard routeName="admin.categories" title="Categories"/> --}}
    </x-sidebar-menu-dropdown-dashboard>
    {{-- <x-sidebar-menu-dashboard routeName="stok" title="Stok"/> --}}
    <x-sidebar-menu-dropdown-dashboard routeName="stok.*" title="Manajemen Stok">
        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.riwayat_transaksi.index" title="Riwayat Transaksi"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.stock_opname" title="Stok Opname" />
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dashboard routeName="suppliers.index" title="Supplier"/>
    <x-sidebar-menu-dashboard routeName="users.index" title="Users"/>
    <x-sidebar-menu-dashboard routeName="report" title="Reports"/>
    
</x-sidebar-dashboard>


-
