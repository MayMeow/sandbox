<template>
    <div>
         <h1>{{ post.post.title }}</h1>
         {{ post.post.body }}
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: ['postID'],
        mounted () {
            console.log('Component PostsTableComponent mounted.')
        },
        data () {
            return {
                post: [],
                errors: []
            }
        },
        created () {
            axios.get('/api/posts/view/' + this.postID + '.json')
            .then(response => {
                this.post = response.data
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
</script>
