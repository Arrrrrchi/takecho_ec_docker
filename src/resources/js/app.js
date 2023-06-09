import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import ModalWindow from "./components/ModalWindow.vue";
import MyInstagram from "./components/MyInstagram.vue";

createApp({
    components: {
        ModalWindow,
        MyInstagram,
    }
}).mount('#app');



// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();
