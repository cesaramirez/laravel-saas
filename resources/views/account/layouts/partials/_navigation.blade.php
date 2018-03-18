<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        <a 
            href="{{ route('account.index') }}" 
            class="nav-link {{ activePage('account') }}">Account overview</a>
    </li>
    <li class="nav-item">
        <a 
            href="{{ route('account.profile.index') }}" 
            class="nav-link {{ activePage('account/profile') }}">Profile</a>
    </li>
    <li class="nav-item">
        <a 
            href="{{ route('account.password.index') }}" 
            class="nav-link {{ activePage('account/password') }}">Change Password</a>
    </li>
</ul>