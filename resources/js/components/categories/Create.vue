<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        New Category
                        <router-link
                            :to="{ name: 'CategoriesIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="storeCategory">
                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-form-label text-md-right"
                                    >Title</label
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
            },
            Categories: []
        };
    },
    created() {},
    methods: {
        storeCategory() {
            axios
                .post("/tickets-system/public/api/categories", {
                    name: this.form.name,
                })
                .then(res => {
                    this.$router.push({ name: "CategoriesIndex" });
                });
        }
    }
};
</script>

<style></style>
