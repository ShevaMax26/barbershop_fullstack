<template>
    <div v-if="user" class="profile-info">
        <table class="profile-info__table">
            <tbody><tr>
                <td>Телефон:</td>
                <td><span class="input-phone">РЕДАГУВАННЯ</span></td>
            </tr>
            <tr>
                <td>Електронна пошта:</td>
                <td>РЕДАГУВАННЯ</td>
            </tr>
            <tr>
                <td>День народження:</td>
                <td>РЕДАГУВАННЯ-</td>
            </tr>
            <tr>
                <td>Стать:</td>
                <td>РЕДАГУВАННЯ</td>
            </tr>
            </tbody>
        </table>
        <router-link :to="{ name: 'user.cabinet.profile' }" class="cabinet-btn cabinet-content__edit">
            Скасувати
        </router-link>
    </div>
    <div v-else-if="!user">
        <PreloaderComponent></PreloaderComponent>
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
