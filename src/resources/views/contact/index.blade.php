<x-guest-layout>
<section class="text-gray-600 body-font relative bg-white">
    <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">お問い合わせ</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">以下のフォームよりお気軽にお問合せください</p>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form method="POST" action="{{ route('contact.confirm') }}">
        @csrf
        <div class="flex flex-wrap -m-2">
        <div class="p-2 w-1/2">
            <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
        </div>
        <div class="p-2 w-1/2">
            <div class="relative">
            <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
        </div>
        <div class="p-2 w-full">
            <div class="relative">
            <label for="body" class="leading-7 text-sm text-gray-600">お問い合わせ内容</label>
            <textarea id="body" name="body" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('body') }}</textarea>
            </div>
        </div>
        <div class="p-2 w-full">
            <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">入力内容確認</button>
        </div>
        </div>
        </form>
    </div>
    </div>
</section>
</x-guest-layout>