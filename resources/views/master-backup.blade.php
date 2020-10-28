<!DOCTYPE html>

<!--[if IE 8]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->

<!--[if (gte IE 9)|!(IE)]><!--><html
  xmlns="http://www.w3.org/1999/xhtml"
  xml:lang="en-US"
  lang="en-US"
><!--<![endif]-->
  <head>
    <!-- Basic Page Needs -->

    <meta charset="utf-8" />

    <!--[if IE
      ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"
    /><![endif]-->

    <title>DEPRINDO</title>

    <meta name="author" content="themesflat.com" />

    <!-- Mobile Specific Metas -->

    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- Bootstrap  -->

    <link rel="stylesheet" type="text/css" href="{{url('template/stylesheets/bootstrap.css')}}" />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"
    />

    <!-- Theme Style -->

    <link rel="stylesheet" type="text/css" href="{{url('template/stylesheets/style.css')}}" />

    <!-- Responsive -->

    <link rel="stylesheet" type="text/css" href="{{url('template/stylesheets/responsive.css')}}" />

    <!-- Colors -->

    <link
      rel="stylesheet"
      type="text/css"
      href="{{url('template/stylesheets/colors/color1.css')}}"
      id="colors"
    />

    <!-- Animation Style -->

    <link rel="stylesheet" type="text/css" href="{{url('template/stylesheets/animate.css')}}" />

    <!-- Animation headline Style -->

    <link rel="stylesheet" type="text/css" href="{{url('template/stylesheets/headline.css')}}" />

    <!-- REVOLUTION LAYERS STYLES -->

    <link rel="stylesheet" type="text/css" href="{{url('template/revolution/css/layers.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{url('template/revolution/css/settings.css')}}" />

    <!-- Favicon and touch icons  -->

    <link
      href="{{url('template/icon/apple-touch-icon-48-precomposed.png')}}"
      rel="icon"
      sizes="48x48"
    />

    <link href="{{url('template/icon/apple-touch-icon-32-precomposed.png')}}" rel="icon" />

    <link href="{{url('template/icon/favicon.png')}}" rel="icon" />

    <!--[if lt IE 9]>
      <script src="javascript/html5shiv.js"></script>

      <script src="javascript/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="header_sticky">
    <!-- Preloader -->

    <div id="loading-overlay">
      <div class="loader"></div>
    </div>

    <!-- Boxed -->

    <div class="boxed">
      <div class="top style2 background-661 padding-none">
        <div class="container">
          <div class="row">
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /.top -->

      <div class="flat-header-wrap">
        <!-- Header -->

        <header
          id="header"
          class="header header-classic header-style2 bg-white box-shadow1"
        >
          <div class="container">
            <div class="row">
              <div class="col-lg-3">
                <div id="logo" class="logo">
                  <a href="{{url('')}}" rel="home">
                    <img src="{{url('template/images/logo1.png')}}" alt="image" />
                  </a>
                </div>
                <!-- /.logo -->
              </div>

              <div class="col-lg-9">
                <div class="flat-wrap-header">
                  <div class="nav-wrap clearfix">
                    <nav
                      id="mainnav"
                      class="mainnav style2 color-93a float-left"
                    >
                      <ul class="menu">
                        <li class="{{ Navigation::set_active(['/'])}}">
                          <a href="#">Beranda</a>

                          <ul class="submenu">
                            <li><a href="{{url('')}}#tentang-kami">Tentang Kami</a></li>

                            <li>
                              <a href="{{url('')}}#legalitas">Legalitas</a>
                            </li>

                            <li>
                              <a href="{{url('')}}#visi-misi">Visi Misi</a>
                            </li>

                            <li>
                              <a href="{{url('')}}#pengurus-dpp">Pengurus DPP</a>
                            </li>

                            <li>
                              <a href="{{url('')}}#pengurus-dpw">Pengurus DPW</a>
                            </li>

                            <li>
                              <a href="{{url('')}}#pengurus-dpd">Pengurus DPD</a>
                            </li>

                          </ul>
                          <!-- /.submenu -->
                        </li>

                        <li class="{{ Navigation::set_active(['article','news','center-regulations','province-regulations','regency-regulations'])}}">
                            <a href="#">Artikel</a>
                            <ul class="submenu">
                                <li ><a href="{{url('article')}}">Artikel</a></li>

                                <li>
                                  <a href="{{url('news')}}">Berita</a>
                                </li>

                                <li>
                                  <a href="{{url('center-regulations')}}">Regulasi Pemerintah</a>
                                </li>

                                <li>
                                  <a href="{{url('province-regulations')}}">Regulasi Pemerintah Provinsi</a>
                                </li>

                                <li>
                                  <a href="{{url('regency-regulations')}}">Regulasi Pemerintah Daerah</a>
                                </li>

                              </ul>
                              <!-- /.submenu -->
                        </li>

                        <li class="{{ Navigation::set_active(['members','member-benefits','member-register','member-projects'])}}">
                          <a href="#">Anggota</a>

                          <ul class="submenu">
                            <li>
                              <a href="{{url('member-benefits')}}">Benefit Anggota</a>
                            </li>

                            <li>
                              <a href="{{url('members')}}">Data Anggota</a>
                            </li>

                            <li>
                              <a href="{{url('member-projects')}}">Proyek Anggota</a>
                            </li>
                            <li>
                                <a href="{{url('member-register')}}">Daftar Anggota</a>
                              </li>
                          </ul>
                          <!-- /.submenu -->
                        </li>

                        <li class="{{ Navigation::set_active(['service-partners','product-partners','partner-register'])}}">
                          <a href="#">Info Mitra</a>

                          <ul class="submenu">
                            <li>
                              <a href="{{url('service-partners')}}">Mitra Bidang Jasa</a>
                            </li>

                            <li>
                              <a href="{{url('product-partners')}}">Mitra Supplier Barang</a>
                            </li>

                            <li><a href="{{url('partner-register')}}">Daftar Menjadi Mitra</a></li>

                          </ul>
                          <!-- /.submenu -->
                        </li>

                        <li class="{{ Navigation::set_active(['lands','land-offer'])}}">
                          <a href="#">Info Lahan</a>

                          <ul class="submenu">
                            <li><a href="{{url('lands')}}">Listing Lahan</a></li>

                            <li>
                              <a href="{{url('land-offer')}}">Penawaran Lahan</a>
                            </li>

                            </ul>
                          <!-- /.submenu -->
                        </li>

                        <li class="{{ Navigation::set_active(['galleries','dpp-galleries','dpw-galleries','dpd-galleries'])}}">
                          <a href="{{url('galleries')}}">Gallery</a>

                          <ul class="submenu">
                            <li><a href="{{url('dpp-galleries')}}">Gallery DPP</a></li>

                            <li>
                              <a href="{{url('dpw-galleries')}}">Gallery DPW</a>
                            </li>

                            <li><a href="{{url('dpd-galleries')}}">Gallery DPD</a></li>

                          </ul>
                          <!-- /.submenu -->
                        </li>


                        <li>
                            @guest
                              <a href="{{url('admin/login')}}">Login Anggota</a>
                            @endguest
                            @auth
                                <form action="http://103.134.152.2/~deprindo/admin/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block">
                                                                    <i class="voyager-power"></i>
                                                                    Logout
                                </button>
                            </form>
                            @endauth
                        </li>
                      </ul>
                      <!-- /.menu -->
                    </nav>
                    <!-- /.mainnav -->

                    <div class="btn-menu">
                      <span></span>
                    </div>
                    <!-- //mobile menu button -->
                  </div>
                  <!-- /.nav-wrap -->
                </div>
              </div>
            </div>
          </div>
        </header>
      </div>

      @yield('content')

      <!-- Footer -->

      <footer class="footer widget-footer" style="background-color:#232C12; color:#A3C188;">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-6 reponsive-mb30">
                Deprindo merupakan Asosiasi Pengembang Perumahan
                yang lebih “MELAYANI” segala kebutuhan anggotanya melalui<br/>
                :: Layanan One Stop Service<br/>
                :: Sinergy antar anggota<br/>
                :: Deprindo Academy<br/>
                Dengan layanan yang paripurna tersebut mempermudah
                anggotanya mengelola proyek serta mengantarkannya menjadi
                Pengembang Perumahan yang Sukses, Jujur dan Bermartabat
            </div>
            <!-- /.col-md-3 -->
            <div class="col-lg-3 col-sm-6 reponsive-mb30">
              <ul class="flat-information">
                <li>
                    Kantor Pusat
                    DPP DEPRINDO
                    Jl. Sambas III No.12
                    Kramat Pela, Kebayoan Baru
                    Jakarta Selatan

                      {{-- {{ Navigation::config()->alamat}}</a> --}}
                </li>

                <li>
                    Telp/WA :{{ Navigation::config()->telephone}}
                </li>

                <li>
                    Email : {{ Navigation::config()->email}}
                </li>
              </ul>
            </div>

            <div class="col-lg-3 col-sm-6 reponsive-mb30">
                Link Terkait<br/>
                :: <a href="http://sireng.pu.go.id">sireng.pu.go.id</a><br/>
                :: <a href="http://sikumbang.ppdpp.id">sikumbang.ppdpp.id</a><br/>
                :: <a href="http://ppdpp.id">ppdpp.id</a><br/>
                :: <a href="http://pu.go.id">pu.go.id</a><br/>
                :: <a href="http://atrbpn.go.id">atrbpn.go.id</a><br/>
                :: <a href="http://ini.id">ini.id</a><br/>
                :: <a href="http://arebi.or.id">arebi.or.id</a><br/>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </footer>

      <!-- Bottom -->

      <div class="bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="copyright">
                <p>
                  Bank Mitra KPR
                    <img src="{{asset('template/images/bni.png')}}" width="70px"/>
                    <img src="{{asset('template/images/btn.jpg')}}" width="70px"/>
                </p>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <ul class="social-links style2 text-center">
                <li>
                  <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
              </ul>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="copyright text-right">
                  <p>
                    @2020
                    All rights reserved. <img src="{{asset('template/images/logo@2x.png')}}" width="150px"/>
                  </p>
                </div>
            </div>
          </div>
        </div>
        <!-- /.container -->
      </div>
      <!-- bottom -->

      <!-- Go Top -->

      <a class="go-top">
        <i class="fa fa-angle-up"></i>
      </a>
    </div>

    <!-- Javascript -->

    <script src="{{url('template/javascript/jquery.min.js')}}"></script>

    <script src="{{url('template/javascript/tether.min.js')}}"></script>

    <script src="{{url('template/javascript/bootstrap.min.js')}}"></script>

    <script src="{{url('template/javascript/jquery.easing.js')}}"></script>

    <script src="{{url('template/javascript/jquery-waypoints.js')}}"></script>

    <script src="{{url('template/javascript/jquery-validate.js')}}"></script>

    <script src="{{url('template/javascript/jquery.cookie.js')}}"></script>

    <script src="{{url('template/javascript/owl.carousel.js')}}"></script>

    <script src="{{url('template/javascript/jquery-countTo.js')}}"></script>

    <script src="{{url('template/javascript/jquery.flexslider-min.js')}}"></script>

    <script src="{{url('template/javascript/parallax.js')}}"></script>

    <script src="{{url('template/javascript/modern.custom.js')}}"></script>

    <script src="{{url('template/javascript/jquery.hoverdir.js')}}"></script>

    <script src="{{url('template/javascript/jquery.fancybox.js')}}"></script>

    <script src="{{url('template/javascript/gmap3.min.js')}}"></script>

    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtwK1Hd3iMGyF6ffJSRK7I_STNEXxPdcQ&region=GB"></script> --}}

    <script src="{{url('template/javascript/smoothscroll.js')}}"></script>

    <script src="{{url('template/javascript/headline.js')}}"></script>

    {{-- <script src="{{url('template/javascript/switcher.js')}}"></script> --}}

    <script src="{{url('template/javascript/main.js')}}"></script>

    <!-- Revolution Slider -->

    <script src="{{url('template/revolution/js/jquery.themepunch.tools.min.js')}}"></script>

    <script src="{{url('template/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

    <script src="{{url('template/revolution/js/slider.js')}}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->

    <script src="{{url('template/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>

    <script src="{{url('template/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>

    <script src="{{url('template/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>

    <script src="{{url('template/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>

    <script src="{{url('template/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>

    <script src="{{url('template/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>

    <script src="{{url('template/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>

    <script src="{{url('template/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    @yield('script')
</body>
</html>
