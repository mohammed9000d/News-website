<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>World Time</title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="{{ asset('assets/front-end/vendors/mdi/css/materialdesignicons.min.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('assets/front-end/vendors/aos/dist/aos.css/aos.css') }}" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{ asset('assets/front-end/images/favicon.png') }}" />

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/front-end/css/style.css') }}">
    <!-- endinject -->
  </head>

  <body>
    <div class="container-scroller">
      <div class="main-panel">
        <!-- partial:partials/_navbar.html -->
        <header id="header">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="navbar-bottom" style="padding-top: 24px;">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <a class="navbar-brand" href="{{ route('page.home') }}"
                      ><img src="{{ asset('assets/front-end/images/logo.svg') }}" alt=""
                    /></a>
                  </div>
                  <div>
                    <button
                      class="navbar-toggler"
                      type="button"
                      data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent"
                      aria-expanded="false"
                      aria-label="Toggle navigation"
                    >
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                      class="navbar-collapse justify-content-center collapse"
                      id="navbarSupportedContent"
                    >
                      <ul
                        class="navbar-nav d-lg-flex justify-content-between align-items-center"
                      >
                        <li>
                          <button class="navbar-close">
                            <i class="mdi mdi-close"></i>
                          </button>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="{{ route('page.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('page.category', [9]) }}">Technology</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('page.category', [5]) }}">Sports</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('page.category', [12]) }}">Art</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('page.category', [7]) }}">Politics</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('page.category', [10]) }}">Game</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('page.category', [11]) }}">Media</a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('page.contact') }}">Contact</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <ul class="social-media">
                    <li>
                      <a href="#">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-youtube"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </header>

        <!-- partial -->

        @yield('content')


        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:partials/_footer.html -->
        <footer>
          <div class="footer-top">
            <div class="container">
              <div class="row">
                <div class="col-sm-5">
                  <img src="{{ asset('assets/front-end/images/logo.svg') }}" class="footer-logo" alt="" />
                  <h5 class="font-weight-normal mt-4 mb-5">
                    Newspaper is your news, entertainment, music fashion website. We
                    provide you with the latest breaking news and videos straight from
                    the entertainment industry.
                  </h5>
                  <ul class="social-media mb-3">
                    <li>
                      <a href="#">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-youtube"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="footer-border-bottom pb-2">
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="{{ asset('assets/front-end/images/dashboard/home_1.jpg') }}"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="footer-border-bottom pb-2 pt-2">
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="{{ asset('assets/front-end/images/dashboard/home_2.jpg') }}"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div>
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="{{ asset('assets/front-end/images/dashboard/home_3.jpg') }}"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600 mb-3">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
                  <div class="footer-border-bottom pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Magazine</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Business</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Sports</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Arts</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Politics</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-bottom">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="fs-14 font-weight-600">
                      © 2020 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white"> BootstrapDash</a>. All rights reserved.
                    </div>
                    <div class="fs-14 font-weight-600">
                      Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">BootstrapDash</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="{{ asset('assets/front-end/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('assets/front-end/vendors/aos/dist/aos.js/aos.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/front-end/js/demo.js') }}"></script>
    <script src="{{ asset('assets/front-end/js/jquery.easeScroll.js') }}"></script>
    <!-- End custom js for this page-->
  </body>
</html>
