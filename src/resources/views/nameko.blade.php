<x-app-layout>
    <div class="px-6 md:px-32 lg:px-80 md:mx-6">
        <div class="text-container">
            <h2 class="text-2xl font-bold text-center mt-6 border-b-2 border-yellow-400 pb-4 mb-6">純なめこって？</h2>
            <video controls src="{{ asset("video/nameko_introduce.mp4")}}" class="mb-6"></video>
            <p>新潟県三条市下田地域の里山で育てた自然栽培のなめこです。かさやじくが大きく、なめこ本来の風味や強い粘り、心地の良い食感が楽しめます。</p>
        </div>
        <div class="text-container">
            <h2 class="text-2xl font-bold text-center mt-6 border-b-2 border-yellow-400 pb-4 mb-6">どのように育てている？</h2>
            <p>私たちはなめこを自然の中で育てています。下田の原という場所は秋から冬にかけての間、寒暖差が大きいことが特徴。工場ではこの自然の環境を再現するのは難しいですが、この寒暖差こそが純なめこの大きさと肉厚さの秘訣なのです。</p>
            <div class="img-box"><img src="{{ asset("images/nameko_display.jpg")}}" alt="なめこ陳列"></div>
            <p>また、最新テクノロジーの導入も忘れていません。センサーによって温度や湿度、照度、菌床の水分量などを測定しデータを常に蓄積しています。より美味しいなめこをより効率よくつくるため、測定したデータを栽培に利用しているのです。</p>
            <div class="img-box"><img src="{{ asset("images/graph.jpg")}}" alt="グラフ"></div>
            <p>
                大きく育ったなめこは、ひとつひとつ丁寧に収穫しパック詰めしています。<br>
                お求めの際は、下田の道の駅(漢学の里しただ)と直売所のただいまーと、みっけセンターにお立ち寄りください。本サイトでもご購入いただけます。
            </p>
            <div class="md:flex justify-around">
                <div class="img-box"><img src="{{ asset("images/nameko_shelf.jpg")}}" alt="なめこの棚"></div>
                <div class="img-box ml-6"><img src="{{ asset("images/nameko_harvest.jpg")}}" alt="なめこの収穫"></div>
            </div>
        </div>

    </div>
</x-app-layout>