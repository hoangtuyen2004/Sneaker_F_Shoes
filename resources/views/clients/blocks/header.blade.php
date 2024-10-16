<div class="header-top">
    <div class="container">
        <div class="ht-left">
            <div class="mail-service">
                <i class=" fa fa-envelope"></i>
                hello.colorlib@gmail.com
            </div>
            <div class="phone-service">
                <i class=" fa fa-phone"></i>
                +65 11.188.888
            </div>
        </div>
        <div class="ht-right">
            @if (Auth::user())
                <div class="login-panel d-flex"><a href="" class="text-dark"><i class="fa fa-user"></i> {{Auth::user()->name}}</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn m-0 p-0">|Out</button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a>
            @endif
            <div class="top-social" style="border-right: none;">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter-alt"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
                <a href="#"><i class="ti-pinterest"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="inner-header">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="logo">
                    <a href="./index.html">
                        <img src="{{ asset('assets/clients/img/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="advanced-search">
                    <button type="button" class="category-btn">All Categories</button>
                    <div class="input-group">
                        <input type="text" placeholder="What do you need?">
                        <button type="button"><i class="ti-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right col-md-3">
                <ul class="nav-right">
                    <li class="heart-icon">
                        <a href="#">
                            <i class="icon_heart_alt"></i>
                            <span>1</span>
                        </a>
                    </li>
                    <li class="cart-icon">
                        <a href="#">
                            <i class="icon_bag_alt"></i>
                            <span>3</span>
                        </a>
                        <div class="cart-hover">
                            <div class="select-items">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="si-pic"><img src="{{ asset('assets/clients/img/select-product-1.jpg') }}" alt=""></td>
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p>$60.00 x 1</p>
                                                    <h6>Kabino Bedside Table</h6>
                                                </div>
                                            </td>
                                            <td class="si-close">
                                                <i class="ti-close"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="si-pic"><img src="{{ asset('assets/clients/img/select-product-2.jpg') }}" alt=""></td>
                                            <td class="si-text">
                                                <div class="product-selected">
                                                    <p>$60.00 x 1</p>
                                                    <h6>Kabino Bedside Table</h6>
                                                </div>
                                            </td>
                                            <td class="si-close">
                                                <i class="ti-close"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="select-total">
                                <span>total:</span>
                                <h5>$120.00</h5>
                            </div>
                            <div class="select-button">
                                <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                            </div>
                        </div>
                    </li>
                    <li class="cart-price">$150.00</li>
                </ul>
            </div>
        </div>
    </div>
</div>
