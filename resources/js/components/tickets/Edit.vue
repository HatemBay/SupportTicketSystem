<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="showMessage">
                    <div class="alert alert-danger">{{ message }}</div>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        Update Ticket
                        <router-link
                            :to="{ name: 'TicketsIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="updateTicket">
                            <div class="form-group row">
                                <label
                                    for="title"
                                    class="col-form-label text-md-right"
                                    >Title</label
                                >
                                <input
                                    id="title"
                                    v-model="form.title"
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    required
                                />
                            </div>
                            <div class="form-group row">
                                <label
                                    for="description"
                                    class="col-form-label text-md-right"
                                    >Description</label
                                >
                                <textarea
                                    id="description"
                                    v-model="form.description"
                                    placeholder="Description"
                                    class="form-control"
                                    rows="4"
                                    cols="50"
                                    name="description"
                                    required
                                />
                            </div>
                            <div class="form-group row">
                                <label
                                    for="status"
                                    class="col-form-label text-md-right"
                                    >Status</label
                                >
                                <select
                                    class="form-control"
                                    v-model="form.status"
                                    id="status"
                                    aria-label="Status"
                                    required
                                >
                                    <option value="OPEN">OPEN</option>
                                    <option value="CLOSED">CLOSED</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="reply_status"
                                    class="col-form-label text-md-right"
                                    >Reply Status</label
                                >
                                <select
                                    class="form-control"
                                    v-model="form.reply_status"
                                    id="reply_status"
                                    aria-label="Reply Status"
                                    required
                                >
                                    <option value="ANSWERED">ANSWERED</option>
                                    <option value="CLIENT REPLIED">CLIENT REPLIED</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="priority"
                                    class="col-form-label text-md-right"
                                    >Priority</label
                                >
                                <select
                                    class="form-control"
                                    v-model="form.priority_id"
                                    id="priority"
                                    aria-label="Priority"
                                >
                                    <option selected value="">-No Priority-</option>
                                    <option
                                        v-for="priority in priorities"
                                        :key="priority.id"
                                        :value="priority.id"
                                        >{{ priority.name }}</option
                                    >
                                </select>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="department"
                                    class="col-form-label text-md-right"
                                    >Department</label
                                >
                                <select
                                    class="form-control"
                                    v-model="form.department_id"
                                    id="department"
                                    aria-label="Department"
                                >
                                    <option selected value="">-No Department-</option>
                                    <option
                                        v-for="department in departments"
                                        :key="department.id"
                                        :value="department.id"
                                        >{{ department.name }}</option
                                    >
                                </select>
                            </div>

                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                title: "",
                description: "",
                status: "",
                reply_status: "",
                priority_id: "",
                department_id: "",
            },
            showMessage: false,
            message: "",
            priorities: [],
            departments: [],
        };
    },
    created() {
        this.getTicket();
        this.getPriorities();
        this.getDepartments();
    },
    methods: {
        updateTicket() {
            axios
                .put(
                    "/tickets-system/public/api/tickets/" +
                        this.$route.params.id,
                    {
                        title: this.form.title,
                        description: this.form.description,
                        status: this.form.status,
                        reply_status: this.form.reply_status,
                        priority_id: this.form.priority_id,
                        department_id: this.form.department_id,
                    }
                )
                .then(res => {
                    this.$router.push({ name: "TicketsIndex" });
                });
        },
        getTicket() {
            axios
                .get(
                    "/tickets-system/public/api/tickets/" +
                        this.$route.params.id
                )
                .then(res => {
                    this.form = res.data.data;
                })
                .catch(error => console.log(error));
        },
        getPriorities() {
            axios
                .get("/tickets-system/public/api/priorities")
                .then(res => {
                    this.priorities = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        getDepartments() {
            axios
                .get("/tickets-system/public/api/departments")
                .then(res => {
                    this.departments = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        }
    }
};
</script>

<style></style>
