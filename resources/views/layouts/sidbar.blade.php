@if (auth()->user()->role == 1)
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="admin-dashboard">
            <img src="src/images/logo.png" width="50px">
            <h4 style="color: #f3f3f4;font-size: 20px;padding: 15px"> {{ $setting->shop_name }}</h4>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route("admin-dashboard") }}" class="dropdown-toggle no-arrow {{ request()->routeIs('admin-dashboard') ? 'active' : '' }}">
                        <span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('clients_list') }}" class="dropdown-toggle no-arrow {{ request()->routeIs('clients_list') ? 'active' : '' }}">
                        <span class="micon dw dw-user"></span><span class="mtext">Clients</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('technicians-list') }}" class="dropdown-toggle no-arrow {{ request()->routeIs('technicians-list') ? 'active' : '' }}">
                        <span class="micon fa fa-wrench"></span><span class="mtext">Technicians</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("service-list") }}" class="dropdown-toggle no-arrow {{ request()->routeIs('service-list') ? 'active' : '' }}">
                        <span class="micon fa fa-handshake-o"></span><span class="mtext">Services</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route("features") }}" class="dropdown-toggle no-arrow {{ request()->routeIs('features') ? 'active' : '' }}">
                        <span class="micon dw dw-file"></span><span class="mtext">Features</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('item-category') }}" class="dropdown-toggle no-arrow {{ request()->routeIs('item-category') ? 'active' : '' }}">
                        <span class="micon dw dw-file"></span><span class="mtext">Item Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('workOrders') }}" class="dropdown-toggle no-arrow {{ request()->routeIs('workOrders') ? 'active' : '' }}">
                        <span class="micon dw dw-shopping-basket"></span><span class="mtext">Work Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('item-list') }}" class="dropdown-toggle no-arrow {{ request()->routeIs('item-list') ? 'active' : '' }}">
                        <span class="micon fa fa-cart-plus"></span><span class="mtext">Items</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("settings") }}" class="dropdown-toggle no-arrow {{ request()->routeIs('settings') ? 'active' : '' }}">
                        <span class="micon dw dw-settings2"></span><span class="mtext">Setting</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@elseif (auth()->user()->role == 3)
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="clientdashboard">
            <img src="src/images/logo.png" width="50px">
            <h4 style="color: #f3f3f4;font-size: 20px;padding: 15px">@isset($setting->shop_name)
                {{ $setting->shop_name }}
                @else
                Shop
            @endisset</h4>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('admin-dashboard') }}" class="dropdown-toggle no-arrow {{ request()->routeIs('admin-dashboard') ? 'active' : '' }}">
                        <span class="micon dw dw-house"></span><span class="mtext">Client Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('workOrders') }}" class="dropdown-toggle no-arrow {{ request()->routeIs('workOrders') ? 'active' : '' }}">
                        <span class="micon fa fa-cart-plus"></span><span class="mtext">Work Status</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('service-list') }}" class="dropdown-toggle no-arrow {{ request()->routeIs('service-list') ? 'active' : '' }}">
                        <span class="micon fa fa-cart-plus"></span><span class="mtext">Services</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ItemsBought') }}" class="dropdown-toggle no-arrow {{ request()->routeIs('ItemsBought') ? 'active' : '' }}">
                        <span class="micon fa fa-cart-plus"></span><span class="mtext">Items Bought</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('items') }}" class="dropdown-toggle no-arrow {{ request()->routeIs('items') ? 'active' : '' }}">
                        <span class="micon fa fa-cart-plus"></span><span class="mtext">Items</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endif

