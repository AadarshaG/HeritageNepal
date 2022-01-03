<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            {{-- <div class="pull-left image">
                <img src="/img/default_user.png" class="img-circle" alt="User Image"/>
            </div> --}}
            <div class="pull-left info">
                <p></p>

                <a href=""><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{url('/')}}">
                    <i class="fa fa-dashboard"></i> <span>View Website</span>
                </a>
            </li>

            <li class="header">Logo Management </li>
            <li>
                <a href="{{url('logo/view')}}">
                    <i class="fa fa-puzzle-piece"></i> <span> Logo</span>
                </a>
            </li>
            <li>
                <a href="{{url('brochure/view')}}">
                    <i class="fa fa-bold"></i> <span> Brochure</span>
                </a>
            </li>
            <li class="header">User Management </li>
            <li>
                <a href="{{url('endusers/view')}}">
                    <i class="fa fa-users"></i> <span> End Users</span>
                </a>
            </li>
            <li>
                <a href="">
                     <span></span>
                </a>
{{--                <a href="{{url('dealers/view')}}">--}}
{{--                    <i class="fa fa-user"></i> <span> Dealers</span>--}}
{{--                </a>--}}
            </li>
{{--            <li>--}}
{{--                <a href="{{url('dealers/all-request')}}">--}}
{{--                    <i class="fa fa-user-secret"></i> <span> Dealer's Request </span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="header">Product Management </li>
            <li>
                <a href="{{url('category/view')}}">
                    <i class="fa fa-cog"></i> <span> Categories </span>
                </a>
            </li>
            <li>
                <a href="{{url('subcategory/view')}}">
                    <i class="fa fa-cogs"></i> <span> Sub Categories </span>
                </a>
            </li>
            <li>
                <a href="{{url('admin-product/view')}}">
                    <i class="fa fa-paragraph"></i> <span> Products </span>
                </a>
            </li>
            <li class="header"> Order Management</li>
{{--            <li>--}}
{{--                <a href="{{url('orders/all')}}">--}}
{{--                    <i class="fa fa-shopping-cart"></i><span>All Orders</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{url('orders/pending')}}">--}}
{{--                    <i class="fa fa-cart-plus"></i><span>Pending Orders</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{url('orders/delivered')}}">--}}
{{--                    <i class="fa fa-truck"></i><span>Delivered Orders</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="header">Form management</li>
            <li>
                <a href="{{url('form/contact')}}">
                    <i class="fa fa-volume-control-phone"></i><span>Contact Us Message</span>
                </a>
            </li>
            <li class="header">About management</li>
            <li>
                <a href="{{url('about-us/view')}}">
                    <i class="fa fa-truck"></i><span>About Us</span>
                </a>
            </li>
            <li>
                <a href="{{url('pages/view')}}">
                    <i class="fa fa-product-hunt"></i><span>Pages</span>
                </a>
            </li>
            <li class="header">Image management</li>
            <li>
                <a href="{{url('banner-image/view')}}">
                    <i class="fa fa-question-circle"></i><span>Banner Image</span>
                </a>
            </li>
            <li>
                <a href="{{url('gallery-image/view')}}">
                    <i class="fa fa-truck"></i><span>Gallery Image</span>
                </a>
            </li>
            <li class="header">Service management</li>
            <li>
                <a href="{{url('services/view')}}">
                    <i class="fa fa-truck"></i><span>Services</span>
                </a>
            </li>
            <li>
                <a href="{{url('why-choose-us/view')}}">
                    <i class="fa fa-question-circle"></i><span>Why Choose Us</span>
                </a>
            </li>
            <li>
                <a href="{{url('video-gallery/view')}}">
                    <i class="fa fa-question-circle"></i><span>Work Video</span>
                </a>
            </li>
            <li>
                <a href="{{url('blog/view')}}">
                    <i class="fa fa-bold"></i><span>Blogs</span>
                </a>
            </li>
            <li>
                <a href="{{url('testimonial/view')}}">
                    <i class="fa fa-user"></i><span>Testimonials</span>
                </a>
            </li>
            <li class="header">Info management</li>
            <li>
                <a href="{{url('social-link/view')}}">
                    <i class="fa fa-link"></i><span>Social Links</span>
                </a>
            </li>
            <li>
                <a href="{{url('contact-info/view')}}">
                    <i class="fa fa-link"></i><span>Contact Info</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
