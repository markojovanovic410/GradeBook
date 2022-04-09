<template>
    <div>
        <h3 class="text-center">Edit Student</h3>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form @submit.prevent="updateStudent">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" v-model="student.first_name">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" v-model="student.last_name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="student.email">
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="text" class="form-control" v-model="student.birthday">
                    </div>
                    <button type="submit" class="mt-4 btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                student: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/students/${this.$route.params.id}`)
                .then((res) => {
                    console.log(res.data);
                    this.student = res.data;
                });
        },
        methods: {
            updateStudent() {
                this.axios
                    .patch(`http://localhost:8000/api/students/${this.$route.params.id}`, this.student)
                    .then((res) => {
                        this.$router.push({ name: 'student_list' });
                    });
            }
        }
    }
</script>