<template>
    <h1 class="header">Це сторінки особистої інформації</h1>
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
    data() {
        return {
            user: null,
            users: [],
        }
    },

    mounted() {
        // this.getUserInformation()
        this.getUsers()
    },

    methods: {
        // getUserInformation() {
        //     API.get('/api/users/list')
        //         .then(res => {
        //             console.log(res);
        //         })
        // },
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
.header {
    color: red;
}
</style>
