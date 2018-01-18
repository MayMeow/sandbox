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
                <tr v-for="space in spaces.spaces">
                    <td>{{ space.name }}</td>
                    <td>{{ space.created }}</td>
                    <td>
                        <a :href="'/spaces/view/' + space.id">View</a>
                        <a :href="'/spaces/edit/' + space.id" class="btn btn-outline-danger btn-sm">Edit</a>
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
        props: ['spaceId'],
        mounted () {
            console.log('Component spacesTable mounted.')
        },
        data () {
            return {
                done: false,
                spaces: {
                    spaces: []
                },
                errors: []
            }
        },
        created () {
            this.$parent.$emit('pageLoader', true)

            if (this.spaceId == null) {

                axios.get('/api/spaces.json')
                .then(response => {
                    this.spaces = response.data
                    this.$parent.$emit('pageLoader', false)
                    this.done = true
                })
                .catch(e => {
                    this.errors.push(e)
                })

            } else {

                axios.get('/api/spaces/index/' + this.spaceId + '.json')
                .then(response => {
                    this.spaces = response.data
                    this.$parent.$emit('pageLoader', false)
                    this.done = true
                })
                .catch(e => {
                    this.errors.push(e)
                })
            }

        }
    }
</script>
