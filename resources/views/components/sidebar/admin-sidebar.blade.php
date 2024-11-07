<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="index-practice" title="Index"/>
    <x-sidebar-menu-dashboard routeName="index-admin" title="Dashboard"/>
    <x-sidebar-menu-dropdown-dashboard routeName="admin.*" title="Manajemen Product">
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin.products" title="Products"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="admin.categories.index" title="Categories" />
        {{-- <x-sidebar-menu-dropdown-item-dashboard routeName="admin.categories" title="Categories"/> --}}
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dashboard routeName="stok" title="Stok"/>
    <x-sidebar-menu-dashboard routeName="suppliers.index" title="Supplier"/>
    <x-sidebar-menu-dashboard routeName="users" title="Users"/>
    <x-sidebar-menu-dashboard routeName="report" title="Reports"/>
    <x-sidebar-menu-dashboard routeName="products" title="Products"/>

    <div class="fixed inset-0 z-10 hidden bg-gray-900/50" id="sidebarBackdrop"></div>
</x-sidebar-dashboard>


-
