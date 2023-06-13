<x-app-layout>
    {{-- HERO --}}
    <div class="relative bg-gray-900">
        <div class="relative h-[80vh] bg-center bg-cover">
            <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset("images/top1.JPG")}}" alt="Hero Image">
        </div>
    </div>

    {{-- BARRNER --}}
    <div class="relative bg-white h-[80vh] pt-24 pb-24">
        <div class="relative bg-center bg-cover">
        </div>
    </div>

    {{-- ITEMS --}}
    <div class="relative pt-24 pb-24" style="background-color: RGB(248, 244, 241)">
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
    <div class="relative pt-24 pb-24 bg-white ">
        <div class="flex justify-center items-center border-b-2 border-yellow-400 mx-12 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
            </svg>
            <h2 class="text-3xl">YouTube新着</h2>
        </div>
        <div class="relative bg-center bg-cover md:mx-12 lg:mx-36 mt-12">
            <youtube-play-list :response-body="{{ $youtube_api_response }}"/>
        </div>
    </div>

    {{-- INSTAGRAM --}}
    <div class="relative pt-24 pb-24"  style="background-color: RGB(248, 244, 241)">
        <div class="flex justify-center items-center border-b-2 border-yellow-400 mx-12 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
            </svg>
            <h2 class="text-3xl">Instagram</h2>
        </div>
        <div class="relative bg-center bg-cover md:mx-12 lg:mx-36 mt-12">
            <instagram-post-list :response-body="{{ $instagram_api_response }}"/>
        </div>
    </div>

</x-app-layout>

