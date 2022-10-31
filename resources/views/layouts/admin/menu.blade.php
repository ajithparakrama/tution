<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('admin.home') }}" class="nav-link {{ Request::is('admin.home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.subjects.index') }}" class="nav-link {{ Request::is('admin.subjects.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Subjects</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.institute.index') }}" class="nav-link {{ Request::is('admin.institute.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Institutes</p>
    </a>
</li>
