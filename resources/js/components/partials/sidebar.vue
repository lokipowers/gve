<template>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <user-profile></user-profile>
        </ul>
    </nav>
</template>

<script>
    import UserProfile from "./sidebar/userProfile";
    export default {
        name: "sidebar",
        components: {UserProfile},
    }
</script>

<style scoped>

</style>
