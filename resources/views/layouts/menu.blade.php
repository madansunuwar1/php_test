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
    <a href="{{ url('dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
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
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-home"></i>
        <p>Home Page Settings</p>
        <i class="fas fa-angle-left right"></i>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{url('slider')}}" class="nav-link active">
                <i class="fas fa-images nav-icon"></i>
                <p>Banner Slider</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('home-introduction')}}" class="nav-link">
                <i class="far fa-address-card nav-icon"></i>
                <p>Introduction Section</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('admin-news')}}" class="nav-link">
                <i class="far fa-newspaper nav-icon"></i>
                <p>Admin News Section</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('home-club-section')}}" class="nav-link">
                <i class="fas fa-user-secret nav-icon"></i>
                <p>Bridge Club Section</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('bcio-news')}}" class="nav-link">
                <i class="far fa-newspaper nav-icon"></i>
                <p>Bridge Club Activity</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('bcpn-news')}}" class="nav-link">
                <i class="far fa-newspaper nav-icon"></i>
                <p>BCPN News</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('counters')}}" class="nav-link">
                <i class="fas fa-futbol nav-icon"></i>
                <p>Counter Section</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('home-members')}}" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Member Section</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('logos')}}" class="nav-link">
                <i class="fas fa-box nav-icon"></i>
                <p>Logo Section</p>
            </a>
        </li>
    </ul>
</li>
