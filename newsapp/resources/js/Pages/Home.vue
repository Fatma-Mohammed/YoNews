<template>
    <div class="content-wrapper">
        <Hero></Hero>
        <Articles :articles="this.articles"></Articles>
    </div>
</template>

<script>

export default {
    props: ["articles"]
};

</script>