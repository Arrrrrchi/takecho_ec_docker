<x-app-layout>
    <section class="text-gray-600 body-font relative bg-white text-center">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">ご購入いただきありがとうございます</h1>
            <p class="text-lg">商品発送後に、ご入力いただいたメールアドレス宛にご連絡させていただきます</p>
        </div>
        <button type="button" onclick="location.href='{{ route('index') }}'" class="bg-gray-100  border border-gray-300 ml-6 mb-6 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">ホームに戻る</button>
    </section>
</x-app-layout>