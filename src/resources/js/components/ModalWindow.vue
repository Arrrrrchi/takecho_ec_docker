<template>
    <div>
    <div v-for="time in times" :key="time">
        <div class="m-6 flex items-center">
        <p>{{ time }}枚目:</p>
        <button type="button" @click="openModal(time)" class="bg-gray-100 py-2 px-8 ml-6 h-10 border border-gray-300 focus:outline-none hover:bg-gray-400 rounded">画像を選択</button>
        <div class="w-1/4 ml-10">
            <img :src="selectedImage(time)" alt="">
        </div>
        </div>
        <input type="hidden" :name="'image' + time" :id="'image' + time" :value="selectedImageId[time]">

        <div id="overlay" v-show="showContent[time]" @click="closeModal(time)">
            <div id="content" @click="stopEvent($event)" class="">
                <h2 class="mb-4">画像ファイルを選択してください</h2>
                <ul class="flex flex-wrap">
                    <li v-for="image in images" :key="image.id" @click="selectImage(image.id, time)" class="w-1/4 p-2 md:p-4 mb-2 border rounded-md pointer">
                        <img :src="getImagePath(image.filename)">
                    </li>
                </ul>
                <button type="button" @click="closeModal(time)" class="bg-gray-100 py-2 px-8 mt-4 block mx-auto border border-gray-300 focus:outline-none hover:bg-gray-400 rounded">閉じる</button>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    data() {
    return {
        showContent: {},
        selectedImageId: {},
        times: [1, 2, 3, 4]
    };
    },
    props: {
    images: {
        type: Array
    }
    },
    methods: {
    openModal(time) {
        this.showContent[time] = true;
    },
    closeModal(time) {
        this.showContent[time] = false;
    },
    stopEvent(event) {
        event.stopPropagation();
    },
    getImagePath(filename) {
        return `/storage/products/${filename}`;
    },
    selectImage(imageId, time) {
        this.selectedImageId[time] = imageId;
        this.closeModal(time);
    },
    selectedImage(time) {
        if (this.selectedImageId[time]) {
        const selectedImage = this.images.find(
            (image) => image.id === this.selectedImageId[time]
        );
        if (selectedImage) {
            return this.getImagePath(selectedImage.filename);
        }
        }
        return '';
    }
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
    width:70%;
    padding: 1em;
    background:#fff;
}

.pointer {
    cursor: pointer;
}

</style>