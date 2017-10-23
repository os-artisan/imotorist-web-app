<template>
    <li class="mb-0">
        <div class="col-xs-12">
            You have received a <a :href="ticketUrl">traffic ticket</a>.
            <p class="small">{{ unread.data }}</p>
        </div>
    </li>
</template>

<script>
    export default {
        props: ['unread'],
        data() {
            return {
                ticketUrl: ''
            }
        },
        mounted() {
            this.ticketUrl = "/ticket/" + this.unread.data.ticket_no;
        }
    }
</script>
