<template>
    <div>
    <header id="header">
        <Navbar @chCountry="this.changeCountry" :user="this.user"></Navbar>
    </header>
    <div class="content-wrapper">
    <!-- <Hero></Hero>
    
    <Articles :articles="this.articles"></Articles> -->
    <router-view :articles="this.articles" :user="this.user"></router-view>
    </div>
    </div>
</template>
<script>
 export default {
    props:[
        "user"
    ],
     data() {
        return {
            articles: [],
            category: [],
            country: ""
            // article_id: ""
        }
    },
    created() {
        this.fetchNews();
    },
    methods: {
        fetchNews() {
            axios.get(this.formUrl()).then(res => {

                this.articles = res.data;
                console.log(res.data);
            });
        },
        formUrl() {
            let url = "/api/v1/news";
            
            if(!url.includes('?')) {
                url += '?';
            }

           if(this.country != "") {
               url += "country=" + this.country;
           }

           console.log(url);
           return url;
        },
        changeCountry(country) {
            this.country = country;
            this.fetchNews();
        }
    }
    
 }
</script>
