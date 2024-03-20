{{--<li>
    @php
    $user = Auth::user();
    $user->assignRole('admin');
    $user->removeRole('bcio');
    $user->save();
    echo '<pre>';
    print_r($user->role);
    exit;
        @endphp
</li>--}}

<li class="nav-item menu-open">
    <a href="{{ route('dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
            {{--                                <i class="right fas fa-angle-left"></i>--}}
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('user.index') }}" class="nav-link">
        <i class="nav-icon fa fa-users"></i>
        <p>User</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('role.index') }}" class="nav-link">
        <i class="nav-icon fa fa-key"></i>
        <p>Role</p>
    </a>
</li>
<li class="nav-header">BCIO</li>
<li class="nav-item">
    <a href="{{ route('verification.bcio.index') }}" class="nav-link">
        <i class="nav-icon far fa-user "></i>
        <p>
            Bcio member verification
        </p>
    </a>
</li>
<li class="nav-header">BCPN</li>
<li class="nav-item">
    <a href="{{ route('verification.bcpn.index') }}" class="nav-link">
        <i class="nav-icon fa fa-list"></i>
        <p>Bcpn member verification</p>
    </a>
</li>
