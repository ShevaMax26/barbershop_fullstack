<template>
    <h2 style="text-align: center; margin-top: 20px; color: #00cd5a">User cabinet</h2>
    <div>
        <div class="tab-bar">
            <router-link :to="{ name: 'user.cabinet.profile' }">Personal Information</router-link>
            <router-link :to="{ name: 'user.cabinet.order' }">Orders</router-link>
            <router-link :to="{ name: 'user.cabinet.message' }">Messages</router-link>
            <!-- Додайте інші вкладки за необхідністю -->
        </div>
        <router-view></router-view>
    </div>
</template>

<script>

</script>

<style scoped>
.table {
    padding: 60px 0;
    margin: 0 auto;
}

.tab-bar {
    display: flex;
    justify-content: space-around;
    padding: 10px;
    background-color: #f0f0f0;
    border-bottom: 1px solid #ccc;
}

.tab-bar a {
    text-decoration: none;
    color: #333;
    padding: 5px 10px;
}

.tab-bar a:hover {
    background-color: #ddd;
}
</style>
