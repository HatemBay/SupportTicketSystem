<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex row mb-5">
            <h2 class="col-lg-6 col-7 h3 mb-0 text-gray-800 pl-5">Dashboard/Tickets/Canned Messages</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <template>
                        <div v-if="showMessage">
                            <div class="alert alert-success">
                                {{ message }}
                            </div>
                        </div>
                        <vue-good-table
                            class="shadow"
                            theme="polar-bear"
                            styleClass="vgt-table striped"
                            :columns="columns"
                            :rows="CMs"
                            :line-numbers="true"
                            :pagination-options="{
                                enabled: true,
                                mode: 'pages',
                                position: 'top',
                                perPage: 10,
                                perPageDropdownEnabled: true
                            }"
                            :sort-options="{
                                enabled: true,
                                initialSortBy: {
                                    field: 'created_at',
                                    type: 'asc'
                                }
                            }"
                            :search-options="{
                                enabled: true,
                                placeholder: 'John Doe'
                            }"
                            compactMode
                        >
                            <template slot="table-row" slot-scope="props">
                                <span
                                    v-if="props.column.field == 'manage'"
                                    class="float-right"
                                >
                                    <router-link
                                        :to="{
                                            name: 'CannedMessagesEdit',
                                            params: {
                                                id: props.row.id
                                            }
                                        }"
                                        class="btn btn-success"
                                        >Edit</router-link
                                    >
                                    <router-link
                                        :to="{
                                            name: 'CannedMessagesIndex'
                                        }"
                                        class="btn btn-danger"
                                        @click.native="
                                            deleteCannedMessage(props.row.id)
                                        "
                                        >Delete</router-link
                                    >
                                </span>
                            </template>
                        </vue-good-table>
                    </template>
                </div>
                <!-- Creation Part -->
                <div class="col-4 pl-lg-4">
                    <div class="card shadow">
                        <div class="card-header">
                            New Canned Message
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="storeCannedMessage">
                                <div class="form-group row">
                                    <label
                                        for="title"
                                        class="col-form-label text-md-right"
                                        >Title</label
                                    >
                                    <input
                                        id="title"
                                        v-model="form.title"
                                        placeholder="Title"
                                        type="text"
                                        class="form-control"
                                        name="title"
                                        required
                                    />
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="body"
                                        class="col-form-label text-md-right"
                                        >Body</label
                                    >
                                    <textarea
                                        id="body"
                                        v-model="form.body"
                                        placeholder="Body"
                                        class="form-control"
                                        rows="4"
                                        cols="50"
                                        name="body"
                                        required
                                    />
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="def-usr"
                                        class="form-control-label text-md-right"
                                        >Status</label
                                    >
                                    <select
                                        class="form-control"
                                        name="def-usr"
                                        aria-label="Default select example"
                                    >
                                        <option selected>
                                            Open this select menu
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group row mb-0 mt-4">
                                    <div class="col-md-6">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Creation Part -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            columns: [
                {
                    label: "Id",
                    field: "id",
                    hidden: true
                },
                {
                    label: "Title",
                    field: "title",
                    tdClass: "pt-3 text-capitalize"
                },
                {
                    label: "Body",
                    field: "body",
                    hidden: true
                },
                {
                    label: "Status",
                    field: "status",
                    tdClass: "pt-3 text-capitalize"
                },
                {
                    label: "Created On",
                    field: "created_at",
                    type: "date",
                    dateInputFormat: "yyyy-MM-dd HH:mm:ss",
                    dateOutputFormat: "MMM do yyyy",
                    tdClass: "pt-3 text-left",
                    thClass: "text-left"
                },
                {
                    label: "Manage",
                    field: "manage",
                    thClass: "text-right"
                }
            ],
            CMs: [],
            form: {
                title: "",
                body: "",
                status: "prv"
            },
            showMessage: false,
            message: ""
        };
    },
    mounted() {
        this.getCannedMessages();
    },
    methods: {
        getCannedMessages() {
            axios
                .get("/tickets-system/public/api/canned-messages?status='closed'")
                .then(res => {
                    this.CMs = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        deleteCannedMessage(id) {
            axios
                .delete("/tickets-system/public/api/canned-messages/" + id)
                .then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    this.getCannedMessages();
                    window.scrollTo(0, 0);
                });
        },
        storeCannedMessage() {
            axios
                .post("/tickets-system/public/api/canned-messages", {
                    title: this.form.title,
                    body: this.form.body,
                    status: this.form.status
                })
                .then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    this.getCannedMessages();
                    this.$router
                        .push({ name: "CannedMessagesIndex" })
                        .catch(() => {});
                });
        }
    }
};
</script>
