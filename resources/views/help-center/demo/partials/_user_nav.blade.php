<nav class="navbar user-nav navbar-expand-lg">
  <div class="container-fluid">
      <a class="navbar-brand" href="{{ url()->current() }}">
          شغف
      </a>

      <div id="wrapper" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <div class="main-item menu">
              <span class="line line01"></span>
              <span class="line line02"></span>
              <span class="line line03"></span>
          </div>
      </div>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link hasBorder" id="" href="{{ route('demo.dashboard.new') }}">
                      <i class="far fa-plus"></i>
                      اضافه شكوى
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link hasBorder" id="brands" href="{{ route('demo.dashboard.list') }}">
                      <i class="far fa-tasks"></i>
                      الشكاوي الخاصه بي
                  </a>
              </li>
          </ul class="navbar-nav mr-auto">

          <div class="admin">
              <ul>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="far fa-bell"></i>
                          <span class="getter">
                              3
                          </span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-left  animate slideIn"
                          aria-labelledby="navbarDropdown">
                          <div class="title">
                              <span>
                                  لديك 3 طلبات

                              </span>
                          </div>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="far fa-envelope"></i>
                          <span class="getter">
                              5
                          </span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-left animate slideIn"
                          aria-labelledby="navbarDropdown">
                          <div class="title">
                              <span>
                                  لديك 3 اشعارات
                              </span>
                          </div>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <div class="profile">
                              <img src="{{ asset(Auth::user()->avatar) }}" alt="" />
                          </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-left animate slideIn"
                          aria-labelledby="navbarDropdown">
                          <div class="title">
                              <span>
                                  {{ Auth::user()->first_name }}
                              </span>
                          </div>
                          <a class="dropdown-item" href="#">
                              <i class="far fa-user"></i> الصفحة الشخصية
                          </a>
                          <a class="dropdown-item" href="#">
                              <i class="far fa-cog"></i> الضبط
                          </a>
                          {{-- <a class="dropdown-item" href="#">
                              <i class="far fa-money-bill"></i> الرصيد
                          </a> --}}
                          <a class="dropdown-item" href="{{ route('demo.logout') }}">
                              <i class="far fa-sign-out"></i> الخروج
                          </a>
                      </div>
                  </li>
              </ul>
          </div>
      </div>
  </div>
</nav>