<template>
    <li class="dropdown" @click="markNotificationAsRead">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <i class="fa fa-bell fa-lg"></i>

            <span class="label label-primary" v-if="unreadNotifications.length > 0">{{ unreadNotifications.length }}</span>
        </a>
        <ul class="dropdown-menu notify-drop">
            <div class="notify-drop-title">
                <div class="row">
                    <div class="col-xs-12">Notifications</div>
                </div>
            </div><!-- notify drop title -->

            <div class="drop-content">

                <notification-item v-for="unread in unreadNotifications" :key="unread.id" :unread="unread"></notification-item>

            </div><!-- drop content -->

            <div class="notify-drop-footer text-center">
                <a href=""><i class="fa fa-eye"></i> View all notifications</a>
            </div>
        </ul>
    </li>
</template>

<script>
import notificationItem from './NotificationItem.vue';
    export default {
        props:['unreads', 'userid'],
        components: {notificationItem},
        data() {
            return {
                unreadNotifications: this.unreads
            }
        },
        methods: {
            markNotificationAsRead() {
                if (this.unreadNotifications.length) {
                    axios.get('/mark-as-read');
                }
            }
        },
        mounted() {
            console.log('Component mounted.');
            Echo.private('App.User.' + this.userid)
                .notification((notification) => {
                    console.log(notification);
                    let newUnreadNotifications = {data:{ticket_no:notification.ticket_no}};
                    this.unreadNotifications.push(newUnreadNotifications);
                });
        }
    }
</script>
