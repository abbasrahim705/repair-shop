<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="src/images/admin.png" width="50">
                        {{-- <img src="{{ asset('storage/'.auth()->user()->image)  }} " width="50"> --}}
                    </span>
                    <span class="user-name">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{ route('edit_client',auth()->user()->id) }}"><i class="dw dw-user1"></i> Profile</a>
                    @if (auth()->user()->role == 1)
                    <a class="dropdown-item" href="{{ route('settings') }}"><i class="dw dw-settings2"></i> Setting</a>
                    @endif
                    <hr>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item" ><i class="dw dw-logout"></i> Log Out</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
