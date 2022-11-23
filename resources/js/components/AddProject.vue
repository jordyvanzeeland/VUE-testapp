<template>
    <form @submit.prevent="onSubmit()" class="add-form">
        <div class="form-control">
            <label>Naam</label>
            <input @input="toggleExample" type="text" v-model="text" name="text" placeholder="Projectnaam" />
        </div>

        <span v-show="showExample">Voorbeeld:</span>
        <div v-show="showExample" class="example project">
            <h3>{{ text }}</h3>
            <p>{{ date }}</p>
        </div>

        <input type="submit" value="Save Task" class="btn btn-block" />
    </form>
</template>

<script>

const date = new Date();

var day = date.getDate();
var month = (date.getMonth() + 1)
var year = date.getFullYear();
var hours = date.getHours();
var minutes = date.getMinutes();
var seconds = date.getSeconds();

if (month < 10) {
    month = '0' + month;
}

if (day < 10) {
    day = '0' + day;
}

if (hours < 10) {
    hours = '0' + hours;
}

if (minutes < 10) {
    minutes = '0' + minutes;
}

if (seconds < 10) {
    seconds = '0' + seconds;
}

const dateOfToday = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

export default {
    name: 'AddProject',
    data() {
        return {
            text: '',
            date: dateOfToday,
            active: 1,
            showExample: false
        }
    },
    methods: {
        onSubmit() {

            if (!this.text) {
                alert("Vul de projectnaam in")
                return
            }

            const newProject = {
                text: this.text,
                date: this.date,
                active: this.active
            }

            this.$emit('add-project', newProject)

            this.text = ''
            this.day = dateOfToday
            this.active = true
            this.showExample = false;
        },
        
        toggleExample(e) {
            if(Object.keys(this.text).length > 0){
                this.showExample = true;
            }else{
                this.showExample = false;
            }
        },
    }
}
</script>