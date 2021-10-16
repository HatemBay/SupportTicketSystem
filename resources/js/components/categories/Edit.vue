<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        Update Category
                        <router-link
                            :to="{ name: 'CategoriesIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="updateCategory">
                            <div class="form-group row">
                                <label
                                    for="title"
                                    class="col-md-4 col-form-label text-md-right"
                                    >Name</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="name"
                                        v-model="form.name"
                                        type="text"
                                        class="form-control"
                                        name="title"
                                        required
                                    />
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
                name: ""
            }
        };
    },
    created() {
        this.getCategory();
    },
    methods: {
        updateCategory() {
            axios
                .put(
                    "/tickets-system/public/api/categories/" +
                        this.$route.params.id,
                    {
                        name: this.form.name
                    }
                )
                .then(res => {
                    this.$router.push({ name: "CategoriesIndex" });
                });
        },
        getCategory() {
            axios
                .get(
                    "/tickets-system/public/api/categories/" +
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
