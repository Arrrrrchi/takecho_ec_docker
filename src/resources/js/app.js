import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import App from "./App.vue";

createApp({
    components: {
        App,
    }
}).mount('#app');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
