import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import Vuelidate from 'vuelidate';

window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(Vuelidate);

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.axios = axios;
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};
