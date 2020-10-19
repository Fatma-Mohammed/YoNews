<template>
    <div >
        <Hero></Hero>
        <Articles :articles="this.articles" :user="this.user"></Articles>
    </div>
</template>

<script>

export default {
    props: ["articles","user",]
};

</script>