<template>
    <div>
        <div class="cabinet-content">
            <div class="cabinet-content__head">
                <h3 class="cabinet-content__title">
                    Особисті дані
                </h3>
                <a class="cabinet-btn cabinet-content__edit">Редагувати</a>
            </div>

            <div class="cabinet-content__content">
                <div v-if="user" class="profile-info">
                    <h4 class="profile-info__name">{{ user.name }}</h4>
                    <table class="profile-info__table">
                        <tbody><tr>
                            <td>Телефон:</td>
                            <td><span class="input-phone">-----</span></td>
                        </tr>
                        <tr>
                            <td>Електронна пошта:</td>
                            <td>{{ user.email }}</td>
                        </tr>
                        <tr>
                            <td>День народження:</td>
                            <td>------</td>
                        </tr>
                        <tr>
                            <td>Стать:</td>
                            <td>-----</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div v-else>
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
            user: null,
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
                    this.user = res.data.data;
                })
        },
    }
}
</script>

<style lang="scss" scoped>
@import "/resources/scss/global-cabinet.scss";

.cabinet-content {

    &__edit {
        background-color: rgba(119, 119, 119, 0.9);
        color: $white;
    }
}

.profile-info {

    &__name {
        font-size: 18px;
        margin-bottom: 30px;
        font-weight: 600;
    }

    &__table {
        width: 100%;
        border-collapse: collapse;
        font-weight: 500;
        word-break: break-word;

        tr:first-child td {
            padding-top: 0;
        }

        td {
            padding: 10px 10px;
            text-align: left;
        }

        td:first-child {
            color: $gray;
            padding-left: 0;
            width: 200px;
            opacity: .8;
        }

        td:last-child {
            padding-right: 0;
            font-weight: 600;
        }
    }
}
</style>
