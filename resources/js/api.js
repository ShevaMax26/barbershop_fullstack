import router from "@/router";
import axios from "axios";

const api = axios.create();

//start request
api.interceptors.request.use(config => {
    if (localStorage.getItem('access_token')) {
        config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`
    }

    return config
}, error => {
    console.log(111111111)
})
//end request

//start response
api.interceptors.response.use(response => {
    return response;
}, async error => {
    if (error.response.data.message === 'Token has expired') {
        const accessToken = localStorage.getItem('access_token');

        if (accessToken) {
            try {
                const res = await axios.post('/api/auth/refresh', {}, {
                    headers: {
                        'authorization': `Bearer ${accessToken}`
                    }
                });
                localStorage.setItem('access_token', res.data.access_token);
                error.config.headers.authorization = `Bearer ${res.data.access_token}`;
                return api.request(error.config);
            } catch (refreshError) {
                logout();
                throw refreshError;
            }
        } else {
            router.push({name: 'user.login'});
            throw error;
        }
    }

    return Promise.reject(error);
});



function logout() {
    api.post('/api/auth/logout')
        .then(res => {
            localStorage.removeItem('access_token')
            router.push({name: 'user.login'});
        })
}

export default api
