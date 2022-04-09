<template>
    <div>
        <h3 class="text-center">Edit Assignment</h3>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form @submit.prevent="updateAssignment">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="assignment.name">
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input type="text" class="form-control" v-model="assignment.time">
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
                assignment: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/assignments/${this.$route.params.id}`)
                .then((res) => {
                    console.log(res.data);
                    this.assignment = res.data;
                });
        },
        methods: {
            updateAssignment() {
                this.axios
                    .patch(`http://localhost:8000/api/assignments/${this.$route.params.id}`, this.assignment)
                    .then((res) => {
                        this.$router.push({ name: 'assignment_list' });
                    });
            }
        }
    }
</script>