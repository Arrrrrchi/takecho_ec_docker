<template>
    <div class="flex justify-center">
    <div class="grid grid-cols-3 gap-1">
        <div v-for="post in posts" :key="post.id" class="media-box">
            <a :href="post.permalink" target="_blank">
                <template v-if="post.media_type === 'VIDEO'">
                    <source controls :src="post.media_url" type="video/mp4" class="video">
                </template>
                <template v-else-if="post.media_type === 'CAROUSEL_ALBUM'">
                    <img :src="post.media_url" :alt="post.username" class="image" />
                </template>
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
    grid-template-columns: repeat(3, minmax(0, 325px));
}
.media-box {
    height: 25vw;
    max-height: 325px;
    width: 25vw;
    max-width: 325px;
    position: relative;
    overflow: hidden;
}

.image {
    height: 25vw;
    max-height: 325px;
    width: 100%;
    max-width: 325px;
    object-fit: cover;
}

.video {
    object-fit: cover;
    width: 100%;
    position: absolute;
    top: -35%;
    pointer-events: none;
}

@media (max-width: 390px) {
    .grid {
        grid-template-columns: repeat(1, minmax(0, 325px));
    }
    .media-box {
        height: 80vw;
        max-height: 325px;
        width: 100%;
    }

    .image {
        height: 80vw;
        max-height: 325px;
        width: 100%;
        max-width: 325px;
        object-fit: cover;
    }

}
</style>