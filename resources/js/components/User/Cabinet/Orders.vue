<template>
    <div>
        <div class="cabinet-content">
            <div class="cabinet-content__head">
                <h3 class="cabinet-content__title">
                    Мої замовлення
                </h3>
            </div>

            <div class="cabinet-content__content">
                <div v-if="pendingOrders.length && !loading" class="cabinet-content__category">
                    <h4 class="cabinet-content__category-title">Активні</h4>
                    <div v-for="(order, index) in pendingOrders" :key="index" class="orders-history">
                        <div class="orders-history__company">
                            <p class="orders-history__datetime">
                                {{ order.date }}, {{ order.start }} - {{ order.end }}
                            </p>
                            <p class="orders-history__company-address">
                                вулиця Сухомлинського, 1
                            </p>
                            <div class="orders-history__employee employee">
                                <img src="/5.png" alt="avatar" class="employee__avatar">
                                <div class="employee__info">
                                    <p class="employee__name">{{ order.employee.name + ' ' +  order.employee.surname}}</p>
                                    <p class="employee__rank">{{ order.employee.rank_title }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="orders-history__services services">
                            <p class="services__title" v-for="orderService in order.services">{{ orderService.title }},</p>
                        </div>

                        <div class="orders-history__total total">
                            <div class="total__info">
                                <p class="total__price">{{ order.total_amount }} ₴</p>
                                <p class="total__duration">{{ order.total_duration }}</p>
                            </div>
                            <button class="cabinet-btn total__btn">Скасувати</button>
                        </div>

                        <div class="line" v-if="index !== pendingOrders.length - 1"></div>
                    </div>
                </div>

                <div v-if="paidOrders.length && !loading" class="cabinet-content__category">
                    <h4 class="cabinet-content__category-title">Минулі</h4>
                    <div v-for="(order, index) in paidOrders" :key="index" class="orders-history">
                        <div class="orders-history__company">
                            <p class="orders-history__datetime">
                                {{ order.date }}, {{ order.start }} - {{ order.end }}
                            </p>
                            <p class="orders-history__company-address">
                                вулиця Сухомлинського, 1
                            </p>
                            <div class="orders-history__employee employee">
                                <img src="/5.png" alt="avatar" class="employee__avatar">
                                <div class="employee__info">
                                    <p class="employee__name">{{ order.employee.name + ' ' +  order.employee.surname}}</p>
                                    <p class="employee__rank">{{ order.employee.rank_title }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="orders-history__services services">
                            <p class="services__title" v-for="orderService in order.services">{{ orderService.title }},</p>
                        </div>

                        <div class="orders-history__total total">
                            <div class="total__info">
                                <p class="total__price">{{ order.total_amount }} ₴</p>
                                <p class="total__duration">{{ order.total_duration }}</p>
                            </div>
                            <button class="cabinet-btn total__btn">Залишити відгук</button>
                        </div>

                        <div class="line" v-if="index !== paidOrders.length - 1"></div>
                    </div>
                </div>

                <div v-if="canceledOrders.length && !loading" class="cabinet-content__category">
                    <h4 class="cabinet-content__category-title">Скасовані</h4>
                    <div v-for="(order, index) in canceledOrders" :key="index" class="orders-history">
                        <div class="orders-history__company">
                            <p class="orders-history__datetime">
                                {{ order.date }}, {{ order.start }} - {{ order.end }}
                            </p>
                            <p class="orders-history__company-address">
                                вулиця Сухомлинського, 1
                            </p>
                            <div class="orders-history__employee employee">
                                <img src="/5.png" alt="avatar" class="employee__avatar">
                                <div class="employee__info">
                                    <p class="employee__name">{{ order.employee.name + ' ' +  order.employee.surname}}</p>
                                    <p class="employee__rank">{{ order.employee.rank_title }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="orders-history__services services">
                            <p class="services__title" v-for="orderService in order.services">{{ orderService.title }},</p>
                        </div>

                        <div class="orders-history__total total">
                            <div class="total__info">
                                <p class="total__price">{{ order.total_amount }} ₴</p>
                                <p class="total__duration">{{ order.total_duration }}</p>
                            </div>
                        </div>

                        <div class="line" v-if="index !== canceledOrders.length - 1"></div>
                    </div>
                </div>

                <div v-if="!loading && !paidOrders.length && !pendingOrders.length && !canceledOrders.length">
                    <div class="orders-history__not-found not-found">
                        <i class="not-found__icon far fa-frown"></i>
                        <div class="not-found__title">
                            Ви не здійснили жодного запису
                        </div>
                        <div class="not-found__text">
                            Перейдіть у розділ записів
                        </div>
                        <router-link :to="{ name: 'services' }" class="not-found__btn cabinet-content__edit cabinet-btn">Записатися</router-link>
                    </div>
                </div>
                <div v-if="loading">
                    <PreloaderComponent></PreloaderComponent>
                </div>
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
            pendingOrders: [],
            paidOrders: [],
            canceledOrders: [],
            loading: true,
        }
    },

    components: {
        PreloaderComponent,
    },

    mounted() {
        this.getOrders()
    },

    methods: {
        getOrders() {
            API.get('/api/cabinet/orders')
                .then(res => {
                    this.pendingOrders = res.data.pendingOrders;
                    this.paidOrders = res.data.paidOrders;
                    this.canceledOrders = res.data.canceledOrders;
                    this.loading = false;
                })
        },
    }
}
</script>

<style lang="scss" scoped>
@import "/resources/scss/global-cabinet.scss";

.cabinet-content {

    &__category-title {
        text-align: center;
        color: $yellow;
        text-transform: uppercase;
        margin: 10px 0 20px 0;
        font-size: 14px;

        &:first-child {
            margin-top: 0;
        }
    }

    &__content {
        overflow: auto;
        max-height: calc((99px + 40px) * 4 - 40px + 60px + 5px);
    }

    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-track {
        background-color: hsla(0,0%,75%,.5);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        outline: 1px solid $gray;
        background: $gray;
        border-radius: 10px;

        &:hover {
            border: 1px solid $gray-dark;
            background: $gray-dark;
            outline-color: $gray-dark;
        }
    }
}
.orders-history {
    position: relative;
    font-size: 15px;
    display: flex;
    gap: 25px;
    justify-content: space-between;
    padding: 20px 0;

    &__datetime {
        font-weight: 600;
        font-size: 17px;
    }

    &__company {
        min-width: fit-content;
    }

    &__company-address {
        color: $gray;
    }

    &__employee {
        display: flex;
        margin-top: 20px;
    }

    &__services {
        display: flex;
        flex-wrap: wrap;
        height: fit-content;
        row-gap: 7px;
    }

    &__total {
        min-width: fit-content;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: end;
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

    &__title {
        margin-right: 7px;
        font-weight: 500;
        text-transform: uppercase;
    }
}

.total {

    &__price {
        font-weight: 500;
        font-size: 20px;
        display: inline;
        margin-right: 10px;
    }

    &__duration {
        display: inline;
        color: $gray;
    }

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
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 1px;
    background: $gray-light;
}
</style>
