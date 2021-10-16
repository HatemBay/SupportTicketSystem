<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        New Sub Category
                        <router-link
                            :to="{ name: 'SubCategoriesIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="storeSubCategory">
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
                            <div class="form-group row">
                                <label
                                    for="category_id"
                                    class="col-form-label text-md-right"
                                    >Category</label
                                >
                                <select
                                    class="form-control"
                                    v-model="form.category_id"
                                    id="category_id"
                                    aria-label="Category"
                                >
                                    <option selected value="">-No Category-</option>
                                    <option
                                        v-for="category in Categories"
                                        :key="category.id"
                                        :value="category.id"
                                        >{{ category.name }}</option
                                    >
                                </select>
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
                category_id: ""
            },
            Categories: []
        };
    },
    created() {
        this.getCategories();
    },
    methods: {
        storeSubCategory() {
            axios
                .post("/tickets-system/public/api/sub-categories", {
                    category_id: this.form.category_id,
                    name: this.form.name
                })
                .then(res => {
                    this.$router.push({ name: "SubCategoriesIndex" });
                });
        },
        getCategories() {
            axios
                .get("/tickets-system/public/api/sub-categories/categories")
                .then(res => {
                    this.Categories = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        }
    }
};
</script>

<style></style>
