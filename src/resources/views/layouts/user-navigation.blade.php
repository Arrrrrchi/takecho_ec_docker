<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Hamburger -->
            <div class="block md:hidden mt-5 cursor-pointer" id="hamburger" onclick="naviOpen()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>                  
            </div>
            
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center w-16">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        ホーム
                    </x-nav-link>
                    <x-nav-link :href="route('items.index')" :active="request()->routeIs('items.index')">
                        商品一覧
                    </x-nav-link>
                    <x-nav-link  :href="route('nameko')" :active="request()->routeIs('nameko')">
                        純なめこって？
                    </x-nav-link>
                    <x-nav-link  :href="route('about')" :active="request()->routeIs('about')">
                        たけちょう商店とは
                    </x-nav-link>
                    <x-nav-link  :href="route('contact.index')" :active="request()->routeIs('contact.index')">
                        お問い合わせ
                    </x-nav-link>
                </div>
            </div>

            <div class="md:flex md:items-center md:ml-6 mt-2 lg:mt-0">
                @auth('users')
                    <div class="">
                        <a href="{{ route('profile.edit') }}">
                        <button class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            {{ Auth::user()->name }}<span> 様</span>
                        </button>
                        </a>
                    </div>
                    <div class="ml-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                ログアウト
                            </button>
                        </form>
                    </div>
                    <div class="md:ml-4">
                        <a href="{{ route('cart.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        </a>
                    </div>
                @else
                    <div class="">
                        <a href="{{ route('login') }}">
                        <button class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            ログイン
                        </button>
                        </a>
                    </div>
                    <div class="md:ml-4">
                        <a href="{{ route('register') }}">
                        <button class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            新規作成
                        </button>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Links -->
    <div class="res-navi flex flex-col text-center content-center" id="res-navi">
        <div class="close-button block md:hidden p-5 cursor-pointer" id="close-button" onclick="naviClose()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>              
        </div>
        <a href="{{ route('index') }}"><div class="navi-item">ホーム</div></a>
        <a href="{{ route('items.index') }}"><div class="navi-item">商品一覧</div></a>
        <a href="{{ route('nameko') }}"><div class="navi-item">純なめこって？</div></a>
        <a href="{{ route('about') }}"><div class="navi-item">たけちょう商店とは</div></a>
        <a href="{{ route('contact.index') }}"><div class="navi-item">お問い合わせ</div></a>
    </div>
</nav>
<script>
    const res_navi = document.getElementById('res-navi');
    function naviOpen() {
        res_navi.classList.add('open');
        console.log('opened');
        console.log(res_navi);
    }

    function naviClose() {
        res_navi.classList.remove('open');
        console.log('closed');
        console.log(res_navi);
    }
</script>    
