<template>
    <div v-if="done">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Created</th>
                    <th scope="col" class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users.users">
                    <td><img :src="'/' + user.profile.image" width="40px" height="40px" class="rounded-circle"> {{ user.profile.name }}</td>
                    <td>{{ user.created }}</td>
                    <td>
                        <a :href="'/profiles/' + user.profile.id">View</a>
                        <a :href="'/admin/users/edit/' + user.id" class="btn btn-outline-danger btn-sm">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios'
    import emojione from 'emojione'
    export default {
        mounted () {
            console.log('Component PostsTableComponent mounted.')
        },
        data () {
            return {
                done: false,
                users: {
                    users: []
                },
                errors: []
            }
        },
        created () {
            this.$parent.$emit('pageLoader', true)
            axios.get('/api/users.json')
            .then(response => {
                this.users = response.data
                this.$parent.$emit('pageLoader', false)
                this.done = true
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
</script>
