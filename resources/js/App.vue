<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Dashboard</router-link>
                    <router-link to="/student" class="nav-item nav-link">Student</router-link>
                    <router-link to="/assignment" class="nav-item nav-link">Assignment</router-link>                    
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>