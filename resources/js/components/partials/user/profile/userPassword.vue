<template>
    <form action="#">
        <div class="form-group">
            <label for="change-password">Change password</label>
            <input type="password" class="form-control" id="change-password" placeholder="Enter you current password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="new-password" placeholder="Enter you new password">
        </div>
        <div class="form-group mt-5">
            <button type="submit" class="btn btn-inverse-success mr-2">Update</button>
            <button class="btn btn-inverse-danger">Cancel</button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "userPassword"
    }
</script>

<style scoped>

</style>
