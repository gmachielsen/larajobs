<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
          <!-- <p class="app-sidebar__user-designation">{{ implode(', ', auth()->user()->roles->pluck('name')->toArray()) }}</p> -->
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.blogs.index')}}"><i class="app-menu__icon fa fa-tag"></i><span class="app-menu__label">Blogs</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.company.index')}}"><i class="app-menu__icon fa fa-sort-alpha-asc"></i><span class="app-menu__label">Companies</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.news.index')}}"><i class="app-menu__icon fa fa-newspaper-o"></i><span class="app-menu__label">News</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.profiles.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Profiles</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.staffmembers.index')}}"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">Staffmembers</span></a></li>

      </ul>
    </aside>