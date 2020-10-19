<template>
    <div class="container">
        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div
                            class="row"
                            v-for="article in articles"
                            :key="article.id"
                        >
                            <div class="col-sm-4 grid-margin">
                                <div class="position-relative">
                                    <div class="rotate-img">
                                        <img
                                            :src="article.urlToImage"
                                            alt="thumb"
                                            class="img-fluid"
                                        />
                                    </div>
                                    <div class="badge-positioned">
                                        <span
                                            class="badge badge-danger font-weight-bold"
                                            >{{ article.author }}</span
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8  grid-margin">
                                <router-link to="/">
                                    <h2 class="mb-2 font-weight-600">
                                        {{ article.title }}
                                    </h2>
                                </router-link>
                                <div class="fs-13 mb-2">
                                    <span class="mr-2">Photo </span
                                    >{{ article.publishedAt }}
                                </div>
                                <p class="mb-0">
                                    {{ article.description }}
                                </p>

                                <button
                                    class="btn btn-primary mt-4"
                                    v-if="user != undefined"
                                    @click="favorite(article)"
                                >
                                    Favorite
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
            "articles",
            "user",
            ],
    methods: {
            favorite(article) {
            axios.post('api/v1/fav-articles',{article: article, user: this.user}).then(res => {

                
            });
        },
    }
};
</script>
