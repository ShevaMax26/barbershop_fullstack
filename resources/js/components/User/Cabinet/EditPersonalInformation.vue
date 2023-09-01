<template>
    <div v-if="!loading" class="profile-form">

        <div class="profile-form__group">
            <input type="text" id="name" class="form-input profile-form__input" placeholder=" " v-model="name">
            <label for="name" class="profile-form__label">Ім'я</label>
        </div>
        <div class="profile-form__group">
            <input type="text"
                   id="phone"
                   class="form-input profile-form__input"
                   placeholder=" "
                   @input="phoneMask"
                   v-model="phone">
            <label for="phone" class="profile-form__label">Телефон</label>
        </div>
        <div class="profile-form__group">
            <input type="email" id="email" class="form-input profile-form__input" placeholder=" " v-model="email">
            <label for="email" class="profile-form__label">Електронна пошта</label>
        </div>

        <div class="profile-form__actions">
            <a @click.prevent="updateUserPersonalInfo" class="cabinet-btn profile-form__submit">
                Зберегти
            </a>
            <router-link :to="{ name: 'user.cabinet.profile' }" class="cabinet-btn profile-form__cancel">
                Скасувати
            </router-link>
        </div>

    </div>
    <div v-else-if="loading">
        <PreloaderComponent></PreloaderComponent>
    </div>
</template>

<script>
import API from "@/api";
import PreloaderComponent from "../../PreloaderComponent.vue";
import IMask from 'imask';

export default {
    data() {
        return {
            name: '',
            phone: '',
            email: '',
            loading: true,
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
                    this.loading = false
                    this.name = res.data.data.name;
                    this.email =  res.data.data.email;
                    this.phone =  res.data.data.phone.toString();
                    this.phoneMask();
                })
        },
        updateUserPersonalInfo() {
            API.post('/api/users/update', {
                'name': this.name,
                'phone': this.phone.replace(/[^\d]/g, '').substring(3),
                'email': this.email,
            })
                .then(res => {
                    console.log(res.data.message);
                    this.$router.push({name: 'user.cabinet.profile'})
                })
                .catch(error => {
                    console.log(error);
                })
        },
        phoneMask() {
            const maskOptions = {
                mask: '+{38} (\\000)-000-00-00',
            };
            const mask = IMask.createMask(maskOptions);
            mask.resolve(this.phone);
            this.phone = mask.value;
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
