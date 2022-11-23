<template>
    <header>
        <h1>{{ title }}</h1>
        <AppBtn @toggle-add-project="$emit('toggle-add-project')" :color="showAddProject ? 'red' : 'green'"
            :text="showAddProject ? 'Sluiten' : 'Toevoegen'" />
    </header>
</template>

<script>
import AppBtn from './Button.vue';

export default {
    name: 'AppHeader',
    props: {
        title: String,
        showAddProject: Boolean
    },
    components: {
        AppBtn
    }
}
</script>