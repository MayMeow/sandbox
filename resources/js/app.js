import Vue from 'vue'
import ExampleComponent from './components/ExampleComponent'
import PostsTableComponent from './components/PostsTableComponent'
import PostViewComponent from './components/PostViewComponent'
import UserViewComponent from './components/UserViewComponent'

//Vue.component('example-component', require('./app.vue'));

const app = new Vue({
    data: {
        loading: false
    },
    el: '#vue-app',
    components: {
        ExampleComponent,
        PostsTableComponent,
        PostViewComponent,
        UserViewComponent
    }
})