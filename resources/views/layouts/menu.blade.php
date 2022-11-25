<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link ">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
 
    @can('student-list')
      <li class="nav-item">
        <a href="{{ route('students.index') }}" class="nav-link   {{request()->routeIs('students*')?'active':'' }} ">
          <i class="nav-icon nav-icon fas  fa-users text-green"></i>  
          <p>Students</p>
        </a>
      </li>  
    @endcan
 

 @can('classes-check-list')
 <li class="nav-item">
  <a href="{{ route('tution.check-list') }}" class="nav-link   {{request()->routeIs('tution.check-list')?'active':'' }} ">
    <i class="nav-icon nav-icon fa fa-chalkboard-teacher text-green"></i>  
 
    <p>Classes</p>
  </a>
</li>  

 @endcan

@can('classes-list')
  <li class="nav-item   has-treeview  {{request()->routeIs('tution*','tstudents*','tution*','ctimes*')?'menu-open':'' }}   ">
    <a href="#" class="nav-link"> 
      <i class="nav-icon nav-icon fas fa-file-alt text-blue"></i>            
      <p> 
        Classes
        <i class="right fas fa-angle-left text-blue"></i>
      </p>
    </a>
  
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('tution.index') }}" class="nav-link   {{request()->routeIs('tution.index')?'active':'' }} ">
          <i class="far fa-circle nav-icon text-blue"></i>
          <p>All My Classes</p>
        </a>
      </li>  
      <li class="nav-item">
        <a href="{{ route('tution.create') }}" class="nav-link   {{request()->routeIs('tution.create')?'active':'' }} ">
          <i class="far fa-circle nav-icon text-blue"></i>
          <p>New Class</p>
        </a>
      </li>  

    </ul>
</li>
@endcan

@if(Auth::user()->hasAnyPermission(['subject-list', 'halls-list','role-list','user-list']))
<li class="nav-item   has-treeview  {{request()->routeIs('subjects*','hall*','roles*','users*')?'menu-open':'' }}   ">
  <a href="#" class="nav-link"> 
    <i class="nav-icon nav-icon fas fa-cog text-red"></i>            
    <p> 
      Settings
      <i class="right fas fa-angle-left text-red"></i>
    </p>
  </a>

  <ul class="nav nav-treeview">
   @can('subject-list')
    <li class="nav-item">
      <a href="{{ route('subjects.index') }}" class="nav-link   {{request()->routeIs('subjects*')?'active':'' }} ">
        <i class="far fa-circle nav-icon text-red"></i>
        <p>Subjects</p>
      </a>
    </li>  
@endcan
@can('halls-list')
    <li class="nav-item">
      <a href="{{ route('hall.index') }}" class="nav-link   {{request()->routeIs('hall*')?'active':'' }} ">
        <i class="far fa-circle nav-icon text-red"></i>
        <p>Halls</p>
      </a>
    </li>  
    @endcan
    @can('role-list')
    <li class="nav-item">
      <a href="{{ route('roles.index') }}" class="nav-link   {{request()->routeIs('roles*')?'active':'' }} ">
        <i class="far fa-circle nav-icon text-red"></i>
        <p>Roles</p>
      </a>
    </li> 
    @endcan 
    @can('user-list')
    <li class="nav-item">
      <a href="{{ route('users.index') }}" class="nav-link   {{request()->routeIs('users*')?'active':'' }} ">
        <i class="far fa-circle nav-icon text-red"></i>
        <p>Users</p>
      </a>
    </li>  
    @endcan
  </ul>
</li>
@endif

@can('profile')
<li class="nav-item">
  <a href="{{ route('profile') }}" class="nav-link {{  request()->routeIs('profile') ? 'active' : '' }}">
      <i class="nav-icon fas fa-user"></i>
      <p>Profile</p>
  </a>
</li>
@endcan
