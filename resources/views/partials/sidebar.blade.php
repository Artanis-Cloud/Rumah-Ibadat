<div id="sidebar-nav" class="sidebar">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <li><a href="#" class="{{ request()->is('admin/home')? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        <li>
          <a href="#userManagement" data-toggle="collapse" class="
          {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : 'collapsed' }} 
          {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : 'collapsed' }}
          {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : 'collapsed' }}"><i class="lnr lnr-file-empty"></i> <span>User Management</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
          <div id="userManagement" class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'collapse in' : 'collapse' }} 
          {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'collapse in' : 'collapse' }}
          {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'collapse in' : 'collapse' }}">
            <ul class="nav">
              <li><a href="#" class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">Users</a></li>
              <li><a href="#" class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">Roles</a></li>
              <li><a href="#" class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">Permissions</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>
  </div>
</div>