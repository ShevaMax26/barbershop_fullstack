<template>
    <div>
        <HeaderComponent></HeaderComponent>

        <router-view></router-view>

        <FooterComponent></FooterComponent>
        <a href="#app" class="back-top-btn" aria-label="back to top" data-back-top-btn>
<!--            <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>-->
            UP
        </a>
    </div>
</template>

<script>
import HeaderComponent from "./components/HeaderComponent.vue";
import FooterComponent from "./components/FooterComponent.vue";

export default {
    name: 'App',
    components: {FooterComponent, HeaderComponent},

    data() {
        return {

        }
    },

}
</script>

<style scoped>

</style>
