<template>
    <button @click="onClick()" :style="{background: color}" class="btn">{{ text }}</button>
</template>

<script>
export default {
    name: 'AppBtn',
    props: {
        text: String,
        color: String
    },
    methods: {
        onClick() {
            this.$emit('toggle-add-project')
        }
    }
}
</script>

<style scoped>

</style>