import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import ModalWindow from "./components/ModalWindow.vue";

createApp({
    components: {
        ModalWindow,
    }
}).mount('#app');



// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();
