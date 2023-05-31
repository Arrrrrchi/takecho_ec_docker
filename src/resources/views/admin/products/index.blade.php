<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品管理
        </h2>
    </x-slot>

    <x-flash-message status="session('status')" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ route('admin.products.create') }}">
                <button class="mx-12 mt-12 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">商品登録</button>
            </a>
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-wrap -m-4">
                    @foreach ($products as $product)
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                        <a class="block relative h-48 rounded overflow-hidden" href="{{ route('admin.products.edit',['product' => $product->id])}}">
                            @if (!empty($product->imageFirst->filename))
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ asset('/storage/products/' . $product->imageFirst->filename)}}">
                            @else
                            <img src="{{ asset('/images/no_image.jpeg')}}" alt="">
                            @endif
                        </a>
                        <div class="mt-4">
                            <div class="flex">
                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 mr-2">{{ $product->category->name }}</h3>                            
                            @if($product->is_selling)
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 bg-indigo-700 text-white">販売中</h3>
                            @else
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1 bg-red-700 text-white">停止中</h3>
                            @endif
                            </div>
                            <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                            <p class="mt-1">{{ $product->price }}</p>
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
