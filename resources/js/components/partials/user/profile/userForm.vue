<template>
    <form action="#">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Change user name" required :value="( user.name || '' )">
        </div>
        <h4 class="card-title">The below will not appear on your public profile</h4>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Change email address" required :value="user.email">
        </div>
        <div class="form-group mt-5">
            <button type="submit" class="btn btn-inverse-success mr-2">Update</button>
            <button class="btn btn-inverse-danger">Cancel</button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "userForm",
        data(){
            return{
                user: window.user
            }
        }
    }
</script>

<style scoped>

</style>
