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
                <tr v-for="profile in profiles.profiles">
                    <td>{{ profile.name }}</td>
                    <td>{{ profile.created }}</td>
                    <td>
                        <a :href="'/profiles/view/' + profile.id">View</a>
                        <a :href="'/settings/profiles/edit/' + profile.id" class="btn btn-outline-danger btn-sm">Edit</a>
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
            console.log('Component ProfilesTable mounted.')
        },
        data () {
            return {
                done: false,
                profiles: {
                    profiles: []
                },
                errors: []
            }
        },
        created () {
            this.$parent.$emit('pageLoader', true)
            axios.get('/api/profiles.json')
            .then(response => {
                this.profiles = response.data
                this.$parent.$emit('pageLoader', false)
                this.done = true
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
</script>
