<template>
    <div class="form">
        <h2 class="form__head">Реєстрація</h2>
        <input v-model="name" type="text" placeholder="Введіть ім'я">

        <input v-model="email" type="email" placeholder="Введіть email">

        <input v-model="password" type="password" placeholder="Введіть пароль">

        <input v-model="password_confirmation" type="password" placeholder="Підтврдіть пароль">

        <button @click.prevent="store" type="submit" class="form__btn btn">Зареєструватися</button>

        <router-link :to="{name: 'user.login'}">
            <div class="form__link">Я вже зареєстрований</div>
        </router-link>

        <div style="font-size: 16px; color: red" v-if="errors" v-for="(error, field) in errors" :key="field">{{ error[0] }}</div>
    </div>
</template>

<script>
export default {
    name: 'Login',

    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            errors: null,
        }
    },

    mounted() {
        console.log(localStorage.getItem('access_token'));
    },

    methods: {
        store() {
            axios.post('/api/users', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            })
                .then(res => {
                    localStorage.setItem('access_token', res.data.access_token)
                    this.$router.push({name: 'user.cabinet'})
                })
                .catch(error => {
                    if (error.response && error.response.data && error.response.data.errors) {
                        this.errors = error.response.data.errors;
                    } else {
                        this.errors = 'Сталася помилка при реєстрації користувача';
                    }
                    // this.error = error.response.data.error
                    console.log(this.errors);
                    console.log(error.response);
                    console.log(error.response.data.errors);
                })
        },
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
