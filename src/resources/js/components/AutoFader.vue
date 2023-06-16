<template>
    <div class="slider">
        <Transition name="fade" mode="out-in">
            <img :key="currentImage" :src="currentImage" alt="Slider Image" />
        </Transition>
    </div>
</template>

<script>
export default {
    data() {
        return {
            images: [
                "/images/top1.jpeg",
                "/images/top2.jpeg",
                "/images/top3.jpeg"
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
        }, 4000);
    }
};
</script>

<style scoped>
.slider {
    width: 100%;
    height: 80vh;
    overflow: hidden;
}

img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0.5;
}

</style>
