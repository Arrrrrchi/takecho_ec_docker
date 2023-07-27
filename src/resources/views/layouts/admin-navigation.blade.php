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
            <div class="flex">
                <div class="shrink-0 flex items-center w-22">
                    <h1 class="font-bold bg-orange-500 text-white rounded p-1 ml-4">管理者画面</h1>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 md:-my-px md:ml-10 sm:flex ">
                    <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index')">
                        商品管理
                    </x-nav-link>
                    <x-nav-link :href="route('admin.images.index')" :active="request()->routeIs('admin.images.index')">
                        画像管理
                    </x-nav-link>
                </div>
            </div>

            <div class="md:flex md:items-center md:ml-6 mt-2 lg:mt-0">
                @auth('admin')
                    <div class="ml-4">
                        <a href="{{ route('admin.profile.edit') }}">
                        <button class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            登録情報
                        </button>
                        </a>
                    </div>
                    <div class="ml-4">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                ログアウト
                            </button>
                        </form>
                    </div>
                @else
                    <div class="">
                        <a href="{{ route('admin.login') }}">
                        <button class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            ログイン
                        </button>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Links -->
    <div class="res-navi flex flex-col text-center content-center" x-bind:class="{'is-active' : open }">
        <a href="{{ route('admin.products.index') }}"><div class="navi-item">商品管理</div></a>
        <a href="{{ route('admin.images.index') }}"><div class="navi-item">画像管理</div></a>
    </div>
</nav>
