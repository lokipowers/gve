<template>
    <li class="nav-item account-dropdown">
        <a class="nav-link" data-toggle="collapse" href="#account-dropdown" aria-expanded="false" aria-controls="account-dropdown">
            <img class="img-sm rounded-circle" :src="( user.avatar || '/images/face-placeholder-male.jpg')" alt="">
            <p class="mb-0 ml-3 text-light">{{ user.name }}</p>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="account-dropdown">
            <ul class="nav flex-column sub-menu pl-0">
                <li class="nav-item" v-for="item in sidebarMenu">
                    <a class="nav-link pl-5" :href="item.href">
                      <span class="menu-icon">
                        <i :class="item.icon"></i>
                      </span>
                        <span class="menu-title">{{ item.label }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</template>

<script>
    export default {
        name: "userProfile",
        data(){
            return{
                user: window.user,
                sidebarMenu:[
                    {
                        icon:'mdi mdi-account',
                        href:'/profile',
                        label:'Profile'
                    },
                    {
                        icon:'mdi mdi-email',
                        href:'/inbox',
                        label:'Inbox'
                    },
                    {
                        icon:'mdi mdi-wrench',
                        href:'/settings',
                        label:'Settings'
                    },
                    {
                        icon:'mdi mdi-power',
                        href:'/logout',
                        label:'Logout'
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>
