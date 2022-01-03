<!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="{{url('/')}}"><img src="/images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="{{url('/')}}">Home</a></li>
                                        <li class="drop"><a href="{{ url('frontend/about')}}">About us</a></li>
                                        <li class="drop"><a href="#">Products</a>
                                            <ul class="dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/luxor')}}">Luxor Chair</a></li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/supreme')}}">Supreme Furniture</a></li>
                            
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/artDeco')}}">Art Deco-PVC Tiles</a></li>
                                                <!-- End Single Mega MEnu -->

                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/floorMax')}}">Floor Max - Laminate</a></li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/decoFloor')}}">Deco Floor PVC Tiles</a></li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/grassia')}}">Grassia - Artificial Grass</a></li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/pvcFlooring')}}">PVC Flooring</a></li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/kaleen')}}">Kaleen Rugs</a></li>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li><a href="{{url('frontend/career')}}">Career</a></li>
                                        <li><a href="{{url('frontend/contact')}}">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                           <li><a href="{{url('/')}}">Home</a></li>
                                            <li><a href="{{ url('frontend/about')}}">About us</a></li>
                                            <li><a href="#">Products</a>
                                            <ul class="dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/luxor')}}">Luxor Chair</a></li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/supreme')}}">Supreme Furniture</a></li>
                            
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/artDeco')}}">Art Deco-PVC Tiles</a></li>
                                                <!-- End Single Mega MEnu -->

                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/floorMax')}}">Floor Max - Laminate</a></li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/decoFloor')}}">Deco Floor PVC Tiles</a></li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/grassia')}}">Grassia - Artificial Grass</a></li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/pvcFlooring')}}">PVC Flooring</a></li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="{{url('product/kaleen')}}">Kaleen Rugs</a></li>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li><a href="{{url('frontend/career')}}">Career</a></li>
                                        <li><a href="{{url('frontend/contact')}}">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <div class="header__account dropdown">
                                        @guest
                                        <a href="{{ route('login') }}"><i class="icon-user icons">&nbsp;Login</i></a>
                                        @else
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                        @endguest
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a href="{{url('cart/list')}}"><i class="icon-handbag icons"></i></a>
                                        <a href="{{url('cart/list')}}"><span class="htc__qua">{{Cart::count()}}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="{{url('search/product')}}" method="post">
                                    {{csrf_field()}}
                                    <input placeholder="Search Products here..... " type="text" name="search_text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
           
        </div>
        <!-- End Offset Wrapper --> 