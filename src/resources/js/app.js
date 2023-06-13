import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import ModalWindow from "./components/ModalWindow.vue";
import InstagramPostList from "./components/InstagramPostList.vue";
import YoutubePlayList from "./components/YoutubePlayList.vue";
import ImageSlider from "./components/ImageSlider.vue";

createApp({
    components: {
        ModalWindow,
        InstagramPostList,
        YoutubePlayList,
        ImageSlider,
    }
}).mount('#app');



// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();
