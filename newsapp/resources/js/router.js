import Vue from 'vue';
import router from 'vue-router';
Vue.use(router);
import Articles from './components/Articles';
import Home from './Pages/Home.vue';
import Login from './Pages/Login.vue';
import Register from './Pages/Register.vue';
import Favorites from './Pages/Favorites.vue';


const routes = [
    { 
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path: '/login',
        component: Login,
        nem: 'login'
    },
    {
        path: '/register',
        component: Register,
        name: 'register'
    },
    {
        path: '/favorites',
        component: Favorites,
        name: 'favorites'
    }
]

export default new router({
    mode: 'history',
    routes
})