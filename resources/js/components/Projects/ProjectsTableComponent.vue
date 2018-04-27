<template>
<div>
    <preloader :done="done"></preloader>
    <div v-if="done">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="project in projects.projects">
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="mr-2 d-flex">
                                <div class="mr-2"><span class="mr-2"><i class="far fa-bookmark"></i></span></div>
                                <div :class="'project-avatar box-shadow ' + project.settings.color"></div>
                            </div>
                            <div>
                                <a class="text-dark" style="font-weight: 600;" :href="'/projects/' + project.id">{{ project.profile.name }} / {{ project.name }}</a>
                                <div><small>{{ project.description | with_emoji }}</small></div>
                            </div>
                            <div class="ml-auto text-right">
                                <span class="mr-2"><i class="fas fa-folder"></i>1</span>
                                <span class="mr-2"><i class="fas fa-code-merge"></i>1</span>
                                <span><i class="fas fa-bug"></i>1</span>
                                <div><small>updated {{ project.created_at.date | moment }}</small></div>
                            </div>
                        </div>
                        
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
