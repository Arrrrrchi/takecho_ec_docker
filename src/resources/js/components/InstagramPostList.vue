<template>
    <div>
    <div class="grid grid-cols-3 gap-4">
        <div v-for="post in posts" :key="post.id">
            <a :href="post.permalink" target="_blank">
                <img :src="post.media_url" :alt="post.username" class="w-full h-auto" />
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
        },
    },
    mounted() {
        // Instagram APIレスポンスのデータを代入
        const responseData = this.responseBody;

        // 投稿記事のデータを取得
        this.posts = responseData.business_discovery.media.data.slice(0, 9);
    },
};
</script>

<style scoped>
.grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 1rem;
}
</style>