import Dashboard from "./components/Dashboard.vue";

import StudentList from "./components/student/StudentList.vue";
import CreateStudent from "./components/student/CreateStudent.vue";
import EditStudent from "./components/student/EditStudent.vue";
import GradeStudent from "./components/student/GradeStudent.vue";

import AssignmentList from "./components/assignment/AssignmentList.vue";
import CreateAssignment from "./components/assignment/CreateAssignment.vue";
import EditAssignment from "./components/assignment/EditAssignment.vue";
import GradeAssignment from "./components/assignment/GradeAssignment.vue";

export const routes = [
    {
        name: "home",
        path: "/",
        component: Dashboard,
    },
    {
        name: "student_list",
        path: "/student",
        component: StudentList,
    },
    {
        name: "student_create",
        path: "/student/create",
        component: CreateStudent,
    },
    {
        name: "student_edit",
        path: "/student/edit/:id",
        component: EditStudent,
    },
    {
        name: "student_grade",
        path: "/student/grade/:id",
        component: GradeStudent,
    },

    {
        name: "assignment_list",
        path: "/assignment",
        component: AssignmentList,
    },
    {
        name: "assignment_create",
        path: "/assignment/create",
        component: CreateAssignment,
    },
    {
        name: "assignment_edit",
        path: "/assignment/edit/:id",
        component: EditAssignment,
    },
    {
        name: "assignment_grade",
        path: "/assignment/grade/:id",
        component: GradeAssignment,
    },
];
