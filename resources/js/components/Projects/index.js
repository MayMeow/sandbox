/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../../emojioneConvert');
require('../../directives/TooltipDirective');
require('../../filters/MomentFilter');

window.Vue = require('vue');

Vue.component('projects-table-component', require('./ProjectsTableComponent'));
Vue.component('spaces-table-component', require('../SpacesTableComponent'));

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