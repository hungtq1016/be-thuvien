import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import store from "../store/index"
import router from '../router/index';
import VueCookies from 'vue-cookies'

const app = createApp(App)


app.use(VueCookies).use(store).use(router).mount('#app')
