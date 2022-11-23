<template>
    <div class="projects">
        <div class="projects-list" :key="project.project_id" v-for="project in projects">
            <div @dblclick="$emit('toggle-active', project.project_id)" class="project">
                <h3>
                    {{ project.project_name }}
                    <i @click="$emit('delete-project', project.project_id)" class="fas fa-times"></i>
                </h3>
                <p>{{ project.project_date }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'MyProjects',
    props: {
        projects: Array
    },
    emits: ['delete-project', 'toggle-active']
}
</script>