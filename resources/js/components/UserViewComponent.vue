<template>
    <div>
         <h1>{{ user.user.email }}</h1>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: ['userId'],
        mounted () {
            console.log('Component UserViewComponent mounted.')
        },
        data () {
            return {
                user: {
                    user: []
                },
                errors: []
            }
        },
        created () {
            axios.get('/api/users/view/' + this.userId + '.json')
            .then(response => {
                this.user = response.data
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
</script>
