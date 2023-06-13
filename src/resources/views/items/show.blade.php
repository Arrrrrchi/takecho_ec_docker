<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品情報
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="text-gray-600 body-font overflow-hidden">
                    <div class="container px-2 py-24 mx-auto">
                        <div class="lg:w-4/5 mx-auto flex flex-wrap">
                            <div  class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded">
                                <image-slider :images="{{ json_encode($images) }}" />
                            </div>
                            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                
                                <h2 class="text-sm title-font text-gray-500 tracking-widest">#{{ $product->category->name }}</h2>
                                <h1 class="text-gray-900 text-3xl title-font font-medium mb-2">{{ $product->name }}</h1>
                                <div class="h-1/4">
                                    <p class="leading-relaxed">{{ $product->information }}</p>
                                </div>
                                <span class="title-font font-medium text-2xl text-gray-900">{{ number_format($product->price) }}<span class="text-sm text-gray-700">円(税込)</span></span>
                            </div>
                        </div> 
                        <div class="flex justify-end mr-24">
                            <form method="post" action="{{ route('cart.add') }}">
                                @csrf
                                <div class="flex items-center my-4">
                                    <div class="rerative mr-4">
                                    <span class="mr-3">数量</span>
                                        <select name="quantity" class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                            @for ($i = 1; $i <= $quantity; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">カートに入れる</button>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
