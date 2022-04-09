<template>
    <div>
        <h2 class="text-center">Students List</h2>
        <div class="mb-4 mt-4">
            <router-link to="/student/create" class="btn btn-info">Create Student</router-link>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="student in students.data" :key="student.id">
                <td>{{ student.id }}</td>
                <td>{{ student.first_name }}</td>
                <td>{{ student.last_name }}</td>
                <td>{{ student.email }}</td>
                <td>{{ student.birthday }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'student_grade', params: { id: student.id }}" class="btn btn-info">View Grade</router-link>
                        <router-link :to="{name: 'student_edit', params: { id: student.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteStudent(student.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <Pagination :data="students" @pagination-change-page="getResults" />
            <select @change="pageCountChange($event)">
                <option value="10" selected>10</option>
                <option value="20">20</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                page_count: 10,
                students: {}
            }
        },
        created() {
            this.getResults();
        },
        methods: {
            deleteStudent(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/students/${id}`)
                    .then(response => {
                        let i = this.students.map(data => data.id).indexOf(id);
                        this.students.splice(i, 1)
                    });
            },
            getResults(page = 1) {
                axios.get('http://localhost:8000/api/students/?page_count=' + this.page_count+ '&page=' + page)
                    .then(response => {
                        console.log(response.data);
                        this.students = response.data;
                    });
            },
            pageCountChange(event){
                this.page_count = event.target.value;
                this.getResults();
            }
        }
    }
</script>