<template>
    <div v-if="loading" class="my-2 text-center">
        <i class="el-icon-loading"/>
    </div>

    <div v-else class="my-2">
        <h4>Có {{ offers.length }} người đã nhận yêu cầu</h4>

        <el-card v-for="offer in offers" :key="offer.id" class="mb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img width="30" height="30" src="/teacher_avatar.png" class="mr-2">
                    <div>
                        <div><b>{{ offer.user.name }}</b></div>
                        <span class="text-success">{{ offer.amount | formatNumber }} VNĐ</span>
                    </div>
                </div>

                <div>
                    <a :href="`/chat/${offer.id}`">
                        <el-button size="small" icon="el-icon-chat-line-round" />
                    </a>
                    <el-button size="small" icon="el-icon-check" @click="acceptOffer(offer)" />
                </div>
            </div>
        </el-card>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: {
            sessionId: Number,
        },

        data: () => ({
            loading: true,
            offers: [],
            acceptedId: null,
        }),

        mounted() {
            this.getOffers();
        },

        methods: {
            async getOffers() {
                const { data: { offers, accepted } } = await axios.get(`/student/sessions/${this.sessionId}/offers`);

                this.loading = false;
                this.offers = offers;

                if (accepted) {
                    this.acceptedId = accepted.session_id;
                }
            },

            async acceptOffer(offer) {
                await axios.post(`/student/sessions/${this.sessionId}/accept-bid`, {
                    bidId: offer.id
                });

                window.location.reload();
            }
        }
    }
</script>
