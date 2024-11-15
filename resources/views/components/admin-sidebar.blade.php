<li>
    <a href="{{ route('admin.index') }}"
        data-sidebar-active="{{ $page_name == 'Dashboard' ? 'true' : '' }}"
        class="flex px-4 py-1 -translate-x-[0.7px] border-yellow-900 hover:border-l-2 hover:bg-yellow-900/5 data-[sidebar-active=true]:border-l-[2px] data-[sidebar-active=true]:border-purple-700 data-[sidebar-active=true]:font-semibold data-[sidebar-active=true]:text-purple-700 transition-all duration-75">
        Dashboard
    </a>
</li>
<li>
    <a href="{{ route('admin.employee') }}"
        data-sidebar-active="{{ $page_name == 'Employee List' ? 'true' : '' }}"
        class="flex px-4 py-1 -translate-x-[0.7px] border-yellow-900 hover:border-l-2 hover:bg-yellow-900/5 data-[sidebar-active=true]:border-l-[2px] data-[sidebar-active=true]:border-purple-700 data-[sidebar-active=true]:font-semibold data-[sidebar-active=true]:text-purple-700 transition-all duration-75">
        Employee List
    </a>
</li>