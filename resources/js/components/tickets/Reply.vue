<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="col-lg-4 col-7 h3 mb-0 text-gray-800 pl-5">
                Dashboard/Ticket
            </h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="sidebar-ticket-view">
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-header">
                                <!-- Title -->
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <!-- Title -->
                                        <h5 class="h3 mb-0">Customer</h5>
                                    </div>
                                    <div class="col-6 text-right">
                                        <!-- <a href="http://ultimatedesk.raman.work/admin/users/1" class="btn btn-sm btn-neutral">Profile</a> -->
                                        <a
                                            href="http://ultimatedesk.raman.work/admin/tickets"
                                            class="btn btn-sm btn-neutral"
                                            >Tickets</a
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a
                                            href="#"
                                            class="avatar avatar-xl rounded-circle"
                                        >
                                            <img
                                                width="50px"
                                                height="50px"
                                                alt="Test"
                                                src="http://ultimatedesk.raman.work/uploads/customer/60e433f8751e4.jpg"
                                            />
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">Samy</a>
                                        </h4>
                                        <p class="text-sm text-muted mb-0">
                                            samy@gmail.com
                                        </p>
                                        <!-- <span class="text-success">●</span>
                                    <small>Active</small> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 shadow">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">Details</h3>
                                    </div>
                                </div>
                            </div>
                            <table class="table align-items-center table-flush">
                                <tbody class="list">
                                    <tr>
                                        <td
                                            scope="row"
                                            class="mr-2"
                                            width="30"
                                            style="width: 120px;"
                                        >
                                            Department :
                                        </td>
                                        <td>
                                            <b
                                                style="text-transform: capitalize"
                                                >{{ depts.name || "-" }}
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row" width="30">Status :</td>
                                        <td>
                                            <b>
                                                <template
                                                    v-if="
                                                        tickets.status == 'OPEN'
                                                    "
                                                >
                                                    <span
                                                        class="badge badge-success"
                                                        >{{
                                                            tickets.status
                                                        }}</span
                                                    >
                                                </template>
                                                <template v-else>
                                                    <span
                                                        class="badge badge-danger"
                                                        >{{
                                                            tickets.status ||
                                                                "-"
                                                        }}</span
                                                    >
                                                </template>
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row" width="30">
                                            Priority :
                                        </td>
                                        <td>
                                            <div>
                                                <span
                                                    class="badge badge-pill"
                                                    id="badge-preview"
                                                    :style="{
                                                        backgroundColor:
                                                            priorities.bg_color,
                                                        color:
                                                            priorities.text_color
                                                    }"
                                                    ><span
                                                        style="text-transform: uppercase;"
                                                        >{{
                                                            priorities.name ||
                                                                "-"
                                                        }}</span
                                                    ></span
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row" width="30">
                                            Last Update :
                                        </td>
                                        <td>{{ tickets.updated_at }}</td>
                                    </tr>
                                    <tr>
                                        <td scope="row" width="30">
                                            created :
                                        </td>
                                        <td>{{ transformTime() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <!-- Title -->
                                        <h5 class="h3 mb-0">Assigned Agent</h5>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a
                                            href="#!"
                                            class="btn btn-sm btn-neutral"
                                            onclick="$('#assign_user_ticket_ids').val(65)"
                                            data-toggle="modal"
                                            data-target="#modal-assign-user-ticket-form"
                                            >Assign User</a
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <a
                                            href="#"
                                            class="avatar avatar-xl rounded-circle"
                                        >
                                            <img
                                                width="50px"
                                                height="50px"
                                                alt=""
                                                src="http://ultimatedesk.raman.work/uploads/user/1.jpg"
                                            />
                                        </a>
                                    </div>
                                    <div class="col ml--2">
                                        <h4 class="mb-0">
                                            <a href="#!">Hatem2</a>
                                        </h4>
                                        <p class="text-sm text-muted mb-0">
                                            bayhatem2@gmail.com
                                        </p>
                                        <!-- <span class="text-success">●</span>
                                    <small>Active</small> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4 shadow">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">Description</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{ tickets.description }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Creation Part -->
                <div class="col-lg-8 col-md-8 pl-lg-8">
                    <transition name="fade">
                        <div class="alert alert-success" v-if="show">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="15"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-check"
                            >
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            {{ message }}
                        </div>
                    </transition>
                    <div v-if="showMessage"></div>
                    <div class="card shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    Ticket {{ tickets.title }} #{{ tickets.id }}
                                </div>
                                <div class="col-8 text-right">
                                    <div>
                                        <span v-if="tickets.status == 'OPEN'">
                                            <router-link
                                                :to="{
                                                    name: 'TicketsReply'
                                                }"
                                                class="btn btn-info"
                                                @click.native="closeTicket()"
                                                ><svg
                                                    style="display:inline;"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="15"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-check"
                                                >
                                                    <polyline
                                                        points="20 6 9 17 4 12"
                                                    ></polyline>
                                                </svg>
                                                Close Ticket</router-link
                                            >
                                        </span>
                                        <span v-else>
                                            <router-link
                                                :to="{
                                                    name: 'TicketsReply'
                                                }"
                                                class="btn btn-danger"
                                                @click.native="openTicket()"
                                                ><svg
                                                    style="display:inline;"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="15"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-refresh-ccw"
                                                >
                                                    <polyline
                                                        points="1 4 1 10 7 10"
                                                    ></polyline>
                                                    <polyline
                                                        points="23 20 23 14 17 14"
                                                    ></polyline>
                                                    <path
                                                        d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"
                                                    ></path>
                                                </svg>
                                                Reopen Ticket</router-link
                                            >
                                        </span>
                                        <router-link
                                            :to="{
                                                name: 'TicketsReply'
                                            }"
                                            class="btn btn-primary"
                                            @click.native="openTicket()"
                                            ><i class="fa fa-reply"></i> Reply
                                            Ticket</router-link
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-0 px-1">
                            <!-- conversation -->
                            <div
                                class="list-group list-group-flush overflow-auto"
                                style="max-height:600px; display: flex; flex-direction: column-reverse;"
                            >
                                <div
                                    class="list-group-item flex-column align-items-start py-5 px-4"
                                    style="background-color: #f7fafc"
                                    v-for="message in messages"
                                    :key="message.id"
                                >
                                    <div
                                        class="d-flex w-100 justify-content-between"
                                    >
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="http://ultimatedesk.raman.work/uploads/customer/60e433f8751e4.jpg"
                                                alt="Image placeholder"
                                                class="avatar avatar-xs mr-2 rounded-circle"
                                                width="50px"
                                                height="50px"
                                            />
                                            <h6 class="mb-1 font-weight-bold">
                                                Samy
                                            </h6>
                                        </div>
                                        <small>{{ message.created_at }}</small>
                                    </div>
                                    <p class="text-sm pt-3 mb-3">
                                        {{ message.body }}
                                    </p>
                                    <ul class="list-unstyled"></ul>
                                </div>
                            </div>
                        </div>
                        <!--end conversation -->
                        <span v-if="tickets.status == 'OPEN'">
                            <div class="card-footer">
                                <form @submit.prevent="store">
                                    <div class="form-group">
                                        <label
                                            for="body"
                                            class="col-form-label text-md-right"
                                            >Message</label
                                        >
                                        <textarea
                                            id="body"
                                            placeholder="Message"
                                            v-model="form.body"
                                            rows="4"
                                            cols="50"
                                            class="form-control"
                                            name="body"
                                            required
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="attachement"
                                            class="col-form-label text-md-right"
                                            >State</label
                                        >
                                        <input
                                            id="attachement"
                                            placeholder="State"
                                            v-model="form.attachement"
                                            type="text"
                                            class="form-control"
                                            name="attachement"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="def-usr"
                                            class="form-control-label text-md-right"
                                            >Canned Messages</label
                                        >
                                        <select
                                            class="form-control"
                                            name="def-usr"
                                            aria-label="Default select example"
                                            v-model="selected"
                                            @change="form.body = selected"
                                        >
                                            <option selected value=""
                                                >-Select Canned Message-</option
                                            >
                                            <option
                                                v-for="cannedMessage in cannedMessages"
                                                :key="cannedMessage.id"
                                                :value="cannedMessage.body"
                                                >{{
                                                    cannedMessage.title
                                                }}</option
                                            >
                                        </select>
                                    </div>
                                    <label
                                        for="update_status"
                                        class="form-control-label text-md-right"
                                        >Status</label
                                    >
                                    <div class="col-4 row">
                                        <div
                                            class="custom-control col custom-radio mb-4"
                                        >
                                            <input
                                                name="update_status"
                                                class="custom-control-input"
                                                id="customRadio5"
                                                value="open"
                                                checked
                                                type="radio"
                                                data-parsley-multiple="update_status"
                                                @select="form.open == true"
                                            />
                                            <label
                                                class="custom-control-label"
                                                for="customRadio5"
                                                >Open</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control col custom-radio mb-4"
                                        >
                                            <input
                                                name="update_status"
                                                class="custom-control-input"
                                                id="customRadio6"
                                                value="closed"
                                                type="radio"
                                                data-parsley-multiple="update_status"
                                                @select="form.open == false"
                                            />
                                            <label
                                                class="custom-control-label"
                                                for="customRadio6"
                                                >Closed</label
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 mt-4">
                                        <div class="col-md-6">
                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                            >
                                                Send
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </span>
                        <span v-else>
                            <div class="card-footer">
                                <div
                                    class="alert alert-danger alert-dismissible fade show"
                                    role="alert"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-bell"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"
                                        />
                                    </svg>
                                    <span class="alert-text">
                                        <strong>Ticket is Closed !</strong>
                                        You cannot reply to this ticket ! ReOpen
                                        Ticket to Send Messages
                                    </span>
                                </div>
                            </div>
                        </span>
                    </div>
                    <!-- /Creation Part -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                body: "",
                attachement: "",
                open: true
            },
            priorities: [],
            messages: [],
            cannedMessages: [],
            priority: "",
            tickets: "",
            depts: "",
            dept: "",
            showMessage: false,
            message: "",
            selected: "",
            show: false
        };
    },
    mounted() {
        this.getTicket();
        this.getDepartment();
        this.getPriority();
        this.getMessages();
        this.getCannedMessages();
    },
    methods: {
        getTicket() {
            axios
                .get(
                    "/tickets-system/public/api/tickets/" +
                        this.$route.params.id
                )
                .then(res => {
                    this.tickets = res.data.data;
                });
        },
        getDepartment() {
            axios
                .get(
                    "/tickets-system/public/api/departments/" +
                        this.$route.params.dept_id
                )
                .then(res => {
                    this.depts = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        getPriority() {
            axios
                .get(
                    "/tickets-system/public/api/priorities/" +
                        this.$route.params.prio_id
                )
                .then(res => {
                    this.priorities = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        getMessages() {
            axios
                .get(
                    "/tickets-system/public/api/messages/ticket/" +
                        this.$route.params.id
                )
                .then(res => {
                    this.messages = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        getCannedMessages() {
            axios
                .get("/tickets-system/public/api/canned-messages")
                .then(res => {
                    this.cannedMessages = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        storeMessage() {
            axios
                .post("/tickets-system/public/api/messages", {
                    ticket_id: this.$route.params.id,
                    body: this.form.body
                })
                .then(res => {
                    this.$router.push({ name: "TicketsIndex" });
                });
        },
        store() {
            this.storeMessage();
            if (this.open == false) {
                this.closeTicket();
            }
        },
        closeTicket() {
            axios
                .put(
                    "/tickets-system/public/api/tickets/" +
                        this.$route.params.id,
                    {
                        status: "CLOSED"
                    }
                )
                .then(res => {
                    this.show = true;
                    this.message = "Ticket has been closed";
                    this.getTicket();
                    window.scrollTo(0, 0);
                    setTimeout(
                        function() {
                            this.removeMessage();
                        }.bind(this),
                        3000
                    );
                });
        },
        openTicket() {
            axios
                .put(
                    "/tickets-system/public/api/tickets/" +
                        this.$route.params.id,
                    {
                        status: "OPEN"
                    }
                )
                .then(res => {
                    this.show = true;
                    this.message = "Ticket has been re-opened";
                    this.getTicket();
                    window.scrollTo(0, 0);
                    setTimeout(
                        function() {
                            this.removeMessage();
                        }.bind(this),
                        3000
                    );
                });
        },
        transformTime() {
            const monthNames = [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec"
            ];
            var d = new Date(this.tickets.created_at);
            var month = monthNames[d.getMonth()];
            var year = d.getFullYear();
            var day = d.getDate();
            var date = day + " " + month + ", " + year;
            return date;
        },
        removeMessage() {
            this.show = !this.show;
        }
    }
};
</script>
<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
