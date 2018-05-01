<template>
<div class="row text-center loading" v-if="done == false">
    <div class="col">
        <span style="font-size: 1.7rem"><i class="fal fa-spinner fa-pulse"></i></span>
    </div>
</div>
</template>

<script>
export default {
    props: ['done'],
    created () {
        this.$on('pageLoader', function(value) {
            this.done = value
        })
    }
}
</script>