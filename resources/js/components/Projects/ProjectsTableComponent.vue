<template>
<div>
    <preloader :done="done"></preloader>
    <div v-if="done">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Created</th>
                    <th scope="col">User</th>
                    <th scope="col" class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="project in projects.projects">
                    <td>{{ project.name }}</td>
                    <td>{{ project.created_at }}</td>
                    <td>{{ project.user.profile.name }}</td>
                    <td>
                        <a :href="'/projects/' + project.id">View</a>
                        <a :href="'/projects/edit/' + project.id" class="btn btn-outline-danger btn-sm">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
    import axios from 'axios'
    import emojione from 'emojione'
    import preloader from '../Shared/preloader.vue'

    export default {
        mounted () {
            console.log('Component ProfilesTable mounted.')
        },
        components: {
            preloader
        },
        data () {
            return {
                done: false,
                projects: {
                    projects: []
                },
                errors: []
            }
        },
        created () {
            this.$parent.$emit('pageLoader', true)
            axios.get('/api/projects')
            .then(response => {
                this.projects = response.data
                this.$parent.$emit('pageLoader', false)
                this.done = true
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
</script>
