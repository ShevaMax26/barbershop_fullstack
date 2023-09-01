<template>
    <div v-if="user" class="profile-form">

        <div class="profile-form__group">
            <input type="text" id="name" class="form-input profile-form__input" placeholder=" " :value="user.name">
            <label for="name" class="profile-form__label">Ім'я</label>
        </div>
        <div class="profile-form__group">
            <input type="tel" id="phone" class="form-input profile-form__input" placeholder=" " :value="user.phone">
            <label for="phone" class="profile-form__label">Телефон</label>
        </div>
        <div class="profile-form__group">
            <input type="email" id="email" class="form-input profile-form__input" placeholder=" " :value="user.email">
            <label for="email" class="profile-form__label">Електронна пошта</label>
        </div>


        <div class="profile-form__actions">
            <router-link :to="{ name: 'user.cabinet.profile' }" class="cabinet-btn profile-form__submit">
                Зберегти
            </router-link>
            <router-link :to="{ name: 'user.cabinet.profile' }" class="cabinet-btn profile-form__cancel">
                Скасувати
            </router-link>
        </div>

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

.form-input {
    display: block;
    border: 2px solid $gray-light;
    width: 100%;
    height: 45px;
    padding: 8px 10px;
    background-color: transparent;
    color: $black;

    &:focus {
        border-color: rgba($yellow, 0.2);
        outline: none;
    }
}

.profile-form {

    &__group {
        position: relative;
        height: 45px;
        margin-bottom: 20px;
    }

    &__input {
        font-size: 16px;
        border-radius: 5px;
        position: absolute;
        left: 0;
        top: 0;
        outline: none;
        transition: all 0.16s ease-in;
    }

    &__label {
        position: absolute;
        left: 1rem;
        top: 13px;
        padding: 0 0.5rem;
        cursor: text;
        transition: top 0.2s ease-in,
        left 0.2s ease-in,
        font-size 0.2s ease-in;
        background-color: $white;
        border-radius: 10px;
        color: $gray;
    }

    &__actions {
        display: flex;
        gap: 20px;
    }

    &__cancel {
        background-color: $gray-light;
        color: $black;
        width: fit-content;

        &:hover {
            background: $white-ingredient;
        }
    }

    &__submit {
        background-color: $yellow;
        color: $white;
        width: fit-content;

        &:hover {
            background: $yellow-hover;
        }
    }
}

.profile-form__input:focus ~ .profile-form__label,
.profile-form__input:not(:placeholder-shown).profile-form__input:not(:focus) ~ .profile-form__label {
    top: -1rem;
    font-size: 12px;
}
</style>
