<template>
    <div>
        <h1 style="font-weight: 300">Posts</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created</th>
                    <th scope="col">Modified</th>
                    <th scope="col" class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts.posts">
                    <td>{{ post.id }}</td>
                    <td>{{ post.title }}</td>
                    <td>{{ post.created }}</td>
                    <td>{{ post.modified }}</td>
                    <td>
                        <a :href="'/posts/view/' + post.id">View</a>
                        <a :href="'/admin/posts/edit/' + post.id">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        mounted () {
            console.log('Component PostsTableComponent mounted.')
        },
        data () {
            return {
                posts: {
                    posts: []
                },
                errors: []
            }
        },
        created () {
            this.$parent.$emit('pageLoader', true)
            axios.get('/api/posts.json')
            .then(response => {
                this.posts = response.data
                this.$parent.$emit('pageLoader', false)
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
</script>
