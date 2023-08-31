<template>
    <section class="cabinet container">
        <div class="cabinet__menu cabinet-menu">
            <router-link :to="{ name: 'user.cabinet.profile' }" class="cabinet-menu__item" exact
                         :class="{ 'active': $route.name.startsWith('user.cabinet.profile') }">Особисті дані
            </router-link>
            <router-link :to="{ name: 'user.cabinet.order' }" class="cabinet-menu__item" exact
                         :class="{ 'active': $route.name === 'user.cabinet.order' }">Замовлення
            </router-link>
            <router-link :to="{ name: 'user.cabinet.message' }" class="cabinet-menu__item" exact
                         :class="{ 'active': $route.name === 'user.cabinet.message' }">Повідомлення
            </router-link>
            <router-link :to="{ name: 'user.cabinet' }" class="cabinet-menu__item" exact
                         :class="{ 'active': $route.name === 'user.cabinet' }">Змінити пароль
            </router-link>
            <a v-if="accessToken" @click.prevent="logout" href="#" class="cabinet-menu__item">
                <i class="fas fa-sign-out-alt cabinet-menu__item-icon"></i>
                Вихід
            </a>
            <!-- Додайте інші вкладки за необхідністю -->
        </div>
        <router-view class="cabinet__content"></router-view>
    </section>
</template>

<script>
import API from "@/api";
export default {
    name: 'HeaderComponent',

    data() {
        return {
            accessToken: null,
        }
    },

    mounted() {
        this.getAccessToken()
    },

    methods: {
        getAccessToken() {
            this.accessToken = localStorage.getItem('access_token')
        },

        logout() {
            API.post('/api/auth/logout')
                .then(res => {
                    localStorage.removeItem('access_token')
                    this.$router.push({name: 'user.login'})
                })
        },
    }
}
</script>

<style lang="scss" scoped>
@import "/resources/scss/variables";
.cabinet {
    font-family: "Montserrat", sans-serif;
    padding: max(30px, 4%) 15px;
    line-height: initial;
    display: flex;
    align-items: flex-start;
    color: $black;


    &__menu {
        border: 1px solid #e6e6e6;
        border-radius: 5px;
        box-shadow: 0 0 5px 0.5px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        width: 270px;
        margin-right: 4%;
    }

    &__content {
        flex-grow: 1;
        width: 50%;
    }
}

.cabinet-menu {

    &__item {
        width: 100%;
        display: inline-block;
        padding: 15px 20px;
        position: relative;
        text-decoration: none;
        border-radius: inherit;

        &:after {
            position: absolute;
            content: "";
            bottom: -1px;
            left: 15px;
            right: 15px;
            height: 1px;
            background-color: #e6e6e6;
        }

        &:hover {
            color: $yellow;
        }
    }

    &__item-icon {
        transform: rotateY(180deg);
        margin-right: 5px;
    }

    &__item.active {
        background: $yellow;
        color: $white;
    }
}
</style>
