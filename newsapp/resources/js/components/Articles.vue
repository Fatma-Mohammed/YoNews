<template>
    <div>
        <div class="row" >
            <div class="col-sm-6 col-md-4" v-for='article in articles' :key="article.id">
                <div class="thumbnail">
                    <img :src= article.urlToImage alt="..." class="thump-img"/>
                    <div class="caption">
                        <h3>{{ article.title }}</h3>
                        <p>{{ article.description }}</p>
                        <p>
                            <a href="#" class="btn btn-primary" role="button"
                                >Button</a
                            >
                            <a href="#" class="btn btn-default" role="button"
                                >Button</a
                            >
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
   props: ['articles']
};
</script>
