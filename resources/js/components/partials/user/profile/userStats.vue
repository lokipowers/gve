<template>
    <div class="col-12 stretch-card">
        <div class="card">
            <div class="card-body overview">
                <ul class="achivements">
                    <li>
                        <p>34</p>
                        <p>Projects</p>
                    </li>
                    <li>
                        <p>23</p>
                        <p>Task</p>
                    </li>
                    <li>
                        <p>29</p>
                        <p>Completed</p>
                    </li>
                </ul>
                <div class="wrapper about-user">
                    <h4 class="card-title mt-4 mb-3">About</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam consectetur ex quod.</p>
                </div>
                <div class="info-links">
                    <a class="website" href="http://bootstrapDash.com/">
                        <i class="mdi mdi-earth text-gray"></i>
                        <span>http://bootstrapDash.com/</span>
                    </a>
                    <a class="social-link" href="#">
                        <i class="mdi mdi-facebook text-gray"></i>
                        <span>https://www.facebook.com/johndoe</span>
                    </a>
                    <a class="social-link" href="#">
                        <i class="mdi mdi-linkedin text-gray"></i>
                        <span>https://www.linkedin.com/johndoe</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "userStats",
        data(){
            return{
                user: window.user
            }
        }
    }
</script>

<style scoped>

</style>
