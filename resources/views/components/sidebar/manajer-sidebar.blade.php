<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="index-manajer_gudang" title="Dashboard"/>
    <x-sidebar-menu-dashboard routeName="product_manajer.index" title="Daftar Produk"/>
    {{-- <x-sidebar-menu-dropdown-dashboard routeName="product.*" title="Manajemen Produk">
        <x-sidebar-menu-dropdown-item-dashboard routeName="product.product_manajer.index" title="Produk"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="produk.categories.index" title="Kategori" />
        
    </x-sidebar-menu-dropdown-dashboard> --}}
 
    <x-sidebar-menu-dropdown-dashboard routeName="stok.*" title="Manajemen Stok">
        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.riwayat_transaksi.index" title="Riwayat Transaksi"/>
        
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dashboard routeName="manajer_suppliers.index" title="Supplier"/>
    <x-sidebar-menu-dashboard routeName="report" title="Reports"/>
    
</x-sidebar-dashboard>

-
