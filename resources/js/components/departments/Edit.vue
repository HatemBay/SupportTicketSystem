<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="showMessage">
                    <div class="alert alert-danger">{{ message }}</div>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        Update Department
                        <router-link
                            :to="{ name: 'DepartmentsIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="updateDepartment">
                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-form-label text-md-right"
                                    >Name</label
                                >
                                <input
                                    id="name"
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
                name: ""
            },
            showMessage: false,
            message: ""
        };
    },
    created() {
        this.getDepartment();
    },
    methods: {
        updateDepartment() {
            axios
                .put(
                    "/tickets-system/public/api/departments/" +
                        this.$route.params.id,
                    {
                        name: this.form.name
                    }
                )
                .then(res => {
                    this.$router.push({ name: "DepartmentsIndex" });
                });
        },
        getDepartment() {
            axios
                .get(
                    "/tickets-system/public/api/departments/" +
                        this.$route.params.id
                )
                .then(res => {
                    this.form = res.data.data;
                })
                .catch(error => console.log(error));
        }
    }
};
</script>

<style></style>
