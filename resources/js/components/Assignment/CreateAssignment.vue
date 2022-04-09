<template>
    <div>
        <h3 class="text-center">Create Assignment</h3>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form @submit.prevent="addAssignment">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="assignment.name">
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input type="text" class="form-control" v-model="assignment.time">
                    </div>
                    <button type="submit" class="mt-4 btn btn-primary">Create</button>
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
        methods: {
            addAssignment() {
                this.axios
                    .post('http://localhost:8000/api/assignments', this.assignment)
                    .then(response => (
                        this.$router.push({ name: 'assignment_list' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>