/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./emojioneConvert');
require('./directives/TooltipDirective');
require('./filters/MomentFilter');

window.Vue = require('vue');

Vue.component('post-view-component', require('./components/PostViewComponent'));
Vue.component('posts-table-component', require('./components/PostsTableComponent'));
Vue.component('profiles-table-component', require('./components/ProfilesTableComponent'));
Vue.component('projects-table-component', require('./components/ProjectsTableComponent'));
Vue.component('spaces-table-component', require('./components/SpacesTableComponent'));

Vue.component('delete-button', require('./components/License/LicenseDeleteComponent'));

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