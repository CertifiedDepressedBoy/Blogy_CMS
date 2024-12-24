<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        {{-- <a href="{{route('dashboard')}}" class="logo m-0 float-start">Blogy<span class="text-primary">.</span></a> --}}
                        <a href="{{route('dashboard')}}" ><img src="{{asset('assets/images/cms_logo.png')}}" style="max-width: 50px"></a>
                    </div>
                    <div class="col-8 text-center">


                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto" id="nav">
                            @auth
                            <li class="" ><a href="{{route('dashboard')}}">Home</a></li>
                            @if(Auth::user()->role == 'admin')
                            <li class=""><a href="{{route('admin.list')}}">Admins</a></li>
                            <li class=""><a href="{{route('admin.categories')}}">Categories</a></li>
                            <li class=""><a href="{{route('admin.posts')}}">Posts</a></li>
                            @endif
                            @if(Auth::user()->role == 'user')
                            <li class="" ><a href="{{url('/category/culture')}}">Culture</a></li>
                            <li class="" ><a href="{{url('/category/business')}}">Business</a></li>
                            <li class="" ><a href="{{url('/category/politics')}}">Politics</a></li>
                            <li class="" ><a href="{{url('/contact_me')}}">Contact Me</a></li>
                            <li class="" ><a href="{{url('/about_me')}}">About Me</a></li>
                            @endif
                            @endauth

                            @guest
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endguest

                            @auth
                                <li>
                                    <div class="hidden sm:flex sm:items-center">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 text-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                    <div>{{ Auth::user()->name }}</div>
                                                    <div class="ms-1">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </x-slot>

                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('profile.edit')">
                                                    {{ __('Profile') }}
                                                </x-dropdown-link>

                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <x-dropdown-link :href="route('logout')"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>
                                </li>
                                @if(Auth::user()->role == 'user')
                                <li><a href="{{route('posts.create')}}">Create</a></li>
                                @endif


                        </ul>

                    </div>
                    <div class="col-2 text-end">
                        <a href="" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                        <form action="{{route('search')}}" method="post" class="search-form d-none d-lg-inline-block">
                            @csrf
                            <input name="search" type="text" class="form-control rounded" placeholder="Search...">
                            <span class="bi-search"></span>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const navItems = document.querySelectorAll("#nav li");
    const currentUrl = window.location.href;

    navItems.forEach((navItem) => {
        const link = navItem.querySelector("a");
        if (link && currentUrl.includes(link.href)) {
            navItem.classList.add("active");
        }

        navItem.addEventListener("click", () => {
            const activeItems = document.querySelectorAll(".active");
            activeItems.forEach((activeItem) => activeItem.classList.remove("active"));
            navItem.classList.add("active");
        });
    });
});</script>
