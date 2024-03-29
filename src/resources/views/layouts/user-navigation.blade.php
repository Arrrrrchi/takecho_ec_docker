<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- ハンバーガーアイコン -->
            <div class="block md:hidden mt-5 cursor-pointer" id="hamburger" x-on:click="open = !open">
                <!-- `x-show`ディレクティブを使って、メニューアイコンの表示を切り替えます -->
                <svg xmlns="http://www.w3.org/2000/svg" x-show="!open" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" x-show="open" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <div class="flex relative">
                <!-- Logo -->
                <div class="shrink-0 w-16 absolute left-50 md:left-0 top-2">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 md:-my-px md:ml-20 md:flex">
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
                    @auth('users')
                    <x-nav-link  :href="route('cart.index')" :active="request()->routeIs('cart.index')">
                        カート
                    </x-nav-link>
                    @endauth
                </div>
            </div>

            <div class="md:flex items-center md:ml-6 mt-2 lg:mt-0">
                @auth('users')
                    <div class="">
                        <a href="{{ route('profile.edit') }}">
                        <button class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            {{ Auth::user()->name }}<span> 様</span>
                        </button>
                        </a>
                    </div>
                    <div class="md:ml-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                ログアウト
                            </button>
                        </form>
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
    <div class="res-navi flex flex-col text-center content-center" x-bind:class="{'is-active' : open }">
        <a href="{{ route('index') }}"><div class="navi-item">ホーム</div></a>
        <a href="{{ route('items.index') }}"><div class="navi-item">商品一覧</div></a>
        <a href="{{ route('nameko') }}"><div class="navi-item">純なめこって？</div></a>
        <a href="{{ route('about') }}"><div class="navi-item">たけちょう商店とは</div></a>
        <a href="{{ route('contact.index') }}"><div class="navi-item">お問い合わせ</div></a>
        @auth('users')
        <a href="{{ route('cart.index') }}"><div class="navi-item">カート</div></a>
        @endauth

    </div>
</nav>
