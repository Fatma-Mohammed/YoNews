<template>
    <div class="content-wrapper">
        <Hero></Hero>
        <Articles :articles="this.articles" :user="this.user"></Articles>
    </div>
</template>

<script>

export default {
    props: ["articles","user",]
};

</script>