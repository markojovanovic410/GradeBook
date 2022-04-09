<template>
    <div>
        <h2 class="text-center">Assignment Grade</h2>
        <div class="top-info mt-4 mb-4">
            <div>
                <label>Name: </label>
                <span>{{assignment.name}}</span>
            </div>
            <div>
                <label>Time: </label>
                <span>{{assignment.time}}</span>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="grade in grades" :key="grade.student.id">
                    <td>{{ grade.student.id }}</td>
                    <td>{{ grade.student.first_name }} {{ grade.student.last_name }}</td>
                    <td>{{ grade.student.email }}</td>
                    <td>{{ grade.score }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                assignment: [],
                grades: []
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/assignments/grade/${this.$route.params.id}`)
                .then(response => {
                    console.log(response.data);
                    this.assignment = response.data.assignment;
                    this.grades = response.data.grades;
                });
        },
        methods: {
          
        }
    }
</script>