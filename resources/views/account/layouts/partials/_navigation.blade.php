<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        <a href="{{ route('account.index') }}" class="nav-link {{ activePage('account') }}">Account overview</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('account.profile.index') }}" class="nav-link {{ activePage('account/profile') }}">Profile</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('account.password.index') }}" class="nav-link {{ activePage('account/password') }}">Change Password</a>
    </li>
</ul>

<hr>
@subscribed
<ul class="nav nav-pills flex-column">
    @subscriptionnotcancelled
        <li class="nav-item">
            <a
                href="{{ route('account.subscription.swap') }}"
                class="nav-link {{ activePage('account/subscription/swap') }}">
                Change Plan
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('account.subscription.cancel') }}"
                class="nav-link {{ activePage('account/subscription/cancel') }}">
                Cancel Subscription
            </a>
        </li>
    @endsubscriptionnotcancelled
    @subscriptioncancelled
        <li class="nav-item">
            <a
                href="{{ route('account.subscription.resume') }}"
                class="nav-link {{ activePage('account/subscription/resume') }}">
                Resume Subscription
            </a>
        </li>
    @endsubscriptioncancelled
        <li class="nav-item">
            <a
                href="{{ route('account.subscription.card') }}"
                class="nav-link {{ activePage('account/subscription/card') }}">
                Update Card
            </a>
        </li>
    @teamsubscription
        <li class="nav-item">
            <a
                href="{{ route('account.subscription.team') }}"
                class="nav-link {{ activePage('account/subscription/team') }}">
                Manage Team
            </a>
        </li>
    @endteamsubscription
</ul>
@endsubscribed