<template>
    <section class="cabinet container">
        <div class="cabinet__menu cabinet-menu">
            <router-link :to="{ name: 'user.cabinet.profile' }" class="cabinet-menu__item" exact
                         :class="{ 'active': $route.name === 'user.cabinet.profile' }">Personal Information
            </router-link>
            <router-link :to="{ name: 'user.cabinet.order' }" class="cabinet-menu__item" exact
                         :class="{ 'active': $route.name === 'user.cabinet.order' }">Orders
            </router-link>
            <router-link :to="{ name: 'user.cabinet.message' }" class="cabinet-menu__item" exact
                         :class="{ 'active': $route.name === 'user.cabinet.message' }">Messages
            </router-link>
            <!-- Додайте інші вкладки за необхідністю -->
        </div>
        <router-view class="cabinet__content"></router-view>
    </section>
</template>

<script>

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
    }

    &__item.active {
        background: $yellow;
        color: $white;
    }
}
</style>
