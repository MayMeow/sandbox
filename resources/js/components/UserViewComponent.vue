<template>
    <div>
         <h1 style="font-weight: 300">{{ user.user.email }}</h1>
         Member from {{ user.user.created }}
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
            this.$parent.$emit('pageLoader', true)
            axios.get('/api/users/view/' + this.userId + '.json')
            .then(response => {
                this.user = response.data
                this.$parent.$emit('pageLoader', false)
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
</script>
