  <header id="page-topbar">
    <div class="navbar-header d-flex justify-between">

        <div class="d-flex">

            <!-- LOGO -->
            <div class="mx-3 px-3">
                <a href="{{ route('home') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-light-sm.svg') }}" alt="logo-sm-light" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.svg') }}" alt="logo-light" height="20">
                    </span>
                </a>
            </div>

            <!-- App Search-->
            {{-- <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form> --}}
        </div>

        <div class="d-flex">

            <!-- Home Page Btn -->
            <div class="lg-mx-3 mx-1 mt-2 lg-px-3 px-1">
                <div class="dropdown d-lg-inline-block ms-1">
                    <a href="{{route('home')}}" class="waves-effect">
                        <button type="button" class="btn header-item noti-icon waves-effect">
                            <i class="{{ Route::is('home') ? 'ri-home-4-fill' : 'ri-home-4-line' }}"></i>
                        </button>
                    </a>
                </div>
            </div>

            <!-- Quize Page Btn -->
            <div class="lg-mx-3 mx-1 mt-2 lg-px-3 px-1">
                <div class="dropdown d-lg-inline-block ms-1">
                    <a href="{{ url('category') }}" class="waves-effect">
                        <button type="button" class="btn header-item noti-icon waves-effect">
                            <i class="{{ request()->is('category*') ? 'ri-keyboard-box-fill' : 'ri-keyboard-box-line' }}"></i>
                        </button>
                    </a>
                </div>
            </div>

            <!-- Report Page Btn-->
            <div class="lg-mx-3 mx-1 mt-2 lg-px-3 px-1">
                <div class="dropdown d-lg-inline-block ms-1">
                    <a href="{{url('account')}}" class="waves-effect">
                        <button type="button" class="btn header-item noti-icon waves-effect">
                            <i class="{{ request()->is('account*') ? 'ri-bar-chart-box-fill' : 'ri-bar-chart-box-line' }}"></i>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <div class="d-flex">
                <div class="dropdown d-none d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-search-line"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">
            
                        <form class="p-3">
                            <div class="mb-3 m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-apps-2-line"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        <div class="px-lg-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ asset('assets/images/brands/github.png')}}" alt="Github">
                                        <span>GitHub</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ asset('assets/images/brands/bitbucket.png')}}" alt="bitbucket">
                                        <span>Bitbucket</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ asset('assets/images/brands/dribbble.png')}}" alt="dribbble">
                                        <span>Dribbble</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ asset('assets/images/brands/dropbox.png')}}" alt="dropbox">
                                        <span>Dropbox</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ asset('assets/images/brands/mail_chimp.png')}}" alt="mail_chimp">
                                        <span>Mail Chimp</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#">
                                        <img src="{{ asset('assets/images/brands/slack.png')}}" alt="slack">
                                        <span>Slack</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Dark mode btn --}}
                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item mt-2 noti-icon waves-effect">
                        <div class="checkbox-wrapper-54">
                            <label class="switch" for="mode-switch">
                                <input type="checkbox" id="mode-switch">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </button>
                </div>

            </div>

            @php
            $id = Auth::user()->id;
            $userData = App\Models\User::find($id);
            @endphp

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ (!empty($userData->profile_image))? url('upload/user_images/'.$userData->profile_image):url('upload/no_image.jpg') }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ $userData->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('change.password') }}"><i class="ri-wallet-2-line align-middle me-1"></i> Change Password</a>
                    <a class="dropdown-item d-block" href="{{url('setting')}}"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>
        </div>

    </div>
</header>
