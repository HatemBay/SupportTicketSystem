<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="showMessage">
                    <div class="alert alert-danger">{{ message }}</div>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        Update User
                        <router-link
                            :to="{ name: 'UsersIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="updateUser">
                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Name</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="name"
                                        v-model="form.name"
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Email</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        v-model="form.email"
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="password"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Password <em> (optional) </em></label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        v-model="form.password"
                                        type="password"
                                        class="form-control"
                                        name="password"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="confirm"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Confirm Password</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="confirm"
                                        v-model="form.confirm"
                                        type="password"
                                        class="form-control"
                                        name="confirm"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="role"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Role</label
                                >

                                <div class="col-md-6">
                                    <select
                                        class="form-control"
                                        v-model="form.role"
                                        id="role"
                                        aria-label="Role"
                                        required
                                    >
                                        <option selected value="Customer"
                                            >Customer</option
                                        >
                                        <option value="Agent">Agent</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
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
                name: "",
                email: "",
                password: "",
                confirm: "",
                email: "",
                role: ""
            },
            showMessage: false,
            message: ""
        };
    },
    created() {
        this.getUser();
    },
    methods: {
        checkPassword() {
            return this.form.password === this.form.confirm;
        },
        updateUser() {
            if (!this.checkPassword()) {
                this.showMessage = true;
                this.message = "Passwords don't match";
                this.form.password = "";
                this.form.confirm = "";
            } else {
                axios
                    .all([
                        axios.put(
                            "/tickets-system/public/api/users/" +
                                this.$route.params.id,
                            {
                                name: this.form.name,
                                email: this.form.email,
                                password: this.form.password,
                                role: this.form.role
                            }
                        ),
                        axios.get(
                            "/tickets-system/public/api/users/giveRole/" +
                                this.form.role +
                                "/" +
                                this.form.email
                        )
                    ])

                    .then(res => {
                        this.$router.push({ name: "UsersIndex" });
                    });
            }
        },
        getUser() {
            axios
                .get(
                    "/tickets-system/public/api/users/" + this.$route.params.id
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
