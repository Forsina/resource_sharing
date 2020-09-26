<template>
    <li class="dropdown-submenu" v-if="notifications.length">
        <a href="#" class="btn dropdown" data-toggle="dropdown">
            <i class="fas fa-bell" style="color: white"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" style="margin-right:80px;">
            <ul style="list-style-type: none; padding:0;">

                <li v-for="notification in notifications">
                
                    <a  id="navbarDropdown" class="nav-link" :href="notification.data.link" style="color: grey"
                       v-text="notification.data.message"
                       @click="markAsRead(notification)"
                    ></a>
                    
                </li>
            </ul>
        </div>
    </li>
</template>

<script>
    export default {
        data() {
            return { notifications: false }
        },
        created() {
            axios.get('/profiles/' + window.App.user.name + '/notifications')
                .then(response => this.notifications = response.data);
        },
        methods: {
            markAsRead(notification) {
                axios.delete('/profiles/' + window.App.user.name + '/notifications/' + notification.id)
            }
        }
    }
</script>