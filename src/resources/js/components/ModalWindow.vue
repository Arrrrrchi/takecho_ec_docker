<template>
    <div class="m-6">
        <button type="button" @click="openModal" class="bg-gray-100 py-2 px-8 border border-gray-300 focus:outline-none hover:bg-gray-400 rounded">画像を選択</button>
    </div>
    <div id="overlay" v-show="showContent" @click="closeModal">
        <div id="content" @click="stopEvent($event)">
            <h2>画像ファイルを選択してください</h2>
            <div class="flex flex-wrap">
                <ul class="w-1/4 p-2 md:p-4">
                    <li v-for:="image in images" :key="image.id">
                    <a href="">
                    <div class="border rounded-md p-2 md:p-4">
                        <img src="image.url" alt="">
                        <div class="text-gray-700"></div>
                    </div>
                    </a>
                    </li>
                </ul>
            </div>

            <button type="button" @click="closeModal" class="bg-gray-100 py-2 px-8 border border-gray-300 focus:outline-none hover:bg-gray-400 rounded">閉じる</button>
        </div>
    </div>

</template>

<script>
    // import { defineComponent } from 'vue/dist/vue.esm-bundler.js';
    export default {
        data() {
            return {
                showContent: false,
                images:[],
            };
        },
        methods: {
            openModal() {
                this.showContent = true;
            },
            closeModal() {
                this.showContent = false;
            },
            stopEvent(event) {
                event.stopPropagation();
            },
            async getImages() {
                try {
                    const response = await getImages();
                    this.images = response.data;
                } catch (error) {
                    console.error(error);
                }
            },
        }
    };
</script>

<style>
#overlay {
    /*　要素を重ねた時の順番　*/
    z-index:1;

    /*　画面全体を覆う設定　*/
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-color:rgba(0,0,0,0.5);

    /*　画面の中央に要素を表示させる設定　*/
    display: flex;
    align-items: center;
    justify-content: center;
}

#content{
    z-index:2;
    width:50%;
    padding: 1em;
    background:#fff;
}

</style>