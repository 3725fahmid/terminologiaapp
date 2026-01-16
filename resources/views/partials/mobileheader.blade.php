  <header id="footer-bar" class="d-lg-none d-md-none d-inline-block">
    <div class="navbar-header d-flex item-center justify-evenly">


        <!-- Home Page Btn -->
        <div class="mx-lg-3 mx-1 mt-2 px-lg-3 px-1">
            <div class="dropdown d-lg-inline-block ms-1">
                <a href="{{route('home')}}" class="waves-effect">
                    <button type="button" class="btn header-item noti-icon waves-effect d-flex flex-column align-items-center">
                        <i class="{{ Route::is('home') ? 'ri-home-4-fill' : 'ri-home-4-line' }}"></i>
                        <span class="small">
                            Home
                        </span>
                    </button>
                </a>
            </div>
        </div>

        <!-- Quize Page Btn -->
        <div class="mx-lg-3 mx-1 mt-2 px-lg-3 px-1">
            <div class="dropdown d-lg-inline-block ms-1">
                <a href="{{url('quiz')}}" class="waves-effect">
                    <button type="button" class="btn header-item noti-icon waves-effect d-flex flex-column align-items-center">
                        <i class="{{ request()->is('quiz') ? 'ri-keyboard-box-fill' : 'ri-keyboard-box-line' }}"></i>
                        <span class="small">
                            Quize
                        </span>
                    </button>
                </a>
            </div>
        </div>

        <!-- Report Page Btn-->
        <div class="mx-lg-3 mx-1 mt-2 px-lg-3 px-1">
            <div class="dropdown d-lg-inline-block ms-1">
                <a href="#" class="waves-effect">
                    <button type="button" class="btn header-item noti-icon waves-effect d-flex flex-column align-items-center">
                        <i class="{{ request()->is('#') ? 'ri-bar-chart-box-fill' : 'ri-bar-chart-box-line' }}"></i>
                        <span class="small">
                            Report
                        </span>
                    </button>
                </a>
            </div>
        </div>

        {{-- User Account  --}}
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
</header>
