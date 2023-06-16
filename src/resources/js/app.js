import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import ModalWindow from "./components/ModalWindow.vue";
import InstagramPostList from "./components/InstagramPostList.vue";
import YoutubePlayList from "./components/YoutubePlayList.vue";
import ImageSlider from "./components/ImageSlider.vue";
import AutoFader from "./components/AutoFader.vue";
import AutoSlider from "./components/AutoSlider.vue";

createApp({
    components: {
        ModalWindow,
        InstagramPostList,
        YoutubePlayList,
        ImageSlider,
        AutoFader,
        AutoSlider,
    }
}).mount('#app');



// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();
