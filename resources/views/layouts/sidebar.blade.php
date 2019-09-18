<ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="/sites/">Sites</a></li>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="/sites/create">Add Site</a></li>
    </ul>
</ul>
<ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="/notifications">Notifications</a></li>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="/notifications/create">Add Notification</a></li>
    </ul>
</ul>
<ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
</ul>
<ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="/options">Options</a></li>
</ul>
<ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="/users">Users</a></li>
</ul>
<ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form></li>
</ul>