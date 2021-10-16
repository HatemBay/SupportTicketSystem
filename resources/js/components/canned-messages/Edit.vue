<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="showMessage">
                    <div class="alert alert-danger">{{ message }}</div>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        Update Canned Message
                        <router-link
                            :to="{ name: 'CannedMessagesIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="updateCannedMessage">
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
                                    for="body"
                                    class="col-form-label text-md-right"
                                    >Body</label
                                >
                                <textarea
                                    id="body"
                                    v-model="form.body"
                                    rows="4"
                                    cols="50"
                                    class="form-control"
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
                body: "",
                status: ""
            },
            showMessage: false,
            message: ""
        };
    },
    created() {
        this.getCannedMessage();
    },
    methods: {
        updateCannedMessage() {
            axios
                .put(
                    "/tickets-system/public/api/canned-messages/" +
                        this.$route.params.id,
                    {
                        title: this.form.title,
                        body: this.form.body,
                        status: this.form.status
                    }
                )
                .then(res => {
                    this.$router.push({ name: "CannedMessagesIndex" });
                });
        },
        getCannedMessage() {
            axios
                .get(
                    "/tickets-system/public/api/canned-messages/" +
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
