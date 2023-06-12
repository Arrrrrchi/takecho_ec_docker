<template>
    <div class="flex justify-center">
    <div class="grid grid-cols-3 gap-1">
        <div v-for="post in posts" :key="post.id" class="image-box">
            <a :href="post.permalink" target="_blank">
                <img :src="post.media_url" :alt="post.username" class="image" />
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
.image-box {
    height: 25vw;
    max-height: 325px;
    width: 25vw;
}

.image {
    height: 25vw;
    max-height: 325px;
    width: 100%;
    max-width: 325px;
    object-fit: cover;
}

@media (min-width: 390px) {
    .grid {
        grid-template-columns: repeat(1, minmax(0, 325px));
    }
    .image-box {
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