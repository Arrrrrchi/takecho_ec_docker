<x-guest-layout>
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">内容の確認</h1>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form method="post" action="{{ route('contact.send') }}">
        @csrf
        <div class="flex flex-wrap -m-2">
            <div class="p-2 w-1/2">
                <div class="relative">
                <label class="leading-7 text-sm text-gray-600">お名前</label>
                <div  class="w-full bg-gray-100 bg-opacity-50 rounded focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $inputs['name'] }}</div>
                <input type="hidden" name="name" value="{{ $inputs['name'] }}">
                </div>
            </div>
            <div class="p-2 w-1/2">
                <div class="relative">
                <label class="leading-7 text-sm text-gray-600">メールアドレス</label>
                <div  class="w-full bg-gray-100 bg-opacity-50 rounded focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $inputs['email'] }}</div>
                <input type="hidden" name="email" value="{{ $inputs['email'] }}">
                </div>
            </div>
            <div class="p-2 w-full">
                <div class="relative">
                <label class="leading-7 text-sm text-gray-600">お問い合わせ内容</label>
                <div class="w-full bg-gray-100 bg-opacity-50 rounded focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{!! nl2br(e($inputs['message'])) !!}</div>
                <input type="hidden" name="message">
                </div>
            </div>
            <div class="flex p-2 w-full">
                <button type="submit" name="action" value="back" class="flex mx-auto text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">内容修正</button>
                <button type="submit" name="action" value="submit"  class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信する</button>
            </div>
        </div>
        </form>
    </div>
    </div>
</section>
</x-guest-layout>