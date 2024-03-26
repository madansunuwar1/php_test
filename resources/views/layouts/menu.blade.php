{{--@php
    $user = Auth::user();
    $user->assignRole('superadmin');
    //$user->removeRole('bcio');
    $user->save();
    echo '<pre>';
    print_r($user->role);
    exit;
@endphp--}}

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
            <a href="{{url('slider')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Slider</p>
            </a>
        </li>
        @php $menus = App\Helper\Helper::getPageSections(\App\Helper\Constant::HOME_PAGE);@endphp
        @if($menus)
            @foreach($menus as $menu)
                @if($menu->section_slug == 'home-introduction' && !(Auth()->user()->hasRole('admin') || Auth()->user()->hasRole('superadmin')))
                    @continue
                @endif
                <li class="nav-item">
                    <a href="{{url(\App\Helper\Helper::getPageSlugByID($menu->page_id), $menu->section_slug)}}" class="nav-link{{str_contains(url()->current(), $menu->section_slug)?' active':''}}">
                        <i class="nav-icon {{$menu->icon?:'far fa-circle'}}"></i>
                        <p>{{$menu->sub_title?$menu->sub_title:$menu->section_title}}</p>
                    </a>
                </li>
            @endforeach
        @endif
        <li class="nav-item">
            <a href="{{url('home/sections')}}" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>Section Settings</p>
            </a>
        </li>
    </ul>
</li>
