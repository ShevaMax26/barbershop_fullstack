<template>
    <div class="wrapper">
        <HeaderComponent></HeaderComponent>

        <div class="main">
            <router-view></router-view>
        </div>

        <FooterComponent></FooterComponent>
        <a href="#app" class="back-top-btn" aria-label="back to top" data-back-top-btn>
            <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
        </a>
    </div>
</template>

<script>
import HeaderComponent from "./components/HeaderComponent.vue";
import FooterComponent from "./components/FooterComponent.vue";

export default {
    name: 'App',

    components: {FooterComponent, HeaderComponent},
}
</script>

<style scoped>
    .wrapper {
        min-height: 100%;
        display: flex;
        flex-direction: column;
    }
    .main {
        flex: 1 1 auto;
        margin-top: 101.59px;
    }
</style>
