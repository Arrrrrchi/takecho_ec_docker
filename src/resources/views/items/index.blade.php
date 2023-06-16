<x-app-layout>
    <x-flash-message status="session('status')" />

    <div class="py-12 bg-white h-[80vh]">
        <div class="flex justify-center items-center border-b-2 border-yellow-400 mx-12 pb-4">
            <h2 class="text-3xl">商品一覧</h2>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
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
    </div>
</x-app-layout>
