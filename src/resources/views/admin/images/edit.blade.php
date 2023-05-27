<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            画像登録
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- バリデーションエラー -->
                    <x-validation-errors class="mb-4 text-center" :errors="$errors" />

                    <form action="{{ route('admin.images.update', ['image' => $image ]) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="-m-2">
                            <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="title" class="leading-7 text-sm text-gray-600">画像のタイトル</label>
                                    <input type="text" id="title" name="title" value="{{$image->title}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>

                            <div class="w-1/2 p-2 md:p-4 mx-auto">
                                <div class="border rounded-md p-2 md:p-4">
                                    <img src="{{ asset('storage/products/' . $image->filename) }}" alt="">
                                </div>
                            </div>

                            <div class="p-2 w-full flex justify-around mt-4">
                                <button type="button" onclick="location.href='{{ route('admin.images.index') }}'" class="bg-gray-100 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                            </div>
                        </div>
                    </form>
                    <form id="delete_{{ $image->id }}" action="{{ route('admin.images.destroy',  ['image' => $image->id ]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="p-2 w-full flex justify-around mt-32">
                            <a href="#" data-id="{{ $image->id }}" onclick="deletePost(this)" class="text-white bg-red-700 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded ">削除する</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>