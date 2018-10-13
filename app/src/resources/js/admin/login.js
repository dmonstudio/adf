/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

window.Vue = require('vue');

import Element from 'element-ui';
Vue.use (Element);

const login = new Vue({
    el: '#login',
    data: {
        login: {
            username: '',
            password: ''
        }
    },
    methods: {
        handleLogin() {
            this.$refs.form.$el.submit()
        }
    }
});
