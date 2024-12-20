<nav class="navbar navbar-expand fixed-top be-top-header">
    <div class="container-fluid">
        <div class="be-navbar-header">
            <a class="" href="{{ route('wp-admin.') }}">
                <div class="">
                    <img src="{{ asset('assets/admins/img/Logo.png')}}" class="mx-3" alt="Logo" style="width: 50%;">
                </div>
            </a>
        </div>
        <div class="page-title"><span>Dashboard</span></div>
        <div class="be-right-navbar">
            <ul class="nav navbar-nav float-right be-user-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                        <img src="{{ asset('assets/admins/img/avatar.png') }}" alt="Avatar">
                        <span class="user-name">{{Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <div class="user-info user-role">
                            @if (Auth::user()->role === "Quản lý")
                                <style>
                                    .be-top-header .be-user-nav>li.dropdown .dropdown-menu:after {
                                        left: auto;
                                        right: 13px;
                                        border-bottom-color: #ea4335 !important;
                                    }
                                    .user-role {
                                        background-color: #ea4335 !important;
                                    }
                                </style>
                            @endif
                            <div class="user-name">{{Auth::user()->name}}</div>
                            <div class="user-position online">{{Auth::user()->role}}</div>
                        </div>
                        <a class="dropdown-item" href="pages-profile.html"><span class="icon mdi mdi-face"></span>Tài khoản</a>
                        <a class="dropdown-item" href="#"><span class="icon mdi mdi-settings"></span>Cài đặt</a>
                        <a class="dropdown-item" href="">
                            <form class="p-0 m-0" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button id="logout" class="btn p-0 m-0"><span class="icon mdi mdi-power"></span>Đăng xuất </button>
                            </form>    
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav float-right be-icons-nav">
                <li class="nav-item dropdown"><a class="nav-link be-toggle-right-sidebar" href="#"
                        role="button" aria-expanded="false"><span class="icon mdi mdi-settings"></span></a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                        data-toggle="dropdown" role="button" aria-expanded="false"><span
                            class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                    <ul class="dropdown-menu be-notifications">
                        <li>
                            <div class="title">Notifications<span class="badge badge-pill">3</span></div>
                            <div class="list">
                                <div class="be-scroller-notifications">
                                    <div class="content">
                                        <ul>
                                            <li class="notification notification-unread"><a href="#">
                                                    <div class="image"><img src="{{ asset('assets/admins/img/avatar2.png') }}"
                                                            alt="Avatar"></div>
                                                    <div class="notification-info">
                                                        <div class="text"><span class="user-name">Jessica
                                                                Caruso</span> accepted your invitation to join
                                                            the team.</div><span class="date">2 min ago</span>
                                                    </div>
                                                </a></li>
                                            <li class="notification"><a href="#">
                                                    <div class="image"><img src="{{ asset('assets/admins/img/avatar3.png') }}"
                                                            alt="Avatar"></div>
                                                    <div class="notification-info">
                                                        <div class="text"><span class="user-name">Joel
                                                                King</span> is now following you</div><span
                                                            class="date">2 days ago</span>
                                                    </div>
                                                </a></li>
                                            <li class="notification"><a href="#">
                                                    <div class="image"><img src="{{ asset('assets/admins/img/avatar4.png') }}"
                                                            alt="Avatar"></div>
                                                    <div class="notification-info">
                                                        <div class="text"><span class="user-name">John
                                                                Doe</span> is watching your main repository
                                                        </div><span class="date">2 days ago</span>
                                                    </div>
                                                </a></li>
                                            <li class="notification"><a href="#">
                                                    <div class="image"><img src="{{ asset('assets/admins/img/avatar5.png') }}"
                                                            alt="Avatar"></div>
                                                    <div class="notification-info"><span class="text"><span
                                                                class="user-name">Emily Carter</span> is now
                                                            following you</span><span class="date">5 days
                                                            ago</span></div>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer"> <a href="#">View all notifications</a></div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                        data-toggle="dropdown" role="button" aria-expanded="false"><span
                            class="icon mdi mdi-apps"></span></a>
                    <ul class="dropdown-menu be-connections">
                        <li>
                            <div class="list">
                                <div class="content">
                                    <div class="row">
                                        <div class="col"><a class="connection-item" href="#"><img
                                                    src="{{ asset('assets/admins/img/github.png') }}"
                                                    alt="Github"><span>GitHub</span></a></div>
                                        <div class="col">
                                            <a class="connection-item" href="#">
                                                <img src="{{ asset('assets/admins/img/bitbucket.png') }}" alt="Bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="connection-item" href="#">
                                                <img src="{{ asset('assets/admins/img/slack.png') }}" alt="Slack">
                                                <span>Slack</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><a class="connection-item" href="#"><img
                                                    src="{{ asset('assets/admins/img/dribbble.png') }}"
                                                    alt="Dribbble"><span>Dribbble</span></a></div>
                                        <div class="col"><a class="connection-item" href="#"><img
                                                    src="{{ asset('assets/admins/img/mail_chimp.png') }}"
                                                    alt="Mail Chimp"><span>Mail Chimp</span></a></div>
                                        <div class="col"><a class="connection-item" href="#"><img
                                                    src="{{ asset('assets/admins/img/dropbox.png') }}"
                                                    alt="Dropbox"><span>Dropbox</span></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer"> <a href="#">More</a></div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>