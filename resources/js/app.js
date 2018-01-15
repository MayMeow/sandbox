/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('user-view-component', require('./components/UserViewComponent'));
Vue.component('post-view-component', require('./components/PostViewComponent'));

const app = new Vue({
    el: '#vue-app',
    data () {
        return {
            loading: true
        }
    }
})