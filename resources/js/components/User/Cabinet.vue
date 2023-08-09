<template>
    <h2 style="text-align: center; margin-top: 20px; color: #00cd5a">User cabinet</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users">
            <th scope="row">{{ user.id }}</th>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
import API from "@/api";
export default {
    name: 'User',

    data() {
        return {
            users: [],
        }
    },

    mounted() {
        this.getUsers()
    },

    methods: {
        getUsers() {
            API.get('/api/cabinet')
                .then(res => {
                    this.users = res.data.data;
                })
        },
    }
}
</script>

<style scoped>
.table {
    padding: 60px 0;
    margin: 0 auto;
}
</style>
