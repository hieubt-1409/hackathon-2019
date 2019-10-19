<template>
    <div v-if="sessions.length === 0">Chưa có lịch học nào</div>
</template>

<script>
    export default {
        data: () => ({
            sessions: [],
        }),

        mounted() {
            this.$_channel = Echo.channel('sessions');

            this.$_channel.listen('SessionCreated', (event) => {
                    console.log(event);
                })
        },

        destroyed() {
            if (this.$_channel) {
                this.$_channel.leave();
            }
        }
    }
</script>
