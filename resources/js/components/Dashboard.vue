<template>
    <div>
        <h2 class="text-center">Dashboard</h2>
        <div class="mb-4 mt-4 row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Student Count</div>
                    <div class="card-body">{{ data.student_cnt }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Assignment Count</div>
                    <div class="card-body">{{ data.assignment_cnt }}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <th>Grade Cnt</th>
                            <th>Avg Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in data.grades" :key="item.student.id">
                            <td>{{ item.student.id }}</td>
                            <td>{{ item.student.first_name }}</td>
                            <td>{{ item.student.last_name }}</td>
                            <td>{{ item.student.email }}</td>
                            <td>{{ item.student.birthday }}</td>
                            <td>{{ item.cnt_score }}</td>
                            <td>{{ Math.round(item.sum_score/item.cnt_score*100)/100 }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            data: [],
        };
    },
    created() {
        axios.get("http://localhost:8000/api/dashboard").then((response) => {
            console.log(response.data);
            this.data = response.data;
        });
    },
    methods: {},
};
</script>
