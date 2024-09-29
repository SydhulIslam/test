<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/assets/assets/"
  data-template="vertical-menu-template-free"

>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title> {{ isset($title) ? $title : 'AirSpace' }} </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('/assets/images/favicon.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('/assets/assets/vendor/fonts/boxicons.css')}}" />



    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('/assets/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('/assets/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="{{asset('/assets/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href=" {{asset('/assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}} " />
    <link rel="stylesheet" href=" {{asset('/assets/assets/vendor/libs/highlight/highlight.css')}} " />
    <link rel="stylesheet" href=" {{asset('/assets/assets/vendor/libs/highlight/highlight-github.css')}} " />
    <link rel="stylesheet" href=" {{asset('/assets/assets/vendor/libs/apex-charts/apex-charts.css')}} " />





    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('/assets/assets/vendor/css/pages/page-auth.css')}}   " />
    <link rel="stylesheet" href="{{asset('/assets/assets/vendor/css/pages/page-account-settings.css')}}   " />
    <link rel="stylesheet" href="{{asset('/assets/assets/vendor/css/pages/page-icons.css')}}   " />
    <link rel="stylesheet" href="{{asset('/assets/assets/vendor/css/pages/page-misc.css')}}   " />
    <!-- Helpers -->
    <script src="{{asset('/assets/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('/assets/assets/js/config.js')}}" ></script>
  </head>

  <body>

        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
          <div class="layout-container">

            @yield("content")

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                      ©
                      <script>
                        document.write(new Date().getFullYear());
                      </script>
                      , made with ❤️ by
                      <a href="" target="_blank" class="footer-link fw-bolder">Sydhul</a>
                    </div>
                    <div>
                      <a href="" class="footer-link me-4" target="_blank">License</a>
                      <a href="" target="_blank" class="footer-link me-4">More Themes</a>

                      <a
                        href=""
                        target="_blank"
                        class="footer-link me-4"
                        >Documentation</a
                      >

                      <a
                        href=""
                        target="_blank"
                        class="footer-link me-4"
                        >Support</a
                      >
                    </div>
                  </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
              </div>
              <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->


          </div>
          <!-- Overlay -->
          <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src=" {{asset('/assets/assets/vendor/libs/jquery/jquery.js')}} "></script>
    <script src=" {{asset('/assets/assets/vendor/libs/popper/popper.js')}} "></script>
    <script src=" {{asset('/assets/assets/vendor/js/bootstrap.js')}} "></script>
    <script src=" {{asset('/assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}} "></script>

    <script src=" {{asset('/assets/assets/vendor/libs/apex-charts/apexcharts.js')}} "></script>

    <script src=" {{asset('/assets/assets/vendor/libs/masonry/masonry.js')}} "></script>
    <script src=" {{asset('/assets/assets/vendor/libs/highlight/highlight.js')}} "></script>

    <script src="  {{asset('/assets/assets/vendor/js/menu.js')}}  "></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset('/assets/assets/js/main.js')}}"></script>

    <script src="{{asset('/assets/assets/js/dashboards-analytics.js')}}"></script>
    <script src="{{asset('/assets/assets/js/extended-ui-perfect-scrollbar.js')}}"></script>
    <script src="{{asset('/assets/assets/js/form-basic-inputs.js')}}"></script>
    <script src="{{asset('/assets/assets/js/pages-account-settings-account.js')}}"></script>
    <script src="{{asset('/assets/assets/js/ui-modals.js')}}"></script>
    <script src="{{asset('/assets/assets/js/ui-popover.js')}}"></script>
    <script src="{{asset('/assets/assets/js/ui-toasts.js')}}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
