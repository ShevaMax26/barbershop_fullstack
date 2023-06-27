import {createRouter, createWebHistory} from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'main',
            component: () => import('../views/main/Index.vue')
        },
        {
            path: '/services',
            name: 'services',
            component: () => import('../components/AppointmentComponent.vue')
        },
    ]
})

export default router
