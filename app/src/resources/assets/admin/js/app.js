/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

window.Vue = require('vue');

import Element from 'element-ui';
Vue.use (Element);

import Toolbar from './components/Toolbar.vue'
Vue.component('toolbar', Toolbar)

import router from './router'

import App from './layout/App'

const app = new Vue({
    el: '#app',
    template: '<App/>',
    components: {App},
    router
});
