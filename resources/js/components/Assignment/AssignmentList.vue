<template>
    <div>
        <h2 class="text-center">Assignments List</h2>
        <div class="mb-4 mt-4">
            <router-link to="/assignment/create" class="btn btn-info">Create Assignment</router-link>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="assignment in assignments" :key="assignment.id">
                <td>{{ assignment.id }}</td>
                <td>{{ assignment.name }}</td>
                <td>{{ assignment.time }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'assignment_grade', params: { id: assignment.id }}" class="btn btn-info">View Grade</router-link>
                        <router-link :to="{name: 'assignment_edit', params: { id: assignment.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteAssignment(assignment.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                assignments: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/assignments/')
                .then(response => {
                    this.assignments = response.data;
                });
        },
        methods: {
            deleteAssignment(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/assignments/${id}`)
                    .then(response => {
                        let i = this.assignments.map(data => data.id).indexOf(id);
                        this.assignments.splice(i, 1)
                    });
            }
        }
    }
</script>