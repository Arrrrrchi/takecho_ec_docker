<template>
    <div class="slider">
        <Transition name="slide" mode="out-in">
            <img :key="currentImage" :src="currentImage" alt="Slider Image" />
        </Transition>
    </div>
</template>

<script>
export default {
    data() {
        return {
            images: [
                "/images/banner1.svg",
                "/images/banner2.svg",
            ],
            currentIndex: 0
        };
    },
    computed: {
        currentImage() {
            return this.images[this.currentIndex];
        }
    },
    mounted() {
        setInterval(() => {
            this.currentIndex = (this.currentIndex + 1) % this.images.length;
        }, 10000);
    }
};
</script>

<style scoped>
.slider {
    height: 500px;
    width: 800px;
    overflow: hidden;
    position: relative;
}

img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
}

.slide-enter-active {
    transition: transform 0.8s;
}

.slide-enter-to {
    transform: translateX(-100%);
}

@media (max-width: 860px) {
    .slider {
        height: 400px;
        width: 80vw;
        margin-left: 10vw;
        margin-right: 10vw;
    }
}


@media (max-width: 390px) {
    .slider {
        height: 200px;
        width: 90vw;
        margin-left: 5vw;
        margin-right: 5vw;
    }
}


</style>
