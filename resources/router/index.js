import {createRouter,createWebHistory} from 'vue-router';
import admin from './admin';
import login from './login';
import client from './client'

const routes = [...admin,...login,...client];

const router = createRouter({
    history : createWebHistory(),
    routes
})

export default router
