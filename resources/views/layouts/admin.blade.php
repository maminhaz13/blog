<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>{{ config('app.name') }} | @yield('title', 'Admin Panel')</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('uploads') }}/favicon/favicon.png">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_starlight') }}/css/starlight.css">

    <!-- vendor css -->
    <link href="{{ asset('dashboard_starlight') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('dashboard_starlight') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('dashboard_starlight') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    {{-- select2 css --}}
    <link href="{{ asset('dashboard_starlight') }}/lib/select2/css/select2.min.css" rel="stylesheet">

    {{-- css for summernote --}}
    <link href="{{ asset('dashboard_starlight') }}/lib/summernote/summernote-bs4.css" rel="stylesheet">

    {{-- css for datatables --}}
    <link href="{{ asset('dashboard_starlight') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">

    {{-- css for highlight.js --}}
    <link href="{{ asset('dashboard_starlight') }}/lib/highlightjs/github.css" rel="stylesheet">

  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{ route('home') }}"><i class="icon ion-android-star-outline"></i> {{ config('app.name') }}</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">

          <a href="" class="sl-menu-link @yield('frontend_active')">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-gear-b tx-22"></i>
              <span class="menu-item-label">Settings</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('banner.index') }}" class="nav-link">Banners</a></li>
            <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link">About - Our Story</a></li>
            <li class="nav-item"><a href="{{ route('custom.contact.index') }}" class="nav-link">Contact Information</a></li>
          </ul>

          <a href="{{ route('addcategory') }}" class="sl-menu-link @yield('category_active')">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
              <span class="menu-item-label">Category Manager</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('addcategory') }}" class="nav-link">Categories</a></li>
            <li class="nav-item"><a href="{{ route('child_category') }}" class="nav-link">Sub-categories</a></li>
          </ul>

          <a href="" class="sl-menu-link @yield('product_active')">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
              <span class="menu-item-label">Product Manager</span>
              <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('Product.index') }}" class="nav-link">All Products</a></li>
            <li class="nav-item"><a href="{{ route('faq.index') }}" class="nav-link">Product FAQ</a></li>
            <li class="nav-item"><a href="{{ route('product.discount') }}" class="nav-link">Manage product Discount</a></li>
          </ul>

          <a href="{{ route('order.index') }}" class="sl-menu-link @yield('order_manage_active')">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
              <span class="menu-item-label">Order Manager</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{ route('contactlist') }}" class="sl-menu-link @yield('contacts_active')">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
              <span class="menu-item-label">Customers Messages</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

          <a href="{{ route('testmoniallist') }}" class="sl-menu-link @yield('testmonial_active')">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
              <span class="menu-item-label">Testimonials</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->

      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name"><span class="hidden-md-down">{{ Auth::user()->name }}</span></span>
              <img src="{{ asset('uploads/profile_pictures') }}/{{ Auth::user()->profile_pictures }}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{ route('profile') }}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                <li><a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"
                  ><i class="icon ion-power"></i> Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{ asset('dashboard_starlight') }}/img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{ asset('dashboard_starlight') }}/img/img4.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                  <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{ asset('dashboard_starlight') }}/img/img7.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                  <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                  <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{ asset('dashboard_starlight') }}/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                  <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                  <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link">
              <div class="media">
                <img src="{{ asset('dashboard_starlight') }}/img/img3.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                  <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                  <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{ asset('dashboard_starlight') }}/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{ asset('dashboard_starlight') }}/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                  <span class="tx-12">October 02, 2017 12:44am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{ asset('dashboard_starlight') }}/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">October 01, 2017 10:20pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{ asset('dashboard_starlight') }}/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">October 01, 2017 6:08pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{ asset('dashboard_starlight') }}/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                  <span class="tx-12">September 27, 2017 6:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{ asset('dashboard_starlight') }}/img/img10.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">September 28, 2017 11:30pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{ asset('dashboard_starlight') }}/img/img9.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                  <span class="tx-12">September 26, 2017 11:01am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{ asset('dashboard_starlight') }}/img/img5.jpg" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">September 23, 2017 9:19pm</span>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->


    @yield('admin_content')

    {{-- plugins --}}
    <script src="{{ asset('dashboard_starlight') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('dashboard_starlight') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('dashboard_starlight') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('dashboard_starlight') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    {{-- chart.js --}}
    <script src="{{ asset('dashboard_starlight') }}/lib/chart.js/Chart.js"></script>

    {{-- js for starlight --}}
    <script src="{{ asset('dashboard_starlight') }}/js/starlight.js"></script>

    {{-- js for select2 --}}
    <script src="{{ asset('dashboard_starlight') }}/lib/select2/js/select2.min.js"></script>

    {{-- js for summernote --}}
    <script src="{{ asset('dashboard_starlight') }}/lib/summernote/summernote-bs4.min.js"></script>

    {{-- js for summernote --}}
    <script src="{{ asset('dashboard_starlight') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('dashboard_starlight') }}/lib/datatables-responsive/dataTables.responsive.js"></script>

    {{-- js for highlight.js --}}
    <script src="{{ asset('dashboard_starlight') }}/lib/highlightjs/highlight.pack.js"></script>

    @yield('footer_scripts')
  </body>
</html>
