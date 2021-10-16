<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex row mb-5">
            <h2 class="col-lg-6 col-7 h3 mb-0 text-gray-800 pl-5">Dashboard/Departments</h2>
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
                            :rows="departments"
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
                                            name: 'DepartmentsEdit',
                                            params: {
                                                id: props.row.id
                                            }
                                        }"
                                        class="btn btn-success"
                                        >Edit</router-link
                                    >
                                    <router-link
                                        :to="{
                                            name: 'DepartmentsIndex'
                                        }"
                                        class="btn btn-danger"
                                        @click.native="
                                            deleteDepartment(props.row.id)
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
                            New Department
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="storeDepartment">
                                <div class="form-group row">
                                    <label
                                        for="name"
                                        class="col-form-label text-md-right"
                                        >Name</label
                                    >
                                    <input
                                        id="name"
                                        placeholder="Name"
                                        v-model="form.name"
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        required
                                    />
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="def-usr"
                                        class="form-control-label text-md-right"
                                        >Default Assigned User</label
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
                    label: "Name",
                    field: "name",
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
            departments: [],
            form: {
                name: ""
            },
            showMessage: false,
            message: ""
        };
    },
    created() {
        this.getDepartments();
    },
    methods: {
        getDepartments(page = 1) {
            axios
                .get("/tickets-system/public/api/departments?page=" + page)
                .then(res => {
                    this.departments = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        deleteDepartment(id) {
            axios
                .delete("/tickets-system/public/api/departments/" + id)
                .then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    this.getDepartments();
                });
        },
        storeDepartment() {
            axios
                .post("/tickets-system/public/api/departments", {
                    name: this.form.name
                })
                .then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    this.getDepartments();
                    this.$router
                        .push({ name: "DepartmentsIndex" })
                        .catch(() => {});
                });
        }
    }
};
</script>

<style></style>
