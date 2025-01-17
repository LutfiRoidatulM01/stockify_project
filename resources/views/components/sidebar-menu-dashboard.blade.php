@props(['icon' => null, 'routeName' => null, 'title' => null])
<li>
    <a href="{{ route($routeName) }}"
        class="flex items-center p-2 text-base rounded-lg group 
            {{ request()->routeIs($routeName) ? 'text-[#3B82F6] bg-gray-100 dark:text-[#3B82F6] dark:bg-gray-700' : 'text-gray-900 hover:bg-gray-100 hover:text-[#3B82F6] dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-[#3B82F6]' }}">
        {{ $icon }}
        <span class="ml-3" sidebar-toggle-item> {{ $title }} </span>
    </a>
</li>
