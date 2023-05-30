<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品登録
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <!-- バリデーションエラー -->
            <x-validation-errors class="mb-4 text-center" :errors="$errors" />
            
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="m-6">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">商品名 ※必須</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="m-6">
                <label for="information" class="block text-gray-700 text-sm font-bold mb-2">商品情報 ※必須</label>
                <textarea id="information" name="information" rows="10" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('information') }} </textarea>
            </div>
            <div class="m-6">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">価格 ※必須</label>
                <input id="price" type="text" name="price" value="{{ old('price') }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="m-6">
                <label for="sort_order" class="block text-gray-700 text-sm font-bold mb-2">表示順</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="w-1/2 m-6">
                <div class="relative">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">カテゴリー</label>
                    <select name="category" id="category" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="m-6">
                <label for="sort_order" class="block text-gray-700 text-sm font-bold mb-2">画像</label>
                <modal-window :images="{{ $images->toJson() }}"/>
            </div>
            <div class="p-2 w-1/2 mx-auto">
                <div class="relative flex justify-around">
                    <div><input type="radio" name="is_selling" value="1" class="mr-2" checked >販売中</div>
                    <div><input type="radio" name="is_selling" value="0" class="mr-2" >停止中</div>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button type="button" onclick="location.href='{{ route('admin.products.index') }}'" class="bg-gray-100  border border-gray-300 ml-6 mb-6 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                <button type="submit" class="mr-6 mb-6 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
            </div>
            </form>
        </div>
        </div>
    </div>
</x-app-layout>