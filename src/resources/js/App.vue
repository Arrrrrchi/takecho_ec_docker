<script setup>
import { ref } from 'vue/dist/vue.esm-bundler.js'

const message = ref('Hello World!')
</script>

<template>
  <h1>{{ message }}</h1>
</template>