import {createRouter,createWebHistory} from 'vue-router';
import admin from './admin';
import login from './login';
const routes = [...admin,...login,];

const router = createRouter({
    history : createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('token-admin')
      // If logged in, or going to the Login page.
      if (token || to.name === 'admin-login') {
        // Continue to page.
        next()
      } else {
        // Not logged in, redirect to login.
        next({name: 'admin-login'})
      }
    }
  );

export default router
