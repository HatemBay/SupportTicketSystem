<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">
                        Update Knowledge Base
                        <router-link
                            :to="{ name: 'KnowledgeBasesIndex' }"
                            class="float-right"
                            >Back</router-link
                        >
                    </div>

                    <div class="card-body">
                        <form @submit.prevent="updateKnowledgeBase">
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
                                    for="subcat"
                                    class="col-form-label text-md-right"
                                    >Sub Category</label
                                >
                                <select
                                    class="form-control"
                                    v-model="form.sub_category_id"
                                    id="subcat"
                                    aria-label="Sub Category"
                                >
                                    <option selected value=""
                                        >-No Sub Category-</option
                                    >
                                    <option
                                        v-for="subCat in subCats"
                                        :key="subCat.id"
                                        :value="subCat.id"
                                        >{{ subCat.name }}</option
                                    >
                                </select>
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
                            <div class="wrapper" v-bind:style="bgc">
                                <div class="content">
                                    <input
                                        type="text"
                                        v-on:input="
                                            bgc.backgroundColor =
                                                $event.target.value
                                        "
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
                title: "",
                status: "",
                description: "",
                sub_category_id: ""
            },
            bgc: {
                backgroundColor: ""
            },
            subCats: ""
        };
    },
    created() {
        this.getKnowledgeBase();
        this.getSubCategories();
    },
    methods: {
        updateKnowledgeBase() {
            axios
                .put(
                    "/tickets-system/public/api/knowledge-bases/" +
                        this.$route.params.id,
                    {
                        title: this.form.title,
                        status: this.form.status,
                        description: this.form.description,
                        sub_category_id: this.form.sub_category_id
                    }
                )
                .then(res => {
                    this.$router.push({ name: "KnowledgeBasesIndex" });
                });
        },
        getKnowledgeBase() {
            axios
                .get(
                    "/tickets-system/public/api/knowledge-bases/" +
                        this.$route.params.id
                )
                .then(res => {
                    this.form = res.data.data;
                })
                .catch(error => console.log(error));
        },
        getSubCategories() {
            axios
                .get("/tickets-system/public/api/sub-categories")
                .then(res => {
                    this.subCats = res.data.data;
                })
                .catch(error => console.log(error));
        }
    }
};
</script>

<style></style>
