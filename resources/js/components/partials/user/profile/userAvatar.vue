<template>
    <div>
        <div class="wrapper mb-5 mt-4">
            <span class="badge badge-warning text-white">Note : </span>
            <p class="d-inline ml-3 text-muted">Image size is limited to not greater than 1MB .</p>
        </div>
        <form action="#">
            <input type="file" class="dropify" data-max-file-size="1mb" :data-default-file="( user.avatar || '')" />
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-inverse-success mr-2">Update</button>
                <button class="btn btn-inverse-danger">Cancel</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "userAvatar",
        data(){
            return{
                user:window.user
            }
        }
    }
</script>

<style scoped>

</style>
