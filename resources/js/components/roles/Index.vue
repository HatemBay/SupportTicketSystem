<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex row">
            <h2 class="col-lg-6 col-7 h3 mb-0 text-gray-800 pl-5">
                Dashboard/Roles
            </h2>
            <div class="col-lg-6 col-5 pr-5 text-right">
                <router-link
                    :to="{
                        name: 'RolesCreate'
                    }"
                    type="button"
                    class="btn btn-light text-primary font-weight-bold float-right shadow-sm mb-5 row"
                >
                    <svg
                        style="display:inline;"
                        xmlns="http://www.w3.org/2000/svg"
                        width="12"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-plus"
                    >
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line></svg
                    >New Role
                </router-link>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="mx-auto">
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
                                :rows="roles"
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
                                                name: 'RolesReply',
                                                params: {
                                                    id: props.row.id,
                                                    dept_id:
                                                        props.row
                                                            .department_id || 0,
                                                    prio_id:
                                                        props.row.priority_id ||
                                                        0
                                                }
                                            }"
                                            class="btn btn-primary"
                                            >View/Reply</router-link
                                        >
                                        <router-link
                                            :to="{
                                                name: 'RolesEdit',
                                                params: {
                                                    id: props.row.id
                                                }
                                            }"
                                            class="btn btn-success"
                                            >Edit</router-link
                                        >
                                        <router-link
                                            :to="{
                                                name: 'RolesIndex'
                                            }"
                                            class="btn btn-danger"
                                            @click.native="
                                                deleteRole(props.row.id)
                                            "
                                            >Delete</router-link
                                        >
                                    </span>
                                </template>
                            </vue-good-table>
                        </template>
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
            columns: [
                {
                    label: "Id",
                    field: "id",
                    hidden: true
                },
                {
                    label: "Name",
                    field: "name",
                    hidden: true
                },
                {
                    label: "Created On",
                    field: "created_at",
                    type: "date",
                    dateInputFormat: "yyyy-MM-dd HH:mm:ss",
                    dateOutputFormat: "MMM do yy",
                    tdClass: "pt-3 text-left",
                    thClass: "text-left"
                },
                {
                    label: "Manage",
                    field: "manage",
                    thClass: "text-right"
                }
            ],
            roles: [],
            showMessage: false,
            message: ""
        };
    },
    mounted() {
        this.getRoles();
        this.getPermissions();
    },
    methods: {
        getRoles() {
            axios
                .get("/roles-system/public/api/roles")
                .then(res => {
                    this.roles = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        },
        deleteRole(id) {
            axios
                .delete("/roles-system/public/api/roles/" + id)
                .then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    this.getRoles();
                    window.scrollTo(0, 0);
                });
        },
        getPermissions() {
            axios
                .get("/roles-system/public/api/permissions")
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
