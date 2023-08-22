<template>
    <div class="form">
        <h2 class="form__head">Вхід</h2>

        <input v-model="email" type="email" placeholder="Введіть email">

        <input v-model="password" type="password" placeholder="Введіть пароль">

        <button @click.prevent="login" type="submit" class="form__btn btn">Ввійти</button>

        <router-link :to="{name: 'user.registration'}">
            <div class="form__link">Зареєструватися</div>
        </router-link>
        <div style="font-size: 16px; color: red" v-if="error">{{ error }}</div>
    </div>
</template>

<script>
export default {
    name: 'Login',

    data() {
        return {
            email: '',
            password: '',
            error: '',
        }
    },

    methods: {
        login() {
            axios.post('/api/auth/login', {
                email: this.email,
                password: this.password,
            })
                .then(res => {
                    localStorage.setItem('access_token', res.data.access_token)
                    this.$router.push({name: 'user.cabinet.profile'})
                })
                .catch(error => {
                    this.error = error.response.data.error
                    this.email = ''
                    this.password = ''
                })
        }
    }
}
</script>

<style scoped>
.form {
    max-width: 500px;
    margin: 0 auto;
    padding: 35px 0;
}

.form__head {
    text-align: center;
}

.form__btn {
    opacity: 0.9;
    padding: 8px 25px;
    width: 100%;
    max-width: 100%;
    text-align: center;
    justify-content: center;
}

.form__link {
    font-weight: bold;
    text-align: center;
}

input {
    width: 100%;
    padding: 10px 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    border-radius: 5px;
    background: #f1f1f1;
}

input:focus {
    background-color: #ddd;
    outline: none;
}

button:hover {
    opacity:1;
}
</style>
