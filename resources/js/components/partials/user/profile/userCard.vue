<template>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body avatar">
                <h4 class="card-title">Info</h4>
                <img :src="( user.avatar || '/images/face-placeholder-male.jpg')" alt="">
                <p class="name">{{ user.name }}</p>
                <p class="designation"> TODO -</p>
                <a class="d-block text-center text-white" href="#">TODO</a>
                <a class="d-block text-center text-white" href="#">TODO</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "userCard",
        data(){
            return{
                user: window.user
            }
        }
    }
</script>

<style scoped>

</style>
