<template>
    <div class="row user-profile">
        <div class="col-lg-4 side-left d-flex align-items-stretch">
            <div class="row">
                <user-card></user-card>
                <user-stats></user-stats>
            </div>
        </div>
        <div class="col-lg-8 side-right stretch-card">
            <div class="card">
                <div class="card-body">
                    <tablist :tabs="tabs" :initialTab="initialTab">
                        <template slot="tab-head-info">
                            Info
                        </template>
                        <template slot="tab-panel-info">
                            <user-form></user-form>
                        </template>

                        <template slot="tab-head-avatar">
                            Avatar
                        </template>
                        <template slot="tab-panel-avatar">
                            <user-avatar></user-avatar>
                        </template>

                        <template slot="tab-head-security">
                            Security
                        </template>
                        <template slot="tab-panel-security">
                            <user-password></user-password>
                        </template>
                    </tablist>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import UserCard from "./profile/userCard";
    import UserStats from "./profile/userStats";
    import Tablist from "../global/tablist";
    import UserForm from "./profile/userForm";
    import UserAvatar from "./profile/userAvatar";
    import UserPassword from "./profile/userPassword";
    export default {
        name: "profile",
        components: {UserPassword, UserAvatar, UserForm, Tablist, UserStats, UserCard},
        data(){
            return{
                initialTab: 'info',
                tabs: ['info', 'avatar', 'security']
            }
        }
    }
</script>

<style scoped>

</style>
