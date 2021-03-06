<div class="header-area header-middle">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <div class="logo">
                            <a href="index"><img src="{{ URL::asset('images/logo/logo.jpg')}}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-9 col-xs-12 text-right xs-center">
                        <div class="main-menu display-inline hidden-sm hidden-xs">
                            <nav>
                                <ul>
                                    <li><a href="index">HOME</a>
                                    
                                                                        
                                    <li><a href="products">CHOICE</a>
                                        <div class="mega-menu">
                                            <ul>
                                                <li class="mega-title"><a href="#">Brand</a></li>
                                                <li><a href="#">Apple</a></li>
                                                <li><a href="#">HUAWEI</a></li>
                                                <li><a href="#">SAMSUNG</a></li>
                                                <li><a href="#">OPPO</a></li>
                                                <li><a href="#">vivo</a></li>
                                            </ul>
                                            <ul>
                                                <li class="mega-title"><a href="#">Hottest</a></li>
                                                <li><a href="#">iPhone X</a></li>
                                                <li><a href="#">SAMSUNG Galaxy S9</a></li>
                                                <li><a href="#">HUAWEI P10 Plus</a></li>
                                                <li><a href="#">iPhone 7</a></li>
                                                <li><a href="#">OPPO R11s Plus</a></li>
                                            </ul>
                                            <ul>
                                                <li class="mega-title"><a href="#">discount</a></li>
                                                <li><a href="#">iPhone 5</a></li>
                                                <li><a href="#">SAMSUNG Galaxy S6</a></li>
                                                <li><a href="#">HUAWEI P7</a></li>
                                                <li><a href="#">OPPO R5</a></li>
                                                <li><a href="#"></a></li>
                                            </ul>
                                        </div>
                                    </li>

                        
                                    {{-- <!-- 显示博客区，看样子这里是直接加载了 -->
                                    <li class="b-nav-cname  @if($category_id == 'index') b-nav-active @endif"> 
                                        <a href="/">BLOG</a> 
                                    </li>
                                    <!-- 这里的逻辑可能有问题，不知道是点了blog之后再加载还是直接加载 -->
                                    @foreach($category as $v)
                                        <li class="b-nav-cname @if($v->id == $category_id) b-nav-active @endif">
                                            <a href="{{ url('category/'.$v->id) }}">{{ $v->name }}</a>
                                        </li>
                                    @endforeach --}}
                                    
                                    <li><a href="shop.html">Lighting</a>
                                        <div class="mega-menu">
                                            <ul>
                                                <li class="mega-title"><a href="#">Tops</a></li>
                                                <li><a href="#">Bras & Tanks</a></li>
                                                <li><a href="#">Trousers</a></li>
                                                <li><a href="#">Hoodies & Sweatshirts</a></li>
                                                <li><a href="#">Tees</a></li>
                                                <li><a href="#">Jackets</a></li>
                                            </ul>
                                            <ul>
                                                <li class="mega-title"><a href="#">Bottoms</a></li>
                                                <li><a href="#">Shorts</a></li>
                                                <li><a href="#">Trousers</a></li>
                                                <li><a href="#">Tees</a></li>
                                                <li><a href="#">Tanks</a></li>
                                                <li><a href="#">Pants</a></li>
                                            </ul>
                                            <ul>
                                                <li class="mega-title"><a href="#">Tops</a></li>
                                                <li><a href="#">trousers</a></li>
                                                <li><a href="#">jeans</a></li>
                                                <li><a href="#">shorts</a></li>
                                                <li><a href="#">suits</a></li>
                                                <li><a href="#">jackets</a></li>
                                            </ul>
                                        </div>                                  
                                    </li>
                                    

                                    {{-- 如下内容暂且先实现一下，还是在shop那里弄下拉栏方便点，不会出现这种诡异的布局，然后现在需要做一个写博客的界面 --}}

                                    </ul>

                                    <li>
                                        
                                        @if(empty(session('user.name')))
                                            <li class="b-nav-cname b-nav-login">
                                                <div class="hidden-xs b-login-mobile"></div>
                                                <a class="js-login-btn" href="javascript:;">Login</a>
                                            </li>
                                        @else
                                            <li class="b-nav-cname b-nav-login">
                                                {{-- class="user-profile dropdown-toggle"  --}}
                                                <a href="javascript:;" data-toggle="dropdown" aria-expanded="true">
                                                    <span>{{ session('user.name') }}</span>
                                                    <span class=" fa fa-angle-down"></span> 
                                                </a>
                                                <ul class="dropdown-menu dropdown-usermenu">
                                                    <li><img class="img-responsive img-circle" src="{{ session('user.avatar') }}" title="{{ session('user.name') }}" width="30px" height="30px" /></li>
                                                    <li><a href="{{ url('auth/oauth/logout') }}">Logout</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                    
                                    </li>
                            </nav>
                        </div>

                        {{-- <!-- 这里改过 
                        <div class="display-inline">
                            <div class="icon-search"></div>
                            <div class="toogle-content">
                                <form action="{{ route('products.index') }}" id="searchbox">
                                    <input type="text" class="form-control input-xs" name="search" placeholder="Search" />
                                    <button class="button-search"></button>
                                </form>
                            </div> 
                        </div>--> --}}


                        <div class="shopping-cart ml-20 display-inline">
                            <a href="cart.html"><b>shopping cart</b>(2)</a>
                            <ul>
                                <li>
                                    <div class="cart-img">
                                        <a href="#"><img src="{{URL::asset('images/cart/1.jpg')}}" alt="" /></a>
                                    </div>
                                    <div class="cart-content">
                                        <h3><a href="#"> 1 X Faded...</a> </h3>
                                        <span><b>S, Orange</b></span>
                                        <span class="cart-price">£ 16.84</span>
                                    </div>
                                    <div class="cart-del">
                                        <i class="fa fa-times-circle"></i>
                                    </div>
                                </li>
                                <li>
                                    <div class="cart-img">
                                        <a href="#"><img src="images/cart/1.jpg" alt="" /></a>
                                    </div>
                                    <div class="cart-content">
                                        <h3><a href="#"> 1 X Faded...</a> </h3>
                                        <span><b>S, Orange</b></span>
                                        <span class="cart-price">£ 16.84</span>
                                    </div>
                                    <div class="cart-del">
                                        <i class="fa fa-times-circle"></i>
                                    </div>
                                </li>
                                <li>
                                    <div class="shipping"> 
                                        <span class="f-left">Shipping </span>
                                        <span class="f-right cart-price"> $7.00</span>  
                                    </div>
                                    <hr class="shipping-border" />
                                    <div class="shipping">
                                        <span class="f-left"> Total </span>
                                        <span class="f-right cart-price">$692.00</span> 
                                    </div>
                                </li>
                                <li class="checkout m-0"><a href="#">checkout <i class="fa fa-angle-right"></i></a></li>
                            </ul>                           
                        </div>
                        <div class="setting-menu display-inline">
                            <div class="icon-nav current"></div>
                            <ul class="content-nav toogle-content">
                                <li class="currencies-block-top">
                                    <div class="current"><b>Currency : USD</b></div>
                                    <ul>
                                        <li><a href="#">Dollar (USD)</a></li>
                                        <li><a href="#">Pound (GBP)</a></li>
                                    </ul>
                                </li>
                                <li class="currencies-block-top">
                                    <div class="current"><b>English</b></div>
                                    <ul>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">اللغة العربية</a></li>
                                    </ul>
                                </li>
                                <li class="currencies-block-top">
                                    <div class="current"><b>My Account</b></div>
                                    <ul>
                                        <li><a href="#">My account</a></li>
                                        <li><a href="#">My wishlist</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Log in</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- 这部分估计得着手改过才行 --}}
        <div class="mobile-menu-area visible-sm visible-xs">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul>
                                    <li><a href="#">Home</a>
                                        <ul>
                                            <li><a href="index.html">home version 1</a></li>
                                            <li><a href="index-2.html">home version 2</a></li>
                                            <li><a href="index-3.html">home version 3</a></li>
                                            <li><a href="index-4.html">home version 4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.html">Sofa</a>
                                        <ul>
                                            <li><a href="#">Bras & Tanks</a></li>
                                            <li><a href="#">Trousers</a></li>
                                            <li><a href="#">Hoodies & Sweatshirts</a></li>
                                            <li><a href="#">Tees</a></li>
                                            <li><a href="#">Jackets</a></li>
                                            <li><a href="#">Shorts</a></li>
                                            <li><a href="#">Trousers</a></li>
                                            <li><a href="#">Tees</a></li>
                                            <li><a href="#">Tanks</a></li>
                                            <li><a href="#">Pants</a></li>
                                            <li><a href="#">trousers</a></li>
                                            <li><a href="#">jeans</a></li>
                                            <li><a href="#">shorts</a></li>
                                            <li><a href="#">suits</a></li>
                                            <li><a href="#">jackets</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Elements</a>
                                        <ul>
                                            <li><a href="elements-alerts.html">alerts</a></li>
                                            <li><a href="elements-banner1.html">banner 1</a></li>
                                            <li><a href="elements-banner2.html">banner 2</a></li>
                                            <li><a href="elements-banner3.html">banner 3</a></li>
                                            <li><a href="elements-brand-logo.html">brand logo</a></li>
                                            <li><a href="elements-buttons.html">buttons</a></li>
                                            <li><a href="elements-blog.html">blog</a></li>
                                            <li><a href="elements-tab.html">tab</a></li>
                                            <li><a href="elements-map.html">map</a></li>
                                            <li><a href="elements-collapse.html">collapse</a></li>
                                            <li><a href="elements-newsletter.html">newsletter</a></li>
                                            <li><a href="elements-newsletter-2.html">newsletter 2</a></li>
                                            <li><a href="elements-products.html">products</a></li>
                                            <li><a href="elements-services.html">services</a></li>
                                            <li><a href="elements-social-icon.html">social icon</a></li>
                                            <li><a href="elements-testimonial.html">testimonial</a></li>
                                            <li><a href="elements-carousel-tab.html">carousel with tab</a></li>
                                        </ul>                               
                                    </li>
                                    <li><a href="shop.html">Lighting</a>
                                        <ul>
                                            <li><a href="#">Bras & Tanks</a></li>
                                            <li><a href="#">Trousers</a></li>
                                            <li><a href="#">Hoodies & Sweatshirts</a></li>
                                            <li><a href="#">Tees</a></li>
                                            <li><a href="#">Jackets</a></li>
                                            <li><a href="#">Shorts</a></li>
                                            <li><a href="#">Trousers</a></li>
                                            <li><a href="#">Tees</a></li>
                                            <li><a href="#">Tanks</a></li>
                                            <li><a href="#">Pants</a></li>
                                            <li><a href="#">trousers</a></li>
                                            <li><a href="#">jeans</a></li>
                                            <li><a href="#">shorts</a></li>
                                            <li><a href="#">suits</a></li>
                                            <li><a href="#">jackets</a></li>
                                        </ul>                               
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="blog.html">blog</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                            <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                            <li><a href="login.html">login</a></li>
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="register.html">register</a></li>
                                            <li><a href="shop.html">shop</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">What's New</a></li>
                                </ul>
                            </nav>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>