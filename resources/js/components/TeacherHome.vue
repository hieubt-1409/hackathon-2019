<template>
    <div v-if="accepted" class="mt-4">
        <h2>Bạn có lịch học đã đặt trước</h2>

        <el-card>
            <div class="text-center">
                <img width="60" height="60" src="https://images.viblo.asia/avatar-retina/9def6311-6903-4a08-b727-88568a31e525.jpg">
                <h3>{{ accepted.session.user.name }}</h3>
            </div>

            <p style="font-size: 20px">{{ accepted.session.content }}</p>
            <div class="mb-2">
                <div class="row">
                    <div class="col-3 font-weight-bold">Mức giá:</div>
                    <span class="text-success font-weight-bold">{{ accepted.bid.amount | formatNumber }} VNĐ</span>
                </div>
                <div class="row">
                    <div class="col-3 font-weight-bold">Thời gian:</div>
                    <div>
                        <div>{{ accepted.session.start_time }}</div>
                        <div>{{ accepted.session.end_time }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 font-weight-bold">Địa điểm:</div>
                    {{ accepted.session.location }}
                </div>
            </div>
        </el-card>
    </div>

    <div v-else-if="sessions.length === 0" class="text-center mt-4">Chưa có yêu cầu nào</div>

    <div v-else class="mt-4">
        <h2>Có {{ sessions.length }} yêu cầu mới</h2>

        <div>
            <el-card v-for="session in sessions" :key="session.id">
                <div class="text-center">
                    <img width="60" height="60" src="https://images.viblo.asia/avatar-retina/9def6311-6903-4a08-b727-88568a31e525.jpg">
                    <h3>{{ session.user.name }}</h3>
                </div>

                <p style="font-size: 20px">{{ session.content }}</p>
                <div class="mb-2">
                    <div class="row">
                        <div class="col-3 font-weight-bold">Mức giá:</div>
                        <span class="text-success font-weight-bold">{{ session.min_bid | formatNumber }} - {{ session.max_bid | formatNumber }} (VNĐ)</span>
                    </div>
                    <div class="row">
                        <div class="col-3 font-weight-bold">Thời gian:</div>
                        <div>
                            <div>{{ session.start_time }}</div>
                            <div>{{ session.end_time }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 font-weight-bold">Địa điểm:</div>
                        {{ session.location }}
                    </div>
                </div>

                <template v-if="!offeredSessionIds.includes(session.id)">
                <!-- <template v-if="false"> -->
                    <el-slider
                        show-input
                        show-tooltip
                        :min="session.min_bid"
                        :max="session.max_bid"
                        :step="1000"
                        :show-input-controls="false"
                        :format-tooltip="a => a ? a.toLocaleString() : undefined"
                        input-size="mini"
                        class="mb-4"
                    />

                    <div class="d-flex">
                        <el-button
                            type="success"
                            style="flex:1"
                            @click="offerLession(session)"
                        >Nhận yêu cầu</el-button>

                        <el-button style="flex:1" @click="ignoreRequest(session)">Bỏ qua</el-button>
                    </div>
                </template>

                <div v-else class="d-flex align-items-center justify-content-between">
                    <div>
                        <i class="el-icon-loading" />
                        Đang chờ xác nhận...
                    </div>
                    <el-button type="danger" @click="cancelOffer(session)">Hủy</el-button>
                </div>
            </el-card>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                sessions: [],
                offeredSessionIds: [],
                accepted: null,
            };
        },

        async mounted() {
            await this.getAccepted();

            if (!this.accepted) {
                this.$_channel = Echo.channel('sessions');
                this.$_channel.listen('SessionCreated', this.onNewSession);
                this.$_channel.listen('OfferAccepted', this.onOfferAccepted);
            }
        },

        destroyed() {
            if (this.$_channel) {
                this.$_channel.leave();
            }
        },

        methods: {
            async onNewSession({ session_id }) {
                const { data: session } = await axios.get(`/student/sessions/${session_id}`);

                this.sessions = [...this.sessions, session];
            },

            onOfferAccepted(offer) {
                this.accepted = offer;
            },

            async getAccepted() {
                const { data: accepted } = await axios.get(`/teacher/accepted-offer`);

                this.accepted = accepted;
            },

            async offerLession(session) {
                const { data: bid } = await axios.post(`/teacher/sessions/${session.id}/offer`, {
                    amount: session.min_bid,
                });

                this.offeredSessionIds = [...this.offeredSessionIds, session.id];
            },

            ignoreRequest(session) {
                this.sessions = this.sessions.filter(({ id }) => id !== session.id);
            },

            async cancelOffer(session) {
                await axios.post(`/teacher/sessions/${session.id}/cancel-offer`);

                this.offeredSessionIds = this.offeredSessionIds.filter(id => id !== session.id);
            }
        },
    }
</script>
