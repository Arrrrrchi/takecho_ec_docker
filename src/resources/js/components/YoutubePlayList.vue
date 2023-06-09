<template>
    <div>
    <div class="grid grid-cols-3 gap-4">
        <div v-for="item in posts" :key="item.snippet.resourceId.videoId">
        <a :href="getVideoUrl(item.snippet.resourceId.videoId)" target="_blank">
            <img :src="item.snippet.thumbnails.medium.url" :alt="item.snippet.title" class="w-full h-auto" />
            <p>{{ item.snippet.title }}</p>
        </a>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
            };
        },
        props: {
            responseBody: {
                type: Object,
                required: true,
            },
        },
        mounted() {
            this.extractPosts();
        },
        methods: {
            // responseBody.itemsから必要な情報を抽出し、postsに格納
            extractPosts() {
                const items = this.responseBody.items || [];
                this.posts = items.map((item) => ({
                    snippet: item.snippet,
                }));
            },
            getVideoUrl(videoId) {
                return `https://www.youtube.com/watch?v=${videoId}`;
            },
        },
    };
</script>

<style scoped>
.grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 1rem;
}
</style>