import Vue from 'vue';
import router from 'vue-router';
Vue.use(router);
import Articles from './components/Articles';
const routes = [
    { 
        path: '/EG-sports',
        component: Articles
    }
]

export default new router({
    mode: 'history',
    routes
})