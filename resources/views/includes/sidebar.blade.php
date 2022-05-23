      <nav class="sidebar-nav">
          <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link" href="index.html"><i class="icon-speedometer text-capitalize"></i>
                      {{__('word.dashboard')}}
                  </a>
              </li>

              <li class="nav-title">Admin dashboard</li>
              <li class="nav-item nav-dropdown">
                  <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Posts </a>
                  <ul class="nav-dropdown-items">
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('dashboard.post.create')}}"><i
                                  class="icon-puzzle"></i>Create Post</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('dashboard.post.index')}}"><i class="icon-puzzle"></i>View
                              All Posts</a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item nav-dropdown">
                  <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Users </a>
                  <ul class="nav-dropdown-items">
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('dashboard.user.create')}}"><i
                                  class="icon-puzzle"></i>Create User</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('dashboard.user.index')}}"><i class="icon-puzzle"></i>
                              All Users</a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item nav-dropdown">
                  <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Settings </a>
                  <ul class="nav-dropdown-items">
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('dashboard.setting.index')}}"><i
                                  class="icon-puzzle"></i>Settings</a>
                      </li>
                  </ul>
              </li>

              {{-- //Categories Route  --}}

              <li class="nav-item nav-dropdown">
                  <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Categories </a>
                  <ul class="nav-dropdown-items">
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('dashboard.category.index')}}"><i
                                  class="icon-puzzle"></i>All Categories</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('dashboard.category.create')}}"><i class="icon-puzzle"></i>
                              Add Category</a>
                      </li>
                  </ul>
              </li>




              <li class="nav-item nav-dropdown">
                  <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Icons</a>
                  <ul class="nav-dropdown-items">
                      <li class="nav-item">
                          <a class="nav-link" href="icons-font-awesome.html"><i class="icon-star"></i> Font Awesome</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="icons-simple-line-icons.html"><i class="icon-star"></i> Simple Line
                              Icons</a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Widgets
                      <span class="tag tag-info">NEW</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="charts.html"><i class="icon-pie-chart"></i> Charts</a>
              </li>
              <li class="divider"></li>
              <li class="nav-title">Extras</li>
              <li class="nav-item nav-dropdown">
                  <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Pages</a>
                  <ul class="nav-dropdown-items">
                      <li class="nav-item">
                          <a class="nav-link" href="pages-login.html" target="_top"><i class="icon-star"></i> Login</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="pages-register.html" target="_top"><i class="icon-star"></i>
                              Register</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="pages-404.html" target="_top"><i class="icon-star"></i> Error
                              404</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="pages-500.html" target="_top"><i class="icon-star"></i> Error
                              500</a>
                      </li>
                  </ul>
              </li>
          </ul>
      </nav>
