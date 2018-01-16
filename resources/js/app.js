/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./emojioneConvert');

window.Vue = require('vue');

Vue.component('user-view-component', require('./components/UserViewComponent'));
Vue.component('post-view-component', require('./components/PostViewComponent'));
Vue.component('posts-table-component', require('./components/PostsTableComponent'));
Vue.component('users-table-component', require('./components/UsersTableComponent'));

const app = new Vue({
    el: '#vue-app',
    data () {
        return {
            loading: false
        }
    },
    created () {
        this.$on('pageLoader', function(value) {
            this.loading = value
        })
    }
})