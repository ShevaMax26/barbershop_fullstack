<template>
    <header class="header">
        <div class="header-bottom" data-header>
            <div class="container">

                <router-link :to="{name: 'main'}" class="logo">
                    Barber
                    <span class="span">Hair Salon</span>
                </router-link>
                <nav class="navbar container" data-navbar>
                    <ul class="navbar-list">

                        <li class="navbar-item">
                            <router-link :to="{name: 'main'}" class="navbar-link" data-nav-link>Головна</router-link>
                        </li>

                        <li class="navbar-item">
                            <a href="#pricing" class="navbar-link" data-nav-link>Ціни</a>
                        </li>

                        <li class="navbar-item">
                            <a href="#gallery" class="navbar-link" data-nav-link>Gallery</a>
                        </li>

                        <li class="navbar-item">
                            <a href="#" class="navbar-link" data-nav-link>Contact</a>
                        </li>

                        <li class="navbar-item">
                            <router-link :to="accessToken ? {name: 'user.cabinet'} : {name: 'user.login'}" class="navbar-link"><i class="fas fa-user"></i></router-link>
                        </li>
                    </ul>
                </nav>

                <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
                    <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
                </button>

                <router-link :to="{ name: 'services'}" class="btn has-before">
                    <span class="span">Записатися</span>
                    <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </router-link>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    data() {
        return {
            accessToken: null,
        }
    },

    mounted() {
        this.getAccessToken()
    },

    updated() {
        this.getAccessToken()
    },

    methods: {
        getAccessToken() {
            this.accessToken = localStorage.getItem('access_token')
        },
    }
}
</script>

<style scoped>

</style>
