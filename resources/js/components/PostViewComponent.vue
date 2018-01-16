<template>
    <div>
         <div class="row text-center">
             <div class="col">
                 <h1 style="font-weight: 300">{{ post.post.title }}</h1>
             </div>
         </div>
         <div v-html="post.post.markdown"></div>
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
                errors: []
            }
        },
        created () {
            this.$parent.$emit('pageLoader', true)
            axios.get('/api/posts/view/' + this.postID + '.json')
            .then(response => {
                this.post = response.data
                this.post.post.markdown = emojione.shortnameToUnicode(this.post.post.markdown)
                this.$parent.$emit('pageLoader', false)
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
</script>
