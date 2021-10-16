<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        New Knowledge Base
                        <router-link
                            :to="{ name: 'KnowledgeBasesIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="storeKnowledgeBase">
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
                                    for="status"
                                    class="col-form-label text-md-right"
                                    >Status</label
                                >
                                <input
                                    id="status"
                                    v-model="form.status"
                                    type="text"
                                    class="form-control"
                                    name="status"
                                    required
                                />
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
                                    rows="4"
                                    cols="50"
                                    class="form-control"
                                    name="description"
                                    required
                                />
                            </div>
                            <div class="form-group row">
                                <label
                                    for="sub_category_id"
                                    class="col-form-label text-md-right"
                                    >Sub Category</label
                                >
                                <select
                                    class="form-control"
                                    v-model="form.sub_category_id"
                                    id="sub_category_id"
                                    aria-label="Category"
                                >
                                    <option selected value="">-No Sub Category-</option>
                                    <option
                                        v-for="subCategory in SubCategories"
                                        :key="subCategory.id"
                                        :value="subCategory.id"
                                        >{{ subCategory.name }}</option
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
                title: "",
                status: "",
                description: "",
                sub_category_id:""
            },
            SubCategories: []
        };
    },
    created() {
        this.getSubCategories();
    },
    methods: {
        storeKnowledgeBase() {
            axios
                .post("/tickets-system/public/api/knowledge-bases", {
                    title: this.form.title,
                    status: this.form.status,
                    description: this.form.description,
                    sub_category_id: this.form.sub_category_id
                })
                .then(res => {
                    this.$router.push({ name: "KnowledgeBasesIndex" });
                });
        },
        getSubCategories() {
            axios
                .get("/tickets-system/public/api/sub-categories")
                .then(res => {
                    this.SubCategories = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        }
    }
};
</script>

<style></style>
