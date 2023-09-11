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
        {
            path: '/cabinet',
            name: 'user.cabinet',
            component: () => import('../components/User/Cabinet/MainTabs.vue'),
            children: [
                {
                    path: 'profile',
                    name: 'user.cabinet.profile',
                    component: () => import('../components/User/Cabinet/PersonalInformation.vue'),
                    children: [
                        {
                            path: 'edit-profile',
                            name: 'user.cabinet.profile.edit',
                            component: () => import('../components/User/Cabinet/EditPersonalInformation.vue')
                        },
                    ]
                },
                {
                    path: 'messages',
                    name: 'user.cabinet.message',
                    component: () => import('../components/User/Cabinet/Messages.vue'),
                },
                {
                    path: 'orders',
                    name: 'user.cabinet.order',
                    component: () => import('../components/User/Cabinet/Orders.vue'),
                },
                {
                    path: 'edit-password',
                    name: 'user.cabinet.editPassword',
                    component: () => import('../components/User/Cabinet/EditPassword.vue')
                }
            ],
        },
        {
            path: '/users/login',
            name: 'user.login',
            component: () => import('../components/User/Login.vue')
        },
        {
            path: '/users/registration',
            name: 'user.registration',
            component: () => import('../components/User/Registration.vue')
        },
        {
            path: '/:catchAll(.*)',
            name: '404',
            component: () => import('../components/Error/404.vue')
        },
    ]
})

router.beforeEach((to, from, next) => {
    const accessToken = localStorage.getItem('access_token');

    const requiresAuthRoutes = [
        'user.cabinet',
        'user.cabinet.profile',
        'user.cabinet.message',
        'user.cabinet.order'
    ];

    if (!accessToken) {
        if (!requiresAuthRoutes.includes(to.name)) {
            return next();
        } else {
            return next({
                name: 'user.login'
            });
        }
    }

    if (to.name === 'user.cabinet') {
        return next({
            name: 'user.cabinet.profile'
        })
    }

    if ((to.name === 'user.login' || to.name === 'user.registration') && accessToken) {
        return next({
            name: 'user.cabinet.profile'
        });
    }
    next()
})

export default router
