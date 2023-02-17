import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import store from "../store/index"
import router from '../router/index';
import VueCookies from 'vue-cookies'
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
const app = createApp(App)


app.use(VueCookies).use(store).use(router).component('EasyDataTable', Vue3EasyDataTable).mount('#app')
