<template>
    <div>
         <h1>{{ post.post.title }}</h1>
         <div>
             {{ post.post.body }}
         </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import emojione from 'emojione'
    export default {
        props: ['postID'],
        mounted () {
            console.log('Component PostsTableComponent mounted.')
        },
        data () {
            return {
                post: {
                    post: []
                },
                errors: [],
                loading: ''
            }
        },
        created () {
            axios.get('/api/posts/view/' + this.postID + '.json')
            .then(response => {
                this.post = response.data
                this.post.post.body = emojione.shortnameToUnicode(this.post.post.body)
                this.loading = false
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
</script>
