  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="pb-3 mt-3 mb-3 user-panel d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item
                {{
                    Request::route()->getName() === "admin.add-curriculum" ? 'menu-open' :
                    (Request::route()->getName() === "admin.add-year-level" ? 'menu-open' :
                    (Request::route()->getName() === "admin.add-course" ? 'menu-open' :
                    (Request::route()->getName() === "admin.add-semester" ? 'menu-open' :
                    (Request::route()->getName() === "admin.add-subject" ? 'menu-open' :
                    (Request::route()->getName() === "admin.add-curriculum-courses" ? 'menu-open' :
                    (Request::route()->getName() === "admin.add-curriculum-subject" ? 'menu-open' :
                    (Request::route()->getName() === "admin.add-link-course-program" ? 'menu-open' : '')))))))
                }}"
            >
            <a href="#" class="nav-link
                {{
                    Request::route()->getName() === "admin.add-curriculum" ? 'menu-open active' :
                    (Request::route()->getName() === "admin.add-year-level" ? 'menu-open active' :
                    (Request::route()->getName() === "admin.add-course" ? 'menu-open active' :
                    (Request::route()->getName() === "admin.add-semester" ? 'menu-open active' :
                    (Request::route()->getName() === "admin.add-subject" ? 'menu-open active' :
                    (Request::route()->getName() === "admin.add-curriculum-courses" ? 'menu-open active' :
                    (Request::route()->getName() === "admin.add-curriculum-subject" ? 'menu-open active' :
                    (Request::route()->getName() === "admin.add-link-course-program" ? 'menu-open active' : '')))))))
                }}"
            >
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.add-curriculum') }}" class="nav-link {{ Request::route()->getName() === "admin.add-curriculum" ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Curriculum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.add-year-level') }}" class="nav-link {{ Request::route()->getName() === "admin.add-year-level" ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Year Level</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.add-course') }}" class="nav-link {{ Request::route()->getName() === "admin.add-course" ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.add-semester') }}" class="nav-link {{ Request::route()->getName() === "admin.add-semester" ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Semester</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.add-subject') }}" class="nav-link {{ Request::route()->getName() === "admin.add-subject" ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.add-curriculum-courses') }}" class="nav-link {{ Request::route()->getName() === "admin.add-curriculum-courses" ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Curriculum Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.add-curriculum-subject') }}" class="nav-link {{ Request::route()->getName() === "admin.add-curriculum-subject" ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Curriculum Subjects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.add-link-course-program') }}" class="nav-link {{ Request::route()->getName() === "admin.add-link-course-program" ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Link Course Program</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Curriculum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Year Level</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semesters</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subjects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Curriculum Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Curriculum Subjects</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
