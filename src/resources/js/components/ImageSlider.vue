<template>
    <div class="container">
        <div class="slider">
            <button @click="backwardPage">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>
            <div class="clipping-container">
                <div class="pages" :style="{ left: currentLeft }">
                    <div class="page" v-for="(image, index) in filteredImages" :key="index">
                        <img :src="getImageUrl(image)" alt="Image" class="image"/>
                    </div>
                </div>
            </div>
            <button @click="forwardPage">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
        <div class="dots">
            <span
                v-for="(image, index) in filteredImages"
                :class="{ dot: true, 'dot-current': currentIndex === index }"
                :key="index"
            ></span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        images: {
            type: Array,
            default: () => [],
        },
    },
    data() {
        return {
            currentIndex: 0,
            pageWidth: 304,
            filteredImages: [], // filteredImagesを初期化する
        };
    },
    mounted() {
        this.filteredImages = this.images.filter((image) => image !== null); // imagesのフィルタリングを行う
    },
    methods: {
        getImageUrl(filename) {
            return `/storage/products/${filename}`;
        },
        forwardPage() {
            if (this.currentIndex < this.filteredImages.length - 1) {
                this.currentIndex += 1;
            }
        },
        backwardPage() {
            if (this.currentIndex > 0) {
                this.currentIndex -= 1;
            }
        },
        pageToPosition() {
            return -this.pageWidth * this.currentIndex;
        },
    },
    computed: {
        currentLeft() {
            return `${this.pageToPosition()}px`;
        },
    },
};
</script>

<style scoped>
.slider {
    display: flex;
    justify-content: center;

}

.clipping-container {
    clip-path: inset(0);
    position: relative;
    height: 171px;
    width: 304px;
    display: inline-block;
}
.pages {
    display: flex;
    transition: left 0.5s ease;
    position: absolute;
    left: 0;
}
.page {
    height: 171px;
    width: 304px;
    border: 1px solid white;
    box-sizing: border-box;
}
.image {
    object-fit: cover;
    width: 100%;
}
.dots {
    width: 30px;
    display: flex;
    justify-content: space-between;
    margin: auto;
    margin-top: 16px;
}
.dot {
    height: 8px;
    width: 8px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
}
.dot-current {
    background-color: skyblue;
}

@media (max-width: 390px) {

}

</style>
