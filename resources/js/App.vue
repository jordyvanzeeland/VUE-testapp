<template>
    <div class="container">
        <AppHeader @toggle-add-project="toggleAddProject" title="Portfolio Manager" :showAddProject="showAddProject" />
        <div v-show="showAddProject">
            <AddProject @add-project="addProject" />
        </div>
        <MyProjects @delete-project="deleteProject" :projects="projects" />
    </div>
</template>
  
<script>
import AppHeader from './components/Header'
import MyProjects from './components/Projects'
import AddProject from './components/AddProject'

export default {
    name: 'App',
    components: {
        AppHeader,
        MyProjects,
        AddProject
    },
    data() {
        return {
            projects: [],
            showAddProject: false
        }
    },
    methods: {
        toggleAddProject() {
            this.showAddProject = !this.showAddProject
        },

        async addProject(project) {
            const res = await fetch('api/projects/new', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'project_name': project.text,
                    'project_date': project.date,
                    'active': project.active
                }
            })
            const data = await res.json();
            // return data;

            this.projects = [...this.projects, data]
        },

        async deleteProject(id) {
            if (confirm('Wil je dit project verwijderen?')) {

                const res = await fetch(`api/projects/${id}/delete`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })

                res.status === 200 ? (this.projects = this.projects.filter((project) => project.project_id !== id)) : alert('Error deleteing project');
            }
        },

        async fetchProjects() {
            const res = await fetch('api/projects', {
                method: 'GET'
            })
            const data = await res.json();
            return data;
        }

    },
    async created() {
        this.projects = await this.fetchProjects()
        console.log(this.projects);
    }
}
</script>
  