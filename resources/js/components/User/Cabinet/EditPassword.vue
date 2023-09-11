<template>
    <div>
        <div class="cabinet-content">
            <div class="cabinet-content__head">
                <h3 class="cabinet-content__title">Змінити пароль</h3>
            </div>

            <div class="cabinet-content__content">
                <div class="profile-info profile-form">
                    <div class="profile-form__group">
                        <input type="password" id="old_password" class="form-input profile-form__input" placeholder=" " v-model="oldPassword">
                        <label for="old_password" class="profile-form__label">Введіть старий пароль</label>
                    </div>
                    <div class="profile-form__group">
                        <input type="password" id="new_password" class="form-input profile-form__input" placeholder=" " v-model="newPassword">
                        <label for="new_password" class="profile-form__label">Введіть новий пароль</label>
                    </div>
                    <div class="profile-form__group">
                        <input type="password" id="new_password_confirmation" class="form-input profile-form__input" placeholder=" " v-model="newPasswordConfirmation">
                        <label for="new_password_confirmation" class="profile-form__label">Повторіть новий пароль</label>
                    </div>
                    <div style="font-size: 16px; color: red; margin-bottom: 20px;" v-if="error">{{ error }}</div>
                    <div class="profile-form__actions">
                        <a @click.prevent="updateUserPersonalInfo" class="cabinet-btn profile-form__submit">
                            Зберегти
                        </a>
                        <router-link :to="{ name: 'user.cabinet.profile' }" class="cabinet-btn profile-form__cancel">
                            Скасувати
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import API from "@/api";

export default {
    data() {
        return {
            oldPassword: '',
            newPassword: '',
            newPasswordConfirmation: '',
            error: '',
        }
    },

    methods: {
        updateUserPersonalInfo() {
            API.post('/api/cabinet/update-password', {
                'old_password': this.oldPassword,
                'new_password': this.newPassword,
                'new_password_confirmation': this.newPasswordConfirmation,
            })
                .then(res => {
                    if (res) {
                        localStorage.removeItem('access_token');
                        localStorage.setItem('access_token', res.data.access_token);
                        this.$router.push({ name: 'user.cabinet.profile' });
                    }
                })
                .catch(error => {
                    console.log(error.response.data);
                    this.error = error.response.data.error
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
