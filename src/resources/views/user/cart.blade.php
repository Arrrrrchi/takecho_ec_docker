<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            カート
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <div class="md:flex md:items-center mb-4">
                                <div class="md:w-2/12 font-bold text-center">{{ $product->name }}</div>
                                <div class="md:w-3/12">
                                    @if ($product->imageFirst->filename !== null)
                                        <img src="{{ asset('storage/products/' . $product->imageFirst->filename )}}" alt="">
                                    @else
                                        <img src="" alt="">
                                    @endif
                                </div>
                                <div class="md:w-3/12 flex justify-around mt-4 md:mt-0">
                                    <div>{{ $product->pivot->quantity }}個</div>
                                    <div>{{ number_format( $product->pivot->quantity * $product->price ) }}<span class="text-sm text-gray-700">円(税込)</span></div>
                                    <div class="md:w-2/12">
                                        <form method="post" action="{{ route('cart.delete', ['item' => $product->id])}}">
                                            @csrf
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="flex flex-col md:flex-row justify-center md:justify-end">
                            <div class="my-2 md:mb-0 md:ml-4 text-center md:text-right">
                                小計: {{ number_format($totalPrice)}}<span class="text-sm text-gray-700">円(税込)</span>
                            </div>
                            <div class="my-2 md:my-0 md:ml-4 text-center md:text-right">
                                <button onclick="location.href='{{ route('cart.checkout')}}'" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">購入する</button>
                            </div>
                        </div>
                    @else
                        カートに商品が入っていません                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
