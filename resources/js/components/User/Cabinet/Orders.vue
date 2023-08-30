<template>
    <div>
        <div class="cabinet-content">
            <div class="cabinet-content__head">
                <h3 class="cabinet-content__title">
                    Мої замовлення
                </h3>
            </div>

            <div class="cabinet-content__content">

                <div class="orders-history">
                    <p class="orders-history__datetime">
                        сб, 15 липня, 13:30 - 15:00
                    </p>
                    <p class="orders-history__company-address">
                        вулиця Сухомлинського, 1
                    </p>
                    <div class="orders-history__employee employee">
                        <img src="/5.png" alt="avatar" class="employee__avatar">
                        <div class="employee__info">
                            <p class="employee__name">Кирило Олійник</p>
                            <p class="employee__rank">Стажер</p>
                        </div>
                    </div>

                    <div class="line"></div>

                    <div class="orders-history__services services">
                        <p class="services__price">150$</p>
                        <p class="services__duration">60хв</p>
                        <p class="services__title">Стрижка</p>
                    </div>

                    <div class="orders-history__actions actions">
                        <button class="cabinet-btn actions__btn">Залишити відгук</button>
                    </div>
                </div>


<!--                .................-->
<!--                <div>-->
<!--                    <div class="orders-history__not-found not-found">-->
<!--                        <i class="not-found__icon far fa-frown"></i>-->
<!--                        <div class="not-found__title">-->
<!--                            Ви не здійснили жодного запису-->
<!--                        </div>-->
<!--                        <div class="not-found__text">-->
<!--                            Перейдіть у розділ записатися-->
<!--                        </div>-->
<!--                        <router-link :to="{ name: 'services' }" class="not-found__btn cabinet-content__edit cabinet-btn">Записатися</router-link>-->
<!--                    </div>-->
<!--                    <PreloaderComponent></PreloaderComponent>-->
<!--                </div>-->
            </div>
        </div>
    </div>

</template>

<script>
import API from "@/api";
import PreloaderComponent from "../../PreloaderComponent.vue";
export default {
    data() {
        return {
            orders: [],
        }
    },

    components: {
        PreloaderComponent,
    },

    mounted() {
        this.getUserPersonalInfo()
    },

    methods: {
        getUserPersonalInfo() {
            API.get('/api/cabinet/personal-info')
                .then(res => {
                    this.orders = res.data.data;
                })
        },
    }
}
</script>

<style lang="scss" scoped>
@import "/resources/scss/global-cabinet.scss";

.orders-history {
    font-size: 15px;

    &__datetime {
        font-weight: 600;
        font-size: 17px;
    }

    &__company-address {
        color: $gray;
    }

    &__employee {
        display: flex;
        margin-top: 20px;
    }

    &__services {

    }

    &__actions {
        margin-top: 16px;
    }
}

.employee {

    &__avatar {
        width: 40px;
        height: 40px;
        border-radius: 5px;
        margin-right: 10px;
    }
    &__name {
        font-weight: 500;
    }

    &__rank {
        color: $gray;
    }
}

.services {

    &__price {
        font-weight: 500;
        font-size: 17px;
        display: inline;
        margin-right: 10px;
    }

    &__duration {
        display: inline;
        color: $gray;
    }

    &__title {
        margin-top: 5px;
        font-weight: 500;
        text-transform: uppercase;
    }
}

.actions {

    &__btn {
        border: 2px solid $yellow;
        &:hover {
            background: $yellow;
            border: 2px solid $yellow;
        }
    }
}

.not-found {
    text-align: center;

    &__icon {
        font-size: 50px;
        font-weight: 100;
    }

    &__title {
        font-weight: 600;
        margin: 10px 0;
    }

    &__btn {
        display: inline-block;
        margin-top: 20px;
        background-color: $gray;
        color: $white;
    }
}

.line {
    width: 100%;
    height: 1px;
    margin: 20px 0 16px 0;
    background: $gray-light;
}
</style>
