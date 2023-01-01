import {createRouter,createWebHistory} from 'vue-router';
import admin from './admin';
import login from './login';

const routes = [...admin,...login];

const router = createRouter({
    history : createWebHistory(),
    routes
})

export default router