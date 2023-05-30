<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品編集
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <!-- バリデーションエラー -->
            <x-validation-errors class="mb-4 text-center" :errors="$errors" />
            <form method="POST" action="{{ route('admin.products.update', ['product' => $product]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="m-6">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">商品名 ※必須</label>
                    <input id="name" type="text" name="name" value="{{ $product->name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="m-6">
                    <label for="information" class="block text-gray-700 text-sm font-bold mb-2">商品情報 ※必須</label>
                    <textarea id="information" name="information" rows="10" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $product->information }} </textarea>
                </div>
                <div class="m-6">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">価格 ※必須</label>
                    <input id="price" type="text" name="price" value="{{ $product->price }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="m-6">
                    <label for="sort_order" class="block text-gray-700 text-sm font-bold mb-2">表示順</label>
                    <input type="number" id="sort_order" name="sort_order" value="{{ $product->order }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="w-1/2 m-6">
                    <div class="relative">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">カテゴリー</label>
                        <select name="category" id="category" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id === $product->category_id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="m-6">
                    <label for="sort_order" class="block text-gray-700 text-sm font-bold mb-2">画像</label>
                    <modal-window :images="{{ $images->toJson() }}" :productImages="{{ json_encode($productImages) }}" />
                </div>
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative flex justify-around">
                        <div><input type="radio" name="is_selling" value="1" class="mr-2" @if($product->is_selling === 1) checked @endif>販売中</div>
                        <div><input type="radio" name="is_selling" value="0" class="mr-2" @if($product->is_selling === 0) checked @endif >停止中</div>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button type="button" onclick="location.href='{{ route('admin.products.index') }}'" class="bg-gray-100  border border-gray-300 ml-6 mb-6 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                    <button type="submit" class="mr-6 mb-6 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</x-app-layout>