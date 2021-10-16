<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        New Ticket
                        <router-link
                            :to="{ name: 'TicketsIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="storeTicket">
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
                                    <option selected value="" >-No Department-</option>
                                    <option
                                        v-for="department in departments"
                                        :key="department.id"
                                        :value="department.id"
                                        >{{ department.name }}</option
                                    >
                                </select>
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
                                />
                            </div>
                            <div class="form-check row">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="flexCheckDefault"
                                />
                                <label
                                    class="form-check-label"
                                    for="flexCheckDefault"
                                >
                                    Notify Customer
                                </label>
                            </div>
                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Create
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
                department_id: "",
                priority_id: ""
            },
            priorities: "",
            departments: "",
        };
    },
    created() {
        this.getPriorities();
        this.getDepartments();
    },
    methods: {
        storeTicket() {
            axios
                .post("/tickets-system/public/api/tickets", {
                    title: this.form.title,
                    description: this.form.description,
                    department_id: this.form.department_id,
                    priority_id: this.form.priority_id,
                })
                .then(res => {
                    this.$router.push({ name: "TicketsIndex" });
                });
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
