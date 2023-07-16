<x-app-layout>
    {{-- HERO --}}
    <div class="relative">
        <div class="relative bg-center bg-cover">
            <auto-fader />
        </div>
    </div>

    {{-- BARRNER --}}
    <div class="relative site-color-1 pt-24 pb-24">
        <div class="relative bg-center bg-cover w-1/2 mx-auto">
            <auto-slider />
        </div>
    </div>

    {{-- ITEMS --}}
    <div class="relative pt-24 pb-24 bg-white">
        <div class="relative bg-center bg-cover">
            <div class="flex justify-center items-center border-b-2 border-yellow-400 mx-12 pb-4">
                <h2 class="text-3xl">商品一覧</h2>
            </div>
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-12 mx-auto">
                    <div class="flex flex-wrap -m-4">
                    @foreach ($products as $product)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a class="block relative h-48 rounded overflow-hidden" href="{{ route('items.show', ['item' => $product->id])}}">
                            @if (!empty($product->imageFirst->filename))
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ asset('/storage/products/' . $product->imageFirst->filename)}}">
                            @else
                            <img src="{{ asset('/images/no_image.jpeg')}}" alt="">
                            @endif
                        </a>
                        <div class="mt-4">
                            <div class="flex">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 mr-2">#{{ $product->category->name }}</h3>                            
                            @if($product->is_selling)
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 bg-indigo-700 text-white">販売中</h3>
                            @else
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 bg-red-700 text-white">停止中</h3>
                            @endif
                            </div>
                            <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                            <p class="mt-1">{{ number_format($product->price) }}<span class="text-sm text-gray-700">円(税込)</span></p>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>

    {{-- YOUTUBE --}}
    <div class="relative pt-24 pb-24 site-color-1">
        <div class="flex justify-center items-center border-b-2 border-yellow-400 mx-12 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
            </svg>
            <h2 class="text-3xl">YouTube</h2>
        </div>
        <div class="relative bg-center bg-cover md:mx-12 lg:mx-36 mt-12">
            <youtube-play-list :response-body="{{ $youtube_api_response }}"/>
        </div>
    </div>

    {{-- INSTAGRAM --}}
    <div class="relative pt-24 pb-24 bg-white">
        <div class="flex justify-center items-center border-b-2 border-yellow-400 mx-12 pb-4">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6 mr-2" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
            </svg>
            <h2 class="text-3xl">Instagram</h2>
        </div>
        <div class="relative bg-center bg-cover md:mx-12 lg:mx-36 mt-12">
            <instagram-post-list :response-body="{{ $instagram_api_response }}"/>
        </div>
    </div>

</x-app-layout>

