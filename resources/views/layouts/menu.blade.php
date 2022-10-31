<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item   has-treeview  {{request()->routeIs('students*')?'menu-open':'' }}">
    <a href="#" class="nav-link"> 
      <i class="nav-icon nav-icon fas fa-file-alt text-blue"></i>            
      <p> 
        Students
        <i class="right fas fa-angle-left text-blue"></i>
      </p>
    </a>
  
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('students.index') }}" class="nav-link   {{request()->routeIs('students.index')?'active':'' }} ">
          <i class="far fa-circle nav-icon text-blue"></i>
          <p>Students</p>
        </a>
      </li>  

    </ul>
</li>

<li class="nav-item   has-treeview  {{request()->routeIs('tution*')?'menu-open':'' }}">
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
 
