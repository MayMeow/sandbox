<template>
    <div>
         <div class="message">Ahoj {{ name }}</div>
    </div>
</template>

<script>
    export default {
        props: ['name'],
        mounted () {
            console.log('Component ExampleComponent mounted.')
        }
    }
</script>
