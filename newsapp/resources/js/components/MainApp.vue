<template>
    <div>
    <header id="header">
        <Navbar @chCountry="this.changeCountry"></Navbar>
    </header>
    <Hero></Hero>
    <Articles :articles="this.articles"></Articles>
    <!-- <router-view></router-view> -->
    </div>
</template>
<script>
 export default {
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
