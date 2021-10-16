<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="showMessage">
                    <div class="alert alert-danger">{{ message }}</div>
                </div>
                <div class="card">
                    <div class="card-header">
                        New User
                        <router-link
                            :to="{ name: 'UsersIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="storeUser">
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
                                    >Password</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        v-model="form.password"
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        required
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
                                        required
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
                                        <option value="Customer" selected
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
                name: "",
                email: "",
                password: "",
                confirm: "",
                role: ""
            },
            showMessage: false,
            message: ""
        };
    },
    created() {},
    methods: {
        checkPassword() {
            return this.form.password === this.form.confirm;
        },
        storeUser() {
            if (!this.checkPassword()) {
                this.showMessage = true;
                this.message = "Passwords don't match";
                this.form.password = "";
                this.form.confirm = "";
            } else {
                axios
                    .post("/tickets-system/public/api/users", {
                        name: this.form.name,
                        email: this.form.email,
                        password: this.form.password,
                        role: this.form.role
                    })
                    .then()
                    .then(res => {
                        axios.get(
                            "/tickets-system/public/api/users/giveRole/" +
                                this.form.role +
                                "/" +
                                this.form.email
                        );
                        this.$router.push({ name: "UsersIndex" });
                    });
            }
        }
    }
};
</script>

<style></style>
