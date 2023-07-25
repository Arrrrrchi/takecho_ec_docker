<template>
    <div class="flex justify-center">
      <div class="grid grid-cols-3 gap-1">
        <div v-for="post in posts" :key="post.id" class="media-box">
          <a :href="post.permalink" target="_blank">
            <template v-if="post.media_type === 'VIDEO'">
              <div class="thumbnail-container">
                <video controls :src="post.media_url" class="video" ref="videoPlayer" @loadedmetadata="generateThumbnail"></video>
                <img :src="thumbnail" :alt="post.username" class="video-image" />
              </div>
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
        thumbnail: "", // サムネイル画像のURLを保持する変数を追加
      };
    },
    props: {
      responseBody: {
        type: Object,
      },
    },
    methods: {
      generateThumbnail() {
        const videoPlayer = this.$refs.videoPlayer;
        if (videoPlayer && videoPlayer.readyState >= 4) {
          videoPlayer.currentTime = 0.1;
          videoPlayer.addEventListener('seeked', () => {
            const canvas = document.createElement('canvas');
            canvas.width = videoPlayer.videoWidth;
            canvas.height = videoPlayer.videoHeight;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(videoPlayer, 0, 0, canvas.width, canvas.height);
            this.thumbnail = canvas.toDataURL();
          }, { once: true }); // seeked イベントのリスナーは一度だけ実行するようにする
        }
      },
    },
    mounted() {
      const responseData = this.responseBody;
      if (responseData && responseData.business_discovery && responseData.business_discovery.media) {
        this.posts = responseData.business_discovery.media.data.slice(0, 9);
      }
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

.link {
    z-index: 10;
}

.thumbnail-container {
    position: relative;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.image {
    height: 25vw;
    max-height: 325px;
    width: 100%;
    max-width: 325px;
    object-fit: cover;
}

.video-image {
    height: 25vw;
    max-height: 325px;
    width: 100%;
    max-width: 325px;
    object-fit: cover;
    position: absolute;
    z-index: -10;
}

.video {
    object-fit: cover;
    width: 100%;
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