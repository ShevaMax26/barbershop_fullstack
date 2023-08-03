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
api.interceptors.response.use({}, error => {
    if (error.response.data.message === 'Token has expired') {
        return axios.post('api/auth/refresh', {}, {
            headers: {
                'authorization': `Bearer ${localStorage.getItem('access_token')}`
            }
        })
            .then(res => {
                localStorage.setItem('access_token', res.data.access_token)
                error.config.headers.authorization = `Bearer ${res.data.access_token}`
                return api.request(error.config)
            })
    }
    if(error.response.status === 401) {
        router.push({name: 'user.login'})
    }
});

export default api
