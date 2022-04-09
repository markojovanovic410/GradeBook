<template>
    <div>
        <h2 class="text-center">Student Grade</h2>
        <div class="top-info mt-4 mb-4">
            <div>
                <label>First Name: </label>
                <span>{{ student.first_name }}</span>
            </div>
            <div>
                <label>Last Name: </label>
                <span>{{ student.last_name }}</span>
            </div>
            <div>
                <label>Email: </label>
                <span>{{ student.email }}</span>
            </div>
            <div>
                <label>Birthday: </label>
                <span>{{ student.birthday }}</span>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Assignment Name</th>
                    <th>Assignment Time</th>
                    <th>Score</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="assignment in assignments" :key="assignment.id">
                    <td>{{ assignment.id }}</td>
                    <td>{{ assignment.name }}</td>
                    <td>{{ assignment.time }}</td>
                    <td>{{ assignment.score }}</td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#scoreModal"
                            @click="openModal(assignment.id, assignment.name, assignment.score)"
                        >
                            Update Score
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div
            class="modal fade"
            id="scoreModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Update Score
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updateScore">
                            <input
                                type="hidden"
                                v-model="form_data.student_id"
                            />
                            <input
                                type="hidden"
                                v-model="form_data.assignment_id"
                            />

                            <div class="form-group">
                                <label>First Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    :value="student.first_name"
                                    readonly
                                />
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    readonly
                                    :value="student.last_name"
                                />
                            </div>
                            <div class="form-group">
                                <label>Assignment Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    readonly 
                                    :value="modal_assignment_name"
                                />
                            </div>
                            <div class="form-group">
                                <label>Assignment Score</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="form_data.score"
                                />
                            </div>
                            <button type="submit" class="mt-4 btn btn-primary" data-bs-dismiss="modal">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            student: [],
            assignments: [],
            form_data: {},
            modal_assignment_name: ""
        };
    },
    created() {
        this.getData();
    },
    methods: {
        openModal(assignment_id, assignment_name, assignment_score) {
            this.form_data.student_id = this.student.id;
            this.form_data.assignment_id = assignment_id;
            this.form_data.score = assignment_score;
            this.modal_assignment_name = assignment_name;
        },
        getData() {
            this.axios
                .get(
                    `http://localhost:8000/api/students/grade/${this.$route.params.id}`
                )
                .then((response) => {
                    console.log(response.data);
                    this.student = response.data.student;
                    this.assignments = response.data.assignments;
                });
        },
        updateScore() {
            this.axios
                .post(
                    "http://localhost:8000/api/students/update_score",
                    this.form_data
                )
                .then((response) => {
                    this.getData();
                });
        },
    },
};
</script>
