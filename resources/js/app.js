/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue'
import VueRouter from 'vue-router'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueRouter)
Vue.use(VueSweetalert2);

import App from './components/app'
import Home from './components/home'
import Deposito from './components/deposito'
import Saque from './components/saque'


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/deposito',
            name: 'deposito',
            component: Deposito,
        },
       
        {
            path: '/saque',
            name: 'saque',
            component: Saque,
        },
       
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
