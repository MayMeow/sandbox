import Vue from 'vue'
import ExampleComponent from './components/ExampleComponent'
import PostsTableComponent from './components/PostsTableComponent'
import PostViewComponent from './components/PostViewComponent'

//Vue.component('example-component', require('./app.vue'));

const app = new Vue({
    el: '#vue-app',
    components: {
        ExampleComponent,
        PostsTableComponent,
        PostViewComponent
    }
})